@extends('app')

@section('title', 'マイページ')

@section('content')
@include('nav')

{{-- 登録情報を更新した場合のメッセージ --}}
@if(Session::has('flash_message'))
<div class="alert alert-success">
  {{ session('flash_message') }}
</div>
@endif

<h1 class="h4 text-center mb-4">{{ $user->name }} 様のマイページ</h1>

<div class="container">    
    @include('users.tabs', ['hasInfo' => true, 'hasLike' => false, 'hasHistory' => false])

    @include('users.info')
  </div>
</div>
@endsection