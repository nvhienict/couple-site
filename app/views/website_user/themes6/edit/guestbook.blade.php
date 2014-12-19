
<div class="partion">
	<div class="row phara-margin">
       	<h3 class="text-center title-tab" style="text-align: {{$tab->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tab->id}}">
            {{$tab->title}}
        </h3>

			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-8">
					<table class="table-guest-website">
					 	<thead>
						 	<tr>
						 		<th style="width:15%;text-align: left;">Nhóm / Khách</th>
						 		<th style="width:13%;">
						 			Xác nhận tham dự cho tôi
						 		</th>
						 	</tr>
					 	</thead>
					 	<tbody>
					 @if((Groups::where('user',GuestController::id_user())->get()))
					 	@foreach(Groups::where('user',GuestController::id_user())->get() as $key=>$group)
					 		<tr class="guest_cat{{$group->id}} guest_cat" id="cate{{$group->id}}">					 						 			
					 			<td style="width:15%;text-align: left;">
					 				<a href="javascript:void(0);" style="color:#555555;"onclick="show_hide({{$group->id}})" >
						 				<i id="show-hide-group{{$group->id}}" class=" fa fa-minus-square-o"></i>
						 				<strong class="name_group_edit{{$group->id}}"> {{$group->name}}</strong>
						 				(<span class="total_group_guest{{$group->id}}">
						 					{{Guests::where('user',GuestController::id_user())->where('group',$group->id)->sum('attending')}}
						 				</span>)
					 				</a>
					 			</td>
					 			<td style="width:13%;text-align: left;"></td>
							</tr>

					 		<tbody class="guest_list_show_cat{{$group->id}} guest_list_show_cat">
					 			@if((Guests::where('user',GuestController::id_user())->where('group',$group->id)->get()))
					 			@foreach(Guests::where('user',GuestController::id_user())->where('group',$group->id)->get() as $guest)
			 					<tr class=" guest_list{{$guest->id}} guest_list_item_cat" id="guest_list_item_cat{{$guest->id}}">
			 											 			
						 			<td style="width:18%;text-align: left;">
						 				<a>{{$guest->fullname}}</a>
									</td>
						 			<td style="width:10%;">
						 				@if ( $guest->confirm==1 )
							 				<div class="slideThree">	
												<input type="checkbox" checked="checked" value="{{$guest->id}}" id="slideThreeChk{{$guest->id}}" name="checkAttending" />
												<label for="slideThree" class="labelChk{{$guest->id}}"></label>
											</div>
										@else
											<div class="slideThree" id="slideThree">
												<input type="checkbox" value="{{$guest->id}}" id="slideThreeChk{{$guest->id}}" name="checkAttending" />
												<label for="slideThree" class="labelChk{{$guest->id}}"></label>
											</div>
										@endif

									</td>

									<!-- Small modal -->
									<button type="button" style="display:none;" class="btn btn-primary btn-check-{{$guest->id}}" data-toggle="modal" data-target=".bs-example-modal-sm-check{{$guest->id}}" data-backdrop="static">Small modal</button>
									
									<div class="modal fade bs-example-modal-sm-check{{$guest->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									  	<div class="modal-dialog modal-sm">
									    	<div class="modal-content">
									    		<div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											        <h4 class="modal-title text-left" id="myModalLabel">{{$guest->fullname}}</h4>
											    </div>
											    <div class="modal-body">
											    	<div class="form-group">
											    		<input type="text" class="form-control" name="checkAttendingCode{{$guest->id}}" placeholder="Nhập mã xác nhận ở đây" />	
											    	</div>
											    	<div class="form-group">
												    	<select class="form-control" name="num-person-attend{{$guest->id}}">
												    		<option value="1">-- Số người tham dự --</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
														</select>
													</div>

											    	<span style="color: #3897DB; display: block;" class="msg-alert"></span>
													<input type="hidden" name="idGuest{{$guest->id}}" value="{{$guest->id}}" />
											    </div>
											    <div class="modal-footer text-center">
											        <button type="button" id="checkAttending{{$guest->id}}" class="btn btn-primary">Xác nhận</button>
											        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
											    </div>
									    	</div>
									  	</div>
									</div>

									<script type="text/javascript">
										$('.slideThree label.labelChk{{$guest->id}}').click(function(){
											$('.slideThree input[type="checkbox"]#slideThreeChk{{$guest->id}}').trigger('click');
											
											$('.btn-check-{{$guest->id}}').click();
										});

										$('#checkAttending{{$guest->id}}').click(function(){
											var checkAttendingCode = $('input[name="checkAttendingCode{{$guest->id}}"]').val();
											var numPerson 		   = $('select[name="num-person-attend{{$guest->id}}"]').val();
											var idGuest   		   = $('input[name="idGuest{{$guest->id}}"]').val();

											$.ajax({
												type: "POST",
												url: "{{URL::route('checkAttending')}}",
												data: {
													checkAttendingCode:checkAttendingCode,
													idGuest:idGuest,
													numPerson:numPerson
												},
												success:function(data){
													var obj = JSON.parse(data);
													$('.msg-alert').html(obj.msg);
													$('.td-check-attending{{$guest->id}}').replaceWith(obj.replace);
													if ( (obj.tiny)===0 ) {
														$('input[type=checkbox]').attr('checked', false);
													} else {
														return true;
													};
												}
											});
										});
											
									</script>

						 		</tr>
						 		                                											  						     
						 		@endforeach
						 	@endif
						 	</tbody>
						@endforeach
						@endif
					 	</tbody>

					 	<thead>
						 	<tr>
						 		<th style="width:15%;">Tổng số khách tham dự:</th>
						 		<th style="width:13%;">
						 			{{Guests::where('user',GuestController::id_user())->where('attending',true)->count()}}
						 			&nbsp/&nbsp
						 			{{Guests::where('user',GuestController::id_user())->count()}}
						 		</th>
						 	</tr>
					 	</thead>
					 	
					</table>
				</div>
				<div class="col-xs-1"></div>
		</div>
	</div> <!-- row -->
</div><!--container-->

<script type="text/javascript">
	function show_hide(id)
	{
		if($('.guest_list_show_cat'+id).is(':visible') )
		{
			$('.guest_list_show_cat'+id).hide();
			$('#show-hide-group'+id).removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
		}
		else
		{
			$('.guest_list_show_cat'+id).show();
			$('#show-hide-group'+id).removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
		}
	}

</script>
