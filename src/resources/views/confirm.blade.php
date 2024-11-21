@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

    <div class="confirm__content">
      <div class="confirm__heading">
        <h2>お問い合わせ内容確認</h2>
      </div>
      <form class="form" action='/thanks' method='post'>
        @csrf
        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お名前</th>
              <td class="confirm-table__text">
                <input type="text" name="name" value="{{$contact['first_name'] . $contact['last_name']}}" readonly/>
                <input type="hidden" name="first_name" value="{{$contact['first_name']}}"/>
                <input type="hidden" name="last_name" value="{{$contact['last_name']}}"/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">性別</th>
              <td class="confirm-table__text">
                <input type="text" value="{{$select_gender[$contact['gender']]}}" readonly>
                <input type="hidden" name="gender" value="{{$contact['gender']}}"/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">メールアドレス</th>
              <td class="confirm-table__text">
                <input type="email" name="email" value="{{$contact['email']}}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">電話番号</th>
              <td class="confirm-table__text">
                <input type="tel" name="tel" value="{{$contact['tel_0'] .$contact['tel_1'] . $contact['tel_2'] }}" readonly/>
                <input type="hidden" name="tel_0" value="{{$contact['tel_0']}}">
                <input type="hidden" name="tel_1" value="{{$contact['tel_1']}}">
                <input type="hidden" name="tel_2" value="{{$contact['tel_2']}}">
              </td>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">住所</th>
              <td class="confirm-table__text">
                <input type="text" name="address" value="{{$contact['email']}}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">建物名</th>
              <td class="confirm-table__text">
                <input type="text" name="building" value="{{$contact['building']}}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問合せの種類</th>
              <td class="confirm-table__text">
                <input type="text" value="{{$categories[$contact['category_id'] -1]['content']}}" readonly/>
                <input type="hidden" name="category_id" value="{{$contact['category_id']}}" readonly/>
              </td>
            </tr>
            <tr class="confirm-table__row">
              <th class="confirm-table__header">お問い合わせ内容</th>
              <td class="confirm-table__text">
                <input type="text" name="detail" value="{{$contact['detail']}}" readonly/>
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
            <a class="form__button-submit" href="/">修正</a>
            <button class="form__button-submit" type="submit">送信</button>
        </div>
      </form>
    </div>
@endsection
