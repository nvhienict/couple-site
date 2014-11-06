 <div class="item">                  
    <div id="slide{{$i+2}}" class="masonry  margin-partion">
        <div class="post-box{{$i+2}} col-sx-12 col-lg-12 col-md-12 col-sm-12"> 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="title-tab TT{{$tabWeb->id}}" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                     {{$tabWeb->title}}
                </h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 show-content phara{{$tabWeb->id}}" onclick="showckeditor_text({{$tabWeb->id}})">
                 <span style="color: #{{$website_item->color3}}">
                    {{$tabWeb->content}}
                </span> 
            </div>           
        </div>

        <div class="edit-content editphara{{$tabWeb->id}}">
            <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
               {{$tabWeb->content}}
            </textarea>

        </div>                          
    </div>
    <div class="row phara-margin">
        <div class="col-xs-11"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
            <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
        </div>
    </div>
    
    <div class="row phara-margin">
        <div class="col-xs-11"></div>
        <div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
            <span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div>

    <div class="post-box{{$i+2}} col-sx-12 col-lg-12 col-md-12 col-sm-12 "> 
        <div class="row phara-margin">
            <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
            @if($albums)
                @foreach($albums as $album)
                    <div class="col-xs-2 images-padding remove_image{{$album->id}}">
                        <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
                            <img class="img-responsive" src="{{Asset("{$album->photo}")}}" alt="" />
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="row phara-margin">
            <div class="col-xs-11">
            </div>
            <div class="col-xs-1 click-edit ">
                <span><a  onclick="send_id_album({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);"></a></span>
                <span><a  class="glyphicon glyphicon-cog icon-site" href=""></a></span>
            </div>               
        </div>
        <div class="row phara-margin">
            <div class="col-xs-11"></div>
            <div class="col-xs-1 ok-edit ">
                <span><a  class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a></span>
                <span><a class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
            </div>
        </div> 
        
    </div>
</div>
