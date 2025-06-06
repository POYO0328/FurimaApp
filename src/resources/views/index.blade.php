@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__alert">
  {{-- メッセージ機能 --}}
</div>

<div class="top__nav">
  <a href="{{ url('/') }}" class="top__nav-link {{ request('page') !== 'mylist' ? 'active' : '' }}">おすすめ</a>
  <a href="{{ url('/?page=mylist') }}" class="top__nav-link {{ request('page') === 'mylist' ? 'active' : '' }}">マイリスト</a>
</div>

<hr style="border-color: #ccc; margin: 10px 0;">

<div class="product__list">
  @foreach ($items as $item)
    <div class="product__item">
      <a href="{{ url('item/' . $item->id) }}">
        <img src="{{ asset(ltrim($item->image_path, '/')) }}" alt="{{ $item->item_name }}" class="product__image">
      </a>
      <div class="product__name">{{ $item->item_name }}</div>
    </div>
  @endforeach
</div>
@endsection
