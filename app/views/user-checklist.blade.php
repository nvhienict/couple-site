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
		WEDDINGDATE <br>
		{{User::find(Cookie::get('id-user'))->weddingdate}}
		</div>
		<div class="col-md-2">
		TO-DOS <br>
		{{UserTask::where("user",Cookie::get('id-user'))->count()}}
		</div>
		<div class="col-md-2">
		OVERDUE <br>
		50
		</div>
		<div class="col-md-2">
		COMPLETED <br>
		10
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

		<div class="col-md-2"><a href="#" id="export" data-toggle="modal" data-target="#print"><span class="fa fa-print"></span> Print report</a>
		</div>
		<div class="col-md-7 pull-right text-right">Tháng
		@foreach(ChecklistController::byMonth() as $index=>$key)
		 <a href="{{URL::route('sortby',array($key))}}">
		 @if($key==$month) <strong>{{ChecklistController::changeMonth($key)}}</strong>
		 @else {{ChecklistController::changeMonth($key)}}
		 @endif
		 </a> -
		@endforeach
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
				@foreach($tasks as $task)
				<tr>
					<td class="text-center">
							<input type="checkbox" name="">
					</td>
					<td>{{$task->title}}</td>
					<td>@if($task->todo==2)
					 <span class="fa fa-warning"></span>
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

								$(document).ready(function(){
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
					      		<div class="col-xs-4"> Ngày thực hiện: ........ </div>
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
		  		<div class="col-md-2"><a href="#" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span> Add an item</a>
		  		</div>

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
						@foreach(User::find(Cookie::get('id-user'))->user_task()->get() as $usertask)
						@if($category->id==$usertask->category)
					<tbody>
						<tr>
							<td>
								<input type="checkbox" name="">
							</td>
							<td>{{$usertask->title}}</td>
							<td>Aug</td>
							<td>
								<a href=""><span class="fa fa-edit"></span></a>
							</td>
							<td>
								<a href=""><span class="fa fa-trash-o"></span></a>
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
			  			<input type="text" name="input-search" id="input-search"placeholder="Search Task" class="form-control">
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