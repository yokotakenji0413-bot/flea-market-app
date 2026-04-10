@extends('layouts.app')

@section('content')

<div class="flex justify-center items-center h-screen">
    <div class="bg-white p-10 rounded shadow w-full max-w-md">

        <h2 class="text-center text-lg mb-6">ログイン</h2>

        <input type="email" placeholder="メールアドレス" class="w-full border mb-4 px-3 py-2 rounded">
        <input type="password" placeholder="パスワード" class="w-full border mb-6 px-3 py-2 rounded">

        <button class="w-full bg-red-400 text-white py-2 rounded">
            ログインする
        </button>

    </div>
</div>

@endsection