<article id="content">
	<!-- <div class="wrapper">
		<div class="pad-left">
			<h2>About <span>Our Wedding</span></h2>
			<figure class="img1"><img src="{{Asset('images/website/themes13/page1_img1.jpg')}}" alt=""></figure>
			
		</div>
	</div> -->
	<div class="wrapper">
    	<div class="partion col-xs-10 col-md-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-offset-lg-1">               
            <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}};font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                {{$tabWeb->title}}
            </h3>  
            <div class="show-content phara{{$tabWeb->id}} " onclick="showckeditor_text({{$tabWeb->id}})">                            
                <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>     
            </div> 
            <div class="edit-content editphara{{$tabWeb->id}}">
                <textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

            </div> 
            <div class="row phara-margin">
            <div class="col-xs-11"></div>
                <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
                    <span><a onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
                  
                </div>               
            </div>
            <div class="row phara-margin">
                <div class="col-xs-10"></div>
                <div class="col-xs-2 ok-edit ok-edit-show{{$tabWeb->id}}">
                    
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                            <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                            <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
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
                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
                                <img class="img-responsive" src="{{Asset("{$album->photo}")}}" alt="" />
                            </a>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
            <div class="row phara-margin">
                <div class="col-xs-11">
                </div>
                <div class="col-xs-1 click-edit ">
                    <span><a  onclick="send_id_album({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);"></a></span>
    
                </div>               
            </div>
            <div class="row phara-margin">
                <div class="col-xs-11"></div>
                <div class="col-xs-1 ok-edit ">
                    
                    <span style="float:right;"><a class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;"><a  class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a></span>
                </div>
            </div> 
        </div> 
	</div>
</article>