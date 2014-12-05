<!DOCTYPE html>
<html lang="">
	<head>
		<title>{{$firstname}}'s wedding</title>

    <script src="{{Asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{Asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes16.css")}}">

    <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>
    <script type="text/javascript" src="{{Asset('assets/js/bootstrap.3.2.0.min.js')}}"></script>
    

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
        .phara-margin{
        	margin-left: 0px;
        	margin-right: 0px;
        }
        .fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style]
	       {width: 100% !important;}
	      .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
	      {width: 100% !important;}
    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="{{Asset("assets/js/map-themes.js")}}"></script>
    <script src="{{Asset('assets/js/jquery.scrollTo.js')}}"></script>
    <script type="text/javascript">
		// function updateckeditor(id){
  //               //var t= CKEDITOR.instances['editor4'].getData();alert(t);
  //               $.ajax({
  //                   type:"post",
  //                   dataType: "html",
  //                   url:"{{URL::route('update_content_tab')}}",
  //                   data: { content:CKEDITOR.instances['editor'+id].getData(),
  //                           id_tab:$('.get_id'+id).val()
  //                       },
  //                   success:function(data){
  //                       var obj = JSON.parse(data);
  //                       $('.phara'+id).html(obj.content);   
  //                   }
  //               });
  //                   $('.editphara'+id).hide();
  //                   $('.phara'+id).show();
  //                   $('.click-edit-hide'+id).show();
  //                   $('.ok-edit-show'+id).hide();
  //           }  

        jQuery(document).ready(function($) {
	    // Call & Apply function scrollTo
		    $('a.scrollTo').click(function () {
		        $('.design_website_content_right').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
		        return false;
		    });
		});
	</script>
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
		   <div style="background-color:white;margin-top: 15px;" class="collapse navbar-collapse" id="example-navbar-collapse">
		      <ul style="background-color:white;" class="nav navbar-nav nav-themes16">
		      	 <span><a class="a_menu scrollTo" href="#title_home" style="padding:15px 8px; text-decoration: none;">Trang Chủ</a></span>
		      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
		         <span><a style="padding:15px 8px;text-decoration: none;" class="{{$tab->id}} scrollTo a_menu" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></span>
		         @endforeach()
		      </ul>
		   </div>
		</nav>
	</div>
	<!-- end navbar -->

	<!-- slide image -->

	<div id="carousel-example-generic" class="carousel slide item-slide-edit"  data-ride="carousel">
				
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
	<div class="row infor">
		 
								
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
						<img  class="img-responsive img-infor-edit" src="{{Asset("$website_item->avatar_groom")}}">
						@else
						<img  class="img-responsive img-infor-edit" src="{{Asset('images/website/themes1/boy.jpg')}}">
						@endif
					</a>
					<button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
				</figure>
				<h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="title-bg name-g">{{$website_item->name_groom}}</h3>
				<p class="about-g">{{$website_item->about_groom}} </p>
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center">
				<figure id="prev_output111" class="bg-pro">
					<a href="#">
						@if(($website_item->avatar_bride))
						<img  class="img-responsive img-infor-edit" src="{{Asset("$website_item->avatar_bride")}}">
						@else
						<img class="img-responsive img-infor-edit" src="{{Asset('images/website/themes1/girl.jpg')}}">
						@endif
					</a>
					<button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
				</figure>
				<h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="title-tab title-bg name-b">{{$website_item->name_bride}}</h3>
				<p class="about-b">{{$website_item->about_bride}}</p>
			</div>
		</div>
    </div>

    <hr>

    <div class="row">
	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
		@if($tabWeb->type =="welcome" )

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
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
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <div class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails1" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails1">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> -->
		</div>

		@endif

		@if($tabWeb->type=="love_story")

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
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
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <div class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails2" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails2">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> -->
		</div>
		@endif

		@if($tabWeb->type=="about")

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
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
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <div class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails3" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails3">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> -->
		</div>
		@endif
	@endforeach	
	</div>

	<hr>

	<div class="row">
	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
		@if($tabWeb->type=="wedding" )

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
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
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <div class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails4" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails4">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> -->
		</div>
		@endif

		@if($tabWeb->type=="traval")

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
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
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <div  class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails5" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails5">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> -->
		</div>
		@endif

		 @if($tabWeb->type=="album" )

		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
       		<div id="prev_output{{$tabWeb->id}}">
       			<a href="#">
				<?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
		            @if($albums)
		                @foreach($albums as $album)
		                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 images-padding">
		                        <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
		                            <img class="img-responsive" style="width:100%;height:150px;" src="{{Asset("{$album->photo}")}}" alt="" />
		                        </a>
		                    </div>
		                @endforeach
		            @endif
	            </a>
       		</div> 
       		<div class=" click-edit ">
	            <span><a style="background: #19b5bc; border:none;" onclick="send_id_album({{$tab->id}})" class="btn btn-primary"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);">Tải ảnh lên</a></span>
	            <!-- <span><a  onclick="send_id_album({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);"></a></span> -->
	        </div>  		
            
            <div class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails6" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails6">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> -->
		</div>
		@endif
	@endforeach
	</div>

	<hr>

	<div class="row">
		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)

			@if($tabWeb->type=="register" )

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
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
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <div class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails7" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails7">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> -->
		</div>
			@endif

			 @if($tabWeb->type=="contact")

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
		        	{{$tabWeb->title}}
		        </h3>
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
	            <div class="part-content phara{{$tabWeb->id}}">    		
	    		 	<span class="collapse" id="viewdetails8" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
	    		</div>
                

                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails8">Xem thêm &raquo;</a></p>
                <!-- <div class="edit-content editphara{{$tabWeb->id}}">
		        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
		               {{$tabWeb->content}}
		            </textarea>
		        </div> -->
		        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
		    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
		    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
		    	</div>
		    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
		            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
		            <span style="float:right;">
		                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
		                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
		            </span >
		    	</div> -->
			</div>
			@endif

			@if($tabWeb->type=="guestbook")
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
			<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        	{{$tabWeb->title}}
       		</h3>
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
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <div class="part-content phara{{$tabWeb->id}}">    		
    		 	<span class="collapse" id="viewdetails9" name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>         		 
    		</div>
           
            <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails9">Xem thêm &raquo;</a></p>
        	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
	               {{$tabWeb->content}}
	            </textarea>
	        </div> -->
	        <div class="click-edit click-edit-hide{{$tabWeb->id}}" >
	    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	    		<!-- <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
	    	</div>
	    	<!-- <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
	            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
	            <span style="float:right;">
	                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
	                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
	            </span >
	    	</div> --> 

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
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
		</div>

			@endif
		@endforeach
	</div>
	<!-- end content tab -->


		
	@endforeach
@endif	
</html>