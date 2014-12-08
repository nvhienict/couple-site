<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">


<head>
	<title>{{$firstname}}'s Wedding Website | thuna.vn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=false" />

	<meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
	<meta property="og:image" itemprop="thumbnailUrl" content="{{Asset("assets/img/logo.png")}}">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="Dịch vụ cưới hỏi Thuna.vn">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{Asset("assets/img/logo.png")}}" />
	<meta property="fb:app_id" content="692038267552175" />
	
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes8.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

	<!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />

    <style type="text/css">
      .fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style]
       {width: 100% !important;}
      .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
      {width: 100% !important;}
    </style>
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="{{Asset("assets/js/map-themes.js")}}"></script>
	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>

	<script type="text/javascript">
		jQuery(document).ready(function($) {
		    // Call & Apply function scrollTo
		    $('a.scrollTo').click(function () {
		        $('body').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
		        return false;
	    });
		});
	</script>
	
	
</head>

@if($website)
@foreach( $website as $website_item )

<div id="container" class="col-md-12">

	<header id="header" class="col-md-12">
		<!-- logo -->
		<div class="logo col-xs-4">
			<div class="logo-image">
				<img src="{{Asset('images/website/themes8/logo.jpg')}}">
			</div>

			<div class="name-bride col-xs-6">
				{{$website_item->name_groom}}
			</div>
			<div class="name-groom col-xs-6">
				{{$website_item->name_bride}}
			</div>
		</div>
		<!-- end logo -->

		<!-- menu -->
		<nav id="topmenu" class="navbar navbar-default col-xs-8" role="navigation">
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
			      	<li class="li-menu"><a class="scrollTo" href="#home" data-toggle="tab">Trang Chủ</a></li>
			      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if($index<2)
			      		<li class="li-menu"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
			      		@endif
			      	@endforeach
					<li class="li-menu dropdown">
					    <a data-toggle="dropdown" href="#">
					      Xem thêm <span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu" role="menu" style="background: #742C5B;">
					   		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						    	@if($index>=2)
						    	<li class="li-menu"><a class=" {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
						    	@endif
						    @endforeach
					    </ul>
					</li>
		      	</ul>
		   	</div>
		</nav>
		<!-- end menu -->

		

		
	</header>
	<!-- end header -->

	<!-- slider -->
	<div class="slider">
		@if($backgrounds)
			<img style="width: 100%; height: 350px" src="{{Asset("{$backgrounds}")}}">
		@else
			<img src="{{Asset('images/website/themes8/kiss1.jpg')}}">
		@endif
	</div>
	<!-- end slider -->

	<!-- 3 option -->
	<div id="info-panel">
		<div class="col-xs-2" style="width: 130px;"></div>
		<div class="time-count-down col-md-3">
			<div class="col-xs-1">
				<i id="info-panel-top1" class="fa fa-clock-o fa-2x"></i>
			</div>
			
			@if(empty($website_item->count_down))
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
			@else
				@if(Session::has('email'))
				@foreach( $date = explode('-', WebsiteController::getCountDown()) as $index=>$dd )
						<div id="getD{{$index}}" style="display:none;">
							{{$dd}}
						</div>
					@endforeach
				@else
					@foreach( $date = explode('-',$count_down_url) as $index=>$dd )
						<div id="getD{{$index}}" style="display:none;">
							{{$dd}}
						</div>
					@endforeach
				@endif
			@endif
			<script type="text/javascript" src="{{Asset("assets/js/count-down-time.js")}}"></script>

			<span id="echo_dday"></span> | <span id="echo_dhour"></span> | 
			<span id="echo_dmin"></span> | <span id="echo_dsec"></span>
			<br />Ngày | Giờ | Phút | Giây
		</div>
		<!-- end time-count-down -->

		<div class="date-wedding col-md-3">
			<div class="col-xs-1">
				<i id="info-panel-top2" class="fa fa-heart-o fa-2x"></i>
			</div>

			Chúng tôi sẽ tổ chức đám cưới<br />
			vào {{WebsiteController::getDates()}}
		</div>
		<!-- end date-wedding -->

		<div class="contact col-md-3">
			<div class="col-xs-1">
				<i id="info-panel-top3" class="fa fa-phone-square fa-2x"></i>
			</div>

			<a href="http://twitter.com" style="color: #fff;"><i class="fa fa-twitter-square fa-2x"></i> </a>
			<a href="http://facebook.com" style="color: #fff;"><i class="fa fa-facebook-square fa-2x"></i> </a>
			<a href="http://youtube.com" style="color: #fff;"><i class="fa fa-youtube-square fa-2x"></i></a><br />
			Liên hệ cho chúng tôi
		</div>
		<!-- end contact -->
	</div>
	<!-- end 3 option -->

	<div class="line-hr">
		
		<div class="line-hr-left col-xs-5">
			
		</div>
		<div class="line-hr-shape col-xs-2">
			
		</div>
		<div class="line-hr-right col-xs-5">
			
		</div>
	</div>
	<!-- end line-hr -->

	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)

	 	<!-- Welcome -->
		@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.page.left')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		@endif

		<!-- cau chuyen tinh yeu -->
		@if($tabWeb->type=="love_story")
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.page.love_story')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.page.right')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
			<div id="section_{{$tabWeb->type}}">
			@include('website_user.themes8.page.right')
			</div>
			<div class="row phara-margin" style="padding-top:30px;">
	           <!-- -change map --> 
	           	<div class="text-center map-hove " style='padding:20px 20px;'>         
	                <p><input class="postcode" id="Postcode" name="Postcode" type="text"> <input type="submit" id="findbutton" value="Tìm địa điểm" /></p>        
	                  <div id="geomap" >
	                      <p>Loading Please Wait...</p>
	                  </div>
	                  <div id="cor"></div>
	                  <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
	                  <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">    
	            </div>                              
	            <!-- -end map -->  
	   		 </div>
	   		 <div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		
		@endif

		<!-- Travaling -->
		@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.page.text')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
	        <div id="section_{{$tabWeb->type}}">
	        	@include('website_user.themes8.page.photo')
	        </div>
	        <div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
        @endif

       	@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
	        <div id="section_{{$tabWeb->type}}">
	        	@include('website_user.themes8.page.contact')
	        </div>
	        <div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
        @endif

        @if($tabWeb->type=="guestbook"&& $tabWeb->visiable==0)
	        <div id="section_{{$tabWeb->type}}">
	        	@include('website_user.themes8.page.text')

	        	<!-- -facebookcommnet --> 
		          <div id="fb-root"></div>
		          <script>(function(d, s, id) {
		              var js, fjs = d.getElementsByTagName(s)[0];
		              if (d.getElementById(id)) return;
		              js = d.createElement(s); js.id = id;
		              js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1450451991884119&version=v2.0";
		              fjs.parentNode.insertBefore(js, fjs);
		            }(document, 'script', 'facebook-jssdk'));
		          </script>
		          <div class="fb-comments" data-href=""  data-numposts="5" data-width="100%"data-order-by="social" data-mobile="auto-detect" data-colorscheme="light"></div>                        

		          <script>
		              $(document).ready(function() {
		                  $('.fb-comments').attr("data-href", document.URL);
		              });
		          </script>
		        <!-- -End facebookcommnet -->
	        </div>
	        <div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
        @endif
      
       
  	@endforeach

	<div id="footer">
		&copy 2014 <a href="thuna.vn">thuna.vn</a> <br />
		Design by giangmd@thuna.vn
	</div>


</div>

@endforeach
@endif

</html>