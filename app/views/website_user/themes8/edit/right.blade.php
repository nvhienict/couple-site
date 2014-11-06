<div class="partion">
    <div class="row phara-margin">        
        <div class="title-content" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </div>

        <div class="col-xs-6 float-right">
            <span id="prev_output{{$tabWeb->id}}" >
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

            <span>
                <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            </span>
        </div>
        <div onclick="showckeditor({{$tabWeb->id}})" class="show-content phara{{$tabWeb->id}}" >
        	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>			
        </div>
        <div class="edit-content editphara{{$tabWeb->id}}">
        	<textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

        </div>
    </div>
    <div class="row phara-margin">
    	<!-- <div class="col-xs-11"></div> -->
    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
    		<span><a onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
    	</div>
    </div>
    <div class="row phara-margin">	
    	
        <!-- <div class="col-xs-6"></div> -->
        <div class="col-xs-6 ok-edit ok-edit-show{{$tabWeb->id}}">
            <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
            <span style="float:right;">
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
        </div>
    </div>

</div>
