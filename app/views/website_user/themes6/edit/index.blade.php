
<head>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes6-edit.css")}}">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

	
</head>
@if($website)
@foreach( $website as $website_item )
<div  style="min-height:600px;background-image: url({{Asset("{$backgrounds}")}});">
			
		<br>		
			<div style="background-color:white;" class="container-fluid menu_tab">
				<ul class="nav nav-tabs droptabs " style="border: none; " >
					<li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
				  	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $tab)
						<li  class="menu-id{{$tab->id}}" ><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
				  	@endforeach
				  	<li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
		         	<li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
				</ul>
					
			</div>
		<div >
			<div class="container">
			  	<div class="tab-content">
			  		<div class="row tab-pane active" id="home">
			  			
			  				@include('website_user.themes6.edit.main')
					</div>
					@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tab)	

			  			@if($tab->type =="welcome" && $tab->visiable==0 )
			  				<div class="tab-pane " id="{{$tab->type}}">
			  					@include('website_user.themes6.edit.left')
			  				</div>
			  			@endif
			  			
			  			@if($tab->type =="about" && $tab->visiable==0 )	
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.edit.right')
			  				</div>
		  				@endif
		  				@if($tab->type =="love_story" && $tab->visiable==0 )
							<div class="tab-pane" id="{{$tab->type}}">
								@include('website_user.themes6.edit.love_story')
							</div>						
						@endif
		  				@if($tab->type =="wedding" && $tab->visiable==0 )	
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.edit.right')
			  				</div>
		  				@endif
		  				@if($tab->type =="traval" && $tab->visiable==0 )	
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.edit.text')
			  				</div>
		  				@endif
		  				@if($tab->type =="album" && $tab->visiable==0 )
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.edit.photo')
			  				</div>
			  			@endif		  			
			  			@if($tab->type=="contact" && $tab->visiable==0)
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.edit.contact')
			  				</div>	
		  				@endif
		  				@if($tab->type=="guestbook" && $tab->visiable==0)
			  				<div class="tab-pane" id="{{$tab->type}}">
			  					@include('website_user.themes6.edit.guestbook')
			  				</div>
			  				
		  				@endif			
					
					@endforeach
				</div>
			</div>

		</div>

	
</div>


@endforeach
@endif

<script type="text/javascript">
	$('.modal').appendTo("body");
</script>


