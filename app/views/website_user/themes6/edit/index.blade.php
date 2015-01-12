
<head>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes6-edit.css")}}">
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

	
</head>
@if($website)
@foreach( $website as $website_item )
<div style="background-color:white;" class="container-fluid menu_tab">
	<ul class="nav nav-tabs droptabs " style="border: none; " >
		<li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
	  	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $tab)
			<li  class="menu-id{{$tab->id}}" ><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
	  	@endforeach
	  	<li  class="dropdown" role="presentation">
	          <a  class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
	            <span class="fa fa-wrench"></span><span class="caret"></span>
	          </a>
	          <ul class="dropdown-menu setting-edit" role="menu">
	               <li><a  href="{{URL::route('index')}}">Dashboard</a></li>
	              <li role="presentation" class="divider"></li>
	              <li><a target="_blank" href="{{URL::route('view-previous',array($id_tmp))}}">Xem trước</a></li>
	              <li role="presentation" class="divider"></li>
	              <li><a href="{{URL::route('change_temp')}}">Thay đổi giao diện</a></li>
	              <li role="presentation" class="divider"></li>
	              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#change-bg-edit" data-backdrop="static">Thay đổi hình nền</a></li>
	              <li role="presentation" class="divider"></li>
	              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#album-photo-user" data-backdrop="static">Album ảnh</a></li>
	              <li role="presentation" class="divider"></li>
	              <li><a onclick="loadURL()" href="javascript:void(0);" data-toggle="modal" data-target="#change-url-user">Cài đặt URL</a></li>
	          </ul>
        </li>
	</ul>
		
</div>

<div  style="min-height:600px;background-image: url({{Asset("{$backgrounds}")}});">
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


