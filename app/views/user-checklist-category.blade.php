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
	
<div class="col-xs-10">
	<div class="row sort-by">
		<div class="col-md-6">
			<h2>Danh sách công việc</h2>
		</div>
		<div class="col-md-5 pull-right">
			<div>
			<ul class="nav nav-pills text-right" role="tablist">
				<li>
					<a href="{{URL::route('user-checklist')}}"><span class="fa fa-calendar"></span> Theo tháng</a>
				</li>
				<li class="active">
					<a href="{{URL::route('user-checklist-category')}}" ><span class="glyphicon glyphicon-list"></span> Theo danh mục</a>
				</li>
			</ul>
		</div>
		</div>
	</div>
	<div class="submenu">
		<div class="row">
			<div class="col-md-3">
				<a href="" id="add-checklist" style="cursor:pointer;" data-toggle="modal" data-target="#myModalAddChecklist">
				<i class="glyphicon glyphicon-plus"></i>
				&nbsp Thêm công việc
			</a>
			</div>

		
			<div class="col-md-2">
				<a href="{{Asset('exportfile')}}" ><i class="fa fa-print"></i>&nbspXuất file</a>
			</div>
		</div>
	</div>

	<div class="checklist-statis-formonth">
		<div class="row">
			<div class="col-xs-5"><span>Tháng</span></div>
			<div class="col-xs-2"><span >Số việc cần làm</span></div>
			<div class="col-xs-2"><span >Số việc quá hạn</span></div>
			<div class="col-xs-3"><span >Số việc hoàn thành</span></div>
		</div>
	</div>
	<!-- hide for scroll will show -->
	<div class="checklist-statis-formonth-hide" >
		<div class="row">
			<div class="col-xs-5"><span>Tháng</span></div>
			<div class="col-xs-2"><span >Số việc cần làm</span></div>
			<div class="col-xs-2"><span >Số việc quá hạn</span></div>
			<div class="col-xs-3"><span >Số việc hoàn thành</span></div>
		</div>
	</div>
	<script type="text/javascript">

		$(window).scroll(function(){
			if ($(this).scrollTop() > 230) {
		        $('.checklist-statis-formonth-hide').show();
		    } else {
		        $('.checklist-statis-formonth-hide').hide();
		    }
		});

	</script>

	<div class="checklist-content">
		<div class="panel-group" id="accordion">
  		@foreach(Category::get() as $index=> $category)
		  <div class="panel panel-default" >
		    <div class="panel-heading" style="background: #fff6ee;">
		      <h4 class="panel-title">
		        <a class="collapse-category" id="collapse-category{{$index}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}">
		         <i class="fa fa-plus-square-o"></i> {{$category->name}}
		        </a>
		      </h4>
		      <script type="text/javascript">
			      $("#collapse-category{{$index}}").click(function(){
			      	if($("#collapse-category{{$index}} i").hasClass("fa fa-plus-square-o"))
			      	{	
			      		$("#collapse-category{{$index}} i").removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
			      	}
			      	else
			      	{
			      		$("#collapse-category{{$index}} i").removeClass("fa-minus-square-o").addClass("fa-plus-square-o");	
			      	}
		      });
		      </script>
		    </div>
		    <div id="collapse{{$index}}" class="panel-collapse collapse">
		      <div class="panel-body">
		        <table class="table table-hover" id="export-table">
					<thead>
						<tr>
							<th></th>
							<th>Các việc cần làm trong mục {{$category->name}}</th>
						</tr>
					</thead>
					<tbody>
					@foreach(User::find(ChecklistController::id_user())->user_task()->get() as $index=>$usertask)
					@if($category->id==$usertask->category)
						<tr>
							<td>
	  							@if($usertask->todo==0)
	  							<input type="checkbox" id="chk_cat_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}"  />
								<input type="hidden" name="checkbox-{{$usertask->id}}" value="">
	  							@else
	  							<input type="checkbox" id="chk_cat_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}" checked />
	  							<input type="hidden" name="checkbox-{{$usertask->id}}" value="{{$usertask->id}}">
	  							@endif
	  							<script type="text/javascript">
									$('input[type="checkbox"]#chk_cat_{{$usertask->id}}').click(function(){
										if($(this).is(':checked')) {
										var id= $(this).val();
										$(this).next().val(id);

										var $i= parseInt($("#count_complete").text())+1;

										var $j= parseInt($("#count_overdue").text());
										if ($j==0) { $j=$j; }
										else{ $j=$j-1; }

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

										var $j= parseInt($("#count_overdue").text());
										if ($j==0) { $j=$j; }
										else{ $j=$j+1; }

										$("#count_overdue").text($j);
										$("#count_complete").text($i);

										$.ajax({
											type: "post",
											url: "{{URL::route('check_task_complete', array('ac'=>0))}}",
												data: {id:$(this).val()}

											});
									}
									});
								</script>
							</td>
							<td>{{$usertask->title}}</td>
							<td>
							<?php 
								$date=new DateTime(User::find(ChecklistController::id_user())->weddingdate);
								echo $date->sub(new DateInterVal('P'.$usertask->startdate.'D'))->format("m-Y");
							?>
							</td>
							<td>
							<input type="text" hidden id="usertask-id-{{$usertask->id}}" value="{{$usertask->id}}">
							
							@if((ChecklistController::comparedate($usertask->startdate,$usertask->todo))&&($usertask->todo==0))
							<span  class="fa fa-warning" style="color:#E9621A;"></span>
							@elseif($usertask->todo==1)
							<span  ></span>
							@endif
							</td>
							<td>
								<a href="#" id="edit{{$usertask->id}}" data-toggle="modal" data-target="#myModalEditChecklist">
									<span class="fa fa-edit"></span>
								</a>
								<script type="text/javascript">
									$("#edit{{$usertask->id}}").click(function(){
										var validator = $( "#form_editChecklist" ).validate();
										validator.resetForm();
										$.ajax({
											type: "post",
											url:"{{URL::route('get-id')}}",
											data:{id: $("#usertask-id-{{$usertask->id}}").val()},
											success:function(result){
												$("#myModalEditChecklist #task").val(result['title']),
												$("#myModalEditChecklist #id").val(result['id']),
												$("#myModalEditChecklist #description").val(result['description']),
												$("#myModalEditChecklist #startdate-edit").val(result['startdate']),
												$('#myModalEditChecklist #category option[value="' + result['category_id'] + '"]').prop('selected', true);
											}
										});
									});
								</script>	
							</td>
							<td>
								<a href="#" id="drop{{$usertask->id}}" data-toggle="modal" data-target="#myModalDelTask">
									<span class="fa fa-trash-o"></span>
								</a>
								<script type="text/javascript">
									$("#drop{{$usertask->id}}").click(function(){
										var parent = $(this).parent();
										$.ajax({
											type: "post",
											url:"{{URL::route('get-id')}}",
											data:{id: $("#usertask-id-{{$usertask->id}}").val()},
											success:function(result){
												$("#myModalDelTask #task-title").text(result['title']),
												$("#myModalDelTask #task-id").val(result['id'])
											}
										});
									});
								</script>
							</td>
						</tr>
						@endif
					@endforeach
					</tbody>
				</table>
		      </div><!--panel body-->
		    </div><!--collapse number-->
		  </div><!--panel-default-->
		  @endforeach
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
		<!-- Modal Edit checklist -->
					<div class="modal fade" id="myModalEditChecklist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h3 class="modal-title" id="myModalLabel">Sửa công việc</h3>
					      </div>
					      <div class="modal-body">
					        <form id="form_editChecklist" action="" method="post">
							    <div class="row form-group">
									<label for="task" class="col-xs-3 control-label">Tên công việc</label>
									<div class="col-xs-9">
									   	<input type="text" class="form-control" name="task" id="task" value="" />
									</div>
								</div>
								<div class="row form-group">
									<label for="startdate" class="col-xs-3 control-label">Ngày bắt đầu</label>
								        <div class='col-sm-6'>
								            <div class="form-group">
								            	<input type='text' class="form-control" id="startdate-edit" name="startdate" 
								            	value="" />
								            </div>
								        </div>
							    </div>
							    <div class="row form-group">
							    	<label for="category" class="col-xs-3 control-label"> Danh mục </label>
							        <div class='col-sm-9'>
							        <input type="hidden" id="id" name="id" value="">
									   	<select name="category" class="form-control" id="category" />
									   		<option value=""></option>
					                    	@foreach(Category::get() as $category)
					                        <option value="{{$category->id}}">
					                        {{$category->name}}
					                        </option>
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
								    	<a data-dismiss="modal" class="btn btn-primary" id="submit_add"> Cập nhật </a>
								    	<script type="text/javascript">
								    		$("a#submit_add").click(function(){
								    			$.ajax({
									      			type: "post",
									      			url:"{{URL::route('edit-checklist')}}",
									      			data:{id:$('#form_editChecklist #id').val(),task:$('#form_editChecklist #task').val(),category:$('#form_editChecklist #category').val(),startdate:$('#form_editChecklist #startdate-edit').val(),description:$('#form_editChecklist #description').val()
									      			},
									      			success:function(){
									      				 window.location.href = "{{URL::route('user-checklist-category')}}";
									      			}
									      			
									      		});
								    			
								    		});
								    	</script>
								    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
							  		</div>
							  		<div class="col-xs-3"></div>
							  	</div>

							</form>
					    </div> <!-- end modal body -->
					</div> <!-- end modal content -->
					</div> <!-- end modal dialog -->
					</div> <!-- end modal fade -->
					<!-- end modal -->
					<!-- Modal Delete Task -->
					<div class="modal fade" id="myModalDelTask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h3 class="modal-title" id="myModalLabel"> Xoá công việc</h3>
					      </div>
					      <div class="modal-body">
					      		<p>Bạn có chắc chắn muốn xóa công việc: <strong id="task-title"></strong> ?</p>
					      		<input type="hidden" id="task-id" name="task-id" value="">
					      	
					      </div>
					      <div class="modal-footer">
					      	<a id="del-task-form" href="" class="btn btn-primary">OK</a>
					      	<script type="text/javascript">
					      	$("#del-task-form").click(function(){
					     		var parent=$("#drop"+$('#task-id').val()).parent();
					      		$.ajax({
					      			type: "post",
					      			url:"{{URL::route('delete-id')}}",
					      			data:{id:$('#task-id').val()
					      			},
					      			cache:false,
					      			success:function(){
					      				window.location.href = "{{URL::route('user-checklist-category')}}";
					      			}
					      			
					      		});
					      	});
					      	</script>
					        <a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- end modal Delete Task  -->
					<!-- script of validate for edit checklist -->
		</div>
		
	</div><!--checklist-->
		<script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
	</div><!--col-xs-10-->

	<div class="col-xs-2" style="background: #f2f0ee; padding: 5px;">

		<div class="row">
			<div class="col-xs-12">
				<h2>Thống kê</h2>
				NGÀY CƯỚI: 
				<span style="color: #ff2680;">{{ChecklistController::getDates()}}</span>

				<br />VIỆC CẦN LÀM: 
				<span style="color: #f0ad4e;">{{UserTask::where("user", ChecklistController::id_user())->count()}}</span>

				<br />VIỆC QUÁ HẠN: 
				<span id="count_overdue" style="color: #f0ad4e;">{{ChecklistController::overdue()}}</span>

				<br />VIỆC HOÀN THÀNH: 
				<span id="count_complete" style="color: #f0ad4e;">{{UserTask::where("user", ChecklistController::id_user())->where('todo',1)->count()}}</span>
				<br />
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				{{'<img width="185px" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',1)->get()->first()->avatar) . '" />'}}
				<span style="color: #68ceee">{{Vendor::where('id',1)->get()->first()->name}}</span>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				{{'<img width="185px" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',2)->get()->first()->avatar) . '" />'}}
				<span style="color: #68ceee">{{Vendor::where('id',1)->get()->first()->name}}</span>
			</div>
		</div>

	</div>

</div> <!-- end row -->

</div><!--container-->
@endsection
