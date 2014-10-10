<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">

    <title>Nguyen's wedding</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <style type="text/css">
    	body{
			overflow: hidden;
    	}
	</style>

</head>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<script type="text/javascript">
			window.___gcfg = {lang: 'vi'};

			(function() {
			var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
			po.src = 'https://apis.google.com/js/platform.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			})();
		</script>
@if($website)
@foreach( $website as $website_item )
<div class="background-themes1" style="background-image: url({{Asset("{$backgrounds}")}});">
	<!-- Thanh dieu huong -->

	<div>
		<nav style="padding:0px;margin-right:16px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
		   <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" 
		         data-target="#example-navbar-collapse">
		         <span class="sr-only">Toggle navigation</span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		      </button>
		   </div>
		   <div style="background-color:#6EC7B6;" class="collapse navbar-collapse" id="example-navbar-collapse">
		      <ul style="background-color:#6EC7B6;" class="nav navbar-nav">
		      	 <li><a class="a_menu" href="#title_home">Trang Chủ</a></li>
		      	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $menu_tab)
		         <li><a class="a_menu" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></li>
		         @endforeach()
		      </ul>
		   </div>
		</nav>
	</div>
	
	<div style="margin-left:15px;padding-top:70px;" class="after-image-themes">

		<!-- Themes Heading -->
		<div class="title-website" id="title_home">
            <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >{{WebsiteController::getDates()}}</h2>
            <h1 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};">
                {{$firstname}}'s wedding
            </h1>
            <h2 class="text-center" style="color: #{{$website_item->color2}}" >Chào bạn đến Website cưới của chúng tôi</h2>     
        </div>
		<hr>
		@include('website_user.themes.page.circle')
	 @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
		<!-- Welcome -->
		@if($tabWeb->type =="welcome" )
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.page.left')
		</div>
		<hr>
		@endif

		<!-- cau chuyen tinh yeu -->
		@if($tabWeb->type=="love_story")
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.page.text')
		</div>
		<hr>
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about")
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.page.right')
		</div>
		<hr>
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" )
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.page.right')
		</div>
		<hr>
		@endif

		<!-- Travaling -->
		@if($tabWeb->type=="traval")
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.page.text')
		</div>
        <hr>
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" )
        <div id="section_{{$tabWeb->type}}">
        @include('website_user.themes.page.photo')
        </div>
        <hr>
        @endif

       <!--  Register -->
       @if($tabWeb->type=="register" )
       <div id="section_{{$tabWeb->type}}">
       @include('website_user.themes.page.text')  
       </div>     
        <hr>
        @endif

        <!-- Contact Us -->
        @if($tabWeb->type=="contact")
        <div id="section_{{$tabWeb->type}}">
        @include('website_user.themes.page.contact')
        </div>
        <hr>
        @endif

         <!--  Guest book -->
       @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
        	@include('website_user.themes.page.text')
        	<hr>
    	</div>
        @endif
  	@endforeach  
	<!-- and after-images-themes -->
	
	
</div>
@endforeach
@endif
<!-- and image-themes -->
<footer style="height:70px;">
	<div class="col-xs-6 col-md-offset-3">
		
		<div class="text-center">
			<p>47 Đỗ Huy Uyển, Đà Nẵng<br>
			© Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
		</div>
		
	</div>
</footer>
</div>


