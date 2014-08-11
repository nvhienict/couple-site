<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
	<link href="{{Asset("assets/css/nivo-lightbox.css")}}" rel="stylesheet" />
	<link href="{{Asset("assets/css/nivo-lightbox-theme/default/default.css")}}" rel="stylesheet" type="text/css" />
	<link href="{{Asset("assets/css/owl.carousel.css")}}" rel="stylesheet" media="screen" />
    <link href="{{Asset("assets/css/owl.theme.css")}}" rel="stylesheet" media="screen" />
	<link href="{{Asset("assets/css/flexslider.css")}}" rel="stylesheet" />
	<link href="{{Asset("assets/css/animate.css")}}" rel="stylesheet" />
    <link href="{{Asset("assets/css/style.css")}}" rel="stylesheet">
	<link href="{{Asset("assets/color/default.css")}}" rel="stylesheet">
	
	 <!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>	 
	<script src="{{Asset("assets/js/jquery.sticky.js")}}"></script>
	<script src="{{Asset("assets/js/jquery.flexslider-min.js")}}"></script>
    <script src="{{Asset("assets/js/jquery.easing.min.js")}}"></script>	
	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>
	<script src="{{Asset("assets/js/jquery.appear.js")}}"></script>
	<script src="{{Asset("assets/js/stellar.js")}}"></script>
	<script src="{{Asset("assets/js/wow.min.js")}}"></script>
	<script src="{{Asset("assets/js/owl.carousel.min.js")}}"></script>
	<script src="{{Asset("assets/js/nivo-lightbox.min.js")}}"></script>
	    <script src="{{Asset("assets/js/custom.js")}}"></script>
	<script src="{{Asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>

	<!-- checklist -->
	
	<script src="{{Asset('assets/js/jquery.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.datetimepicker.js')}}"></script>
	<script src="{{Asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>

	


</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!--Header login-->
	<div class="row user-header">
		<div class="col-lg-3 col-xs-12 pull-right wedding-user-logged">	
		  	<ul class="" role="tablist">
		  		@if(Session::has('email')) 
		  		<li><a href="#">Hi! {{Session::get('email')}}</a></li>
		  		<li><a href="{{URL::route('logout')}}">Thoát</a></li>
		  		@else
		  		
		  		<li><a href="#">Chào Bạn!</a></li>
		  		<li><a href="{{URL::route('login')}}">Đăng nhập</a></li>
		  		<li><a href="{{URL::route('register')}}">Đăng ký</a></li>
		  		@endif
		  	</ul>
		</div>
	</div>
@yield('nav-bar')
@yield('content')
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					
					<div class="text-center">
						<a href="#intro" class="totop"><i class="fa fa-angle-up fa-3x"></i></a>

						<p>119 Đặng Công Trứ, Thành phố Huế<br />
						&copy;Copyright 2014 - Shuffle. Designed by <a href="http://bootstraptaste.com">Bootstraptaste</a></p>
					</div>
				</div>
			</div>	
		</div>
	</footer>
</body>

</html>
