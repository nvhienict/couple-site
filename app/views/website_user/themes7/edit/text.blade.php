<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-love_story">
    <h2 class="text-center section-title section-title-love_story" >
        Chuyện tình yêu
    </h2>
    <div  onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' class="show-content phara{{$tabWeb->id}}" >
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>                                      
    </div>   
    
    <div class="row phara-margin float-right" style="margin-right:15%">        
        <div class="click-edit click-edit-hide{{$tabWeb->id}}">
           
             <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>               
    </div>
              
</div>
