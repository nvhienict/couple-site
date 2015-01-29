@extends('main-dashboard')
@section('title')
Danh sách công việc | thuna.vn
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
			      	<li class="active"><a href="{{URL::route('user-checklist')}}" title="Danh sách công việc">
			      			Danh sách công việc
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('guest-list')}}" title="Danh sách khác mời">
			      			Danh sách khách mời
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('budget')}}" title="Quăn lí ngân sách">
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

	<div class="row">
		<div class="col-xs-12">
			<h2 style="color:#E75292; padding-left:15px;">Danh sách công việc</h2>
		</div>
	</div>

	<div class="col-xs-12 thong-ke-chi-tiet-cong-viec">
		<div class="table-responsive">
	 		<table class="table table-hover">
	 			<tbody>
	 				<tr>
	 					<td style="border-top:none; padding: 15px 8px 0 8px;">Việc cần làm</td>
	 					<td style="border-top:none; padding: 15px 8px 0 8px;">Việc chưa hoàn thành</td>
	 					<td style="border-top:none; padding: 15px 8px 0 8px;">Việc hoàn thành</td>
	 				</tr>
	 				<tr>	 					
	 					<td>
	 						<div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
                                    {{ChecklistController::countTasksToDo()}}
                                </div>
                            </div>
						</td>
	 					<td>
	 						<div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
                                    {{ChecklistController::overdue()}}
                                </div>
                            </div>
						</td>
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

		<div class="row" style="margin:1% 0;">
			<div class="col-lg-2 col-sm-4 col-xs-4" style="padding-left: 0">
				<a href="" id="add-checklist" class="btn btn-primary" data-toggle="modal" data-target="#myModalAddChecklist" data-backdrop="static">
					<i class="glyphicon glyphicon-plus"></i>
					&nbsp Thêm công việc
				</a>
			</div>

			<div class="col-lg-2 col-sm-3 col-xs-4">
				<a href="{{Asset('exportfile')}}" class="btn btn-warning" ><i class="fa fa-print"></i>&nbspXuất file</a>
			</div>

			<div class="col-lg-4 col-sm-5 col-xs-4 pull-right">
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
	@if(Category::get())
  		@foreach(Category::get() as $index=> $category)
  		<input type="text" hidden id="cat{{$category->id}}" value="{{$category->id}}">
		  <div class="panel panel-default" style="margin-right:0; margin-top:0.5%" >
		    <div class="panel-heading row" style="background: #fff6ee;">
		    	<div class="col-xs-5">
			      <h4 class="panel-title">
			        <a class="collapse-category" onclick ="sortByCat({{$index}})" id="collapse-category{{$index}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}">
			         <i class="fa fa-plus-square-o"></i> {{$category->name}}
			        </a>
			      </h4>
		  		</div>
				<div class="col-xs-2" id="Cat_task{{$category->id}}"><span>{{ChecklistController::countCategoryToDo($category->id)}}</span></div>
				<div class="col-xs-2" id="Cat_overDue{{$category->id}}"><span>{{ChecklistController::countCatOverDue($category->id)}}</span></div>
				<div class="col-xs-3" id="Cat_Completed{{$category->id}}"><span>{{ChecklistController::countCatComplete($category->id)}}</span></div>
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
				@if(User::find(ChecklistController::id_user())->user_task()->get())
					@foreach(User::find(ChecklistController::id_user())->user_task()->orderBy('todo','ASC')->get() as $index=>$usertask)
					@if($category->id==$usertask->category)
					<input type="text" hidden id="startdate{{$usertask->id}}" value="{{$usertask->startdate}}">
						<tr id="{{$usertask->id}}">
							<td>
	  							@if($usertask->todo==0)
	  							<input onclick="clickCheckboxCat({{$category->id}},{{$usertask->id}})" type="checkbox"  id="chk_cat_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}"  />
								<input type="hidden" name="checkbox-{{$usertask->id}}" value="">
	  							@else
	  							<input onclick="clickCheckboxCat({{$category->id}},{{$usertask->id}})" type="checkbox" id="chk_cat_{{$usertask->id}}" name="chk_checklist" value="{{$usertask->id}}" checked />
	  							<input type="hidden" name="checkbox-{{$usertask->id}}" value="{{$usertask->id}}">
	  							@endif
	  							
							</td>
							<td id="title_cat{{$usertask->id}}">{{$usertask->title}}</td>
							<td>
							<?php 
								$date=new DateTime(User::find(ChecklistController::id_user())->weddingdate);
								echo $date->sub(new DateInterVal('P'.$usertask->startdate.'D'))->format("m-Y");
							?>
							</td>
							<td>
							<input type="text" hidden id="usertask-id-{{$usertask->id}}" value="{{$usertask->id}}">
							
							@if(ChecklistController::comparedate($usertask->startdate,$usertask->todo))
								<span  id="warning{{$usertask->id}}" class="fa fa-warning" style="color:#E9621A;"></span>
							@else
								<span  id="warning{{$usertask->id}}" class="fa fa-warning" style="color:#E9621A; display: none;"></span>
							@endif
							</td>
							<td>
								<a href="#" id="edit{{$usertask->id}}" data-toggle="modal" data-target="#myModalEditChecklist" data-backdrop="static">
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
								<a href="javascript:void(0);" id="drop{{$usertask->id}}" data-toggle="modal" data-target="#myModalDelTask" data-backdrop="static">
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
				@endif
				<tr id="trCat{{$category->id}}"></tr>
					</tbody>
				</table>
		      </div><!--panel body-->
		    </div><!--collapse number-->
		  </div><!--panel-default-->
		  @endforeach
		 @endif
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
			<!-- end modal -->
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
					      				//window.location.href = "{{URL::route('user-checklist-category')}}";
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
		
	</div><!--checklist-->
		<script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
	</div><!--col-xs-10-->


<script type="text/javascript">
	
	function clickCheckboxCat(cat,idTask){
		var name_input = 'input[type="checkbox"]#chk_cat_'+idTask;
		
			if($(name_input).is(':checked')) {
			var id= $(name_input).val();
			$(name_input).next().val(id);
			var $i= parseInt($("#count_complete").text())+1;
			var $j= parseInt($("#count_overdue").text());
			if ($j==0) { $j=$j; }
			else{ $j=$j-1; }

			$("#count_overdue").text($j);
			$("#count_complete").text($i);
			$("#warning"+idTask).hide();
			$.ajax({
				type: "post",
				url: "{{URL::route('check_Cat_complete', array('ac'=>1))}}",
				data: {
					id:$(name_input).val(),
					category: $('#cat'+cat).val(),
					startdate: $("#startdate"+idTask).val()
				},
				success: function(data){showCountTask(data,cat,idTask)}
			});
			$("#"+idTask).hide();
			$("#trCat"+cat).before($("#"+idTask)).show();
			$("#"+idTask).show();

		}else{
			$(name_input).next().val("");

			var $i= parseInt($("#count_complete").text())-1;
			var $j= parseInt($("#count_overdue").text());
			if ($j==0) { $j=$j; }
			else{ $j=$j+1; }

			$("#count_overdue").text($j);
			$("#count_complete").text($i);
			
			$.ajax({
				type: "post",
				url: "{{URL::route('check_Cat_complete', array('ac'=>0))}}",
				data: {
					id:$(name_input).val(),
					category: $('#cat'+cat).val(),
					startdate: $("#startdate"+idTask).val()
				},
				success: function(data){showCountTask(data,cat,idTask)}

			});
		}
	}
	function sortByCat(index){
		if($("#collapse-category" +index+" i").hasClass("fa fa-plus-square-o"))
	      	{	
	      		$("#collapse-category" +index+" i").removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
	      	}
	      	else
	      	{
	      		$("#collapse-category" +index+" i").removeClass("fa-minus-square-o").addClass("fa-plus-square-o");	
	      	}
	}
	function showCountTask(data,cat,id){
		data = $.parseJSON(data);
		$("#Cat_task"+cat).text(data['Counttask']);
		$("#Cat_overDue"+cat).text(data['Overdue']);
		$("#Cat_Completed"+cat).text(data['completed']);
		$("#warning"+id).replaceWith(data['waning']);
	}
 </script>
@endsection
