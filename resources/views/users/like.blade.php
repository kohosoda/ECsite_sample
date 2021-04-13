@extends('app')

@section('title', 'お気に入り')

@section('content')
@include('nav')

<div class="container">
  <h1 class="h4 text-center mb-4">{{ $user->name }} 様のマイページ</h1>

  @include('users.tabs', ['hasInfo' => false, 'hasLike' => true, 'hasHistory' => false])

  {{-- 商品一覧をカードで表示していく --}}
  @foreach ($items as $item)
  <div class="row justify-content-center">
    <div class="card mb-3 col-md-10">
      <div class="row">
        <div class="col-md-4">
          <img class="bd-placeholder-img" width="100%"
            src="{{ \Config::get('app.mediaPATH') . $item->src }}" alt="Card image cap">
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <div class="card-title">
              <a href="{{ route('item.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
            </div>
            <div class="card-text">
              &yen; {{ $item->price }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
@endsection