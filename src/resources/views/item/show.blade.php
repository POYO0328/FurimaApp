@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/item.css') }}">

<div class="item-container">
    <!-- 左：商品画像 -->
    <div class="item-image">
        <img src="{{ asset(ltrim($item->image_path, '/')) }}" alt="{{ $item->item_name }}">
    </div>

    <!-- 右：商品詳細 -->
    <div class="item-info">
        <h2 class="item-name">{{ $item->item_name }}</h2>
        <p class="brand-name">{{ $item->brand }}</p>
        <p class="price">¥{{ number_format($item->price) }} <span class="tax-included">（税込）</span></p>

        <div class="icons">
            {{-- ★ お気に入りボタン（今後実装） --}}
            <form action="{{ route('like.toggle', ['item_id' => $item->id]) }}" method="POST">
                @csrf
                <button type="submit" class="icon" style="background: none; border: none; font-size: 24px; cursor: pointer;">
                    {{ $isLiked ? '★' : '☆' }}
                </button>
            </form>
            <span class="icon">💬</span>
        </div>
        <div class="icons">
            <span class="like-count">{{ $likeCount }}</span>
            <span class="comment-count">{{ $comments->count() }}</span>
        </div>

        <form action="{{ route('purchase.confirm', ['item_id' => $item->id]) }}" method="get">
            <button class="purchase-btn">購入手続きへ</button>
        </form>

        <div class="section">
            <div class="section-title">商品説明</div>
            <p>カラー：グレー</p> {{-- ※今後、動的に色を表示できるようにする --}}
            <p>新品<br>商品の状態は良好です。傷もありません。</p>
            <p>購入後、即発送いたします。</p>
        </div>

        <div class="section">
            <div class="section-title">商品の情報</div>
            <p>
                カテゴリー：
                {{-- 今後、カテゴリー表示（配列） --}}
                <span class="tag">{{ $item-> category_id }}</span>
                <span class="tag">洋服</span>
                <span class="tag">メンズ</span>
            </p>
            <p class="condition">商品の状態：{{ $item-> condition }}</p>
        </div>

        <div class="section">
            <div class="section-title">コメント ({{ $comments->count() }})</div>
            @foreach ($comments as $comment)
                <div class="comment">
                    <div class="avatar"></div>
                    <div class="comment-body">
                        <div class="comment-user">{{ $comment->user->name ?? 'ゲスト' }}</div>
                        <div class="comment-text">{{ $comment->comment }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="section">
            <div class="section-comment-title">商品へのコメント</div>
            <form action="{{ route('comment.store', ['item' => $item->id]) }}" method="POST">
                @csrf
                <textarea name="comment" class="comment-box" placeholder="コメントを入力してください"></textarea>
                <button type="submit" class="comment-submit">コメントを送信する</button>
            </form>
        </div>
    </div>
</div>
@endsection
