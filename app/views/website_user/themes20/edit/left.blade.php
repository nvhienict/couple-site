<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-template">
    <img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image" style="margin-top:-2%;">     
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background-item" >
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 float-left"  style="margin-left:5%;">        
            <span id="prev_output{{$tabWeb->id}}">     
                <a href="#"> 
                     <?php 
                        $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                         ?>
                    @if($images)
                         <a class="fancybox" rel="gallery1" href="{{Asset("{$images->photo}")}}" >
                            <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                        </a>
                    @else 
                        <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes20/tab_temp_20.jpg")}}" >
                            <img  class="img-responsive" src="{{Asset("images/website/themes20/tab_temp_20.jpg")}}" alt="">          
                        </a>
                    @endif            
                   
                </a>
            </span >     
             <span>
                <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-success" data-toggle="modal" data-target='#modal-changeimage' >Đổi Ảnh</button>
            </span>   
                
        </div>
        <div onclick="showckeditor({{$tabWeb->id}})" class="show-content phara{{$tabWeb->id}}" style="margin-right:5%;">
                <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
        </div>
        <div class="edit-content editphara{{$tabWeb->id}}" >
            <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="30" rows="10" tabindex="1">
                   {{$tabWeb->content}}
            </textarea>      
        </div>
        <div class="phara-margin float-right" >      
            <div class="click-edit click-edit-hide{{$tabWeb->id}}" >            
                <span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
                
            </div>
        </div>
        <div class="phara-margin float-right"  >    
            <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
                <span>
                    <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                    <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                </span>
                <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
            </div>
        </div>   

</div>    
   
       
</div>
