
@extends('main-dashboard')
@section('title')
Quản lý ngân sách | thuna.vn
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
			      	<li><a href="{{URL::route('guest-list')}}" title="Danh sách khác mời">
			      			Danh sách khách mời
	 		      		</a>
			      	</li>
			      	<li class="active"><a href="{{URL::route('budget')}}" title="Quăn lí ngân sách">
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

<script src="{{Asset("assets/js/budget-top.js")}}"></script>

	<div class="row" style="margin-left:0">
		<div class="col-xs-12">
			<div class="row" style="margin-right:0;">
				<div class="col-lg-10 col-sm-10 col-xs-12"><h2 class="title-budget" style="color:#E75292;">Quản lý ngân sách</h2></div>
				<div class="col-lg-2 col-sm-2 col-xs-12">
					<a class="btn btn-warning" href="{{URL::route('reset-budget')}}" style="padding: 3px 5px;">
					Số tiền khác</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<a href="{{URL::route('exportfile')}}" class="btn btn-warning">
						<i class="fa fa-print"></i>&nbsp Xuất file
					</a>
				</div>
				<div class="col-xs-8" align="right">
					<span style="color: #19b5bc; cursor:pointer; margin-right: 5px;" id="budget_all_item_sign_down"><i class="glyphicon glyphicon-chevron-down"></i></span>
					<span style="color: #19b5bc; cursor:pointer; " id="budget_all_item_sign_up"><i class="glyphicon glyphicon-chevron-up"></i></span>
					<!-- display or hide all items -->
					<script type="text/javascript">
						$('#budget_all_item_sign_down').click(function(){
							$('.budget_item_show_cat').show();

							$('.down_item_cat').hide();
							$('.up_item_cat').show();
							
						});
						$('#budget_all_item_sign_up').click(function(){
							$('.budget_item_show_cat').hide();

							$('.down_item_cat').show();
							$('.up_item_cat').hide();
						});
					</script>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<table class="table table-hover table-budget">

						<tr class="table-budget-thead-fixed hidden-sm hidden-xs">
							<th style="width:5.1%;"><i class="glyphicon glyphicon-th-large"></i></th>
					 		<th style="width:22.1%;">Danh mục</th>
							<th style="width:19.2%;">Chi phí dự kiến</th>
							<th style="width:17.2%">Chi phí thực tế</th>
							<th style="width:24.55%">Số tiền thanh toán</th>
					 		<th colspan="2">Số tiền còn nợ</th>
					 	</tr>
					 	
					 	<script type="text/javascript">
						 	$(window).scroll(function(){
								if ($(this).scrollTop() > 600) {
							        $('.table-budget-thead-fixed').show();
							    } else {
							        $('.table-budget-thead-fixed').hide();
							    }
							});
						</script>
					 	<thead class="thead-budget">
					 		<th><i class="glyphicon glyphicon-th-large"></i></th>
					 		<th>Danh mục</th>
					 		<th>Chi phí dự kiến</th>
					 		<th>Chi phí thực tế</th>
					 		<th>Số tiền thanh toán</th>
					 		<th colspan="2">Số tiền còn nợ</th>
					 	</thead>

					 	<tbody>
					 	@if((Category::get()))
					 	@foreach(Category::get() as $key=>$category)
					 		<tr class="budget_cat" id="cate{{$category->id}}">
					 			<td class="budget-column-icon" style="background-image:url({{Asset("icon/cat/{$category->images}")}})"></td>
					 			<td><a style="color:#555555;" href="javascript:void(0);" onclick="show_hide({{$category->id}})"><strong>{{$category->name}}</strong></a></td>
					 			<td class="TienVND">
					 				<span  id="totalEstimate{{$category->id}}" >
					 				{{UserBudgetController::getDisplayMoney( $category->id, 'estimate' )}}&nbspVND
					 				</span>
					 			</td>
					 			<td class="TienVND">
					 				<span  id="totalCat{{$category->id}}" >
					 				{{UserBudgetController::getDisplayMoney( $category->id, 'actual' )}}&nbspVND
					 				</span>
								</td>
					 			<td class="TienVND">
					 				<span  id="totalCatPay{{$category->id}}" >
					 				{{UserBudgetController::getDisplayMoney( $category->id, 'pay' )}}&nbspVND
					 				</span>
					 			</td>
					 			<td class="TienVND">
					 				<span  id="totalCatDue{{$category->id}}" >
					 				{{UserBudgetController::getDisplayMoney( $category->id, 'actual' )
					 				-
					 				UserBudgetController::getDisplayMoney( $category->id, 'pay' )}}
									&nbspVND
					 				</span>
					 			</td>
					 			<td>
					 				<span class="up_item_cat" style="color: #19b5bc; cursor:pointer; " id="up{{$category->id}}"><i class="glyphicon glyphicon-chevron-up"></i></span>
					 				<span class="down_item_cat" style="color: #19b5bc; cursor:pointer; display:none"; id="down{{$category->id}}" ><i class="glyphicon glyphicon-chevron-down"></i></span>
					 				<!-- display or hide a item -->
									<script type="text/javascript">

										$('#up{{$category->id}}').click(function(){
											$('.budget_item_show_cat{{$category->id}}').hide();

											$('#up{{$category->id}}').hide();
											$('#down{{$category->id}}').show();
										});

										$('#down{{$category->id}}').click(function(){
											$('.budget_item_show_cat{{$category->id}}').show();

											$('#up{{$category->id}}').show();
											$('#down{{$category->id}}').hide();
										});

										function show_hide(id)
										{
											if($('.budget_item_show_cat'+id).is(':visible') )
											{
												$('.budget_item_show_cat'+id).hide();
												$('#up'+id).hide();
												$('#down'+id).show();
											}
											else
											{
												$('.budget_item_show_cat'+id).show();
												$('#up'+id).show();
												$('#down'+id).hide();
											}
										}
									</script>
					 			</td>
					 		</tr>
					 		<tbody class="budget_item_show_cat{{$category->id}} budget_item_show_cat">
					 		@if((UserBudget::where("user",UserBudgetController::id_user())->where('category',$category->id)->get()))
					 			@foreach(UserBudget::where("user",UserBudgetController::id_user())->where('category',$category->id)->get() as $budget)
			 					<tr class="budget_item_cat" id="budget_item_cat{{$budget->id}}">
						 			<td>
					 				@if(!empty($budget->note))
					 				<a href="#" class="budget_icon_notes" data-toggle="modal"  data-target="#{{$budget->id}}" data-backdrop="static" >
						 				<i class="glyphicon glyphicon-comment"></i>
					 				</a>
					 				@else
					 				<a href="#" class="budget_icon_note" data-toggle="modal"  data-target="#{{$budget->id}}" data-backdrop="static" >
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
									          	<textarea id="note" name="note"style="height=100%;resize: none;" rows="8" cols="35" class="form-control note" >{{$budget->note}}</textarea>

									            </div>
									            
									          </div>
									        </div>
									      </div>
									      <div class="modal-footer">
									        <button type="submit" class="btn btn-primary">Lưu Note</button>
									        <button type="submit" class="btn btn-primary">Huỷ </button>
									       
									      </div>
									  </form>
									    </div>
									  </div>
									</div>
								</td>
					 			<td>
					 				<div>
									 <a  onclick="item_click({{$budget->id}})" class="{{$budget->id}}show_item">{{$budget->item}}</a> 										 	
									    <input onblur="item_change({{$budget->id}})" ondblclick="item_dblclick({{$budget->id}})" type="text" class="{{$budget->id}}item form-control input-edit-money" name="item" value="{{$budget->item}}">   
										<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
									 </div>
									 <p style="display:none;color:red;" class="item_error{{$budget->id}}">Chi tiêu không được trống</p>
					 			</td>
						 		<td class="TienVND">
					 				<div class="estimate{{$budget->id}}"><!-- Estimate -->
									 <a onclick="estimate_click({{$budget->id}})" class="{{$budget->id}}showEstimate">
                                        {{number_format(($budget->estimate),0, '.', ',')}} VND
									 </a> 
									    <input onkeyup="key_estimate(event,{{$budget->id}})" onblur="estimate_dblclick({{$budget->id}})" ondblclick="estimate_dbl({{$budget->id}})" type="text" class="{{$budget->id}}InputEstimate form-control input-edit-money" name="estimate" value=" {{number_format(($budget->estimate),0, '.', ',')}}">
										<input type="hidden" name="{{$budget->id}}" value="{{$budget->id}}">
									 </div>
						 		</td>
						 		<td class="TienVND"><!-- Actual -->
									<div id="edit-money" > 
										<a onclick="actual_click({{$budget->id}})" hreft="" class="{{$budget->id}}_show_hide">
											{{number_format(($budget->actual),0, '.', ',')}} VND
										</a>
										<input onkeyup="key_actual(event,{{$budget->id}})" onblur="actual_dblclick({{$budget->id}})" ondblclick="actual_dbl({{$budget->id}})" type="text" class="{{$budget->id}}_slidingDiv form-control input-edit-money" id="{{$budget->id}}money" name="money" value="{{number_format(($budget->actual),0, '.', ',')}}">
										<input type="text" hidden name="{{$budget->id}}" value="{{$budget->id}}">
									</div>
								</td>
					 			<td class="TienVND">
					 				<div  > 
										<a onclick="pay_click({{$budget->id}})" hreft="" class="{{$budget->id}}Pay" >
											{{number_format(($budget->pay),0, '.', ',')}} VND
										</a>
										<input onkeyup="key_pay(event,{{$budget->id}})" onblur="pay_dblclick({{$budget->id}})" ondblclick="pay_dbl({{$budget->id}})" type="text" class="{{$budget->id}}Estimate form-control input-edit-money" id="{{$budget->id}}estimate" name="estimate" value="{{number_format(($budget->pay),0, '.', ',')}}">
										<input type="text" hidden name="{{$budget->id}}" value="{{$budget->id}}">
									</div>
				 				</td><!-- pay -->
					 			<td class="TienVND">
					 				<div>
						 				<a class="Due{{$budget->id}}"> {{number_format((($budget->actual)-($budget->pay)),0, ',', ' ')}} VND
						 				</a>
					 				</div>
					 			</td><!-- Due -->
					 			<td>
					 				<a href="javascript:void(0);" onclick="get_budget({{$budget->id}})" data-toggle="modal" data-target="#modalDeleteBudget" class="confirm budget_icon_trash item_del{{$budget->id}}">
					 					<i class="glyphicon glyphicon-trash"></i>
					 				</a>
					 				<input type="hidden"  name="{{$budget->item}}" value="{{$budget->id}}" >
					 			</td>
									
						 		</tr>
						 		<!-- Script thuỷ viết -->
						 		                                											  						     
						 		@endforeach
						 		@endif
						 		<tr class="budget_item_cat_add{{$category->id}}" id="budget_item_cat_add{{$category->id}}">
						 			<td></td>
						 			<td colspan="7">
						 				<a href="javascript:void(0);" onclick="item_add({{$category->id}})" class="item-add{{$category->id}} btn btn-primary">
											<i class="glyphicon glyphicon-plus"></i>&nbsp Thêm chi tiêu
										</a>
										<input type="hidden" value="{{$category->id}}" name="{{$category->id}}">
									</td>
						 		</tr>
						 	</tbody>
						@endforeach
						@endif
					 	</tbody>
					 	<tr>
					 		<th><i class="glyphicon glyphicon-gbp"></i></th>
					 		<th>Tổng cộng chi phí</th>
					 		<th class="TienVND" id="rowSumExpected">
					 			{{UserBudgetController::getDisplayMoneyTotal( 'estimate' )}}&nbspVND
					 		</th>
					 		<th class="TienVND" id="rowSumActual">
					 			{{UserBudgetController::getDisplayMoneyTotal( 'actual' )}}&nbspVND
					 		</th>
					 		<th class="TienVND" id="rowSumPay">
					 			{{UserBudgetController::getDisplayMoneyTotal( 'pay' )}}&nbspVND
					 		</th>
					 		<th class="TienVND" id="rowSumDue" colspan="2">
					 			{{UserBudgetController::getDisplayMoneyTotal( 'actual' )
				 				-
				 				UserBudgetController::getDisplayMoneyTotal( 'pay' )}}
								&nbspVND
					 		</th>
					 	</tr>
					</table>
				</div>
			</div>
		</div>
		<!-- /.col-xs-10 -->
		
			<!-- Modal Delete Budget -->
		<div class="modal fade" id="modalDeleteBudget">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button style="color:red;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 style="color:#3276B1;" class="modal-title text-center">Xóa Items</h4>
		      </div>
		      <div class="modal-body">
		        <p style='color:red;' class="text-center message_budget"></p>
		        <input type="hidden" class="modal_delete_budget" value="">
		      </div>
		      <div class="modal-footer text-center" style="text-align:center;">
		        <button onclick="del_budget()" data-dismiss="modal" type="button" class="btn btn-primary">Ok</button>
		        <button data-dismiss="modal" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		<script type="text/javascript">
	            //item
				function item_click(id){
					if ($("."+id+"item").val()=="New Item") 
					{
						$("."+id+"show_item").hide();
						$("."+id+"item").val("");
						$("."+id+"item").show();
						$("."+id+"item").focus();
					} 
					else{
						$("."+id+"show_item").hide();
						$("."+id+"item").show();
						$("."+id+"item").focus();

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
							$('.budget_item_cat_add'+id).before(obj.html);
						};												
						}											
					});
			 	};	
			 	function get_budget(id){
			 		var id_budget=$('.item_del'+id).next().val();
	        		$('.modal_delete_budget').val(id_budget);
	        		$.ajax({
	        			type: "post",
	        			url: "{{URL::route('get_budget')}}",
	        			data:{
	        				id:id_budget
	        			},
	        			success:function(data){
	    					var obj = JSON.parse(data);
	    					$('.message_budget').text('Bạn chắc chắn muốn xóa Item '+obj.item+' ?');
	        			}
	        		});
			 	};
			 	function del_budget(){
			 		var id_budget=$('.modal_delete_budget').val();
			 		$.ajax({
							type: "post",
							url: "{{URL::route('delete')}}",
							data: { 								    
							       id:id_budget
							},
							success: function(data){
								$("#budget_item_cat"+id_budget).remove();
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
			 	};
			 	//Estimate 
			 	function estimate_click(id){
			 		if ($("."+id+"InputEstimate").val()==0) {
			 			$("."+id+"showEstimate").hide();
			 			$("."+id+"InputEstimate").val("");
			 			$("."+id+"InputEstimate").show(); 
	                    $("."+id+"InputEstimate").focus();
					   
			 		} else{
			 			$("."+id+"InputEstimate").show(); 
	                    $("."+id+"InputEstimate").focus();
					    $("."+id+"showEstimate").hide();
			 		};
                   
			 	};
			 	function estimate_dbl(id){
			 		$("."+id+"InputEstimate").hide(); 
			 		$("."+id+"showEstimate").show();
			 	};
			 	function estimate_dblclick(id){
			 		if ($("."+id+"InputEstimate").val()=="") {
			 			$("."+id+"InputEstimate").val("0");
			 			$.ajax({
		            	type: "POST", url: "{{URL::route('editEstimate')}}",
		            	data: {estimate:$("."+id+"InputEstimate").val().replace(/,/gi,""), id:$("."+id+"InputEstimate").next().val() },
		            	success: function (result) { ShowSummary(result); 
		            	}	
		            	});				        
				        $("."+id+"showEstimate").text(parseInt($("."+id+"InputEstimate").val().replace(/,/gi,"")).format(0, 3, ',') + " VND");
				        $("."+id+"showEstimate").show();
				        $("."+id+"InputEstimate").hide();
					} 
					else
					{
				        $.ajax({
			            	type: "POST", url: "{{URL::route('editEstimate')}}",
			            	data: {estimate:$("."+id+"InputEstimate").val().replace(/,/gi,""), id:$("."+id+"InputEstimate").next().val() },
			            	success: function (result) { ShowSummary(result); 
			            	}	
			            	});				        
					    $("."+id+"showEstimate").text(parseInt($("."+id+"InputEstimate").val().replace(/,/gi,"")).format(0, 3, ',') + " VND");
				        $("."+id+"showEstimate").show();
				        $("."+id+"InputEstimate").hide();
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
			 		if ($("."+id+"_slidingDiv").val()=="0") {
			 			$("."+id+"_slidingDiv").show();
			 			$("."+id+"_slidingDiv").val("");
	                    $("."+id+"_slidingDiv").focus();
				        $("."+id+"_show_hide").hide();
			 		} else{
			 			$("."+id+"_slidingDiv").show();
	                    $("."+id+"_slidingDiv").focus();
				        $("."+id+"_show_hide").hide();
			 		};
			 	};
			 	function actual_dbl(id){
			 		    $("."+id+"_slidingDiv").hide();
				        $("."+id+"_show_hide").show();
			 	};
			 	function actual_dblclick(id){
			 		if ($("."+id+"_slidingDiv").val()=="") {
						$("."+id+"_slidingDiv").val("0");
						$.ajax({
		            	type: "POST", url: "{{URL::route('editActual')}}",
		            	data: {actual:$("."+id+"_slidingDiv").val().replace(/,/gi,""), id:$("."+id+"_slidingDiv").next().val() },
		            	success: function (result) { ShowSummary(result); }	
		             });
				        $("."+id+"_show_hide").text(parseInt($("."+id+"_slidingDiv").val().replace(/,/gi,"")).format(0, 3, ',') + " VND");
				        $("."+id+"_show_hide").show();
				        $("."+id+"_slidingDiv").hide();
					} 
					else
					{ 
			        $.ajax({
		            	type: "POST", url: "{{URL::route('editActual')}}",
		            	data: {actual:$("."+id+"_slidingDiv").val().replace(/,/gi,""), id:$("."+id+"_slidingDiv").next().val() },
		            	success: function (result) { ShowSummary(result); }	
		             });
				        $("."+id+"_show_hide").text(parseInt($("."+id+"_slidingDiv").val().replace(/,/gi,"")).format(0, 3, ',') + " VND");
				        $("."+id+"_show_hide").show();
				         $("."+id+"_slidingDiv").hide();
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
			 		if ($("."+id+"Estimate").val()=="0") {
			 			$("."+id+"Estimate").val("");
			 			$("."+id+"Estimate").show();
				 		$("."+id+"Estimate").focus();
				        $("."+id+"Pay").hide();
			 		} else{
			 			$("."+id+"Estimate").show();
				 		$("."+id+"Estimate").focus();
				        $("."+id+"Pay").hide();
			 		};			 		
			 	};
			 	function pay_dbl(id){
			 		    $("."+id+"Estimate").hide();
				        $("."+id+"Pay").show();
			 	};
			 	function pay_dblclick(id){
                    if ($("."+id+"Estimate").val()=="") {
	                   $("."+id+"Estimate").val("0");
	                   $.ajax({
			    		type: "POST", url: "{{URL::route('editPay')}}",
		            	data: {
		            		pay:$("."+id+"Estimate").val().replace(/,/gi,""),
		            		id:$("."+id+"Estimate").next().val()
		            	},
		            	success: function (result) { ShowSummary(result); }
			    	});					
					$("."+id+"Pay").text(parseInt($("."+id+"Estimate").val().replace(/,/gi,"")).format(0, 3, ',')+" VND");
					$("."+id+"Pay").show();
					$("."+id+"Estimate").hide();
			    	} 
			    	else{
			    	$.ajax({
			    		type: "POST", url: "{{URL::route('editPay')}}",
		            	data: {
		            		pay:$("."+id+"Estimate").val().replace(/,/gi,""),
		            		id:$("."+id+"Estimate").next().val()
		            	},
		            	success: function (result) { ShowSummary(result); }
			    	});
					$("."+id+"Pay").text(parseInt($("."+id+"Estimate").val().replace(/,/gi,"")).format(0, 3, ',')+" VND");
					$("."+id+"Pay").show();
					$("."+id+"Estimate").hide();					
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

@endsection