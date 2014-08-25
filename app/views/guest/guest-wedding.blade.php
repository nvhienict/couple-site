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
		<div class="col-xs-12">
			<div class="row sort-by">
			<div class="col-md-6">
				<h2>Danh sách khách mời</h2>
			</div>
			<div class="col-md-5 pull-right">
				<div>
				<ul class="nav nav-pills text-right" role="tablist">
					<li >
						<a href="{{URL::route('guest-list')}}" ></span>Đám hỏi</a>
					</li>
					<li class="active">
						<a href="{{URL::route('guest-list-wedding')}}" ></span>Đám cưới</a>
					</li>
				</ul>
			</div>
			</div>
		</div>
		<div class="submenu">
			<div class="row">
				<div class="col-md-2">
					<a href="" id="add-checklist" style="cursor:pointer;" data-toggle="modal" data-target="#myModalAddChecklist">
					<i class="glyphicon glyphicon-plus"></i>
					&nbsp Thêm Nhóm
				</a>
				</div>
				<div class="col-md-2">
					<a href="" id="add-checklist" style="cursor:pointer;" data-toggle="modal" data-target="#myModalAddChecklist">
					<i class="glyphicon glyphicon-plus"></i>
					&nbsp Thêm Khách 
				</a>
				</div>

				<div class="col-md-2">
					<a href="" ><i class="fa fa-print"></i>&nbspXuất file</a>
				</div>
			</div>
		</div>
				<div class="col-xs-10" align="right">
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

							$('.down_item_cat').hide();
							$('.up_item_cat').hide();
						});
					</script>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<table class="table-guest">

						<tr class="table-guest-thead-fixed">							
					 		<th>Mời</th>
					 		<th>Nhóm</th>
					 		<th>Số điện thoại</th>
					 		<th>Địa chỉ</th>
					 		<th>Email</th>
					 		<th >Số người tham dự</th>
					 		<th></th>
					 	</tr>
					 	<script type="text/javascript">
						 	$(window).scroll(function(){
								if ($(this).scrollTop() > 230) {
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
					 	</thead>

					 	<tbody>
					 	@foreach(Groups::get() as $key=>$group)
					 		<tr class="guest_cat" id="cate{{$group->id}}">
					 			<td></td>					 			
					 			<td><strong>{{$group->name}}</strong></td>
					 			
					 			</td>
					 			<td></td>
					 			<td></td>
					 			<td></td>
					 			<td></td>
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
					 		<tbody id="guest_list_cat{{$group->id}}">
					 			@foreach(Guests::where('group',$group->id)->get() as $guest)
			 					<tr class="guest_list_item_cat" id="guest_list_item_cat{{$guest->id}}">
			 						
						 			<td>
						 				<div class="checkbox">
						 					<label>
						 						<input type="checkbox" value="">
						 						
						 					</label>
						 				</div>
					 				</td>
					 			<td>
					 				<div>
									 <a  class="{{$guest->id}}show_name">{{$guest->fullname}}</a> 										 	
									    <input type="text" class="{{$guest->id}}name form-control input-edit-guest" name="fullname" value="{{$guest->fullname}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									 </div>
									 
					 			</td>
						 		<td >
					 				<div ><!-- Estimate -->
									 <a  class="{{$guest->id}}show_phone">{{$guest->phone}}</a> 										 	
									    <input type="text" class="{{$guest->id}}phone form-control input-edit-guest" name="phone" value="{{$guest->phone}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									 </div>
									 
						 		</td>
						 		<td ><!-- Actual -->
									<div  > 
										<a  class="{{$guest->id}}show_address">{{$guest->address}}</a> 										 	
									    <input type="text" class="{{$guest->id}}address form-control input-edit-guest" name="address" value="{{$guest->address}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									</div>
									

								</td>
					 			<td >
					 				<div  > 
										<a class="{{$guest->id}}show_email">{{$guest->email}}</a> 										 	
									    <input type="text" class="{{$guest->id}}email form-control input-edit-guest" name="email" value="{{$guest->email}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
									</div>
									
				 				</td><!-- pay -->
					 			<td>
					 				<div>
						 				<a class="{{$guest->id}}show_attend">{{$guest->attending}}</a> 										 	
									    <input type="text" class="{{$guest->id}}attend form-control input-edit-guest" name="attending" value="{{$guest->attending}}">   
										<input type="hidden" name="{{$guest->id}}" value="{{$guest->id}}">
					 				</div>
					 			</td><!-- Due -->
					 			<td>
					 				<a href=""  class="confirm guest_list_icon_trash item_del{{$guest->id}}"><i class="glyphicon glyphicon-trash"></i></a>
					 				<input type="hidden"  name="{{$guest->item}}" value="{{$guest->id}}" >
					 			</td>								
						 		</tr>
						 		<!-- Script thuỷ viết -->
						 		                                											  						     
						 		@endforeach
						 		<tr class="guest_list_item_cat" id="guest_list_item_cat">
						 			<td></td>
						 			<td colspan="7"><a href="" class="guest_list_add{{$group->id}}" style="cursor:pointer;">
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
		<div class="col-md-2" id="guest_summary">
			<h3>Tóm tắt:</h3>
			<p>
				<div>Tổng số khách:</div>
				
				<div>Đã mời:</div>
				
				<div>Chưa mời:</div>
				
		</div>
		
		
	</div> <!-- row -->
</div><!--container-->
@endsection