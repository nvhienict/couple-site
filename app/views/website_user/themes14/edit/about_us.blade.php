<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 phara-temp about-template">
    <div class="inline-title text-center">
        <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
    </div>     
    <div class="image-couple">        
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 content-broom text-center">        
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
               
                <button  onclick="send_id(0,222)"  data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #fff;color:black; border:none;">Đổi Ảnh</button>     
            </span>  
            <div class="show-content about_grooms text-center">
                <span class="about-groom">{{$website_item->about_groom}} </span>
                <div class="text-center icon-infor"><a onclick="editInforGroom()"data-toggle="modal" data-target="#edit-infor-groom" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
            </div>
        </div>  
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
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
                <button  onclick="send_id(0,111)"  data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #fff;color:black; border:none;">Đổi Ảnh</button>
            </span>           
            <div class="show-content about_bride text-center">
                <span class="about-bride">{{$website_item->about_bride}}</span>
                <div class="text-center icon-infor"><a onclick="editInforBride()" data-toggle="modal" data-target="#edit-infor-bride" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
        </div>              
    </div>      
       
</div>

