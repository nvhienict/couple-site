
    <div class="tab-text r-title{{$tabWeb->id}}" style="padding-bottom: 70px;">
        <div class="inline-title text-center tab-text-title">
            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                {{$tabWeb->title}}
            </h3>
            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
        </div>

        <div class="tab-text-content show-content phara{{$tabWeb->id}}"onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
        </div>
        <div class="tab-text-date-time">
            <i class="fa fa-clock-o"></i>&nbsp{{WebsiteController::getDates()}}

            <img class="tab-text-date-time-img" src="{{Asset('images/website/themes21/p3_pic4.png')}}">
        </div>
    </div>
    <span id="prev_output_themes21{{$tabWeb->id}}"> 
        <a href="#">
            <?php 
            $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
             ?>
        @if($images)
            <img class="tab-text-img" src="{{Asset("{$images->photo}")}}" alt="">
        @else 
            <img class="tab-text-img" src="{{Asset('images/website/themes21/pic4.jpg')}}">
        @endif
        </a>

    </span>
    <button onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #FE4447; border:none; position: absolute; right: 10%;">Đổi Ảnh</button>
    <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">    

    

