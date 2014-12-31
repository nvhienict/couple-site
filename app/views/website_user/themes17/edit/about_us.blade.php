<div class="r-title{{$tabWeb->id}}">
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 phara-temp about-template">
        <div class="inline-title text-center">
                <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                    {{$tabWeb->title}}
                </h3>
                <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
            </div>     
        <div class="image-couple">        
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-broom">        
                <span id="prev_output222">
                        @if(!empty($website_item->avatar_groom))
                        <a class="fancybox" rel="gallery1" href="{{Asset('$website_item->avatar_groom')}}" >
                            <img src="{{Asset("$website_item->avatar_groom")}}" class="img-responsive" alt="Image">                         
                        </a>                           
                        @else
                        <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes17/groom.jpg')}}" >
                            <img src="{{Asset("images/website/themes17/groom.jpg")}}" class="img-responsive" alt="Image">        
                         </a>   
                        @endif 
                   
                    
                </span>  
                <div class="show-content about_grooms text-center">
                    <span class="about-g">{{$website_item->about_groom}} </span>
                </div>
            </div>  
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <span id="prev_output111">              
                        @if(!empty($website_item->avatar_bride))
                        <a class="fancybox" rel="gallery1" href="{{Asset("$website_item->avatar_bride")}}" >
                            <img src="{{Asset("$website_item->avatar_bride")}}" class="img-responsive" alt="Image">                         
                        </a>    
                        @else
                        <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes17/bride.jpg')}}" >
                            <img src="{{Asset("images/website/themes17/bride.jpg")}}" class="img-responsive" alt="Image">        
                         </a>   
                        @endif             
                    
                </span>           
                <div class="show-content about_bride text-center">
                    <span class="about-b">{{$website_item->about_bride}}</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
            </div>              
        </div>      
           
    </div>
</div>

