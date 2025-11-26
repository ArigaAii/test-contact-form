@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
    <h2>Confirm</h2>

    <table class="table__confirm">
        <tr><th>お名前</th><td>{{ $inputs['name_sei'] }} {{ $inputs['name_mei'] }}</td></tr>
        <tr>
            <th>性別</th>
            <td>
                @if ($inputs['gender'] === 'male')
                    男性
                @elseif ($inputs['gender'] === 'female')
                    女性
                @elseif ($inputs['gender'] === 'other')
                    その他
                @endif
            </td>
        </tr>
        <tr><th>メールアドレス</th><td>{{ $inputs['email'] }}</td></tr>
        <tr><th>電話番号</th><td>{{ $inputs['tel1'] }}-{{ $inputs['tel2'] }}-{{ $inputs['tel3'] }}</td></tr>
        <tr><th>住所</th><td>{{ $inputs['address'] }}</td></tr>
        <tr><th>建物名</th><td>{{ $inputs['building-name'] }}</td></tr>
        <tr><th>お問い合わせの種類</th><td>{{ $inputs['category_name'] }}</td></tr>
        <tr><th>お問い合わせ内容</th><td>{{ $inputs['content'] }}</td></tr>
    </table>

    <div class="form__buttons">
        {{-- 送信ボタン --}}
        <form action="{{ route('contact.store') }}" method="POST" class="form__button">
            @csrf
            @foreach ($inputs as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button type="submit" class="btn btn__submit">送信</button>
        </form>

        {{-- 修正ボタン --}}
        <form action="{{ route('contact.index') }}" method="GET" class="form__button">
            @foreach ($inputs as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button type="submit" class="btn btn__back">修正</button>
        </form>
    </div>
</div>
@endsection
