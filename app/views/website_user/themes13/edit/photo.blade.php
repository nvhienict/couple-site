<article id="content">
	
	<div class="wrapper">
    	<div class="partion col-xs-10 col-md-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-offset-lg-1">               
            <div class="inline-title text-center">
                <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                    {{$tabWeb->title}}
                </h3>
                <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
            </div>  
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
        </div> 
	</div>
</article>