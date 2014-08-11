@extends('main')
@section('title')
Budget
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-10">
			<div class="row">
				<div class="col-xs-10"><h1>Quản lý ngân sách</h1></div>
				<div class="col-xs-2">
					<a class="btn btn-warning" href="{{URL::route('reset-budget')}}">
					Số tiền khác</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<a href="#" style="cursor:pointer;">
						<i class="fa fa-print"></i>&nbsp In báo cáo
					</a>
				</div>
				<div class="col-xs-8" align="right">
					<a href="#" style="margin-right: 5px;" id="budget_all_item_sign_up"><i class="glyphicon glyphicon-chevron-down"></i></a>
					<a href="#" id="budget_all_item_sign_down"><i class="glyphicon glyphicon-chevron-up"></i></a>
					<!-- display or hide all items -->
					<script type="text/javascript">
						$('#budget_all_item_sign_up').click(function(){
							$('#budget_item_cat').show();
							
						});
						$('#budget_all_item_sign_down').click(function(){
							$('#budget_item_cat').hide();
						});
					</script>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<table class="table-budget">
					 	<thead>
					 		<th colspan="2">Danh mục</th>
					 		<th>Chi phí dự kiến</th>
					 		<th>Chi phí thực tế</th>
					 		<th>Số tiền thanh toán</th>
					 		<th colspan="2">Số tiền còn nợ</th>
					 	</thead>
					 	<tbody>
					 	@foreach(Category::get() as $key=>$category)
					 		<tr class="budget_cat" id="cate{{$category->id}}">
					 			<td><i class="glyphicon glyphicon-hand-right" id="budget_category_icon"></i></td>
					 			<td><strong>{{$category->name}}</strong></td>
					 			<td>
					 			@if(BudgetController::rangeBudget(User::find(Cookie::get('id-user'))->budget)==1)
					 				{{number_format((User::find(Cookie::get('id-user'))->budget*$category->range1)*1000000, 0, ',', ' ')}}
					 			@elseif(BudgetController::rangeBudget(User::find(Cookie::get('id-user'))->budget)==2)
					 			{{number_format((User::find(Cookie::get('id-user'))->budget*$category->range2)*1000000, 0, ',', ' ')}}
					 			@elseif(BudgetController::rangeBudget(User::find(Cookie::get('id-user'))->budget)==3)
					 			{{number_format((User::find(Cookie::get('id-user'))->budget*$category->range3)*1000000, 0, ',', ' ')}}
					 			@endif
					 			  VND</td>
					 			<td>0 VND</td>
					 			<td>0 VND</td>
					 			<td>0 VND</td>
					 			<td>
					 				<a href="#" class="budget_item_sign_up{{$category->id}}"><i class="glyphicon glyphicon-chevron-up"></i></a>
					 				<a href="#" class="budget_item_sign_down{{$category->id}}" style="display:none;"><i class="glyphicon glyphicon-chevron-down"></i></a>
					 				<!-- display or hide a item -->
									<script type="text/javascript">
										$('.budget_item_sign_up{{$category->id}}').click(function(){
											$('.budget_item_cat{{$category->id}}').hide();
											$('.budget_item_sign_up{{$category->id}}').hide();
											$('.budget_item_sign_down{{$category->id}}').show();
											
										});
										$('.budget_item_sign_down{{$category->id}}').click(function(){
											$('.budget_item_cat{{$category->id}}').show();
											$('.budget_item_sign_up{{$category->id}}').show();
											$('.budget_item_sign_down{{$category->id}}').hide();
											
										});
									</script>
					 			</td>
					 		</tr>
					 			@foreach(UserBudget::where("user",Cookie::get("id-user"))->where('category',$category->id)->get() as $budget)
			 					<tr class="budget_item_cat" id="budget_item_cat{{$budget->id}}">
						 			<td><a href="#" class="budget_icon_note"><i class="glyphicon glyphicon-comment"></i></a></td>
						 			<td>
						 				<div>
										 <a  onclick="item_click({{$budget->id}})" class="{{$budget->id}}_show_hide">{{$budget->item}}</a> 										 	
										    <input onchange="item_change({{$budget->id}})" ondblclick="item_dblclick({{$budget->id}})" type="text" style="width:150px;display:none;" class="{{$budget->id}}_slidingDiv" name="item" value="{{$budget->item}}">   
											<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
										 </div>
						 			</td>
						 			<td>
						 				<div>
										 <a  class="{{$budget->id}}_show_hide1">
                                                 @if(BudgetController::rangeBudget(User::find(Cookie::get('id-user'))->budget)==1)
							 				{{number_format((User::find(Cookie::get('id-user'))->budget*$category->range1*$budget->range)*1000000, 0, ',', ' ')}}
							 			@elseif(BudgetController::rangeBudget(User::find(Cookie::get('id-user'))->budget)==2)
							 			{{number_format((User::find(Cookie::get('id-user'))->budget*$category->range2*$budget->range)*1000000, 0, ',', ' ')}}
							 			@elseif(BudgetController::rangeBudget(User::find(Cookie::get('id-user'))->budget)==3)
							 			{{number_format((User::find(Cookie::get('id-user'))->budget*$category->range3*$budget->range)*1000000, 0, ',', ' ')}}
							 			@endif
										 </a> 
										 	
										    <input type="text" style="width:150px;display:none;" class="{{$budget->id}}_slidingDiv1" name="estimate" value="{{$budget->estimate}}">
											<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
										 </div>
						 				
						 			</td>
						 			<td>
						 				<div>
										 <a  class="{{$budget->id}}_show_hide2">{{$budget->estimate}}</a> 
										 	
										    <input type="text" style="width:150px;display:none;" class="{{$budget->id}}_slidingDiv2" name="actual" value="{{$budget->actual}}">
											<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
										 </div>
						 			</td>
						 			<td>0 VND</td>
						 			<td>{{(($budget->actual)-($budget->pay))}} VND</td>
						 			<td>
						 				<a href="#" data-toggle="modal" data-target="#myModalDeleteItemBudget{{$budget->id}}" class="budget_icon_trash"><i class="glyphicon glyphicon-trash"></i></a>
						 				     <input type="hidden" id="{{$budget->id}}" name="{{$budget->id}}" value="{{$budget->id}}" >
						 			</td>
						 		  <!-- Modal Delete -->
										<div class="modal fade" id="myModalDeleteItemBudget{{$budget->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
										    <div class="modal-content">
										      <div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
										        <h3 class="modal-title" id="myModalLabel">Delete Item</h3>
										      </div>
										      <div class="modal-body">
										      	Bạn muốn xóa {{$budget->item}}
										      	<div><input type="radio" name="select_radio" value="" ><span>Chia đều cho các sự kiện khác </span></div>
										      	<div><input type="radio" name="select_radio" value="" ><span>Cộng vào sư kiện </span></div>
										      	<div>
										      		<div>Chọn các sự kiện cần thêm vào</div>
										      		<div style="border:1px solid black;height:200px;width:500px;overflow:scroll;">										      					                                                       
		                                       	     @foreach(Category::get() as $select_category)
	                                                <div style="margin-left:30px;border-top: 1px solid black;">
	                                                	<input type="checkbox" name="select_cat" value="{{$select_category->id}}"><span>{{$select_category->name}}</span><br>
	                                                	@foreach(UserBudget::get() as $select_item)
	                                                	   <div style="display:none;margin-left:40px;border-top: 1px solid black;">	                                                	   	 
	                                                	   </div>
	                                                	@endforeach()
	                                                </div>
		                                       	     @endforeach                                                                      												      			
										      		</div>
										      	</div>
										      </div>
										      <div class="modal-footer">
										      	<a  class="select_item{{$budget->id}} btn btn-primary" href="">OK</a>
										      	<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
										        <a style="cursor:pointer;" data-dismiss="modal">Cancel</a>
										      </div>
										    </div>
										  </div>
										  <script type="text/javascript">
		                                     $(".select_item{{$budget->id}}").click(function(){
		                                     	$.ajax({
													type: "post",
													url: "{{URL::route('delete')}}",
													data: {
													       id:$(this).next().val()
														}															
												     });
		                                         });
										  </script>
										</div>
								<!-- end modal delete -->
						 		</tr>                                            											  						     
						 		@endforeach
						 		<tr class="budget_item_cat{{$category->id}}" id="budget_item_cat">
						 			<td></td>
						 			<td colspan="7"><a onclick="item_add({{$category->id}})" class="item-add{{$category->id}}" style="cursor:pointer;">
											<i class="glyphicon glyphicon-plus"></i>&nbsp Thêm chi tiêu
										</a>
										<input type="hidden" value="{{$category->id}}" name="{{$category->id}}">
									</td>
						 		</tr>
						@endforeach
					 	</tbody>
					 	<thead>
					 		<th colspan="2">Tổng cộng chi phí</th>
					 		<th>{{number_format((User::find(Cookie::get('id-user'))->budget)*1000000, 2, ',', ' ')}}</th>
					 		<th>1.000.000 VND</th>
					 		<th>1.000.000 VND</th>
					 		<th colspan="2">1.000.000 VND</th>
					 	</thead>
					</table>
				</div>
			</div>
		</div> <!-- col-xs-10 -->
		<script type="text/javascript">
				function item_click(id){
					if ($("."+id+"_slidingDiv").val()=="New Item") {
						$("."+id+"_show_hide").hide();
						$("."+id+"_slidingDiv").val("");
						$("."+id+"_slidingDiv").show();
					} 
					else{
						$("."+id+"_show_hide").hide();
						$("."+id+"_slidingDiv").show();
					};
					};																										
				function item_dblclick(id){
					if ($("."+id+"_slidingDiv").val()=="") {
						$("."+id+"_slidingDiv").show();
					} 
					else{
						$("."+id+"_show_hide").show();
				        $("."+id+"_slidingDiv").hide();
					};							                            
				};
				function item_change(id){	
				    if ($("."+id+"_slidingDiv").val()=="") {
				    	$("."+id+"_slidingDiv").show();
				    	$(".item_error"+id+"").show();
				    }
				     else{
				     	$.ajax({
							type: "post",
							url: "{{URL::route('update')}}",
							data: {
							item:$("."+id+"_slidingDiv").val(),	
							id:$("."+id+"_slidingDiv").next().val()
							}							
							});
				     	$("."+id+"_show_hide").text($("."+id+"_slidingDiv").val())	;
						$("."+id+"_slidingDiv").hide();
						$("."+id+"_show_hide").show();
						$(".item_error"+id+"").hide();

				     };																    
				};		
				function item_add(id){
			 			$.ajax({
							type: "post",
							url: "{{URL::route('create')}}",
							data: {
							id:$(".item-add"+id).next().val()
							},
							success: function(data){
							var obj = JSON.parse(data);
							jQuery('#budget_item_cat'+obj.item_last).after(obj.html);													
							}											
						});
			 	};		
		</script>
		<div class="col-xs-2" id="budget_summary">
			<h3>Tóm tắt:</h3>
			<p>
				<strong>{{number_format((User::find(Cookie::get('id-user'))->budget)*1000000, 2, ',', ' ')}} VN</strong> dự kiến<br />
				<strong>0 VND</strong> thực tế<br />
				<strong>0 VND</strong> đặt cọc<br />
				<strong>0 VND</strong> còn nợ
			</p>
		</div>
		<div class="budget_vendor">
			{{'<img width="195px" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',1)->get()->first()->avatar) . '" />'}}
			<span style="color: #68ceee">{{Vendor::where('id',1)->get()->first()->name}}</span>
		</div>
		<div class="budget_vendor">
			{{'<img width="195px" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',3)->get()->first()->avatar) . '" />'}}
			<span style="color: #68ceee">{{Vendor::where('id',3)->get()->first()->name}}</span>
		</div>


	</div> <!-- row -->
</div><!--container-->
@endsection