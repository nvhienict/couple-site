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
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes8.css")}}">

	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">

	<!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>

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

@if($website)
@foreach( $website as $website_item )

<div id="container_edit" class="col-md-12">

	<header id="header" class="col-md-12">
		<!-- logo -->
		<div class="logo col-xs-4">
			<div class="logo-image">
				<img src="{{Asset('images/website/themes8/logo.jpg')}}">
			</div>

			<div class="name-bride col-xs-6">
				{{$website_item->name_groom}}
			</div>
			<div class="edit_name_groom">
				<input size="10" name="name_groom" value="{{$website_item->name_groom}}">
				<span>
					<a onclick="updateName();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				</span>
			</div>

			<div class="name-groom-edit col-xs-6">
				{{$website_item->name_bride}}
			</div>
			<div class="edit_name_bride">
				<input size="10" name="name_bride" value="{{$website_item->name_bride}}">
				<span>
					<a onclick="updateName();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				</span>
			</div>

		</div>
		<!-- end logo -->

		<!-- menu -->
		<nav id="topmenu_edit" class="navbar navbar-default col-xs-8" role="navigation">
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
			      	<span class="li-menu-edit"><a class="scrollTo" href="#home" data-toggle="tab">Trang Chủ</a></span>
			      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if($index<2)
			      		<span class="li-menu-edit"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></span>
			      		@endif
			      	@endforeach
					<span class="li-menu-edit dropdown">
					    <a data-toggle="dropdown" href="#">
					      Xem thêm <span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu" role="menu" style="background: #742C5B;">
					   		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						    	@if($index>=2)
						    	<span class="li-menu-edit-2"><a class=" {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></span>
						    	@endif
						    @endforeach
					    </ul>
					</span>
		      	</ul>
		   	</div>
		</nav>
		<!-- end menu -->

		

		
	</header>
	<!-- end header -->

	<!-- slider -->
	<div class="slider" id="home">
		@if($backgrounds)
			<img style="width: 100%; height: 350px" src="{{Asset("{$backgrounds}")}}">
		@else
			<img src="{{Asset('images/website/themes8/kiss1.jpg')}}">
		@endif
	</div>
	<!-- end slider -->

	<!-- 3 option -->
	<div id="info-panel">
		<div class="col-xs-2" style="width: 130px;"></div>
		<div class="time-count-down col-md-3">
			<div class="col-xs-1">
				<i id="info-panel-top1" class="fa fa-clock-o fa-2x"></i>
			</div>
			
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
		<!-- end time-count-down -->

		<div class="date-wedding col-md-3">
			<div class="col-xs-1">
				<i id="info-panel-top2" class="fa fa-heart-o fa-2x"></i>
			</div>

			Chúng tôi sẽ tổ chức đám cưới<br />
			vào {{WebsiteController::getDates()}}
		</div>
		<!-- end date-wedding -->

		<div class="contact col-md-3">
			<div class="col-xs-1">
				<i id="info-panel-top3" class="fa fa-phone-square fa-2x"></i>
			</div>

			<a href="http://twitter.com" style="color: #fff;"><i class="fa fa-twitter-square fa-2x"></i> </a>
			<a href="http://facebook.com" style="color: #fff;"><i class="fa fa-facebook-square fa-2x"></i> </a>
			<a href="http://youtube.com" style="color: #fff;"><i class="fa fa-youtube-square fa-2x"></i></a><br />
			Liên hệ cho chúng tôi
		</div>
		<!-- end contact -->
	</div>
	<!-- end 3 option -->

	<div class="line-hr">
		
		<div class="line-hr-left col-xs-5">
			
		</div>
		<div class="line-hr-shape col-xs-2">
			
		</div>
		<div class="line-hr-right col-xs-5">
			
		</div>
	</div>
	<!-- end line-hr -->

	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)

	 	<!-- Welcome -->
		@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.edit.left')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		@endif

		<!-- cau chuyen tinh yeu -->
		@if($tabWeb->type=="love_story")
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.edit.love_story')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.edit.right')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
			<div id="section_{{$tabWeb->type}}">
			@include('website_user.themes8.edit.right')
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
	   		 <div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
		
		@endif

		<!-- Travaling -->
		@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div id="section_{{$tabWeb->type}}">
				@include('website_user.themes8.edit.text')
			</div>
			<div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
	        <div id="section_{{$tabWeb->type}}">
	        	@include('website_user.themes8.edit.photo')
	        </div>
	        <div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
        @endif

       	@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
	        <div id="section_{{$tabWeb->type}}">
	        	@include('website_user.themes8.edit.contact')
	        </div>
	        <div class="line-hr">
				<div class="line-hr-left col-xs-5"></div>
				<div class="line-hr-shape col-xs-2"></div>
				<div class="line-hr-right col-xs-5"></div>
			</div>
			<!-- end line-hr -->
        @endif
      
       


  	@endforeach
  	
	<div id="footer">
		&copy 2014 <a href="thuna.vn">thuna.vn</a> <br />
		Design by giangmd@thuna.vn
	</div>


</div>

@endforeach
@endif

</html>