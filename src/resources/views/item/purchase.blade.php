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
        <select name="payment_method">
            <option disabled selected>選択してください</option>
            <option value="コンビニ払い">コンビニ払い</option>
            <option value="クレジットカード">クレジットカード</option>
        </select>

        <hr>

        <div class="shipping-info">
            <h4>配送先</h4>
            <p>〒 {{ $user->postal_code ?? 'XXX-YYYY' }}</p>
            <p>{{ $user->address ?? 'ここには住所と建物が入ります' }}</p>
            <a href="{{ route('purchase.address', ['item_id' => $item_id]) }}">変更する</a>
        </div>
    </div>

    <div class="purchase-right">
        
    <form action="{{ route('purchase.complete', ['item_id' => $item->id]) }}" method="post">
    @csrf

        <table>
            <tr>
                <td>商品代金</td>
                <td>¥ {{ number_format($item->price) }}</td>
            </tr>
            <tr>
                <td>支払い方法</td>
                <td>
                    <select name="payment_method" required>
                        <option disabled selected>選択してください</option>
                        <option value="コンビニ払い">コンビニ払い</option>
                        <option value="クレジットカード">クレジットカード</option>
                    </select>
                </td>
            </tr>
        </table>

        <button type="submit" class="purchase-btn">購入する</button>
    </form>
    </div>
</div>
@endsection
