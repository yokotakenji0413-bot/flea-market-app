<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;

class MyPageController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // ❤️ いいねした商品
        $likedItems = Item::whereHas('likes', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();

        // 📦 自分の商品
        $myItems = Item::where('user_id', $user->id)->get();

        return view('mypage', compact('likedItems', 'myItems'));
    }
}