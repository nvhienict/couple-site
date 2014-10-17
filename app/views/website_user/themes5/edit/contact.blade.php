<section id="section_contact" class="tab-pane">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 style="color: #{{$website_item->color2}}" data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}" class="TT{{$tabWeb->id}}">{{$tabWeb->title}}</h2>
				</div>
			</div>
		</div>
	</div>			

	<div class="rsvp-portion sptr-position">
		<div class="container contact">	
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form>
						<section>
							<p>Name</p>
							<input type="text" class="form-control fc-xtra" id="inputName" placeholder=""/>
						</section>
						
						<section>
							<p>Name of guest(s) optional</p>
							<input type="text" class="form-control fc-xtra" id="inputGuest" placeholder=""/>
						</section>
						
						<section>
							<p>Number of guests attending</p>
							<input type="text" class="form-control fc-xtra" id="inputNumber" placeholder=""/>
						</section>
						
						<section>
						  <button class="bttn" type="submit">SUBMIT</button>
						</section>								
					</form>							
				</div>
			</div>
		</div>	
	</div>
	
</section>