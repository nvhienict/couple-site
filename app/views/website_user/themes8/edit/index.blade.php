<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">


<head>
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes8.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">	
	<!-- Core JavaScript Files -->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="{{Asset("assets/js/map-themes.js")}}"></script>
</head>

@if($website)
@foreach( $website as $website_item )


<div id="container" class="col-md-12">

	<header id="header" class="col-md-12" style="width:75.7%;">
		<!-- logo -->
		<div class="logo col-xs-4">
			<div class="logo-image">
				<img src="{{Asset('images/website/themes8/logo.jpg')}}">
			</div>

			<div class="name-bride col-xs-6">
				{{WebsiteController::cutName($website_item->name_bride)}}
			</div>

			<div class="name-groom col-xs-6">
				{{WebsiteController::cutName($website_item->name_groom)}}
			</div>
			<div class="btn-name-bride text-center col-xs-6">
				<a onclick="editInforBride()" data-toggle="modal" data-target="#edit-infor-bride" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a>
			</div>

			<div class="text-center btn-name-groom col-xs-6">
				<a onclick="editInforGroom()"data-toggle="modal" data-target="#edit-infor-groom" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a>
			</div>
		</div>
		<!-- end logo -->

		<!-- menu -->
		<nav id="topmenu_edit" class="navbar navbar-default" role="navigation">
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
			      	<li class="li-menu-edit"><a class="scrollTo" href="#home" data-toggle="tab">Trang Chủ</a></li>
			      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if($index<2)
			      		<li class="li-menu-edit menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
			      		@endif
			      	@endforeach
					<li class="li-menu-edit dropdown" role="presentation">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
					      Xem thêm <span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu" role="menu" style="background: #742C5B; margin-top:0;">
					   		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						    	@if($index>=2)
						    	<li class="li-menu-edit-2 menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
						    	@endif
						    @endforeach
					    </ul>
				    <li  class="dropdown" role="presentation">
			          <a  class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
			            <span class="fa fa-wrench"></span><span class="caret"></span>
			          </a>
			          <ul class="dropdown-menu setting-edit" role="menu">
			              <li><a  href="{{URL::route('index')}}">Dashboard</a></li>
			              <li role="presentation" class="divider"></li>
			              <li><a target="_blank" href="{{URL::route('view-previous',array($id_tmp))}}">Xem trước</a></li>
			              <li role="presentation" class="divider"></li>
			              <li><a href="{{URL::route('change_temp')}}">Thay đổi giao diện</a></li>
			              <li role="presentation" class="divider"></li>
			              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#change-bg-edit" data-backdrop="static">Thay đổi hình nền</a></li>
			              <li role="presentation" class="divider"></li>
			              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#album-photo-user" data-backdrop="static">Album ảnh</a></li>
			              <li role="presentation" class="divider"></li>
			              <li><a onclick="loadURL()" href="javascript:void(0);" data-toggle="modal" data-target="#change-url-user">Cài đặt URL</a></li>
			          </ul>
			        </li>
					</li>
		      	</ul>
		   	</div>
		</nav>
		<!-- end menu -->

		
	</header>
	<!-- end header -->

	<!-- slider -->
	<div class="slider" id="home">
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
				@include('website_user.themes8.edit.left')
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
				@include('website_user.themes8.edit.love_story')
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
				@include('website_user.themes8.edit.right')
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
			@include('website_user.themes8.edit.right')
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
				@include('website_user.themes8.edit.text')
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
	        	@include('website_user.themes8.edit.photo')
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
	        	@include('website_user.themes8.edit.contact')
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
	        	@include('website_user.themes8.edit.guestbook')
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