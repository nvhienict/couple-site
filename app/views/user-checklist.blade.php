@extends('main')
@section('title')
Checklist
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container user-checklist">
	<div class="row">
	<div class="notice-checklist text-center">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-2">
		NGÀY CƯỚI <br>
		{{User::find(Cookie::get('id-user'))->weddingdate}}
		</div>
		<div class="col-md-2">
		VIỆC CẦN LÀM <br>
		{{UserTask::where("user",Cookie::get('id-user'))->count()}}
		</div>
		<div class="col-md-2">
		VIỆC QUÁ HẠN<br>
		<span id="count_overdue">{{ChecklistController::overdue()}}</span>
		</div>
		<div class="col-md-2">
		VIỆC HOÀN THÀNH <br>
			<span id="count_complete">{{UserTask::where("user",Cookie::get('id-user'))->where('todo',1)->count()}}</span>
		</div>
		<div class="col-md-2"></div>
	</div>
</div><!--notice-checklist-->
<div class="col-xs-12 col-md-9">
	<div class="row sort-by">
		<div class="col-md-6">
			<h2>Check list
			</h2>
		</div>
		<div class="col-md-4 pull-right">
			<div>
			<ul class="nav nav-pills text-right" role="tablist">
				<li class="active">
					<a href="#bymonth" role="tab" data-toggle="tab"><span class="fa fa-calendar"></span> By Month</a>
				</li>
				<li>
					<a href="#bycategory" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> By Category</a>
				</li>
			</ul>
		</div>
		</div>
	</div>
	<div class="tab-content">
	<div class="tab-pane fade in active" id="bymonth">
		<div class="row">
		<div class="col-md-3">
			<a href="#" style="cursor:pointer;" data-toggle="modal" data-target="#myModalAddChecklist">
			<i class="glyphicon glyphicon-plus"></i>
			&nbsp Thêm công việc
		</a>
		</div>

	<!-- Modal Add checklist - Giang -->
	<div class="modal fade" id="myModalAddChecklist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h3 class="modal-title" id="myModalLabel">Thêm công việc</h3>
	      </div>
	      <div class="modal-body">
	        <form id="form_addChecklist" action="{{Asset('checklist/add')}}" method="post">
			    <div class="row form-group">
					<label for="task" class="col-xs-3 control-label">Tên công việc</label>
					<div class="col-xs-9">
					   	<input type="text" class="form-control" name="task" id="task" placeholder="Tên công việc">
					</div>
				</div>
				<div class="row form-group">
					<label for="startdate" class="col-xs-3 control-label">Ngày bắt đầu</label>
				        <div class='col-sm-6'>
				            <div class="form-group">
				            	<input type='text' class="form-control" id="startdate" name="startdate" />
				            </div>
				        </div>
			    </div>
			    <div class="row form-group">
			    	<label for="category" class="col-xs-3 control-label"> Danh mục </label>
			        <div class='col-sm-9'>
					   	<select name="category" class="form-control input-lg" id="category">
		                	<option value="{{Input::get('category')}}">{{Input::get('category')}}</option>
				    		@foreach (Category::get() as $index=> $category)
					    	<option value="{{$category['id']}}">{{$category['name']}}</option>
					    	@endforeach
	    				</select>
			        </div>
			    </div>
			    <div class="row form-group">
					<label for="note" class="col-xs-3 control-label"> Mô tả </label>
			        <div class='col-sm-9'>
			            <textarea class="form-control" id="description" name="description" cols="20" rows="5"></textarea>
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
		<!-- end modal -->

		<div class="col-md-2"><a href="#" id="export" data-toggle="modal" data-target="#print"><i class="fa fa-print"></i>&nbspPrint report</a>
		</div>

		<div class="col-xs-12 col-md-7">
		<ul class="month" style="overflow: hidden;">
			@foreach(ChecklistController::byMonth() as $index=>$key)
			 <li><a href="{{URL::route('sortby',array($key))}}">
			 @if($key==$month) <strong>{{ChecklistController::changeMonth($key)}}</strong>
			 @else {{ChecklistController::changeMonth($key)}}
			 @endif
			 -</a></li>
			@endforeach
		</ul>
		 </div>
	</div>
		<table class="table table-hover" id="export-table">
			<thead>
				<tr>
					<th>Tháng 
					{{$month}}
					</th>
				</tr>
			</thead>
			<tbody>
				@foreach($tasks as $index=>$task)
				<tr>
					<td class="text-center">
							<div class="checkbox">
								@if($task->todo==0)
									<input type="checkbox" id="chk_{{$task->id}}" name="chk_checklist" value="{{$task->id}}"  />
									<input type="hidden" name="checkbox-{{$task->id}}" value="">
									@else
									<input type="checkbox" id="chk_{{$task->id}}" name="chk_checklist" value="{{$task->id}}" checked />
									<input type="hidden" name="checkbox-{{$task->id}}" value="{{$task->id}}">
								@endif

								<script type="text/javascript">
								$(document).ready(function(){
									$('input[type="checkbox"]#chk_{{$task->id}}').click(function(){
										if($(this).is(':checked')) {
										var id= $(this).val();
										$(this).next().val(id);
										var $i= parseInt($("#count_complete").text())+1;
										var $j= parseInt($("#count_overdue").text())-1;
										$("#count_overdue").text($j);
										$("#count_complete").text($i);

										$.ajax({
											type: "post",
											url: "{{URL::route('check_task_complete', array('ac'=>1))}}",
												data: {id:$(this).val()}

											});

									}else{
										$(this).next().val("");
										var $i= parseInt($("#count_complete").text())-1;
										var $j= parseInt($("#count_overdue").text())+1;
										$("#count_overdue").text($j);
										$("#count_complete").text($i);

										$.ajax({
											type: "post",
											url: "{{URL::route('check_task_complete', array('ac'=>0))}}",
												data: {id:$(this).val()}

											});
									}
									});
								});
								</script>
							</div>
					</td>
					<td>{{$task->title}}</td>
					<td>@if(ChecklistController::comparedate($month))
					<span class="fa fa-warning" style="color:#E9621A;"></span>
					@endif
					</td>
					<td>
						<a href="#" id="drop{{$index}}" data-toggle="modal" data-target="#myModalEditChecklist{{$index}}">
						<i class="fa fa-edit"></i>
					</a>
					<!-- Modal Edit checklist -->
					<div class="modal fade" id="myModalEditChecklist{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h3 class="modal-title" id="myModalLabel">Sửa công việc</h3>
					      </div>
					      <div class="modal-body">
					        <form id="form_editChecklist{{$index}}" action="{{Asset('checklist/edit')}}" method="post">
					        	<input type="hidden" name="id" value="{{$task->id}}" />
							    <div class="row form-group">
									<label for="task" class="col-xs-3 control-label">Tên công việc</label>
									<div class="col-xs-9">
									   	<input type="text" class="form-control" name="task" id="task" value="{{$task->title}}" />
									</div>
								</div>
								<div class="row form-group">
									<label for="startdate" class="col-xs-3 control-label">Ngày bắt đầu</label>
								        <div class='col-sm-6'>
								            <div class="form-group">
								            	<input type='text' class="form-control" id="startdate{{$index}}" name="startdate" 
								            	value="{{$month}}" />
								            	<script>
											       	jQuery('#startdate{{$index}}').datetimepicker({
													lang:'en',
													i18n:{
													en:{
														months:[
														    'January','February','March','April',
														    'May','June','July','August',
														    'September','October','November','December',
														   ],
														dayOfWeek:[
														    "Su", "Mo", "Tu", "We", 
														    "Th", "Fr", "Sa",
														   ]
														}
													},
													timepicker:false,
													format:'Y-m-d'
													});
											    </script>
								            </div>
								        </div>
							    </div>
							    <div class="row form-group">
							    	<label for="category" class="col-xs-3 control-label"> Danh mục </label>
							        <div class='col-sm-9'>
									   	<select name="category" class="form-control" id="category" />
					                    	@foreach(Category::get() as $category)
					                        <option value="{{$category->id}}" 
					                            @if($category->id==$task->category) {{"selected"}}
					                            @endif
					                        >{{$category->name}}</option>
					                        @endforeach
					                    </select>
							        </div>
							    </div>
							    <div class="row form-group">
									<label for="note" class="col-xs-3 control-label"> Mô tả </label>
							        <div class='col-sm-9'>
							            <textarea class="form-control" id="description" name="description" cols="20" rows="5"></textarea>
							        </div>
							    </div>
							  	
							  	<div class="row form-group">
							  		<div class="col-xs-3"></div>
							  		<div class="col-xs-6">
								    	<button type="submit" class="btn btn-primary" id="submit_add"> Cập nhật </button>
								    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
							  		</div>
							  		<div class="col-xs-3"></div>
							  	</div>

							</form>
							<script type="text/javascript">

									$("#form_editChecklist{{$index}}").validate({
										rules:{
											task:{
												required:true,
												remote:{
													url:"{{URL::route('check_task_edit',array($task->id))}}",
													type:"post"
												}
											},
											startdate{{$index}}:{
												required:true
											},
											category:{
												required:true
											}
										},
										messages:{
											task:{
												required:"Bạn phải nhập tên công việc",
												remote:"Công việc đã tồn tại"
											},
											startdate{{$index}}:{
												required:"Bạn phải chọn ngày làm"
												
											},
											category:{
												required:"Bạn phải chọn danh mục"
											}
										},
										errorPlacement: function (error, element) {
											error.insertAfter(element);
										}
									});
							</script>
					    </div> <!-- end modal body -->
					</div> <!-- end modal content -->
					</div> <!-- end modal dialog -->
					</div> <!-- end modal fade -->
					<!-- end modal -->
					<!-- script of validate for edit checklist -->
							
					</td>
					<td>
						<a href="#" data-toggle="modal" data-target="#myModalDelTask{{$index}}"><span class="fa fa-trash-o"></span></a>
						<!-- Modal Delete Task -->
					<div class="modal fade" id="myModalDelTask{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h3 class="modal-title" id="myModalLabel"> Xoá công việc</h3>
					      </div>
					      <div class="modal-body">
					      	<div class="row">
					      		<div class="col-xs-8">{{$task->title}}</div>
					      		<div class="col-xs-4"> Ngày thực hiện: {{$month}} </div>
					      	</div>
					      	
					      </div>
					      <div class="modal-footer">
					      	<a href="{{URL::to('check_task_del', array('id'=>$task->id))}}">
					      		<button type="button" class="btn btn-primary">OK</button>
					      	</a>
					        <a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- end modal Delete Task  -->
					</td>
				</tr>
				@endforeach()
			</tbody>

		</table>
			</div><!--bymonth-->
			<div class="tab-pane fade" id="bycategory">
				<div class="row">
		  		<div class="col-md-3"><a href="#" data-toggle="modal" data-target="#myModalAddChecklist-cat"><span class="fa fa-plus"></span> Thêm công việc </a>
		  		</div>
		  		<!-- Modal Add checklist - Giang -->
				<div class="modal fade" id="myModalAddChecklist-cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        <h3 class="modal-title" id="myModalLabel">Thêm công việc</h3>
				      </div>
				      <div class="modal-body">
				        <form id="form_addChecklist-cat" action="{{Asset('checklist/add')}}" method="post">
						    <div class="row form-group">
								<label for="task" class="col-xs-3 control-label">Tên công việc</label>
								<div class="col-xs-9">
								   	<input type="text" class="form-control" name="task" id="task" placeholder="Tên công việc">
								</div>
							</div>
							<div class="row form-group">
								<label for="startdate" class="col-xs-3 control-label">Ngày bắt đầu</label>
							        <div class='col-sm-6'>
							            <div class="form-group">
							            	<input type='text' class="form-control" id="startdate" name="startdate" />
							            </div>
							        </div>
						    </div>
						    <div class="row form-group">
						    	<label for="category" class="col-xs-3 control-label"> Danh mục </label>
						        <div class='col-sm-9'>
								   	<select name="category" class="form-control input-lg" id="category">
					                	<option value="{{Input::get('category')}}">{{Input::get('category')}}</option>
							    		@foreach (Category::get() as $index=> $category)
								    	<option value="{{$category['id']}}">{{$category['name']}}</option>
								    	@endforeach
				    				</select>
						        </div>
						    </div>
						    <div class="row form-group">
								<label for="note" class="col-xs-3 control-label"> Mô tả </label>
						        <div class='col-sm-9'>
						            <textarea class="form-control" id="description" name="description" cols="20" rows="5"></textarea>
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
					<!-- end modal -->

		  		<div class="col-md-2"><a href="#" data-toggle="modal" data-target="#print"><span class="fa fa-print"></span> Print report</a>
		  		</div>
	  		</div>
				<table class="table table-hover">
					@foreach(Category::get() as $category)				
						<thead>
							<tr>
								<th>{{$category->name}}</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						@foreach(User::find(Cookie::get('id-user'))->user_task()->get() as $index=>$usertask)
						@if($category->id==$usertask->category)
					<tbody>
						<tr>
							<td>
								<div class="checkbox">
	  									@if($usertask->todo==0)
	  										<input type="checkbox" id="chk_cat_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}"  />
	  										<input type="hidden" name="checkbox-{{$usertask->id}}" value="">
	  										@else
	  										<input type="checkbox" id="chk_cat_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}" checked />
	  										<input type="hidden" name="checkbox-{{$usertask->id}}" value="{{$usertask->id}}">
	  									@endif

	  									<script type="text/javascript">
	  									$(document).ready(function(){

	  										var $i=$('#count_complete').text();
	  										$('input[type="checkbox"]#chk_cat_{{$usertask->id}}').click(function(){
	  											if($(this).is(':checked')) {
													var id= $(this).val();
													$(this).next().val(id);
													var $i= parseInt($("#count_complete").text())+1;
													var $j= parseInt($("#count_overdue").text())-1;
													$("#count_overdue").text($j);
													$("#count_complete").text($i);

													$.ajax({
														type: "post",
														url: "{{URL::route('check_task_complete', array('ac'=>1))}}",
															data: {id:$(this).val()}

														});

												}else{
													$(this).next().val("");
													var $i= parseInt($("#count_complete").text())-1;
													var $j= parseInt($("#count_overdue").text())+1;
													$("#count_overdue").text($j);
													$("#count_complete").text($i);

													$.ajax({
														type: "post",
														url: "{{URL::route('check_task_complete', array('ac'=>0))}}",
															data: {id:$(this).val()}

														});
												}
	  										});
	  									});
	  									</script>
	  								</div>
							</td>
							<td>{{$usertask->title}}</td>
							<td>
							<?php 
								$date=new DateTime(User::find(Cookie::get('id-user'))->weddingdate);
								echo $date->sub(new DateInterVal('P'.$usertask->startdate.'D'))->format("m-Y");
							?>
							</td>
							<td>@if(ChecklistController::comparedate2($usertask->startdate))
							<span class="fa fa-warning" style="color:#E9621A;"></span>
							@endif
							</td>
							<td>
								<a href="#" id="drop{{$index}}" data-toggle="modal" data-target="#myModalEditChecklist-cat{{$index}}">
						<i class="fa fa-edit"></i>
					</a>
					<!-- Modal Edit checklist -->
					<div class="modal fade" id="myModalEditChecklist-cat{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h3 class="modal-title" id="myModalLabel">Sửa công việc</h3>
					      </div>
					      <div class="modal-body">
					        <form id="form_editChecklist{{$index}}" action="{{Asset('checklist/edit')}}" method="post">
					        	<input type="hidden" name="id" value="{{$usertask->id}}" />
							    <div class="row form-group">
									<label for="task" class="col-xs-3 control-label">Tên công việc</label>
									<div class="col-xs-9">
									   	<input type="text" class="form-control" name="task" id="task" value="{{$usertask->title}}" />
									</div>
								</div>
								<div class="row form-group">
									<label for="startdate" class="col-xs-3 control-label">Ngày bắt đầu</label>
								        <div class='col-sm-6'>
								            <div class="form-group">
								            	<input type='text' class="form-control" id="startdate{{$index}}" name="startdate" 
								            	value="" />
								            	<script>
											       	jQuery('#startdate{{$index}}').datetimepicker({
													lang:'en',
													i18n:{
													en:{
														months:[
														    'January','February','March','April',
														    'May','June','July','August',
														    'September','October','November','December',
														   ],
														dayOfWeek:[
														    "Su", "Mo", "Tu", "We", 
														    "Th", "Fr", "Sa",
														   ]
														}
													},
													timepicker:false,
													format:'Y-m-d'
													});
											    </script>
								            </div>
								        </div>
							    </div>
							    <div class="row form-group">
							    	<label for="category" class="col-xs-3 control-label"> Danh mục </label>
							        <div class='col-sm-9'>
									   	<select name="category" class="form-control" id="category" />
					                    	@foreach(Category::get() as $category_cat)
					                        <option value="{{$category_cat->id}}" 
					                            @if($category_cat->id==$category->id) {{" selected"}}
					                            @endif
					                        >{{$category_cat->name}}</option>
					                        @endforeach
					                    </select>
							        </div>
							    </div>
							    <div class="row form-group">
									<label for="note" class="col-xs-3 control-label"> Mô tả </label>
							        <div class='col-sm-9'>
							            <textarea class="form-control" id="description" name="description" cols="20" rows="5"></textarea>
							        </div>
							    </div>
							  	
							  	<div class="row form-group">
							  		<div class="col-xs-3"></div>
							  		<div class="col-xs-6">
								    	<button type="submit" class="btn btn-primary" id="submit_add"> Cập nhật </button>
								    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
							  		</div>
							  		<div class="col-xs-3"></div>
							  	</div>

							</form>
							<script type="text/javascript">
									$("#form_editChecklist{{$index}}").validate({
										rules:{
											task:{
												required:true,
												remote:{
													url:"{{URL::route('check_task_edit',array($task->id))}}",
													type:"post"
												}
											},
											startdate{{$index}}:{
												required:true
											},
											category:{
												required:true
											}
										},
										messages:{
											task:{
												required:"Bạn phải nhập tên công việc",
												remote:"Công việc đã tồn tại"
											},
											startdate{{$index}}:{
												required:"Bạn phải chọn ngày làm"
												
											},
											category:{
												required:"Bạn phải chọn danh mục"
											}
										},
										errorPlacement: function (error, element) {
											error.insertAfter(element);
										}
									});
							</script>
					    </div> <!-- end modal body -->
					</div> <!-- end modal content -->
					</div> <!-- end modal dialog -->
					</div> <!-- end modal fade -->
					<!-- end modal -->
					<!-- script of validate for edit checklist -->
							</td>
							<td>
								<a href="#" data-toggle="modal" data-target="#myModalDelTask-cat{{$index}}"><span class="fa fa-trash-o"></span></a>
						<!-- Modal Delete Task -->
							<div class="modal fade" id="myModalDelTask-cat{{$index}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        <h3 class="modal-title" id="myModalLabel"> Xoá công việc</h3>
							      </div>
							      <div class="modal-body">
							      	<div class="row">
							      		<div class="col-xs-8">{{$usertask->title}}</div>
							      		<div class="col-xs-4"> Ngày thực hiện: {{$month}} </div>
							      	</div>
							      	
							      </div>
							      <div class="modal-footer">
							      	<a href="{{URL::to('check_task_del', array('id'=>$task->id))}}">
							      		<button type="button" class="btn btn-primary">OK</button>
							      	</a>
							        <a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
							      </div>
							    </div>
							  </div>
							</div>
							<!-- end modal Delete Task  -->
							</td>
						</tr>
						
					</tbody>
					@endif
					@endforeach
				@endforeach
				</table>
			</div>	<!-- tab-bycategory -->
		</div><!--tab-content-->

			
		</div><!--col-md-9-->
		<div class="col-xs-12 col-md-3">
			<div class="row">
			<div class="col-lg-12"><h3 class="text-center">Search Task</h3></div>
			  <div class="col-lg-12">
			  	<form action="{{URL::route('search',array($month))}}" method="POST" role="form">		  	
			  		<div class="form-group">
			  			<input type="text" name="input-search" id="input-search"placeholder="Search Task" class="form-control col-lg-3">
			  		</div>		  		
			  		<span class="input-group-btn">
			        <button class="btn btn-primary" type="submit">Go!</button>
			      </span>
			  	</form>
			    	<!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			</div><!-- /.row -->			
		</div>
	</div>


<!-- Giang -->
<!-- script of validate for add checklist -->
	<script type="text/javascript">
		$("#form_addChecklist").validate({
			rules:{
				task:{
					required:true,
					remote:{
						url:"{{URL::route('check_task_add')}}",
						type:"post"
					}
				},
				startdate:{
					required:true
				},
				category:{
					required:true
				}
			},
			messages:{
				task:{
					required:"Bạn phải nhập tên công việc",
					remote:"Công việc đã tồn tại"
				},
				startdate:{
					required:"Bạn phải chọn ngày làm"
				},
				category:{
					required:"Bạn phải chọn danh mục"
				}
			}
		});
	</script>

	<script type="text/javascript">
		$("#form_addChecklist-cat").validate({
			rules:{
				task:{
					required:true,
					remote:{
						url:"{{URL::route('check_task_add')}}",
						type:"post"
					}
				},
				startdate:{
					required:true
				},
				category:{
					required:true
				}
			},
			messages:{
				task:{
					required:"Bạn phải nhập tên công việc",
					remote:"Công việc đã tồn tại"
				},
				startdate:{
					required:"Bạn phải chọn ngày làm"
				},
				category:{
					required:"Bạn phải chọn danh mục"
				}
			}
		});
	</script>
	
    <script>
       	jQuery('#startdate').datetimepicker({
		lang:'en',
		i18n:{
		en:{
			months:[
			    'January','February','March','April',
			    'May','June','July','August',
			    'September','October','November','December',
			   ],
			dayOfWeek:[
			    "Su", "Mo", "Tu", "We", 
			    "Th", "Fr", "Sa",
			   ]
			}
		},
		timepicker:false,
		format:'Y-m-d'
		});
    </script>

    <!-- Tứ export file excel -->
	<script <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="{{Asset('assets/js/jquery.battatech.excelexport.js')}}"></script>
	    <script type="text/javascript">
	    $(document).ready(function () {
	        $("#export").click(function () {
	            $("#export-table").btechco_excelexport({
	                containerid: "export-table", datatype: $datatype.Table
	            });
	        });
	    });
	    </script>
    

</div><!--container-->
@endsection