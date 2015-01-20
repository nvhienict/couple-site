<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes5.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
	</head>
		@if($website)
		@foreach( $website as $website_item )
		
			<!-- Fixed navbar -->
			<section id="intro-portion">		
			<!-- Fixed navbar -->
				<div id="nav-wrapper">
					<div id="nav" class="navbar"  role="navigation">
						<div class="container">
							<nav style="padding:0px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
							   <div class="navbar-header">
							      <button type="button" class="navbar-toggle" data-toggle="collapse" 
							         data-target="#example-navbar-collapse">
							         <span class="sr-only">Toggle navigation</span>
							         <span class="icon-bar"></span>
							         <span class="icon-bar"></span>
							         <span class="icon-bar"></span>
							      </button>
							      <a class="navbar-brand"><img src="{{Asset('images/website/themes5/key-icon.png')}}" alt="logo"></a>
							   </div>
							   <div class="collapse navbar-collapse" id="example-navbar-collapse">
							      <ul class="nav navbar-nav navbar-right">
							         <li><a class="a_menu scrollTo" href="#title_home">Trang Chủ</a></span></li>
							        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
							         <li class="menu-id{{$menu_tab->id}} text-center">
							          <a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a>
							        </li>
							         @endforeach()
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
							      </ul>
							   </div>
							</nav>	

						</div>
					</div>  	
				</div>
			<!-- intro -->
			</section>
		
			@include('website_user.themes5.edit.background')
			@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
			<!-- Our story -->
			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.ourstory')
			@endif
			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.welcome')
			@endif
			<!-- guestbook -->
			@if($tabWeb->type =="guestbook" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.guestbook')
			@endif
			<!-- photo gallery -->
			@if($tabWeb->type =="album" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.photo')
			@endif
			<!-- festivities -->
			@if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.wedding')
			@endif
			<!-- map -->
			@if($tabWeb->type =="map" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.map')
			@endif
			<!-- travel -->
			@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.travel')
			@endif
			<!-- RSVP -->
			@if($tabWeb->type =="contact" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.contact')
			@endif
			@endforeach
			<!-- bridal party -->
		<script src="{{Asset("assets/js/uikit.min.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.nav.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.nivo.slider.js")}}"></script>
		
		
	@endforeach
	@endif

	<footer >
		<div class="col-xs-6 col-md-offset-3">
			<div class="text-center">
				<p>47 Đỗ Huy Uyển, Đà Nẵng<br>
				© Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
			</div>
		</div>
	</footer>
</html>