
@extends('main-dashboard')
@section('title')
Danh sách khách mời | thuna.vn
@endsection
@section('nav-dash')
	<!-- Navigation -->
	<div class="row bg-menu-top">
		<div class="navbar">
		  	<div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		      	</button>
		  	</div>
		  	<div class="navbar-collapse collapse navbar-responsive-collapse">
			    <ul class="nav navbar-nav">
			      	<li>
			      		<a href="{{URL::route('index')}}" title="Trang chủ">
			      			Trang chủ
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('website')}}" title="Website cưới">
			        		Website cưới
			        	</a>
			        </li>
			      	<li><a href="{{URL::route('user-checklist')}}" title="Danh sách công việc">
			      			Danh sách công việc
	 		      		</a>
			      	</li>
			      	<li class="active"><a href="{{URL::route('guest-list')}}" title="Danh sách khác mời">
			      			Danh sách khách mời
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('budget')}}" title="Quăn lí ngân sách">
			      			Quản lí ngân sách
	 		      		</a>
			      	</li>
			      	<li class="dropdown">
				        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown" title="Âm nhạc">
							Âm nhạc
				        </a>
				        <ul class="dropdown-menu oneUl" role="menu">
				          	<li role="presentation" class="dropdown-header"><span>Nghi lễ</span>
					            <div class="row">
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('mo-dau'))}}">Mở đầu</a></li>
					                  <li><a href="{{URL::route('songs', array('doan-ruoc'))}}">Đoàn rước</a></li>
					                </ul>
					              </div>
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('nghi-thuc'))}}">Nghi thức</a></li>
					                  <li><a href="{{URL::route('songs', array('ket-thuc'))}}">Kết thúc</a></li>
					                </ul>
					              </div>
					            </div>
				          	</li>
				          	<li role="presentation" class="dropdown-header"><span>Đãi tiệc</span>
					            <div class="row">
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('khai-tiec'))}}">Khai tiệc</a></li>
					                  <li><a href="{{URL::route('songs', array('phat-bieu'))}}">Phát biểu</a></li>
					                  <li><a href="{{URL::route('songs', array('cat-banh'))}}">Cắt bánh</a></li>
					                </ul>
					              </div>
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('vao-tiec'))}}">Vào tiệc</a></li>
					                  <li><a href="{{URL::route('songs', array('chuc-mung'))}}">Chúc mừng</a></li>
					                  <li><a href="{{URL::route('songs', array('cuoi-tiec'))}}">Cuối tiệc</a></li>
					                </ul>
					              </div>
					            </div>
				          	</li>
				        </ul>
			      	</li> <!--/music-->

			      	<li><a href="{{URL::action('FortuneController@getIndex')}}" title="Xem ngày cưới">
			      			Xem ngày cưới
			      		</a>
			      	</li>
			    
			    </ul>
		  	</div>
		</div><!--/.nav-->
	</div><!--/.bg-menu-top-->
@endsection
@section('total')
	@include('total')
@endsection
@section('content')

	<div class="col-md-12 thong-ke-chi-tiet-cong-viec">

		<h4>Thống kê khách mời</h4>

		<div class="table-responsive">
	 		<table class="table table-hover">
	 			<tbody>
	 				<tr>
	 					<td class="info">Khách chưa mời</td>
						<td class="warning">Khách đã mời</td>
						<td class="success">Tổng số khách</td>
	 				</tr>
	 				<tr>
	 					<td class="info">
	 						<div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
                                    {{ GuestController::getGuestOverInvitedPercent() }}%
                                </div>
                            </div>
						</td>
	 					<td class="warning">
	 						<div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
                                    {{ GuestController::getGuestInvitedPercent() }}%
                                </div>
                            </div>
						</td>
						<td class="success">
	 						<div class="progress progress-striped active">
                                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%;" >
                                    {{ GuestController::getAllGuest() }}
                                </div>
                            </div>
						</td>
	 				</tr>
	 			</tbody>
	 		</table>
	 	</div>
	</div><!--/.thong-ke-chi-tiet-cong-viec-->


	<div class="col-xs-12">
		<div class="row sort-by">
			<div class="col-xs-12">
				<h2 style="color:#E75292;">Danh sách khách mời</h2>
			</div>
		</div>
		<div class="submenu">
			<div class="row guest-action-btn">
				<div class="col-md-2 col-sm-3 col-xs-4">
					<a href="" id="add-group-webding" class="btn btn-primary" data-toggle="modal" data-target="#myGroup" data-backdrop="static" >
						<span class="hidden-xs">
							<i class="glyphicon glyphicon-plus"></i>
							Thêm Nhóm
						</span>
						<span class="hidden-md hidden-lg hidden-sm">
							<i class="fa fa-group fa-2x"></i>
						</span>
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
											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="margin-top:1%;">
												<label for="name" class="control-label hidden-xs">Tên nhóm:</label>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<input type="text" class="form-control" name="name" id="name" placeholder="Tên nhóm mới">
											</div>
											
											<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
												
											</div>
											
									   	</div>
									   	<div class="modal-footer" style="text-align:center;border-top:none;">								  		
									    	<button type="submit" class="btn btn-primary" id="submit_add"> Thêm </button>
									    	<a data-dismiss="modal" class="btn btn-primary" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>								  										  		
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
				<div class="col-md-2 col-sm-3 col-xs-4">
					<a href="" onclick="showHideAddGuest()" id="add-guest-wedding" class="btn btn-primary" data-toggle="modal" data-target="" >
						<span class="hidden-xs">
							<i class="glyphicon glyphicon-plus"></i>
							Thêm Khách
						</span>
						<span class="hidden-md hidden-lg hidden-sm">
							<i class="fa fa-user fa-2x"></i>
						</span>
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

					<div class="col-md-2 col-sm-3 col-xs-4">
						<a href="{{URL::route('guest-list/exportfile')}}" class="btn btn-warning" >
							<span class="hidden-xs">
								<i class="fa fa-print"></i>
								Xuất file
							</span>
							<span class="hidden-md hidden-lg hidden-sm">
								<i class="fa fa-print fa-2x"></i>
							</span>
						</a>
					</div>

					<div class="col-md-6 text-right">
						<span style="color: #19b5bc; cursor:pointer; margin-right: 5px;" id="guest_all_item_sign_down"><i class="glyphicon glyphicon-chevron-down"></i></span>
						<span style="color: #19b5bc; cursor:pointer; " id="guest_all_item_sign_up"><i class="glyphicon glyphicon-chevron-up"></i></span>
					</div>

				</div>
			</div>
			<!-- /.row -->
			</div>
			<!-- /.sub_menu -->

			<div class="row" style="margin-left:0">
				<div class="col-xs-12">
					<table class="table table-hover table-guest">
						<tr class="table-guest-thead-fixed hidden-xs sum-table">
							<th style="width:10%;">Nhóm</th>
							<th style="width:35%;">Mã khách mời</th>
							<th style="width:15%;">Số điện thoại</th>
							<th style="width:19%;">Email</th>
							<th style="width:13%;">Tham dự</th>
							<th style="width:1%;"></th>
					 		<th></th>

					 	</tr>
					 	<script type="text/javascript">
						 	$(window).scroll(function(){
								if ($(this).scrollTop() > 800) {
							        $('.table-guest-thead-fixed').show();
							    } else {
							        $('.table-guest-thead-fixed').hide();
							    }
							});
						</script>
					 	<thead>
					 	<tr class="thead-guest">
					 		<th style="text-align:left">Nhóm</th>
					 		<th>Mã khách mời</th>
					 		<th>Số điện thoại</th>
					 		<th>Email</th>
					 		<th colspan="3">Tham dự</th>
					 	</tr>
					 	</thead>
					 	<tbody>
					 @if((Groups::where('user',GuestController::id_user())->get()))
					 	@foreach(Groups::where('user',GuestController::id_user())->get() as $key=>$group)
					 		<tr class="guest_cat{{$group->id}} guest_cat" id="cate{{$group->id}}">					 						 			
					 			<td colspan="5" style="text-align:left">
					 				<a href="javascript:void(0);" style="color:#555555;"onclick="show_hide({{$group->id}})" >
					 					<i id="show-hide-group{{$group->id}}" class=" fa fa-minus-square-o"></i>
					 					<strong class="name_group_edit{{$group->id}}"> {{$group->name}}</strong>
					 					(<span class="total_group_guest{{$group->id}}">{{Guests::where('user',GuestController::id_user())->where('group',$group->id)->sum('attending')}}</span>)
					 				</a>
					 			</td>
					 			<td colspan="2" style="text-align:right">

					 				<a href="#" id="edit-group-webding{{$group->id}}" onclick="sent_id_group_edit({{$group->id}})" class="icon-delete-group"data-toggle="modal" data-target="#editGroup-guest" data-backdrop="static">
										<span class="fa fa-edit "></span>
									</a>
									
					 				<a href="#" onclick="sent_id_group({{$group->id}})" id="delete-group-webding{{$group->id}} " class="icon-delete-group" data-toggle="modal" data-target="#deleteGroup-guest" data-backdrop="static" style="margin-right: 10px;" >
										<span class="fa fa-trash-o "></span>
									</a>

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
									
					 			</td>
					 		</tr>
					 		<tbody class="guest_list_show_cat{{$group->id}} guest_list_show_cat">
					 			@if((Guests::where('user',GuestController::id_user())->where('group',$group->id)->get()))
					 			@foreach(Guests::where('user',GuestController::id_user())->where('group',$group->id)->get() as $guest)
			 					<tr class=" guest_list{{$guest->id}} guest_list_item_cat" id="guest_list_item_cat{{$guest->id}}">
			 											 			
						 			<td style="text-align: left;">
						 				<div>
										 	<a onclick="name_click({{$guest->id}})" class="{{$guest->id}}show_name">
										 		{{$guest->fullname}}
										 	</a>
										    <input onblur="name_change({{$guest->id}})" ondblclick="name_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}name form-control input-edit-guest" name="fullname" value="{{$guest->fullname}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
										</div>
										<p style="display:none;color:red;" class="name_error{{$guest->id}}">Nhập tên khách mời</p>
									</td>
									<td>
										<div> 
											<a class="span-id-guest" title="Tìm hiểu thêm" data-toggle="modal" data-target="#alert-id-guest" data-backdrop="static">
												{{$guest->address}}
											</a>
										</div>
									</td>
							 		<td>
						 				<div >
										 <a onclick="phone_click({{$guest->id}})" class="{{$guest->id}}show_phone">{{$guest->phone}}</a> 										 	
										    <input onkeyup="key_phone(event,{{$guest->id}})" onblur="phone_change({{$guest->id}})" ondblclick="phone_dblclick({{$guest->id}})" type="text" class="{{$guest->id}}phone form-control input-edit-guest" name="phone" value="{{$guest->phone}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
										 </div>
										 <p style="display:none;color:red;" class="phone_error{{$guest->id}}">phone không đúng</p>
										 
							 		</td>
						 			<td>
						 				<div  > 
											<a onclick="email_click({{$guest->id}})" class="{{$guest->id}}show_email">{{$guest->email}}</a> 										 	
										    <input onblur="email_change({{$guest->id}})" type="text" class="{{$guest->id}}email form-control input-edit-guest" name="email" value="{{$guest->email}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
										</div>
										<p style="display:none;color:red;" class="email_format{{$guest->id}}">email không đúng</p>
					 				</td><!-- pay -->
						 			<td>
						 				<div>
							 				<a onclick="attend_click({{$guest->id}})" class="{{$guest->id}}show_attend">{{$guest->attending}}</a> 										 	
										    <input onblur="attend_change({{$guest->id}})" ondblclick="attend_dblclick({{$guest->id}})" onchange="sum_attending({{$guest->id}})" type="text" class="{{$guest->id}}attend form-control input-edit-guest" name="attending" value="{{$guest->attending}}">   
											<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">	
						 				</div>
						 				
						 			</td><!-- Due -->
						 			<td width="10px">
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
						 			
						 			<td>
						 				<a onclick="get_guest({{$guest->id}})" href="javascript:void(0)" data-toggle="modal" data-target="#modalDeleteGuest" class="guest_list_icon_trash guest_del{{$guest->id}}">
						 					<i class="glyphicon glyphicon-trash"></i>
						 				</a>
						 				<input type="hidden"  name="{{$guest->id}}" value="{{$guest->id}}" >

						 			</td>								
						 		</tr>
						 		                                											  						     
						 		@endforeach
						 	@endif	
						 		<tr class="guest_list_item_cat{{$group->id}}" id="guest_list_item_cat{{$group->id}}">
						 			
						 			<td style="text-align: left;" colspan="7">
						 				<a onclick="add_guest({{$group->id}})" href="javascript:void(0)" class="guest_list_add{{$group->id}} btn btn-primary">
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
		 <!-- /.col-xs-10 -->

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
		        	<h4 style="color:#3276B1;" class="modal-title text-center">Thông báo</h4>
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

            $("#form_add_guest").validate({
		rules:{
			fullname:{
				required:true
			},
			email:{
                    
                     email:true,
                     remote:{
                                url:"{{URL::route('check-email-guest')}}",
                                type:"POST"
                            }
                    },
            
             phone:{
             	
                minlength:9

             	},
           
		},
		messages:{
			fullname:{
				required:"Bạn chưa nhập Tên Khách"
			},
			email:{
				
                email:"Không đúng định dạng Email",
                remote:"Email đã tồn tại"
			},
			
			phone:{
             	
                minlength:"Yêu cầu nhập trên 9 kí tự"
             	},
             
		}
	});
		</script>	
		</div>

@endsection