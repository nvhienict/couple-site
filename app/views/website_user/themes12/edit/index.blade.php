<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes12.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="{{Asset("assets/js/map-themes.js")}}"></script>
	
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

<body>
	<div id="top"></div>
	<!-- end top -->

@if($website)
@foreach( $website as $website_item )

	<div id="wrapper">
			<div class="top-head">
				<div class="left-nav-edit">
					<nav class="navbar navbar-default" role="navigation">
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
						      	<li><a href="#home" data-toggle="tab">Trang Chủ</a></li>

								@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						      		@if($index<1)
						      		<li class="li-menu-edit menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
						      		@endif
						      	@endforeach
						      		<li ><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
					      	</ul>
					      	
					   	</div>
					</nav>
					<!-- end menu -->
				</div>

				<div class="right-nav-edit">
					<nav class="navbar navbar-default" role="navigation">
						<div class="navbar-header">
					      	<button type="button" class="navbar-toggle" data-toggle="collapse" 
					         data-target="#example-navbar-collapse-2">
					        	<span class="sr-only">Toggle navigation</span>
					        	<span class="icon-bar"></span>
					        	<span class="icon-bar"></span>
					        	<span class="icon-bar"></span>
					      	</button>
					   	</div>
					   	<div class="collapse navbar-collapse" id="example-navbar-collapse-2">
					      	<ul class="nav navbar-nav">
						      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
						      		@if( ($index>=1)&&($index<3) )
						      		<li class="li-menu-edit menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" data-toggle="tab">{{$tab->title}}</a></li>
						      		@endif
						      	@endforeach
						      	 	<li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
					      	</ul>
					      	
					   	</div>
					</nav>
					<!-- end menu -->
				</div>
			</div>
			<!-- end top-head -->

			<div class="logo-edit">
				<div class="name-groom">
					{{$website_item->name_groom}}
				</div>
				<div class="name-center">
					&
				</div>
				<div class="name-bride">
					{{$website_item->name_bride}}
				</div>
			</div>
			<!-- end logo -->
			<div class="clear"></div>

			<div class="menu-heart" id="home">
				<div class="groom">
					<span id="prev_output222">
  						<a href="#">
							@if(!empty($website_item->avatar_bride))
			  					<img class="img-circle" src="{{Asset("$website_item->avatar_groom")}}">
							@else
								<img class="img-circle" src="{{Asset('images/website/themes12/groom.png')}}">
							@endif
						</a>
						
					</span>
				</div>
				<!-- end groom -->
				
				<div class="bride">
					<span id="prev_output111">
  						<a href="#">
							@if(!empty($website_item->avatar_bride))
			  					<img class="img-circle" src="{{Asset("$website_item->avatar_bride")}}">
							@else
								<img class="img-circle" src="{{Asset('images/website/themes12/bride.png')}}">
							@endif
						</a>
						
					</span>
				</div>
				<!-- end bride -->

				<div class="h1">
					@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if( ($tab->type)=="traval" )
			      		<a class="edit-h1 {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" ><i class="fa fa-plane"></i></a>
			      		@endif
			      	@endforeach
				</div>
				<div class="h2">
					@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if( ($tab->type)=="album" )
			      		<a class="edit-h2 {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" ><i class="fa fa-film"></i></a>
			      		@endif
			      	@endforeach
				</div>
				<div class="h3">
					
				</div>
				<div class="h4">
					@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if( ($tab->type)=="love_story" )
			      		<a class="edit-h4 {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" ><i class="fa fa-heart-o fa-5x"></i></a>
			      		@endif
			      	@endforeach
				</div>
				<div class="h5">
					
				</div>
				<div class="h6">
					@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if( ($tab->type)=="guestbook" )
			      		<a class="edit-h6 {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" ><i class="fa fa-comments-o fa-4x"></i></a>
			      		@endif
			      	@endforeach
				</div>
				<div class="h7">
					@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
			      		@if( ($tab->type)=="contact" )
			      		<a class="edit-h7 {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" ><i class="fa fa-phone-square fa-2x"></i></a>
			      		@endif
			      	@endforeach
				</div>

			</div>
			<!-- end menu-heart -->

		<div class="content">

					@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
						<!-- Welcome -->
						@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
							<div id="section_{{$tabWeb->type}}" class="item r-title{{$tabWeb->id}}">
								@include('website_user.themes12.edit.left')
							</div>
							<!-- end item -->
						@endif
						<!-- About Us -->
						@if($tabWeb->type=="about" && $tabWeb->visiable==0)
							<div id="section_{{$tabWeb->type}}" class="item r-title{{$tabWeb->id}}">
								@include('website_user.themes12.edit.left')
							</div>
							<!-- end item -->
						@endif

						<!-- cau chuyen tinh yeu -->
						@if($tabWeb->type=="love_story")
							<div id="section_{{$tabWeb->type}}" class="item r-title{{$tabWeb->id}}">
								@include('website_user.themes12.edit.text')
							</div>
						@endif

						<!-- Wedding Event -->
						@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
							<div id="section_{{$tabWeb->type}}" class="item r-title{{$tabWeb->id}}">
								@include('website_user.themes12.edit.left')
							</div>
							<!-- end item -->
							<!-- <div class="row phara-margin" style="padding-top:10px;"> -->
					           <!-- -change map --> 
					           	<!-- <div class="text-center map-hove " style='padding:20px 20px;'>         
					                <p><input class="postcode" id="Postcode" name="Postcode" type="text"> <input type="submit" id="findbutton" value="Tìm địa điểm" /></p>        
					                  <div id="geomap" >
					                      <p>Loading Please Wait...</p>
					                  </div>
					                  <div id="cor"></div>
					                  <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
					                  <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">    
					            </div>  -->                             
					            <!-- -end map -->  
					   		<!-- </div> -->
						@endif

						<!-- Travaling -->
						@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
							<div id="section_{{$tabWeb->type}}" class="item r-title{{$tabWeb->id}}">
								@include('website_user.themes12.edit.left')
							</div>
							<!-- end item -->
				        @endif
				        <!-- Photo Album -->
				        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
					        <div id="section_{{$tabWeb->type}}" class="item r-title{{$tabWeb->id}}">
					        	@include('website_user.themes12.edit.photo')
					        </div>
				        @endif

				       	@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
					        <div id="section_{{$tabWeb->type}}" class="item r-title{{$tabWeb->id}}">
					        	@include('website_user.themes12.edit.contact')
					        </div>
				        @endif

				         <!--  Guest book -->
				       @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
				        <div id="section_{{$tabWeb->type}}"  class="item r-title{{$tabWeb->id}}">
				        	@include('website_user.themes12.edit.guestbook')
				    	</div>
				        @endif 

					@endforeach

		</div>
		<!-- end content -->

		<div class="sosical">
			
		</div>
		<!-- end sosical -->

		<div class="copy-right">
			&copy 2014 <a href="thuna.vn">thuna.vn</a><br />
			Powered by giangmd@thuna.vn
		</div>
		<!-- end copy-right -->


	</div>
	<!-- end wrapper -->

@endforeach
@endif


	<div class="clear"></div>
	<div id="bottom"></div>
	<!-- end bottom -->

</body>


</html>