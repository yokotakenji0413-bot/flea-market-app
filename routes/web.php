<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MyPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// トップ（商品一覧）
Route::get('/', [ItemController::class, 'index']);

// 商品作成（ログイン必要）
Route::get('/items/create', [ItemController::class, 'create'])->middleware('auth');
Route::post('/items', [ItemController::class, 'store'])->middleware('auth');

// 商品詳細
Route::get('/items/{id}', [ItemController::class, 'show']);

// いいね・コメント
Route::post('/likes', [LikeController::class, 'store']);
Route::post('/comments', [CommentController::class, 'store']);

// マイページ（ログイン必要）
Route::get('/mypage', [MyPageController::class, 'index'])->middleware('auth');

// ログイン画面（★これが重要）
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/login2', function () {
    return view('auth.login');
})->name('login2');

// ダッシュボード（ログイン後）
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// プロフィール
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| 重要：これを削除 or コメントアウト
|--------------------------------------------------------------------------
*/

// require __DIR__ . '/auth.php';