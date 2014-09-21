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
<div style="background-image: url({{Asset("images/website/background/{$website_item->background}")}});">
	<!-- Thanh dieu huong -->

	<div class="navar-themes">
		<nav class="navbar navbar-inverse nav-themes-fixed" role="navigation">
	        <div >
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="#">Home</a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul style="background-color:#222222;" class="nav navbar-nav">
	                    <li>
	                        <a href="#">Welcome</a>
	                    </li>
	                    <li>
	                        <a href="#">About us</a>
	                    </li>
	                    <li>
	                        <a href="#">Wedding Event</a>
	                    </li>
	                    <li>
	                        <a href="#">Travaling</a>
	                    </li>
	                    <li>
	                        <a href="#">Register</a>
	                    </li>
	                    <li>
	                        <a href="#">Contact</a>
	                    </li>
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
		</nav>

	</div>
	<div class="after-image-themes">

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
	
</div>
@endforeach
@endif
<!-- and image-themes -->

