
        <h6 class="item-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h6>

        <span id="prev_output{{$tabWeb->id}}">
            <a href="#">
                <?php $images = PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>
                
                @if($images)
                    <img class="item-des-img{{$tabWeb->id}}" style="width:100%; height:100%;" class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img class="item-des-img{{$tabWeb->id}}" src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
                @endif
            </a>
        </span>
        <span>
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
        </span>
        <div class="btn-view-more" id="btn-view-more{{$tabWeb->id}}">
            <a href="javascript:;" onclick="view_more({{$tabWeb->id}});">Xem thêm</a>
        </div>

        <div class="btn-back-view-more" id="btn-back-view-more{{$tabWeb->id}}">
            <a href="javascript:;" onclick="back_view_more({{$tabWeb->id}});">Quay lại</a>
        </div>

        <div class="item-detail" id="item-detail{{$tabWeb->id}}">
            <div class="item-text" onclick="showckeditor_text({{$tabWeb->id}})">
                <span class="phara{{$tabWeb->id}}" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
            
                <div class="col-xs-12 click-edit-hide{{$tabWeb->id}}" >
                    <span> <a onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
                </div>
            </div>
        </div>
        <!-- item-detail -->

        <div class="col-xs-3"></div>
        <div class="edit-content editphara{{$tabWeb->id}}">
            <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
               {{$tabWeb->content}}
            </textarea>

        </div>
        

    <div class="row phara-margin">
        <div class="col-xs-10"></div>
        <div class="col-xs-2 ok-edit ok-edit-show{{$tabWeb->id}}">
            <span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div>




