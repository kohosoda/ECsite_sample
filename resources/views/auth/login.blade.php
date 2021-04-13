@extends('app')

@section('title', 'ログイン')

@section('content')
<div class="container">
  <div class="row">
    <div class="mx-auto col col-sm-10 col-md-8 col-lg-6">
      <h1 class="text-center"><a class="text-dark" href="/"><i class="fas fa-house-damage mr-1"></i>Paramount
          Furniture</a></h1>
      <div class="card mt-3">
        <div class="card-body text-center">
          <h2 class="h3 card-title text-center mt-2">ログイン</h2>

          @include('error_card_list')

          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="md-form">
              <label for="email">メールアドレス</label>
              <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
            </div>

            <div class="md-form">
              <label for="password">パスワード</label>
              <input class="form-control" type="password" id="password" name="password" required>
            </div>

            <input type="hidden" name="remember" id="remember" value="on">

            <button class="btn btn-block peach-gradient mt-2 mb-2" type="submit">ログイン</button>

            <div class="mt-0">
              <a href="{{ route('register') }}" class="card-text">ユーザー登録はこちら</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection