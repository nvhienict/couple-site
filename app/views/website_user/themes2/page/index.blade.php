<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
	
	<!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
	

	<script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>

	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes2.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

</head>

@if($website)
@foreach( $website as $website_item )

  	<!-- Static navbar -->
  	<div class="navbar navbar-default menu_tab" role="navigation" style="position:fixed; width: 100%; z-index:1; clear:both; top:0; ">
    	<div class="container-fluid ">
      		<div class="navbar-header">
        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
         			<span class="sr-only">Toggle navigation</span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#">Thuna.vn</a>
      		</div>
      		<div class="navbar-collapse collapse">

        		<ul class="nav navbar-nav">
        			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
				  	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
        				<li><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
				  	@endforeach
          			<!-- <li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                		<ul class="dropdown-menu" role="menu">
                  			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
						  	
                		</ul>
          			</li> -->
        		</ul>

      		</div><!--/.nav-collapse -->
    	</div><!--/.container-fluid -->
	</div>
	<!-- .end Static navbar -->


	<div class="row menu_tab_boder" style="position:fixed; width:100%; z-index:0; top: 70px;">
		<div class="col-xs-12"></div>
	</div>
		

<!-- Tab panes -->
<div class="tab-content responsive content_themes2" >
  	<div class="tab-pane active" id="home">
  		<div class="row" style="margin: 125px 0px 0px 0px;">
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
					Chào mừng đến dự đám cưới vào ngày {{WebsiteController::getDates()}}
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<img width="100%" src="{{Asset('images/website/themes2/couple.png')}}">
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					Mọi vấn đề xin liên hệ cho chúng tôi <br />
					{{WebsiteController::getEmail()}}
				</div>
  			</div>
				
  			<div class="col-xs-1"></div>
	</div>
	<div class="row footer">
		<div class="col-xs-12" style="text-align:center;">
			&copy 2014 bởi <a href="http://thuna.vn">thuna.vn</a>. All rights reserved.
		</div>
	</div>
<!-- .footer -->

@endforeach
@endif
<!-- and image-themes -->



</html>

