<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">

    <title>Nguyen's wedding</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    
    <script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>

	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

	<script src="{{Asset("assets/js/map-themes.js")}}"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
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

   jQuery(document).ready(function($) {
    $('a[href^="#"]').bind('click.smoothscroll',function (e) {
        e.preventDefault();
        var target = this.hash,
        $target = $(target);

        $('html, body').stop().animate( {
            'scrollTop': $target.offset().top-40
        }, 900, 'swing', function () {
            window.location.hash = target;
        } );
    } );
} );



</script>
</head>
@if($website)
@foreach( $website as $website_item )
<div class="background-themes" style="background-image: url({{Asset("{$backgrounds}")}});">

	<div  class="navbar_edits">
		<nav style="padding:0px;" class="navbar navbar-default" role="navigation">
		   <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" 
		         data-target="#example-navbar-collapse">
		         <span class="sr-only">Toggle navigation</span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		      </button>
		   </div>
		   <div style="background-color:#6EC7B6;" class="collapse navbar-collapse" id="example-navbar-collapse">
		      <ul style="background-color:#6EC7B6;" class="nav navbar-nav">
		      	 <li><a href="#title_home">Trang Chủ</a></li>
		      	@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
		         <li><a class="{{$tab->id}}" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></li>
		         @endforeach()
		      </ul>
		   </div>
		</nav>
	</div>
		<!-- <nav id="menu_web" class="menu_web">
		    <ul>
		        <li><a href="">Home</a></li>
		        <li><a href="">About</a></li>
		        <li><a href="">Học PHP</a></li>
		        <li><a href="">SEO</a></li>
		        <li><a href="">jQuery</a></li>
		        <li><a href="">Wordpress</a></li>
		        <li><a href="">Blogger</a></li>
		    </ul>
		</nav>  -->
	
	<div class="after-image-themes">

		<!-- Themes Heading -->
		<div class="title-website"id="title_home">
            <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >{{WebsiteController::getDates()}}</h2>
            <h1 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};">
                {{$firstname}}'s wedding
            </h1>
            <h2 class="text-center" style="color: #{{$website_item->color2}}" >Chào bạn đến Website cưới của chúng tôi</h2>     
        </div>
		<hr>
		@include('website_user.themes.edit.circle')
	 @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)

	 	  
		<!-- Welcome -->
		@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
		<div id="section_{{$tabWeb->type}}">
			@include('website_user.themes.edit.left')
		</div>
		<hr>
		@endif

		<!-- cau chuyen tinh yeu -->
		@if($tabWeb->type=="love_story")
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.text')
		</div>
		<hr>
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.right')
		</div>
		<hr>
		
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.right')
		</div>
		<div class="row phara-margin" style="padding-top:30px;">
           <!-- -change map --> 
           	<div class="text-center map-hove " style='padding:20px 20px;'>         
                <p><input class="postcode" id="Postcode" name="Postcode" type="text"> <input type="submit" id="findbutton" value="Tìm địa điểm" /></p>        
                  <div id="geomap" >
                      <p>Loading Please Wait...</p>
                  </div>
                  <div id="cor"></div>
                  <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
                  <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">    
            </div>                              
            <!-- -end map -->  
   		 </div> 
		<hr>
		
		@endif

		<!-- Travaling -->
		@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.text')
		</div>
        <hr>
        
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
        @include('website_user.themes.edit.photo')
        </div>
        <hr>
       
        @endif

       <!--  Register -->
      
       @if($tabWeb->type=="register" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
       @include('website_user.themes.edit.text')     
       </div>  
        <hr>
        
        @endif

        <!-- Contact Us -->
        @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
        	@include('website_user.themes.edit.contact')
    	</div>
        @endif

       <!--  Guest book -->
       @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
        	@include('website_user.themes.edit.text')
    	</div>
        @endif 
  	@endforeach  
	<hr>
	
	
	
</div> <!-- and after-images-themes -->
@endforeach
@endif
<div style="height:70px;">
	<div class="col-xs-6 col-md-offset-3">
		
		<div class="text-center">
			<p>47 Đỗ Huy Uyển, Đà Nẵng<br>
			© Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
		</div>
		
	</div>
</div>
</div>
<!-- and image-themes -->

