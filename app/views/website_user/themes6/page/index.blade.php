<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$firstname}}'s wedding</title>
    <meta name="description" content="Tạo website cưới miễn phí">
    <meta name="author" content="Thuna.vn">
    <meta property="og:title" content="{{$firstname}}'s wedding">
	<meta property="og:description" content="Chào mừng đến với website cưới của chúng tôi">
	<meta property="og:url" content="http://thuna.vn/website/{{$url}}">
	<meta property="og:type" content="article">
	<meta property="og:image" content="{{Asset("{$web_fb}")}}" />
	
	<!-- css -->
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap/bootstrap.min.css")}}">
	
	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes6.css")}}">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
	<!-- menu_tab -->
    <link rel="stylesheet" href="{{Asset('assets/css/bootstrap-v3.1.1.min.css')}}">

	<link rel="stylesheet" href="{{Asset('assets/css/bootstrap-v3.1.1-theme.min.css')}}">

	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

	<script src="{{Asset('assets/js/bootstrap.3.1.1.min.js')}}"></script>
	<script src="{{Asset('assets/js/jquery.droptabs.js')}}"></script>
	
</head>
@if($website)
@foreach( $website as $website_item )

<body class="background-themes" style="background-image: url({{Asset("{$backgrounds}")}});">		
		
		<br>		
			<div class="navbar navbar-default navbar-fixed-top container-fluid menu_tab" style=" background-color:white;">
				<ul class="nav nav-tabs droptabss " style="border: none;" >
					<li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
				  	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
						<li><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
				  	@endforeach
					<li class="dropdown pull-right">
						<a href="#" id="myTabDrop6" class="dropdown-toggle" data-toggle="dropdown">Xem thêm...<b class="carets"></b></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop6">
							
						</ul>
					 </li>
				</ul>
			
			</div>
			<script type="text/javascript">
				$(".droptabss").droptabs({
				    development:true
				});
			</script>
			
		  

		<div class="after-image-themes">
			<div class="container">
			  	<div class="tab-content">
			  		<div class="row tab-pane active" id="home">
			  			
			  				@include('website_user.themes6.page.main')
			  		
					</div>
				@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tab)	

			  			@if($tab->type =="welcome" && $tab->visiable==0 )
			  				<div class="tab-pane " id="{{$tab->type}}">
			  					@include('website_user.themes6.page.left')
			  				</div>
			  			@endif
			  			
			  			@if($tab->type =="about" && $tab->visiable==0 )	
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.page.right')
			  				</div>
		  				@endif
		  				@if($tab->type =="love_story" && $tab->visiable==0 )
							<div class="tab-pane" id="{{$tab->type}}">
								@include('website_user.themes6.page.love_story')
							</div>						
						@endif
		  				@if($tab->type =="wedding" && $tab->visiable==0 )	
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.page.right')
			  				</div>
		  				@endif
		  				@if($tab->type =="traval" && $tab->visiable==0 )	
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.page.text')
			  				</div>
		  				@endif
		  				@if($tab->type =="album" && $tab->visiable==0 )
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.page.photo')
			  				</div>
			  			@endif
			  			
			  			@if($tab->type=="contact" && $tab->visiable==0)
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.page.contact')
			  				</div>	
		  				@endif	

		  				@if($tab->type=="guestbook" && $tab->visiable==0)
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.page.guestbook')
			  				</div>
			  				
		  				@endif	
					
				@endforeach
				</div>


			</div>
		</div>
	
</body>


@endforeach
@endif

<script type="text/javascript">
	$('.modal').appendTo("body");
</script>

</html>

