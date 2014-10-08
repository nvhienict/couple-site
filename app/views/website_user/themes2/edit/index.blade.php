<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<title>{{$firstname}}'s Wedding Website | thuna.vn</title>
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
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes2.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

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

	</script>

</head>

@if($website)
@foreach( $website as $website_item )
<div class="background-themes" >

	<!-- Static navbar -->
  	<div class="navbar navbar-default menu_tab" role="navigation" style="position:fixed; width: 100%; z-index:1; clear:both; top:100; ">
    	<div class="container-fluid ">
      		<div class="navbar-header">
        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
         			<span class="sr-only">Toggle navigation</span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
	              	<span class="icon-bar"></span>
        		</button>
        		<a class="navbar-brand" href="#">Thuna.vn</a>
      		</div>
      		<div class="navbar-collapse collapse">

        		<ul class="nav navbar-nav">
        			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
				  	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
        				<li><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
				  	@endforeach
          			<!-- <li class="dropdown">
                		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                		<ul class="dropdown-menu" role="menu">
                  			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
						  	
                		</ul>
          			</li> -->
        		</ul>

      		</div><!--/.nav-collapse -->
    	</div><!--/.container-fluid -->
	</div>
	<!-- .end Static navbar -->

	<!-- <div class="row menu_tab_boder"style="position:fixed; width: 100%; z-index:99999; top: 135px;" >
		<div class="col-xs-12"></div>
	</div> -->
		

<!-- Tab panes -->
<div class="tab-content content_themes2" style="margin-top:150px;">
  	<div class="tab-pane active" id="home">
  		<div class="row" style="margin:0px;">
  			<div class="col-xs-1"></div>
  			<div class="col-xs-10">
  				<div class="row">
  					<div class="col-sm-4 col-lg-4 col-md-4">
  						@if(!empty($website_item->avatar_bride))
		  					<img width="100%;" src="{{Asset("$website_item->avatar_bride")}}">
						@else
							<img width="100%;" src="{{Asset('images/website/themes2/avatar/wedding17.jpg')}}">
						@endif
			            <button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>

		  				<div class="about_bride">
							{{$website_item->about_bride}}
							<span class="icon_edit_about"><a onclick="edit_about_bride();" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
						</div>

						<div class="edit_ctn_about_bride">
							<textarea name="edit_about_bride" class="ckeditor form-control" cols="40" rows="10" tabindex="1">
							   {{$website_item->about_bride}}
							</textarea>

							<span>
								<a onclick="update_about_bride();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
							</span>
							<span><a style="color:#e74c3c;" onclick="exit_edit_about_bride();" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>

						</div>

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
		  				@if(!empty($website_item->avatar_groom))
		  					<img width="100%;" src="{{Asset("$website_item->avatar_groom")}}">
						@else
							<img width="100%;" src="{{Asset('images/website/themes2/avatar/wedding17.jpg')}}">
						@endif
			            <button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>

		  				<div class="about_groom">
							{{$website_item->about_groom}}
							<span class="icon_edit_about"><a onclick="edit_about_groom();" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
						</div>

						<div class="edit_ctn_about">
							<textarea name="edit_about_groom" class="ckeditor form-control" cols="40" rows="10" tabindex="1">
							   {{$website_item->about_groom}}
							</textarea>

							<span>
								<a onclick="update_about_groom();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
							</span>
							<span><a style="color:#e74c3c;" onclick="exit_edit_about_groom();" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>

						</div>

		  			</div>
  				</div>
  			</div>
  			<div class="col-xs-1"></div>
  		</div>
  	</div>
  	<!-- .tab home -->

  	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div class="tab-pane" id="welcome"
			style="min-height: 240px;">
		  		@include('website_user.themes2.edit.left')
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

	  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
			<div class="tab-pane" id="love_story" style="min-height: 240px;">
				@include('website_user.themes2.edit.love_story')
			</div>
			<!-- .tab love_story -->
		@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="about" style="min-height: 240px;">
		  		@include('website_user.themes2.edit.right')
		  	</div>
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="even" style="min-height: 240px;">
		  		@include('website_user.themes2.edit.right')
		  	</div>
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div class="tab-pane" id="travel" style="min-height: 240px;">
  				@include('website_user.themes2.edit.text')
  			</div>
  		@endif

  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
  			<div class="tab-pane" id="images" style="min-height: 240px;">
  				@include('website_user.themes2.edit.photo')
  			</div>
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div class="tab-pane" id="contact" style="min-height: 240px;">
  				@include('website_user.themes2.edit.contact')
  			</div>
  		@endif

  		<!--  -->

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

</div>
@endforeach
@endif
<!-- and image-themes -->



</html>

