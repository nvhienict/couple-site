
        <div class="item-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}" >
            {{$tabWeb->title}}
        </div>

        <div class="item-content phara{{$tabWeb->id}}"  onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
            <span name="phara" style="color: #{{$website_item->color3}}">
                {{$tabWeb->content}}
            </span>        
        </div>

        
    

        <div class="col-xs-10"></div>
        <div class="col-xs-1  click-edit-hide{{$tabWeb->id}}" >
            
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>

        
