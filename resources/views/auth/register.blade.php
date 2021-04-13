@extends('app')

@section('title', 'ユーザー登録')

@section('content')
<div class="container">
  <div class="row">
    <div class="mx-auto col col-sm-10 col-md-8 col-lg-6">
      <h1 class="text-center"><a class="text-dark" href="/"><i class="fas fa-house-damage mr-1"></i>Paramount Furniture</a></h1>
      <div class="card mt-3">
        <div class="card-body text-center">
          <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>

          {{-- バリデーション失敗時のエラーを表示 --}}
          @include('error_card_list') 

          <div class="card-text">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <div class="md-form">
                <label for="name">ユーザー名</label>
                <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                <small>※登録後の変更はできませんのでご注意ください。</small>
              </div>

              <div class="md-form">
                <label for="email">メールアドレス</label>
                <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
              </div>

              <div class="md-form">
                <label for="password">パスワード</label>
                <input class="form-control" type="password" id="password" name="password" required>
              </div>

              <div class="md-form">
                <label for="password_confirmation">パスワード(確認用)</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                  required>
              </div>

              <button class="btn btn-block peach-gradient mt-2 mb-2" type="submit">ユーザー登録</button>
            </form>

            <div class="mt-0">
              <a href="{{ route('login') }}" class="card-text">ログインの方はこちら</a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection