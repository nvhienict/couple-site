
@extends('main-dashboard')
@section('title')
Dashboard
@endsection

@section('content')
	<div class="content">

		<div class="panel panel-default hidden-xs">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Biểu đồ thống kê
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="txt">Danh sách công việc</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu" id="myStatistic">
                            <li value="checklist">
                            	<a href="javascript:;">Danh sách công việc</a>
                            </li>
                            <li value="guestlist">
                            	<a href="javascript:;">Danh sách khách mời</a>
                            </li>
                            <li value="budget">
                            	<a href="javascript:;">Quản lý ngân sách</a>
                            </li>
                            <li class="divider"></li>
                            <li value="website">
                            	<a href="javascript:;">Website cưới</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            	<!-- checklist -->
            	<div class="col-lg-12 active" id="checklist">
            		 <div id="morris-bar-chart" style="height: 300px;"></div>
            	</div>

            	<div class="col-lg-12" id="budget">
            		 <div id="morris-donut-chart" ></div>
            	</div>

            	
            	<div class="col-lg-12" id="guestlist">
            		 	<div class="table-responsive">
            		 		<table class="table table-hover">
            		 			<thead>
            		 				<tr>
            		 					<th>#</th>
            		 					<th>Chi tiết</th>
            		 				</tr>
            		 			</thead>
            		 			<tbody>
            		 				<tr class="success">
            		 					<td>Đã mời</td>
            		 					<td>
            		 						<div class="progress progress-striped active">
		                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
		                                            {{ GuestController::getGuestInvitedPercent() }}%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="warning">
            		 					<td>Chưa mời</td>
            		 					<td>
            		 						<div class="progress progress-striped active">
		                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
		                                            {{ GuestController::getGuestOverInvitedPercent() }}%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="info">
            		 					<td>Đã xác nhận</td>
            		 					<td>
            		 						<div class="progress progress-striped active">
		                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
		                                            {{ GuestController::getGuestConfirmPercent() }}%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="danger">
            		 					<td>Chưa xác nhận</td>
            		 					<td>
            		 						<div class="progress progress-striped active">
		                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" >
		                                            {{ GuestController::getGuestNotConfirmPercent() }}%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="active">
            		 					<td>Tổng số khách</td>
            		 					<td>
            		 						<div class="progress">
	            		 						<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%" >
												    {{ GuestController::getAllGuest() }}
												</div>
											</div>
										</td>
            		 				</tr>
            		 			</tbody>
            		 		</table>
            		 	</div>
            	</div>

        		<div class="col-lg-12" id="website">
		           		<table class="table table-striped table-hover">
		            		<thead>
		            			<tr>
		            				<th>#</th>
		            				<th>Tình trạng</th>
		            			</tr>
		            		</thead>
		            		<tbody class="tbl-website">
		            			@foreach( WebsiteController::getDataDashboard() as $item )
		            			<tr>
		            				<td>Hình nền</td>
		            				<td>
		            					@if( $item->background == null )
		            					Chưa có
		            					@else
		            					Sẵn sàng
		            					@endif
		            				</td>
		            			</tr>
		            			<tr>
		            				<td>Ảnh chú rể</td>
		            				<td>
		            					@if( $item->avatar_groom == null )
		            					Chưa có
		            					@else
		            					Sẵn sàng
		            					@endif
		            				</td>
		            			</tr>
		            			<tr>
		            				<td>Ảnh cô dâu</td>
		            				<td>
		            					@if( $item->avatar_bride == null )
		            					Chưa có
		            					@else
		            					Sẵn sàng
		            					@endif
		            				</td>
		            			</tr>
		            			<tr>
		            				<td>Tên chú rể</td>
		            				<td>
		            				@if( $item->name_groom == null )
		            					Chưa có
		            					@else
		            					Sẵn sàng
		            					@endif
		            				</td>
		            			</tr>
		            			<tr>
		            				<td>Tên cô dâu</td>
		            				<td>
		            					@if( $item->name_bride == null )
		            					Chưa có
		            					@else
		            					Sẵn sàng
		            					@endif
		            				</td>
		            			</tr>
		            			<tr>
		            				<td>Giới thiệu chú rể</td>
		            				<td>
		            					@if( $item->about_groom == null )
		            					Chưa có
		            					@else
		            					Sẵn sàng
		            					@endif
		            				</td>
		            			</tr>
		            			<tr>
		            				<td>Giới thiệu cô dâu</td>
		            				<td>
		            					@if( $item->about_bride == null )
		            					Chưa có
		            					@else
		            					Sẵn sàng
		            					@endif
		            				</td>
		            			</tr>
		            			@endforeach
		            		</tbody>
		            	</table>
		        </div>
            	
                	
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <script type="text/javascript">
        	$('#myStatistic li').click(function(){
        		var $liValue 	= $(this).attr('value');
        		var $txt 		= $(this).text();
        		$('span.txt').text($txt);

        		$('.panel-body div').removeClass('active');
        		$('#'+$liValue).addClass('active');
        		$('.panel-body div.active').show();

        	});


        	var $cssSuccess = $('.progress-bar-success').text();
        	var $cssWarning = $('.progress-bar-warning').text();
        	var $cssInfo = $('.progress-bar-info').text();
        	var $cssDanger = $('.progress-bar-danger').text();

        	$('.progress-bar-success').css("width", ""+$cssSuccess+"");
        	$('.progress-bar-warning').css("width", ""+$cssWarning+"");
        	$('.progress-bar-info').css("width", ""+$cssInfo+"");
        	$('.progress-bar-danger').css("width", ""+$cssDanger+"");

        	if ( ($('.tbl-website tr td:eq(1)').text())==='Chưa có' ) {
        		$('.tbl-website tr').addClass('warning');
        	} else {
        		$('.tbl-website tr').addClass('success');
        	};
        	


        </script>


	</div>
	<!-- /.content -->

	<div class="data-hidden" style="display:none;">
		<div class="task-do-not">
			{{ChecklistController::countTasksToDo()-(ChecklistController::countTasksComplete()+ChecklistController::overdue())}}
		</div>
		<div class="task-did">
			{{ChecklistController::countTasksComplete()}}
		</div>
		<div class="task-over-do">
			{{ChecklistController::overdue()}}
		</div>
		<div class="task-to-do">
			{{ChecklistController::countTasksToDo()}}
		</div>
	</div>

	<script type="text/javascript" src="{{Asset("assets/js/morris/raphael.min.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/morris/morris.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/morris/morris-data.js")}}"></script>

@endsection