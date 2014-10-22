<div class="slider-top text-center" style="background: url({{Asset("{$backgrounds}")}}) no-repeat center; padding-top: 60px;">		
		<div class="container ">
			<div class="row">
				<div class="col-md-12">
					<h2 id="showName" onclick="editName();" style="padding-top: 100px; color: #{{$website_item->color2}}"><span id="topNameGroom">{{$website_item->name_groom}}</span> &amp; <span id="topNameBride">{{$website_item->name_bride}}</span></h2>
					<div id="editName">
						<input name="name_groom" value="{{$website_item->name_groom}}">
						<input name="name_bride" value="{{$website_item->name_bride}}">
						<span>
							<a onclick="updateName();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
						</span>
						<span><a style="color:#e74c3c;" onclick="exitEditName();" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
					</div>
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
		  					
		  				<div id="dateTime" style="text-align:center; margin-bottom:100px; font-weight: bold; font-size: 50px; color: #{{$website_item->color1}};">
		  				
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
								<span id="prev_output111">
		  							<a href="#">
										<img class="img-responsive"  src="{{Asset("$website_item->avatar_bride")}}">
									</a>
								</span>
							</div>	
						</div>
						<div class="abt-content">
							<h2 id="titleNameBride" style="color: #{{$website_item->color2}}">{{$website_item->name_bride}}</h2>
							
							<div class="about_bride">
								<p id="about_bride1">{{$website_item->about_bride}}</p>
								<span class="icon_edit_about">
									<a onclick="edit_about_bride();" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a>
									<button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
								</span>
							</div>
							<div class="edit_ctn_about_bride">
								<textarea name="edit_about_bride" class="ckeditor form-control" cols="40" rows="10" tabindex="1">
								   {{$website_item->about_bride}}
								</textarea>

								<span>
									<a onclick="update_about_bride();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
								</span>
								<span><a style="color:#e74c3c;" onclick="exit_edit_about_bride();" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>

							</div>
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="dif-color box-01">
						<div class="box-right">
							<div class="shape_org">
								<div class="overlay " style=" background-image: url({{Asset('images/website/themes5/hexagonal-mask_320_green.png')}}); background-size:cover;"></div>
								
								<span id="prev_output222">
		  							<a href="#">
										<img class="img-responsive"  src="{{Asset("$website_item->avatar_groom")}}">
									</a>
								</span>
							</div>		
						</div>
						<div class="abt-content ">
							<h2 id="titleNameGroom"  style="color: #{{$website_item->color2}}">{{$website_item->name_groom}}</h2>
		  				<div class="about_groom ">
							<p id="about_groom1">{{$website_item->about_groom}}</p>
							<span class="icon_edit_about">
								<a onclick="edit_about_groom();" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a>
								<button  onclick="send_id(222)"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
							</span>
						</div>

						<div class="edit_ctn_about">
							<textarea name="edit_about_groom" class="ckeditor form-control" cols="40" rows="10" tabindex="1">
							   {{$website_item->about_groom}}
							</textarea>

							<span>
								<a onclick="update_about_groom();" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
							</span>
							<span><a style="color:#e74c3c;" onclick="exit_edit_about_groom();" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>

						</div>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>