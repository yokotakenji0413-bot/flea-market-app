<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // 🔐 ログインしてなければログインへ
        if (!auth()->check()) {
            return redirect('/login');
        }

        // ✅ バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 💾 保存
        Comment::create([
            'user_id' => auth()->id(),
            'item_id' => $request->item_id,
            'content' => $request->content,
        ]);

        return back();
    }
}
