	<script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="{{Asset("assets/slide/lib/jquery.mousewheel-3.0.6.pack.js")}}"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="{{Asset("assets/slide/source/jquery.fancybox.js?v=2.1.3")}}"></script>
	<link rel="stylesheet" type="text/css"  href="{{Asset("assets/slide/source/jquery.fancybox.css?v=2.1.2")}}" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.css?v=1.0.5")}}" />
	<script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.js?v=1.0.5")}}"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-media.js?v=1.0.5")}}"></script>
<section id="section_album" class="tab-pane r-title{{$tabWeb->id}}">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<div class="inline-title text-center">
			            <h2 style="color: #{{$website_item->color2}}" data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}" class="TT{{$tabWeb->id}}" id = "nameTitle{{$tabWeb->id}}">{{$tabWeb->title}}</h2>
			            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
			        </div>
				</div>
			</div>
		</div>
	</div>

	<div class="photo-gallery text-center sptr-position">
		<div class="container partion">
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					
				</div>
				<div class="col-md-10  show-content phara{{$tabWeb->id}}"  onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static">                            
		        	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
		    	</div> 
			</div>
			<div class="row phara-margin">
		    	<div class="col-xs-6 col-md-10 col-sm-10 col-lg-10"></div>
		    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
		    		<span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
		    	</div>
		    </div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1 borderimg">
					<?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
			            @if($albums)
			                @foreach($albums as $album)
			                <a class="fancybox" href="{{Asset("{$album->photo}")}}">
								<img style="width:auto;height:100px;"  src="{{Asset("{$album->photo}")}}" alt="" />
							</a>
			                @endforeach
			            @endif
								
				</div>
			</div>
    </div>
		</div>
				
</section>