<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes5.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
    <script type="text/javascript">
		
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
					$('#about_bride1').text(obj.content);
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
					$('#about_groom1').text(obj.content);
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
		function editName(){
			$("#showName").hide();
			$("#editName").show();
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
					$('#topNameGroom').text(obj['name_groom']);
					$('#topNameBride').text(obj['name_bride']);
					$('#titleNameGroom').text(obj['name_groom']);
					$('#titleNameBride').text(obj['name_bride']);
				}
			});

			$("#showName").show();
			$("#editName").hide();
		}
		function exitEditName()
		{
			$("#showName").show();
			$("#editName").hide();
		}
		
</script>
	</head>
		@if($website)
		@foreach( $website as $website_item )
		
			<!-- Fixed navbar -->
			<section id="intro-portion">		
			<!-- Fixed navbar -->
				<div id="nav-wrapper">
					<div id="nav" class="navbar"  role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand" href="index.html"><img src="{{Asset('images/website/themes5/key-icon.png')}}" alt="logo"></a>
							</div>
							<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav navbar-right">
								@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
								<li class="menu-id{{$tabWeb->id}}"><a href="#section_{{$tabWeb->type}}">{{$tabWeb->title}}</a></li>
								@endforeach
								<li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
     							<li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
							</ul>
							</div>
						</div>
					</div>  	
				</div>
			<!-- intro -->
			</section>
		
			@include('website_user.themes5.edit.background')
			@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
			<!-- Our story -->
			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.ourstory')
			@endif
			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.welcome')
			@endif
			<!-- guestbook -->
			@if($tabWeb->type =="guestbook" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.guestbook')
			@endif
			<!-- photo gallery -->
			@if($tabWeb->type =="album" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.photo')
			@endif
			<!-- festivities -->
			@if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.wedding')
			@endif
			<!-- map -->
			@if($tabWeb->type =="map" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.map')
			@endif
			<!-- travel -->
			@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.travel')
			@endif
			<!-- RSVP -->
			@if($tabWeb->type =="contact" && $tabWeb->visiable==0 )
				@include('website_user.themes5.edit.contact')
			@endif
			@endforeach
			<!-- bridal party -->
		<script src="{{Asset("assets/js/uikit.min.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.nav.js")}}"></script>
		<script src="{{Asset("assets/js/jquery.nivo.slider.js")}}"></script>
		
		
	@endforeach
	@endif

	<footer >
		<div class="col-xs-6 col-md-offset-3">
			<div class="text-center">
				<p>47 Đỗ Huy Uyển, Đà Nẵng<br>
				© Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
			</div>
		</div>
	</footer>
</html>