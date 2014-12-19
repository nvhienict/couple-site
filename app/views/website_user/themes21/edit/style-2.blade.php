
    <div class="tab-text" style="padding-bottom: 70px;">
        <div class="tab-text-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </div>

        <div class="tab-text-content show-content phara{{$tabWeb->id}}" onclick="showckeditor_text({{$tabWeb->id}})" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
        </div>
        <div class="tab-text-date-time">
            <i class="fa fa-clock-o"></i>&nbsp{{WebsiteController::getDates()}}

            <img class="tab-text-date-time-img" src="{{Asset('images/website/themes21/p3_pic4.png')}}">
        </div>
        <div class="edit-content editphara{{$tabWeb->id}}">
            <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
               {{$tabWeb->content}}
            </textarea>
        </div>
            
        <div class="ok-edit ok-edit-show{{$tabWeb->id}}" style="padding-top: 10px; padding-bottom:10px;">
            <span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
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
    <button onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #FE4447; border:none; position: absolute; right: 10%;">Đổi Ảnh</button>
    <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">    

    

