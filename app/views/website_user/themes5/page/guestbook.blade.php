<section id="section_guestbook" >
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}" class="TT{{$tabWeb->id}}">{{$tabWeb->title}}</h2>
				</div>
			</div>
		</div>
	</div>			
	<div class="travel-portion text-center sptr-position">
		<div class="container">			
			<div class="partion">
			    <div class="show-content phara{{$tabWeb->id}}">                            
			    	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
				</div>
				                
			</div>
		</div>
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
</section>