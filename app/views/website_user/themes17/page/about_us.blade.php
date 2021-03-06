<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
<div class="col-xs-98 col-sm-8 col-md-8 col-lg-8 phara-temp about-template">
    <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
        {{$tabWeb->title}}
    </h3>     
    <div class="image-couple">        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-broom">        
            @if(!empty($website_item->avatar_groom))
            <a class="fancybox" rel="gallery1" href="{{Asset("$website_item->avatar_groom")}}" >
                <img src="{{Asset("$website_item->avatar_groom")}}" class="img-responsive" alt="Image">                         
            </a>                           
            @else
            <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes17/groom.jpg')}}" >
                <img src="{{Asset('images/website/themes17/groom.jpg')}}" class="img-responsive" alt="Image">        
             </a>   
            @endif  
            <div class="show-content about_grooms text-center">
                <span class="about-g">{{$website_item->about_groom}} </span>
            </div>
        </div>  
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            @if(!empty($website_item->avatar_bride))
            <a class="fancybox" rel="gallery1" href="{{Asset("$website_item->avatar_bride")}}" >
                <img src="{{Asset("$website_item->avatar_bride")}}" class="img-responsive" alt="Image">                         
            </a>    
            @else
            <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes17/bride.jpg')}}" >
                <img src="{{Asset('images/website/themes17/bride.jpg')}}" class="img-responsive" alt="Image">        
             </a>   
            @endif      
            <div class="show-content about_bride text-center">
                <span class="about-b">{{$website_item->about_bride}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
        </div>              
    </div>      
       
</div>

