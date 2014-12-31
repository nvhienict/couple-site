
<div class="div-text-tab-text r-title{{$tabWeb->id}}" style="padding-bottom: 70px;">
    <div class="inline-title text-center div-text-tab-text-title">
        <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
    </div>

    <div class="div-text-tab-text-content show-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static">
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
    </div>
</div>
    


