
    
        <div class="item-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </div>

        <span id="prev_output{{$tabWeb->id}}"> 
            <a href="#">
                <?php 
                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                 ?>
            @if($images)
                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
            @else 
                <img src="{{Asset('images/website/themes9/widget1.png')}}">
            @endif
            </a>
        </span>
        <span>
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
        </span>

        <div class="item-content phara{{$tabWeb->id}}" onclick="showckeditor_text({{$tabWeb->id}})" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
        </div>

        <div class="edit-content editphara{{$tabWeb->id}}">
            <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
               {{$tabWeb->content}}
            </textarea>

        </div>
    
    <div class="row phara-margin">
        <div class="col-xs-11"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
            <span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div>
    <div class="row phara-margin">
        <div class="col-xs-9"></div>
        <div class="col-xs-3 ok-edit ok-edit-show{{$tabWeb->id}}">
            <span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div>

