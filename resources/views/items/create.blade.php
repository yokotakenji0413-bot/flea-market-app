@extends('layouts.app')

@section('content')

<style>
    .container {
        max-width: 700px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 30px;
    }

    h2 {
        margin-top: 40px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    textarea {
        resize: vertical;
    }

    /* 📸 画像アップロード */
    .image-box {
        border: 2px dashed #ccc;
        padding: 30px;
        text-align: center;
        border-radius: 10px;
        background: #fafafa;
    }

    .image-box input {
        display: none;
    }

    .image-box label {
        display: inline-block;
        padding: 8px 16px;
        border: 1px solid red;
        color: red;
        border-radius: 5px;
        cursor: pointer;
    }

    /* 🏷 カテゴリ */
    .category {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .category label {
        border: 1px solid red;
        color: red;
        padding: 5px 10px;
        border-radius: 20px;
        cursor: pointer;
    }

    /* エラー */
    .error {
        color: red;
        font-size: 13px;
    }

    /* ボタン */
    button {
        width: 100%;
        padding: 12px;
        background: #ff5a5a;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.9;
    }
</style>

<div class="container">

    <h1>商品の出品</h1>

    <form action="/items" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- 📸 画像 -->
        <div class="form-group">
            <label>商品画像</label>
            <div class="image-box">
                <label for="image">画像を選択する</label>
                <input type="file" name="image" id="image">

                <!-- 👇ここに追加🔥 -->
                <img id="preview" style="max-width:200px; margin-top:10px; display:none;">
            </div>
            @error('image')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <!-- 🏷 詳細 -->
        <h2>商品の詳細</h2>

        <div class="form-group">
            <label>カテゴリー</label>
            <div class="category">
                <label><input type="checkbox" name="category[]" value="ファッション"> ファッション</label>
                <label><input type="checkbox" name="category[]" value="家電"> 家電</label>
                <label><input type="checkbox" name="category[]" value="インテリア"> インテリア</label>
                <label><input type="checkbox" name="category[]" value="レディース"> レディース</label>
                <label><input type="checkbox" name="category[]" value="メンズ"> メンズ</label>
                <label><input type="checkbox" name="category[]" value="コスメ"> コスメ</label>
                <label><input type="checkbox" name="category[]" value="本"> 本</label>
                <label><input type="checkbox" name="category[]" value="ゲーム"> ゲーム</label>
            </div>
        </div>

        <div class="form-group">
            <label>商品の状態</label>
            <select name="status">
                <option value="">選択してください</option>
                <option value="新品">新品</option>
                <option value="未使用に近い">未使用に近い</option>
                <option value="やや傷や汚れあり">やや傷や汚れあり</option>
            </select>
        </div>

        <!-- 📝 商品 -->
        <h2>商品名と説明</h2>

        <div class="form-group">
            <label>商品名</label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>ブランド名</label>
            <input type="text" name="brand" value="{{ old('brand') }}">
        </div>

        <div class="form-group">
            <label>商品の説明</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>販売価格</label>
            <input type="number" name="price" value="{{ old('price') }}">
            @error('price')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">出品する</button>

    </form>

</div>

<script>
    const input = document.getElementById('image');
    const preview = document.getElementById('preview');

    input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
</script>

@endsection