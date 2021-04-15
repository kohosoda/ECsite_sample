@extends('app')

@section('title', '購入履歴')

@section('content')
@include('nav')

<div class="container">
  <h1 class="h4 text-center mb-4">{{ $user->name }} 様のマイページ</h1>

  @include('users.tabs', ['hasInfo' => false, 'hasLike' => false, 'hasHistory' => true])

  {{-- 商品一覧をカードで表示していく --}}
  @foreach ($soldItems as $soldItem)
  <div class="row justify-content-center">
    <div class="card mb-3 col-md-10">
      <div class="row">
        <div class="col-md-4">
          <img class="bd-placeholder-img" width="100%"
            src="{{ \Config::get('app.mediaPATH') . $soldItem->src }}" alt="Card image cap">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <div class="card-title">
              <a href="{{ route('item.show', ['item' => $soldItem->id]) }}">{{ $soldItem->name }}</a>
            </div>
            <div class="card-text">
              &yen; {{ $soldItem->price }}
            </div>
            <div class="card-text mt-2">
              購入日：{{ $soldItem->created_at->format('Y年m月d日') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
@endsection