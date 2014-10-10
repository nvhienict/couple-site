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
	
	<!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>

	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes2.css")}}">

</head>
<body>

<div class="display_menu_tab">
	<!-- Static navbar -->
  	<div class="navbar navbar-default menu_tab" role="navigation">
    	<div class="container-fluid ">
      		<div class="navbar-header">
        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
         			<span class="sr-only">Toggle navigation</span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#">Thuna.vn</a>
      		</div>
      		<div class="navbar-collapse collapse">

        		<ul class="nav navbar-nav">
        			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
          			<li><a href="#welcome" role="tab" data-toggle="tab">Chào mừng</a></li>
				  	<li><a href="#about" role="tab" data-toggle="tab">Giới thiệu</a></li>
				  	<li><a href="#even" role="tab" data-toggle="tab">Sự kiện</a></li>
				  	<li><a href="#travel" role="tab" data-toggle="tab">Du lịch</a></li>
				  	<li><a href="#images" role="tab" data-toggle="tab">Ảnh</a></li>
          			<!-- <li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                		<ul class="dropdown-menu" role="menu">
                  			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
						  	
                		</ul>
          			</li> -->
        		</ul>

      		</div><!--/.nav-collapse -->
    	</div><!--/.container-fluid -->
	</div>

	<div class="row menu_tab_boder">
		<div class="col-xs-12"></div>
	</div>
</div>
<!-- .display -->
<div class="hidden_menu_tab" style="display:none;">
	<!-- Static navbar -->
  	<div class="navbar navbar-default menu_tab" role="navigation">
    	<div class="container-fluid ">
      		<div class="navbar-header">
        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
         			<span class="sr-only">Toggle navigation</span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#">Thuna.vn</a>
      		</div>
      		<div class="navbar-collapse collapse">

        		<ul class="nav navbar-nav">
        			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
          			<li><a href="#welcome" role="tab" data-toggle="tab">Chào mừng</a></li>
				  	<li><a href="#about" role="tab" data-toggle="tab">Giới thiệu</a></li>
				  	<li><a href="#even" role="tab" data-toggle="tab">Sự kiện</a></li>
				  	<li><a href="#travel" role="tab" data-toggle="tab">Du lịch</a></li>
				  	<li><a href="#images" role="tab" data-toggle="tab">Ảnh</a></li>
          			<!-- <li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                		<ul class="dropdown-menu" role="menu">
                  			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
						  	
                		</ul>
          			</li> -->
        		</ul>

      		</div><!--/.nav-collapse -->
    	</div><!--/.container-fluid -->
	</div>

	<div class="row menu_tab_boder">
		<div class="col-xs-12"></div>
	</div>
</div>
<!-- .hidden -->
		

@yield('content')

<!-- footer -->
	<div class="row footer_boder">
		<div class="col-xs-12"></div>
	</div>
	<div class="row footer">
  			<div class="col-xs-1"></div>
  			<div class="col-xs-10">
  				<div class="col-sm-4 col-lg-4 col-md-4">
					Chào mừng đến dự đám cưới vào<br />
					01/01/2015 nhằm ngày 15/12/2014 Âm lịch
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<img width="100%" src="{{Asset('images/website/themes2/couple.png')}}">
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					Mọi vấn đề xin liên hệ cho chúng tôi <br />
					0123456789
				</div>
  			</div>
				
  			<div class="col-xs-1"></div>
	</div>
	<div class="row footer">
		<div class="col-xs-12" style="text-align:center;">
			&copy 2014 bởi <a href="http://thuna.vn">thuna.vn</a>. All rights reserved.
		</div>
	</div>
<!-- .footer -->

</body>

</html>

