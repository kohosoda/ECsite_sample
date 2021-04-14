@extends('app')

@section('title', 'カート一覧')

@section('content')
@include('nav')

{{-- カートの商品を更新した場合のメッセージ --}}
@if(Session::has('flash_message'))
<div class="alert alert-success">
  {{ session('flash_message')}}
</div>
@endif

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        @foreach ($cartItems as $cartItem)
        <div class="card-header">
          <a href="/item/{{ $cartItem->item_id }}">{{ $cartItem->name }}</a>
        </div>
        <div class="card-body">
          <div>
            {{ $cartItem->price }} 円
          </div>
          <div class="form-inline">
            <!-- 数量を更新するフォームに変更 -->
            {{-- <form method="POST" action="/cartitem/{{ $cartItem->id }}"> --}}
            <form method="POST" action="{{ route('cart.update', ['cartItem' => $cartItem->id]) }}">
              @method('PUT')
              @csrf
              <input type="text" class="form-control" name="quantity" value="{{ $cartItem->quantity }}">
              個
              <button type="submit" class="btn btn-primary">更新</button>
            </form>
            <!-- 削除フォームを追加 -->
            <form method="POST" action="{{ route('cart.destroy', ['cartItem' => $cartItem->id]) }}">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-primary ml-1">カートから削除する</button>
            </form>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          小計
        </div>
        <div class="card-body">
          {{ $subtotal }} 円
        </div>
        <form method="POST" action="{{ route('soldItem.store') }}" class="form-group">
          @csrf
          @foreach($cartItems as $cartItem)
            <input type="hidden" name="cartItems" value="{{ $cartItems }}">
          @endforeach
          <button class="btn btn-primary" type="submit">購入を決定</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection