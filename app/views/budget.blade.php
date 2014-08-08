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
			 					<tr class="budget_item_cat{{$category->id}}" id="budget_item_cat{{$budget->id}}">
						 			<td><a href="#" class="budget_icon_note"><i class="glyphicon glyphicon-comment"></i></a></td>
						 			<td>
						 				<div>
										 <a  class="{{$budget->id}}_show_hide">{{$budget->item}}</a> 
										 	
										    <input type="text" style="width:150px;display:none;" class="{{$budget->id}}_slidingDiv" name="item" value="{{$budget->item}}">
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
						 				<a href="#" class="budget_icon_trash"><i class="glyphicon glyphicon-trash"></i></a>
						 			</td>
						 		</tr>
                                             <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript">
																</script> 
																<script type="text/javascript">
																 $(document).ready(function(){ 
																	$(".{{$budget->id}}_slidingDiv").hide(); 
																	$(".{{$budget->id}}_show_hide").show();

																	 $('.{{$budget->id}}_show_hide').click(function(){
																	 $(".{{$budget->id}}_slidingDiv").show(); 
																	$(".{{$budget->id}}_show_hide").hide(); }); 

																	$('.{{$budget->id}}_slidingDiv').dblclick(function(){
																	 $(".{{$budget->id}}_slidingDiv").hide(); 
																	$(".{{$budget->id}}_show_hide").show();
																	 });
																	$(".{{$budget->id}}_slidingDiv1").hide(); 
																	$(".{{$budget->id}}_show_hide1").show();

																	 $('.{{$budget->id}}_show_hide1').click(function(){
																	 $(".{{$budget->id}}_slidingDiv1").show(); 
																	$(".{{$budget->id}}_show_hide1").hide(); }); 

																	$('.{{$budget->id}}_slidingDiv1').dblclick(function(){
																	 $(".{{$budget->id}}_slidingDiv1").hide(); 
																	$(".{{$budget->id}}_show_hide1").show();
																	 });
																	$(".{{$budget->id}}_slidingDiv2").hide(); 
																	$(".{{$budget->id}}_show_hide2").show();

																	 $('.{{$budget->id}}_show_hide2').click(function(){
																	 $(".{{$budget->id}}_slidingDiv2").show(); 
																	$(".{{$budget->id}}_show_hide2").hide(); }); 

																	$('.{{$budget->id}}_slidingDiv2').dblclick(function(){
																	 $(".{{$budget->id}}_slidingDiv2").hide(); 
																	$(".{{$budget->id}}_show_hide2").show();
																	 });



																 });
											  </script>
											  <script type="text/javascript">
											  	function cl(the_i_BudetId){
													$("."+the_i_BudetId+"_slidingDiv").show(); 
													$("."+the_i_BudetId+"_show_hide").hide();
												};
												function db(the_i_BudetId)
												{
													$("."+the_i_BudetId+"_slidingDiv").hide(); 
													$("."+the_i_BudetId+"_show_hide").show();

												};

												function v_fChange(obj){
													$.ajax({
														type: "post",
														url: "{{URL::route('update')}}",
														data: {item:obj.value,
																id:obj.id
														}
														
														});
												$("."+obj.id+"_show_hide").text(obj.value);
												$(obj).hide();
												$("."+obj.id+"_show_hide").show();

												};
												
												function cl1(the_i_BudetId){
													$("."+the_i_BudetId+"_slidingDiv1").show(); 
													$("."+the_i_BudetId+"_show_hide1").hide();
												};
												function db1(the_i_BudetId)
												{
													$("."+the_i_BudetId+"_slidingDiv1").hide(); 
													$("."+the_i_BudetId+"_show_hide1").show();
												};
												function v_fChange1(obj){
													$.ajax({
														type: "post",
														url: "{{URL::route('update1')}}",
														data: {estimate:obj.value,
																id:obj.id
														}
														
														});
												$("."+obj.id+"_show_hide1").text(obj.value);
												$(obj).hide();
												$("."+obj.id+"_show_hide1").show();

												};
												
												function cl2(the_i_BudetId){
													$("."+the_i_BudetId+"_slidingDiv2").show(); 
													$("."+the_i_BudetId+"_show_hide2").hide();
												};
												function db2(the_i_BudetId)
												{
													$("."+the_i_BudetId+"_slidingDiv2").hide(); 
													$("."+the_i_BudetId+"_show_hide2").show();
												};
												function v_fChange2(obj){
													$.ajax({
														type: "post",
														url: "{{URL::route('update2')}}",
														data: {actual:obj.value,
																id:obj.id
														}
														
														});
												$("."+obj.id+"_show_hide2").text(obj.value);
												$(obj).hide();
												$("."+obj.id+"_show_hide2").show();

												};

											  </script>
											   <script type="text/javascript">
														        
														        	$(".{{$budget->id}}_slidingDiv").change(function(){
														        		//$("#item{{$budget->id}}").submit();
																		$.ajax({
																		type: "post",
																		url: "{{URL::route('update')}}",
																		data: {item:$(this).val(),
																				id:$(this).next().val()
																		}
																		
																		});
																		$(".{{$budget->id}}_show_hide").text($(this).val());
																		$(this).hide();
																		$(".{{$budget->id}}_show_hide").show();
														        	});
														        	$(".{{$budget->id}}_slidingDiv1").change(function(){
														        		//$("#item{{$budget->id}}").submit();
																		$.ajax({
																		type: "post",
																		url: "{{URL::route('update1')}}",
																		data: {estimate:$(this).val(),
																				id:$(this).next().val()
																		}
																		
																		});
																		$(".{{$budget->id}}_show_hide1").text($(this).val());
																		$(this).hide();
																		$(".{{$budget->id}}_show_hide1").show();
														        	});
														        	$(".{{$budget->id}}_slidingDiv2").change(function(){
														        		//$("#item{{$budget->id}}").submit();
																		$.ajax({
																		type: "post",
																		url: "{{URL::route('update2')}}",
																		data: {actual:$(this).val(),
																				id:$(this).next().val()
																		}
																		
																		});
																		$(".{{$budget->id}}_show_hide2").text($(this).val());
																		$(this).hide();
																		$(".{{$budget->id}}_show_hide2").show();
														        	});
														        
											     </script>

						 		@endforeach
						 		<tr class="budget_item_cat{{$category->id}}" id="budget_item_cat">
						 			<td></td>
						 			<td colspan="7"><a id="add_item{{$category->id}}" style="cursor:pointer;">
											<i class="glyphicon glyphicon-plus"></i>&nbsp Thêm chi tiêu
										</a>
										<input type="hidden" value="{{$category->id}}" name="{{$category->id}}">
									</td>
						 		</tr>

						 		     <script type="text/javascript">
										 		           $("#add_item{{$category->id}}").click(function(){
										 		           	$.ajax({
																		type: "post",
																		url: "{{URL::route('create')}}",
																		data: {
																				id:$(this).next().val()

																		},
																		success: function(data){
																			var obj = JSON.parse(data);
																			jQuery('#cate'+obj.catid).after(obj.html);
																				
																		}
																		

																	});
										 		           	  });

										</script>

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