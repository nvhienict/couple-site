<section id="section_wedding">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}">{{$tabWeb->title}}</h2>
				</div>
			</div>
		</div>
	</div>	
	<div class="fest-portion sptr-position">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-6">
					<div class="shape">
						<div class="overlay hexagon_mask" style="background: url({{Asset('/images/website/themes5/hexagonal-maskorg.png')}});"></div>
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
					</div>
				</div>
				
				<div class="col-md-6 s_txt">
					<div class="shape">
						<div class="overlay hexagon_mask" style="background: url({{Asset('/images/website/themes5/hexagonal-maskorg.png')}});"></div>
						
						<div class="slide-txt">
							<h2>Ceremony, 5pm</h2>
							<h3>Cum sociis natoque penatibus</h3>
							<p>{{$tabWeb->content}}</p>
						</div>									
					</div>															
				</div>
			</div>
		</div>	
	</div>
</section>