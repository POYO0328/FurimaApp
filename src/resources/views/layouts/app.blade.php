<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Attendance Management</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <div class="header-utilities">
        <a class="header__logo" href="/">
          <img src="/images/logo.svg" alt="COACHTECH">
        </a>
        <nav>
          <ul class="header-nav">
          <li class="header-serch">
              <form action="/search" method="GET" class="header-search-form">
                  <input type="text" name="keyword" class="header-search-input" placeholder="なにをお探しですか？">
                  <button type="submit" class="header-search-button">🔍</button>
              </form>
          </li>
            @if (Auth::check())
            <li class="header-nav__item">
              <a class="header-nav__link" href="/mypage">マイページ</a>
            </li>
            <li class="header-nav__item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="header-nav__button">ログアウト</button>
            </form>
            </li>
            <li class="header-nav__item">
              <form class="form" action="/sell" method="get">
                <button class="header-nav__button header-nav__button--sell">出品</button>
              </form>
            </li>
            @endif
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>
