<section id="section_about">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}"><span>{{$tabWeb->title}}</span></h2>
				</div>
			</div>
		</div>
	</div>			

	<div class="gift-portion text-center sptr-position">
		<div class="container">
			<div class="row">
				<div class="partion">
					<div class="phara-margin">
				        <div class="col-xs-6 float-right">
				            <span>
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
				        </div>
				        <div class="show-content phara{{$tabWeb->id}}">
				        	<p>
				                {{$tabWeb->content}}
							</p>
				        </div>
				        
				    </div>

				</div>
			</div>
						
		</div>
	</div>

</section>	