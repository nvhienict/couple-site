<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp about-template">
<img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image" style="margin-top:-2%;">     
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background-item" >     
    <div class="image-couple">        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-broom">        
            <span id="prev_output222">
                    @if(!empty($website_item->avatar_groom))
                    <a class="fancybox" rel="gallery1" href="{{Asset('$website_item->avatar_groom')}}" >
                        <img src="{{Asset("$website_item->avatar_groom")}}" class="img-responsive" alt="Image">                         
                    </a>                           
                    @else
                    <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes20/groom.jpg')}}" >
                        <img src="{{Asset("images/website/themes20/groom.jpg")}}" class="img-responsive" alt="Image">        
                     </a>   
                    @endif 
               
                <button onclick="send_id(null,222,0)"  data-backdrop="static" class="btn btn-success" data-toggle="modal" data-target='#modal-changeimage' >Đổi Ảnh</button>     
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
                    <a class="fancybox" rel="gallery1" href="{{Asset('images/website/themes20/bride.jpg')}}" >
                        <img src="{{Asset("images/website/themes20/bride.jpg")}}" class="img-responsive" alt="Image">        
                     </a>   
                    @endif             
                <button onclick="send_id(null,111,0)"  data-backdrop="static" class="btn btn-success" data-toggle="modal" data-target='#modal-changeimage' >Đổi Ảnh</button>
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

