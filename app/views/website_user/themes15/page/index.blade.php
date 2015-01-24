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
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes15.css")}}">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/template-font.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.3.2.0.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>

</head>

<body style="background: url({{Asset("{$backgrounds}")}});">
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


	<div class="span2">
        <div class="menuTitle">
        	<a href="javascript:;" class="animate" onclick="toggle_menu();">Menu<br><span></span></a>
        </div>
        <div class="menuMov">
			<div class="menu">
				<ul class="sf-menu">
					<li class="first">
						<a href="#home" data-toggle="tab">
							<div class="mText" style="top: 0px;">Trang Chủ</div>
							<div class="_area"></div>
							<div class="_overPl" style="bottom: 100px;"></div>
							<div class="_overLine" style="opacity: 0;"></div>
							<div class="mTextOver" style="top: -100px;">Trang Chủ</div>
						</a>
					</li>
					@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
					<li>
						<a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" data-toggle="tab">
							<div class="mText" style="top: 0px;">{{$tab->title}}</div>
							<div class="_area"></div>
							<div class="_overPl" style="bottom: 100px;"></div>
							<div class="_overLine" style="opacity: 0;"></div>
							<div class="mTextOver" style="top: -100px;">{{$tab->title}}</div>
						</a>
					</li>
			      	@endforeach
				</ul>
			</div>
		</div>
	</div>

	<div class="span3">
		<!--menu-->
		<ul>
			@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			<li>
				<a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" data-toggle="tab" title="{{$tab->title}}">
					<img src="{{Asset('images/website/themes15/other.svg')}}">
				</a>
			</li>
	      	@endforeach
		</ul>
	</div>

	<div class="logo">
		<div class="wedding-date">
			@if(Session::has('email'))
        		{{WebsiteController::getDates()}}
        	@else
        		{{$date_url}}
        	@endif
		</div>
		<!-- end wedding-date -->

		<div class="name">
			<span class="name-groom name-g">
				{{WebsiteController::cutName($website_item->name_groom)}}
			</span>
			<span class="name-bride name-b">
				{{WebsiteController::cutName($website_item->name_bride)}}
			</span>
		</div>
		<!-- end name -->
	</div>
	<!-- end wrapper -->
<!-- Tab panes -->
<div class="tab-content responsive">

	<div class="item-1 tab-pane active" id="home">
		<div class="item-title">
			Our's Wedding
		</div>

		<div class="hr-line">
			<div class="sep-1"></div>
			<div class="sep-2"></div>
		</div>

		<div style="display: inline-block; width:280px;">
			<div class="img-groom">
				@if(!empty($website_item->avatar_groom))
  					<img src="{{Asset("$website_item->avatar_groom")}}" >
				@else
					<img src="{{Asset('images/website/themes15/page2_pic1.jpg')}}">
				@endif
			</div>
			<div class="item-content about-g">
				{{$website_item->about_groom}}
			</div>
		</div>

		<div style="display: inline-block; width:280px;">
			<div class="img-bride">
				@if(!empty($website_item->avatar_bride))
  					<img src="{{Asset("$website_item->avatar_bride")}}" >
				@else
					<img src="{{Asset('images/website/themes15/page2_pic1.jpg')}}">
				@endif
			</div>
			<div class="item-content about-b">
				{{$website_item->about_bride}}
			</div>
		</div>

	</div>
	<!-- end item-1 -->


	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
		  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div class="item-1 tab-pane" id="welcome" >
		  		@include('website_user.themes15.page.left') 
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

	  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
			<div class="item-1 tab-pane" id="love_story" >
				@include('website_user.themes15.page.love_story')
			</div>
			<!-- .tab love_story -->
		@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div class="item-1 tab-pane" id="about" >
		  		@include('website_user.themes15.page.left')
		  	</div>
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div class="item-1 tab-pane" id="wedding" >
		  		@include('website_user.themes15.page.left') 
		  	</div>
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div class="item-1 tab-pane" id="traval" >
  				@include('website_user.themes15.page.left')
  			</div>
  		@endif

  		@if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
			<div class="item-1 tab-pane" id="guestbook" >
  				@include('website_user.themes15.page.guestbook')
  			</div>
  		@endif

  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
  			<div class="item-1 tab-pane" id="album" >
  				@include('website_user.themes15.page.photo')
  			</div>
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div class="item-1 tab-pane" id="contact" >
  				@include('website_user.themes15.page.contact')
  			</div>
  		@endif

  		<!--  -->

  	@endforeach



</div>
<!-- end tabcontent -->


@endforeach
@endif

<script type="text/javascript">
	function toggle_menu () {
		$('.menuMov').toggle('slide');
	}
</script>


</body>
</html>
