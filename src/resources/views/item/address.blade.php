@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">

<div class="address-form__content">
    <h1 class="address-form__heading">住所の変更</h1>

    <form method="POST" action="{{ route('purchase.address.submit', ['item_id' => $item_id]) }}" class="address-form">
        @csrf

        <div class="form__group">
            <div class="form__group-title">
                <label for="address" class="form__label--item">住所</label>
            </div>
            <div class="form__input--text">
                <input type="text" name="address" id="address" value="{{ old('address') }}" required>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <label for="city" class="form__label--item">市区町村</label>
            </div>
            <div class="form__input--text">
                <input type="text" name="city" id="city" value="{{ old('city') }}" required>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <label for="postal_code" class="form__label--item">郵便番号</label>
            </div>
            <div class="form__input--text">
                <input type="text" name="postal_code" id="postal_code" value="{{ old('postal_code') }}" required>
            </div>
        </div>

        <div class="form__button">
            <button type="submit" class="form__button-submit">次へ（確認画面）</button>
        </div>
    </form>
</div>
@endsection
