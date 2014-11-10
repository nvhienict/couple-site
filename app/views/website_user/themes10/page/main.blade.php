
    <!--  Slide Album -->    		
<script src="{{Asset("assets/js/jquery.min.js")}}"></script>           
<script type="text/javascript" src="{{Asset("assets/js/jquery.slides.js")}}"></script>


<div class="row ">
	<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 main-template text-center" >
			<?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
               
                @if($check>0)
                 <div id="slides">
                    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                    @foreach($albums as $album)
                       <a class="fancybox" rel="gallery1" href="{{Asset("{$album->photo}")}}" >
					      	<img class="img-responsive"  src="{{Asset("{$album->photo}")}}">
					    </a>	
                    @endforeach
              
                 </div>
                @else
                   <div id="slides">     
                    <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/1.jpg")}}" >
				      	<img class="img-responsive"  src="{{Asset("images/website/themes10/1.jpg")}}">
				    </a>
				     <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/2.jpg")}}" >
				      	<img class="img-responsive"  src="{{Asset("images/website/themes10/2.jpg")}}">
				    </a>
				    <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/3.jpg")}}" >
				      	<img class="img-responsive"  src="{{Asset("images/website/themes10/3.jpg")}}">
				    </a>	
                    <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/4.jpg")}}" >
				      	<img class="img-responsive"  src="{{Asset("images/website/themes10/4.jpg")}}">
				    </a>    
                  </div>      
                @endif
           		 
			  	
	</div>
	<script type="text/javascript">
		$("#slides").slidesjs({
    play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "slide",
        // [string] Can be either "slide" or "fade".
      interval: 4000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2000
        // [number] restart delay on inactive slideshow
    }
  });
			
	</script>
</div>
