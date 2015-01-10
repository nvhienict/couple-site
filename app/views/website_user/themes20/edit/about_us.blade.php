<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp about-template">
<img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image" style="margin-top:-2%;">     
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 background-item r-title{{$tabWeb->id}}" >     
    <div class="image-couple">        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-broom text-center">        
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
               
               
            </span>
            <button onclick="send_id(0,222)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>  
            <div class="show-content about-groom text-center">
                <span class="about-g">{{$website_item->about_groom}} </span>
            </div>
            <div class="text-center icon-infor"><a onclick="editInforGroom()"data-toggle="modal" data-target="#edit-infor-groom" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
        </div>  
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
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
               
            </span>
            <button onclick="send_id(0,111)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>           
            <div class="show-content about-bride text-center">
                <span class="about-b">{{$website_item->about_bride}}</span>
            </div>
            <div class="text-center icon-infor"><a onclick="editInforBride()" data-toggle="modal" data-target="#edit-infor-bride" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
        </div>              
    </div>      
  </div>        
</div>

