<div class="partion">
			          
    <h3 class="text-center title-tab">{{$tabWeb->title}}</h3> 
    <div class="show-content phara{{$tabWeb->id}}">                            
    <p>{{$tabWeb->content}}</p>
	</div>   
	<div class="edit-content editphara{{$tabWeb->id}}">
        	<textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

    </div>
    <div class="row ">
        <div class="col-xs-11"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
            <span><a onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></span>
            <span><a class="glyphicon glyphicon-cog" href="javascript:void(0);"></a></span>
        </div>               
    </div>
    <div class="row ">
    	<div class="col-xs-11"></div>
    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
    		<span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove" href="javascript:void(0);"></a></span>
    	</div>
    </div>                         
</div>
