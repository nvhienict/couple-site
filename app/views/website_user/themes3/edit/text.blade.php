<div class="partion r-title{{$tabWeb->id}}" style="padding-top:0px;">
			          
    <div class="inline-title text-center">
        <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
    </div>
    <div class="show-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static">                            
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
	</div>   
	
    <div class="show-content">                            
       
    </div>
    <div class="row phara-margin">
        <div class="col-xs-7"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>               
    </div>
                          
</div>
