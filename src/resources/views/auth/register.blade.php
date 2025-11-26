@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="back__content">
    <h2 class="register__title">Register</h2>

<div class="register__content">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form__group">
            <label for="name">お名前</label>
            <div>
                <input type="text" name="name" placeholder=" 例:山田 太朗" value="{{ old('name') }}">
            </div>
            @error('name')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="email">メールアドレス</label>
            <div>
                <input type="email" name="email" placeholder=" 例:test@example.com" value="{{ old('email') }}">
            </div>
            @error('email')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__group">
            <label for="password">パスワード</label>
            <div>
                <input type="password" name="password" placeholder=" 例:coachtech1106">
            </div>
            @error('password')
                <p class="form__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form__button">
            <button type="submit" class="register__button">登録</button>
        </div>
    </form>
</div>
@endsection
