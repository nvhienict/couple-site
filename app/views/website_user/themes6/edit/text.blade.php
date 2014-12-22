<div class="col-xs-8 partion">
                      
    <h3 class="text-center title-tab" style="text-align: {{$tab->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tab->id}}">{{$tab->title}}</h3> 
    <div class="show-content phara{{$tab->id}}">                            
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tab->content}}</span>
    </div>   
    
    <div class="row phara-margin float-right">      
        <div class="click-edit click-edit-hide{{$tab->id}}" >            
            
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tab->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>
    </div>
    
    <br>                
</div>
