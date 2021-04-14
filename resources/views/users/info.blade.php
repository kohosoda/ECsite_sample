{{-- ユーザーの登録情報の更新画面 --}}
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card">
      <div class="card-header">
        ご登録情報
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('mypage.store') }}">
          @csrf
          <div class="form-group">

            <label for="name">氏名</label>
            @if(Request::has('confirm'))
            <p class="form-control-static">{{ old('name') }}</p>
            <input id="name" type="hidden" name="name" value="{{ old('name') }}">
            @else
            <input id="name" type="text" class="form-control" name="name"
              value="{{ old('name') ?? $user->name  }}">
            @endif
          </div>

          <div class="form-group">
            <label for="email">メールアドレス</label>
            @if(Request::has('confirm'))
            <p class="form-control-static">{{ old('email')}}</P>
            <input id="name" type="hidden" name="email" value="{{ old('email') }}">
            @else
            <input id="email" type="email" class="form-control" name="email"
              value="{{ old('email') ?? $user->email }}">
            @endif
          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="postalcode">郵便番号</label>
              @if(Request::has('confirm'))
              <p class="form-control-static">{{ old('postalcode')}}</p>
              <input id="postalcode" type="hidden" name="postalcode" value="{{ old('postalcode') }}">
              @else
              <input id="postalcode" type="text" class="form-control" name="postalcode" value="{{ old('postalcode') ?? $user->postalcode }}">
              @endif
            </div>
            <div class="form-group col-md-4">
              <label for="region">都道府県</label>
              @if(Request::has('confirm'))
              <p class="form-control-static">{{ old('region')}}</p>
              <input id="region" type="hidden" name="region" value="{{ old('region') }}">
              @else
              <select id="region" class="form-control" name="region">
                <option>選択してください</option>
                @foreach(Config::get('region') as $value)
                <option @if(old('region')==$value || $user->region==$value) selected @endif>{{ $value }}</option>
                @endforeach
              </select>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="addressline1">住所1</label>
            @if(Request::has('confirm'))
            <p class="form-control-static">{{ old('addressline1')}}</p>
            <input id="addressline1" type="hidden" name="addressline1" value="{{ old('addressline1') }}">
            @else
            <input id="addressline1" type="text" class="form-control" name="addressline1"
              value="{{ old('addressline1') ?? $user->addressline1 }}" placeholder="例) 東京都〇〇区〇〇">
            @endif
          </div>

          <div class="form-group">
            <label for="addressline2">住所2</label>
            @if(Request::has('confirm'))
            <p class="form-control-static">{{ old('addressline2')}}</p>
            <input id="addressline2" type="hidden" name="addressline2"  value="{{ old('addressline2') }}">
            @else
            <input id="addressline2" type="text" class="form-control" name="addressline2"
              value="{{ old('addressline2') ?? $user->addressline2 }}" placeholder="例) マンション名 〇号室">
            @endif
          </div>

          <div class="form-group">
            <label for="phonenumber">電話番号</label>
            @if(Request::has('confirm'))
            <p class="form-control-static">{{ old('phonenumber') }}</p>
            <input id="phonenumber" type="hidden" name="phonenumber" value="{{ old('phonenumber') }}">
            @else
            <input id="phonenumber" type="text" class="form-control" name="phonenumber"
              value="{{ old('phonenumber') ?? $user->phonenumber }}">
            @endif
          </div>

          <div class="form-row">
            <div clas="col-md-6">
                @if(Request::has('confirm'))
                <button type="submit" class="btn btn-primary" name="post">登録情報を更新する</button>
                <button type="submit" class="btn btn-default" name="back">修正する</button>
                @else
                <button typen type="submit" class="btn btn-primary" name="confirm">入力内容を確認する</button>
                @endif
            </div>
        </div>

      </div>
    </div>
  </div>
</div>