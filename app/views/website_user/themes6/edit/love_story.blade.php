
<div class="col-xs-8 partion ">
	<div class="row phara-margin">
       	<h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>

        <div class="show-content phara{{$tabWeb->id}}">
        	<p style="color: #{{$website_item->color3}}">
                {{$tabWeb->content}}
            </p>
        </div>
        <div class="col-md-12 edit-content editphara{{$tabWeb->id}}">
        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
               {{$tabWeb->content}}
            </textarea>

        </div>

    </div>
    <div class="row phara-margin float-right">    	
    	<div class=" click-edit click-edit-hide{{$tabWeb->id}}" >
    		<span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
            <span><a class="glyphicon glyphicon-cog icon-site" href="javascript:void(0)"></a></span>
    	</div>
    </div>
    <div class="row phara-margin float-right">    	
    	<div class="ok-edit ok-edit-show{{$tabWeb->id}}">
    		<span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
    	</div>
    </div>
</div>