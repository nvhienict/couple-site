<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-love_story">
    <img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image" style="margin-top:-2%;">     
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background-item" >
            <div onclick="showckeditor_text({{$tabWeb->id}})" class="show-content phara{{$tabWeb->id}}" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>                                      
        </div> 
      <div class="edit-content editphara{{$tabWeb->id}}">
            <textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>
            <div class="row phara-margin float-right"  >        
                <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
                    <span>
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span>
                    <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                </div>
            </div>               
        </div>
        <div class="row phara-margin float-right" >        
            <div class="click-edit click-edit-hide{{$tabWeb->id}}">
                <span><a onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>           
            </div>               
        </div>  
     </div>                     
</div>