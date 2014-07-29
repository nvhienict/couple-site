@extends('main')
@section('title')
Login
@endsection
@section('content')
@if(isset($messages)) <p class="text-center alert alert-danger">{{$messages}}</p>
		@endif	
<form role="form" action="user_login" method="post" id="user_login">
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
  <button type="submit" class="btn btn-large btn-primary">Sing in</button>
</form>

@endsection