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
	

	<!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
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
<body>

	<div class="row header-top">
		<div class="col-xs-3">
			<a href="{{URL::route('index')}}">
	      		<img class="img-logo" src="{{Asset('icon/logo-thuna.png')}}">
	      	</a>
		</div>
		<div class="col-xs-4 col-xs-offset-5">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{UserController::getUserName()}} <span class="caret"></span></a>
		          	<ul class="dropdown-menu" role="menu">
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

		</ul><!--/.nav navbar-nav-->
		</div>
		
	</div><!--/.header-top-->

	<nav class="navbar navbar-default navbar-fixed-top">
	  	<div class="container-fluid">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
		      	</button>
		      	
		    </div>

		  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  		<ul class="nav navbar-nav">
		  			<li><a href="{{URL::route('index')}}" ><i class="fa fa-home fa-1x"></i> Trang chủ</a></li>
			        <li><a href="{{URL::route('guest-list')}}" >Danh sách khách mời</a></li>
			        <li><a href="{{URL::route('user-checklist')}}"  >Danh sách công việc</a></li>
			        <li><a href="{{URL::route('budget')}}"  >Quản lý ngân sách</a></li>
				    <li><a href="{{URL::route('website')}}"  >Website cưới</a></li>
			       	<li class="dropdown">
			          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Âm nhạc <span class="caret"></span></a>
			          	<ul class="dropdown-menu" role="menu">
			            	<li><a href="{{URL::route('songs', array('mo-dau'))}}">Mở đầu</a></li>
			              	<li><a href="{{URL::route('songs', array('doan-ruoc'))}}">Đoàn rước</a></li>
			              	<li><a href="{{URL::route('songs', array('nghi-thuc'))}}">Nghi thức</a></li>
			              	<li><a href="{{URL::route('songs', array('ket-thuc'))}}">Kết thúc</a></li>
			            	<li class="divider"></li>
			            	<li><a href="{{URL::route('songs', array('khai-tiec'))}}">Khai tiệc</a></li>
		                  	<li><a href="{{URL::route('songs', array('phat-bieu'))}}">Phát biểu</a></li>
		                  	<li><a href="{{URL::route('songs', array('cat-banh'))}}">Cắt bánh</a></li>
		               		<li><a href="{{URL::route('songs', array('vao-tiec'))}}">Vào tiệc</a></li>
		                  	<li><a href="{{URL::route('songs', array('chuc-mung'))}}">Chúc mừng</a></li>
		                  	<li><a href="{{URL::route('songs', array('cuoi-tiec'))}}">Cuối tiệc</a></li>
			          	</ul>
			        </li>
			        <li><a href="{{URL::action('FortuneController@getIndex')}}" >Xem ngày cưới</a></li>


		  	</div><!--/.collapse navbar-collapse-->

		</div><!--/.container-fluid-->
	</nav><!--/navbar-fixed-top-->
	<div class="col-xs-12 lr-menu"></div><!--/.lr-menu-->

	<div id='container' style="margin-top:10%;">
		<div class="row" style="margin:0px;">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<h1 style="padding-left:2%; color:#E75292;">Giao diện Website</h1>
			</div>
			<div class="col-md-1"></div>
		</div>
		<!-- .row -->
		<div class="row" style="margin:0px;">
			<div class="col-md-1"></div>
			<div class="col-md-10 choose_temp">

					@for($i=1; $i<=21; $i++)

						<div class="col-sm-4 col-lg-4 col-md-4 hover-theme" style="margin-top:2%;">
							<div class="span_choose_tmp">
								<a href="javascript:void(0);">
									<img style="width: 100%; height: 300px " src="{{Asset("images/website/tmp/{$i}.jpg")}}">
								</a>
							</div>
							<a href="{{URL::route('view_theme', array('id'=>"{$i}"))}}" target="b_blank" class="btn btn-default btn-pre">Xem trước</a>		
							<a href="{{URL::route('header-website', array('id'=>"{$i}"))}}" class="btn btn-default btn-select">Chọn</a>
			  			</div>

					@endfor

			</div>
			<div class="col-md-1"></div>
		</div>
		<!-- .row -->
	</div>
	<!-- .container -->

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
