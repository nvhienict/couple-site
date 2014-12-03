
        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        

        <div class="frame_box frame_center" style="width:450px; height:192px; ">
            <span id="prev_output_themes3{{$tabWeb->id}}">
                <a href="#">
                    <?php $images = PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>
                    
                    @if($images)
                        <img style="width:100%; height:100%;" class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                    @else 
                        <img src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
                    @endif
                </a>
            </span>
            <span class="img_tl"></span>
            <span class="img_tr"></span>
            <span class="img_bl"></span>
            <span class="img_br"></span>
            <span>
                <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            </span>
        </div>
        <!-- end frame_box frame_big frame_center -->

        <div class="text_big show-content phara{{$tabWeb->id}}">
            
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
            
            <div class="col-xs-12 click-edit-hide{{$tabWeb->id}}" >
                <span><a href="javascript:;" onclick="showckeditor({{$tabWeb->id}})" class="btn btn-primary" style="background: #19b5bc; border:none;">Sửa nội dung</a></span>
            </div>
        </div>
        <!-- end text_big -->
        <div class="col-xs-3"></div>
        <div class="edit-content editphara{{$tabWeb->id}} col-xs-6">
            <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
               {{$tabWeb->content}}
            </textarea>

        </div>
        

    <div class="row phara-margin">
        <div class="col-xs-8"></div>
        <div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
            <span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div>




