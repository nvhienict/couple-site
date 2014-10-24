<html>
<head>
		<title>Thuy's Wedding Website | thuna.vn</title>
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
	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>
	
	<!-- style css -->
	
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes5.css")}}">
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
		
			<!-- Fixed navbar -->
			<div  class="navbar_edits">
				<div id="nav-wrapper">
					<nav id="nav" class="navbar" style="position: relative;" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a  href="index.html">
									<img  class="padding_top_img" src="{{Asset('images/website/themes5/key-icon.png')}}" alt="logo">
								</a>
							</div>
							<div class="navbar-collapse collapse" id="example-navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
								<span class="re_li"><a class="TT{{$tabWeb->id}} scrollTo" href="#section_{{$tabWeb->type}}" >{{$tabWeb->title}}</a></span>
								@endforeach
							</ul>
							</div>
						</div>
					</nav>  	
				</div>
			</div>
			<!-- intro -->
		
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