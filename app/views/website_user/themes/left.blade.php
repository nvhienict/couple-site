<div class="partion">
	<div class="row">
       	<h3 class="text-center title-tab" >{{$tabWeb->title}}</h3>
        <div class="col-xs-6 float-left">
            <span>
                <a href="#">
                <img class="img-responsive" src="http://placehold.it/700x300" alt="">
                </a>
            </span>
            <span>
                <button class="btn btn-primary" >Đổi Ảnh</button>
            </span>
        </div>
        <div class="show-content">
        	<p>
                    {{$tabWeb->content}}
			 </p>
        </div>
        <div class="edit-content">
        	<textarea name="editor4" class="ckeditor form-control" id="editor4" cols="40" rows="10" tabindex="1"></textarea>

        </div>
    </div>
    <div class="row ">
    	<div class="col-xs-11"></div>
    	<div class="col-xs-1 click-edit">
    		<span><a class="glyphicon glyphicon-edit" href=""></a></span>
            <span><a class="glyphicon glyphicon-cog" href=""></a></span>
    	</div>
    </div>
    <div class="row ">
    	<div class="col-xs-11"></div>
    	<div class="col-xs-1 ok-edit">
    		<span><a class="glyphicon glyphicon-ok" href=""></a></span>
            <span><a class=" glyphicon glyphicon-remove" href=""></a></span>
    	</div>
    </div>

</div>