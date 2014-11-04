<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>

	<title>@yield('title')</title>
	<meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
	<meta property="og:image" itemprop="thumbnailUrl" content="{{Asset("assets/img/logo.png")}}">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="Dịch vụ cưới hỏi Thuna.vn">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{Asset("assets/img/logo.png")}}" />
	<meta property="fb:app_id" content="692038267552175" />
	
	<script type="text/javascript">
		// Test for the ugliness.
		if (window.location.hash == '#_=_'){

		    // Check if the browser supports history.replaceState.
		    if (history.replaceState) {

		        // Keep the exact URL up to the hash.
		        var cleanHref = window.location.href.split('#')[0];

		        // Replace the URL in the address bar without messing with the back button.
		        history.replaceState(null, null, cleanHref);

		    } else {

		        // Well, you're on an old browser, we can get rid of the _=_ but not the #.
		        window.location.hash = '';

		    }

		}
	</script>
	

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
	<link href="{{Asset("assets/css/sweet-alert.css")}}" rel="stylesheet">
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script src="{{Asset("assets/js/sweet-alert.min.js")}}"></script>
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

<body style="padding-right: 15px;">

	<!--Header login-->	
	<div class="row user-header">
	
	<script>
	    $(document).ready(function() {
	        $('.fb-like').attr("data-href", document.URL);
	    });
	</script>
	
		<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
			<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
		</div>
		
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pull-right wedding-user-logged">
				@if( (Session::has('email')) && (UserController::isset_user())!=0 )
				<ul class="user_profile">
					<li >
						<a href="{{Asset('profile')}}">
							<i class="fa fa-user"></i> 
							{{User::where('email',Session::get('email'))->get()->first()->firstname}} 
							{{User::where('email',Session::get('email'))->get()->first()->lastname}}
						</a>
						
					</li>  

			  		<li><a href="{{URL::route('logout')}}">Thoát</a></li>
					
				</ul>
		  		@elseif( (Session::has('email')) && (UserController::isset_user())==0 )
		  			<?php UserController::get_logout_2(); ?>
		  			<li><a href="{{URL::route('login')}}" >Đăng nhập</a></li>
		  			<li><a href="{{URL::route('register')}}">Đăng ký</a></li>
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
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 menu-footer">
			<ul >
				<li>
					<a href="{{URL::route('introduce')}}" >Giới thiệu</a>
					&nbsp;&nbsp;|&nbsp;&nbsp; 
					<a href="{{URL::route('term')}}" >Điều khoản sử dụng</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="{{URL::route('policy')}}" >Chính sách riêng tư</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="{{URL::route('question')}}" >Câu hỏi thường gặp</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="{{URL::route('contact')}}" >Liên hệ</a>
					&nbsp;&nbsp;|&nbsp;&nbsp;
					<a href="{{URL::route('sitemap')}}" >SiteMap</a>
					&nbsp;&nbsp;
				</li>		
			</ul>			
			<div class="infor-company" >
                Số 47 , Đường Đỗ Huy Uyển, Phường An Hải, Quận Sơn Trà, Tp. Đà Nẵng<br>
               	Điện thoại: 0966 666 886 | Email:
                <a class="contact-admin" href="mailto:thanh@thuna.vn">thanh@thuna.vn</a><br>
                Chịu trách nhiệm quản lý nội dung: thuna.vn<br>
                Giấy phép hoạt động trang thông tin điện tử tổng hợp<br>
                Giấy xác nhận cung cấp dịch vụ mạng xã hội trực tuyến<br>
                <a class="thuna-title" href="http://www.thuna.vn" title="Đám cưới, Ảnh cưới, Áo cưới - Trang thông tin dịch vụ cưới hàng đầu Việt Nam">Đám cưới, Ảnh cưới, Áo cưới - Trang thông tin dịch vụ cưới hàng đầu Việt Nam.</a></h2><br>  
                <div class="site-author">Bản quyền thuộc về thuna.vn © 2014</div>         
            </div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -73px; margin-top: 20px;">
				<p style="font-size: 12px;color: black; font-weight: bold;" href="http://www.thuna.vn">Kết nối với Thuna.vn</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connect-thuna">
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<a href="https://www.facebook.com/thuna.weddingplaner?fref=ts" target="_blank">
						<img class="img-responsive" src="{{Asset('icon/fb.jpg')}}">
					</a>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<a href="https://www.youtube.com/channel/UCiKbAYqN2YUUKRkRHukt7SA" target="_blank">
					<img class="img-responsive" src="{{Asset('icon/social-youtube.png')}}">
					</a>
				</div>
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<a href="https://plus.google.com/u/0/+Thunaplannerwedding" target="_blank">
					<img class="img-responsive" src="{{Asset('icon/g+.jpg')}}">
					</a>
				</div>	
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<a href="https://plus.google.com/u/0/+Thunaplannerwedding" target="_blank">
					<img class="img-responsive" src="{{Asset('icon/tw.jpg')}}">
					</a>
				</div>			
			</div>			
		</div>

		<!-- <div class="">
			
			<div class="text-center">
				<p>47 Đỗ Huy Uyển, Đà Nẵng<br />
				&copy; Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
			</div>
			
		</div> -->
		<div class="col-md-3">
			<a href="javascript:void(0);" class="btn btn-top" id="go_top">				
				<i class="fa fa-angle-up fa-3x text-center"></i>
			</a>
		</div>
	</div>	
	<!-- .row -->
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


<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=943743042306339&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


</body>

</html>
