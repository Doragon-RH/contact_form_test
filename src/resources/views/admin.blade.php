@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<h2 class="">
    Admin
</h2>
<form action="/search" method="get">
    @csrf
    <table>
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>お問い合わせの種類</th>
            <th>日付</th>
            <th></th>
        </tr>
        <tr>
            <td>
                <input type="text" name="name" value="{{ old('name') }}">
            </td>
            <td>
                <select name="gender">
                    <option value="">選択してください</option>
                    @foreach ($select_gender as $key => $value)
                    <option value="{{$key}}" {{ old('gender') == $key ? 'selected' : '' }}>{{$value}}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <select name="category">
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" {{ old('category') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="date" name="date" value="{{ old('date') }}">
            </td>
            <td>
                <button type="submit">検索</button>
            </td>
        </tr>
    </table>
</form>
<br>

<a href="/reset">検索条件のリセット</a>

<button>エクスポート</button>
<table>
    <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
    </tr>
    @foreach ($contacts as $contact)
    <tr class="hover">
        <td>
            {{$contact->first_name . $contact->last_name}}
        </td>
        <td>
        {{$select_gender[$contact->gender]}}
        </td>
        <td>
        {{$contact->email}}
        </td>
        <td>
        {{$categories[$contact->category_id -1]['content']}}
        </td>
        <td>
            <button class="hover_menu" popovertarget="{{ $contact->id }}" popovertargetaction="show">詳細</button>
            <div id="{{ $contact->id }}" popover>
            <table class="confirm-table">
                <tr>
                    <th>お名前</th>
                    <td>{{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{ $contact['gender'] === 'male' ? '男性' : ($contact['gender'] === 'female' ? '女性' : 'その他') }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $contact['email'] }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $contact['phone_0'] }} {{ $contact['phone_1'] }} {{ $contact['phone_2'] }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $contact['address'] }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $contact['building'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $contact['category'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $contact['detail'] }}</td>
                </tr>
            </table>
            <button popovertarget="{{ $contact->id }}" popovertargetaction="hide" >閉じる</button>
            <form action="/delete" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $contact->id }}">
                <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex justify-content-center">
        {{$contacts->onEachSide(1)->links('pagination::bootstrap-4')}}
</div>
@endsection
