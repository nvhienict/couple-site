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

</head>
@if($website)
@foreach( $website as $website_item )
<div class="background-themes" style="height: 700px; background-image: url({{Asset("{$backgrounds}")}});">
	<!-- Thanh dieu huong -->

	<div >
		<nav style="padding:0px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
		   <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" 
		         data-target="#example-navbar-collapse">
		         <span class="sr-only">Toggle navigation</span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Home</a>
		   </div>
		   <div style="background-color:#222222;" class="collapse navbar-collapse" id="example-navbar-collapse">
		      <ul style="background-color:#222222;" class="nav navbar-nav">
		         <li class=""><a href="#">Giới Thiệu</a></li>
		         <li><a href="#">Thông Tin</a></li>
		         <li><a href="#">Album</a></li>
		         <li><a href="#">Liên Hệ</a></li>
		      </ul>
		   </div>
		</nav>
	</div>
	
	<div style="margin-left:30px;" class="after-image-themes">

		<!-- Themes Heading -->
		<div class="title-website">
            <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >{{WebsiteController::getDates()}}</h2>
            <h1 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};">
                {{$firstname}}'s wedding
            </h1>
            <h2 class="text-center" style="color: #{{$website_item->color2}}" >Chào bạn đến Website cưới của chúng tôi</h2>     
        </div>
		<hr>
	 @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
		<!-- Welcome -->
		@if($tabWeb->type =="welcome" )
		@include('website_user.themes.page.left')
		<hr>
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about")
		@include('website_user.themes.page.right')
		<hr>
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" )
		@include('website_user.themes.page.right')
		<hr>
		@endif

		<!-- Travaling -->
		@if($tabWeb->type=="traval")
		@include('website_user.themes.page.text')
        <hr>
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" )
        @include('website_user.themes.page.photo')
        <hr>
        @endif

       <!--  Register -->
       @if($tabWeb->type=="register" )
       @include('website_user.themes.page.text')       
        <hr>
        @endif

        <!-- Contact Us -->
        @if($tabWeb->type=="contact")
        @include('website_user.themes.page.contact')
        <hr>
        @endif
  	@endforeach  
          
	</div>
	<!-- and after-images-themes -->
	<footer>
		<div class="col-xs-6 col-md-offset-3">
			
			<div class="text-center">
				<p>47 Đỗ Huy Uyển, Đà Nẵng<br>
				© Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
			</div>
			
		</div>
	</footer>
	
</div>
@endforeach
@endif
<!-- and image-themes -->

