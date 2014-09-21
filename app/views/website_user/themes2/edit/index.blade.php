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

	</script>

</head>

@if($website)
@foreach( $website as $website_item )
<div class="background-themes" >

	<!-- Static navbar -->
  	<div class="navbar navbar-default menu_tab" role="navigation">
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
          			<li><a href="#welcome" role="tab" data-toggle="tab">Chào mừng</a></li>
				  	<li><a href="#about" role="tab" data-toggle="tab">Giới thiệu</a></li>
				  	<li><a href="#even" role="tab" data-toggle="tab">Sự kiện</a></li>
				  	<li><a href="#travel" role="tab" data-toggle="tab">Du lịch</a></li>
				  	<li><a href="#images" role="tab" data-toggle="tab">Ảnh</a></li>
				  	<li><a href="#contact" role="tab" data-toggle="tab">Liên hệ</a></li>
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

	<div class="row menu_tab_boder">
		<div class="col-xs-12"></div>
	</div>
		

<!-- Tab panes -->
<div class="tab-content content_themes2">
  	<div class="tab-pane active" id="home">
  		<div class="row" style="margin:0px;">
  			<div class="col-xs-1"></div>
  			<div class="col-xs-10">
  				<div class="row">
  					<div class="col-sm-4 col-lg-4 col-md-4">
		  				<img width="100%;" src="{{Asset('images/website/themes2/wedding17.jpg')}}">
		  				<h3 style="font-familly: {{$website_item->font}}; color:#{{$website_item->color2}}">
	  						Marry Eva
	  					</h3>
	  					<p style="color: #{{$website_item->color3}}">
	  						Là một nhân viên văn phòng tại Công ty thuna planner, tính tình hoà đồng, bla bla...
	  					</p>
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
		  					@foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
		  						<div id="getD{{$index}}" style="display:none;">
		  							{{$dd}}
		  						</div>
		  					@endforeach
		  					
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
		  				<img width="100%;" src="{{Asset('images/website/themes2/wedding22.jpg')}}">
		  				<h3 style="font-familly: {{$website_item->font}}; color:#{{$website_item->color2}}">
	  						Adam
	  					</h3>
	  					<p style="color: #{{$website_item->color3}}">
	  						Anh đẹp trai nhưng không thích chảnh, đến với Eva là 1 sự tình cờ hoà trong 1 tình yêu nồng cháy sắc lửa nam tính...
	  					</p>
		  			</div>
  				</div>
  			</div>
  			<div class="col-xs-1"></div>
  		</div>
  	</div>
  	<!-- .tab home -->

  	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div class="tab-pane" id="welcome">
		  		@include('website_user.themes2.edit.left')
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="about">
		  		@include('website_user.themes2.edit.right')
		  	</div>
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div class="tab-pane" id="even">
		  		@include('website_user.themes2.edit.right')
		  	</div>
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div class="tab-pane" id="travel">
  				@include('website_user.themes2.edit.text')
  			</div>
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div class="tab-pane" id="contact">
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
					Chào mừng đến dự đám cưới vào<br />
					01/01/2015 nhằm ngày 15/12/2014 Âm lịch
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					<img width="100%" src="{{Asset('images/website/themes2/couple.png')}}">
				</div>
				<div class="col-sm-4 col-lg-4 col-md-4">
					Mọi vấn đề xin liên hệ cho chúng tôi <br />
					0123456789
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

