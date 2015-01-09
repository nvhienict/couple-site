<!DOCTYPE html>
<html lang="">
	<head>
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /><!--Bật Responsive-->

		<title>{{$firstname}}'s wedding</title>

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes16.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
    
    <script src="{{Asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{Asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>

    <script src="{{Asset("assets/js/themes16.js")}}"></script>

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
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
        .fancybox-title iframe {
            min-height: 30px;
            vertical-align: middle;
        }
    </style>
    <script src="{{Asset('assets/js/jquery.scrollTo.js')}}"></script>
    <script type="text/javascript">
		jQuery(document).ready(function($) {
    		$('a.scrollTo').click(function () {
	        $('body').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
	        return false;
			    });
			});
	</script>
	</head>
@if($website)
    @foreach( $website as $website_item )
	<body>
		<!-- navbar -->
		<div>
			<nav class="navbar navbar-default navbar-fixed-top navbar-main nav-themes16-default" role="navigation">
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
			         <li><a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></li>
			         @endforeach()
			      </ul>
			   </div>
			</nav>
		</div>
		<!-- end navbar -->

		<!-- slide image -->

		<div id="carousel-example-generic" class="carousel slide container item-slide"  data-ride="carousel">
					
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
	            	<div class="item active item-slide">
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

		<hr class="container" style="margin-top: 6%;">

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
					<figure class="bg-pro">
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
					<figure class="bg-pro">
						<a href="#">
							@if(($website_item->avatar_bride))
							<img  class="img-responsive img-infor" src="{{Asset("$website_item->avatar_bride")}}">
							@else
							<img  class="img-responsive img-infor" src="{{Asset('images/website/themes1/girl.jpg')}}">
							@endif
						</a>
					</figure>
					<h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="title-tab title-bg name-b">{{$website_item->name_bride}}</h3>
					<p class="about-b">{{$website_item->about_bride}}</p>
				</div>
			</div>
	    </div>

		<hr class="container">

		<div class="container">
		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
			@if($tabWeb->type =="welcome" )

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
	        	{{$tabWeb->title}}
	       		</h3>

				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                @if($images)
                    <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                @endif
                
                <p class="collapse" id="viewdetails1"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>
                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails1">Xem thêm &raquo;</a></p>
            
			</div>


			@endif

			<!-- @if($tabWeb->type=="love_story")

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
	        	{{$tabWeb->title}}
	       		 </h3>
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                @if($images)
                    <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                @endif

               <p class="collapse" id="viewdetails2"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>
                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails2">Xem thêm &raquo;</a></p>
			</div>
			@endif -->

			@if($tabWeb->type=="about")

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
	        		{{$tabWeb->title}}
	       		 </h3>
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                @if($images)
                    <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                @endif

               <p class="collapse" id="viewdetails3"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>
                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails3">Xem thêm &raquo;</a></p>
			</div>
			@endif

			@if($tabWeb->type=="wedding" )

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
		        	{{$tabWeb->title}}
		        </h3>
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                @if($images)
                    <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                @endif

                <p class="collapse" id="viewdetails4"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>
                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails4">Xem thêm &raquo;</a></p>
			</div>
			@endif
		@endforeach	
		</div>

		<hr class="container">

		<div class="container">
		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)

			<!-- @if($tabWeb->type=="traval")

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
		        	{{$tabWeb->title}}
		        </h3>
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                @if($images)
                    <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                @endif

                <p class="collapse" id="viewdetails5"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>
                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails5">Xem thêm &raquo;</a></p>
			</div>
			@endif -->

			 @if($tabWeb->type=="album" )

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad-r" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
		        	{{$tabWeb->title}}
		        </h3>
				<?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
		            @if($albums)
		                @foreach($albums as $album)
		                    <div class="col-xs-4 col-sm-3 col-md-3 col-lg-3 images-padding">
		                        <a class="fancybox" href="{{Asset("{$album->photo}")}}">
		                            <img class="img-responsive" style="width:100%;height:150px;" src="{{Asset("{$album->photo}")}}" alt="" />
		                        </a>
		                    </div>
		                @endforeach
		            @endif
		            
                <p class="collapse" id="viewdetails6"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>
                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails6">Xem thêm &raquo;</a></p>
			</div>
			@endif
		@endforeach
		</div>
		
		<hr class="container">

		<div class="container">
		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)

			@if($tabWeb->type=="register" )

			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pad-l" id="section_{{$tabWeb->type}}">
				<h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
		        	{{$tabWeb->title}}
		        </h3>
				<?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                @if($images)
                    <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                @endif

                <p class="collapse" id="viewdetails7"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>
                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails7">Xem thêm &raquo;</a></p>
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

                <p class="collapse" id="viewdetails8"><span  style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> </p>

                <p class="more-content"><a class="btn btn-more" data-toggle="collapse" data-target="#viewdetails8">Xem thêm &raquo;</a></p>
			</div>
			@endif

			@if($tabWeb->type=="guestbook")
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 pad-r" id="section_{{$tabWeb->type}}">
				@include('website_user.themes16.page.guestbook')
			</div>
			@endif
		@endforeach
		</div>
		<!-- end content tab -->

		<div class="row footer-line">
			<!-- footer -->
			<footer class="text-center" style="margin-top: 40px;">
				<p class="col-xs-12">
					{{$website_item->name_groom}} &amp; {{$website_item->name_bride}} 
				</p>
				on 
				<p>
					
	                @if(Session::has('email'))
	                    {{WebsiteController::getDates()}}
	                @else
	                    {{$date_url}}
	                @endif.
				</p>	       	
	        	<p>
	        		Site design by 
	        		<a title="" href="http://thuna.vn"> 
	                Thuna.vn
	            </a>
	        	</p>
			</footer>
<!-- / footer -->
		</div>
	</body>
	@endforeach
@endif
</html>