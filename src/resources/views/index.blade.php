@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>Contact</h2>
      </div>
      <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') ?? $data['first_name'] ?? '' }}"/>
            </div>
            <div class="form__input--text">
              <input type="text" name="last_name" placeholder="例：太郎" value="{{ old('last_name')  ?? $data['last_name'] ?? ''}}"/>
            </div>
            <div class="form__error">
              @error('first_name')
                {{$message}}
              @enderror
              @error('last_name')
                {{$message}}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
        <div class="form__input--radio">
          <input type="radio" name="gender" value="1" id="male" {{ (old('gender') ?? ($data['gender'] ?? '')) == 1 ? 'checked' : '' }}>
          <label for="male">男性</label>
          <input type="radio" name="gender" value="2" id="female" {{ (old('gender') ?? ($data['gender'] ?? '')) == 2 ? 'checked' : '' }}>
          <label for="female">女性</label>
          <input type="radio" name="gender" value="3" id="other" {{ (old('gender') ?? ($data['gender'] ?? '')) == 3 ? 'checked' : '' }}>
          <label for="other">その他</label>
        </div>
            <div class="form__error">
              @error('gender')
              {{$message}}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" value="{{ old('email')  ?? $data['email'] ?? '' }}"/>
            </div>
            <div class="form__error">
                @foreach ($errors->get('email') as $error)
                    {{$error}}
                @endforeach
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="tel" name="tel_0" placeholder="090" value="{{ old('tel_0')  ?? $data['tel_0'] ?? '' }}"/>
              <input type="tel" name="tel_1" placeholder="1234" value="{{ old('tel_1')  ?? $data['tel_1'] ?? '' }}">
              <input type="tel" name="tel_2" placeholder="5678" value="{{ old('tel_2')  ?? $data['tel_2'] ?? '' }}">
            </div>
            <div class="form__error">
              @if ($errors->has('tel_0') || $errors->has('tel_1') || $errors->has('tel_2'))
                {{$errors->first('tel_0') ?? $errors->first('tel_1') ?? $errors->first('tel_2')}}
              @endif
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="address" placeholder="" value="{{ old('address')  ?? $data['address'] ?? '' }}"/>
            </div>
            <div class="form__error">
              @error('address')
              {{$message}}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="text" name="building" placeholder="さくらタワー" value="{{ old('building')  ?? $data['building'] ?? '' }}" >
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">問い合わせの種類</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
            <select class="create-form__item-select" name="category_id">
                <option value="" disabled {{ (old('category_id') ?? $data['category_id'] ?? '') == '' ? 'selected' : '' }}>選択してください</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" {{ (old('category_id') ?? $data['category_id'] ?? '' ) == $category['id']  ? 'selected' : '' }}>{{ $category['content'] }}</option>
                @endforeach
            </select>
            </div>
            <div class="form__error">
              @error('category_id')
              {{$message}}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="detail" placeholder="お問合せ内容をご記載ください">{{ old('detail')  ?? $data['detail'] ?? '' }}</textarea>
            </div>
            <div class="form__error">
                @foreach ($errors->get('detail') as $error)
                    {{$error}}
                @endforeach
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
@endsection
