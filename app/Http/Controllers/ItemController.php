<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    // 🏠 商品一覧
    public function index(Request $request)
    {
        $query = Item::query();

        // 🔍 検索
        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('description', 'like', '%' . $request->keyword . '%');
            });
        }

        // ❤️ マイリスト（いいねした商品）
        if ($request->tab === 'mylist' && auth()->check()) {
            $query->whereHas('likes', function ($q) {
                $q->where('user_id', auth()->id());
            });
        }

        $items = $query->with(['user', 'likes', 'comments'])
            ->latest()
            ->paginate(12)
            ->appends($request->query());

        return view('items.index', compact('items'));
    }

    // 📄 商品詳細
    public function show($id)
    {
        $item = Item::with(['user', 'comments.user', 'likes'])->findOrFail($id);

        return view('items.show', compact('item'));
    }

    // ❤️ マイリストページ（別ページ用）
    public function mylist()
    {
        $items = Item::whereHas('likes', function ($q) {
            $q->where('user_id', auth()->id());
        })
            ->with(['user', 'likes', 'comments'])
            ->latest()
            ->paginate(12);

        return view('items.mylist', compact('items'));
    }

    // ➕ 出品画面
    public function create()
    {
        return view('items.create');
    }

    // 💾 出品処理
    public function store(Request $request)
    {
        // ✅ バリデーション
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer|min:0',
            'description' => 'required',
            'image' => 'required|image|max:2048', // 2MBまで
        ]);

        // 🖼 画像保存
        $path = $request->file('image')->store('images', 'public');

        // 💾 DB保存
        Item::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $path,
        ]);

        // 🔁 リダイレクト（成功メッセージ付き）
        return redirect('/')->with('success', '商品を出品しました！');
    }
}
