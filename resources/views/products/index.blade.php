@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-4">

    <!-- タブ -->
    <div class="flex space-x-6 border-b mb-6">
        <button class="text-red-500 border-b-2 border-red-500 pb-2">
            おすすめ
        </button>
        <button class="text-gray-500 pb-2">
            マイリスト
        </button>
    </div>

    <!-- 商品一覧 -->
    <div class="grid grid-cols-4 gap-6">
        @foreach ($products as $product)
        <a href="#">
            <div class="bg-white rounded-md shadow-sm p-2 hover:shadow-md transition">

                <!-- 画像 -->
                <div class="bg-gray-200 h-48 flex items-center justify-center rounded-md">
                    <span class="text-gray-500">商品画像</span>
                </div>

                <!-- 商品名 -->
                <p class="mt-2 text-sm">
                    {{ $product->name }}
                </p>

            </div>
        </a>
        @endforeach
    </div>

</div>

@endsection