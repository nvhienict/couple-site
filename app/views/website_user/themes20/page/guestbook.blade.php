<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-love_story">
	<img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image" style="margin-top:-2%;">     
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background-item" >
        <div class="show-content phara{{$tabWeb->id}}" >
       		 <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>                                      
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
