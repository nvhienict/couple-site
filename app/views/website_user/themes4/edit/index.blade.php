	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    	<meta name="author" content="Thuna.vn">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
		<link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
		<!-- Custom CSS -->
		<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes4new.css")}}">

		<!-- Bootstrap JS -->
		 <script src="{{Asset('assets/js/jquery.min.js')}}"></script>
		 <script type="text/javascript" src="{{Asset('assets/js/bootstrap.min.js')}}"></script>
		 <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		 <script src="{{Asset('assets/js/theme4.js')}}"></script>
		 <script src="{{Asset("assets/js/map-themes.js")}}"></script>
		 <script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>
		 <!--  Slide Album -->

            <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>
            <script src="{{Asset('assets/js/bootstrap.3.2.0.min.js')}}"></script>

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
            </style>
		 <script type="text/javascript">
	 		function updateckeditor(id){
			//var t= CKEDITOR.instances['editor4'].getData();alert(t);
			$.ajax({
				type:"post",
				dataType: "html",
				url:"{{URL::route('update_content_tab')}}",
				data: {	content:CKEDITOR.instances['editor'+id].getData(),
						id_tab:$('.get_id'+id).val()
					},
				success:function(data){
					var obj = JSON.parse(data);
					$('.phara'+id).html(obj.content);	
				}
			});
				$('.editphara'+id).hide();
				$('.phara'+id).show();
				$('.click-edit-hide'+id).show();
		        $('.ok-edit-show'+id).hide();
		}  
		 </script>


	</head>
	<!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="background-color: #F5EBEF;"> -->
		<!-- header -->
@if($website)
	@foreach( $website as $website_item )
		<div class="row header navbar_edits" style="width: 75.5%; margin-top: 0px; padding-left: 0px; padding-right: 0px;">
				<!-- narbar -->
			<nav class="navbar-main "  id="" >
                <div class=" ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 navbar-left ">
                    	<ul style="padding-left: 0px;">
                    		<li style="padding-left: 10px; padding-right: 10px;"><a class="a_menu scrollTo" href="#title_home" >Trang Chủ</a></li>
                    		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
                    		<li style="padding-left: 10px; padding-right: 10px;">
                    			<a class="{{$tab->id}} scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a>
                    		</li>
                    		@endforeach()
						</ul>
                    	
					</div>                   
			    </div>
            </nav>
            <!-- end narbar -->
		</div>
		<!-- end header -->
		<div class="row" style="background-color: rgb(245, 235, 239); width: 100%; margin-right: 0px; margin-left: 0px; padding-top: 115px;">			
			<!-- content -->
			<div class="content" style="margin-right: 0px; padding-right: 0px; padding-left: 0px; width:100%; margin-top:50px;padding-top:0px;">
				<section class="content current" id="title_home" style="padding-top: 35px;">
				    <div class="">   
									
				        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 about">
				        	<hgroup>
				        		<h2 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};"> Ours Wedding </h2>
				        		<h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-infor">
				        			{{$website_item->name_groom}} &amp; {{$website_item->name_bride}}
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
								<figure class="">
									<a href="#">
										@if(($website_item->avatar_groom))
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_groom")}}">
										@else
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/boy.jpg')}}">
										@endif
									</a>
									<button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
								</figure>
								<h3 style="font-family: 'Great Vibes',cursive;" class="title-bg name-g">{{$website_item->name_groom}}</h3>
								<p class="about-g">{{$website_item->about_groom}} </p>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 text-center">
								<figure class="theme-border-big border">
									<a href="#">
										@if(($website_item->avatar_bride))
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_bride")}}">
										@else
										<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/girl.jpg')}}">
										@endif
									</a>
									<button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
								</figure>
								<h3 style="font-family: 'Great Vibes',cursive;" class="title-bg name-b">{{$website_item->name_bride}}</h3>
								<p class="about-b">{{$website_item->about_bride}}</p>
							</div>
						</div>
						<div class="dt-sc-hr-invisible"></div>
				    </div>
				    <div class="hr_invisible medium"></div>
				    <div class="page-bottom-bg"></div>
				</section>
			@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
				@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
				<!-- chao mung -->
				<section class="our-history" id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row partion " >
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-image">
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		            				<?php 
					                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
					                     ?>
					                @if($images)
					                    <img  class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
					                @else 
					                    <img  class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

					                @endif
		            			</div>			
		            		</div>
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            		</div>      		
		            	</div>
		            	<div onclick="showckeditor({{$tabWeb->id}})" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		<div class="edit-content editphara{{$tabWeb->id}}">
				        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
				               {{$tabWeb->content}}
				            </textarea>
				        </div>
		            </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
				    		<span>
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				    	</div>
				    </div>
				</section>
				<!-- end chao mung -->

				@endif

		<!-- cau chuyen tinh yeu -->
				@if($tabWeb->type=="love_story")
				<section class="our-history" id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row partion " >
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		<div class="edit-content editphara{{$tabWeb->id}}">
				        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
				               {{$tabWeb->content}}
			            </textarea>
				        </div>
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-image">
		            		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
		          					<?php 
					                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
					                     ?>
					                @if($images)
					                    <img  class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
					                @else 
					                    <img  class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

					                @endif
		            			</div>	
		            			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			            			<button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
			            		</div> 		
		            		</div>
		            		
		            	</div>
		            </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row phara-margin">
				    	<div class="col-xs-6 ok-edit ok-edit-show{{$tabWeb->id}}">
				            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				            <span style="float:right;">
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				    	</div>
				    	<div class="col-xs-6"></div>
				    </div>
				</section>
				<!-- end history -->
				@endif

		<!-- About Us -->
				@if($tabWeb->type=="about" && $tabWeb->visiable==0)
				<!-- about -->
				<section class="our-history" id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row partion border-line" >
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		<div class="edit-content editphara{{$tabWeb->id}}">
				        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
				               {{$tabWeb->content}}
			            </textarea>
				        </div>
	            		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img-part part-image">
		            		<?php 
		                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
		                     ?>
			                @if($images)
			                    <img  class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
			                @else 
			                    <img  class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

			                @endif
			                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            		</div>
		            	</div>
		            </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row phara-margin">
				    	<div class="col-xs-6 ok-edit ok-edit-show{{$tabWeb->id}}" >
				            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				            <span style="float:right;">
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				    	</div>
				    	<div class="col-xs-6"></div>
				    </div>
				</section>
				@endif

		<!-- Wedding Event -->
				@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
				<section class="our-history" id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row partion bg-event" >

		            	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 part-image">
		            		<?php 
			                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
			                     ?>
			                @if($images)
			                    <img  class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
			                @else 
			                    <img  class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

			                @endif
			                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 part-content phara{{$tabWeb->id}}">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		<div class="edit-content editphara{{$tabWeb->id}}">
				        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
				               {{$tabWeb->content}}
				            </textarea>
				        </div>
		            	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 part-image">
		            		<?php 
			                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
			                     ?>
			                @if($images)
			                    <img  class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
			                @else 
			                    <img  class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

			                @endif
		            	</div>
		            </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-4"></div>
				    	<div class="col-xs-4 ok-edit ok-edit-show{{$tabWeb->id}}">
				            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				            <span style="float:right;">
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				    	</div>
				    </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor4({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row" style="margin-left: 0px; margin-right: 0px;">
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
			@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
				<!-- traval -->
				<section class="our-history"id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row partion bg-traval" >
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 part-image">
		            		<?php 
			                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
			                     ?>
			                @if($images)
			                    <img  class="img-responsive img-circle" src="{{Asset("{$images->photo}")}}" alt="">
			                @else 
			                    <img  class="img-responsive img-circle" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

			                @endif
			                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		            			<button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            		</div>
		            	</div>
		            	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 phara{{$tabWeb->id}} part-content">
		            		<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
	            		</div>
	            		<div class="edit-content editphara{{$tabWeb->id}}">
				        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
				               {{$tabWeb->content}}
				            </textarea>
				        </div>
		            </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
				    		<span>
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				    	</div>
				    </div>
				</section>
				<!-- end traval -->
				<!-- album -->
				@endif
        <!-- Photo Album -->
    		    @if($tabWeb->type=="album" && $tabWeb->visiable==0)
				<section class="our-history" id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row part-content partion phara{{$tabWeb->id}}">
		            	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
		            </div>
		            <div class="edit-content editphara{{$tabWeb->id}}">
			        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
			               {{$tabWeb->content}}
			            </textarea>
			        </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
				    		<span>
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				    	</div>
				    </div>
		            <div class="row partion " >
		            	<?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
			            @if($albums)
			                @foreach($albums as $album)
			                    <div class="col-xs-2 images-padding remove_image{{$album->id}}">
			                        <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
			                            <img class="img-responsive img-circle" src="{{Asset("{$album->photo}")}}" alt="" />
			                        </a>
			                    </div>
			                @endforeach
			            @endif
		            </div>
		            <div class="row phara-margin">
			            <div class="col-xs-11">
			            </div>
			            <div class="col-xs-1 click-edit ">
			                <span><a  onclick="send_id_album({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);"></a></span>
			                <span><a  class="glyphicon glyphicon-cog icon-site" href=""></a></span>
			            </div>               
			        </div>
				</section>
				<!-- end album -->
				@endif

        <!-- Contact Us -->
        		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
				<!-- contact -->
				<section class="our-history" id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row part-content partion phara{{$tabWeb->id}}">
		            	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
		            </div>
		            <div class="edit-content editphara{{$tabWeb->id}}">
			        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
			               {{$tabWeb->content}}
			            </textarea>
			        </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
				    		<span>
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				    	</div>
				    </div>
		            <div class="row partion " >		            	
			        	<div class="col-xs-4 ">
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
     			 @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
				<section class="our-history" id="section_{{$tabWeb->type}}">
					<div class="page-title">
						<div class="bg-title" >
			                <div class="bgin-title" >
			                    <h2 class="hr-white-two text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
			                    	{{$tabWeb->title}}
			                    </h2>
			                </div>
		            	</div>               		
		            </div>
		            <div class="row partion phara{{$tabWeb->id}} part-content" >
		            	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>  
		            </div>
		            <div class="edit-content editphara{{$tabWeb->id}}">
			        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
			               {{$tabWeb->content}}
			            </textarea>
			        </div>
		            <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
				    		<span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
				            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
				    	</div>
				    </div>
				    <div class="row phara-margin">
				    	<div class="col-xs-11"></div>
				    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
				    		<span>
				                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
				            </span>
				            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
				    	</div>
				    </div>
				</section>
				<!-- end guestbook -->
				@endif 
  			@endforeach 

			</div>
			<!-- end content -->
		
			<!-- footer -->
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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