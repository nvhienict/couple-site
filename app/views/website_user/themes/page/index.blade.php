<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">

    <title>{{$firstname}}'s wedding</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
   	<script type="text/javascript" src="{{Asset("assets/js/api-google.js")}}"></script>
    <script src="{{Asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>
   	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
    <style type="text/css">
    	body{
			overflow: hidden;
    		}
    	
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
    		$('a.scrollTo').click(function () {
	        $('body').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
	        return false;
			    });
			});
	</script>

</head>
		
@if($website)
@foreach( $website as $website_item )
<body class="background-themes1" style="background-image: url({{Asset("{$backgrounds}")}});">
	<!-- Thanh dieu huong -->

	<div>
		<nav style="padding:0px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
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
		      	 <li><a class="a_menu scrollTo" href="#title_home">Trang Chủ</a></li>
		      	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $menu_tab)
		         <li><a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></li>
		         @endforeach()
		      </ul>
		   </div>
		</nav>
	</div>
	
	<div style="margin-left:15px;padding-top:70px;" class="after-image-themes">

		<!-- Themes Heading -->
		<div class="title-website" id="title_home">
            <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >
            	@if(Session::has('email'))
            		{{WebsiteController::getDates()}}
            	@else
            		{{$date_url}}
            	@endif
            </h2>
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
		<div class="row phara-margin" style="padding-top:30px;">
           <!-- -change map --> 
           	<div class="text-center map-hove " style='padding:20px 20px;'> 
                  <div id="geomap" >
                      <p>Loading Please Wait...</p>
                  </div>
                  <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
                  <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">    
            </div>                              
            <!-- -end map -->  
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
        	@include('website_user.themes.page.guestbook')
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
</body>


