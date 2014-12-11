@extends('main')
@section('title')
Danh sách khách mời
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-10">
			<div class="row sort-by">
			<div class="col-xs-12">
				<h2>Danh sách khách mời</h2>
			</div>
		</div>
		<div class="submenu">
			<div class="row">
				<div class="col-xs-2">
					<a href="" id="add-group-webding" style="cursor:pointer;" data-toggle="modal" data-target="#myGroup" data-backdrop="static" >
						<i class="glyphicon glyphicon-plus"></i>
						&nbsp Thêm Nhóm
					</a>
					<!-- Modal Add checklist -->
						<div class="modal fade" id="myGroup" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
						  	<div class="modal-dialog">
							    <div class="modal-content">
							      	<div class="modal-header">
							        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        	<h4 style="color:#3276B1;" class="modal-title text-center">Thêm nhóm mới</h4>
							      	</div>
							      
							        <form id="form_add_group" action="{{Asset('guest-list/add_group')}}" method="post">
										<div class="modal-body">
											<label for="name" class="control-label">Tên nhóm:</label>
											<input type="text" class="form-control" name="name" id="name" placeholder="Tên nhóm mới">
											
									   	</div>
									   	<div class="modal-footer" style="text-align:center;">								  		
									    	<button type="submit" class="btn btn-primary" id="submit_add"> Thêm </button>
									    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>								  										  		
										</div> 
										<!-- end modal body -->
									</form>	
								</div> 
								<!-- end modal content -->
							</div> <!-- end modal dialog -->
						</div> <!-- end modal fade -->
						<!-- end modal Add -->
						<script type="text/javascript" src="{{Asset('assets/js/script_thuy.js')}}"></script>
				</div>
				<div class="col-xs-2">
					<a href="" onclick="showHideAddGuest()" id="add-guest-wedding" style="cursor:pointer;" data-toggle="modal" data-target="" >
						<i class="glyphicon glyphicon-plus"></i>
						&nbsp Thêm Khách 
					</a>
					<button id="btn_add_guest" style="display:none;" data-toggle="modal" data-target="#myModalAddGuest" data-backdrop="static" >Thêm Khách</button>
					<script type="text/javascript">

						function showHideAddGuest()
						{
							$.ajax({
								type: "POST",
								url: "{{URL::route('check_group')}}",
								success: function(data){
									var obj = JSON.parse(data);
									if(obj.counts==0)
									{	
										swal("Chưa có nhóm!");
									}
									else
									{
										$("#btn_add_guest").click();
									}
									
								}
							});
						}
					</script>
					<div class="modal " id="myModalAddGuest" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h4 style="color:#3276B1;" class="modal-title text-center">Thêm Khách Mời</h4>
						      </div>
						      <div class="modal-body">
						        <form id="form_add_guest" action="{{URL::route('guest-list/add-guest')}}" method="post">
								    <div class="row form-group">
										<label for="name" class="col-xs-3 control-label">Họ và tên:</label>
										<div class="col-xs-9">
										   	<input type="text" class="form-control" name="fullname" id="fullname" placeholder="">
										</div>
									</div>
									<div class="row form-group">
										<label for="phone" class="col-xs-3 control-label">Số điện thoại:</label>
										<div class="col-xs-9">
										   	<input onkeyup="phone_validate(event)" type="text" class="form-control" name="phone" id="phone" placeholder="">
										</div>
									</div>
									<div class="row form-group">
										<label for="address" class="col-xs-3 control-label">Địa chỉ:</label>
										<div class="col-xs-9">
										   	<input type="text" class="form-control" name="address" id="address" placeholder="">
										</div>
									</div>
									<div class="row form-group">
										<label for="email" class="col-xs-3 control-label">Email:</label>
										<div class="col-xs-9">
										   	<input type="text" class="form-control" name="email" id="email" placeholder="">
										</div>
									</div>
									<div class="row form-group">
										<label for="group" class="col-xs-3 control-label">Nhóm:</label>
										<div class="col-xs-9">
										   	<select name="group" class="form-control">
						                    	@foreach(Groups::where('user',GuestController::id_user())->get() as $group)
						                        <option value="{{$group->id}}">{{$group->name}}</option>
						                        @endforeach
						                    </select>
										</div>
									</div>
									<div class="row form-group">
										<label for="attending" class="col-xs-3 control-label">Số người tham dự:</label>
										<div class="col-xs-9">
										   	<input type="number" class="form-control" name="attending" id="attending" value="1" min="0"placeholder="">
										</div>
									</div>
								  	
								
							   </div> <!-- end modal body -->
							   <div class="modal-footer" style="text-align:center;">
							  		
								    	<button type="submit" class="btn btn-primary" id=""> Thêm </button>
								    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
							  		
							  	</div>
							  </form>
							</div> <!-- end modal content -->
							</div> <!-- end modal dialog -->
							</div> <!-- end modal fade -->
							<!-- end modal Add -->
							<script type="text/javascript" src="{{Asset('assets/js/script-binh.js')}}"></script>
				</div>

				<div class="col-xs-2">
					<a href="{{URL::route('guest-list/exportfile')}}" ><i class="fa fa-print"></i>&nbspXuất file</a>
				</div>
			</div>
		</div>
				<div class="col-xs-12" align="right">
					<span style="color: #19b5bc; cursor:pointer; margin-right: 5px;" id="guest_all_item_sign_down"><i class="glyphicon glyphicon-chevron-down"></i></span>
					<span style="color: #19b5bc; cursor:pointer; " id="guest_all_item_sign_up"><i class="glyphicon glyphicon-chevron-up"></i></span>
					<!-- display or hide all items -->
					
				</div>
			</div>
			<div class="row">
				<div class="col-xs-10">
					<table class="table-guest">
						<tr class="table-guest-thead-fixed">
							<th style="width:180px;">Nhóm</th>
					 		<th style="width:180px;">Mã khách mời</th>
					 		<th style="width:200px;">Số điện thoại</th>
					 		<th style="width:200px;">Email</th>
					 		<th style="width:200px;">Tham dự</th>
					 		<th style="width:60px;"></th>
					 		<th></th>

					 	</tr>
					 	<script type="text/javascript">
						 	$(window).scroll(function(){
								if ($(this).scrollTop() > 240) {
							        $('.table-guest-thead-fixed').show();
							    } else {
							        $('.table-guest-thead-fixed').hide();
							    }
							});
						</script>
					 	<thead>
					 	<tr>
					 		<th style="width:18%;text-align: left;">Nhóm</th>
					 		<th style="width:14%;text-align: left;">Mã khách mời</th>
					 		<th style="width:18%;">Số điện thoại</th>
					 		<th style="width:18%;">Email</th>
					 		<th style="width:10%;">Tham dự</th>
					 		<th style="width:10%;"></th>
					 		<th style="width:10%;"></th>
					 	</tr>
					 	</thead>
					 	<tbody>
					 @if((Groups::where('user',GuestController::id_user())->get()))
					 	@foreach(Groups::where('user',GuestController::id_user())->get() as $key=>$group)
					 		<tr class="guest_cat{{$group->id}} guest_cat" id="cate{{$group->id}}">					 						 			
					 			<td style="width:18%;text-align: left;"><a href="javascript:void(0);" style="color:#555555;"onclick="show_hide({{$group->id}})" ><i id="show-hide-group{{$group->id}}" class=" fa fa-minus-square-o"></i><strong class="name_group_edit{{$group->id}}"> {{$group->name}}</strong>(<span class="total_group_guest{{$group->id}}">{{Guests::where('user',GuestController::id_user())->where('group',$group->id)->sum('attending')}}</span>)</a></td>
					 			<td style="width:14%;text-align: left;"></td>
					 			<td style="width:18%;"></td>
					 			<td style="width:18%;"></td>
					 			<td style="width:10%;"></td>
					 			<td style="width:10%;"></td>
					 			<td style="width:10%;">
					 				<span class="up_item_cat" style="color: #19b5bc; cursor:pointer; " id="up{{$group->id}}"><i class="glyphicon glyphicon-chevron-up"></i></span>
					 				<span class="down_item_cat" style="color: #19b5bc; cursor:pointer; display:none"; id="down{{$group->id}}" ><i class="glyphicon glyphicon-chevron-down"></i></span>
					 				<!-- display or hide a item -->
									<script type="text/javascript">
										$('#guest_all_item_sign_down').click(function(){
										$('.guest_list_show_cat').show();
										$('#show-hide-group{{$group->id}}').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
										$('.down_item_cat').hide();
										$('.up_item_cat').show();
										
									});
									$('#guest_all_item_sign_up').click(function(){
										$('.guest_list_show_cat').hide();
										$('#show-hide-group{{$group->id}}').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
										$('.down_item_cat').show();
										$('.up_item_cat').hide();
									});
										$('#up{{$group->id}}').click(function(){
											$('.guest_list_show_cat{{$group->id}}').hide();
											$('#show-hide-group{{$group->id}}').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
											$('#up{{$group->id}}').hide();
											$('#down{{$group->id}}').show();
										});

										$('#down{{$group->id}}').click(function(){
											$('.guest_list_show_cat{{$group->id}}').show();
											$('#show-hide-group{{$group->id}}').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
											$('#up{{$group->id}}').show();
											$('#down{{$group->id}}').hide();
										});

										function show_hide(id)
										{
											if($('.guest_list_show_cat'+id).is(':visible') )
											{
												$('.guest_list_show_cat'+id).hide();
												$('#show-hide-group'+id).removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
												$('#up'+id).hide();
												$('#down'+id).show();
												
											}
											else
											{
												$('.guest_list_show_cat'+id).show();
												$('#show-hide-group'+id).removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
												$('#up'+id).show();
												$('#down'+id).hide();
											}
										}

									</script>
									

					 				<a href="#" id="edit-group-webding{{$group->id}}" onclick="sent_id_group_edit({{$group->id}})" class="icon-delete-group"data-toggle="modal" data-target="#editGroup-guest" data-backdrop="static">
										<span class="fa fa-edit "></span>
									</a>
									
					 				<a href="#" onclick="sent_id_group({{$group->id}})" id="delete-group-webding{{$group->id}} " class="icon-delete-group" data-toggle="modal" data-target="#deleteGroup-guest" data-backdrop="static" style="margin-right: 10px;" >
										<span class="fa fa-trash-o "></span>
									</a>
									
					 			</td>
					 		</tr>
					 		<tbody class="guest_list_show_cat{{$group->id}} guest_list_show_cat">
					 			@if((Guests::where('user',GuestController::id_user())->where('group',$group->id)->get()))
					 			@foreach(Guests::where('user',GuestController::id_user())->where('group',$group->id)->get() as $guest)
			 					<tr class=" guest_list{{$guest->id}} guest_list_item_cat" id="guest_list_item_cat{{$guest->id}}">
			 											 			
						 			<td style="width:18%;text-align: left;">
						 				<div>
										 	<a onclick="name_click({{$guest->id}})" class="{{$guest->id}}show_name">
										 		{{$guest->fullname}}
										 	</a>
										    <input onblur="name_change({{$guest->id}})" ondblclick="name_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}name form-control input-edit-guest" name="fullname" value="{{$guest->fullname}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
										</div>
										<p style="display:none;color:red;" class="name_error{{$guest->id}}">Nhập tên khách mời</p>
									</td>
									<td style="width:18%; text-align: left;">
										<div> 
											<a class="span-id-guest" title="Tìm hiểu thêm" data-toggle="modal" data-target="#alert-id-guest" data-backdrop="static">
												{{$guest->address}}
											</a>
										</div>
									</td>
							 		<td style="width:14%;">
						 				<div >
										 <a onclick="phone_click({{$guest->id}})" class="{{$guest->id}}show_phone">{{$guest->phone}}</a> 										 	
										    <input onkeyup="key_phone(event,{{$guest->id}})" onblur="phone_change({{$guest->id}})" ondblclick="phone_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}phone form-control input-edit-guest" name="phone" value="{{$guest->phone}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
										 </div>
										 <p style="display:none;color:red;" class="phone_error{{$guest->id}}">phone không đúng</p>
										 
							 		</td>
						 			<td style="width:18%;">
						 				<div  > 
											<a onclick="email_click({{$guest->id}})" class="{{$guest->id}}show_email">{{$guest->email}}</a> 										 	
										    <input onblur="email_change({{$guest->id}})" type="text" class="{{$guest->id}}email form-control input-edit-guest" name="email" value="{{$guest->email}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
										</div>
										<p style="display:none;color:red;" class="email_format{{$guest->id}}">email không đúng</p>
					 				</td><!-- pay -->
						 			<td style="width:10%;">
						 				<div>
							 				<a onclick="attend_click({{$guest->id}})" class="{{$guest->id}}show_attend">{{$guest->attending}}</a> 										 	
										    <input onblur="attend_change({{$guest->id}})" ondblclick="attend_dblclick({{$guest->id}})" onchange="sum_attending({{$guest->id}})" type="text" class="{{$guest->id}}attend form-control input-edit-guest" name="attending" value="{{$guest->attending}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">	
						 				</div>
						 				
						 			</td><!-- Due -->
						 			<td style="width:10%;">
						 				@if($guest->invited==false)
						 				<input onclick="invited1_click({{$guest->id}})" type="submit" name="invited1" id="invited1{{$guest->id}}" class="invited1 form-control " value="Chưa mời" required="required" title="">
						 				<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
						 				<input onclick="invited2_click({{$guest->id}})" type="submit" style="display:none" name="invited2" id="invited2{{$guest->id}}" class="form-control invited2" value="Đã mời" required="required" title="">
						 				<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
						 				
						 				@else
						 				<input onclick="invited1_click({{$guest->id}})" type="submit" style="display:none" name="invited1" id="invited1{{$guest->id}}" class="form-control invited1" value="Chưa mời" required="required" title="">
						 				<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
						 				<input onclick="invited2_click({{$guest->id}})" type="submit" name="invited2" id="invited2{{$guest->id}}" class=" invited2 form-control" value="Đã mời" required="required" title="">
						 				<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
						 				@endif
						 			</td>
						 			
						 			<td style="width:10%;">
						 				<a onclick="get_guest({{$guest->id}})" href="javascript:void(0)" data-toggle="modal" data-target="#modalDeleteGuest" class="guest_list_icon_trash guest_del{{$guest->id}}">
						 					<i class="glyphicon glyphicon-trash"></i>
						 				</a>
						 				<input type="hidden"  name="{{$guest->id}}" value="{{$guest->id}}" >

						 			</td>								
						 		</tr>
						 		                                											  						     
						 		@endforeach
						 	@endif	
						 		<tr class="guest_list_item_cat{{$group->id}}" id="guest_list_item_cat{{$group->id}}">
						 			
						 			<td style="text-align: left;" colspan="7"><a onclick="add_guest({{$group->id}})" href="javascript:void(0)" class="guest_list_add{{$group->id}}" style="cursor:pointer;">
											<i class="glyphicon glyphicon-plus"></i>&nbsp Thêm Khách
										</a>
										<input type="hidden" value="{{$group->id}}" name="{{$group->id}}">
									</td>
						 		</tr>
						 	</tbody>
						@endforeach
						@endif
					 	</tbody>
					 	
					</table>
				</div>
			
		 <!-- col-xs-10 -->
		<div class="col-xs-2" id="guest_summary">
			<h3>Tóm tắt:</h3>
			<p>
				<div>Tổng số khách:<span class="total_guest">{{Guests::where('user',GuestController::id_user())->sum('attending')}}</span></div>
				
				<div>Đã mời:<span class="total_invited">{{Guests::where('user',GuestController::id_user())->where('invited',true)->sum('attending')}}</span></div>
				
				<div>Chưa mời:<span class="total_noinvited">{{Guests::where('user',GuestController::id_user())->where('invited',false)->sum('attending')}}</span></div>
				
		</div>
		<!-- Modal edit group guest -->
		<div class="modal fade" id="editGroup-guest" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 style="color:#3276B1;" class="modal-title text-center">Sửa nhóm </h4>
		      </div>
		      <div class="modal-body">		       				  
					<label for="name" >Tên nhóm: </label>						
					<input type="text" class="form-control name_group_edit" onchange="change_input_group()"name="name_group_edit" id="name_group_edit" placeholder="Tên nhóm" value="" required>
					<p style="color:red;text-align:center;" class="message_edit_group"></p>
					<input type="hidden"  class="id_group_edit" name="id_group_edit" value="">					
				  					  		
				</div>
				<div class="modal-footer" style="text-align:center;">				  		
				   <button data-dismiss="modal" onclick="update_group()" class="btn btn-primary" id="submit_edit"> Lưu </button>
				    <a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
				 </div>
			
			   </div> <!-- end modal body -->
			</div> <!-- end modal content -->
			</div> <!-- end modal dialog -->
		</div> <!-- end modal fade -->
		<!-- end modal edit -->

		<!-- Modal delete group guest -->
		<div class="modal fade" id="alert-id-guest" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    	<div class="modal-header">
		        	<button style="color:red" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        	<h4 style="color:#3276B1;" class="modal-title">Thông báo</h4>
		      	</div>		      
		      	<div class="modal-body">										        
				    <div class="row form-group algin-delete">
						<h6 class="text-center">Bạn cung cấp mã số này cho khách mời để trả lời tham dự đám cưới trên Website của bạn</h6>
					</div>
				  	<div class="modal-footer" style="text-align:center;">
				  		<button data-dismiss="modal" class="btn btn-primary">Đóng</button>
				  	</div>
				</div>
			</div> <!-- end modal body -->
		  </div> <!-- end modal content -->
		</div> <!-- end modal dialog -->
		</div> <!-- end modal fade -->
		<!-- end modal delete -->

			<script type="text/javascript">
				function sent_id_group_edit(id)
				{
					$('.id_group_edit').val(id);
					$('.message_edit_group').text("");
					$.ajax({
							type:"POST",
							url:"{{URL::route('sent-name-edit')}}",
							data:
							{
								id_group:(id)
							},
							success:function(data)
							{
								var obj=JSON.parse(data);
								$('.name_group_edit').val(obj.name_group);
							}
						});
				}
				function change_input_group()
				{	
					if($('.name_group_edit').val()=="")
					{
						$('.message_edit_group').text("Vui lòng nhập tên Nhóm!");
					}
					else
					{
						
						$('.message_edit_group').text("");					
						$.ajax({
							type:"POST",
							url:"{{URL::route('checkName')}}",							
							data:
							{
								name_group:$('.name_group_edit').val(),								
							},
							success:function(data)
							{
								var obj=JSON.parse(data);								
								if(obj.check===true)
								{
									$('.name_group_edit').val("");							
									$('.message_edit_group').text("Tên Nhóm đã tồn tại!");
									
								}
								else
								{
									$('.message_edit_group').text("");
								}
								
								
							}
						});
					}
				}
				function update_group()
				{
					$.ajax({
						type:"POST",
						url:"{{URL::route('edit_group')}}",
						data:{
							name_group:$('.name_group_edit').val(),id_group:$('.id_group_edit').val()
						},
						success:function(data)
						{
							var obj =JSON.parse(data);
							$('.name_group_edit'+obj.id_group).text(obj.name_group_new);
							
						}
					});
				}

			
		</script>
		<!-- Modal delete group guest -->
		<div class="modal fade" id="deleteGroup-guest" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		    	<div class="modal-header">
		        <button style="color:red" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 style="color:#3276B1;" class="modal-title text-center">Xoá nhóm khách mời</h4>
		      </div>		      
		      <div class="modal-body">										        
				    <div class="row form-group algin-delete">
						 <h5 class="message_modal_delete_group"style="color: red;"></h5>
						<p style="text-align:center;">*Tất cả các khách mời trong nhóm sẽ mất</p>
						<div class="col-xs-9">
						   	<input type="hidden"  name="id_group" id="id_group_modal" value="" >
						</div>
					</div>
				  	<div class="modal-footer" style="text-align:center;">
				  		
					    	<button data-dismiss="modal" onclick="delete_group()" class="btn btn-primary" id="submit_delete"> Có </button>
					    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Không</a>
				  	</div>
				  		
				  	</div>												
			   </div> <!-- end modal body -->
			</div> <!-- end modal content -->
			</div> <!-- end modal dialog -->
			</div> <!-- end modal fade -->
			<!-- end modal delete -->
					 				
				<script type="text/javascript">


				// delete group 
					function sent_id_group(id)
					{	
						$("#id_group_modal").val(id);
						$.ajax({
							type:"POST",
							url:"{{URL::route('sent-name-group')}}",
							data:
							{
								id_group:(id)
							},
							success:function(data)
							{
								var obj=JSON.parse(data);
								$('.message_modal_delete_group').text("Bạn có muốn xóa nhóm "+obj.name_group+" ?");
							}
						});
					}
					function delete_group()
					{
						$.ajax({
							type:"POST",
							url:"{{URL::route('delete_group')}}",
							data:
							{
								id_group:$("#id_group_modal").val()
							},
							success:function(data)
							{
								var obj=JSON.parse(data);
								$('.guest_cat'+obj.id_group).remove();
								$('.guest_list_add'+obj.id_group).remove();
								$('.guest_list_show_cat'+obj.id_group).remove();
								
							}	
						});
					}
				// end delete group	
				</script>
				
			<!-- Modal xoa thanh vien -->
		<div class="modal fade" id="modalDeleteGuest">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button style="color:red" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 style="color:#3276B1;" class="modal-title text-center">Xóa khách mời</h4>
		      </div>
		      <div class="modal-body">
		        <h5 style="color:red;" class="text-center message_guest"></h5>
		        <input type="hidden" class="modal_delete_guest" value="">
		      </div>
		      <div class="modal-footer" style="text-align:center;">
		        <button onclick="del_guest()" data-dismiss="modal" type="button" class="btn btn-primary">Có</button>
		        <a dismiss="modal"   style="cursor:pointer; margin-left: 10px;" data-dismiss="modal">Không</a>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<script type="text/javascript">
			function sum_attending(id)
				{						 						
					$.ajax({
						type:"POST",
						url:"{{URL::route('sum_attending')}}",
						data:
						{
							id_guest:id,attending:$('.'+id+'attend').val()
						},
						success: function(data)
						{	var obj=JSON.parse(data);
							$(".total_guest").text(obj.total_guest); 
							$(".total_invited").text(obj.total_invited); 
							$(".total_noinvited").text(obj.total_noinvited); 
							$(".total_group_guest"+obj.id_group).text(obj.total_group_guest); 
						},
					});
				}	
	        function invited1_click(id){
 				$('#invited1'+id).hide();
 				$('#invited2'+id).show();
 				$.ajax({
				type: "post",
				url: "{{URL::route('update_invited1')}}",
				data: {
				id:$("#invited1"+id).next().val(),attending:$('.'+id+'attend').val()
				},
				success: function(data){
					var obj=JSON.parse(data);
					$(".total_invited").text(obj.total_invited);   
					$(".total_noinvited").text(obj.total_noinvited); 
				}																					
			});

 			};
 			function invited2_click(id){
 				$('#invited2'+id).hide();
 				$('#invited1'+id).show();
 				$.ajax({
				type: "post",
				url: "{{URL::route('update_invited2')}}",
				data: {
				id:$("#invited2"+id).next().val(),attending:$('.'+id+'attend').val()
				},
				success: function(data){
					var obj = JSON.parse(data);
					$(".total_invited").text(obj.total_invited);   
					$(".total_noinvited").text(obj.total_noinvited); 
				}
															
			});

 			};
			//add
		    function add_guest(id){
		    	$.ajax({
					type: "post",
					url: "{{URL::route('create_guest')}}",
					data: {
					id_group:$(".guest_list_add"+id).next().val()
					},
					success: function(data){
					var obj = JSON.parse(data);
					if (obj.guest_last) {
						$('.guest_list'+obj.guest_last).after(obj.html);
					} else{
						$('.guest_list_item_cat'+id).before(obj.html);
					};	
					id_gr=$(".guest_list_add"+id).next().val();		
					$(".total_guest").text(obj.total_guest); 
					$(".total_invited").text(obj.total_invited);   
					$(".total_noinvited").text(obj.total_noinvited); 
					$(".total_group_guest"+id_gr).text(obj.total_group_guest); 

					}											
				});
		    };
		    //dell
            function get_guest(id){
        		var id_guest=$('.guest_del'+id).next().val();
        		$('.modal_delete_guest').val(id_guest);
        		$.ajax({
        			type: "post",
        			url: "{{URL::route('get_guest')}}",
        			data:{
        				id:id_guest
        			},
        			success:function(data){
    					var obj = JSON.parse(data);
    					$('.message_guest').text('Bạn có muốn xóa khách mời '+obj.fullname+' ?');
        			}
        		});
        	};
    
      		function del_guest(){
      			var id_guest=$('.modal_delete_guest').val();
      			$.ajax({
						type: "post",
						url: "{{URL::route('delete_guest')}}",
						data: { 								    
						       id:$('.modal_delete_guest').val()
						},
						success: function(data){
							var obj = JSON.parse(data);
							$(".guest_list"+id_guest).remove();
							$(".total_guest").text(obj.total_guest); 
							$(".total_invited").text(obj.total_invited);   
							$(".total_noinvited").text(obj.total_noinvited); 
							$(".total_group_guest"+obj.id_group).text(obj.total_group_guest);                        
						}												
						});

      		}
            //name
            function name_click(id){
            	if ($("."+id+"name").val()=="New Guest") {
            		$('.'+id+'show_name').hide();  
            		$("."+id+"name").val("");
            		$("."+id+"name").show();  
            		$("."+id+"name").focus(); 
            		
            	} 
            	else{
	            	$('.'+id+'show_name').hide();
	            	$('.'+id+'name').show();
	            	$("."+id+"name").focus(); 
            	};            	
            };
            function name_dblclick(id){
                if ($('.'+id+'name').val()=="") {
                	$('.'+id+'show_name').hide();
            		$("."+id+"name").show();
            		$('.name_error'+id).show();
                } else{
                	$('.'+id+'show_name').show();
            	    $('.'+id+'name').hide();
            	    $('.name_error'+id).hide();
                };
              };
            function name_change(id){
            	if ($("."+id+"name").val()=="") {
            		$("."+id+"name").show();
            		$('.'+id+'show_name').hide();
            		$('.name_error'+id).show();
            	} else{
            		$.ajax({
					type: "post",
					url: "{{URL::route('update_name')}}",
					data: {
					name:$("."+id+"name").val(),	
					id:$("."+id+"name").next().val()
					}							
				});
				$('.'+id+'show_name').text($("."+id+"name").val());
				$("."+id+"name").hide();
				$('.'+id+'show_name').show();
				$('.name_error'+id).hide();
            	};            	
            };
            //phone
            function phone_click(id){ 
            if ($('.'+id+'phone').val()=="Phone") {
            	    $('.'+id+'phone').val("");
            	    $('.'+id+'phone').show();
            	    $('.'+id+'phone').focus();
            		$('.'+id+'show_phone').hide();
            } else{};           	
            		$('.'+id+'phone').show();
            		$('.'+id+'phone').focus();
            		$('.'+id+'show_phone').hide();            	            	
            };
            function phone_dblclick(id){
            	$('.'+id+'phone').hide();
            	$('.'+id+'show_phone').show();
            };
            function phone_change(id){
            	if ($("."+id+"phone").val()=="") {
            		$("."+id+"phone").val("Phone")
            		$.ajax({
					type: "post",
					url: "{{URL::route('update_phone')}}",
					data: {
					phone:$("."+id+"phone").val(),	
					id:$("."+id+"phone").next().val()
					}
					});	
            		$('.'+id+'show_phone').text($("."+id+"phone").val());
					$("."+id+"phone").hide();
					$('.'+id+'show_phone').show();	
					$('.phone_error'+id).hide();			
            	} else{
            		var str=$("."+id+"phone").val();
            		if (str.length>9&&str.length<12) {
            			$.ajax({
					type: "post",
					url: "{{URL::route('update_phone')}}",
					data: {
					phone:$("."+id+"phone").val(),	
					id:$("."+id+"phone").next().val()
					}							
				});
					$('.'+id+'show_phone').text($("."+id+"phone").val());
					$("."+id+"phone").hide();
					$('.'+id+'show_phone').show();
					$('.phone_error'+id).hide();
            		} else{
            			$("."+id+"phone").show();
						$('.'+id+'show_phone').hide();
						$('.phone_error'+id).show();
            		};
            		
            	};
            };            
			function key_phone(event,id)
			 	      {  	
		             if(event.which >= 37 && event.which <= 40) return;
		                 $("."+id+"phone").val(function(index, value) {
						        return value
						            .replace(/\D/g, '')
						            .replace(/\B(?=(\d{3})+(?!\d))/g, "")
						        ;
						    });
			        }; 
            //adress
            function address_click(id){  
            if ($('.'+id+'address').val()=="Address") {
            	$('.'+id+'show_address').hide();
            	$('.'+id+'address').val("");
            	$('.'+id+'address').show();
            	$('.'+id+'address').focus();
            } else{
            	$('.'+id+'show_address').hide();
            	$('.'+id+'address').show();
                $('.'+id+'address').focus();
            };                 	            	
            };
            function address_dblclick(id){
            	$('.'+id+'show_address').show();
	            $('.'+id+'address').hide();
            };   
            function address_change(id){
            	if ($("."+id+"address").val()=="") {
            		$("."+id+"address").val('Address')
            		$.ajax({
					type: "post",
					url: "{{URL::route('update_address')}}",
					data: {
					address:$("."+id+"address").val(),	
					id:$("."+id+"address").next().val()
					}							
				});
	            	$('.'+id+'show_address').text($("."+id+"address").val());
					$("."+id+"address").hide();
					$('.'+id+'show_address').show();					
            	} else{
            		$.ajax({
					type: "post",
					url: "{{URL::route('update_address')}}",
					data: {
					address:$("."+id+"address").val(),	
					id:$("."+id+"address").next().val()
					}							
				});
				$('.'+id+'show_address').text($("."+id+"address").val());
				$("."+id+"address").hide();
				$('.'+id+'show_address').show();				
            	};
            };
            //email
            function email_click(id){ 
            if ($('.'+id+'email').val()=="Email") {
            	$('.'+id+'show_email').hide();
            	$('.'+id+'email').val("");
        	    $('.'+id+'email').show();
        	    $('.'+id+'email').focus();    
            } else{
            	$('.'+id+'show_email').hide();
        	    $('.'+id+'email').show(); 
        	    $('.'+id+'email').focus();
            };           	           	
            };
            // function email_dblclick(id){
            //      $('.'+id+'show_email').show();
            // 	 $('.'+id+'email').hide();
            // 	 $('.email_format'+id).hide();
            // };          
            function email_change(id){
            	if ($("."+id+"email").val()=="") {
            		$("."+id+"email").val("Email");
            		$.ajax({
					type: "post",
					url: "{{URL::route('update_email')}}",
					data: {
					email:$("."+id+"email").val(),	
					id:$("."+id+"email").next().val()
					}							
				});
					$('.'+id+'show_email').text($("."+id+"email").val());
					$("."+id+"email").hide();
					$('.'+id+'show_email').show(); 
					$('.email_format'+id).hide();          		
            	} else{
            		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            		if (!emailReg.test($("."+id+"email").val())) {
            			$("."+id+"email").show();
				    	$('.email_format'+id).show();
            		   } 
            		else{
            			$.ajax({
					type: "post",
					url: "{{URL::route('update_email')}}",
					data: {
					email:$("."+id+"email").val(),	
					id:$("."+id+"email").next().val()
					}							
				});
				$('.'+id+'show_email').text($("."+id+"email").val());
				$("."+id+"email").hide();
				$('.'+id+'show_email').show();
				$('.email_format'+id).hide();
              };           		
			};            	
            };
            //attend
            function attend_click(id){  
            if ($('.'+id+'attend').val()=="1") {
            	$('.'+id+'show_attend').hide();
            	$('.'+id+'attend').val("");
	    	    $('.'+id+'attend').show();
	    	    $('.'+id+'attend').focus();
            } else{
            	$('.'+id+'show_attend').hide();
	    	    $('.'+id+'attend').show(); 
	    	    $('.'+id+'attend').focus();  
            };          		    		         	
            };
            function attend_dblclick(id){
            	$('.'+id+'show_attend').show();
            	$('.'+id+'attend').hide();
            };      
            function attend_change(id){
            	if ($("."+id+"attend").val()=="") {
            		$("."+id+"attend").val("1");
    
					$('.'+id+'show_attend').text($("."+id+"attend").val());
					$("."+id+"attend").hide();
					$('.'+id+'show_attend').show();
            	} else{
    
				$('.'+id+'show_attend').text($("."+id+"attend").val());
				$("."+id+"attend").hide();
				$('.'+id+'show_attend').show();
				 $('.attend_error'+id).hide();
            	};           	
            };
		</script>	
		</div>
	</div> <!-- row -->
</div><!--container-->
@endsection