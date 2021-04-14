{{-- タブの表示 --}}
<ul class="nav nav-tabs nav-justified mb-4">
  <li class="nav-item">
    <a class="nav-link text-dark {{ $hasInfo ? 'active' : '' }}"
      href="{{ route('mypage.show') }}">
      ご登録情報
  </a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-dark {{ $hasLike ? 'active' : '' }}"
      href="{{ route('mypage.like') }}">
      お気に入り
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-dark {{ $hasHistory ? 'active' : '' }}"
      href="{{ route('mypage.history') }}">
      購入履歴
    </a>
  </li>
</ul>