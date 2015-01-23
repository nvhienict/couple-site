
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>

	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=false" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Thuna Planner là công ty chuyên cung cấp các dịch vụ cưới hỏi tại Huế và Đà Nẵng. Mong muốn của chúng tôi là mang lại cho khách hàng những trải nghiệm hoàn hảo và tuyệt vời nhất vào những dịp trọng đại như đám cưới, đám hỏi, cẩm...">
	<meta property="og:image" itemprop="thumbnailUrl" content="{{Asset("assets/img/logofb.jpg")}}">
	<meta property="og:title" content="Dịch vụ cưới hỏi Thuna.vn">
	<meta property="og:description" content="Dịch vụ cưới hỏi chuyên nghiệp">
	<meta property="og:url" content="http://thuna.vn">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{Asset("assets/img/logofb.jpg")}}" />
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

	<link rel="favicon icon" href="{{Asset('icon/favicon.ico')}}">

	<!-- Core Css Files -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
   	
	<link href="{{Asset("assets/css/animate.css")}}" rel="stylesheet" />
    <link href="{{Asset("assets/css/style.css")}}" rel="stylesheet">
    <link href="{{Asset("assets/css/social-buttons.css")}}" rel="stylesheet">
	<link href="{{Asset("assets/color/default.css")}}" rel="stylesheet">
	<link href="{{Asset("assets/css/sweet-alert.css")}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/step.web.css")}}">
	<link href="{{Asset("assets/css/dropzone.css")}}" rel="stylesheet">
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script src="{{Asset("assets/js/sweet-alert.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>	 
	<script src="{{Asset("assets/js/jquery.sticky.js")}}"></script>

    <script src="{{Asset("assets/js/jquery.easing.min.js")}}"></script>	
	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>

	<!-- checklist -->
	<link href="{{Asset("assets/css/jquery.datetimepicker.css")}}" rel="stylesheet">
	<script src="{{Asset('assets/js/jquery.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.datetimepicker.js')}}"></script>
	<script src="{{Asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.number.min.js')}}"></script>

	<!-- ckeditor -->
	<script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
	<!-- upload images -->
	<script src="{{Asset("assets/js/dropzone.js")}}"></script>

</head>

<body style="overflow-x:hidden;">

	<!--Header login-->	
	<div class="row user-header">
	
		<script>
		    $(document).ready(function() {
		        $('.fb-like').attr("data-href", document.URL);
		    });
		</script>
	
		<div class="col-sm-4 col-md-4 col-lg-4 hidden-xs">
			<div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
		</div>

		<div class="col-xs-5 col-sm-3 col-lg-2 col-lg-offset-1 text-center">
			<a href="{{URL::route('index')}}">
		    	<img style="width: 100%; height: 65px;" src="{{Asset('icon/logo-thuna.png')}}">
		    </a>
		</div>
		
		<div class="col-xs-5 col-xs-offset-1 col-sm-4 col-md-3 col-lg-3 pull-right wedding-user-logged">
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
		  			<li class="hidden-xs"><a href="{{URL::route('register')}}" style="color: #43609C" title="">
		  					<i class="fa fa-unlock"></i>
		  					Đăng ký
		  				</a>
		  			</li>
		  			<li class="hidden-xs"><a href="{{URL::route('login')}}" style="color: #43609C">
		  					<i class="fa fa-sign-in"></i>
		  					Đăng nhập
		  				</a>
		  			</li>

		  			<!-- display mobile -->
		  			<li class="hidden-md hidden-lg hidden-sm"><a href="{{URL::route('register')}}" style="color: #ED706F">
		  					<i class="fa fa-unlock fa-2x"></i>
		  				</a>
		  			</li>
		  			<li class="hidden-md hidden-lg hidden-sm"><a href="{{URL::route('login')}}" style="color: #3A3A40">
		  					<i class="fa fa-sign-in fa-2x"></i>
		  				</a>
		  			</li>
		  		@else
			  		<li class="hidden-xs"><a href="{{URL::route('register')}}" style="color: #43609C">
			  				<i class="fa fa-unlock"></i>
			  				Đăng ký
			  			</a>
			  		</li>
			  		<li class="hidden-xs"><a href="{{URL::route('login')}}" style="color: #43609C">
			  				<i class="fa fa-sign-in"></i>
			  				Đăng nhập
			  			</a>
			  		</li>

			  		<!-- display mobile -->
		  			<li class="hidden-md hidden-lg hidden-sm"><a href="{{URL::route('register')}}" style="color: #ED706F">
		  					<i class="fa fa-unlock fa-2x"></i>
		  				</a>
		  			</li>
		  			<li class="hidden-md hidden-lg hidden-sm"><a href="{{URL::route('login')}}" style="color: #3A3A40">
		  					<i class="fa fa-sign-in fa-2x"></i>
		  				</a>
		  			</li>

		  		@endif
		</div>
	</div><!-- /.row user-header -->

@yield('nav-bar')
@yield('content')
	<!-- footer -->
	<div class="row footer">
		<div class="col-sm-8 col-md-8 col-lg-8 menu-footer">
			<ul class="hidden-xs" >
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
				</li>		
			</ul>			
			<div class="infor-company hidden-xs" >
                Số 47 , Đường Đỗ Huy Uyển, Phường An Hải, Quận Sơn Trà, Tp. Đà Nẵng<br>
               	Điện thoại: 0966 666 886 | Email:
                <a class="contact-admin" href="mailto:thanh@thuna.vn">thanh@thuna.vn</a><br>
                Chịu trách nhiệm quản lý nội dung: thuna.vn<br>
                <a class="thuna-title" href="http://www.thuna.vn" title="Đám cưới, Ảnh cưới, Áo cưới - Trang thông tin dịch vụ cưới hàng đầu Việt Nam">Đám cưới, Ảnh cưới, Áo cưới - Trang thông tin dịch vụ cưới hàng đầu Việt Nam.</a></h2><br>  
                <div class="site-author">Bản quyền thuộc về thuna.vn &copy; <?php
                	$copyYear = 2015;
                	$curYear  = date('Y');
                	echo $copyYear . ( ($curYear != $copyYear) ? '-' . $curYear : '' );
                ?></div>         
            </div>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: -14%; margin-top: 15%;">
				<p style="font-size: 12px;color: black; font-weight: bold;" href="http://www.thuna.vn">Kết nối với Thuna.vn</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connect-thuna">
				<div class="col-xs-3 col-md-2 col-lg-2">
					<a href="https://www.facebook.com/thuna.weddingplaner?fref=ts" target="_blank">
						<img class="img-responsive" src="{{Asset('icon/fb.jpg')}}">
					</a>
				</div>
				<div class="col-xs-3 col-md-2 col-lg-2">
					<a href="https://www.youtube.com/channel/UCiKbAYqN2YUUKRkRHukt7SA" target="_blank">
					<img class="img-responsive" src="{{Asset('icon/social-youtube.png')}}">
					</a>
				</div>
				<div class="col-xs-3 col-md-2 col-lg-2">
					<a href="https://plus.google.com/u/0/+Thunaplannerwedding" target="_blank">
					<img class="img-responsive" src="{{Asset('icon/g+.jpg')}}">
					</a>
				</div>	
				<div class="col-xs-3 col-md-2 col-lg-2">
					<a href="https://plus.google.com/u/0/+Thunaplannerwedding" target="_blank">
					<img class="img-responsive" src="{{Asset('icon/tw.jpg')}}">
					</a>
				</div>			
			</div>			
		</div>
		<div class="col-md-3 hidden-sm hidden-xs">
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
