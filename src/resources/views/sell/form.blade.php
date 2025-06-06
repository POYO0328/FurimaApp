@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">

<div class="sell-container">
    <h2 class="title">商品の出品</h2>

    <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="image">商品画像</label>
            <input type="file" name="image" id="image">
            {{-- 今後：画像プレビュー機能 --}}
        </div>

        <div class="form-subtitle-group">
            <label for="image" class="form-subtitle-label">商品の詳細</label>
        </div>
        <hr class="hr-gray">

        <div class="form-group">
            <label for="categories">カテゴリー</label>
            <div class="category-buttons">
                @foreach($categories as $category)
                    <label class="category-button">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="condition">商品の状態</label>
            <select name="condition" id="condition">
                <option value="">選択してください</option>
                <option value="新品">新品</option>
                <option value="目立った傷なし">目立った傷なし</option>
                <option value="やや傷あり">やや傷あり</option>
            </select>
        </div>


        <div class="form-subtitle-group">
            <label for="image" class="form-subtitle-label">商品名と説明</label>
        </div>
        <hr class="hr-gray">

        <div class="form-group">
            <label for="item_name">商品名</label>
            <input type="text" name="item_name" id="item_name" required>
        </div>

        <div class="form-group">
            <label for="item_name">ブランド名</label>
            <input type="text" name="item_name" id="item_name" required>
        </div>

        <div class="form-group">
            <label for="description">商品の説明</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="price">販売価格</label>
            <input type="number" name="price" id="price" required>
        </div>

        <div class="form-buttons">
            <button type="submit" class="submit-btn">出品する</button>
        </div>
    </form>
</div>
@endsection
