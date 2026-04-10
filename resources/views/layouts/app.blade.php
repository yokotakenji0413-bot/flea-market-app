<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>COACHTECH</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    {{-- ログイン画面以外だけヘッダー表示 --}}
    @if (!request()->is('login'))

    <header class="bg-black text-white py-4">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-4">

            <!-- ロゴ -->
            <img src="{{ asset('images/logo.png') }}" class="h-8">

            <!-- 検索 -->
            <input
                type="text"
                placeholder="なにをお探しですか？"
                class="px-4 py-2 text-black rounded w-1/3">

            <!-- メニュー -->
            <div class="flex items-center space-x-6 text-sm">
                <a href="{{ route('login2') }}">ログイン</a>
                <a href="#">マイページ</a>
                <button class="bg-white text-black px-4 py-1 rounded">
                    出品
                </button>
            </div>

        </div>
    </header>

    @endif

    <main class="{{ request()->is('login') ? '' : 'mt-6' }}">
        @yield('content')
    </main>

</body>

</html>