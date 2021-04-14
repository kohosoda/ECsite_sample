@extends('app')

@section('title', $item->name . 'の詳細画面')

@section('content')
@include('nav')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mb-2">
        <img class="card-img-top" src="{{ \Config::get('app.mediaPATH') . $item->src }}" alt="Card image cap">
        <div class="card-header">
          {{ $item->name }}
        </div>
        <div class="card-body">
          <h5 class="card-title">商品説明</h5>
          <div class="card-text">
            {{ $item->description }}
          </div>
        </div>
      </div>
    </div>

    @auth
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          &yen; {{ $item->price }}
        </div>
        <div class="card-body">
          <form class="form-group row" method="POST" action="{{ route('cart.store') }}">
            @csrf
            <div class="col-sm-4 col-form-label">
              <label for="quantity">数量：</label>
            </div>
            <div class="col-sm-8">
              <select id="quantity" name="quantity" class="form-control mb-2">
                <option selected>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary btn-block">カートに入れる</button>
              <item-like
                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))'
                endpoint="{{ route('item.like', ['item' => $item]) }}">
              </item-like>
            </div>
        </div>
      </div>
      @endauth

    </div>
  </div>
</div>
@endsection