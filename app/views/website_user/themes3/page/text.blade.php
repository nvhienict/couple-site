<div class="partion" style="padding-top:0px;">
			          
    <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}" id = "nameTitle{{$tabWeb->id}}">{{$tabWeb->title}}</h3> 
    <div class="show-content-page phara{{$tabWeb->id}}">                            
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
	</div>  

	<div class="show-content-page">                            
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
