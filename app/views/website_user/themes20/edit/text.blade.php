<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-love_story">
    <img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image" style="margin-top:-2%;">     
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background-item r-title{{$tabWeb->id}}" >
        <div class="inline-title text-center">
            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                {{$tabWeb->title}}
            </h3>
            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
        </div>
        <div class="show-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>                                      
        </div> 
     
        <div class="row phara-margin float-right" >        
            <div class="click-edit click-edit-hide{{$tabWeb->id}}">
                <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
               
            </div>               
        </div>  
     </div>                     
</div>
