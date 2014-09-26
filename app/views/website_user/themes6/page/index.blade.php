<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<title> Wedding Website | thuna.vn</title>
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
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes6.css")}}">

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

	</script>

   
	
</head>
@if($website)
@foreach( $website as $website_item )
<body class="background-themes "style="background-image: url({{Asset("{$backgrounds}")}});">
	
		<div class="container main-template">
		<br>
			<div class="navbar-collapse collapse menu_tab_pills" >
				<ul class="nav navbar-nav menu_tab">
				  <li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
				  <li><a href="#welcome" role="tab" data-toggle="tab">Chào mừng</a></li>
				  <li><a href="#about" role="tab" data-toggle="tab">Giới thiệu</a></li>
				  <li><a href="#event" role="tab" data-toggle="tab">Sự kiện</a></li>
				  <li><a href="#travel" role="tab" data-toggle="tab">Du lịch</a></li>
				  <li><a href="#album" role="tab" data-toggle="tab">Album</a></li>
				  <li><a href="#contact" role="tab" data-toggle="tab">Liên lạc</a></li>
				</ul>
			</div>
		
		  	<div class="tab-content">
		  		<div class="row tab-pane active" id="home">
		  			<div class="col-xs-1"></div>
		  			<div class="col-xs-11">
		  				@include('website_user.themes6.edit.main')
		  			</div>
						
				</div>
			@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)	

		  			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
		  				<div class="tab-pane " id="welcome">
		  					@include('website_user.themes6.page.left')
		  				</div>
		  			@endif
		  			
		  			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )	
		  				<div class="tab-pane" id="about">
		  					@include('website_user.themes6.page.right')
		  				</div>
	  				@endif
	  				@if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )	
		  				<div class="tab-pane" id="event">
		  					@include('website_user.themes6.page.right')
		  				</div>
	  				@endif
	  				@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )	
		  				<div class="tab-pane" id="travel">
		  					@include('website_user.themes6.page.text')
		  				</div>
	  				@endif
	  				@if($tabWeb->type =="album" && $tabWeb->visiable==0 )
		  				<div class="tab-pane" id="album">
		  					@include('website_user.themes6.page.photo')
		  				</div>
		  			@endif
		  			@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
		  				<div class="tab-pane" id="contact">
		  					@include('website_user.themes6.page.contact')
		  				</div>	
	  				@endif		
				
			@endforeach
			</div>


		</div>

	
</body>


@endforeach
@endif
</html>

