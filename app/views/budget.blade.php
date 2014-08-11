@extends('main')
@section('title')
Budget
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container">
	<script type="text/javascript"> 
		Number.prototype.format = function(n, x, s, c) {
		    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
		        num = this.toFixed(Math.max(0, ~~n));
		    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
		};

		//Register jQuery Event 'OnEnter'
		(function ($) {
		  $.fn.onEnter = function (func) {
		    this.bind('keypress', function (e) {
		      if (e.keyCode == 13) func.apply(this, [e]);
		    });
		    return this;
		  };
		})(jQuery);

		function ShowSummary(result){
    		result = $.parseJSON(result);
			var bID = result['budgetID'];
			var cID = result['categoryID'];
			$(".Due" + bID).text(result['budgetDue'].format(0,3,' ') + " VND");
    		$("#totalCat" + cID).text(result['totalActual'].format(0,3,' ') + " VND");
    		$("#totalCatPay" + cID).text(result['totalPay'].format(0,3,' ') + " VND");
    		$("#totalCatDue" + cID).text(result['totalDue'].format(0,3,' ') + " VND");
    		//$("#rowSumExpected").text(result['sumExpected'].format(0,3,' ') + " VND");
    		$("#rowSumActual").text(result['sumActual'].format(0,3,' ') + " VND");
    		$("#rowSumPay").text(result['sumPay'].format(0,3,' ') + " VND");
    		$("#rowSumDue").text(result['sumDue'].format(0,3,' ') + " VND");

    		//tom tat
    		$("#ubsThucTe").text(result['sumActual'].format(0,3,' ') + " VND");
    		$("#ubsThanhToan").text(result['sumPay'].format(0,3,' ') + " VND");
    		$("#ubsConNo").text(result['sumDue'].format(0,3,' ') + " VND");
		} 		
	</script>
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
					 			<td class="TienVND">
					 				<span  id="totalCat{{$category->id}}" >
					 				{{number_format(UserBudget::where('category',$category->id)
					 				->where('user',User::find(Cookie::get('id-user'))->id)
					 				->sum('actual'), 0, ',', ' ')}} VND
					 				</span>
								</td>
					 			<td class="TienVND">
					 				<span  id="totalCatPay{{$category->id}}" >
					 				{{number_format(UserBudget::where('category',$category->id)
					 				->where('user',User::find(Cookie::get('id-user'))->id)
					 				->sum('pay'), 0, ',', ' ')}} VND
					 				</span>
					 			</td>
					 			<td class="TienVND">
					 				<span  id="totalCatDue{{$category->id}}" >
					 				{{number_format((UserBudget::where('category',$category->id)
					 				->where('user',User::find(Cookie::get('id-user'))->id)
					 				->sum('actual')-UserBudget::where('category',$category->id)
					 				->where('user',User::find(Cookie::get('id-user'))->id)
					 				->sum('pay')), 0, ',', ' ')}} VND
					 				</span>
					 			</td>
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
						 			<td>
					 				@if(!empty($budget->note))
					 				<a href="#" class="budget_icon_notes" data-toggle="modal"  data-target="#{{$budget->id}}" >
						 				<i class="glyphicon glyphicon-comment"></i>
					 				</a>
					 				@else
					 				<a href="#" class="budget_icon_note" data-toggle="modal"  data-target="#{{$budget->id}}" >
						 				<i class="glyphicon glyphicon-comment"></i>
					 				</a>
					 				@endif
					 				<div class="modal fade" id="{{$budget->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									        <h4 class="modal-title" id="myModalLabel">Notes</h4>
									      </div>
									      <form action="{{Asset('notes')}}" method="post">
									      <div class="modal-body">
									        <div class="form-group">
									          <div class="row">
									          	
									            <div class="col-md-2">
									          	 <label for="note" class="control-label" >Notes</label>
									            </div>
									            <div class="col-md-10">
									            	<input type="text" hidden name='id' value="{{$budget->id}}">
									          	<textarea id="note" name="note" rows="8" cols="35" class="form-control note" >{{$budget->note}}</textarea>
									            </div>
									            
									          </div>
									        </div>
									      </div>
									      <div class="modal-footer">
									        <button type="submit" class="btn btn-primary">Lưu Note</button>
									        <a href=""> Huỷ </a>
									      </div>
									  </form>
									    </div>
									  </div>
									</div>
								</td>
					 			<td>
					 				<div>
									 <a  onclick="item_click({{$budget->id}})" class="{{$budget->id}}show_item">{{$budget->item}}</a> 										 	
									    <input onchange="item_change({{$budget->id}})" ondblclick="item_dblclick({{$budget->id}})" type="text" style="width:150px;display:none;" class="{{$budget->id}}item" name="item" value="{{$budget->item}}">   
										<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
									 </div>
					 			</td>
						 			<td>
						 				<div><!-- Estimate -->
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
						 			<td class="TienVND"><!-- Actual -->
										<div id="edit-money" > 
											<a hreft="" class="{{$budget->id}}_show_hide">
												{{number_format(($budget->actual),0, ',', ' ')}} VND
											</a>
											<input type="number" class="{{$budget->id}}_slidingDiv form-control input-edit-money" id="{{$budget->id}}money" name="money" value="{{$budget->actual}}">
											<input type="text" hidden name="{{$budget->id}}" value="{{$budget->id}}">
										</div>
									</td>
						 			<td class="TienVND">
						 				<div  > 
											<a hreft="" class="{{$budget->id}}Pay" >
												{{number_format(($budget->pay),0, ',', ' ')}} VND
											</a>
											<input type="number" class="{{$budget->id}}Estimate form-control input-edit-money" id="{{$budget->id}}estimate" name="estimate" value="{{$budget->pay}}">
											<input type="text" hidden name="{{$budget->id}}" value="{{$budget->id}}">
										</div>
					 				</td><!-- pay -->
						 			<td class="Due{{$budget->id}} TienVND">{{number_format((($budget->actual)-($budget->pay)),0, ',', ' ')}} VND</td><!-- Due -->
						 			<td><!-- Delete -->
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
						 		<!-- Script thuỷ viết -->
						 		<script type="text/javascript">
								$(document).ready(function(){ 
								    $(".{{$budget->id}}_slidingDiv").hide(); 
								    $(".{{$budget->id}}_show_hide").show(); 
								    //estimate
								    $(".{{$budget->id}}Estimate").hide(); 
								    $(".{{$budget->id}}Pay").show(); 
								    $('.{{$budget->id}}Pay').click(function(){ 
								        $(".{{$budget->id}}Estimate").show();
								        $(".{{$budget->id}}Pay").hide();
								    });
								    $('.{{$budget->id}}_show_hide').click(function(){ 
								        $(".{{$budget->id}}_slidingDiv").show();
								        $(".{{$budget->id}}_show_hide").hide();
								    });
								    $('.{{$budget->id}}Estimate')
								    	.dblclick(function(){saveEstimate($(this));})
								    	.onEnter(function(){saveEstimate($(this));
						           	});
								    $('.{{$budget->id}}_slidingDiv')
									    .dblclick(function(){ SaveExpense($(this)); })
							           	.onEnter(function(){ SaveExpense($(this));
									});
							        
								    function saveEstimate(estimate){
								    	$('.{{$budget->id}}Estimate').hide();
								    	$.ajax({
								    		type: "POST", url: "{{URL::route('editPay')}}",
							            	data: {
							            		pay:$(estimate).val(),
							            		id:$(estimate).next().val()
							            	},
							            	success: function (result) { ShowSummary(result); }
								    	});
										$(".{{$budget->id}}Pay").show();
										$('.{{$budget->id}}Pay').text(parseInt($(estimate).val()).format(0, 3, ' ')+" VND");
									}

									function SaveExpense(textbox){
										$(".{{$budget->id}}_slidingDiv").hide();
								        $.ajax({
							            	type: "POST", url: "{{URL::route('editActual')}}",
							            	data: {actual:$(textbox).val(), id:$(textbox).next().val() },
							            	success: function (result) { ShowSummary(result); }	
							             });
								        $(".{{$budget->id}}_show_hide").show();
								        $(".{{$budget->id}}_show_hide").text(parseInt($(textbox).val()).format(0, 3, ' ') + " VND");
									}
								 }); 	
							</script>                                            											  						     
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
					 		<th class="TienVND" id="rowSumExpected">{{number_format((User::find(Cookie::get('id-user'))->budget)*1000000, 2, ',', ' ')}}</th>
					 		<th class="TienVND" id="rowSumActual">{{number_format(UserBudget::where('user',User::find(Cookie::get('id-user'))->id)->sum('actual'), 0, ',', ' ')}}</th>
					 		<th class="TienVND" id="rowSumPay">{{number_format(UserBudget::where('user',User::find(Cookie::get('id-user'))->id)->sum('pay'), 0, ',', ' ')}}</th>
					 		<th class="TienVND" id="rowSumDue" colspan="2">1.000.000 VND</th>
					 	</thead>
					</table>
				</div>
			</div>
		</div> <!-- col-xs-10 -->
		<script type="text/javascript">
				function item_click(id){
					if ($("."+id+"item").val()=="New Item") {
						$("."+id+"show_item").hide();
						$("."+id+"item").val("");
						$("."+id+"item").show();
					} 
					else{
						$("."+id+"show_item").hide();
						$("."+id+"item").show();
					};
					};																										
				function item_dblclick(id){
					if ($("."+id+"item").val()=="") {
						$("."+id+"item").show();
					} 
					else{
						$("."+id+"show_item").show();
				        $("."+id+"item").hide();
					};							                            
				};
				function item_change(id){	
				    if ($("."+id+"item").val()=="") {
				    	$("."+id+"item").show();
				    	$(".item_error"+id+"").show();
				    }
				     else{
				     	$.ajax({
							type: "post",
							url: "{{URL::route('update')}}",
							data: {
							item:$("."+id+"item").val(),	
							id:$("."+id+"item").next().val()
							}							
							});
				     	$("."+id+"show_item").text($("."+id+"item").val())	;
						$("."+id+"item").hide();
						$("."+id+"show_item").show();
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
				<div>Dự kiến</div>
				<strong id="ubsDuKien">{{number_format((User::find(Cookie::get('id-user'))->budget)*1000000, 0, ',', ' ')}} VND</strong>
				<div>Thực tế</div>
				<strong id="ubsThucTe">{{number_format(UserBudget::where('user',User::find(Cookie::get('id-user'))->id)->sum('actual'), 0, ',', ' ')}} VND</strong>
				<div title="Đã thanh toán">Thanh toán</div>
				<strong id="ubsThanhToan">{{number_format(UserBudget::where('user',User::find(Cookie::get('id-user'))->id)->sum('pay'), 0, ',', ' ')}} VND</strong>
				<div>Còn nợ</div>
				<strong id="ubsConNo"> {{number_format((UserBudget::where('user',User::find(Cookie::get('id-user'))->id)->sum('actual')-UserBudget::where('user',User::find(Cookie::get('id-user'))->id)->sum('pay')), 0, ',', ' ')}} VND</strong>
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