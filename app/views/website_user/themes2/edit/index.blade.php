<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes2.css")}}">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
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
    <script src="{{Asset('assets/js/jquery.droptabs.js')}}"></script>
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
        .fancybox-title iframe {
            min-height: 30px;
            vertical-align: middle;
        }
    </style>

    <script type="text/javascript">
		
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

	</script>

</head>

@if($website)
@foreach( $website as $website_item )


	<div class="container-fluid menu_tab">
		<ul class="nav nav-tabs droptabs " style="border: none; " >
			<li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
		  	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $tab)
				<li  class="menu-id{{$tab->id}}" ><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
		  	@endforeach
		  	<li  class="dropdown" role="presentation">
	          <a  class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
	            <span class="glyphicon glyphicon-wrench"></span><span class="caret"></span>
	          </a>
	          <ul class="dropdown-menu setting-edit" role="menu">
	              <li><a target="_blank"; href="{{URL::route('view-previous',array($id_tmp))}}">Xem trước</a></li>
	              <li role="presentation" class="divider"></li>
	              <li><a href="{{URL::route('change_temp')}}">Thay đổi giao diện</a></li>
	              <li role="presentation" class="divider"></li>
	              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#change-bg-edit">Thay đổi hình nền</a></li>
	             

	          </ul>
	        </li>
		</ul>
			
	</div>

<!-- Tab panes -->
<div class="tab-content content_themes2" style="margin: 0px;">
  	<div class="tab-pane active" id="home">
  		<div class="row" style="margin: 100px 0px 0px 0px;">
  			<div class="col-xs-1"></div>
  			<div class="col-xs-10">
  				<div class="row">
  					<div class="col-sm-4 col-lg-4 col-md-4">
	  					<span id="prev_output111">
	  						<a href="#">
		  						@if(!empty($website_item->avatar_bride))
				  					<img width="100%;" src="{{Asset("$website_item->avatar_bride")}}">
								@else
									<img width="100%;" src="{{Asset('images/website/themes2/avatar/wedding17.jpg')}}">
								@endif
							</a> 						
			            </span>
			            <div class="text-center"><button onclick="send_id(0,111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button></div>

		  				<div class="about-bride text-center">
							{{$website_item->about_bride}}
							
						</div>
						<div class="text-center icon-infor"><a onclick="editInforBride()" data-toggle="modal" data-target="#edit-infor-bride" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
		  			</div>
		  			<div class="col-sm-4 col-lg-4 col-md-4">
		  				<div style="text-align:center; margin-bottom:30px;">
			  				<img class="floral_left" src="{{Asset('images/website/themes2/floral-left.png')}}">
			  				
			  				<span style="font-weight:bold; font-size:15px;">Từ bây giờ</span>
			  			
			  				<img class="floral_right" src="{{Asset('images/website/themes2/floral-right.png')}}">
			  			</div>
		  				<div style="text-align:center; margin-bottom:30px;">
		  				
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
		  				</div>
		  				<div style="text-align:center; margin-top:30px;">
		  					<span style="font-weight:bold; font-size:15px;">đến đám cưới của chúng tôi</span><br />
		  					<img src="{{Asset('images/website/themes2/floral-center.png')}}">
		  				</div>
		  			</div>
		  			<div class="col-sm-4 col-lg-4 col-md-4">
		  				<span id="prev_output222">
		  					<a href="#">
				  				@if(!empty($website_item->avatar_groom))
				  					<img width="100%;" src="{{Asset("$website_item->avatar_groom")}}">
								@else
									<img width="100%;" src="{{Asset('images/website/themes2/avatar/wedding17.jpg')}}">
								@endif
							</a>	
		  				</span>
		  				<div class="text-center"><button onclick="send_id(0,222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button></div>
			           				            
		  				<div class="about-groom text-center">
							{{$website_item->about_groom}}
						</div>
						<div class="text-center icon-infor"><a onclick="editInforGroom()"data-toggle="modal" data-target="#edit-infor-groom" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
		  			</div>
  				</div>
  			</div>
  			<div class="col-xs-1"></div>
  		</div>
  	</div>
  	<!-- .tab home -->

  	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div class="tab-pane" id="welcome" >
		  		@include('website_user.themes2.edit.left')
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

	  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
			<div class="tab-pane" id="love_story" >
				@include('website_user.themes2.edit.love_story')
			</div>
			<!-- .tab love_story -->
		@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="about" >
		  		@include('website_user.themes2.edit.right')

		  	</div>
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="wedding" >
		  		@include('website_user.themes2.edit.right')

		  	</div>
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div class="tab-pane" id="traval" >
  				@include('website_user.themes2.edit.text')
  			</div>
  		@endif

  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
  			<div class="tab-pane" id="album" >
  				@include('website_user.themes2.edit.photo')
  			</div>
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div class="tab-pane" id="contact" >
  				@include('website_user.themes2.edit.contact')
  			</div>
  		@endif

  		@if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
			<div class="tab-pane" id="guestbook" >
  				@include('website_user.themes2.edit.guestbook')
  			</div>
  		@endif
  	@endforeach
</div>
<!-- .tab-content -->


<!-- footer -->
	<div class="row footer_boder">
		<div class="col-xs-12"></div>
	</div>
	<div class="row footer">
  			<div class="col-xs-1"></div>
  			<div class="col-xs-10">
  				<div class="col-sm-4 col-lg-4 col-md-4">
					Chào mừng đến dự đám cưới vào ngày {{WebsiteController::getDates()}}
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<img width="100%" src="{{Asset('images/website/themes2/couple.png')}}">
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					Mọi vấn đề xin liên hệ cho chúng tôi <br />
					{{WebsiteController::getEmail()}}
				</div>
  			</div>
				
  			<div class="col-xs-1"></div>
	</div>
	<div class="row footer">
		<div class="col-xs-12" style="text-align:center;">
			&copy 2014 bởi <a href="http://thuna.vn">thuna.vn</a>. All rights reserved.
		</div>
	</div>
<!-- .footer -->


@endforeach
@endif
<!-- and image-themes -->



</html>

