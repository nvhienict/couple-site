<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">
	
	<title>{{$firstname}}'s wedding</title>

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <script src="{{Asset("assets/js/jquery.min.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
   	
   	<!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery.mousewheel-3.0.6.pack.js")}}"></script>

    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="{{Asset("assets/slide/source/jquery.fancybox.js?v=2.1.3")}}"></script>
    <link rel="stylesheet" type="text/css"  href="{{Asset("assets/slide/source/jquery.fancybox.css?v=2.1.2")}}" media="screen" />

    <!-- Add Button helper (this is optional) -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.css?v=1.0.5")}}" />
    <script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.js?v=1.0.5")}}"></script>

    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-media.js?v=1.0.5")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/slide/f-slide.js")}}"></script>
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
        .fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style]
       {width: 100% !important;}
      .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
      {width: 100% !important;}
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes14.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
   
</head>
<div class="row background-themes">

<!-- <img src="{{Asset("{$backgrounds}")}}" class=" img-responsive" alt="Image">	 -->
	<div class="container content_temp_slide">
	@if($website)
	@foreach( $website as $website_item )
		 <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
	    
		      <!-- Wrapper for slides -->
		    <div class="carousel-inner">
		      
		        <div class="item active">
				          
						  			
				  		@include('website_user.themes14.page.main')			  		
				
		        </div><!-- End Item -->
				@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb) 		
				    @if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
				         <div class="item">
				          	@include('website_user.themes14.page.left')
				        </div><!-- End Item -->
				    @endif
				    @if($tabWeb->type =="about" && $tabWeb->visiable==0 )
				         <div class="item">
				          	@include('website_user.themes14.page.about_us')
				        </div><!-- End Item -->
				    @endif
				    @if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )  
				       <div class="item">
				          	@include('website_user.themes14.page.text')
				        </div><!-- End Item -->
				    @endif
				    @if($tabWeb->type =="guestbook" && $tabWeb->visiable==0 )
	                 	<div class="item">
	                    	@include('website_user.themes14.page.guestbook')
	                	</div><!-- End Item -->
	            	@endif
				    @if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )	
						<div class="item">
							@include('website_user.themes14.page.left')
						</div>
					@endif 
					@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )	
						<div class="item">
							@include('website_user.themes14.page.right')
						</div>
					@endif 
					@if($tabWeb->type =="album" && $tabWeb->visiable==0 )	
						<div class="item">
							@include('website_user.themes14.page.photo')
						</div>
					@endif 
					@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
						<div class="item">
							@include('website_user.themes14.page.contact')
						</div>	
					@endif
				@endforeach			    
			 </div>	  
		</div>

		
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		        <nav class="navbar navbar-default navbar-fixed-top side-nav-menu" role="navigation">
		           <div class="navbar-header">
		              <button type="button" class="navbar-toggle" data-toggle="collapse" 
		                 data-target="#example-navbar-collapse">
		                 <span class="sr-only">Toggle navigation</span>
		                 <span class="icon-bar"></span>
		                 <span class="icon-bar"></span>
		                 <span class="icon-bar"></span>
		              </button>
		           </div>
		           <div  class="collapse navbar-collapse" id="example-navbar-collapse">
		              <ul class="nav navbar-nav side-nav">
		              			<li data-target="#myCarousel" data-slide-to="0" class="active always-visible"><a href="#" role="tab"  data-toggle="tab">Trang chủ</a></li>              		                             
		                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $index=>$tab)
		                        <li data-target="#myCarousel"  data-slide-to="{{$index+1}}"><a href="#"  role="tab" data-toggle="tab">{{$tab->title}}</a></li> 
		                    @endforeach()
		              </ul>
		           </div>
		       
		    	</nav>
			</div>

	
	</div>
</div>
@endforeach
@endif

<script type="text/javascript">
	$('.modal').appendTo("body");
</script>

</html>

