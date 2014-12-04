<div class="partion" style="padding-top:0px;">
			          
    <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}" id = "nameTitle{{$tabWeb->id}}">{{$tabWeb->title}}</h3> 
    <div class="show-content phara{{$tabWeb->id}}">                            
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
	</div>   
	<!-- <div class="edit-content editphara{{$tabWeb->id}}">
    	<textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>
    </div> -->
    <div class="show-content">                            
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
    <div class="row phara-margin">
        <div class="col-xs-7"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            <!-- <span><a href="javascript:;" onclick="showckeditor_text({{$tabWeb->id}})" class="btn btn-primary" style="background: #19b5bc; border:none;">Sửa nội dung</a></span> -->
        </div>               
    </div>
    <!-- <div class="row phara-margin">
    	<div class="col-xs-11"></div>
    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
    		<span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
    	</div>
    </div>   -->                       
</div>
