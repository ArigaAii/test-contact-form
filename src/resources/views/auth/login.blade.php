@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="back__content">
    <h2 class="login__title">Login</h2>

<div class="login__content">
    <form method="POST" action="{{ route('login') }}" >
        @csrf

        <div class="form__group">
            <label for="email">メールアドレス</label>
            <div>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="例: test@example.com">
            </div>
            @error('email')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="password">パスワード</label>
            <div>
                <input type="password" name="password" placeholder="例: coachtech1106">
            </div>
            @error('password')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__button">
            <button type="submit" class="login__button">ログイン</button>
        </div>
    </form>
</div>
@endsection
