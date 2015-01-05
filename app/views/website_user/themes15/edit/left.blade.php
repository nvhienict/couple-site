<div class="r-title{{$tabWeb->id}}">
       <div class="inline-title text-center item-title">
            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                {{$tabWeb->title}}
            </h3>
            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
        </div>

        <div class="hr-line">
            <div class="sep-1"></div>
            <div class="sep-2"></div>
        </div>

        <div class="img">
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
            <span>
                <button   onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
            </span>
        </div>
        <!-- end frame_box frame_big frame_center -->

        <div class="text_big item-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static">
            
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
            
        </div>
        <!-- end text_big -->
        <div class="col-xs-3"></div>
         <div class="row phara-margin">
            <div class="col-xs-5 col-md-5 col-sm-5 col-lg-5"></div>
            <div class="col-xs-1  click-edit-hide{{$tabWeb->id}}" >
                <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>
        </div>
    </div>




