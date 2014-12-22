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
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes3.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

	<!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    
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
	
	
</head>

@if($website)
@foreach( $website as $website_item )

<div class="wrapper" style="background-image: url({{Asset("{$backgrounds}")}});" >
	<div class="main_top">
		
	</div>
	<!-- end main_top -->

	<div class="main_mid">
		<div class="header">
			<div class="head_title">
				<h1>
					Đám cưới của chúng tôi
				</h1>
				<p class="sub_head_title">
					@if(Session::has('email'))
	            		{{WebsiteController::getDates()}}
	            	@else
	            		{{$date_url}}
	            	@endif
				</p>
			</div>
			<!-- end head_title -->

			<div class="head_names">
				<div class="col-xs-5 head_name_left">
					<span class="head_name">
						<strong style="color: #{{$website_item->color2}}">
							{{WebsiteController::cutName($website_item->name_groom)}}
						</strong>
						
					</span>
				</div>
				<!-- end head_name_left -->

				<span class="col-xs-2 head_amp">
					<img width="100%" src="{{Asset('images/website/themes3/head_amp.png')}}">
				</span>
				<!-- end head_amp -->

				<div class="col-xs-5 head_name_right">
					<span class="head_name">
						<strong style="color: #{{$website_item->color2}}">
							{{WebsiteController::cutName($website_item->name_bride)}}
						</strong>
						
					</span>
				</div>

				
				<!-- end head_name_right -->
				<!-- <span class="ribbon_left"></span>
				<span class="ribbon_right"></span> -->
			</div>
			<!-- end head_names -->
		</div>
		<!-- end header -->

		<div class="topmenu_line_top"></div>
		<nav id="topmenu" class="navbar navbar-default" role="navigation" >
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
				      	<li><a href="#home" data-toggle="tab">Trang Chủ</a></li>
				      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
				      		@if($index<2)
				      		<li><a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
				      		@endif
				      	@endforeach
			      		<li class="dropdown">
						    <a data-toggle="dropdown" href="#">
						      Xem thêm <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu" role="menu">
						    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						    	@if($index>=2)
						    	<li><a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
						    	@endif
						    @endforeach
						    </ul>
						</li>
						
			      	</ul>
			      	
			   	</div>
		</nav>
		<div class="topmenu_line_bot"></div>

		<!-- .content -->
		<div class="content">
			<div class="tab-content">
				<div class="entry tab-pane active" id="home">
					<div id="prev_output_themes3222" class="frame_box frame_center" style="width:230px; height:170px; display: inline-block; ">
						<a href="#">
							
							@if(!empty($website_item->avatar_groom))
			  					<img style="width:100%; height:100%;" src="{{Asset("$website_item->avatar_groom")}}" >
							@else
								<img src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
							@endif
						</a>

						<span class="img_tl"></span>
						<span class="img_tr"></span>
						<span class="img_bl"></span>
						<span class="img_br"></span>
					</div>


					<div id="prev_output_themes3111" class="frame_box frame_center" style="width:230px; height:170px; display: inline-block; ">
						<a href="#">
							
							@if(!empty($website_item->avatar_bride))
			  					<img style="width:100%; height:100%;" src="{{Asset("$website_item->avatar_bride")}}" >
							@else
								<img src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
							@endif
						</a>
						<span class="img_tl"></span>
						<span class="img_tr"></span>
						<span class="img_bl"></span>
						<span class="img_br"></span>
					</div>
					<!-- end frame_box frame_big frame_center -->
					<div class="text_big">
						<p>
							Cùng chúng tôi chờ đợi<br />
							<table align="center">
		  					<!-- count datime to weddingdate -->
		  					@if(empty($website_item->count_down))
			  					@foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
			  						<div id="getD{{$index}}" style="display:none;">
			  							{{$dd}}
			  						</div>
			  					@endforeach
			  				@else
								@foreach( $date = explode('-', WebsiteController::getCountDown()) as $index=>$dd )
			  						<div id="getD{{$index}}" style="display:none;">
			  							{{$dd}}
			  						</div>
			  					@endforeach
			  				@endif
		  					
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
						</p>
					</div>
					<!-- end text_big -->
				</div>
				<!-- end entry -->

				@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
		  	
				  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
						<div class="tab-pane entry" id="welcome" >
					  		@include('website_user.themes3.page.left')
					  	</div>
					  	<!-- .tab welcome -->
				  	@endif

				  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
						<div class="tab-pane entry" id="love_story" >
							@include('website_user.themes3.page.love_story')
						</div>
						<!-- .tab love_story -->
					@endif

			  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
					  	<div class="tab-pane entry" id="about" >
					  		@include('website_user.themes3.page.left')

					  	</div>
					@endif

					@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
					  	<div class="tab-pane entry" id="wedding" >
					  		@include('website_user.themes3.page.left')

					  	</div>
				  	@endif

				  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
						<div class="tab-pane entry" id="traval" >
			  				@include('website_user.themes3.page.left')
			  			</div>
			  		@endif

			  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
			  			<div class="tab-pane entry" id="album" >
			  				@include('website_user.themes3.page.photo')
			  			</div>
			  		@endif

			  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
						<div class="tab-pane entry" id="contact" >
			  				@include('website_user.themes3.page.contact')
			  			</div>
			  		@endif

			  		@if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
						<div class="tab-pane entry" id="guestbook" >
			  				@include('website_user.themes3.page.guestbook')
			  			</div>
			  		@endif

			  		<!--  -->

			  	@endforeach
			</div>
			<!-- .tab-content -->



			<div class="social_box">
				<a class="social_vimeo first_social_box" target="_blank" href="http://vimeo.com" hidefocus="true" style="outline: none;">Vimeo</a>
				<a class="social_twitter" target="_blank" href="http://twitter.com" hidefocus="true" style="outline: none;">Twitter</a>
				<a class="social_picasa" target="_blank" href="http://picasa.com" hidefocus="true" style="outline: none;">Picasa</a>
			</div>
			<!-- end social_box -->
		</div>
		<!--/ .content -->
	</div>
	<!-- end main_mid -->

	<div class="main_bot">
		
	</div>
	<!-- end main_bot -->

</div>
<!-- end wrapper -->
@endforeach
@endif

<script type="text/javascript">
	$('.modal').appendTo("body");
</script>

</html>