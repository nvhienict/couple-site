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

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap/bootstrap.min.css")}}">
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
      
    </style>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes10.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
   
</head>
<body>
@if($website)
@foreach( $website as $website_item )
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
              		<li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>                             
                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
                         <li><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>                
                    @endforeach()
              </ul>
           </div>
       
    </nav>
</div>
<div class="container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 index-title-temp " >
			<!-- count datime to weddingdate -->
					@if(Session::has('email'))
	  					@foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
	  						<div id="getD{{$index}}" style="display:none;">
	  							{{$dd}}
	  						</div>
	  					@endforeach
	  				@else
	  					@foreach( $date = explode('-',$date_url) as $index=>$dd )
	  						<div id="getD{{$index}}" style="display:none;">
	  							{{$dd}}
	  						</div>
	  					@endforeach
	  						
  					@endif
			<div id="count_dateTime">
			
				<table align="center" class="count_table_dateTime">
				<script type="text/javascript" src="{{Asset("assets/js/count-down-time.js")}}"></script>
				<!-- .end -->
					<tr >
						<td class="time_wedding" id="echo_dday"></td>
						<td class="time_wedding_">:</td>
						<td class="time_wedding" id="echo_dhour"></td>
						<td class="time_wedding_">:</td>
						<td class="time_wedding" id="echo_dmin"></td>
						<td class="time_wedding_">:</td>
						<td class="time_wedding" id="echo_dsec"></td>
					</tr>
					<tr >
						<td class="time_txt">Ngày</td>
						<td></td>
						<td class="time_txt">Giờ</td>
						<td></td>
						<td class="time_txt">Phút</td>
						<td></td>
						<td class="time_txt">Giây</td>
					</tr>
				</table>
				<p class="date-time-title">
					@if(Session::has('email'))
	            		{{WebsiteController::getDates()}}
	            	@else
	            		{{$date_url}}
	            	@endif
	            </p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 image-title-temp text-center">
				<img style="position: relative;" class="img-responsive" src="{{Asset("images/website/themes10/temp_title.png")}}" alt="">
				<h2 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section-title" id="showName" >
					<span id="topNameGroom">{{$website_item->name_groom}}</span>
						<em>&</em>
					<span id="topNameBride">{{$website_item->name_bride}}</span>
					
				</h2>
				
			</div>
			
		<!-- <p class="subline">Chào mừng bạn đến với Website cưới của chúng tôi!</p> -->
		
	</div>




  	<div class="tab-content ">
  			<div class="row tab-pane active" id="home">			  			
			  	@include('website_user.themes10.page.main')			  		
			</div>
  		@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)	

  			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
  				<div class="tab-pane " id="{{$tabWeb->type}}">
  					@include('website_user.themes10.page.left')
  				</div>
  			@endif
  			
  			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )	
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.page.about_us')
  				</div>
				@endif
				@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
				<div class="tab-pane" id="{{$tabWeb->type}}">
					@include('website_user.themes10.page.text')
				</div>						
			@endif
				@if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )	
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.page.left')
  				</div>
				@endif
				@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )	
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.page.right')
  				</div>
				@endif
				@if($tabWeb->type =="album" && $tabWeb->visiable==0 )
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.page.photo')
  				</div>
  			@endif
  			
  			@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.page.contact')
  				</div>	
			@endif	

			<!--  Guest book -->
	       @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
	        <div class="tab-pane" id="{{$tabWeb->type}}">
	          @include('website_user.themes10.page.guestbook') 
	      </div>
	        @endif 	
		
	@endforeach
	</div>

</div>
</body>
@endforeach
@endif
</html>

