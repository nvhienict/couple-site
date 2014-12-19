<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp about-template text-center" >
			
			<h2 class="section-title section-title-about ">
				<span>Nói về chúng tôi</span>					
			</h2>
	<div class="image-couple">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-broom">
		<span id="prev_output222">
			<a href="#">
				@if(!empty($website_item->avatar_groom))
				<img src="{{Asset("$website_item->avatar_groom")}}" class="img-responsive" alt="Image">							
			@else
				<img src="{{Asset('images/website/themes7/groom.jpg')}}" class="img-responsive" alt="Image">		
			@endif
			</a>
			<button onclick="send_id(null,222,0)"  data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		</span>		
			
			<div class="about_grooms show-content ">
				<span class="about-g">{{$website_item->about_groom}}</span>
			</div>
		</div>	
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-bride">
			<span id="prev_output111">
			<a href="#">
				@if(!empty($website_item->avatar_bride))
				<img src="{{Asset("$website_item->avatar_bride")}}" class="img-responsive" alt="Image">							
			@else
				<img src="{{Asset('images/website/themes7/bride.jpg')}}" class="img-responsive" alt="Image">		
			@endif
		</a>
		<button onclick="send_id(null,111,0)"  data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		</span>		
			<div class="about_bride show-content ">
				<span class="about-b">{{$website_item->about_bride}}</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		</div>				
	</div>		
</div>