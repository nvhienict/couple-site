<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">


<head>
	<title>{{$firstname}}'s Wedding Website | thuna.vn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=false" />

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
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes9.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.3.2.0.min.js")}}"></script>
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="{{Asset("assets/js/map-themes.js")}}"></script>
	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>	 
	

	<script type="text/javascript">
		function showckeditor(id){
		        var text=$('.phara'+id).html();
		        $('.phara'+id).hide();
		        CKEDITOR.instances['editor'+id].setData(text);

		        $('.editphara'+id).addClass("col-xs-6");
		        $('.editphara'+id).show();
		        $('.click-edit-hide'+id).hide();
		        $('.ok-edit-show'+id).show();
		    }
		function showckeditor_text(id){
		        var text=$('.phara'+id).html();
		        $('.phara'+id).hide();
		        CKEDITOR.instances['editor'+id].setData(text);

		        $('.editphara'+id).addClass("col-xs-12");
		        $('.editphara'+id).show();
		        $('.click-edit-hide'+id).hide();
		        $('.ok-edit-show'+id).show();
		    }
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
		function exitckeditor(id){
				$('.editphara'+id).hide();
				$('.phara'+id).show();
				$('.click-edit-hide'+id).show();
		        $('.ok-edit-show'+id).hide();
		} 

		
		function edit_about_bride()
		{
			$('.edit_ctn_about_bride').show();
			$('.about_bride').hide();
		}
		function update_about_bride()
		{
			$.ajax({
				type:"post",
				dataType: "html",
				url:"{{URL::route('update_about_bride')}}",
				data: {	content:CKEDITOR.instances['edit_about_bride'].getData()
					},
				success:function(data){
					var obj = JSON.parse(data);
					$('.about_bride').html(obj.content);
				}
			});

			$('.edit_ctn_about_bride').hide();
			$('.about_bride').show();
		}
		function exit_edit_about_bride()
		{
			$('.edit_ctn_about_bride').hide();
			$('.about_bride').show();
		}


		function edit_about_groom()
		{
			$('.edit_ctn_about').show();
			$('.about_groom').hide();
		}
		function update_about_groom()
		{
			$.ajax({
				type:"post",
				dataType: "html",
				url:"{{URL::route('update_about_groom')}}",
				data: {	content:CKEDITOR.instances['edit_about_groom'].getData()
					},
				success:function(data){
					var obj = JSON.parse(data);
					$('.about_groom').html(obj.content);
				}
			});

			$('.edit_ctn_about').hide();
			$('.about_groom').show();
		}
		function exit_edit_about_groom()
		{
			$('.edit_ctn_about').hide();
			$('.about_groom').show();
		}

		
		function updateName()
		{
			var nameBride = $('input[name=name_bride]').val();
			var nameGroom = $('input[name=name_groom]').val();
			$.ajax({
				type:"post",
				dataType: "html",
				url:"{{URL::route('updateName')}}",
				data: {nameBride: nameBride,
						nameGroom: nameGroom},
				success:function(data){
					var obj = JSON.parse(data);
					$('.name-groom-edit').html(obj['name_bride']);
					$('.name-bride').html(obj['name_groom']);
				}
			});

		}
		

		jQuery(document).ready(function($) {
	    // Call & Apply function scrollTo
	    $('a.scrollTo').click(function () {
	        $('.design_website_content_right').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
	        return false;
	    });
	});

	</script>
	
</head>

<body>

<!-- <div class="bouquet col-lg-3 col-md-3 hidden-sm hidden-xs">
	<img src="{{Asset('images/website/themes9/bouquet.png')}}">
</div> -->
<!-- end bouquet -->

@if($website)
@foreach( $website as $website_item )

<div id="container-edit">
	<div class="lim-with ">
		<div class="container-frame">
			<div class="header">
				<div class="groom-bride" id="home">
					<div class="groom-photo">
			            <span id="prev_output222">
		  					<a href="#">
				  				@if(!empty($website_item->avatar_groom))
				  					<img width="100%;" src="{{Asset("$website_item->avatar_groom")}}">
								@else
									<img src="{{Asset('images/website/themes9/bride.png')}}">
								@endif
							</a>
							<button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none; z-index:99">Đổi Ảnh</button>
		  				</span>
					</div>
					<!-- end groom-photo -->
					<div class="bride-photo">
						<span id="prev_output111">
	  						<a href="#">
		  						@if(!empty($website_item->avatar_bride))
				  					<img width="100%;" src="{{Asset("$website_item->avatar_bride")}}">
								@else
									<img src="{{Asset('images/website/themes9/groom.png')}}">
								@endif
							</a>
	  						<button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none; z-index:99">Đổi Ảnh</button>
			            </span>
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
						      	<span class="li-menu-edit"><a href="#home" data-toggle="tab">Trang Chủ</a></span>
						      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						      		@if($index<4)
						      		<span class="li-menu-edit"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></span>
						      		@endif
						      	@endforeach
								<span class="li-menu-edit dropdown">
								    <a data-toggle="dropdown" href="#">
								      Xem thêm <span class="caret"></span>
								    </a>
								    <ul class="dropdown-menu text-left" role="menu" >
								   		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
									    	@if($index>=4)
									    	<span class="li-menu-edit-2"><a class=" {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></span>
									    	@endif
									    @endforeach
								    </ul>
								</span>
								
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
						<div class="carousel-inner">
						    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
				            @if($albums)
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
</script>

</body>

</html>