@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="{{ route('contact.confirm') }}" method="POST">
        @csrf
        <div class="form__group form__group--row">
            <div class="form__group-title">
                <label for="name">
                    お名前 <span class="required">※</span>
                </label>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="name_sei" placeholder="例: 山田" value="{{ old('name_sei') }}">
                    <input type="text" name="name_mei" placeholder="例: 太朗" value="{{ old('name_mei') }}">
                </div>
                @error('name')
                    {{ $message }}
                @enderror
                @error('name_sei')
                    <p class="form__error">{{ $message }}</p>
                @enderror
                @error('name_mei')
                    <p class="form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form__group form__group--row">
            <div class="form__group-title">
                <label for="gender">性別 <span class="required">※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" value="male" id="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                    <label for="male">男性</label>
                    <input type="radio" name="gender" value="female" id="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                    <label for="female">女性</label>
                    <input type="radio" name="gender" value="other" id="other" {{ old('gender') == 'other' ? 'checked' : '' }}>
                    <label for="other">その他</label>
                </div>
                @error('gender')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="form__group form__group--row">
            <div class="form__group-title">
                <label for="email">メールアドレス <span class="required">※</span></label>
            </div>
            <div class="form__group-content">
                <input type="email" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                @error('email')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="form__group form__group--row">
            <div class="form__group-title">
                <label for="tel">電話番号 <span class="required">※</span></label>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input type="text" name="tel1" maxlength="3" value="{{ old('tel1') }}" placeholder="080"> -
                    <input type="text" name="tel2" maxlength="4" value="{{ old('tel2') }}" placeholder="1234"> -
                    <input type="text" name="tel3" maxlength="4" value="{{ old('tel3') }}" placeholder="5678">
                </div>
                @error('tel1')<p class="form__error">{{ $message }}</p>@enderror
                @error('tel2')<p class="form__error">{{ $message }}</p>@enderror
                @error('tel3')<p class="form__error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="form__group form__group--row">    
            <div class="form__group-title">
                <label for="address">住所 <span class="required">※</span></label>
            </div>
            <div class="form__group-content">
                <input type="text" name="address" value="{{ old('address') }}" placeholder="例: 東京都渋谷区千駄ヶ谷千駄ヶ谷1-2-3">
                @error('address')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>   
        </div>

        <div class="form__group form__group--row">
            <div class="form__group-title">
                <label for="building-name">建物名</label>
            </div>
            <div class="form__group-content">
                <input type="text" name="building-name" value="{{ old('building-name') }}" placeholder="例: 千駄ヶ谷マンション101" />
            </div>
        </div>
        
        <div class="form__group form__group--row">
            <div class="form__group-title">
                <label for="category">お問い合わせの種類 <span class="required">※</span></label>
            </div>
            <div class="form__group-content">
                <select name="category" id="category">
                    <option value="" disable selected hidden>選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
                @error('category')
                    <p style="color:red;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form__group form__group--row">
            <div class="form__group-title">
                <label for="content">お問い合わせ内容 <span class="required">※</span></label>
            </div>
            <div class="form__group-content">
                <textarea
                    name="content"
                    id="content"
                    rows="5"
                    maxlength="120"
                    placeholder="お問い合わせ内容をご記入ください">{{ old('content') }}</textarea>
                @error('content')
                        <p class="form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>

    </form>
</div>
@endsection