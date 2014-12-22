<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-traval">
     <h2 class="text-center section-title section-title-traval" >
        Du lịch
    </h2>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 float-right" style="margin-right: 12%; margin-top: 2%;">        
        <span id="prev_output{{$tabWeb->id}}">     
            <a href="#"> 
             <?php 
                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                 ?>
            @if($images)
                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
            @else 
                <img  class="img-responsive" src="{{Asset("images/website/themes7/tab_temp_7.jpg")}}" alt="">          
            @endif            

            </a>
        </span>   
        <span>
        <button  onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
        <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
        </span>      
              
    </div>
     <div  onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' class="show-content phara{{$tabWeb->id}}">
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
     
    <div class="phara-margin float-right" >      
        <div class="click-edit click-edit-hide{{$tabWeb->id}}" >            
           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
           
        </div>
    </div>
    
    
</div>
