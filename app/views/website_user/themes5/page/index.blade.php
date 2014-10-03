<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<title>{{$firstname}}'s</title>
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

	<!-- Bootstrap 3.2.0 -->
	<script src="{{Asset('assets/js/bootstrap.3.2.0.min.js')}}"></script>
	
	<!-- Jscolor -->
	<script src="{{Asset('assets/jscolor/jscolor.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes5.css")}}">

</head>
    
	
	<body>
		@if($website)
		@foreach( $website as $website_item )
		<section id="intro-portion">		
			<!-- Fixed navbar -->
		<div id="nav-wrapper">
			<div id="nav" class="navbar"  role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html"><img src="{{Asset('images/website/themes5/key-icon.png')}}" alt="logo"></a>
					</div>
					<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
						<li><a href="#section_{{$tabWeb->type}}">{{$tabWeb->title}}</a></li>
						@endforeach
					</ul>
					</div>
				</div>
			</div>  	
		</div>
			<!-- intro -->
		</section>
		
				@include('website_user.themes5.page.welcome')
			@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
			<!-- Our story -->
			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.ourstory')
			@endif
			
			<!-- photo gallery -->
			@if($tabWeb->type =="album" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.photo')
			@endif
			<!-- festivities -->
			@if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.wedding')
			@endif
			<!-- map -->
			@if($tabWeb->type =="map" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.map')
			@endif
			<!-- travel -->
			@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.travel')
			@endif
			<!-- RSVP -->
			@if($tabWeb->type =="contact" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.contact')
			@endif
			@endforeach
			<!-- bridal party -->
			
			
			<!-- footer -->
			<div class="footer" style="background: url({{Asset("{$backgrounds}")}}) no-repeat center;"></div>	
		
		
		<script src="{{Asset("assets/js/uikit.min.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.nav.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.nivo.slider.js")}}"></script>
		
		<script type="text/javascript">
		
		(function () {
			"use strict";	
			
			/*global jQuery */	
		
			jQuery(document).ready(function(){	
			
				jQuery('.nav').onePageNav({
					scrollOffset: 300		
				});
				
				jQuery('#nav').affix({
					offset: { top: jQuery('#nav').offset().top }
				});		

				jQuery(window).load(function() {
					jQuery('#slider').nivoSlider();
				});
			});	

		}());
		
	    </script>		
		
	@endforeach
	@endif
	</body>
</html>