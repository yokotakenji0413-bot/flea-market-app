<!DOCTYPE html>
<html>

<head>
    <title>商品詳細</title>
</head>

<body style="font-family:sans-serif; background:#f5f5f5; margin:0;">

    <!-- ヘッダー -->
    <header style="background:black; color:white; padding:15px 20px;">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div style="font-weight:bold;">COACHTECH</div>
            <input type="text" placeholder="なにをお探しですか？" style="width:40%; padding:5px;">
            <div>
                <a href="/login" style="color:white;">ログイン</a>
            </div>
        </div>
    </header>

    <div style="max-width:1000px; margin:50px auto; display:flex; gap:50px;">

        <!-- 左：画像 -->
        <div style="width:50%;">

            <img src="{{ asset('images/' . $item->image) }}" style="width:100%;">
        </div>

        <!-- 右：情報 -->
        <div style="width:50%;">

            <h2>{{ $item->name }}</h2>
            <p>¥{{ number_format($item->price) }}</p>

            <!-- ❤️ -->
            <div>
                <form action="/likes" method="POST" style="display:inline;">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">

                    <button type="submit" style="border:none; background:none; cursor:pointer;">

                        @if (auth()->check() && $item->isLikedByUser(auth()->id()))
                        <span style="color:red;">❤️</span>
                        @else
                        🤍
                        @endif

                        {{ $item->likes->count() }}
                    </button>
                </form>

                💬 {{ $item->comments->count() }}
            </div>

            <!-- 購入ボタン -->
            <button style="
            background:red;
            color:white;
            padding:10px;
            border:none;
            width:100%;
            margin:20px 0;
        ">
                購入手続きへ
            </button>

            <!-- 説明 -->
            <h3>商品説明</h3>
            <p>{{ $item->description }}</p>

            <!-- 情報 -->
            <h3>商品の情報</h3>

            <!-- 👇ここに追加🔥 -->
            <div>
                <strong>カテゴリー</strong><br>
                <span style="background:#eee; padding:5px 12px; border-radius:20px; font-size:12px; margin-right:5px;">ファッション</span>
                <span style="background:#eee; padding:5px 12px; border-radius:20px; font-size:12px; margin-right:5px;">レディス</span>
            </div>

            <br>

            <p>状態：{{ $item->condition }}</p>

            <!-- コメント -->
            <h3>コメント ({{ $item->comments->count() }})</h3>

            @foreach ($item->comments as $comment)
            <div style="display:flex; gap:10px; margin-bottom:10px;">

                <div style="width:40px; height:40px; background:#ccc; border-radius:50%;"></div>

                <div style="background:#eee; padding:10px; border-radius:8px;">
                    <strong>{{ $comment->user->name }}</strong><br>
                    {{ $comment->content }}
                </div>

            </div>
            @endforeach

            <!-- 👇ここに追加🔥 -->
            <h3 style="margin-top:30px;">商品へのコメント</h3>

            <!-- コメント投稿 -->
            <form action="/comments" method="POST">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">

                <textarea name="content" style="width:100%; height:100px; border-radius:5px; padding:10px;"></textarea>

                <button type="submit" style="
    background:red;
    color:white;
    padding:10px;
    border:none;
    width:100%;
    margin-top:10px;
    transition:0.2s;
"
                    onmouseover="this.style.opacity=0.8"
                    onmouseout="this.style.opacity=1">
                    コメント送信
                </button>
            </form>

        </div>
    </div>

</body>

</html>