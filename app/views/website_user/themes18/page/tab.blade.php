
        <h6 style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " >
            {{$tabWeb->title}}
        </h6>

        <?php $images = PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>
        
        @if($images)
            <img class="item-des-img{{$tabWeb->id}}" style="width:100%; height:100%;" class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
        @else 
            <img class="item-des-img{{$tabWeb->id}}" src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
        @endif

        <div class="btn-view-more" id="btn-view-more{{$tabWeb->id}}">
            <a href="javascript:;" onclick="view_more({{$tabWeb->id}});">Xem thêm</a>
        </div>

        <div class="btn-back-view-more" id="btn-back-view-more{{$tabWeb->id}}">
            <a href="javascript:;" onclick="back_view_more({{$tabWeb->id}});">Quay lại</a>
        </div>

        <div class="item-detail" id="item-detail{{$tabWeb->id}}">
            <div class="item-text">
                <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
            </div>
        </div>
        <!-- item-detail -->
