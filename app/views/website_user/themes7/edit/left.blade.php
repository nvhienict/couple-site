<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-template">
     <h2 class="text-center section-title section-title-wedding" >
        Đám cưới
    </h2>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 float-left"  style="margin-left: 7%; margin-top:2%;">        
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
        </span >     
        <span>
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
        </span>      
    </div>
    <div onclick="showckeditor({{$tabWeb->id}})" class="show-content phara{{$tabWeb->id}}" style=" margin-right:12%;"  >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
     <div class="edit-content editphara{{$tabWeb->id}}" >
        <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="30" rows="10" tabindex="1">
               {{$tabWeb->content}}
        </textarea>      
    </div>
    <div class="phara-margin float-right" style="margin-right:15%">      
        <div class="click-edit click-edit-hide{{$tabWeb->id}}" >            
            <span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
            
        </div>
    </div>
    <div class="phara-margin float-right"  style="margin-right: 12%;">    
        <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
            <span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div> 
    
</div>

