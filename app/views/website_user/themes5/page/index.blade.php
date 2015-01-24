<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$firstname}}'s wedding</title>
    <meta name="description" content="Tạo website cưới miễn phí">
    <meta name="author" content="Thuna.vn">
    <meta property="og:title" content="{{$firstname}}'s wedding">
	<meta property="og:description" content="Chào mừng đến với website cưới của chúng tôi">
	<meta property="og:url" content="http://thuna.vn/website/{{$url}}">
	<meta property="og:type" content="article">
	<meta property="og:image" content="{{Asset("{$web_fb}")}}" />
	
	<!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
	<link href="{{Asset("assets/color/default.css")}}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/template-font.css")}}">
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>
	<script src="{{Asset("assets/js/custom.js")}}"></script>
	<script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes5.css")}}">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
	<style type="text/css">
		body{
			overflow-x:hidden; 
		}
	</style>

</head>
    
	
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=943743042306339&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<script>
		    $(document).ready(function() {
		        $('.fb-share-button').attr("data-href", document.URL);
		    });
		</script>
		@if($website)
		@foreach( $website as $website_item )
		<section id="intro-portion">		
			<!-- Fixed navbar -->
		<div id="nav-wrapper">
			<div id="nav" class="navbar" role="navigation">
				<div class="container">
					<nav style="padding:0px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
					   <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" 
					         data-target="#example-navbar-collapse">
					         <span class="sr-only">Toggle navigation</span>
					         <span class="icon-bar"></span>
					         <span class="icon-bar"></span>
					         <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand"><img src="{{Asset('images/website/themes5/key-icon.png')}}" alt="logo"></a>
					   </div>
					   <div class="collapse navbar-collapse" id="example-navbar-collapse">
					      <ul class="nav navbar-nav navbar-right">
					         <li><a class="a_menu scrollTo" href="#title_home">Trang Chủ</a></span></li>
					        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
					         <li class="menu-id{{$menu_tab->id}} text-center">
					          <a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a>
					        </li>
					         @endforeach()						          
					      </ul>
					   </div>
					</nav>	

				</div>
			</div>  	
		</div>
			<!-- intro -->
		</section>
		
				@include('website_user.themes5.page.background')
			@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
			<!-- Our story -->
			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.ourstory')
			@endif
			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.welcome')
			@endif
			<!-- guestbook -->
			@if($tabWeb->type =="guestbook" && $tabWeb->visiable==0 )
				@include('website_user.themes5.page.guestbook')
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