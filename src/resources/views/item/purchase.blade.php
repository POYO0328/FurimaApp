@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">

<div class="purchase-wrapper">
    <div class="purchase-left">
        <img src="{{ asset($item->image_path ?? 'images/default.png') }}" alt="商品画像" class="item-image">
        <h2>{{ $item->item_name }}</h2>
        <p>¥ {{ number_format($item->price) }}</p>

        <hr>

        <h4>支払い方法</h4>
        <select name="payment_method_left" id="payment_method_left" required>
            <option disabled selected>選択してください</option>
            <option value="コンビニ払い">コンビニ払い</option>
            <option value="クレジットカード">カード払い</option>
        </select>

        <hr>

        <div class="shipping-info">
            <h4>配送先</h4>
            <p>〒 {{ $postalCode ?? '---' }}</p>
            <p>{{ $address ?? '---' }}</p>
            <p>{{ $building ?? '' }}</p>
            <a href="{{ route('purchase.address', ['item_id' => $item->id]) }}">変更する</a>
        </div>

    </div>

    <div class="purchase-right">
    <form action="{{ route('purchase.complete', ['item_id' => $item->id]) }}" method="post">
    @csrf
    <input type="hidden" name="payment_method" id="payment_method">

    <table>
        <tr>
            <td>商品代金</td>
            <td>¥ {{ number_format($item->price) }}</td>
        </tr>
        <tr>
            <td>支払い方法</td>
            <td id="payment_method_display">未選択</td>
        </tr>
    </table>

        <button type="submit" class="purchase-btn">購入する</button>
    </form>
    </div>
</div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const leftSelect = document.getElementById('payment_method_left');
        const hiddenInput = document.getElementById('payment_method');
        const displayText = document.getElementById('payment_method_display');

        leftSelect.addEventListener('change', function () {
            const selectedValue = this.value;

            // hiddenフィールドに値をセット（フォーム送信用）
            hiddenInput.value = selectedValue;

            // 表示用のテキストも更新
            displayText.textContent = selectedValue;
        });
    });
</script>
@endpush