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
	
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes18.css")}}">
	<!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/template-font.css")}}">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap/bootstrap.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />


	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.3.2.0.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/main.js")}}"></script>

	<script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>

	<script type="text/javascript">

		jQuery(document).ready(function($) {
		    // Call & Apply function scrollTo
		    $('a.scrollTo').click(function () {
		        $('body').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
		        return false;
		    });
		});

	</script>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=943743042306339&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script>
    $(document).ready(function() {
        $('.fb-share-button').attr("data-href", document.URL);
    });
</script>
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
				      	<li><a class="scrollTo" href="#home" >Trang Chủ</a></li>
					      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
					      		@if($index<3)
					      		<li><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}">{{$tab->title}}</a></li>
					      		@endif
					      	@endforeach
				      	<li class="li-menu dropdown">
						    <a data-toggle="dropdown" href="#">
						      Xem thêm <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu text-left" role="menu">
						   		@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
							    	@if($index>=3)
							    	<li><a class=" {{$tab->id}} scrollTo" href="#section_{{$tab->type}}" >{{$tab->title}}</a></li>
							    	@endif
							    @endforeach
						    </ul>
						</li>
						
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
		<div class="slider">

				<!-- Carousel -->
		    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
					  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for slides -->
					<?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
					<div class="carousel-inner">

						<?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
			            @if( $check > 0 )
			                @foreach($albums as $index => $album)
			                	@if($index==0)
			                    	<div class="item active">
								    	<img src="{{Asset("{$album->photo}")}}" alt="" />
								    </div>
			                    @else
			                    	<div class="item">
								    	<img src="{{Asset("{$album->photo}")}}" alt="" />
								    </div>
			                    @endif

			                @endforeach
			            @else

						    <div class="item active">
						    	<img  class="img-responsive" src=" {{Asset("images/slide-main/1-1.jpg")}}" alt="">
			                </div>
						    <div class="item">
						    	<img  class="img-responsive" src=" {{Asset("images/slide-main/2.jpg")}}" alt="">
						    </div>
						    <div class="item">
						    	<img  class="img-responsive" src=" {{Asset("images/slide-main/3.jpg")}}" alt="">
						  	</div>
						    <div class="item">
						    	<img  class="img-responsive" src=" {{Asset("images/slide-main/4.jpg")}}" alt="">
						    </div>
						@endif

					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				    	<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				    	<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div><!-- /carousel -->

		</div>
		<!-- end slider -->

		<div class="line-hr"></div>

		<div id="home" style="display:none;"></div>
		@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
			<!-- Welcome -->
			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.page.tab')
				</div>
			@endif
			<!-- About Us -->
			@if($tabWeb->type=="about" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.page.tab')
				</div>
			@endif

			<!-- cau chuyen tinh yeu -->
			@if($tabWeb->type=="love_story")
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.page.text')
				</div>
			@endif

			<!-- Wedding Event -->
			@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.page.tab')
				</div>
			@endif

			<!-- Travaling -->
			@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.page.tab')
				</div>
	        @endif
	        @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
				<div id="section_{{$tabWeb->type}}" class="item-des">
					@include('website_user.themes18.page.guestbook')
				</div>
	        @endif
	        <!-- Photo Album -->
	        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
		        <div id="section_{{$tabWeb->type}}" class="item-des">
		        	@include('website_user.themes18.page.photo')
		        </div>
	        @endif

	       	@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
		        <div id="section_{{$tabWeb->type}}" class="item-des">
		        	@include('website_user.themes18.page.contact')
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