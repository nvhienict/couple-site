<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 phara-temp wedding-love_story">
    <div  class="show-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>                                      
    </div> 
    
     <div class="phara-margin float-right" >      
        <div class="click-edit click-edit-hide{{$tabWeb->id}}" >            
           
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>
    </div>               
</div>
