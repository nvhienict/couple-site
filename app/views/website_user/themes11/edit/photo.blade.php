 <div class="item r-title{{$tabWeb->id}}">                  
    <div id="slide{{$i+2}}" class="masonry  margin-partion container">
        <div class="post-box{{$i+2}} col-sx-12 col-lg-12 col-md-12 col-sm-12"> 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="inline-title text-center">
                    <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                        {{$tabWeb->title}}
                    </h3>
                    <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 show-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                 <span style="color: #{{$website_item->color3}}">
                    {{$tabWeb->content}}
                </span> 
            </div>           
        </div>

                               
    </div>
    <div class="container phara-margin">
        <div class="col-xs-10"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>
    </div>
    
    <div class="post-box{{$i+2}} container"> 
        <div class=" phara-margin ">
            <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
            @if($albums)
                @foreach($albums as $album)
                    <div class="col-xs-2 images-padding remove_image{{$album->id}}">
                        <a class="fancybox"  href="{{Asset("{$album->photo}")}}">
                            <img class="img-responsive" src="{{Asset("{$album->photo}")}}" alt="" />
                        </a>
                    </div>
                @endforeach
            @endif
        </div>     
    </div>
    
</div>
