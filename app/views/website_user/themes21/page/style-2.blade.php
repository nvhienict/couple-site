
    <div class="tab-text">
        <div class="tab-text-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " >
            {{$tabWeb->title}}
        </div>

        <div class="tab-text-content" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
        </div>
        <div class="tab-text-date-time">
            <i class="fa fa-clock-o"></i>&nbsp
            @if(Session::has(email))
                {{WebsiteController::getDates()}}
            @else
                {{data_url}}
            @endif

            <img class="tab-text-date-time-img" src="{{Asset('images/website/themes21/p3_pic4.png')}}">
        </div>
    </div>

    <?php 
    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
     ?>
    @if($images)
        <img class="tab-text-img" src="{{Asset("{$images->photo}")}}" alt="">
    @else 
        <img class="tab-text-img" src="{{Asset('images/website/themes21/pic4.jpg')}}">
    @endif
 
