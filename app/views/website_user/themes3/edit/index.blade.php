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
	
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes3.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

    <!-- menu_tab -->
    <link rel="stylesheet" href="{{Asset('assets/css/bootstrap-v3.1.1.min.css')}}">

	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap-v3.1.1-theme.min.css')}}">

	<style type="text/css">
		.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style]
		 {width: 100% !important;}
		.fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
		{width: 100% !important;}
	</style>
	<script src="{{Asset('assets/js/bootstrap.3.1.1.min.js')}}"></script>

	<script type="text/javascript">
		// function showckeditor(id){
		//         var text=$('.phara'+id).html();
		//         $('.phara'+id).hide();
		//         CKEDITOR.instances['editor'+id].setData(text);

		//         $('.editphara'+id).addClass("col-xs-6");
		//         $('.editphara'+id).show();
		//         $('.click-edit-hide'+id).hide();
		//         $('.ok-edit-show'+id).show();
		//     }
		// function showckeditor_text(id){
		//         var text=$('.phara'+id).html();
		//         $('.phara'+id).hide();
		//         CKEDITOR.instances['editor'+id].setData(text);

		//         $('.editphara'+id).addClass("col-xs-12");
		//         $('.editphara'+id).show();
		//         $('.click-edit-hide'+id).hide();
		//         $('.ok-edit-show'+id).show();
		//     }
		// function updateckeditor(id){
		// 	//var t= CKEDITOR.instances['editor4'].getData();alert(t);
		// 	$.ajax({
		// 		type:"post",
		// 		dataType: "html",
		// 		url:"{{URL::route('update_content_tab')}}",
		// 		data: {	content:CKEDITOR.instances['editor'+id].getData(),
		// 				id_tab:$('.get_id'+id).val()
		// 			},
		// 		success:function(data){
		// 			var obj = JSON.parse(data);
		// 			$('.phara'+id).html(obj.content);	
		// 		}
		// 	});
		// 		$('.editphara'+id).hide();
		// 		$('.phara'+id).show();
		// 		$('.click-edit-hide'+id).show();
		//         $('.ok-edit-show'+id).hide();
		// }  
		// function exitckeditor(id){
		// 		$('.editphara'+id).hide();
		// 		$('.phara'+id).show();
		// 		$('.click-edit-hide'+id).show();
		//         $('.ok-edit-show'+id).hide();
		// } 

		
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
					$('.head_name_left .head_name strong').html(obj['name_groom']);
					$('.head_name_right .head_name strong').html(obj['name_bride']);
				}
			});

		}
		

	</script>

</head>

@if($website)
@foreach( $website as $website_item )

<div class="wrapper" style="background-image: url({{Asset("{$backgrounds}")}});" >
	<div class="main_top">
		
	</div>
	<!-- end main_top -->

	<div class="main_mid">
		<div class="header">
			<div class="head_title">
				<h1>
					Đám cưới của chúng tôi
				</h1>
				<p class="sub_head_title">
					{{WebsiteController::getDates()}}
				</p>
			</div>
			<!-- end head_title -->

			<div class="head_names">
				<div class="col-xs-5 head_name_left">
					<span class="head_name">
						<strong style="color: #{{$website_item->color2}}">
							{{WebsiteController::cutName($website_item->name_groom)}}
						</strong>
						<div class="edit_name_groom">
							<input size="10" name="name_groom" value="{{$website_item->name_groom}}">
							<span>
								<a onclick="updateName();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
							</span>
						</div>
					</span>
				</div>
				<!-- end head_name_left -->

				<span class="col-xs-2 head_amp">
					<img width="100%" src="{{Asset('images/website/themes3/head_amp.png')}}">
				</span>
				<!-- end head_amp -->

				<div class="col-xs-5 head_name_right">
					<span class="head_name">
						<strong style="color: #{{$website_item->color2}}">
							{{WebsiteController::cutName($website_item->name_bride)}}
						</strong>
						<div class="edit_name_bride">
							<input size="10" name="name_bride" value="{{$website_item->name_bride}}">
							<span>
								<a onclick="updateName();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
							</span>
						</div>
					</span>
				</div>

				
				<!-- end head_name_right -->
				<!-- <span class="ribbon_left"></span>
				<span class="ribbon_right"></span> -->
			</div>
			<!-- end head_names -->
		</div>
		<!-- end header -->

		<div class="topmenu_line_top"></div>
		<nav id="topmenu" class="navbar navbar-default" role="navigation">
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
				      	<li><a class="a_menu3" href="#home" data-toggle="tab">Trang Chủ</a></li>
				      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
				      		@if($index<2)
				      		<li><a class="a_menu3 {{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
				      		@endif
				      	@endforeach
			      		<li class="dropdown">
						    <a class="a_menu3" data-toggle="dropdown" href="#">
						      Xem thêm <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu" role="menu">
						    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						    	@if($index>=2)
						    	<li><a class="a_menu3 {{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
						    	@endif
						    @endforeach
						    </ul>
						</li>
						
			      	</ul>
			      	
			   	</div>
		</nav>
		<div class="topmenu_line_bot"></div>

		<!-- .content -->
		<div class="content">
			<div class="tab-content">
				<div class="entry tab-pane active" id="home">
					<div id="prev_output_themes3222" class="frame_box frame_center" style="width:230px; height:170px; display: inline-block; ">
						<a href="#">
							
							@if(!empty($website_item->avatar_groom))
			  					<img style="width:100%; height:100%;" src="{{Asset("$website_item->avatar_groom")}}" >
							@else
								<img src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
							@endif
						</a>

						<span class="img_tl"></span>
						<span class="img_tr"></span>
						<span class="img_bl"></span>
						<span class="img_br"></span>
						<button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
					</div>


					<div id="prev_output_themes3111" class="frame_box frame_center" style="width:230px; height:170px; display: inline-block; ">
						<a href="#">
							
							@if(!empty($website_item->avatar_bride))
			  					<img style="width:100%; height:100%;" src="{{Asset("$website_item->avatar_bride")}}" >
							@else
								<img src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
							@endif
						</a>
						<span class="img_tl"></span>
						<span class="img_tr"></span>
						<span class="img_bl"></span>
						<span class="img_br"></span>
						<button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
					</div>
					<!-- end frame_box frame_big frame_center -->
					<div class="text_big">
						<p>
							Cùng chúng tôi chờ đợi<br />
							<table align="center">
		  					<!-- count datime to weddingdate -->
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
			  				<!-- .end -->
		  						<tr >
		  							<td class="time_wedding" id="echo_dday"></td>
		  							<td class="time_wedding_">:</td>
		  							<td class="time_wedding" id="echo_dhour"></td>
		  							<td class="time_wedding_">:</td>
		  							<td class="time_wedding" id="echo_dmin"></td>
		  							<td class="time_wedding_">:</td>
		  							<td class="time_wedding" id="echo_dsec"></td>
		  						</tr>
		  						<tr >
		  							<td class="time_txt">Ngày</td>
		  							<td></td>
		  							<td class="time_txt">Giờ</td>
		  							<td></td>
		  							<td class="time_txt">Phút</td>
		  							<td></td>
		  							<td class="time_txt">Giây</td>
		  						</tr>
		  					</table>
						</p>
					</div>
					<!-- end text_big -->
				</div>
				<!-- end entry -->

				@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
		  	
				  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
						<div class="tab-pane entry" id="welcome" >
					  		@include('website_user.themes3.edit.left')
					  	</div>
					  	<!-- .tab welcome -->
				  	@endif

				  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
						<div class="tab-pane entry" id="love_story" >
							@include('website_user.themes3.edit.love_story')
						</div>
						<!-- .tab love_story -->
					@endif

			  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
					  	<div class="tab-pane entry" id="about" >
					  		@include('website_user.themes3.edit.left')

					  	</div>
					@endif

					@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
					  	<div class="tab-pane entry" id="wedding" >
					  		@include('website_user.themes3.edit.left')

					  	</div>
				  	@endif

				  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
						<div class="tab-pane entry" id="traval" >
			  				@include('website_user.themes3.edit.left')
			  			</div>
			  		@endif

			  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
			  			<div class="tab-pane entry" id="album" >
			  				@include('website_user.themes3.edit.photo')
			  			</div>
			  		@endif

			  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
						<div class="tab-pane entry" id="contact" >
			  				@include('website_user.themes3.edit.contact')
			  			</div>
			  		@endif
			  		@if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
						<div class="tab-pane entry" id="guestbook" >
			  				@include('website_user.themes3.edit.text')
			  			</div>
			  		@endif

			  		<!--  -->

			  	@endforeach
			</div>
			<!-- .tab-content -->



			<div class="social_box">
				<a class="social_vimeo first_social_box" target="_blank" href="http://vimeo.com" hidefocus="true" style="outline: none;">Vimeo</a>
				<a class="social_twitter" target="_blank" href="http://twitter.com" hidefocus="true" style="outline: none;">Twitter</a>
				<a class="social_picasa" target="_blank" href="http://picasa.com" hidefocus="true" style="outline: none;">Picasa</a>
			</div>
			<!-- end social_box -->
		</div>
		<!--/ .content -->
	</div>
	<!-- end main_mid -->

	<div class="main_bot">
		
	</div>
	<!-- end main_bot -->

</div>
<!-- end wrapper -->
@endforeach
@endif

</html>