<div class="r-title{{$tabWeb->id}}">
        <div class="inline-title text-center">
            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                {{$tabWeb->title}}
            </h3>
            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
        </div>
        

        <div class="frame_box frame_center" style="width:450px; height:192px; ">
            <span id="prev_output{{$tabWeb->id}}">
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
                <button  onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            </span>
        </div>
        <!-- end frame_box frame_big frame_center -->

        <div class="text_big show-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static">
            
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
            
        </div>
        <div class="col-xs-12 click-edit-hide{{$tabWeb->id}}" >
               
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>
    </div>
        




