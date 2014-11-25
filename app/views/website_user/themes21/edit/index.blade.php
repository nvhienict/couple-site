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
	
	
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes21.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">


	<script type="text/javascript" src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.3.2.0.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>

	

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

<body>
@if($website)
@foreach( $website as $website_item )

	<div id="home">

		<div class="groom-bride">
			<div class="groom-bride-name-groom">{{$website_item->name_groom}}</div>
			&nbsp&&nbsp
			<div class="groom-bride-name-bride">{{$website_item->name_bride}}</div>
		</div>
		<em class="line-name"></em>
		<em class="txt-welcome">
			Chào mừng đến với đám cưới của chúng tôi
		</em>

		<div class="home-img">
			@if($backgrounds)
				<img src="{{Asset("{$backgrounds}")}}">
			@else
				<img src="{{Asset('images/website/themes21/pic2.jpg')}}">
			@endif
		</div>

		<!-- element -->
		<em class="element_1"></em>
		<em class="element_2"></em>
		<em class="element_3"></em>
		<em class="element_3_3"></em>
		<em class="element_4"></em>
		<em class="element_5"></em>
		<em class="element_6"></em>
		<em class="element_7"></em>
		<em class="element_8"></em>
		<em class="element_9"></em>
		<em class="element_10"></em>
		<em class="element_11"></em>
		<!-- end element -->

	</div>
	<!-- end home -->


	@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  	
	  	@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			<div id="wedding">
		  		@include('website_user.themes21.edit.style-2')
		  		<!-- element -->
		        <em class="element_23"></em>
		        <em class="element_24"></em>
		        <em class="element_25"></em>
		        <em class="element_26"></em>
		        <em class="element_27"></em>
		        <em class="element_28"></em>
		        <em class="element_29"></em>
		        <em class="element_30"></em>
		        <em class="element_31"></em>
		        <em class="element_32"></em>
		        <em class="element_33"></em>
		        <!-- end element -->
		  	</div>
		  	<!-- .tab welcome -->
	  	@endif

	  	@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
			<div id="div-text">
				@include('website_user.themes21.edit.style-3')
				<!-- element -->
				<em class="element_23"></em>
				<em class="element_24"></em>
				<em class="element_25"></em>
				<em class="element_26"></em>
				<em class="element_27"></em>
				<em class="element_28"></em>
				<em class="element_29"></em>
				<em class="element_30"></em>
				<em class="element_31"></em>
				<em class="element_32"></em>
				<em class="element_33"></em>
				<!-- end element -->
			</div>
			<!-- .tab love_story -->
		@endif

  		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		  	<div id="about-us">
		  		@include('website_user.themes21.edit.style-1')
		  		<!-- element -->
		        <em class="element_12"></em>
		        <em class="element_13"></em>
		        <em class="element_14"></em>
		        <em class="element_15"></em>
		        <em class="element_16"></em>
		        <em class="element_17"></em>
		        <em class="element_18"></em>
		        <em class="element_19"></em>
		        <em class="element_20"></em>
		        <em class="element_21"></em>
		        <em class="element_22"></em>
		        <!-- end element -->
		  	</div>
		  	
		@endif

		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		  	<div id="about-us-2">
		  		@include('website_user.themes21.edit.style-2')
		  		<!-- element -->
		        <em class="element_12"></em>
		        <em class="element_14"></em>
		        <em class="element_15"></em>
		        <em class="element_17"></em>
		        <em class="element_18"></em>
		        <em class="element_19"></em>
		        <em class="element_20"></em>
		        <em class="element_22"></em>
		        <!-- end element -->
		  	</div>
		  	
	  	@endif

	  	@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
			<div id="div-text-4">
				@include('website_user.themes21.edit.style-3')
				<!-- element -->
				<em class="element_23"></em>
				<em class="element_24"></em>
				<em class="element_26"></em>
				<em class="element_27"></em>
				<em class="element_28"></em>
				<em class="element_30"></em>
				<em class="element_31"></em>
				<em class="element_33"></em>
				<!-- end element -->
			</div>
			
  		@endif

  		@if($tabWeb->type=="album" && $tabWeb->visiable==0)
  			<div id="photo">
  				@include('website_user.themes21.edit.style-4')
  				<!-- element -->
				<em class="element_34"></em>
				<em class="element_35"></em>
				<em class="element_36"></em>
				<em class="element_37"></em>
				<em class="element_38"></em>
				<em class="element_39"></em>
				<em class="element_40"></em>
				<em class="element_41"></em>
				<em class="element_42"></em>
				<em class="element_43"></em>
				<em class="element_44"></em>
				<em class="element_45"></em>
				<em class="element_46"></em>
				<!-- end element -->
  			</div>
  			
  		@endif

  		@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
			<div id="div-text-5">
				@include('website_user.themes21.edit.style-5')
				<!-- element -->
				<em class="element_23"></em>
				<em class="element_26"></em>
				<em class="element_27"></em>
				<em class="element_30"></em>
				<em class="element_33"></em>
				<!-- end element -->
			</div>
			
  		@endif

  		<!--  -->

  	@endforeach

	<div id="footer">

		<div class="ft-center" style="margin-left: 2%; width: 100%; margin-top: -1%;">
			<nav class="navbar navbar-default" role="navigation" style="background: none;">
			   <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" 
			         data-target="#example-navbar-collapse">
			         <span class="sr-only">Toggle navigation</span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			         <span class="icon-bar"></span>
			      </button>
			   </div>
			   <div class="collapse navbar-collapse" id="example-navbar-collapse" style="background: none;">
			      	<ul class="nav navbar-nav" style="background: none;">
			      		<li><a style="font-size: 12px;" href="javascript:void(0);" id="home_page">Trang Chủ</a></li>
			      	 	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $tab)
			      	 		<li><a style="font-size: 12px;" class="{{$tab->id}} TT{{$tab->id}} {{$tab->type}}" href="javascript:void(0);" >{{$tab->title}}</a></li>
			      	 	@endforeach
			      	 	<script type="text/javascript" src="{{Asset("assets/js/themes21.js")}}"></script>
			     	 </ul>
			   </div>
			</nav>
		</div>

		<div class="ft-right">
		</div>
	</div>

@endforeach
@endif


</body>
</html>

