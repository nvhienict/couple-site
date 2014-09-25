<div class="partion">
	<div class="row phara-margin">
       	<h3 class="text-center title-tab" >{{$tabWeb->title}}</h3>
        <div class="col-xs-6 float-right">
            <span>
                <a href="#">
                    <?php 
                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes1/tab_temp_1.jpg")}}" alt="">

                @endif
                </a>
            </span>
        </div>
        <div class="show-content phara{{$tabWeb->id}}">
        	<p>
                {{$tabWeb->content}}
			 </p>
        </div>
    </div>

</div>