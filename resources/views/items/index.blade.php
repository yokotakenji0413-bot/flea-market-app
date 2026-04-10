<!DOCTYPE html>
<html>

<head>
    <title>商品一覧</title>

    <style>
        body {
            font-family: sans-serif;
            background: #f5f5f5;
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: black;
            transition: 0.2s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: 0.3s;
        }

        .card:hover img {
            filter: brightness(0.9);
            transform: scale(1.03);
        }

        .card-body {
            padding: 12px;
        }

        .name {
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 5px;
        }

        .description {
            font-size: 12px;
            color: #666;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .price {
            font-weight: bold;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <header style="
    background: black;
    color: white;
    padding: 15px 20px;
">

        <div style="
        display: flex;
        align-items: center;
        justify-content: space-between;
    ">

            <!-- ロゴ -->
            <div style="font-weight: bold; font-size: 20px;">
                COACHTECH
            </div>

            <!-- 検索 -->
            <form method="GET" action="/" style="
            flex: 1;
            margin: 0 20px;
        ">
                <input type="text" name="keyword"
                    placeholder="なにをお探しですか？"
                    value="{{ request('keyword') }}"
                    style="
                    width: 100%;
                    padding: 8px;
                    border-radius: 5px;
                    border: none;
                ">
            </form>

            <!-- 右側メニュー -->
            <div style="
            display: flex;
            gap: 15px;
            align-items: center;
        ">
                <a href="/login" style="color: white; text-decoration: none;">ログイン</a>
                <a href="/mypage" style="color: white; text-decoration: none;">マイページ</a>
                <a href="#" style="
                background: white;
                color: black;
                padding: 5px 10px;
                border-radius: 5px;
                text-decoration: none;
            ">出品</a>
            </div>

        </div>
    </header>
    <div class="container">
        <div style="
    border-bottom: 1px solid #ccc;
    padding: 10px 20px;
">

            <span style="
        margin-right: 20px;
        color: red;
        font-weight: bold;
        border-bottom: 2px solid red;
        padding-bottom: 5px;
    ">
                おすすめ
            </span>

            <span style="color: #555;">
                マイリスト
            </span>

        </div>


        <!-- 検索 -->

        <!-- 商品一覧 -->
        <div class="grid">
            @forelse ($items as $item)
            <a href="/items/{{ $item->id }}" class="card">

                <div style="position: relative;">
                    <!-- 商品画像 -->
                    <img src="{{ asset('images/' . $item->image) }}" alt="商品画像">

                    <!-- SOLD -->
                    @if ($item->is_sold)
                    <span style="
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        background: rgba(255, 0, 0, 0.8);
                        color: white;
                        padding: 5px 10px;
                        font-size: 12px;
                        font-weight: bold;
                        border-radius: 5px;
                    ">
                        SOLD
                    </span>
                    @endif

                    <!-- いいね＆コメント -->
                    <div style="
    position: absolute;
    top: 60px;   /* ← ここ変更🔥 */
    right: 10px;
    display: flex;
    flex-direction: column;
    gap: 8px;
">

                        <!-- ❤️いいね -->
                        <form action="/likes" method="POST">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">

                            <button type="submit" onclick="event.stopPropagation();" style="
    background: white;
    border: none;
    padding: 5px 8px;
    border-radius: 20px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
">
                                @if (auth()->check() && $item->isLikedByUser(auth()->id()))
                                <img src="https://cdn-icons-png.flaticon.com/512/833/833472.png"
                                    style="width:16px; height:16px; object-fit:contain;">
                                @else
                                <img src="https://cdn-icons-png.flaticon.com/512/1077/1077035.png"
                                    style="width:16px; height:16px; object-fit:contain;">
                                @endif

                                <span style="font-size:12px;">
                                    {{ $item->likes->count() }}
                                </span>
                            </button>
                        </form>

                        <!-- 💬コメント -->
                        <div style="
    background: white;
    border-radius: 20px;
    padding: 5px 8px;
    font-size: 12px;
    display: flex;
    align-items: center;
    gap: 4px;
">
                            💬 {{ $item->comments->count() }}
                        </div>

                    </div>
                </div>

                <!-- 商品情報 -->
                <div class="card-body">
                    <p class="name">{{ $item->name }}</p>
                    <p class="description">{{ $item->description }}</p>
                    <p class="price">¥{{ number_format($item->price) }}</p>
                </div>

            </a>
            @empty
            <p>商品がありません</p>
            @endforelse
        </div>

        <!-- ページネーション -->
        <div style="margin-top: 20px;">
            {{ $items->links() }}
        </div>
    </div>

</body>

</html>