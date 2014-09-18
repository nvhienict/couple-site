<div class="partion">
	<div class="row">
       	<h3 class="text-center title-tab" >{{$tabWeb->title}}</h3>
        <div class="col-xs-6 float-right">
            <span>
                <a href="#">
                    <?php
                        $gh=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                    ?>
                <img class="img-responsive" src="{{Asset("images/website/background/{$gh->photo}")}}" alt="">
                </a>
            </span>
            <span>
                <button class="btn btn-primary" >Đổi Ảnh</button>
            </span>
        </div>
        <div class="show-content phara{{$tabWeb->id}}">
        	
                {{$tabWeb->content}}
			
        </div>
        <div class="edit-content editphara{{$tabWeb->id}}">
        	<textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

        </div>
    </div>
    <div class="row ">
    	<div class="col-xs-11"></div>
    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
    		<span><a onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
    	</div>
    </div>
    <div class="row ">
    	<div class="col-xs-11"></div>
    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
    		<span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
    	</div>
    </div>

</div>