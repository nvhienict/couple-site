@extends('main-dashboard')
@section('title')
Danh sách công việc | thuna.vn
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

	@if(empty($website_item->count_down))
		@foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
			<div id="getD{{$index}}" style="display:none;">
				{{$dd}}
			</div>
		@endforeach
	@else
	@foreach( $date = explode('-', WebsiteController::getCountDown()) as $index=>$dd )
			<div id="getD{{$index}}" style="display:none;">
				{{$dd}}
			</div>
		@endforeach
	@endif

	<div class="col-xs-12 time-count-down">
		<span class="display-dd-mm-yyyy-1"></span>
		<span class="margin-two-dot">:</span>
		<span class="display-dd-mm-yyyy-2"></span>
		<span class="margin-two-dot">:</span>
		<span class="display-dd-mm-yyyy-3"></span>
		<span class="margin-two-dot">:</span>
		<span class="display-dd-mm-yyyy-4"></span>
	</div><!--/.time-count-down-->
	<script type="text/javascript" src={{Asset('assets/js/count-down-time.js')}}></script>

	<div class="col-xs-6 col-xs-offset-3 thong-ke-chi-tiet-cong-viec">
		<div class="table-responsive">
	 		<table class="table table-hover">
	 			<tbody>
	 				<tr class="info">
	 					<td>Việc cần làm</td>
	 					<td>
	 						<div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
                                    {{ChecklistController::countTasksToDo()}}
                                </div>
                            </div>
						</td>
	 				</tr>
	 				<tr class="warning">
	 					<td>Việc quá hạn</td>
	 					<td>
	 						<div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
                                    {{ChecklistController::overdue()}}
                                </div>
                            </div>
						</td>
	 				</tr>
	 				<tr class="success">
	 					<td>Việc hoàn thành</td>
	 					<td>
	 						<div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
                                    {{ChecklistController::countTasksComplete()}}
                                </div>
                            </div>
						</td>
	 				</tr>
	 			</tbody>
	 		</table>
	 	</div>
	</div><!--/.thong-ke-chi-tiet-cong-viec-->

	<div class="col-xs-12" style="padding-right: 0;">
		<div class="row sort-by">
			<div class="col-lg-6 col-sm-12 col-xs-12">
				<h2>Danh sách công việc</h2>
			</div>
			<div class="col-lg-4 col-sm-12 col-xs-12 pull-right" style="padding-top: 1.5%">
				<ul class="nav nav-pills text-right" role="tablist">
					<li class="active">
						<a href="{{URL::route('user-checklist')}}" ><span class="fa fa-calendar"></span> Theo tháng</a>
					</li>
					<li>
						<a href="{{URL::route('user-checklist-category')}}" ><span class="glyphicon glyphicon-list"></span> Theo danh mục</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row" style="margin-top:1%;">
			<div class="col-lg-3 col-sm-4 col-xs-6">
				<a href="" id="add-checklist" style="cursor:pointer;" data-toggle="modal" data-target="#myModalAddChecklist" data-backdrop="static">
					<i class="glyphicon glyphicon-plus"></i>
					&nbsp Thêm công việc
				</a>
			</div>

			<div class="col-lg-2 col-sm-3 col-sm-offset-5 col-xs-4 col-xs-offset-2">
				<a href="{{Asset('exportfile')}}" ><i class="fa fa-print"></i>&nbspXuất file</a>
			</div>
		</div>


		<div class="checklist-statis-formonth">
			<div class="row">
				<div class="col-xs-5"><span>Tháng</span></div>
				<div class="col-xs-2">Việc cần làm</div>
				<div class="col-xs-2">Việc quá hạn</div>
				<div class="col-xs-3">Việc hoàn thành</div>
			</div>
		</div>
		<!-- hide for scroll will show -->
		<div class="checklist-statis-formonth-hide hidden-xs" >
			<div class="row">
				<div class="col-xs-5"><span>Tháng</span></div>
				<div class="col-xs-2">Việc cần làm</div>
				<div class="col-xs-2">Việc quá hạn</div>
				<div class="col-xs-3">Việc hoàn thành</div>
			</div>
		</div>
		<script type="text/javascript">

			$(window).scroll(function(){
				if ($(this).scrollTop() > 800) {
			        $('.checklist-statis-formonth-hide').show();
			    } else {
			        $('.checklist-statis-formonth-hide').hide();
			    }
			});

		</script>

		<div class="checklist-content">
			<div class="panel-group" id="accordion">
			@if(ChecklistController::byMonth())
	  		@foreach(ChecklistController::byMonth() as $index=> $checklist_month)
	  		<input id="month{{$index}}" hidden name = "month{{$index}}" value="{{$index}}">
	  		<input id="month_y{{$index}}" hidden name = "month_y{{$index}}" value="{{$checklist_month}}">
			  <div class="panel panel-default" style="margin-right:0; margin-top:0.5%">
			    <div class="panel-heading row" style="background: #fff6ee;" >
				    <div class="col-xs-5">
					    <h4 class="panel-title">
					        <a class="collapse-month" onclick ="sortByMonth({{$index}})" id="collapse-month{{$index}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}">
					        	<i class="fa fa-plus-square-o"></i> Tháng {{ChecklistController::changeMonth($checklist_month)}}
					        </a>
					    </h4>
					</div>
					<div class="col-xs-2" id="task{{$index}}"><span>{{ChecklistController::taskMonth($checklist_month)['task']}}</span></div>
					<div class="col-xs-2" id="overDue{{$index}}"><span>{{ChecklistController::taskMonth($checklist_month)['Overdue']}}</span></div>
					<div class="col-xs-3" id="Completed{{$index}}"><span>{{ChecklistController::taskMonth($checklist_month)['Completed']}}</span></div>
			    </div>
			    <div id="collapse{{$index}}" class="panel-collapse collapse">
			      <div class="panel-body">
			        <table class="table table-hover" id="export-table">
						<thead>
							<tr>
								<th></th>
								<th>Các việc cần làm trong {{$checklist_month}}</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if(@ChecklistController::sortBy($checklist_month))
							@foreach(@ChecklistController::sortBy($checklist_month) as $usertask)
							<input id="startdate{{$usertask->id}}" hidden name="startdate{{$usertask->id}}" value="{{$usertask->startdate}}">
							<tr id="{{$usertask->id}}">
								<td class="text-center">
									@if($usertask->todo==0)
										<input onclick="clickCheckbox({{$index}},{{$usertask->id}})" type="checkbox" id="chk_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}"  />
										<input type="hidden" name="checkbox-{{$usertask->id}}" value="">
									@else
										<input onclick="clickCheckbox({{$index}},{{$usertask->id}})" type="checkbox" id="chk_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}" checked />
										<input type="hidden" name="checkbox-{{$usertask->id}}" value="{{$usertask->id}}">
									@endif
								</td>
								<td>
									<a href="{{$usertask->link}}" id="title-{{$usertask->id}}">{{$usertask->title}}</a>
									<!-- <p id="description-{{$usertask->id}}">{{$usertask->description}}</p> -->
								</td>
								<td>
									<input type="text" hidden id="usertask-id-{{$usertask->id}}" value="{{$usertask->id}}">
									@if(ChecklistController::comparedate($usertask->startdate,$usertask->todo))
										<span  id="warning{{$usertask->id}}" class="fa fa-warning" style="color:#E9621A;"></span>
									@else
										<span  id="warning{{$usertask->id}}" class="fa fa-warning warning" style="color:#E9621A;"></span>
									@endif
								</td>
								<td>
									<a href="javascript:void(0);" onclick ="editTask({{$usertask->id}})" id="edit{{$usertask->id}}" data-toggle="modal" data-target="#myModalEditChecklist" data-backdrop="static">
										<span class="fa fa-edit"></span>
									</a>
								</td>
								<td>
									<a href="#" id="drop{{$usertask->id}}" onclick = "dropTask({{$usertask->id}})" data-toggle="modal" data-target="#myModalDelTask" data-backdrop="static">
										<span class="fa fa-trash-o"></span>
									</a>
								</td>
							</tr>
							@endforeach
							@endif
							<tr id="tr{{$index}}"></tr>
						</tbody>

					</table>
			      </div><!--panel body-->
			    </div><!--collapse number-->
			  </div><!--panel-default-->
		  @endforeach
		  @endif

			<!-- Modal Add checklist -->
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
							<label for="task" class="col-sm-3 control-label hidden-xs">Tên công việc</label>
							<div class="col-sm-9">
							   	<input type="text" class="form-control" name="task" id="task" placeholder="Tên công việc">
							</div>
						</div>
						<div class="row form-group">
							<label for="startdate" class="col-sm-3 control-label hidden-xs">Ngày bắt đầu</label>
						        <div class='col-sm-6'>
						            <div class="form-group">
						            	<input type='text' class="form-control" id="startdate" name="startdate" placeholder="Ngày bắt đầu" />
						            </div>
						        </div>
					    </div>
					    <div class="row form-group">
					    	<label for="category" class="col-sm-3 control-label hidden-xs"> Danh mục </label>
					        <div class='col-sm-9'>
							   	<select name="category" class="form-control input-lg" id="category">
				                	@foreach (Category::get() as $index=> $category)
							    		<option value="{{$category['id']}}">{{$category['name']}}</option>
							    	@endforeach
			    				</select>
					        </div>
					    </div>
					    <div class="row form-group">
							<label for="note" class="col-sm-3 control-label hidden-xs"> Mô tả </label>
					        <div class='col-sm-9'>
					            <textarea class="form-control" id="description" name="description" cols="20" rows="5" placeholder="Mô tả"></textarea>
					        </div>
					    </div>
					  	
					  	<div class="row form-group">
					  		<div class="col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4 col-xs-7 col-xs-offset-2">
						    	<button type="submit" class="btn btn-primary" id="submit_add"> Thêm </button>
						    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
					  		</div>
					  	</div>

						</form>
				    </div> <!-- end modal body -->
				</div> <!-- end modal content -->
				</div> <!-- end modal dialog -->
				</div> <!-- end modal fade -->
				<!-- end modal Add -->
				<script type="text/javascript">
					$("#form_addChecklist").validate({
						rules:{
							task:{
								required:true,
								remote:{
									url:"{{URL::to('check_task_add')}}",
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
									<label for="task" class="col-sm-3 control-label hidden-xs">Tên công việc</label>
									<div class="col-sm-9">
									   	<input type="text" class="form-control" name="task" id="task" value="" />
									</div>
								</div>
								<div class="row form-group">
									<label for="startdate" class="col-sm-3 control-label hidden-xs">Ngày bắt đầu</label>
								        <div class='col-sm-6'>
								            <div class="form-group">
								            	<input type='text' class="form-control" id="startdate-edit" name="startdate" 
								            	value="" />
								            </div>
								        </div>
							    </div>
							    <div class="row form-group">
							    	<label for="category" class="col-sm-3 control-label hidden-xs"> Danh mục </label>
							        <div class='col-sm-9'>
							        <input type="hidden" id="id" name="id" value="">
									   	<select name="category" class="form-control" id="category" />
									   		<option value=""></option>
									   		@if(Category::get())
					                    	@foreach(Category::get() as $category)
					                        <option value="{{$category->id}}">
					                        {{$category->name}}
					                        </option>
					                        @endforeach
					                        @endif
					                    </select>
							        </div>
							    </div>
							    <div class="row form-group">
									<label for="note" class="col-sm-3 control-label hidden-xs"> Mô tả </label>
							        <div class='col-sm-9'>
							            <textarea class="form-control" id="description" name="description" cols="20" rows="5"></textarea>
							        </div>
							    </div>
							  	
							  	<div class="row form-group">
							  		
							  		<div class="col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4 col-xs-7 col-xs-offset-2">
								    	<a data-dismiss="modal" class="btn btn-primary" id="submit_add"> Cập nhật </a>
								    	<script type="text/javascript">
								    		$("a#submit_add").click(function(){
								    			$.ajax({
									      			type: "post",
									      			url:"{{URL::route('edit-checklist')}}",
									      			data:{id:$('#form_editChecklist #id').val(),task:$('#form_editChecklist #task').val(),category:$('#form_editChecklist #category').val(),startdate:$('#form_editChecklist #startdate-edit').val(),description:$('#form_editChecklist #description').val()
									      			},
									      			success:function(data){
									      				 //window.location.href = "{{URL::route('user-checklist')}}";
									      				var obj = JSON.parse(data);
									      				var id_edit=$('#form_editChecklist #id').val();
									      				$("#title-"+id_edit).text(obj.title);
									      				$("#description-"+id_edit).text(obj.description);
									      			}
									      			
									      		});
								    			
								    		});
								    	</script>
								    	<a data-dismiss="modal" style="cursor:pointer; margin-left: 10px;"> Huỷ bỏ </a>
							  		</div>
							  	</div>

							</form>
					    </div> <!-- end modal body -->
					</div> <!-- end modal content -->
					</div> <!-- end modal dialog -->
					</div> <!-- end modal fade -->
					<!-- end modal Edit -->

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
					      	<a id="del-task-form" href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary">OK</a>
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
					      				//window.location.href = "{{URL::route('user-checklist')}}";
					      				var del=$('#task-id').val();
					      				$("#"+del).remove();
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
	<script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
</div> <!-- col-xs-10 -->




<script type="text/javascript" async>
	function showCountTask(data,id,index){
		data = $.parseJSON(data);
		$("#task"+index).text(data['Counttask']);
		$("#overDue"+index).text(data['Overdue']);
		$("#Completed"+index).text(data['completed']);
		$("#warning"+id).replaceWith(data['waning']);
		
	}

	function clickCheckbox(index,id_usertask){
		var name_input = 'input[type="checkbox"]#chk_'+id_usertask;
		if($(name_input).is(':checked')) 
		{
			var id= $(name_input).val();
			$(name_input).next().val(id);
			var $i= parseInt($("#count_complete").text())+1;
			var $j= parseInt($("#count_overdue").text());
			if ($j==0) { $j=$j; }
			else{ $j=$j-1; }

			$("#count_overdue").text($j);
			$("#count_complete").text($i);
			$("#warning"+id_usertask).hide();
			$.ajax({
				type: "post",
				url: "{{URL::route('check_task_complete',array('ac'=>1))}}",
				data: {id:$(name_input).val(), month:$('#month_y'+index).val(),startdate: $('#startdate'+id_usertask).val()},
				success: function(data){showCountTask(data,id_usertask,index)}
			});
			$("#"+id_usertask).hide();
			$("#tr"+index).before($("#"+id_usertask)).show();
			$("#"+id_usertask).show();
		}
		else
		{
			$(name_input).next().val("");
			var $i= parseInt($("#count_complete").text())-1;
			var $j= parseInt($("#count_overdue").text());
			if ($j==0) { $j=$j; }
			else{ $j=$j+1; }

			$("#count_overdue").text($j);
			$("#count_complete").text($i);
			$.ajax({
				type: "post",
				url: "{{URL::route('check_task_complete',array('ac'=>0))}}",
				data: {id:$(name_input).val(), month:$('#month_y'+index).val(),startdate: $('#startdate'+id_usertask).val()},
				success: function(data){showCountTask(data,id_usertask,index)}
			});
		}
	}
	function editTask(id){
		var validator = $( "#form_editChecklist" ).validate();
		validator.resetForm();
		$.ajax({
			type: "post",
			url:"{{URL::route('get-id')}}",
			data:{id: $("#usertask-id-"+id).val()},
			success:function(result){
				$("#myModalEditChecklist #task").val(result['title']),
				$("#myModalEditChecklist #id").val(result['id']),
				$("#myModalEditChecklist #description").val(result['description']),
				$("#myModalEditChecklist #startdate-edit").val(result['startdate']),
				$('#myModalEditChecklist #category option[value="' + result['category_id'] + '"]').prop('selected', true);
			}
		});
	}
	function dropTask(id){
		var parent = $(this).parent();
		$.ajax({
			type: "post",
			url:"{{URL::route('get-id')}}",
			data:{id: $("#usertask-id-"+id).val()},
			success:function(result){
				$("#myModalDelTask #task-title").text(result['title']),
				$("#myModalDelTask #task-id").val(result['id'])
			}
		});
	}
	function sortByMonth(index){
	  	if($("#collapse-month"+index+" i").hasClass("fa fa-plus-square-o") && ($("#collapse"+index).hasClass("panel-collapse collapse")))
	  	{	
	  		$("#collapse-month"+index+" i").removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
	  	}
	  	else
	  	{
	  		$("#collapse-month"+index+" i").removeClass("fa-minus-square-o").addClass("fa-plus-square-o");	
	  	}
	  	
	}
</script>
@endsection