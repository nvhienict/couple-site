<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes15.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
	<script src="{{Asset("assets/js/map-themes.js")}}"></script>

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

<body style="background: url({{Asset("{$backgrounds}")}});">


@if($website)
@foreach( $website as $website_item )
	<!-- menu -->
	<div class="span2">
        <div class="menuTitle">
        	<a href="javascript:;" class="animate" onclick="toggle_menu();">Menu<br><span></span></a>
        </div>
        <div class="menuMov">
			<div class="menu">
				<ul class="sf-menu">
					<li class="first">
						<a href="#home" data-toggle="tab">
							<div class="mText" style="top: 0px;">Trang Chủ</div>
							<div class="_area"></div>
							<div class="_overPl" style="bottom: 100px;"></div>
							<div class="_overLine" style="opacity: 0;"></div>
							<div class="mTextOver" style="top: -100px;">Trang Chủ</div>
						</a>
					</li>
					@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
					<li class="menu-id{{$tab->id}}">
						<a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" data-toggle="tab">
							<div class="mText" style="top: 0px;">{{$tab->title}}</div>
							<div class="_area"></div>
							<div class="_overPl" style="bottom: 100px;"></div>
							<div class="_overLine" style="opacity: 0;"></div>
							<div class="mTextOver" style="top: -100px;">{{$tab->title}}</div>
						</a>
					</li>
			      	@endforeach
			      	<li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
     				<li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end menu -->
	<div class="logo">
		<div class="wedding-date">
			{{WebsiteController::getDates()}}
		</div>
		<!-- end wedding-date -->

		<div class="name">
			<span class="name-groom-edit name-g">
				{{WebsiteController::cutName($website_item->name_groom)}}
			</span>
			<span class="name-bride-edit name-b">
				{{WebsiteController::cutName($website_item->name_bride)}}
			</span>
		</div>
		<!-- end name -->
	</div>
	<!-- end wrapper -->

<!-- Tab panes -->
<div class="tab-content responsive">

	<div class="item-1 tab-pane active" id="home">
		<div class="item-title">
			Our's Wedding
		</div>

		<div class="hr-line">
			<div class="sep-1"></div>
			<div class="sep-2"></div>
		</div>

		<div style="display: inline-block; width:280px;">
			<div class="img-groom">
				<div id="prev_output222">
					<a href="#">
						@if(!empty($website_item->avatar_groom))
		  					<img src="{{Asset("$website_item->avatar_groom")}}" >
						@else
							<img src="{{Asset('images/website/themes15/page2_pic1.jpg')}}">
						@endif
					</a>
					
				</div>
			</div>
			<div class="item-content about-g" style="text-align:center;width:280px;">
				{{$website_item->about_groom}}
			</div>
		</div>

		<div style="display: inline-block; width:280px;">
			<div class="img-bride">
				<div id="prev_output111">
					<a href="#">
						@if(!empty($website_item->avatar_bride))
		  					<img src="{{Asset("$website_item->avatar_bride")}}" >
						@else
							<img src="{{Asset('images/website/themes15/page2_pic1.jpg')}}">
						@endif
					</a>
					
				</div>
			</div>
			<div class="item-content about-b" style="text-align:center; width:280px;">
				{{$website_item->about_bride}}
			</div>
		</div>

	</div>
	<!-- end item-1 -->


	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
		  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div class="item-1 tab-pane" id="welcome" >
		  		@include('website_user.themes15.edit.left')
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

	  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
			<div class="item-1 tab-pane" id="love_story" >
				@include('website_user.themes15.edit.love_story')
			</div>
			<!-- .tab love_story -->
		@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div class="item-1 tab-pane" id="about" >
		  		@include('website_user.themes15.edit.left')

		  	</div>
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div class="item-1 tab-pane" id="wedding" >
		  		@include('website_user.themes15.edit.left')

		  	</div>
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div class="item-1 tab-pane" id="traval" >
  				@include('website_user.themes15.edit.left')
  			</div>
  		@endif

  		@if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
			<div class="item-1 tab-pane" id="guestbook" >
  				@include('website_user.themes15.edit.guestbook')
  			</div>
  		@endif

  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
  			<div class="item-1 tab-pane" id="album" >
  				@include('website_user.themes15.edit.photo')
  			</div>
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div class="item-1 tab-pane" id="contact" >
  				@include('website_user.themes15.edit.contact')
  			</div>
  		@endif

  		<!--  -->

  	@endforeach



</div>
<!-- end tabcontent -->


@endforeach
@endif

<script type="text/javascript">
	function toggle_menu () {
		$('.menuMov').toggle('slide');
	}
</script>


</body>
</html>
