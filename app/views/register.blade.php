@extends('main')
@section('title')
Register
@endsection
@section('content')
<!-- <div>
  <h1>Create an acount</h1>
</div>  
@if(isset($messages)) <p class="text-center alert alert-danger">{{$messages}}</p>
		@endif	
<form role="form" action="create_acount" method="post" id="create_acount">
  <div class="form-group">
    <label for="txFname">First name</label>
    <input type="text" class="form-control" name="txFname"id="txFname" placeholder="First name">  
  </div>
  <div class="form-group">
    <label for="txLname">Last name</label>
    <input type="text" class="form-control" name="txLname"id="txLname" placeholder="Last name">  
  </div>
  <div class="form-group">
    <label for="Weddingdate">Wedding date</label>
    <input type="date" class="form-control" name="Weddingdate"id="Weddingdate" placeholder="Last name">  
  </div>
  <div class="form-group">
    <label for="txMail">Email address</label>
    <input type="email" class="form-control" name="txMail"id="txMail" placeholder="Enter email"> 	
  </div>
  <div class="form-group">
    <label for="txPass">Password</label>
    <input type="password" class="form-control" name="txPass" id="txPass" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-large btn-primary">Register</button>
</form>
</div> -->

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form role="form">
      <h2>Please Sign Up <small>It's free and always will be.</small></h2>
      
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="weddingdate" id="weddingdate" class="form-control input-lg" placeholder="Wedding date" tabindex="3">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
          </div>
        </div>
      </div>
      
      
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
        <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block btn-lg">Sign In</a></div>
      </div>
    </form>
  </div>
</div>
@endsection