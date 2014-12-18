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

<!-- menu top mobile -->
	<nav class="navbar navbar-default navbar-fixed-top hidden-md hidden-lg hidden-sm" role="navigation">
	   	<div class="navbar-header">
	      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
	         	<span class="sr-only">Toggle navigation</span>
	         	<span class="icon-bar"></span>
	         	<span class="icon-bar"></span>
	         	<span class="icon-bar"></span>
	      	</button>
	   	</div>
	   	<div class="collapse navbar-collapse" id="example-navbar-collapse">
	      	<ul class="nav navbar-nav">
	      		<li>
		      		<a href="{{URL::route('user-checklist')}}" >
		      			<i class="fa fa-file-text-o"></i>
		      			Danh sách công việc
		      		</a>
		      	</li>
			    <li>
		      		<a href="{{URL::route('guest-list')}}" >
		      			<i class="fa fa-group"></i>
		      			Danh sách khách mời
		      		</a>
		      	</li>
		      	<li>
		      		<a href="{{URL::route('budget')}}" >
		      			<i class="fa fa-dollar"></i>
		      			Quản lý ngân sách
		      		</a>
		      	</li>
		      	<li>
		      		<a href="{{URL::route('website')}}" >
		      			<i class="fa fa-globe"></i>
		      			Website cưới
		      		</a>
		      	</li>
		      	<li>
		      		<a href="{{URL::route('logout')}}">
            			<i class="fa fa-sign-out"></i>	
	            		Thoát
		            </a>
	            </li>
	      	</ul>
	   	</div>
	</nav>
<!-- end menu top -->

<div class="row top-dashboard">
	<div class="col-xs-3 hidden-xs" style="padding: 0;">
		<a href="{{URL::route('index')}}">
	    	<img class="img-logo" src="{{Asset('icon/logo-thuna.png')}}">
	    </a>
	</div>
	<div class="col-xs-9 text-right hidden-xs" style="padding: 0;">
		<ul class="nav navbar-nav navbar-right">

	  		@if( (Session::has('email')) && (UserController::isset_user())!=0 )
	  		<li class="dropdown">
	        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
	        		<i class="fa fa-user"></i>
					{{User::where('email',Session::get('email'))->get()->first()->lastname}} 
					<span class="caret"></span>
				</a>
	          	<ul class="dropdown-menu" role="menu">
	            	<li><a href="{{Asset('profile')}}">
	            			<i class="fa fa-user"></i>
	            			Thông tin cá nhân
	            		</a>
	            	</li>
	            	<li><a href="{{URL::route('logout')}}">
	            			<i class="fa fa-sign-out"></i>	
		            		Thoát
		            	</a>
	            	</li>
	          	</ul>
	        </li>
	        @endif
			
		</ul>
	</div>
</div>


<div class="row center-dashboard">
	<div class="col-xs-3 hidden-xs" style="padding-left: 2.5%; padding-right:0;">
		<div class="navbar hidden-xs">
		  	<div class="navbar-header">
			    <button style="background-color: #E75280;" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		      	</button>
			    <span class="navbar-brand brand">
			    	<a href="{{URL::route('index')}}" style="color:#FFFFFF; text-decoration: none;">
			    		Ứng dụng của bạn
			    	</a>
			    </span>
		  	</div>
		  	<div class="navbar-collapse collapse navbar-responsive-collapse">
		    	<ul class="nav navbar-nav">
			      	<li>
			      		<a href="{{URL::route('user-checklist')}}" >
			      			
							Danh sách công việc
			      		</a>
			      	</li>
				    <li>
			      		<a href="{{URL::route('guest-list')}}" >
			      			
							Danh sách khách mời
			      		</a>
			      	</li>
			      	<li>
			      		<a href="{{URL::route('budget')}}" >
			      			
							Quản lý ngân sách
			      		</a>
			      	</li>
			      	<li>
			      		<a href="{{URL::route('website')}}" >
			      			
							Website cưới
			      		</a>
			      	</li>
		     	</ul>

		    </div>
		</div>
		<!-- end navbar -->

	</div>
	<div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 center-2">
		@yield('content')
	</div>
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

