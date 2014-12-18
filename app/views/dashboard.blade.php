
@extends('main-dashboard')
@section('title')
Dashboard
@endsection

@section('content')
	<div class="content">
		<div class="col-md-3 col-sm-6 content-index-item">
			<div class="div-1">
				<i class="fa fa-file-text-o"></i>
				Danh sách công việc
			</div>
			<div class="div-2">
				Hoàn thành<br />
				<span>
					{{ChecklistController::countTasksComplete()}}/{{ChecklistController::countTasksToDo()}}
					&nbsp({{ChecklistController::countTasksCompletePercent()}}%)
				</span>
			</div>
			<div class="div-3">
				<a href="{{URL::route('user-checklist')}}">
					Xem chi tiết
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 content-index-item">
			<div class="div-1">
				<i class="fa fa-group"></i>
				Danh sách khách mời
			</div>
			<div class="div-2">
				Hoàn thành<br />
				<span>
					{{GuestController::getGuestInvited()}}/{{GuestController::getAllGuest()}}
					&nbsp({{GuestController::getGuestInvitedPercent()}}%)
				</span>
			</div>
			<div class="div-3">
				<a href="{{URL::route('guest-list')}}">
					Xem chi tiết
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 content-index-item">
			<div class="div-1">
				<i class="fa fa-dollar"></i>
				Quản lý ngân sách
			</div>
			<div class="div-2">
				Hoàn thành<br />
				<span>
					{{UserBudgetController::getDisplayMoneyTotal('pay')}}/{{UserBudgetController::getDisplayMoneyTotal('actual')}}
					&nbsp({{UserBudgetController::getDisplayMoneyTotalPercent()}}%)
				</span>
			</div>
			<div class="div-3">
				<a href="{{URL::route('budget')}}">
					Xem chi tiết
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 content-index-item">
			<div class="div-1">
				<i class="fa fa-globe"></i>
				Website cưới
			</div>
			<div class="div-2">
				Hoàn thành<br />
				<span>
					{{WebsiteController::getCountDataNull()}}/{{WebsiteController::getCountDataRequest()}}
					&nbsp({{WebsiteController::getCountDataPercent()}}%)
				</span>
			</div>
			<div class="div-3">
				<a href="{{URL::route('website')}}">
					Xem chi tiết
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<div style="clear:both;"></div>

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
		                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
		                                            40%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="warning">
            		 					<td>Chưa mời</td>
            		 					<td>
            		 						<div class="progress progress-striped active">
		                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
		                                            40%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="info">
            		 					<td>Đã xác nhận</td>
            		 					<td>
            		 						<div class="progress progress-striped active">
		                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
		                                            60%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="danger">
            		 					<td>Chưa xác nhận</td>
            		 					<td>
            		 						<div class="progress progress-striped active">
		                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
		                                            40%
		                                        </div>
		                                    </div>
										</td>
            		 				</tr>
            		 				<tr class="active">
            		 					<td>Tổng số khách</td>
            		 					<td>
            		 						<div class="progress">
	            		 						<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
												    500
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
		            		<tbody>
		            			<tr class="warning">
		            				<td>Hình nền</td>
		            				<td>Chưa có</td>
		            			</tr>
		            			<tr class="success">
		            				<td>Ảnh chú rể</td>
		            				<td>Sẵn sàng</td>
		            			</tr>
		            			<tr class="warning">
		            				<td>Ảnh cô dâu</td>
		            				<td>Chưa có</td>
		            			</tr>
		            			<tr class="success">
		            				<td>Tên cô dâu</td>
		            				<td>Sẵn sàng</td>
		            			</tr>
		            			<tr class="warning">
		            				<td>Tên chú rể</td>
		            				<td>Chưa có</td>
		            			</tr>
		            			<tr class="warning">
		            				<td>Giới thiệu cô dâu</td>
		            				<td>Chưa có</td>
		            			</tr>
		            			<tr class="success">
		            				<td>Giới thiệu chú rể</td>
		            				<td>Sẵn sàng</td>
		            			</tr>
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
        </script>


	</div>
	<!-- /.content -->

	<script type="text/javascript" src="{{Asset("assets/js/morris/raphael.min.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/morris/morris.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/morris/morris-data.js")}}"></script>

@endsection