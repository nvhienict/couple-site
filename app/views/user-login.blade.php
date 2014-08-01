@extends('main')
@section('title')
Login
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
    <label for="txMail">Email address</label>
    <input type="email" class="form-control" name="txMail"id="txMail" placeholder="Enter email"> 	
  </div>
  <div class="form-group">
    <label for="txPass">Password</label>
    <input type="password" class="form-control" name="txPass" id="txPass" placeholder="Password">
  </div>
  <div>
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-large btn-primary">Sign-in</button>
  <a href=""> Register</a>
</form>

@endsection