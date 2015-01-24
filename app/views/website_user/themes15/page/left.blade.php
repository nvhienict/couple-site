
        <div class="item-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} ">
            {{$tabWeb->title}}
        </div>

        <div class="hr-line">
            <div class="sep-1"></div>
            <div class="sep-2"></div>
        </div>

        <div class="img">
            <?php $images = PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>
            @if($images)
                <img class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
            @else 
                <img src="{{Asset('images/website/themes15/page2_pic1.jpg')}}">
            @endif
        </div>
        <!-- end frame_box frame_big frame_center -->

        <div class="item-content">
            <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
            <div class="">
                <div class="fb-share-button" data-layout="button"></div>
            </div> 
        </div>
        <!-- end text_big -->
        



