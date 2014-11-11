<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-template">
     <h2 class="text-center section-title section-title-wedding" >
        Đám cưới
    </h2>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 float-left"  style="margin-left: 10%; margin-top:2%;">        
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
            
    </div>
    <div class="show-content phara{{$tabWeb->id}}" style=" margin-right:10%;"  >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
    
    
</div>

