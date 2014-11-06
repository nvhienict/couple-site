<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-template text-center" >
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
				
			<div id="count_dateTime" >
			
				<table align="center" class="count_table_dateTime">
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
			<h2 class="section-title " id="showName" >
				<span id="topNameGroom">{{$website_item->name_groom}}</span>
					<em>&</em>
				<span id="topNameBride">{{$website_item->name_bride}}</span>
			</h2>
			
	<p class="subline">Chào mừng bạn đến với Website cưới của chúng tôi!</p>
	<div class=" background-themes7" >
		<img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image">
	</div>	
</div>
