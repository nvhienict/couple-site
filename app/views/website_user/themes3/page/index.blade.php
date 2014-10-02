<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<head>
	<title>T3 Wedding Website | thuna.vn</title>
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

	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes3.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

    <!-- menu -->
    <script src="{{Asset("assets/js_website_themes3/modernizr-2.6.2.min.js")}}"></script>
    


</head>

@if($website)
@foreach( $website as $website_item )

<div class="container_themes3_page">

		<!-- Fixed navbar -->
    	<div class="navbar-fixed-top menu-top" >
	      	<span>{{$firstname}} wedding</span><br />
	      	{{WebsiteController::getDates()}}
	    </div>
		
		 <div class='hexagon_p'>
		  	<ul>
		    	<li class='polygon_top'>
		      		<a href="javascript:;" id="welcome"><span>Chào mừng</span></a>
		    	</li>
		   		<li class='polygon_top'></li>
		    	<li class='polygon_top'>
		      		<a href="javascript:;" id="about"><span>Giới thiệu</span></a>
		    	</li>
		    	<li class='polygon_bottom'>
		      		<a href="javascript:;" id="event"><span>Sự kiện</span></a>
		    	</li>
		    	<li class='polygon_bottom'></li>
		    	<li class='polygon_bottom'>
		      		<a href="javascript:;" id="home"><span>Trang chủ</span></a>
		    	</li>
		  	</ul>
		</div>

		<div class='hexagon2_p'>
		  	<ul>
		    	<li class='polygon_top'>
		      		<a href="javascript:;" id="travel"><span>Du lịch</span></a>
		    	</li>
		   		<li class='polygon_top'></li>
		    	<li class='polygon_top'>
		      		<a href="javascript:;" id="images"><span>Ảnh</span></a>
		    	</li>
		    	<li class='polygon_bottom'>
		      		<a href="javascript:;" id="contact"><span>Liên hệ</span></a>
		    	</li>
		    	<li class='polygon_bottom'></li>
		    	<li class='polygon_bottom'>
		      		
		    	</li>
		  	</ul>
		</div>
		<!-- .menu -->
		<!-- .menu -->

	<div class="row margin-row">

		<div class="col-sm-6 col-lg-6 col-md-6 photo-book">


			    <script src="{{Asset("assets/js_website_themes3/jquery-1.9.1.min.js")}}"></script>
			    <!-- slide -->
			    <script src="{{Asset("assets/js_website_themes3/jssor.core.js")}}"></script>
			    <script src="{{Asset("assets/js_website_themes3/jssor.slider.js")}}"></script>
			    <script src="{{Asset("assets/js_website_themes3/jssor.utils.js")}}"></script>

			    <script src="{{Asset("assets/js_website_themes3/slide-respon.js")}}"></script>

			    <div style="display: block; overflow: hidden; margin: 20px auto 0 auto; padding: 10px 5px 5px 10px; width: 96%; max-width:600px; min-width: 240px; border: 1px solid #ccc; background-color: #fff; box-shadow: 2px 2px 10px 2px #dddddd; -webkit-box-shadow: 0px 0px 5px 0px #dddddd; font-size: .8em; line-height: 1.5em;">
			    <!-- Jssor Slider Begin -->
			    <!-- You can move inline styles to css file or css block. -->
			        <div id="slider2_container" style="position: relative; margin: 0px 5px 5px 0px; float: left; top: 0px; left: 0px; width: 600px;
			            height: 300px; overflow: hidden;">
			            <!-- Slides Container -->
			            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 600px; height: 300px;
			                overflow: hidden;">
			                
			                <?php $albums=PhotoTab::where('user',$website_item->user)->get()->count();?>
				            @if($albums>0)
				                @foreach(PhotoTab::where('user',$website_item->user)->get() as $album)
				                <div><img u="image" src="{{Asset("{$album->photo}")}}" alt="" />
					                <div u="caption" t="FLTTR|R" style="position:absolute;left:70px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">wedding</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">website</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">thuna.vn</div>
				                </div>
				                @endforeach
				            @else
				            	<div><img u="image" src="{{Asset('images/website/themes3/alila/01.jpg')}}" alt="" />
					                <div u="caption" t="FLTTR|R" style="position:absolute;left:70px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">wedding</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">website</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">thuna.vn</div>
				                </div>
				                <div><img u="image" src="{{Asset('images/website/themes3/alila/02.jpg')}}" alt="" />
					                <div u="caption" t="FLTTR|R" style="position:absolute;left:70px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">wedding</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">website</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">thuna.vn</div>
				                </div>
				                <div><img u="image" src="{{Asset('images/website/themes3/alila/03.jpg')}}" alt="" />
					                <div u="caption" t="FLTTR|R" style="position:absolute;left:70px;top:80px;width:110px;height:40px;font-size:36px;color:#fff;line-height:40px;">wedding</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:230px;top:80px;width:120px;height:40px;font-size:36px;color:#fff;line-height:40px;">website</div>
				                    <div u="caption" t="FLTTR|R" style="position:absolute;left:380px;top:80px;width:130px;height:40px;font-size:36px;color:#fff;line-height:40px;">thuna.vn</div>
				                </div>
				            @endif
			                
			            </div>
			        </div>
			        <!-- Jssor Slider End -->
			      
			    </div>

		</div>
		<!-- .photo book (page home)-->

		@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  	
		  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			  	<div class="col-sm-12 col-lg-12 col-md-12 welcome">
					@include('website_user.themes3.page.left')
				</div>
				<!-- . page welcome-->
		  	@endif

	  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
			  	<div class="col-sm-12 col-lg-12 col-md-12 about">
					@include('website_user.themes3.page.right')
				</div>
				<!-- . page about-->
			@endif

			@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
			  	<div class="col-sm-12 col-lg-12 col-md-12 event">
					@include('website_user.themes3.page.right')
				</div>
				<!-- . page event-->
		  	@endif

		  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
	  			<div class="col-sm-12 col-lg-12 col-md-12 travel">
					@include('website_user.themes3.page.text')
				</div>
				<!-- . page travel-->
	  		@endif

	  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
	  			<div class="col-sm-12 col-lg-12 col-md-12 images">
					@include('website_user.themes3.page.photo')
				</div>
				<!-- . page images-->
	  		@endif

	  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
	  			<div class="col-sm-12 col-lg-12 col-md-12 contact">
					@include('website_user.themes3.page.contact')
				</div>
				<!-- . page contact-->
	  		@endif

	  		<!--  -->

	  	@endforeach

	</div>
	<!-- .row margin-row -->

	<div class="row margin-row">
		<div class="col-md-12 text-center footer">
			<div class="col-md-12 text-center footer-badge" >
				<span>{{$firstname}} wedding</span>
			</div>
			<p style="margin-top:30px;">@2014 thuna.vn<br />
				Design by giangmd@thuna.vn
			</p>
		</div>
	</div>
	<!-- .footer -->




	<script src="{{Asset("assets/js_website_themes3/demo2.js")}}"></script>
	<script src="{{Asset("assets/js_website_themes3/polyfills.js")}}"></script>

	<!-- stranlator menu -->
	<script src="{{Asset("assets/js_website_themes3/stran-menu.js")}}"></script>

</div>
<!-- .container -->

@endforeach
@endif

</html>

