<!DOCTYPE html>
<html>

<head>
    <title>マイページ</title>

    <style>
        body {
            font-family: sans-serif;
            background: #f5f5f5;
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        h2 {
            margin-top: 40px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            text-decoration: none;
            color: black;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .card:active {
            transform: scale(0.98);
        }

        /* 👇 画像 */
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            transition: 0.4s;
        }

        /* 👇 ホバー時（画像ズーム＋少し暗く） */
        .card:hover img {
            transform: scale(1.05);
            filter: brightness(0.9);
        }

        /* 👇 テキスト部分 */
        .card-body {
            padding: 10px;
        }

        /* 👇 商品名 */
        .name {
            font-weight: bold;
            font-size: 14px;
        }

        .back {
            display: inline-block;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>マイページ</h1>

        <!-- ❤️ いいね -->
        <h2>❤️ いいねした商品</h2>

        <div class="grid">
            @forelse ($likedItems as $item)
            <a href="/items/{{ $item->id }}" class="card">
                <img src="{{ asset('storage/' . $item->image) }}">
                <div class="card-body">
                    <p class="name">{{ $item->name }}</p>
                </div>
            </a>
            @empty
            <p>いいねした商品はありません</p>
            @endforelse
        </div>

        <!-- 📦 出品 -->
        <h2>📦 自分の出品</h2>

        <div class="grid">
            @forelse ($myItems as $item)
            <a href="/items/{{ $item->id }}" class="card">
                <img src="{{ asset($item->image) }}">
                <div class="card-body">
                    <p class="name">{{ $item->name }}</p>
                </div>
            </a>
            @empty
            <p>出品商品はありません</p>
            @endforelse
        </div>

        <a href="/" class="back">← 戻る</a>

    </div>

</body>

</html>