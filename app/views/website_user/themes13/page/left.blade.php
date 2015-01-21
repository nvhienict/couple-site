<article id="content">
	
	<div class="wrapper">
		<div class="row phara-margin">
	        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'">
	        	{{$tabWeb->title}}
	        </h3>
	        <div class="col-xs-12 col-md-5 col-sm-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-offset-lg-1 float-left border-r">
	            <span> 
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
	            </span>
	        </div>
	        <div class=" col-xs-12 col-md-5 col-sm-5 col-lg-5 show-content phara{{$tabWeb->id}} ">
	            <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
	        </div>
	    </div>
	</div>
</article>