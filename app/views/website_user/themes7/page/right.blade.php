<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-traval">
     <h2 class="text-center section-title section-title-traval" >
        Du lịch
    </h2>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 float-right">        
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
              
              
    </div>
     <div class="show-content phara{{$tabWeb->id}}" >
        <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
          
</div>
