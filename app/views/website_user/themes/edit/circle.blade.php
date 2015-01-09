<div class="partion">
	<div class="row">
		<div id="prev_outputcc222" class="div_circle1 col-xs-12 col-sm-3 col-lg-3 col-md-3 col-lg-offset-2 col-sm-offset-2 col-md-offset-2 text-center" >
			<a href="#">
				@if(($website_item->avatar_groom))
				<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_groom")}}">
				@else
				<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/boy.jpg')}}">
				@endif
			</a>
			<button onclick="send_id(0,222)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>		
		</div>
	  	<div id="prev_outputcc111" class="div_circle2 col-xs-12 col-sm-3 col-lg-3 col-md-3 col-lg-offset-2 col-sm-offset-2 col-md-offset-2 text-center" >
	  		<a href="#">
		  		@if(($website_item->avatar_bride))
				<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_bride")}}">
				@else
				<img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/girl.jpg')}}">
				@endif
			</a>
			<button onclick="send_id(0,111)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>
	  	</div>
	</div>
</div>