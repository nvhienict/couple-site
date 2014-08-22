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
		function validateNumber(event) {
		    var key = window.event ? event.keyCode : event.which;
		    if (event.keyCode == 8 || event.keyCode == 46
		     || event.keyCode == 37 || event.keyCode == 39) {
		    	$(this).number(true);
		        return true;
		    }
		    else if ( key < 48 || key > 57 ) {

		        return false;
		    }
		    else{
		     $(this).number(true);
		     return true;

		    } true;
		} 					
		//hàm click ẩn hiện

		function ShowSummary(result){
    		result = $.parseJSON(result);
			var bID = result['budgetID'];
			var cID = result['categoryID'];
			$(".Due" + bID).text(result['budgetDue'].format(0,3,',') + " VND");
			$("#totalEstimate" + cID).text(result['totalEstimate'].format(0,3,',') + " VND");
    		$("#totalCat" + cID).text(result['totalActual'].format(0,3,',') + " VND");
    		$("#totalCatPay" + cID).text(result['totalPay'].format(0,3,',') + " VND");
    		$("#totalCatDue" + cID).text(result['totalDue'].format(0,3,',') + " VND");
    		$("#rowSumExpected").text(result['sumExpected'].format(0,3,',') + " VND");
    		$("#rowSumActual").text(result['sumActual'].format(0,3,',') + " VND");
    		$("#rowSumPay").text(result['sumPay'].format(0,3,',') + " VND");
    		$("#rowSumDue").text(result['sumDue'].format(0,3,',') + " VND");

    		//tom tat
    		$("#ubsThucTe").text(result['sumActual'].format(0,3,',') + " VND");
    		$("#ubsThanhToan").text(result['sumPay'].format(0,3,',') + " VND");
    		$("#ubsConNo").text(result['sumDue'].format(0,3,',') + " VND");
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
					<span style="color: #19b5bc; cursor:pointer; margin-right: 5px;" id="budget_all_item_sign_down"><i class="glyphicon glyphicon-chevron-down"></i></span>
					<span style="color: #19b5bc; cursor:pointer; " id="budget_all_item_sign_up"><i class="glyphicon glyphicon-chevron-up"></i></span>
					<!-- display or hide all items -->
					<script type="text/javascript">
						$('#budget_all_item_sign_down').click(function(){
							$('.budget_item_cat').show();

							$('.down_item_cat').hide();
							$('.up_item_cat').show();
							
						});
						$('#budget_all_item_sign_up').click(function(){
							$('.budget_item_cat').hide();

							$('.down_item_cat').hide();
							$('.up_item_cat').hide();
						});
					</script>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<table class="table-budget">

						<tr class="table-budget-thead-fixed">
							<th><i class="glyphicon glyphicon-th-large"></i></th>
					 		<th style="width:300px;"  >Danh mục</th>
					 		<th style="width:160px;" >Chi phí dự kiến</th>
					 		<th style="width:160px;" >Chi phí thực tế</th>
					 		<th style="width:160px;" >Số tiền thanh toán</th>
					 		<th colspan="2" style="width:140px;" >Số tiền còn nợ</th>
					 	</tr>
					 	<script type="text/javascript">
						 	$(window).scroll(function(){
								if ($(this).scrollTop() > 230) {
							        $('.table-budget-thead-fixed').show();
							    } else {
							        $('.table-budget-thead-fixed').hide();
							    }
							});
						</script>
					 	<thead>
					 		<th><i class="glyphicon glyphicon-th-large"></i></th>
					 		<th>Danh mục</th>
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
					 			<td class="TienVND">
					 				<span  id="totalEstimate{{$category->id}}" >
					 				{{number_format(UserBudget::where('category',$category->id)
					 				->where('user',UserBudgetController::id_user())
					 				->sum('estimate'),0, '.', ',')}} VND
					 				</span>
					 			</td>
					 			<td class="TienVND">
					 				<span  id="totalCat{{$category->id}}" >
					 				{{number_format(UserBudget::where('category',$category->id)
					 				->where('user',UserBudgetController::id_user())
					 				->sum('actual'),0, '.', ',')}} VND
					 				</span>
								</td>
					 			<td class="TienVND">
					 				<span  id="totalCatPay{{$category->id}}" >
					 				{{number_format(UserBudget::where('category',$category->id)
					 				->where('user',UserBudgetController::id_user())
					 				->sum('pay'), 0, '.', ',')}} VND
					 				</span>
					 			</td>
					 			<td class="TienVND">
					 				<span  id="totalCatDue{{$category->id}}" >
					 				{{number_format((UserBudget::where('category',$category->id)
					 				->where('user',UserBudgetController::id_user())
					 				->sum('actual')-UserBudget::where('category',$category->id)
					 				->where('user',UserBudgetController::id_user())
					 				->sum('pay')), 0, '.', ',')}} VND
					 				</span>
					 			</td>
					 			<td>
					 				<span class="up_item_cat" style="color: #19b5bc; cursor:pointer; " id="up{{$category->id}}"><i class="glyphicon glyphicon-chevron-up"></i></span>
					 				<span class="down_item_cat" style="color: #19b5bc; cursor:pointer; display:none"; id="down{{$category->id}}" ><i class="glyphicon glyphicon-chevron-down"></i></span>
					 				<!-- display or hide a item -->
									<script type="text/javascript">

										$('#up{{$category->id}}').click(function(){
											$('#budget_item_cat{{$category->id}}').hide();

											$('#up{{$category->id}}').hide();
											$('#down{{$category->id}}').show();
										});

										$('#down{{$category->id}}').click(function(){
											$('#budget_item_cat{{$category->id}}').show();

											$('#up{{$category->id}}').show();
											$('#down{{$category->id}}').hide();
										});
									</script>
					 			</td>
					 		</tr>
					 		<tbody id="budget_item_cat{{$category->id}}">
					 			@foreach(UserBudget::where("user",UserBudgetController::id_user())->where('category',$category->id)->get() as $budget)
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
									    <input onchange="item_change({{$budget->id}})" ondblclick="item_dblclick({{$budget->id}})" type="text" class="{{$budget->id}}item form-control input-edit-money" name="item" value="{{$budget->item}}">   
										<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
									 </div>
									 <p style="display:none;color:red;" class="item_error{{$budget->id}}">Chi tiêu không được trống</p>
					 			</td>
						 		<td class="TienVND">
					 				<div class="estimate{{$budget->id}}"><!-- Estimate -->
									 <a onclick="estimate_click({{$budget->id}})" class="{{$budget->id}}showEstimate">
                                        {{number_format(($budget->estimate),0, '.', ',')}} VND
									 </a> 
									    <input onkeyup="key_estimate(event,{{$budget->id}})" onchange="estimate_dblclick({{$budget->id}})" ondblclick="estimate_dblclick({{$budget->id}})" type="text" class="{{$budget->id}}InputEstimate form-control input-edit-money" name="estimate" value=" {{number_format(($budget->estimate),0, '.', ',')}}">
										<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
									 </div>
									 <p style="display:none;color:red;" class="estimate_error{{$budget->id}}">Vui lòng nhập số tiền</p>
						 		</td>
						 		<td class="TienVND"><!-- Actual -->
									<div id="edit-money" > 
										<a onclick="actual_click({{$budget->id}})" hreft="" class="{{$budget->id}}_show_hide">
											{{number_format(($budget->actual),0, '.', ',')}} VND
										</a>
										<input onkeyup="key_actual(event,{{$budget->id}})" onchange="actual_dblclick({{$budget->id}})" ondblclick="actual_dblclick({{$budget->id}})" type="text" class="{{$budget->id}}_slidingDiv form-control input-edit-money" id="{{$budget->id}}money" name="money" value="{{number_format(($budget->actual),0, '.', ',')}}">
										<input type="text" hidden name="{{$budget->id}}" value="{{$budget->id}}">
									</div>
									<p style="display:none;color:red;" class="actual_error{{$budget->id}}">Vui lòng nhập số tiền</p>

								</td>
					 			<td class="TienVND">
					 				<div  > 
										<a onclick="pay_click({{$budget->id}})" hreft="" class="{{$budget->id}}Pay" >
											{{number_format(($budget->pay),0, '.', ',')}} VND
										</a>
										<input onkeyup="key_pay(event,{{$budget->id}})" onchange="pay_dblclick({{$budget->id}})" ondblclick="pay_dblclick({{$budget->id}})" type="text" class="{{$budget->id}}Estimate form-control input-edit-money" id="{{$budget->id}}estimate" name="estimate" value="{{number_format(($budget->pay),0, '.', ',')}}">
										<input type="text" hidden name="{{$budget->id}}" value="{{$budget->id}}">
									</div>
									<p style="display:none;color:red;" class="pay_error{{$budget->id}}">Vui lòng nhập số tiền</p>
				 				</td><!-- pay -->
					 			<td class="TienVND">
					 				<div>
						 				<a class="Due{{$budget->id}}"> {{number_format((($budget->actual)-($budget->pay)),0, ',', ' ')}} VND
						 				</a>
					 				</div>
					 			</td><!-- Due -->
					 			<td>
					 				<a href="javascript:void(0);" onclick="item_del({{$budget->id}})" class="confirm budget_icon_trash item_del{{$budget->id}}"><i class="glyphicon glyphicon-trash"></i></a>
					 				<input type="hidden"  name="{{$budget->item}}" value="{{$budget->id}}" >
					 			</td>
									
						 		</tr>
						 		<!-- Script thuỷ viết -->
						 		                                											  						     
						 		@endforeach
						 		<tr class="budget_item_cat" id="budget_item_cat">
						 			<td></td>
						 			<td colspan="7"><a href="javascript:void(0);" onclick="item_add({{$category->id}})" class="item-add{{$category->id}}" style="cursor:pointer;">
											<i class="glyphicon glyphicon-plus"></i>&nbsp Thêm chi tiêu
										</a>
										<input type="hidden" value="{{$category->id}}" name="{{$category->id}}">
									</td>
						 		</tr>
						 	</tbody>
						@endforeach
					 	</tbody>
					 	<tr>
					 		<th><i class="glyphicon glyphicon-gbp"></i></th>
					 		<th>Tổng cộng chi phí</th>
					 		<th class="TienVND" id="rowSumExpected">{{number_format(UserBudget::where('user',UserBudgetController::id_user())->sum('estimate'), 0, '.', ',')}} VND</th>
					 		<th class="TienVND" id="rowSumActual">{{number_format(UserBudget::where('user',UserBudgetController::id_user())->sum('actual'), 0, '.', ',')}} VND</th>
					 		<th class="TienVND" id="rowSumPay">{{number_format(UserBudget::where('user',UserBudgetController::id_user())->sum('pay'), 0, '.', ',')}} VND</th>
					 		<th class="TienVND" id="rowSumDue" colspan="2">{{number_format((UserBudget::where('user',UserBudgetController::id_user())->sum('actual'))-(UserBudget::where('user',UserBudgetController::id_user())->sum('pay')), 0, '.', ',')}} VND</th>
					 	</tr>
					</table>
				</div>
			</div>
		</div> <!-- col-xs-10 -->
		<div class="col-xs-2" id="budget_summary">
			<h3>Tóm tắt:</h3>
			<p>
				<div>Dự kiến</div>
				<strong id="ubsDuKien">{{number_format(UserBudget::where('user',UserBudgetController::id_user())->sum('estimate'), 0, '.', ',')}} VND</strong>
				<div>Thực tế</div>
				<strong id="ubsThucTe">{{number_format(UserBudget::where('user',UserBudgetController::id_user())->sum('actual'), 0, '.', ',')}} VND</strong>
				<div title="Đã thanh toán">Thanh toán</div>
				<strong id="ubsThanhToan">{{number_format(UserBudget::where('user',UserBudgetController::id_user())->sum('pay'), 0, '.', ',')}} VND</strong>
				<div>Còn nợ</div>
				<strong id="ubsConNo"> {{number_format((UserBudget::where('user',UserBudgetController::id_user())->sum('actual')-UserBudget::where('user',UserBudgetController::id_user())->sum('pay')), 0, '.', ',')}} VND</strong>
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
		<script type="text/javascript">
	            //item
				function item_click(id){
					if ($("."+id+"item").val()=="New Item") 
					{
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
						$(".item_error"+id).show();
					} 
					else{
						$("."+id+"show_item").show();
				        $("."+id+"item").hide();
				        $(".item_error"+id).hide();
					};							                            
				};
				function item_change(id){	
				    if ($("."+id+"item").val()=="") {
				    	$("."+id+"item").show();
				    	$(".item_error"+id).show();				    	
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
						$(".item_error"+id).hide();						
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
						if (obj.item_last) {
							$('#budget_item_cat'+obj.item_last).after(obj.html);
						} else{
							$('#cate'+id).after(obj.html);
						};
						$('#budget_item_cat'+obj.item).show();												
						}											
					});
			 	};	
			 	function item_del(id){
									
                                    if(confirm("Bạn chắc chắn muốn xoá chi tiêu này?")){
                                    	$.ajax({
											type: "post",
											url: "{{URL::route('delete')}}",
											data: { 								    
											       id:$(".item_del"+id).next().val()
											},
											success: function(data){
												$("#budget_item_cat"+id).remove();
												     var obj = JSON.parse(data);
				                                   
				                                    $("#totalEstimate"+obj.id_cate).text(obj.sumEstimate_cate.format(0,3,',') + " VND");
				                                    $("#totalEstimate"+obj.id_cate).show();
				                                    $("#totalCat"+obj.id_cate).text(obj.sumActual_cate.format(0,3,',') + " VND");
				                                    $("#totalCat"+obj.id_cate).show();
				                                    $("#totalCatPay"+obj.id_cate).text(obj.sumPay_cate.format(0,3,',') + " VND");
				                                    $("#totalCatPay"+obj.id_cate).show();
				                                    $("#totalCatDue"+obj.id_cate).text(obj.sumDue_cate.format(0,3,',') + " VND");
				                                    $("#totalCatDue"+obj.id_cate).show();
				                                    $("#rowSumExpected").text(obj.re_estimate.format(0,3,',') + " VND");
				                                    $("#rowSumExpected").show(); 
				                                    $("#rowSumActual").text(obj.sumActual.format(0,3,',') + " VND");
				                                    $("#rowSumActual").show();
				                                    $("#rowSumPay").text(obj.sumPay.format(0,3,',') + " VND");
				                                    $("#rowSumPay").show();
				                                    $("#rowSumDue").text(obj.sumDue.format(0,3,',') + " VND");
				                                    $("#rowSumDue").show();
				                                    
				                                    $("#ubsDuKien").text(obj.re_estimate.format(0,3,',') + " VND");
				                                    $("#ubsDuKien").show();
				                                    $("#ubsThucTe").text(obj.sumActual.format(0,3,',') + " VND");
				                                    $("#ubsThucTe").show();
				                                    $("#ubsThanhToan").text(obj.sumPay.format(0,3,',') + " VND");
				                                    $("#ubsThanhToan").show();
				                                    $("#ubsConNo").text(obj.sumDue.format(0,3,',') + " VND");
				                                    $("#ubsConNo").show();




				                                    

				                                    




											}												
											});
                                        return true;
                                    }
                                    else{
                                        return false;
                                    };
                                
								};
			 	//Estimate 
			 	function estimate_click(id){
                    $("."+id+"InputEstimate").show(); 
				    $("."+id+"showEstimate").hide();
			 	};
			 	function estimate_dblclick(id){
			 		if ($("."+id+"InputEstimate").val()=="") {
						$("."+id+"InputEstimate").show();
						$(".estimate_error"+id).show();
					} 
					else
					{
                    $("."+id+"InputEstimate").hide();
			        $.ajax({
		            	type: "POST", url: "{{URL::route('editEstimate')}}",
		            	data: {estimate:$("."+id+"InputEstimate").val().replace(/,/gi,""), id:$("."+id+"InputEstimate").next().val() },
		            	success: function (result) { ShowSummary(result); 
		            	}	
		            	});				        
				        $("."+id+"showEstimate").show();
				        $("."+id+"showEstimate").text(parseInt($("."+id+"InputEstimate").val().replace(/,/gi,"")).format(0, 3, ',') + " VND");
				        $(".estimate_error"+id).hide();
						};							
			 	};
			 	function key_estimate(event,id)
			 	      {  	
		             if(event.which >= 37 && event.which <= 40) return;
		                 $("."+id+"InputEstimate").val(function(index, value) {
						        return value
						            .replace(/\D/g, '')
						            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
						        ;
						    });
			        };
			 	//actual
			 	function actual_click(id){
                    $("."+id+"_slidingDiv").show();
			        $("."+id+"_show_hide").hide();
			 	};
			 	function actual_dblclick(id){
			 		if ($("."+id+"_slidingDiv").val()=="") {
						$("."+id+"_slidingDiv").show();
						$(".actual_error"+id).show();
					} 
					else
					{ 
					$("."+id+"_slidingDiv").hide();
			        $.ajax({
		            	type: "POST", url: "{{URL::route('editActual')}}",
		            	data: {actual:$("."+id+"_slidingDiv").val().replace(/,/gi,""), id:$("."+id+"_slidingDiv").next().val() },
		            	success: function (result) { ShowSummary(result); }	
		             });
			        $("."+id+"_show_hide").show();
			        $("."+id+"_show_hide").text(parseInt($("."+id+"_slidingDiv").val().replace(/,/gi,"")).format(0, 3, ',') + " VND");
			        $(".actual_error"+id).hide();
					};
			 	};
			 	function key_actual(event,id)
			 	      {  	
		             if(event.which >= 37 && event.which <= 40) return;
		                 $("."+id+"_slidingDiv").val(function(index, value) {
						        return value
						            .replace(/\D/g, '')
						            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
						        ;
						    });
			        };	
			 	//pay
			 	function pay_click(id){
			 		$("."+id+"Estimate").show();
			        $("."+id+"Pay").hide();
			 	};
			 	function pay_dblclick(id){
                    if ($("."+id+"Estimate").val()=="") {
	                   $("."+id+"Estimate").show();
	                   $(".pay_error"+id).show();
			    	} 
			    	else{
			    		$("."+id+"Estimate").hide();
			    	$.ajax({
			    		type: "POST", url: "{{URL::route('editPay')}}",
		            	data: {
		            		pay:$("."+id+"Estimate").val().replace(/,/gi,""),
		            		id:$("."+id+"Estimate").next().val()
		            	},
		            	success: function (result) { ShowSummary(result); }
			    	});
					$("."+id+"Pay").show();
					$("."+id+"Pay").text(parseInt($("."+id+"Estimate").val().replace(/,/gi,"")).format(0, 3, ',')+" VND");
					$(".pay_error"+id).hide();
			    	};
				};
				function key_pay(event,id)
	 	      {  	
	             if(event.which >= 37 && event.which <= 40) return;
	                 $("."+id+"Estimate").val(function(index, value) {
					        return value
					            .replace(/\D/g, '')
					            .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
					        ;
					    });
		        };  	 				 				 			     
		</script>
	</div> <!-- row -->
</div><!--container-->
@endsection