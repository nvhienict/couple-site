<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 phara-temp wedding-template"> 
    <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">{{$tabWeb->title}}</h3>    
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 float-right"  style=" margin-top:2%;">        
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
                    <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/tab_temp_traval_10.jpg")}}" >
                        <img  class="img-responsive" src="{{Asset("images/website/themes10/tab_temp_traval_10.jpg")}}" alt="">          
                    </a>
                @endif            
               
            </a>
        </span >     
        <div class="btn-share">
            <div class="fb-share-button" data-layout="button"></div>
        </div>
    </div>
    <div class="show-content phara{{$tabWeb->id}}"  >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
       
</div>








