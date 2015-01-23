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
    <!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes21.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">


	<script type="text/javascript" src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.3.2.0.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>

</head>

<body>
@if($website)
@foreach( $website as $website_item )

	<div id="home">

		<div class="groom-bride">
			<div class="groom-bride-name-groom">{{$website_item->name_groom}}</div>
			&nbsp&&nbsp
			<div class="groom-bride-name-bride">{{$website_item->name_bride}}</div>
		</div>
		<em class="line-name"></em>
		<em class="txt-welcome">
			Chào mừng đến với đám cưới của chúng tôi
		</em>

		<div class="home-img">
			@if($backgrounds)
				<img src="{{Asset("{$backgrounds}")}}">
			@else
				<img src="{{Asset('images/website/themes21/pic2.jpg')}}">
			@endif
		</div>

		<!-- element -->
		<em class="element_1"></em>
		<em class="element_2"></em>
		<em class="element_3"></em>
		<em class="element_3_3"></em>
		<em class="element_4"></em>
		<em class="element_5"></em>
		<em class="element_6"></em>
		<em class="element_7"></em>
		<em class="element_8"></em>
		<em class="element_9"></em>
		<em class="element_10"></em>
		<em class="element_11"></em>
		<!-- end element -->

	</div>
	<!-- end home -->


	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div id="wedding">
		  		@include('website_user.themes21.page.style-2')
		  		<!-- element -->
		        <em class="element_23"></em>
		        <em class="element_24"></em>
		        <em class="element_25"></em>
		        <em class="element_26"></em>
		        <em class="element_27"></em>
		        <em class="element_28"></em>
		        <em class="element_29"></em>
		        <em class="element_30"></em>
		        <em class="element_31"></em>
		        <em class="element_32"></em>
		        <em class="element_33"></em>
		        <!-- end element -->
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

	  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
			<div id="div-text">
				@include('website_user.themes21.page.style-3')
				<!-- element -->
				<em class="element_23"></em>
				<em class="element_24"></em>
				<em class="element_25"></em>
				<em class="element_26"></em>
				<em class="element_27"></em>
				<em class="element_28"></em>
				<em class="element_29"></em>
				<em class="element_30"></em>
				<em class="element_31"></em>
				<em class="element_32"></em>
				<em class="element_33"></em>
				<!-- end element -->
			</div>
			<!-- .tab love_story -->
		@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div id="about-us">
		  		@include('website_user.themes21.page.style-1')
		  		<!-- element -->
		        <em class="element_12"></em>
		        <em class="element_13"></em>
		        <em class="element_14"></em>
		        <em class="element_15"></em>
		        <em class="element_16"></em>
		        <em class="element_17"></em>
		        <em class="element_18"></em>
		        <em class="element_19"></em>
		        <em class="element_20"></em>
		        <em class="element_21"></em>
		        <em class="element_22"></em>
		        <!-- end element -->
		  	</div>
		  	
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div id="about-us-2">
		  		@include('website_user.themes21.page.style-2')
		  		<!-- element -->
		        <em class="element_12"></em>
		        <em class="element_14"></em>
		        <em class="element_15"></em>
		        <em class="element_17"></em>
		        <em class="element_18"></em>
		        <em class="element_19"></em>
		        <em class="element_20"></em>
		        <em class="element_22"></em>
		        <!-- end element -->
		  	</div>
		  	
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div id="div-text-4">
				@include('website_user.themes21.page.style-3')
				<!-- element -->
				<em class="element_23"></em>
				<em class="element_24"></em>
				<em class="element_26"></em>
				<em class="element_27"></em>
				<em class="element_28"></em>
				<em class="element_30"></em>
				<em class="element_31"></em>
				<em class="element_33"></em>
				<!-- end element -->
			</div>
			
  		@endif

  		@if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
			<div id="guestbook">
				@include('website_user.themes21.page.guestbook')
				<!-- element -->
				<em class="element_23"></em>
				<em class="element_24"></em>
				<em class="element_26"></em>
				<em class="element_37"></em>
				<em class="element_38"></em>
				<em class="element_39"></em>
				<em class="element_40"></em>
				<em class="element_41"></em>
				<em class="element_42"></em>
				<!-- end element -->
			</div>
			
  		@endif

  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
  			<div id="photo">
  				@include('website_user.themes21.page.style-4')
  				<!-- element -->
				<em class="element_34"></em>
				<em class="element_35"></em>
				<em class="element_36"></em>
				<em class="element_37"></em>
				<em class="element_38"></em>
				<em class="element_39"></em>
				<em class="element_40"></em>
				<em class="element_41"></em>
				<em class="element_42"></em>
				<em class="element_43"></em>
				<em class="element_44"></em>
				<em class="element_45"></em>
				<em class="element_46"></em>
				<!-- end element -->
  			</div>
  			
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div id="div-text-5">
				@include('website_user.themes21.page.style-5')
				<!-- element -->
				<em class="element_23"></em>
				<em class="element_26"></em>
				<em class="element_27"></em>
				<em class="element_30"></em>
				<em class="element_33"></em>
				<!-- end element -->
			</div>
			
  		@endif

  		<!--  -->

  	@endforeach

	<div id="footer">
		<div class="ft-left">
			<div class="name-groom-bride">
				{{$website_item->name_groom}} & {{$website_item->name_bride}}
			</div>
			<div class="copy-right">
				&copy 2014. <a href="http://thuna.vn">thuna.vn</a>
			</div>
		</div>

		<div class="ft-center" >
			<nav class="navbar navbar-default" role="navigation" >
			   <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" 
			         data-target="#example-navbar-collapse">
			         <span class="sr-only">Toggle navigation</span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			      </button>
			   </div>
			   <div class="collapse navbar-collapse" id="example-navbar-collapse">
			      	<ul class="nav navbar-nav">
			      		<li><a href="javascript:void(0);" id="home_page">Trang Chủ</a></li>
			      	 	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $tab)
			      	 		<li><a class="{{$tab->id}} TT{{$tab->id}} {{$tab->type}}" href="javascript:void(0);" >{{$tab->title}}</a></li>
			      	 	@endforeach
			      	 	<script type="text/javascript" src="{{Asset("assets/js/website/themes21.js")}}"></script>
			     	 </ul>
			   </div>
			</nav>
		</div>

		<div class="ft-right">
		</div>
	</div>

@endforeach
@endif


</body>
</html>

