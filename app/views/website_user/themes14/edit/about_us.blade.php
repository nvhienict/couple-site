<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 phara-temp about-template">     
    <div class="image-couple">        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-broom">        
            <span id="prev_output222">
                    @if(!empty($website_item->avatar_groom))
                    <a class="fancybox" rel="gallery1" href="{{Asset('$website_item->avatar_groom')}}" >
                        <img src="{{Asset("$website_item->avatar_groom")}}" class="img-responsive" alt="Image">                         
                    </a>                           
                    @else
                    <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes14/groom.jpg')}}" >
                        <img src="{{Asset("images/website/themes14/groom.jpg")}}" class="img-responsive" alt="Image">        
                     </a>   
                    @endif 
               
                <button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #fff;color:black; border:none;">Đổi Ảnh</button>     
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
                    <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes14/bride.jpg')}}" >
                        <img src="{{Asset("images/website/themes14/bride.jpg")}}" class="img-responsive" alt="Image">        
                     </a>   
                    @endif             
                <button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #fff;color:black; border:none;">Đổi Ảnh</button>
            </span>           
            <div class="show-content about_bride text-center">
                <span class="about-b">{{$website_item->about_bride}}</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
        </div>              
    </div>      
       
</div>

