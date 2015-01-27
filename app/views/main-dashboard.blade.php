<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>

	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=false" />
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
	
	<link rel="favicon icon" href="{{Asset('icon/favicon.ico')}}">

	<!-- Core Css Files -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
   	<link href="{{Asset("assets/css/dashboard.css")}}" rel="stylesheet">
   	<link href="{{Asset("assets/css/chart/morris.css")}}" rel="stylesheet">
    <link href="{{Asset("assets/css/social-buttons.css")}}" rel="stylesheet">
    <link href="{{Asset("assets/css/sweet-alert.css")}}" rel="stylesheet">
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script src="{{Asset("assets/js/sweet-alert.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>
	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>

	<!-- checklist -->
	<link href="{{Asset("assets/css/jquery.datetimepicker.css")}}" rel="stylesheet">
	<script src="{{Asset('assets/js/jquery.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.datetimepicker.js')}}"></script>
	<script src="{{Asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.number.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.number.min.js')}}"></script>
</head>
<body style="overflow-x:hidden;">

	<div class="row user-header">
		<div class="row to-top">
			<div class="col-xs-8 col-sm-10 col-md-10 col-lg-10">
				
			</div>
			<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
				<ul class="menu-user" style="padding:0;float:right;">
					<li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{UserController::getUserName()}} <span class="caret"></span></a>
			          	<ul class="dropdown-menu drop-user" role="menu" style="left: -125%;">
			            	<li>
			            		<a href="{{Asset('profile')}}">
			            			<i class="fa fa-user"></i>
			            			Thông tin cá nhân
			            		</a>
							</li>
			            	<li class="divider"></li>
			            	<li>
				            	<a href="{{URL::route('logout')}}">
				            		<i class="fa fa-sign-out"></i>
				            		Thoát
				            	</a>
			            	</li>
			          	</ul>
			        </li>
				</ul><!--/.navbar-right-->
			</div>
		</div><!--/.header-top-->

		<div class="row top-logo">
			<div class="col-xs-12 text-center">
				<a href="{{URL::route('index')}}">
			    	<img style="width: 150px; height: 50px;" src="{{Asset('icon/logo-2.png')}}">
			    </a>
			</div>
		</div><!--/.row-->	

		<div class="row top-menu">
			@yield('nav-dash')
		</div><!--/.top-menu-->



	</div>	

	<div class="row center-dashboard">
		
		@yield('total')

		<div class="col-lg-10 col-lg-offset-1 container-content">
			@yield('content')
		</div><!--/.row-->

		<script type="text/javascript">
			var $cssSuccess = $('.progress-bar-success').text();
	    	var $cssWarning = $('.progress-bar-warning').text();
	    	var $cssInfo = $('.progress-bar-info').text();
	    	var $cssDanger = $('.progress-bar-danger').text();

	    	$('.progress-bar-success').css("width", ""+$cssSuccess+"");
	    	$('.progress-bar-warning').css("width", ""+$cssWarning+"");
	    	$('.progress-bar-info').css("width", ""+$cssInfo+"");
	    	$('.progress-bar-danger').css("width", ""+$cssDanger+"");

	    	if ( ($('.tbl-website tr td:eq(1)').text())==='Chưa có' ) {
	    		$('.tbl-website tr').addClass('warning');
	    	} else {
	    		$('.tbl-website tr').addClass('success');
	    	};
		</script>

	</div><!--center-dashboard-->

<!-- footer -->
<div class="col-xs-12 footer">
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
            <div class="site-author">Bản quyền thuộc về thuna.vn © 2014</div>         
        </div>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-left: 0%; margin-top: 5%;">
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
</div>	
<!-- .row -->

<div class="hidden-sm hidden-xs">
	<a href="javascript:void(0);" class="btn btn-top" id="go_top">				
		<i class="fa fa-angle-up fa-3x text-center"></i>
	</a>
</div>
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

	
</body>
</html>

