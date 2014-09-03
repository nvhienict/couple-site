@extends('main')
@section('title')
Đăng nhập
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="row">
  <div class="col-xs-8 col-md-offset-2">
    @if(isset($messages)) <p class="text-center alert alert-danger">{{$messages}}</p>
    @endif	

      @if(isset($msg)) <p class="alert text-center alert-success">{{$msg}}</p>
      @endif  
  </div>
</div>
<form role="form" action="{{Asset('login')}}" method="post" id="user_login">
  <div class="form-group">
    <label for="txMail">Địa chỉ email</label>
    <input type="email" class="form-control" name="txMail"id="txMail" placeholder="example@gmail.com"> 	
  </div>
  <div class="form-group">
    <label for="txPass">Mật khẩu</label>
    <input type="password" class="form-control" name="txPass" id="txPass" placeholder="******">
  </div>
  <div>
    <label>
      <input type="checkbox"> Ghi nhớ đăng nhập
    </label>
  </div>
  <button type="submit" class="btn btn-large btn-primary">Đăng nhập</button>
  <a href="{{URL::route('register')}}"> Đăng ký</a>
</form>

@endsection