<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>	
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes18-edit.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

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

<body>

@if($website)
@foreach( $website as $website_item )

	<div id="header">
		<div class="logo">
			<p>
				{{$website_item->name_groom}}
			</p>
			<img src="{{Asset('images/website/themes18/logo.png')}}">
			<p>
				{{$website_item->name_bride}}
			</p>
		</div>
		<!-- end logo -->

		<div class="menu">

			<nav id="menu-tiny" class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
			      	<button type="button" style="background-color: #877F6A;" class="navbar-toggle" data-toggle="collapse" 
			         data-target="#example-navbar-collapse">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			      	</button>
			   	</div>
			   	<div class="collapse navbar-collapse" id="example-navbar-collapse">
			      	<ul class="nav navbar-nav">
				      	<span><a class="scrollTo" href="#home" >Trang Chủ</a></span>
				      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
				      		@if($index<2)
				      		<span class="menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}">{{$tab->title}}</a></span>
				      		@endif
				      	@endforeach
				      	<span class="li-menu dropdown">
						    <a data-toggle="dropdown" href="#">
						      Xem thêm <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu text-left" role="menu">
						   		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
							    	@if($index>=2)
							    	<span class="menu-id{{$tab->id}}"><a class=" {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" >{{$tab->title}}</a></span>
							    	@endif
							    @endforeach
						    </ul>
						</span>
						<span  class="dropdown" role="presentation">
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
				        </span>

						
			      	</ul>
			      	
			   	</div>
			</nav>
			<!-- end menu-tiny -->
			
		</div>
		<!-- end menu -->
	</div>
	<!-- end header -->
	<div class="clear"></div>

	<div id="content">
		<div id="home" style="display:none;"></div>

		@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
			<!-- Welcome -->
			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.edit.tab')
				</div>
			@endif
			<!-- About Us -->
			@if($tabWeb->type=="about" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.edit.tab')
				</div>
			@endif

			<!-- cau chuyen tinh yeu -->
			@if($tabWeb->type=="love_story")
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.edit.text')
				</div>
			@endif

			<!-- Wedding Event -->
			@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.edit.tab')
				</div>
			@endif

			<!-- Travaling -->
			@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.edit.tab')
				</div>
	        @endif
	        @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.edit.guestbook')
				</div>
	        @endif
	        <!-- Photo Album -->
	        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
		        <div id="section_{{$tabWeb->type}}" class="item-des">
		        	@include('website_user.themes18.edit.photo')
		        </div>
	        @endif

	       	@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
		        <div id="section_{{$tabWeb->type}}" class="item-des">
		        	@include('website_user.themes18.edit.contact')
		        </div>
	        @endif

		@endforeach

		<div class="line-hr"></div>

	</div>
	<!-- end content -->


@endforeach
@endif


	<div id="footer">
		Copyright &copy 2014 <a href="http://thuna.vn">thuna.vn</a>. Alrights reserved.
	</div>
	<!-- end footer -->


<div class="float-right icon-go_top" >
    <a href="javascript:void(0);" class="btn btn-top" id="go_top">              
        <img src="{{Asset('images/website/themes18/back-to-top.png')}}">
    </a>
</div>



<script type="text/javascript">
	$('.carousel').carousel({
	  interval: 2000
	})
</script>
<script type="text/javascript">
    (function(){
        // Cuộn trang lên với scrollTop
        $('#go_top').click(function(){
            $('body,html').animate({scrollTop:0},200);
            return false;
        })
    })(jQuery)
    $(window).scroll(function(){
        if( $(window).scrollTop() > 200 ) {
        	$('.icon-go_top').show();
            $('#go_top').stop(false,true).fadeIn(200);
        }else{
            $('#go_top').hide();
            $('.icon-go_top').hide();
        }
    });

    function view_more(id_tab)
    {
    	$('#item-detail'+id_tab).toggle('slide');
    	$('.item-des-img'+id_tab).hide();
		$('#btn-view-more'+id_tab).hide();
		$('#btn-back-view-more'+id_tab).show();
    }

    function back_view_more(id_tab)
    {
    	$('#item-detail'+id_tab).hide();
    	$('#btn-back-view-more'+id_tab).hide();
    	$('.item-des-img'+id_tab).slideDown();
		$('#btn-view-more'+id_tab).slideDown();
    }
    
</script>

</body>
</html>