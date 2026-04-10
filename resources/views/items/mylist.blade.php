<!DOCTYPE html>
<html>

<head>
    <title>マイリスト</title>
</head>

<body style="font-family: sans-serif; background:#f5f5f5; margin:0;">

    <!-- ヘッダー -->
    <header style="background:black; color:white; padding:15px 20px;">
        <div style="display:flex; justify-content:space-between; align-items:center;">
            <div style="font-weight:bold;">COACHTECH</div>

            <form method="GET" action="/mylist" style="flex:1; margin:0 20px;">
                <input type="text" name="keyword"
                    placeholder="なにをお探しですか？"
                    value="{{ request('keyword') }}"
                    style="width:100%; padding:8px;">
            </form>

            <div style="display:flex; gap:15px;">
                <a href="/" style="color:white;">商品一覧</a>
                <a href="/mypage" style="color:white;">マイページ</a>
            </div>
        </div>
    </header>

    <!-- タブ -->
    <div style="border-bottom:1px solid #ccc; padding:10px 20px;">
        <a href="/" style="margin-right:20px; color:#555; text-decoration:none;">
            おすすめ
        </a>

        <span style="color:red; font-weight:bold; border-bottom:2px solid red; padding-bottom:5px;">
            マイリスト
        </span>
    </div>

    <div class="container" style="max-width:1200px; margin:20px auto;">

        <div class="grid" style="
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:20px;
        ">

            @forelse ($items as $item)
            <a href="/items/{{ $item->id }}" style="
    background:white;
    border-radius:10px;
    overflow:hidden;
    text-decoration:none;
    color:black;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
    position:relative;
">

                <!-- ❤️ここに追加🔥 -->
                <form action="/likes" method="POST" style="
        position:absolute;
        top:10px;
        right:10px;
    ">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">

                    <button type="submit" onclick="event.preventDefault(); event.stopPropagation(); this.closest('form').submit();"
                        style="border:none; background:white; border-radius:50%; padding:5px; cursor:pointer;">

                        @if ($item->isLikedByUser(auth()->id()))
                        <span style="color:red;">❤️</span>
                        @else
                        🤍
                        @endif

                    </button>
                </form>

                <!-- 画像 -->
                <img src="{{ asset('images/' . $item->image) }}"
                    style="width:100%; height:200px; object-fit:cover;">

                <!-- テキスト -->
                <div style="padding:10px;">
                    <p style="font-weight:bold;">{{ $item->name }}</p>
                    <p style="font-size:12px; color:#666;">
                        {{ $item->description }}
                    </p>
                    <p>¥{{ number_format($item->price) }}</p>
                </div>

            </a>
            @empty
            <p>マイリストに商品がありません</p>
            @endforelse

        </div>

        <div style="margin-top:20px;">
            {{ $items->links() }}
        </div>
    </div>

</body>

</html>