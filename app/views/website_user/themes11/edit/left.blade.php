<div class="item" >                   
    <div id="slide{{$i+2}}" class="masonry margin-partion container" style="min-height:450px;" >
        <div id="prev_output{{$tabWeb->id}}" class="post-box{{$i+2}} col-sx-12 col-lg-6 col-md-6 col-sm-6 bg-images "> 
            <a href="#">
                <?php 
                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                @endif
            </a>
            <button   onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
        </div>
        <div class="post-box{{$i+2}} col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 class="title-tab TT{{$tabWeb->id}}" style="text-align: {{$tabWeb->titlestyle}} ;font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                     {{$tabWeb->title}}
                </h3>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 show-content phara{{$tabWeb->id}}"  onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                 <span style="color: #{{$website_item->color3}}" >
                    {{$tabWeb->content}}
                </span> 
            </div>           
        </div>

                               
    </div>
    <div class="row phara-margin">
        <div class="col-xs-10"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
            
           <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>
    </div>
    
    
</div>
