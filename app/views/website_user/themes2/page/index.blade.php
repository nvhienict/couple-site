<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<title>{{$firstname}}'s Wedding Website | thuna.vn</title>
	<meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
	<meta property="og:image" itemprop="thumbnailUrl" content="{{Asset("assets/img/logo.png")}}">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="Dịch vụ cưới hỏi Thuna.vn">
	<meta property="og:type" content="website">
	<meta property="og:image" content="{{Asset("assets/img/logo.png")}}" />
	<meta property="fb:app_id" content="692038267552175" />
	

	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes2.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

   

    <!-- menu_tab -->
    <link rel="stylesheet" href="{{Asset('assets/css/bootstrap/bootstrap-v3.1.1.min.css')}}">

	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap/bootstrap-v3.1.1-theme.min.css')}}">

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	<script src="{{Asset('assets/js/bootstrap.3.1.1.min.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.droptabs.js')}}"></script>

</head>

@if($website)
@foreach( $website as $website_item )

  	<div class="container-fluid menu_tab">
		<ul class="nav nav-tabs droptabs " style="border: none; " >
			<li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
		  	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $tab)
				<li><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
		  	@endforeach
			<li class="dropdown pull-right">
				<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">Xem thêm...<b class="carets"></b></a>
				<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
					
				</ul>
			</li>
		</ul>
	</div>
	<script type="text/javascript">
		$(".droptabs").droptabs({
		    development:true
		});
	</script>

	<div class="row menu_tab_boder">
		<div class="col-xs-12"></div>
	</div>
		

<!-- Tab panes -->
<div class="tab-content responsive content_themes2" >
  	<div class="tab-pane active" id="home">
  		<div class="row" style="margin: 125px 0px 0px 0px;" >
  			<div class="col-xs-1"></div>
  			<div class="col-xs-10">
  				<div class="row">
  					<div class="col-sm-4 col-lg-4 col-md-4">
		  				@if(!empty($website_item->avatar_bride))
		  					<img width="100%;" src="{{Asset("$website_item->avatar_bride")}}">
						@else
							<img width="100%;" src="{{Asset('images/website/themes2/avatar/wedding17.jpg')}}">
						@endif
						
		  				<div class="about_bride">
							{{$website_item->about_bride}}
						</div>
		  			</div>
		  			<div class="col-sm-4 col-lg-4 col-md-4">
		  				<div style="text-align:center; margin-bottom:30px;">
			  				<img class="floral_left" src="{{Asset('images/website/themes2/floral-left.png')}}">
			  				
			  				<span style="font-weight:bold; font-size:15px;">Từ bây giờ</span>
			  			
			  				<img class="floral_right" src="{{Asset('images/website/themes2/floral-right.png')}}">
			  			</div>
		  				<div style="text-align:center; margin-bottom:30px;">
		  				
		  					<table align="center">
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
		  				</div>
		  				<div style="text-align:center; margin-top:30px;">
		  					<span style="font-weight:bold; font-size:15px;">đến đám cưới của chúng tôi</span><br />
		  					<img src="{{Asset('images/website/themes2/floral-center.png')}}">
		  				</div>
		  			</div>
		  			<div class="col-sm-4 col-lg-4 col-md-4">
		  				@if(!empty($website_item->avatar_groom))
		  					<img width="100%;" src="{{Asset("$website_item->avatar_groom")}}">
						@else
							<img width="100%;" src="{{Asset('images/website/themes2/avatar/wedding17.jpg')}}">
						@endif

		  				<div class="about_groom">
							{{$website_item->about_groom}}
						</div>
		  			</div>
  				</div>
  			</div>
  			<div class="col-xs-1"></div>
  		</div>
  	</div>
  	<!-- .tab home -->

  	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div class="tab-pane" id="welcome" >
		  		@include('website_user.themes2.page.left')
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

	  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
			<div class="tab-pane" id="love_story" >
				@include('website_user.themes2.page.love_story')
			</div>
			<!-- .tab love_story -->
		@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="about" >
		  		@include('website_user.themes2.page.right')
		  	</div>
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="wedding" >
		  		@include('website_user.themes2.page.right')
		  	</div>
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div class="tab-pane" id="traval" >
  				@include('website_user.themes2.page.text')
  			</div>
  		@endif

  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
			<div class="tab-pane" id="album" >
  				@include('website_user.themes2.page.photo')
  			</div>
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div class="tab-pane" id="contact" >
  				@include('website_user.themes2.page.contact')
  			</div>
  		@endif
  		@if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
			<div class="tab-pane" id="guestbook" >
  				@include('website_user.themes2.page.guestbook')
  			</div>
  		@endif

  		<!--  -->


  	@endforeach
</div>
<!-- .tab-content -->






<!-- footer -->
	<div class="row footer_boder">
		<div class="col-xs-12"></div>
	</div>
	<div class="row footer">
  			<div class="col-xs-1"></div>
  			<div class="col-xs-10">
  				<div class="col-sm-4 col-lg-4 col-md-4">
					Chào mừng đến dự đám cưới vào ngày 
					@if(Session::has('email'))
		            	{{WebsiteController::getDates()}}
		            @else
		            	{{$date_url}}
	            	@endif
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<img width="100%" src="{{Asset('images/website/themes2/couple.png')}}">
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					Mọi vấn đề xin liên hệ cho chúng tôi <br />
					@if(Session::has('email'))
		            	{{WebsiteController::getDates()}}
		            @else
		            	{{$email}}
	            	@endif
				</div>
  			</div>
				
  			<div class="col-xs-1"></div>
	</div>
	<div class="row footer">
		<div class="col-xs-12" style="text-align:center;">
			&copy 2014 <a href="http://thuna.vn">thuna.vn</a>. All rights reserved.<br />
			Design by giangmd@thuna.vn
		</div>
	</div>
<!-- .footer -->

@endforeach
@endif
<!-- and image-themes -->



</html>

