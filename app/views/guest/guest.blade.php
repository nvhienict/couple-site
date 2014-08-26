@extends('main')
@section('title')
guest
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
					<a href="" id="add-group-webding" style="cursor:pointer;" data-toggle="modal" data-target="#myGroup">
						<i class="glyphicon glyphicon-plus"></i>
						&nbsp Thêm Nhóm
					</a>
					<!-- Modal Add checklist -->
						<div class="modal fade" id="myGroup" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h3 class="modal-title" id="myGrouplable">Thêm nhóm mới</h3>
						      </div>
						      <div class="modal-body">
						        <form id="form_add_group" action="{{Asset('guest-list/add_group')}}" method="post">
								    <div class="row form-group">
										<label for="name" class="col-xs-3 control-label">Tên nhóm </label>
										<div class="col-xs-9">
										   	<input type="text" class="form-control" name="name" id="name" placeholder="Tên nhóm mới">
										</div>
									</div>
								  	<div class="row form-group">
								  		<div class="col-xs-4"></div>
								  		<div class="col-xs-4">
									    	<button type="submit" class="btn btn-primary" id="submit_add"> Thêm </button>
									    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
								  		</div>
								  		<div class="col-xs-4"></div>
								  	</div>
								</form>
							   </div> <!-- end modal body -->
							</div> <!-- end modal content -->
							</div> <!-- end modal dialog -->
							</div> <!-- end modal fade -->
							<!-- end modal Add -->
							<script type="text/javascript" src="{{Asset('assets/js/script_thuy.js')}}"></script>
				</div>
				<div class="col-xs-2">
					<a href="" id="add-guest-wedding" style="cursor:pointer;" data-toggle="modal" data-target="#myModalAddGuest">
					<i class="glyphicon glyphicon-plus"></i>
					&nbsp Thêm Khách 

				</a>

					<div class="modal fade" id="myModalAddGuest" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h3 class="modal-title" id="myGrouplable">Thêm Khách Mời</h3>
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
										   	<input type="text" class="form-control" name="phone" id="phone" placeholder="">
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
										<label for="group" class="col-xs-3 control-label">Group:</label>
										<div class="col-xs-9">
										   	<select name="group" class="form-control">
						                    	@foreach(Groups::get() as $group)
						                        <option value="{{$group->id}}">{{$group->name}}</option>
						                        @endforeach
						                    </select>
										</div>
									</div>
									<div class="row form-group">
										<label for="attending" class="col-xs-3 control-label">Số người tham dự:</label>
										<div class="col-xs-9">
										   	<input type="text" class="form-control" name="attending" id="attending" placeholder="">
										</div>
									</div>
								  	<div class="row form-group">
								  		<div class="col-xs-4"></div>
								  		<div class="col-xs-4">
									    	<button type="submit" class="btn btn-primary" id=""> Thêm </button>
									    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
								  		</div>
								  		<div class="col-xs-4"></div>
								  	</div>
								</form>
							   </div> <!-- end modal body -->
							</div> <!-- end modal content -->
							</div> <!-- end modal dialog -->
							</div> <!-- end modal fade -->
							<!-- end modal Add -->
							<script type="text/javascript" src="{{Asset('assets/js/script-binh.js')}}"></script>
				</div>

				<div class="col-xs-2">
					<a href="" ><i class="fa fa-print"></i>&nbspXuất file</a>
				</div>
			</div>
		</div>
				<div class="col-xs-12" align="right">
					<span style="color: #19b5bc; cursor:pointer; margin-right: 5px;" id="guest_all_item_sign_down"><i class="glyphicon glyphicon-chevron-down"></i></span>
					<span style="color: #19b5bc; cursor:pointer; " id="guest_all_item_sign_up"><i class="glyphicon glyphicon-chevron-up"></i></span>
					<!-- display or hide all items -->
					<script type="text/javascript">
						$('#guest_all_item_sign_down').click(function(){
							$('.guest_list_item_cat').show();

							$('.down_item_cat').hide();
							$('.up_item_cat').show();
							
						});
						$('#guest_all_item_sign_up').click(function(){
							$('.guest_list_item_cat').hide();

							$('.down_item_cat').show();
							$('.up_item_cat').hide();
						});
					</script>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-10">
					<table class="table-guest">

						<tr class="table-guest-thead-fixed">							
					 		<th style="width:50px;">Mời</th>
					 		<th style="width:220px;">Nhóm</th>
					 		<th style="width:200px;">Số điện thoại</th>
					 		<th style="width:250px;">Địa chỉ</th>
					 		<th style="width:240px;">Email</th>
					 		<th style="width:200px;">Số người tham dự</th>
					 		<th style="width:60px;"></th>

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
					 		<th>Mời</th>
					 		<th>Nhóm</th>
					 		<th>Số điện thoại</th>
					 		<th>Địa chỉ</th>
					 		<th>Email</th>
					 		<th >Số người tham dự</th>
					 		<th></th>
					 		<th></th>
					 		<th></th>
					 	</thead>

					 	<tbody>
					 	@foreach(Groups::get() as $key=>$group)
					 		<tr class="guest_cat{{$group->id}} guest_cat" id="cate{{$group->id}}">
					 			<td></td>					 			
					 			<td><strong>{{$group->name}}</strong></td>					 								 		
					 			<td></td>
					 			<td></td>
					 			<td></td>
					 			<td></td>
					 			<td>
					 				<a href="#" id="edit-group-webding" data-toggle="modal" data-target="#editGroup-guest{{$group->id}}">
										<span class="fa fa-edit"></span>
									</a>
									<!-- Modal edit group guest -->
										<div class="modal fade" id="editGroup-guest{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										        <h3 class="modal-title" id="myGrouplable">Sửa nhóm "{{$group->name}} "</h3>
										      </div>
										      <div class="modal-body">
										        <form id="form_edit_group{{$group->id}}" action="{{Asset('guest-list/edit_group')}}" method="post">
												    <div class="row form-group">
														<label for="name" class="col-xs-3 control-label">Tên nhóm </label>
														<div class="col-xs-9">
														   	<input type="text" class="form-control" name="name" id="name" placeholder="Tên nhóm" value="{{$group->name}}">
															<input type="text" hidden name="id_group" value="{{$group->id}}">
														</div>
													</div>
												  	<div class="row form-group">
												  		<div class="col-xs-4"></div>
												  		<div class="col-xs-4">
													    	<button type="submit" class="btn btn-primary" id="submit_edit"> Lưu </button>
													    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
												  		</div>
												  		<div class="col-xs-4"></div>
												  	</div>
												</form>
											   </div> <!-- end modal body -->
											</div> <!-- end modal content -->
											</div> <!-- end modal dialog -->
											</div> <!-- end modal fade -->
											<!-- end modal edit -->
											<script type="text/javascript">

												$("#form_edit_group{{$group->id}}").validate({
												rules:{
													name:{
														required:true,
														remote:{
															url: "{{URL::route('checkName')}}",
															type:"POST",
														}
													}
												},
												messages:{
													name:{
														required:"Bạn chưa nhập tên nhóm",
														remote: "Đã tồn tại nhóm này"
													}
												}
											})
											
										</script>
					 			</td>
					 			<td>
					 				<a href="#" id="delete-group-webding" data-toggle="modal" data-target="#deleteGroup-guest{{$group->id}}" style="margin-right: 10px;">
										<span class="fa fa-trash-o"></span>
									</a>
									<!-- Modal delete group guest -->
										<div class="modal fade" id="deleteGroup-guest{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="myGrouplable" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										        <h3 class="modal-title" id="myGrouplable">Xoá nhóm khách mời</h3>
										      </div>
										      <div class="modal-body">
										        <form id="form_delete_group" action="{{Asset('guest-list/delete_group')}}" method="post">
												    <div class="row form-group algin-delete">
														 Bạn chắc chắn muốn xoá nhóm <h3 style="color: red;">{{$group->name}}?</h3>
															<small>*Tấc cả các thành viên trong nhóm cũng bị xoá</small>
														<div class="col-xs-9">
														   	<input type="text" hidden name="id_group" id="id_group" value="{{$group->id}}" >
														</div>
													</div>
												  	<div class="row form-group">
												  		<div class="col-xs-4"></div>
												  		<div class="col-xs-4">
													    	<button type="submit" class="btn btn-primary" id="submit_delete"> Xoá </button>
													    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
												  		</div>
												  		<div class="col-xs-4"></div>
												  	</div>
												</form>
											   </div> <!-- end modal body -->
											</div> <!-- end modal content -->
											</div> <!-- end modal dialog -->
											</div> <!-- end modal fade -->
											<!-- end modal delete -->
								</td>
					 			<td>
					 				<span class="up_item_cat" style="color: #19b5bc; cursor:pointer; " id="up{{$group->id}}"><i class="glyphicon glyphicon-chevron-up"></i></span>
					 				<span class="down_item_cat" style="color: #19b5bc; cursor:pointer; display:none"; id="down{{$group->id}}" ><i class="glyphicon glyphicon-chevron-down"></i></span>
					 				<!-- display or hide a item -->
									<script type="text/javascript">

										$('#up{{$group->id}}').click(function(){
											$('#guest_list_item_cat{{$group->id}}').hide();

											$('#up{{$group->id}}').hide();
											$('#down{{$group->id}}').show();
										});

										$('#down{{$group->id}}').click(function(){
											$('#guest_list_item_cat{{$group->id}}').show();

											$('#up{{$group->id}}').show();
											$('#down{{$group->id}}').hide();
										});
									</script>
					 			</td>
					 		</tr>
					 		<tbody id="guest_list_item_cat{{$group->id}}">
					 			@foreach(Guests::where('group',$group->id)->get() as $guest)
			 					<tr class=" guest_list{{$guest->id}} guest_list_item_cat" id="guest_list_item_cat{{$guest->id}}">
			 						
						 			<td>
						 				<div class="checkbox">
						 					<label>
						 						<input type="checkbox" value="">
						 						
						 					</label>
						 				</div>
					 				</td>
					 			<td>
					 				<div>
									 <a onclick="name_click({{$guest->id}})" class="{{$guest->id}}show_name">{{$guest->fullname}}</a> 										 	
									    <input onchange="name_change({{$guest->id}})" ondblclick="name_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}name form-control input-edit-guest" name="fullname" value="{{$guest->fullname}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									 </div>
									 <p style="display:none;color:red;" class="name_error{{$guest->id}}">Vui lòng nhập tên khách mời</p>
									 
					 			</td>
						 		<td >
					 				<div ><!-- Estimate -->
									 <a onclick="phone_click({{$guest->id}})" class="{{$guest->id}}show_phone">{{$guest->phone}}</a> 										 	
									    <input onchange="phone_change({{$guest->id}})" ondblclick="phone_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}phone form-control input-edit-guest" name="phone" value="{{$guest->phone}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									 </div>
									 <p style="display:none;color:red;" class="phone_error{{$guest->id}}">Vui lòng nhập sdt</p>
									 
						 		</td>
						 		<td ><!-- Actual -->
									<div  > 
										<a onclick="address_click({{$guest->id}})" class="{{$guest->id}}show_address">{{$guest->address}}</a> 										 	
									    <input onchange="address_change({{$guest->id}})" ondblclick="address_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}address form-control input-edit-guest" name="address" value="{{$guest->address}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									</div>
									<p style="display:none;color:red;" class="address_error{{$guest->id}}">Vui lòng nhập địa chỉ</p>
								</td>
					 			<td >
					 				<div  > 
										<a onclick="email_click({{$guest->id}})" class="{{$guest->id}}show_email">{{$guest->email}}</a> 										 	
									    <input onchange="email_change({{$guest->id}})" ondblclick="email_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}email form-control input-edit-guest" name="email" value="{{$guest->email}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									</div>
									<p style="display:none;color:red;" class="email_error{{$guest->id}}">Vui lòng nhập email</p>
				 				</td><!-- pay -->
					 			<td>
					 				<div>
						 				<a onclick="attend_click({{$guest->id}})" class="{{$guest->id}}show_attend">{{$guest->attending}}</a> 										 	
									    <input onchange="attend_change({{$guest->id}})" ondblclick="attend_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}attend form-control input-edit-guest" name="attending" value="{{$guest->attending}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
					 				</div>
					 				<p style="display:none;color:red;" class="attend_error{{$guest->id}}">Vui lòng nhập số khách mời</p>
					 			</td><!-- Due -->
					 			<td>
					 				<a onclick="guest_del({{$guest->id}})" href="javascript:void(0)" class="confirm guest_list_icon_trash guest_del{{$guest->id}}"><i class="glyphicon glyphicon-trash"></i></a>
					 				<input type="hidden"  name="{{$guest->item}}" value="{{$guest->id}}" >
					 			</td>								
						 		</tr>
						 		<!-- Script thuỷ viết -->
						 		                                											  						     
						 		@endforeach
						 		<tr class="guest_list_item_cat" id="guest_list_item_cat">
						 			<td></td>
						 				<td colspan="7"><a onclick="add_guest({{$group->id}})" href="javascript:void(0)" class="guest_list_add{{$group->id}}" style="cursor:pointer;">
											<i class="glyphicon glyphicon-plus"></i>&nbsp Thêm Khách
										</a>
										<input type="hidden" value="{{$group->id}}" name="{{$group->id}}">
									</td>
						 		</tr>
						 	</tbody>
						@endforeach
					 	</tbody>
					 	
					</table>
				</div>
			
		 <!-- col-xs-10 -->
		<div class="col-xs-2" id="guest_summary">
			<h3>Tóm tắt:</h3>
			<p>
				<div>Tổng số khách:</div>
				
				<div>Đã mời:</div>
				
				<div>Chưa mời:</div>
				
		</div>
	<script type="text/javascript">
		    //add
		    function add_guest(id){
		    	$.ajax({
					type: "post",
					url: "{{URL::route('create')}}",
					data: {
					id_group:$(".guest_list_add"+id).next().val()
					},
					success: function(data){
					var obj = JSON.parse(data);
					if (obj.guest_last) {
						$('.guest_list'+obj.guest_last).after(obj.html);
					} else{
						$('.guest_cat'+id).after(obj.html);
					};
																	
					}											
				});
		    };
		    //dell
            function guest_del(id){
            	if(confirm("Bạn chắc chắn muốn xoá khách mời này?")){
                	$.ajax({
						type: "post",
						url: "{{URL::route('delete')}}",
						data: { 								    
						       id:$(".guest_del"+id).next().val()
						},
						success: function(data){
							//var obj = JSON.parse(data);  
							$(".guest_list"+id).remove();                             
						}												
						});
                    return true;
                }
                else{
                    return false;
                };
            };
            //name
            function name_click(id){
            	if ($("."+id+"name").val()=="New Guest") {
            		$("."+id+"name").val("");
            		$('.'+id+'show_name').hide();
            		$("."+id+"name").show();     
            	} 
            	else{
	            	$('.'+id+'show_name').hide();
	            	$('.'+id+'name').show();
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
            	if ($('.'+id+'phone').val()=="Number") {
            		$('.'+id+'phone').val("");
            		$('.'+id+'phone').show();
            		$('.'+id+'show_phone').hide();
            	} else{
            		$('.'+id+'show_phone').hide();
            	    $('.'+id+'phone').show();
            	};            	
            };
            function phone_dblclick(id){
            	if ($("."+id+"phone").val()=="") {
            		$("."+id+"phone").show();
            		$('.'+id+'show_phone').hide();
            		$('.phone_error'+id).show();
            	} else{
            		$('.'+id+'show_phone').show();
            	    $('.'+id+'phone').hide();
            	    $('.phone_error'+id).hide();
            	};
            };
            function phone_change(id){
            	if ($("."+id+"phone").val()=="") {
            		$("."+id+"phone").show();
            		$('.'+id+'show_phone').hide();
            		$('.phone_error'+id).show();
            	} else{
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
            	};
            };
            //adress
            function address_click(id){
            	if ($('.'+id+'address').val()=="Address") {
            		$('.'+id+'address').val("");
            		$('.'+id+'show_address').hide();
	            	$('.'+id+'address').show();	            	
            	} else{
            		$('.'+id+'show_address').hide();
	            	$('.'+id+'address').show();
            	};            	
            };
            function address_dblclick(id){
            	if ($("."+id+"address").val()=="") {
            		$("."+id+"address").show();
            		$('.'+id+'show_address').hide();
            		$('.address_error'+id).show();
            	} else{
            		$('.'+id+'show_address').show();
            	    $('.'+id+'address').hide();
            	    $('.address_error'+id).hide();
            	};            	
            };
            function address_change(id){
            	if ($("."+id+"address").val()=="") {
            		$("."+id+"address").show();
            		$('.'+id+'show_address').hide();
            		$('.address_error'+id).show();
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
				$('.address_error'+id).hide();
            	};
            };
            //email
            function email_click(id){
            	if ($('.'+id+'email').val()=="Email") {
            		$('.'+id+'email').val("");
            		$('.'+id+'show_email').hide();
            	    $('.'+id+'email').show();
            	} else{
            		$('.'+id+'show_email').hide();
            	    $('.'+id+'email').show();
            	};
            };
            function email_dblclick(id){
            	if ($("."+id+"email").val()=="") {
            		$("."+id+"email").show();
            		$('.'+id+'show_email').hide();
            		$('.email_error'+id).show();
            	} else{
            		$('.'+id+'show_email').show();
            	    $('.'+id+'email').hide();
            	    $('.email_error'+id).hide();
            	};
            };
            function email_change(id){
            	if ($("."+id+"email").val()=="") {
            		$("."+id+"email").show();
            		$('.'+id+'show_email').hide();
            		$('.email_error'+id).show();
            	} else{
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
				 $('.email_error'+id).hide();
			};            	
            };
            //attend
            function attend_click(id){
            	if ($('.'+id+'attend').val()=="0") {
            		$('.'+id+'attend').val("");
            		$('.'+id+'show_attend').hide();
                 	$('.'+id+'attend').show();
            	} else{
            		$('.'+id+'show_attend').hide();
            	    $('.'+id+'attend').show();
            	};
            };
            function attend_dblclick(id){
            	if ($("."+id+"attend").val()=="") {
            		$("."+id+"attend").show();
            		$('.'+id+'show_attend').hide();
            		$('.attend_error'+id).show();
            	} else{
            		$('.'+id+'show_attend').show();
            	    $('.'+id+'attend').hide();
            	    $('.attend_error'+id).hide();
            	};
            };
            function attend_change(id){
            	if ($("."+id+"attend").val()=="") {
            		$("."+id+"attend").show();
            		$('.'+id+'show_attend').hide();
            		$('.attend_error'+id).show();
            	} else{
            		$.ajax({
					type: "post",
					url: "{{URL::route('update_attend')}}",
					data: {
					attend:$("."+id+"attend").val(),	
					id:$("."+id+"attend").next().val()
					}							
				});
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