<div class="item" >                   
    <div id="slide{{$i+2}}" class="masonry margin-partion" style="min-height:450px;" >
        <div id="prev_output{{$tabWeb->id}}" class="post-box{{$i+2}} col-sx-12 col-lg-6 col-md-6 col-sm-6 bg-images "> 
            <a href="#">
                <?php 
                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                @endif
            </a>
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
        </div>
        <div class="post-box{{$i+2}} col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="title-tab TT{{$tabWeb->id}}" style="text-align: {{$tabWeb->titlestyle}} ;font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                     {{$tabWeb->title}}
                </h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 show-content phara{{$tabWeb->id}}" onclick="showckeditor({{$tabWeb->id}})">
                 <span style="color: #{{$website_item->color3}}" >
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
            <span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
           
        </div>
    </div>
    
    <div class="row phara-margin">
        <div class="col-xs-10"></div>
        <div class="col-xs-2 ok-edit ok-edit-show{{$tabWeb->id}}">
            
            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
            <span style="float:right;" >
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
        </div>
    </div>
</div>
