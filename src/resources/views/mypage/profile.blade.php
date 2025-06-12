@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-form__content">
  <div class="register-form__heading">
    <h2>プロフィール設定</h2>
  </div>

  @if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
  @endif

  <form class="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf

    <div style="display: flex; align-items: center; margin-bottom: 20px;">
      <div class="profile-image-wrapper">
        <img
          id="current-profile-image"
          src="{{ $user->profile_image_path ? asset($user->profile_image_path) : asset('/images/onions.jpg') }}"
          alt="プロフィール画像"
        >
      </div>
      <div style="margin-left: 20px;">
        <label for="profile_image" class="custom-file-upload">画像を選択</label>
        <input type="file" name="profile_image" id="profile_image" onchange="previewImage(event)">
        <div id="file-name" class="file-name"></div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">ユーザー名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">郵便番号</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}">
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" value="{{ old('address', $user->address) }}">
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" value="{{ old('building', $user->building) }}">
        </div>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">更新する</button>
    </div>
  </form>
</div>

<script>
function previewImage(event) {
  const file = event.target.files[0];
  const previewImage = document.getElementById('current-profile-image');
  const fileNameDisplay = document.getElementById('file-name');

  fileNameDisplay.textContent = '';

  if (file && file.type.startsWith('image/')) {
    fileNameDisplay.textContent = `選択されたファイル: ${file.name}`;

    const reader = new FileReader();
    reader.onload = function(e) {
      previewImage.src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}
</script>
@endsection
