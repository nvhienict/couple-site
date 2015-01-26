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
                        <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes17/tab_temp_17.jpg")}}" >
                            <img  class="img-responsive" src="{{Asset("images/website/themes17/tab_temp_17.jpg")}}" alt="">          
                        </a>
                    @endif            
                   
                </a>
            </span >     
             <div class="btn-share">
                <div class="fb-share-button" data-layout="button"></div>
            </div>   
        </div>
        <div class="show-content phara{{$tabWeb->id}}" style="margin-right:5%;">
                <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
        </div>
     </div>   
</div>

