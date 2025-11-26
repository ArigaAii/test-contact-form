<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>

    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- 各ページごとのCSS --}}
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>

            {{-- Login ページで Register ボタンを表示 --}}
            @if (Request::is('login'))
                <a href="{{ route('register') }}" class="header__btn">register</a>
            @endif

            {{-- Register ページで Login ボタンを表示 --}}
            @if (Request::is('register*'))
                <a href="{{ route('login.show') }}" class="header__btn">login</a>
            @endif

            {{-- Admin ページで Logout ボタンを表示 --}}
            @if (Request::is('admin'))
                <a href="{{ route('logout') }}" class="header__btn">logout</a>
            @endif
            
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>