<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<title>@yield('title')</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="http://thuna.vn/"/>
	<meta property="fb:admins" content="805744042771207"/>
	
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
	<link href="{{Asset("assets/css/jquery.datetimepicker.css")}}" rel="stylesheet">
	<script src="{{Asset('assets/js/jquery.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.datetimepicker.js')}}"></script>
	<script src="{{Asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.number.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.number.min.js')}}"></script>

	<!-- ckeditor -->
	<script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>

</head>
@include('social')
<body>
	<!--Header login-->
	<div class="row user-header">
		<div class="col-lg-3 col-xs-12 pull-right wedding-user-logged">
				@if(Session::has('email'))
				<ul class="user_profile">
					<li >
						<a href="{{Asset('profile')}}">
							<i class="fa fa-user"></i> 
							{{User::where('email',Session::get('email'))->get()->first()->firstname}} 
							{{User::where('email',Session::get('email'))->get()->first()->lastname}}
						</a>
						<!-- <ul class="list-unstyled">
							<li><a href="#">Quản lý nội dung</a></li>
							<li><a href="{{Asset('profile')}}">Thông tin cá nhân</a></li>
							<li><a href="#">Cài đặt tài khoản</a></li>
						</ul> -->
					</li>  

			  		<li><a href="{{URL::route('logout')}}">Thoát</a></li>
					
				</ul>
		  		@else
		  		<li><a href="{{URL::route('login')}}" >Đăng nhập</a></li>
		  		<li><a href="{{URL::route('register')}}">Đăng ký</a></li>
		  		@endif
		</div>
	</div>
	<!-- .row user-header -->
@yield('nav-bar')
@yield('content')
	<!-- footer -->
	<div class="row footer">
		<div class="col-md-6 col-md-offset-3">
			
			<div class="text-center">
				<p>47 Đỗ Huy Uyển, Đà Nẵng<br />
				&copy; Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
			</div>
			
		</div>
		<div class="col-md-3">
			<a href="javascript:void(0);" class="btn btn-top" id="go_top">
				<!-- <img src="{{Asset('icon/top3.png')}}" id="back-top" > -->
				<i class="fa fa-angle-up fa-3x text-center"></i>
			</a>
			<script type="text/javascript">
			(function(){
			    // Cuộn trang lên với scrollTop
			    $('#go_top').click(function(){
			        $('body,html').animate({scrollTop:0},400);
			        return false;
			    })
			})(jQuery)
            $(window).scroll(function(){
			    if( $(window).scrollTop() > 500 ) {
			        $('#go_top').stop(false,true).fadeIn(300);
			    }else{
			        $('#go_top').hide();
			    }
			});
			</script>
			
		</div>
	</div>	
	<!-- .row -->


</body>

</html>
