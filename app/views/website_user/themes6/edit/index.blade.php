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
    
	<style type="text/css">
      .fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style]
       {width: 100% !important;}
      .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
      {width: 100% !important;}
    </style>

	<!-- Core JavaScript Files -->
	<script src="{{Asset("assets/js/jquery.min.js")}}"></script>
	<script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>	
	<!-- style css -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes6-edit.css")}}">
	

	<script type="text/javascript">
		// function showckeditor(id){
		//         var text=$('.phara'+id).html();
		//         $('.phara'+id).hide();
		//         CKEDITOR.instances['editor'+id].setData(text);

		//         $('.editphara'+id).addClass("col-xs-6");
		//         $('.editphara'+id).show();
		//         $('.click-edit-hide'+id).hide();
		//         $('.ok-edit-show'+id).show();
		//     }
		// function showckeditor_text(id){
		//         var text=$('.phara'+id).html();
		//         $('.phara'+id).hide();
		//         CKEDITOR.instances['editor'+id].setData(text);

		//         $('.editphara'+id).addClass("col-xs-12");
		//         $('.editphara'+id).show();
		//         $('.click-edit-hide'+id).hide();
		//         $('.ok-edit-show'+id).show();
		//     }
		// function updateckeditor(id){
		// 	//var t= CKEDITOR.instances['editor4'].getData();alert(t);
		// 	$.ajax({
		// 		type:"post",
		// 		dataType: "html",
		// 		url:"{{URL::route('update_content_tab')}}",
		// 		data: {	content:CKEDITOR.instances['editor'+id].getData(),
		// 				id_tab:$('.get_id'+id).val()
		// 			},
		// 		success:function(data){
		// 			var obj = JSON.parse(data);
		// 			$('.phara'+id).html(obj.content);	
		// 		}
		// 	});
		// 		$('.editphara'+id).hide();
		// 		$('.phara'+id).show();
		// 		$('.click-edit-hide'+id).show();
		//         $('.ok-edit-show'+id).hide();
		// }  
		// function exitckeditor(id){
		// 		$('.editphara'+id).hide();
		// 		$('.phara'+id).show();
		// 		$('.click-edit-hide'+id).show();
		//         $('.ok-edit-show'+id).hide();
		// } 

	</script>

   
	
</head>
@if($website)
@foreach( $website as $website_item )
<div class="background-themes "style="background-image: url({{Asset("{$backgrounds}")}});">
			
		<br>		
			<div class="navbar-collapse collapse menu_tab" style="position:fixed; background-color:white;  width: 100%; z-index:1;margin-top: -20px;">
		    	

		        		<ul id="myTab" class="nav navbar-nav">
		        			<span class="active"><a style="padding: 10px; color: #777; line-height: 50px; text-decoration: none;" href="#home" role="tab" data-toggle="tab">Trang chủ</a></span>
		        			@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
		        			<span><a style="padding: 10px;  color: #777;line-height: 50px; text-decoration: none;" class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}" role="tab" data-toggle="tab">{{$tab->title}}</a></span>
						  	@endforeach
		          			
		        		</ul>

		     
			</div>
		<div class="after-image-themes">
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
			  					@include('website_user.themes6.edit.text')

			  					<div class="col-xs-8 partion">
				  					 <!-- -facebookcommnet --> 
							          <div id="fb-root"></div>
							          <script>(function(d, s, id) {
							              var js, fjs = d.getElementsByTagName(s)[0];
							              if (d.getElementById(id)) return;
							              js = d.createElement(s); js.id = id;
							              js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1450451991884119&version=v2.0";
							              fjs.parentNode.insertBefore(js, fjs);
							            }(document, 'script', 'facebook-jssdk'));
							          </script>
							          <div class="fb-comments" data-href=""  data-numposts="5" data-width="100%"data-order-by="social" data-mobile="auto-detect" data-colorscheme="light"></div>                        

							          <script>
							              $(document).ready(function() {
							                  $('.fb-comments').attr("data-href", document.URL);
							              });
							          </script>
							        <!-- -End facebookcommnet -->
				  				</div>	
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

