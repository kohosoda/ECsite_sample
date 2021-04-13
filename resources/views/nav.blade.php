<nav class="navbar navbar-expand navbar-dark peach-gradient mb-3">

  <a class="navbar-brand" href="/"><i class="fas fa-house-damage mr-1"></i>Paramount Furniture</a>

  <ul class="navbar-nav ml-auto">

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest

    @auth
    <li class="nav-item">
      <a href="/cartitem" class="nav-link">
        <i class="fas fa-shopping-cart"></i>カート
      </a>
    </li>

    {{-- ドロップダウンメニュー --}}
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button" onclick="location.href='/mypage'">
          マイページ
        </button>

        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
    {{-- ログアウトボタンのform --}}
    <form id="logout-button" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
    @endauth

  </ul>
</nav>