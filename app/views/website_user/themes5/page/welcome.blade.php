<div class="slider-top text-center" style="background: url({{Asset("{$backgrounds}")}}) no-repeat center; background-size:cover; padding-top:200px;">		
		<div class="container ">
			<div class="row">
				<div class="col-md-12">
					<h2 style="padding-top: 100px;">{{$website_item->name_groom}} &amp; {{$website_item->name_bride}}</h2>
					<!-- count datime to weddingdate -->
		  					@if(empty($website_item->count_down))
			  					@foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
			  						<div id="getD{{$index}}" style="display:none;">
			  							{{$dd}}
			  						</div>
			  					@endforeach
			  				@else
								@foreach( $date = explode('-', WebsiteController::getCountDown()) as $index=>$dd )
			  						<div id="getD{{$index}}" style="display:none;">
			  							{{$dd}}
			  						</div>
			  					@endforeach
			  				@endif
		  					
		  				<div style="text-align:center; margin-bottom:100px; font-weight: bold; font-size: 50px;color:#0B03FF;">
		  				
		  					<table align="center">
			  				<script type="text/javascript" src="{{Asset("assets/js/count-down-time.js")}}"></script>
			  				<!-- .end -->
		  						<tr >
		  							<td class="time_wedding" id="echo_dday"></td>
		  							<td class="time_wedding_">:</td>
		  							<td class="time_wedding" id="echo_dhour"></td>
		  							<td class="time_wedding_">:</td>
		  							<td class="time_wedding" id="echo_dmin"></td>
		  							<td class="time_wedding_">:</td>
		  							<td class="time_wedding" id="echo_dsec"></td>
		  						</tr>
		  						<tr >
		  							<td class="time_txt">Ngày</td>
		  							<td></td>
		  							<td class="time_txt">Giờ</td>
		  							<td></td>
		  							<td class="time_txt">Phút</td>
		  							<td></td>
		  							<td class="time_txt">Giây</td>
		  						</tr>
		  					</table>
		  				</div>
				</div>
				<div class="col-md-12">
					<div class="key-icon">
						<img src="{{Asset('images/website/themes5/key-icon.png')}}" alt="img">
					</div>
				</div>						
			</div>
		</div>		
	</div>
	<div class="intro">
		<div class="container">
			<div class="row move-up">
				<div class="col-md-6">
					<div class="box-01">
						<div class="box-left">
							<div class="shape_org">
								<div class="overlay " style=" background-image: url({{Asset('images/website/themes5/hexagonal-mask_320_org.png')}}); background-size:cover;"></div>
								<img class="img-responsive"  src="{{Asset("$website_item->avatar_bride")}}">
							</div>	
						</div>
						<div class="abt-content">
							<h2>{{$website_item->name_bride}}</h2>
							<p>{{$website_item->about_bride}}</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="dif-color box-01">
						<div class="box-right">
							<div class="shape_org">
								<div class="overlay " style=" background-image: url({{Asset('images/website/themes5/hexagonal-mask_320_green.png')}}); background-size:cover;"></div>
								<img class="img-responsive"  src="{{Asset("$website_item->avatar_groom")}}">
							</div>		
						</div>
						<div class="abt-content">
							<h2>{{$website_item->name_groom}}</h2>
							<p>{{$website_item->about_groom}}</p>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>