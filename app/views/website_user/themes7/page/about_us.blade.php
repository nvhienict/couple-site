<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp about-template text-center" >
			
			<h2 class="section-title section-title-about ">
				<span>Nói về chúng tôi</span>					
			</h2>
	<div class="image-couple">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 content-broom">		
			@if(!empty($website_item->avatar_groom))
				<img src="{{Asset('$website_item->avatar_groom')}}" class="img-responsive" alt="Image">							
			@else
				<img src="{{Asset('images/website/themes7/groom.jpg')}}" class="img-responsive" alt="Image">		
			@endif		
			<div class="about_grooms text-center">
				<p class="about-g">{{$website_item->about_groom}} </p>
			</div>
		</div>	
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			@if(!empty($website_item->avatar_bride))
				<img src="{{Asset('$website_item->avatar_bride')}}" class="img-responsive" alt="Image">							
			@else
				<img src="{{Asset('images/website/themes7/bride.jpg')}}" class="img-responsive" alt="Image">		
			@endif				
			<div class="about_bride text-center">
				<p class="about-b">{{$website_item->about_bride}}</p>
			</div>
		</div>
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
		</div>				
	</div>		
</div>