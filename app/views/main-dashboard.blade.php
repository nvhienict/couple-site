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
		      	<a class="navbar-brand" href="{{URL::route('index')}}">
		      		<img class="img-logo" src="{{Asset('icon/logo-thuna.png')}}">
		      	</a>
		    </div>

		  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  		<ul class="nav navbar-nav">
		  			<li class="hidden-md hidden-lg"><a href="{{URL::route('index')}}" ><i class="fa fa-home fa-1x"></i> Trang chủ</a></li>
			        <li class="hidden-md hidden-lg"><a href="{{URL::route('guest-list')}}" >Danh sách khách mời</a></li>
			        <li class="hidden-md hidden-lg"><a href="{{URL::route('user-checklist')}}"  >Danh sách công việc</a></li>
			        <li class="hidden-md hidden-lg"><a href="{{URL::route('budget')}}"  >Quản lý ngân sách</a></li>
				    <li class="hidden-md hidden-lg"><a href="{{URL::route('website')}}"  >Website cưới</a></li>
			       

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


		  	</div><!--/.collapse navbar-collapse-->

		</div><!--/.container-fluid-->
	</nav><!--/navbar-fixed-top-->

	
	<div class="row center-dashboard">
		<div class="col-md-2 menu-left">
			<div class="menu-left-title">Menu</div><!--/.menu-left-title-->
			<div class="menu-left-item">
				<a href="{{URL::route('index')}}" >Trang chủ</a>
			</div>
			<div class="menu-left-item">
				<a href="{{URL::route('guest-list')}}" >Danh sách khách mời</a>
			</div>
			<div class="menu-left-item">
				<a href="{{URL::route('user-checklist')}}"  >Danh sách công việc</a>
			</div>
			<div class="menu-left-item">
				<a href="{{URL::route('budget')}}"  >Quản lý ngân sách</a>
			</div>
			<div class="menu-left-item">
				<a href="{{URL::route('website')}}"  >Website cưới</a>
			</div><!--/.menu-left-item-->
		</div><!--/.menu-left-->
		<div class="col-md-10 content">

		<div class="col-md-3 col-sm-6 content-index-item">
			<div class="div-1">
				<i class="fa fa-file-text-o"></i>
				Danh sách công việc
			</div>
			<div class="div-2">
				Hoàn thành<br />
				<span>
					{{ChecklistController::countTasksComplete()}}/{{ChecklistController::countTasksToDo()}}
					&nbsp({{ChecklistController::countTasksCompletePercent()}}%)
				</span>
			</div>
			<div class="div-3">
				<a href="{{URL::route('user-checklist')}}">
					Xem chi tiết
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 content-index-item">
			<div class="div-1">
					<i class="fa fa-group"></i>
					Danh sách khách mời
				</div>
				<div class="div-2">
					Hoàn thành<br />
					<span>
						{{GuestController::getGuestInvited()}}/{{GuestController::getAllGuest()}}
						&nbsp({{GuestController::getGuestInvitedPercent()}}%)
					</span>
				</div>
				<div class="div-3">
					<a href="{{URL::route('guest-list')}}">
						Xem chi tiết
						<i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 content-index-item">
				<div class="div-1">
					<i class="fa fa-dollar"></i>
					Quản lý ngân sách
				</div>
				<div class="div-2">
					Hoàn thành<br />
					<span>
						{{UserBudgetController::getDisplayMoneyTotal('pay')}}/{{UserBudgetController::getDisplayMoneyTotal('actual')}}
						&nbsp({{UserBudgetController::getDisplayMoneyTotalPercent()}}%)
					</span>
				</div>
				<div class="div-3">
					<a href="{{URL::route('budget')}}">
						Xem chi tiết
						<i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 content-index-item">
				<div class="div-1">
					<i class="fa fa-globe"></i>
					Website cưới
				</div>
				<div class="div-2">
					Hoàn thành<br />
					<span>
						{{WebsiteController::getCountDataPercent()}}%
					</span>
				</div>
				<div class="div-3">
					<a href="{{URL::route('website')}}">
						Xem chi tiết
						<i class="fa fa-arrow-circle-right"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-12 site-map">
				{{UserController::getUrl()}}
			</div><!--/.site-map-->

			@yield('content')
		</div>
	</div>

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


	
</body>
</html>

