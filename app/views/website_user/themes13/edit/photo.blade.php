<article id="content">
	
	<div class="wrapper">
    	<div class="partion col-xs-10 col-md-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-offset-lg-1">               
            <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}};font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                {{$tabWeb->title}}
            </h3>  
            <div class="show-content phara{{$tabWeb->id}} " onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>                            
                <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>     
            </div> 
             
            <div class="row phara-margin">
            <div class="col-xs-10"></div>
                <div class="col-xs-1 click-edit-hide{{$tabWeb->id}}">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>
            
        </div>
        <div class="partion">
            <div class="row phara-margin">
                <div class="col-xs-10 col-md-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-offset-lg-1">
                <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                @if($albums)
                    @foreach($albums as $album)
                        <div class="col-xs-6 col-md-3 col-sm-3 col-lg-3 images-padding remove_image{{$album->id}}">
                            <a class="fancybox" href="{{Asset("{$album->photo}")}}">
                                <img class="img-responsive" src="{{Asset("{$album->photo}")}}" alt="" />
                            </a>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
            <div class="row phara-margin">
                <div class="col-xs-9">
                </div>
                <div class="col-xs-1">
                     <span><a style="background: #19b5bc; border:none;" onclick="send_id_album({{$tab->id}})" class="btn btn-primary"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);">Tải ảnh lên</a></span>
                </div>               
            </div>
            
        </div> 
	</div>
</article>