	<head>
		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes4new.css")}}">
		 <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
		 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>		
	 <!--  Slide Album -->
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
	 


	</head>
	
		<!-- header -->
@if($website)
	@foreach( $website as $website_item )
		
		<div class="" style="background-color: rgb(245, 235, 239);">
			<nav style="padding:0px;" class="navbar navbar-default container navbar-fixed-top navbar-main" role="navigation">
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
			      <ul  class="nav navbar-nav">
			         <li><a class="a_menu scrollTo text-center" href="#title_home">Trang Chủ</a></span></li>
			        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
			         <li class="menu-id{{$menu_tab->id}} text-center">
			          <a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a>
			        </li>
			         @endforeach()
			         <li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title text-center" data-toggle="modal" data-target="#modal-add-title"></a></li>
			         <li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>			          
			      </ul>
			   </div>
			</nav>	
			<!-- end header -->			
			<!-- content -->
			<div class="container">
				<section class="content current" id="title_home" style="padding-top: 35px;">
				    <div class="">   
									
				        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about">
				        	<hgroup>
				        		<h2 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};"> Ours Wedding </h2>
				        		<h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-g">
				        			{{$website_item->name_groom}}
				        		</h1>
				        		<h6 class="text-center" style="font-size:20px;">&</h6>
				        		<h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-b">
				        			 {{$website_item->name_bride}}
				        		</h1>
				        		<h6>on</h6>
				        		<h3 class="text-center title-tab" style="color: #{{$website_item->color1}}">
				        			{{WebsiteController::getDates()}}
				        		</h3>
				        	</hgroup>
				        	<span class="text-center " style="color:#FF4FD0;">
				        		Hân hạnh mời các bạn đến tham dự cùng chúng tôi.
				        	</span>
			        		<div class="hr-bg"></div>
				        </div>
				        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 text-center">
								<figure id="prev_outputcc222" class="">
									<a href="#">
										@if(($website_item->avatar_groom))
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_groom")}}">
										@else
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/boy.jpg')}}">
										@endif
									</a>
								</figure>
								<h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}}" class="title-tab title-bg name-g">{{$website_item->name_groom}}</h3>
								<p class="about-g">{{$website_item->about_groom}} </p>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center">
								<figure id="prev_outputcc111" class="theme-border-big border">
									<a href="#">
										@if(($website_item->avatar_bride))
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_bride")}}">
										@else
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/girl.jpg')}}">
										@endif
									</a>
								</figure>
								<h3 style="font-family: 'Great Vibes',cursive; color:#{{$website_item->color2}}" class="title-tab title-bg name-b">{{$website_item->name_bride}}</h3>
								<p class="about-b">{{$website_item->about_bride}}</p>
							</div>
						</div>
						<div class="dt-sc-hr-invisible"></div>
				    </div>
				    <div class="hr_invisible medium"></div>
				    <div class="page-bottom-bg"></div>
				</section>
			@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
				@if($tabWeb->type =="welcome" )
				<!-- chao mung -->
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left">
			                    		
			                    	</div>
			                    	<div class="col-xs-2 line-hr-shape">
			                    		
			                    	</div>
			                    	<div class="col-xs-5 line-hr-right">
			                    		
			                    	</div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            <div class="container partion " >
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-image">
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<div id="prev_output_theme4{{$tabWeb->id}}" class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		            				 <a href="#">
		            				<?php 
					                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
					                     ?>
					                @if($images)
					                    <img  style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
					                @else 
					                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

					                @endif
					            	</a>
		            			</div>			
		            		</div>
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            			<input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
		            		</div>      		
		            	</div>
		            	<div onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		
		            </div>
		            <div class="container phara-margin">
				    	<div class="col-xs-10"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		
				           	<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
				    	</div>
				    </div>
				   
				</section>
				<!-- end chao mung -->

				@endif

		<!-- cau chuyen tinh yeu -->
				@if($tabWeb->type=="love_story")
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left">
			                    		
			                    	</div>
			                    	<div class="col-xs-2 line-hr-shape">
			                    		
			                    	</div>
			                    	<div class="col-xs-5 line-hr-right">
			                    		
			                    	</div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            <div class="container partion " >
		            	<div onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-image">
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<div id="prev_output_theme4{{$tabWeb->id}}" class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		          					<a href="#">
		          					<?php 
					                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
					                     ?>
					                @if($images)
					                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
					                @else 
					                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

					                @endif
					            </a>
		            			</div>	
		            			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			            			<button  onclick="send_id({{$tabWeb->id}},null,0)"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
			            			<input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
			            		</div> 		
		            		</div>
		            		
		            	</div>
		            </div>
		            <div class="container phara-margin">
				    	<div class="col-xs-10"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		
				           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
				    	</div>
				    </div>
				   
				</section>
				<!-- end history -->
				@endif

		<!-- About Us -->
				@if($tabWeb->type=="about")
				<!-- about -->
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left">
			                    		
			                    	</div>
			                    	<div class="col-xs-2 line-hr-shape">
			                    		
			                    	</div>
			                    	<div class="col-xs-5 line-hr-right">
			                    		
			                    	</div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            <div class="container partion border-line" >
		            	<div onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		
				        
	            		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-image">
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<div id="prev_output_theme4{{$tabWeb->id}}" class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		            				 <a href="#">
		            				<?php 
					                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
					                     ?>
					                @if($images)
					                    <img  style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
					                @else 
					                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

					                @endif
					            	</a>
		            			</div>			
		            		</div>
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            			<input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
		            		</div>      		
		            	</div>
		            </div>
		            <div class="container phara-margin">
				    	<div class="col-xs-10"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		
				           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
				    	</div>
				    </div>
				   
				</section>
				@endif

		<!-- Wedding Event -->
				@if($tabWeb->type=="wedding" )
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left"></div>
			                    	<div class="col-xs-2 line-hr-shape"></div>
			                    	<div class="col-xs-5 line-hr-right"></div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            <div class="container partion bg-event" >

		            	<div id="prev_output_theme4{{$tabWeb->id}}" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 part-image">
		            		<a href="#">
		            		<?php 
			                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
			                     ?>
			                @if($images)
			                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
			                @else 
			                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

			                @endif
			           	 </a>
			                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button  onclick="send_id({{$tabWeb->id}},null,0)"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            			<input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
		            		</div>
		            	</div>
		            	<div onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>

		            	<div id="prev_output_theme4{{$tabWeb->id}}" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 part-image">
		            		<a href="#">
		            		<?php 
			                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
			                     ?>
			                @if($images)
			                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
			                @else 
			                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">
			                </a>
			                @endif
		            	</div>
		            </div>
		           
		            <div class="container phara-margin">
				    	<div class="col-xs-10"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		
				           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
				    	</div>
				    </div>
				    <div class="container" style="margin-left: 0px; margin-right: 0px;">
		            	<!-- ban do -->
		            	<div class="text-center map-hove " style='padding:20px 20px;'>         
			                <p><input class="postcode" id="Postcode" name="Postcode" type="text"> <input type="submit" id="findbutton" value="Tìm địa điểm" /></p>        
			                  <div id="geomap" >
			                      <p>Loading Please Wait...</p>
			                  </div>
			                  <div id="cor"></div>
			                  <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
			                  <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">    
			            </div>
			            <!-- end ban do  -->
		            </div>
			
				</section>
				<!-- end about -->
				@endif

		<!-- Travaling -->
			@if($tabWeb->type=="traval")
				<!-- traval -->
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left">
			                    		
			                    	</div>
			                    	<div class="col-xs-2 line-hr-shape">
			                    		
			                    	</div>
			                    	<div class="col-xs-5 line-hr-right">
			                    		
			                    	</div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            <div class="container partion bg-traval" >
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-image">
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<div id="prev_output_theme4{{$tabWeb->id}}" class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		            				 <a href="#">
		            				<?php 
					                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
					                     ?>
					                @if($images)
					                    <img  style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
					                @else 
					                    <img style='width: 350px;height: 350px;' class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

					                @endif
					            	</a>
		            			</div>			
		            		</div>
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            			<input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
		            		</div>      		
		            	</div>
		            	<div onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 phara{{$tabWeb->id}} part-content">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		
		            </div>
		            <div class="container phara-margin">
				    	<div class="col-xs-10"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<!-- <span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
				            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
				    	</div>
				    </div>
				    
				</section>
				<!-- end traval -->
				<!-- album -->
				@endif
        <!-- Photo Album -->
    		    @if($tabWeb->type=="album")
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left">
			                    		
			                    	</div>
			                    	<div class="col-xs-2 line-hr-shape">
			                    		
			                    	</div>
			                    	<div class="col-xs-5 line-hr-right">
			                    		
			                    	</div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            <div onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="container part-content partion phara{{$tabWeb->id}}">
		            	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
		            </div>
		           
		            <div class="container phara-margin">
				    	<div class="col-xs-10"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		
				           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
				    	</div>
				    </div>
				   
		            <div id="prev_output_theme4{{$tabWeb->id}}" class="container partion " >
		            	<?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
			            @if($albums)
			                @foreach($albums as $album)
			                    <div class="col-xs-2 images-padding remove_image{{$album->id}}">
			                        <a class="fancybox" href="{{Asset("{$album->photo}")}}">
			                            <img class="img-responsive img-circle" src="{{Asset("{$album->photo}")}}" alt="" />
			                        </a>
			                    </div>
			                @endforeach
			            @endif
		            </div>
				</section>
				<!-- end album -->
				@endif

        <!-- Contact Us -->
        		@if($tabWeb->type=="contact")
				<!-- contact -->
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left">
			                    		
			                    	</div>
			                    	<div class="col-xs-2 line-hr-shape">
			                    		
			                    	</div>
			                    	<div class="col-xs-5 line-hr-right">
			                    		
			                    	</div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            <div onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="container part-content partion phara{{$tabWeb->id}}">
		            	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
		            </div>
		            
		            <div class="container phara-margin">
				    	<div class="col-xs-10"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		
				            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
				    	</div>
				    </div>
				    
		            <div class="container partion " >		            	
			        	<div class="col-xs-6 ">
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
				        </div>      
		            </div>
				</section>
				<!-- end contact -->
				
				<!-- guestbook -->
				@endif

       			<!--  Guest book -->
     			 @if($tabWeb->type=="guestbook")
				<section class="our-history r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
					<div class="page-title container">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <div class="inline-title text-center inline-title4">
						            <h3 class="text-center title-tab hr-white-two" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
						                {{$tabWeb->title}}
						            </h3>
						            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
						        </div>
			                    <div class="container line-hr">
			                    	<div class="col-xs-5 line-hr-left">
			                    		
			                    	</div>
			                    	<div class="col-xs-2 line-hr-shape">
			                    		
			                    	</div>
			                    	<div class="col-xs-5 line-hr-right">
			                    		
			                    	</div>
			                    </div>
			                </div>
		            	</div>               		
		            </div>
		            @include('website_user.themes4.edit.guestbook')
				</section>
				<!-- end guestbook -->
				@endif 
  			@endforeach 

			</div>
			<!-- end content -->
		
			<!-- footer -->
			<div class="container">
				<footer>
	                <div class="">
	                    <div class="aligncenter copyright">
	                        <div class="page-bottom-bg"></div>
	                        <div class="footer-contact">
	                        	<p>Connect 
	                        		<a href="mailto:thanh@thuna.vn">thanh@thuna.vn</a> 
	                        		0966666886
	                        	</p>
	                        	<ul id="dt-sc-social-icons">
	                        		<li>	
	                        			<a target="_blank" class="fa fa-twitter" href="https://www.facebook.com/thuna.weddingplaner?fref=ts"></a>
	                        		</li>
	                        		<li >
	                    				<a target="_blank" class="fa fa-youtube tb" href="https://www.youtube.com/channel/UCiKbAYqN2YUUKRkRHukt7SA"></a>
	                    			</li>
	                    			<li>	
	                    				<a target="_blank" class="fa fa-facebook " href="https://www.facebook.com/thuna.weddingplaner?fref=ts"></a>
	                    			</li>
	                    			<li>	
	                    				<a target="_blank" class="fa fa-google-plus fb" href="https://plus.google.com/u/0/+Thunaplannerwedding"></a>
	                    			</li>
	                    		</ul>
	                    	</div>					
	                                                   
	                        <p >{{$website_item->name_groom}} &amp; {{$website_item->name_bride}} on {{WebsiteController::getDates()}}. Site design by 
	                        	<a title="" href="http://thuna.vn"> 
	                        		Thuna Wedding
	                    		 </a>
	                		</p>
	                    </div>
	                </div>
	            </footer>
				
			</div>
			<!-- end footer -->
		</div>
	<!-- </div> -->
		@endforeach
	@endif