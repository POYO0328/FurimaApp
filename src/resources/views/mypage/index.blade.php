@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage">
    <div class="profile">
        <img src="{{ asset($user->profile_image_path) }}" alt="ユーザー画像" class="avatar">
        <div class="username">{{ $user->name }}</div>
        <a href="mypage/profile" class="edit-button">プロフィールを編集</a>
    </div>

    <div class="tabs">
        <a href="{{ url('/mypage?page=sell') }}" class="{{ $page === 'sell' ? 'active' : '' }}">出品した商品</a>
        <a href="{{ url('/mypage?page=buy') }}" class="{{ $page === 'buy' ? 'active' : '' }}">購入した商品</a>
    </div>

    <div class="items-grid">
        @if(isset($items) && $items->count())
            @foreach ($items as $item)
                <div class="item-card">
                    <img src="{{ asset($item->image_path) }}" alt="{{ $item->item_name }}">
                    <p>{{ $item->item_name }}</p>
                </div>
            @endforeach
        @else
            <p>出品した商品はありません。</p>
        @endif
    </div>
</div>
@endsection
