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
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes6-edit.css")}}">

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
<div class="background-themes "style="background-image: url({{Asset("{$backgrounds}")}});">
			
		<br>		
			<div class="navbar navbar-default navbar-fixed-top menu_tab" role="navigation" style=" background-color:white;position:relative; opacity: 0.8;">
		    	<div class="container-fluid ">
		      		<div class="navbar-header">
		        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-themes_6">
		         			<span class="sr-only">Toggle navigation</span>
			              	<span class="icon-bar"></span>
			              	<span class="icon-bar"></span>
			              	<span class="icon-bar"></span>
		        		</button>
		        		
		      		</div>
		      		<div class="navbar-collapse collapse" id="menu-themes_6">

		        		<ul class="nav navbar-nav">
		        			<li class="active"><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
		        			@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
		        			<li><a href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>
						  	@endforeach
		          			
		        		</ul>

		      		</div><!--/.nav-collapse -->
		    	</div><!--/.container-fluid -->
			</div>
		<div class="after-image-themes">
			<div class="container">
			  	<div class="tab-content">
			  		<div class="row tab-pane active" id="home">
			  			
			  				@include('website_user.themes6.edit.main')
					</div>
				@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)	

			  			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			  				<div class="tab-pane " id="{{$tabWeb->type}}">
			  					@include('website_user.themes6.edit.left')
			  				</div>
			  			@endif
			  			
			  			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )	
			  				<div class="tab-pane" id="{{$tabWeb->type}}">
			  					@include('website_user.themes6.edit.right')
			  				</div>
		  				@endif
		  				@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
							<div class="tab-pane" id="{{$tabWeb->type}}">
								@include('website_user.themes6.edit.love_story')
							</div>						
						@endif
		  				@if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )	
			  				<div class="tab-pane" id="{{$tabWeb->type}}">
			  					@include('website_user.themes6.edit.right')
			  				</div>
		  				@endif
		  				@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )	
			  				<div class="tab-pane" id="{{$tabWeb->type}}">
			  					@include('website_user.themes6.edit.text')
			  				</div>
		  				@endif
		  				@if($tabWeb->type =="album" && $tabWeb->visiable==0 )
			  				<div class="tab-pane" id="{{$tabWeb->type}}">
			  					@include('website_user.themes6.edit.photo')
			  				</div>
			  			@endif		  			
			  			@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			  				<div class="tab-pane" id="{{$tabWeb->type}}">
			  					@include('website_user.themes6.edit.contact')
			  				</div>	
		  				@endif		
					
				@endforeach
				</div>
			</div>

		</div>

	
</div>


@endforeach
@endif
</html>

