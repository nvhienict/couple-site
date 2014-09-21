<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">

    <title>Nguyen's wedding</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>

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
<div class="background-themes" style="background-image: url({{Asset("images/website/background/{$website_item->background}")}});">

	<div >
		<nav style="padding:0px;" class="navbar navbar-default" role="navigation">
		   <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" 
		         data-target="#example-navbar-collapse">
		         <span class="sr-only">Toggle navigation</span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		         <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Home</a>
		   </div>
		   <div style="background-color:#222222;" class="collapse navbar-collapse" id="example-navbar-collapse">
		      <ul style="background-color:#222222;" class="nav navbar-nav">
		         <li class=""><a href="#">Giới Thiệu</a></li>
		         <li><a href="#">Thông Tin</a></li>
		         <li><a href="#">Album</a></li>
		         <li><a href="#">Liên Hệ</a></li>
		      </ul>
		   </div>
		</nav>
	</div>
	<div class="after-image-themes">

		<!-- Themes Heading -->
		<div class="title-website">
            <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >{{WebsiteController::getDates()}}</h2>
            <h1 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};">
                {{$firstname}}'s wedding
            </h1>
            <h2 class="text-center" style="color: #{{$website_item->color2}}" >Chào bạn đến Website cưới của chúng tôi</h2>     
        </div>
		<hr>
	 @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)
	  <div  id="section-welcome{{$tabWeb->id}}">
		<!-- Welcome -->
		@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
			@include('website_user.themes.edit.left')
		<hr>
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		@include('website_user.themes.edit.right')
		<hr>
		
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		@include('website_user.themes.edit.right')
		<hr>
		
		@endif

		<!-- Travaling -->
		@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
		@include('website_user.themes.edit.text')
        <hr>
        
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
        @include('website_user.themes.edit.photo')
        <hr>
       
        @endif

       <!--  Register -->
       @if($tabWeb->type=="register" && $tabWeb->visiable==0)
       @include('website_user.themes.edit.text')       
        <hr>
        
        @endif

        <!-- Contact Us -->
        @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
        	@include('website_user.themes.edit.contact')
        @endif
    </div>
  	@endforeach  
          
	</div>
	<hr>
	<!-- and after-images-themes -->
	<footer>
		<div>
			<p class="text-center">Copyright by Thuna.vn</p>
		</div>
	</footer>
	
</div>
@endforeach
@endif
<!-- and image-themes -->

