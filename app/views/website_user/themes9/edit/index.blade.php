
<head>

	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes9.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="{{Asset("assets/js/map-themes.js")}}"></script>
	
</head>

<body>

@if($website)
@foreach( $website as $website_item )

<div id="container-edit">
	<div class="lim-with ">
		<div class="container-frame">
			<div class="header">
				<div class="groom-bride" id="home">
					<div class="groom-photo">
			            <span id="prev_output_theme9_g">
		  					<a href="#">
				  				@if(!empty($website_item->avatar_groom))
				  					<img width="100%;" src="{{Asset("$website_item->avatar_groom")}}">
								@else
									<img src="{{Asset('images/website/themes9/bride.png')}}">
								@endif
							</a>
							
		  				</span>
		  				<button onclick="send_id(0,222)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>		
					</div>
					<!-- end groom-photo -->
					<div class="bride-photo">
						<span id="prev_output_theme9_b">
	  						<a href="#">
		  						@if(!empty($website_item->avatar_bride))
				  					<img width="100%;" src="{{Asset("$website_item->avatar_bride")}}">
								@else
									<img src="{{Asset('images/website/themes9/groom.png')}}">
								@endif
							</a>
	  						
			            </span>
			            <button onclick="send_id(0,111)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>		
					</div>
					<!-- end bride-photo -->
					<h1 class="groom-bride-name-edit">
						{{$website_item->name_groom}}
						 & 
						{{$website_item->name_bride}}
					</h1>
					<!-- end h1 -->
					<h2 class="info-description">
						Chúng tôi đang chuẩn bị đám cưới
						<br />
						{{WebsiteController::getDates()}}
					</h2>
					<!-- end h2 -->
					<div class="clear"></div>

					<nav id="menu-tiny" class="navbar navbar-default" role="navigation">
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
						      	<li><a href="#home" data-toggle="tab">Trang Chủ</a></li>
						      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						      		@if($index<3)
						      		<li class="li-menu menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
						      		@endif
						      	@endforeach
								<li class="li-menu dropdown">
								    <a data-toggle="dropdown" href="#">
								      Xem thêm <span class="caret"></span>
								    </a>
								    <ul class="dropdown-menu text-left" role="menu">
								   		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
									    	@if($index>=3)
									    	<li class="li-menu  menu-id{{$tab->id}}"><a class=" {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
									    	@endif
									    @endforeach
									    
								    </ul>
								</li>
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
					<!-- end menu -->

				</div>
				<!-- end groom-bride -->
			</div>
			<!-- end header -->

			<div class="wrapper">
				<div class="featured-img">
					<!-- Carousel -->
			    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						
						<!-- Wrapper for slides -->
						<?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
						<div class="carousel-inner">
						    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
				            @if( $check > 0 )
				                @foreach($albums as $index => $album)
				                	@if($index==0)
				                    	<div class="item active">
									    	<img src="{{Asset("{$album->photo}")}}" alt="" />
									    </div>
				                    @else
				                    	<div class="item">
									    	<img src="{{Asset("{$album->photo}")}}" alt="" />
									    </div>
				                    @endif

				                @endforeach
				            @else
				            	<div class="item active">
							    	<img src=" {{Asset("images/website/themes9/01.jpg")}}" alt="First slide">
				                </div>
							    <div class="item">
							    	<img src="{{Asset("images/website/themes9/02.jpg")}}" alt="Second slide">
							    </div>
							    <div class="item">
							    	<img  src="{{Asset("images/website/themes9/01.jpg")}}" alt="Third slide">
							    </div>
				            @endif
						</div>
						<!-- Controls -->
					</div><!-- /carousel -->
				</div>
				<!-- end featured-img -->

				<div class="ornament">
					
				</div>
				<!-- end ornament -->

				<div class="top-widget">
					<div class="top-widget-title">
						Cùng chúng tôi chờ đợi
					</div>
					<div class="time-count-down">
						
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

						<span id="echo_dday"></span> | <span id="echo_dhour"></span> | 
						<span id="echo_dmin"></span> | <span id="echo_dsec"></span>
						<br />Ngày | Giờ | Phút | Giây
					</div>
				</div>
				<!-- end top-widget -->

				<div class="feature-content">
					@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
						<!-- Welcome -->
						@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
							<div id="section_{{$tabWeb->type}}" class="item-left">
								@include('website_user.themes9.edit.left')
							</div>
						@endif
						<!-- About Us -->
						@if($tabWeb->type=="about" && $tabWeb->visiable==0)
							<div id="section_{{$tabWeb->type}}" class="item-right">
								@include('website_user.themes9.edit.right')
							</div>
						@endif

						<!-- cau chuyen tinh yeu -->
						@if($tabWeb->type=="love_story")
							<div id="section_{{$tabWeb->type}}" class="item-center">
								@include('website_user.themes9.edit.love_story')
							</div>
						@endif

						<!-- Wedding Event -->
						@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
							<div id="section_{{$tabWeb->type}}" class="item-center">
							@include('website_user.themes9.edit.center')
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
						@endif

						<!-- Travaling -->
						@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
							<div id="section_{{$tabWeb->type}}" class="item-center">
								@include('website_user.themes9.edit.text')
							</div>
				        @endif
				        <!-- Photo Album -->
				        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
					        <div id="section_{{$tabWeb->type}}" class="item-center">
					        	@include('website_user.themes9.edit.photo')
					        </div>
				        @endif

				       	@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
					        <div id="section_{{$tabWeb->type}}" class="item-center">
					        	@include('website_user.themes9.edit.contact')
					        </div>
				        @endif

				        @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
					        <div id="section_{{$tabWeb->type}}" class="item-center">
					        	@include('website_user.themes9.edit.guestbook')
					        </div>
				        @endif
					@endforeach
				</div>
				<!-- end feature-content -->
			</div>
			<!-- end wrapper -->

			<!-- footer -->
			<div class="sosical">
				<h3 class="contact">Liên hệ với chúng tôi</h3>

				<a href="http://twitter.com" ><i class="fa fa-twitter-square fa-2x"></i> </a>
				<a href="http://facebook.com" ><i class="fa fa-facebook-square fa-2x"></i> </a>
				<a href="http://youtube.com" ><i class="fa fa-youtube-square fa-2x"></i></a>
				
			</div>
			<!-- end footer -->

			<div class="copy-right">
				&copy 2014 <a href="thuna.vn">thuna.vn</a><br />
				Design by giangmd@thuna.vn
			</div>
			<!-- end copy-right -->

		</div>
		<!-- end container-frame -->

	</div>
	<!-- end lim-with -->
	
</div>
<!-- end container -->

<div class="float-right icon-go_top" >
    <a href="javascript:void(0);" class="btn btn-top" id="go_top">              
        <i class="fa fa-angle-up fa-3x text-center"></i>
    </a>
</div>

@endforeach
@endif


<script type="text/javascript">
	$('.carousel').carousel({
	  interval: 2000
	})
</script>
<script type="text/javascript">
    (function(){
        // Cuộn trang lên với scrollTop
        $('#go_top').click(function(){
            $('body,html').animate({scrollTop:0},200);
            return false;
        })
    })(jQuery)
    $(window).scroll(function(){
        if( $(window).scrollTop() > 200 ) {
        	$('.icon-go_top').show();
            $('#go_top').stop(false,true).fadeIn(200);
        }else{
            $('#go_top').hide();
            $('.icon-go_top').hide();
        }
    });
    $('.modal').appendTo("body");
</script>
</body>

</html>