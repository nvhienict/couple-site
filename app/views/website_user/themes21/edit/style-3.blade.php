
<div class="div-text-tab-text r-title{{$tabWeb->id}}" style="padding-bottom: 70px;">
    <div class="inline-title text-center div-text-tab-text-title">
        <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
    </div>

    <div class="div-text-tab-text-content show-content phara{{$tabWeb->id}}" onclick="showckeditor_text({{$tabWeb->id}})">
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
    </div>

    <div class="row phara-margin">
        <div class="col-xs-10"></div>
        <div class="col-xs-2 click-edit click-edit-hide{{$tabWeb->id}}" >
            <span> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div>
    
    <div class="col-md-12 edit-content editphara{{$tabWeb->id}}">
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


</div>
    


