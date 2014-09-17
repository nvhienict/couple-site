<div class="partion">
	<div class="row">
       	<h3 class="text-center title-tab" >{{$tabWeb->title}}</h3>
        <div class="col-xs-6 float-right">
            <span>
                <a href="#">
                <img class="img-responsive" src="{{Asset("images/website/background/{$website_item->background}")}}" alt="">
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