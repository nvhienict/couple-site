<section id="section_guestbook" >
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 style="color: #{{$website_item->color2}}" data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}" class="TT{{$tabWeb->id}}">{{$tabWeb->title}}</h2>
				</div>
			</div>
		</div>
	</div>			
	<div class="travel-portion text-center sptr-position">
		<div class="container">			
			<div class="partion">
			    <div class="show-content phara{{$tabWeb->id}}">                            
			    	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
				</div>
				                
			</div>
		</div>
	</div>	
</section>