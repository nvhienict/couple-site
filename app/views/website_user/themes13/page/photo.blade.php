<article id="content">
	<div class="wrapper">
    	<div class="partion col-xs-10 col-md-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-offset-lg-1">               
            <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">{{$tabWeb->title}}</h3>  
            <div class="show-content phara{{$tabWeb->id}}">                            
                <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>     
            </div> 
        </div>
        <div class="partion">
            <div class="row phara-margin">
                <div class="col-xs-10 col-md-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-offset-lg-1" style="margin-top: 20px;">
                <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                @if($albums)
                    @foreach($albums as $album)
                        <div class="col-xs-12 col-md-3 col-sm-3 col-lg-3 images-padding">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
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