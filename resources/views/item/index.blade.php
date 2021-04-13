@extends('app')

@section('title', '商品一覧')

@section('content')
@include('nav')

{{-- カートに商品を追加した場合のメッセージ --}}
@if(Session::has('flash_message'))
<div class="alert alert-success">
  {{ session('flash_message')}}
</div>
@endif

{{-- 商品の一覧表示 --}}
<div class="container">
  <div class="row justify-content-center">
    @foreach ($items as $item)
    <div class="col-md-4 mb-3">
      <div class="card">
        <img class="card-img-top" height="200" src="{{ \Config::get('app.mediaPATH') . $item->src }}" alt="Card image cap">
        <div class="card-header">
          <a href="{{ route('item.show', ['item' => $item->id]) }}">{{ $item->name }}</a>
        </div>
        <div class="card-body">
          &yen; {{ $item->price }}
        </div>
      </div>
    </div>
    @endforeach
  </div>

  {{-- ペジネーション用のリンク --}}
  <div class="row justify-content-center">
    {{ $items->links() }}
  </div>

</div>
@endsection