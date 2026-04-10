<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $userId = auth()->id();
        $itemId = $request->item_id;

        $like = Like::where('user_id', $userId)
            ->where('item_id', $itemId)
            ->first();

        if ($like) {
            $like->delete(); // 解除
        } else {
            Like::create([
                'user_id' => $userId,
                'item_id' => $itemId,
            ]);
        }

        return back();
    }
}
