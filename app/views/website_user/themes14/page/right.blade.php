<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 phara-temp wedding-template">     
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 float-right"  style="margin-right:5%">        
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
                    <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes14/tab_temp_14.jpg")}}" >
                        <img  class="img-responsive" src="{{Asset("images/website/themes14/tab_temp_14.jpg")}}" alt="">          
                    </a>
                @endif            
               
            </a>
        </span >     
       <div class="btn-share">
            <div class="fb-share-button" data-layout="button"></div>
        </div>       
    </div>
    <div class="show-content phara{{$tabWeb->id}}" style=" margin-left:5%;" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
       
</div>








