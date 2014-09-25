<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<title> Wedding Website | thuna.vn</title>
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
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes6.css")}}">

	

   
	
</head>
<body class="background-themes "style="background-image: url({{Asset("images/website/themes6/template_6.jpg")}});">
	
		<div class="container main-template">
		<br>
			<div class="menu_tab_pills" >
				<ul class="nav nav-pills menu_tab">
				  <li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
				  <li><a href="#about" role="tab" data-toggle="tab">Giới thiệu</a></li>
				  <li><a href="#event" role="tab" data-toggle="tab">Sự kiện</a></li>
				  <li><a href="#travel" role="tab" data-toggle="tab">Du lịch</a></li>
				  <li><a href="#album" role="tab" data-toggle="tab">Album</a></li>
				  <li><a href="#contact" role="tab" data-toggle="tab">Liên lạc</a></li>
				</ul>
			</div>
			<div class="tab-content">
  				<div class="tab-pane active " id="home">
  					@include('website_user.themes6.page.main')
  				</div>
  				<div class="tab-pane" id="about">
  					@include('website_user.themes6.page.left')
  				</div>
  				<div class="tab-pane" id="event">
  					@include('website_user.themes6.page.right')
  				</div>
  				<div class="tab-pane" id="travel">
  					@include('website_user.themes6.page.text')
  				</div>
  				<div class="tab-pane" id="album">
  					@include('website_user.themes6.page.photo')
  				</div>	
  				<div class="tab-pane" id="contact">
  					@include('website_user.themes6.page.contact')
  				</div>			
			</div>
		</div>

	
</body>



</html>

