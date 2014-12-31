<!DOCTYPE html>
<html lang="">
	<head>
    
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes16.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>

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
     <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
        .phara-margin{
        	margin-left: 0px;
        	margin-right: 0px;
        }
        .fancybox-title iframe {
            min-height: 30px;
            vertical-align: middle;
        }
    </style>
</head>
@if($website)
    @foreach( $website as $website_item )
		<!-- navbar -->
	<div class="navbar_edits header">
		<nav style="padding:0px;background-color:white;" class="navbar navbar-default nav-themes16-default" role="navigation">
		   <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" 
		         data-target="#example-navbar-collapse">
		         <span class="sr-only">Toggle navigation</span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		      </button>
		   </div>
		   <div  class="collapse navbar-collapse navbar-left " id="example-navbar-collapse">
		      <ul  class="nav navbar-nav nav-themes16">
		      	 <li><a class="a_menu scrollTo" href="#title_home" >Trang Chủ</a></li>
		      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
		         <li class="menu-id{{$menu_tab->id}}"><a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></li>
		         @endforeach()
		         <li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
     			<li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
		      </ul>
		   </div>
		</nav>
	</div>
	<!-- end navbar -->

	<!-- slide image -->

	<div id="carousel-example-generic" class="carousel slide item-slide container"  data-ride="carousel">
				
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
		    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
            @if($albums)
                @foreach($albums as $index => $album)
                	@if($index==0)
                    	<div class="item active">
					    	<img class="img-responsive fix-slide" src="{{Asset("{$album->photo}")}}" alt="" />
					    </div>
                    @else
                    	<div class="item">
					    	<img class="img-responsive fix-slide" src="{{Asset("{$album->photo}")}}" alt="" />
					    </div>
                    @endif

                @endforeach
            @else
            	<div class="item active item-slide-edit">
			    	<img src="{{Asset("images/website/themes16/picture2.jpg")}}" alt="First slide">
                </div>
			    <div class="item item-slide">
			    	<img src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="Second slide">
			    </div>
			    <div class="item item-slide">
			    	<img  src="{{Asset("images/website/themes16/picture3.jpg")}}" alt="Third slide">
			    </div>
            @endif
		</div>
		<!-- Controls -->
	</div>
	<!-- end slide images -->
	<hr style="margin-top: 6%;">

	<!-- content tab -->
	<div class="container infor">
		 
								
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about" id="title_home">
        	<hgroup>
        		<h2 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};"> Ours Wedding </h2>
        		<h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-g">
        			{{$website_item->name_groom}} 
        		</h1>
        		<h6 class="text-center" style="font-size:20px;">&</h6>
        		<h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-b">
        			{{$website_item->name_bride}}
        		</h1>
        		<h6 class="text-center">on</h6>
        		<h3 class="text-center title-tab" style="color: #{{$website_item->color1}}">
        			@if(Session::has('email'))
	            		{{WebsiteController::getDates()}}
	            	@else
	            		{{$date_url}}
	            	@endif
        		</h3>
        	</hgroup>
    		<div class="hr-bg"></div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 text-center">
				<figure id="prev_output222" class="bg-pro">
					<a href="#">
						@if(($website_item->avatar_groom))
						<img  class="img-responsive img-infor" src="{{Asset("$website_item->avatar_groom")}}">
						@else
						<img  class="img-responsive img-infor" src="{{Asset('images/website/themes1/boy.jpg')}}">
						@endif
					</a>
					
				</figure>
				<h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="title-bg name-g">{{$website_item->name_groom}}</h3>
				<p class="about-g">{{$website_item->about_groom}} </p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center">
				<figure id="prev_output111" class="bg-pro">
					<a href="#">
						@if(($website_item->avatar_bride))
						<img  class="img-responsive img-infor" src="{{Asset("$website_item->avatar_bride")}}">
						@else
						<img class="img-responsive img-infor" src="{{Asset('images/website/themes1/girl.jpg')}}">
						@endif
					</a>
					
				</figure>
				<h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="title-tab title-bg name-b">{{$website_item->name_bride}}</h3>
				<p class="about-b">{{$website_item->about_bride}}</p>
			</div>
		</div>
    </div>

    <hr>

    <div class="container">
	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
		@if($tabWeb->type =="welcome" )

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
			<div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

	            @if($images)
	                <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
	            @else 
	                <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">
	             
	            @endif
       		</div>  		
            </a>
            <button onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
             <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
    		 	<span class="collapse" id="viewdetails1" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails1">Xem thêm &raquo;</a></p>
        	
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    	</div>
	    	
		</div>

		@endif

		@if($tabWeb->type=="love_story")

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
			<div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

	            @if($images)
	                <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
	            @else 
	                <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">
	             
	            @endif
       		</div>  		
            </a>
            <button onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
             <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
    		 	<span class="collapse" id="viewdetails2" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails2">Xem thêm &raquo;</a></p>
        	
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		
	    	</div>
	    	
		</div>
		@endif

		@if($tabWeb->type=="about")

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
			<div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

	            @if($images)
	                <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
	            @else 
	                <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">
	             
	            @endif
       		</div>  		
            </a>
            <button onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
    		 	<span class="collapse" id="viewdetails3" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails3">Xem thêm &raquo;</a></p>
        	
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		
	    	</div>
	    	
		</div>
		@endif
	@endforeach	
	</div>

	<hr>

	<div class="container">
	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
		@if($tabWeb->type=="wedding" )

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
			<div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

	            @if($images)
	                <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
	            @else 
	                <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">
	             
	            @endif
       		</div>  		
            </a>
            <button onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
    		 	<span class="collapse" id="viewdetails4" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails4">Xem thêm &raquo;</a></p>
        	
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		
	    	</div>
	    	
		</div>
		@endif

		@if($tabWeb->type=="traval")

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
			<div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

	            @if($images)
	                <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
	            @else 
	                <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">
	             
	            @endif
       		</div>  		
            </a>
            <button  onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            <div  class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
    		 	<span class="collapse" id="viewdetails5" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails5">Xem thêm &raquo;</a></p>
        	
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		
	    	</div>
	    	
		</div>
		@endif

		 @if($tabWeb->type=="album" )

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
			<div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
		            @if($albums)
		                @foreach($albums as $album)
		                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 images-padding">
		                        <a class="fancybox" href="{{Asset("{$album->photo}")}}">
		                            <img class="img-responsive" style="width:100%;height:150px;" src="{{Asset("{$album->photo}")}}" alt="" />
		                        </a>
		                    </div>
		                @endforeach
		            @endif
	            </a>
       		</div> 
            <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
    		 	<span class="collapse" id="viewdetails6" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails6">Xem thêm &raquo;</a></p>
        	
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		
	    	</div>
	    	
		</div>
		@endif
	@endforeach
	</div>

	<hr>

	<div class="container">
		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)

			@if($tabWeb->type=="register" )

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
			<div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

	            @if($images)
	                <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
	            @else 
	                <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">
	             
	            @endif
       		</div>  		
            </a>
            <button onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
             <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
    		 	<span class="collapse" id="viewdetails7" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails7">Xem thêm &raquo;</a></p>
        	
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		
	    	</div>
	    	
		</div>
			@endif

			 @if($tabWeb->type=="contact")

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
				<div class="inline-title text-center">
		            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
		                {{$tabWeb->title}}
		            </h3>
		            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
		        </div>
				<form  class="contact-website" action="" method="POST" role="form">				             
	                 <div class="form-group">
	                     <label for="">From</label>
	                     <input  type="text" class="form-control" id="" placeholder="Your Name">
	                 </div>
	                 <div class="form-group">
	                     <label for="">Email</label>
	                     <input type="text" class="form-control" id="" placeholder="Email Adress Your">
	                 </div>
	                 <div class="form-group">
	                     <label for="">Subject</label>
	                     <input type="text" class="form-control" id="" placeholder="Subject">
	                 </div>
	                 <div class="form-group">
	                     <label for="">Mesages</label>
	                     <textarea type="text" class="form-control" id="" placeholder=Messages></textarea>
	                 </div>  
	                  <button type="submit" class="btn btn-primary send-contact">Send Mesages</button>                          
	            </form>
	            <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>    		
	    		 	<span class="collapse" id="viewdetails8" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
	    		</div>
                

                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails8">Xem thêm &raquo;</a></p>
                
		        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
		    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
		    		
		    	</div>
		    	
			</div>
			@endif

			@if($tabWeb->type=="guestbook")
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 pad-l r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
				@include('website_user.themes16.edit.guestbook')
			</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		</div>

			@endif
		@endforeach
	</div>
	<!-- end content tab -->


		
	@endforeach
@endif	
</html>