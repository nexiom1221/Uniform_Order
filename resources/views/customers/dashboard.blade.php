@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>マイページ</strong></div>

        <div class="panel-body">
        <strong>今ログインされている方は {{ Auth::user()->name }} 様でございます。</strong>
        </div>
      </div>
    </div>
  </div>


  @foreach($customers as $customer)
  
    @if(Auth::user()->id == $customer->id)

    ID : {{ $customer-> id}} <br>
    氏名 : {{ $customer-> name}} <br>
    e-mail : {{ $customer-> email}} <br>
    郵便番号 : {{ $customer-> zipcode}} <br>
    住所 : {{ $customer-> address }} <br>
    電話番号 : {{ $customer-> phone_number}} <br>
    生年月日 : {{ $customer-> date_of_birth }} <br>
    性別 : {{ $customer-> gender }} <br>
    自己紹介 : {{ $customer-> profile }} <br>
    POINT : {{ $customer-> points }} <br>
    登録日 : {{ $customer-> created_at }} <br>

    @endif

  @endforeach

@endsection


