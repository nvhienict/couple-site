<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp main-template text-center" >
			<!-- count datime to weddingdate -->
				
  					@foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
  						<div id="getD{{$index}}" style="display:none;">
  							{{$dd}}
  						</div>
  					@endforeach
  				
			<div id="count_dateTime" >
			
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
			<h3 class="section-title " id="showName" onclick="editName();">
				<span class="name-g" id="topNameGroom">{{$website_item->name_groom}}</span>
					<em>&</em>
				<span class="name-b" id="topNameBride">{{$website_item->name_bride}}</span>
			</h3>
			<div id="editName">
				<input name="name_groom" value="{{$website_item->name_groom}}">
				<input name="name_bride" value="{{$website_item->name_bride}}">
				<span>
					<a onclick="updateName();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
				</span>				
			</div>		
	<p class="subline">Chào mừng bạn đến với Website cưới của chúng tôi!</p>
	<div class=" background-themes7" >
		<img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image">
	</div>	
</div>
