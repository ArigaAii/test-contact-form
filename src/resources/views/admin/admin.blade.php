@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__content">

    <h2 class="admin__title">Admin</h2>

    {{-- 検索フォーム --}}
    <form action="{{ route('admin.index') }}" method="GET" class="admin__search">

        <div class="admin-search__group">
            <input type="text" name="name" placeholder="名前" value="{{ request('name') }}">
            <input type="text" name="email" placeholder="メールアドレス" value="{{ request('email') }}">

            <select name="gender">
                <option value="">性別</option>
                <option value="male" {{ request('gender')=='male'?'selected':'' }}>男性</option>
                <option value="female" {{ request('gender')=='female'?'selected':'' }}>女性</option>
                <option value="other" {{ request('gender')=='other'?'selected':'' }}>その他</option>
            </select>

            <select name="category">
                <option value="">お問い合わせ種類</option>
                <option value="商品" {{ request('category')=='商品'?'selected':'' }}>商品</option>
                <option value="返品" {{ request('category')=='返品'?'selected':'' }}>返品</option>
                <option value="その他" {{ request('category')=='その他'?'selected':'' }}>その他</option>
            </select>

            <input type="date" name="date" value="{{ request('date') }}">
        </div>

        <div class="admin-search__buttons">
            <button class="btn-search">検索</button>
            <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
        </div>

    </form>

    {{-- 管理画面テーブル --}}
    <table class="admin__table">
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>

        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->fullname }}</td>
            <td>{{ $contact->gender }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content ?? '' }}</td>
            <td>{{ $contact->content }}</td>
        </tr>
        @endforeach
    </table>


</div>
@endsection
