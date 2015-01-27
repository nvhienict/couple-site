<div class="col-lg-10 col-lg-offset-1 content-thong-ke">
			
	<div class="row" style="margin:0">
		<div class="col-lg-3 col-sm-6 content-index-item">
			<div class="border-dv">
				<div class="div-2">
					<span><i class="fa fa-file-text-o" style="font-size:3em;color: #b4b4b4"></i></span>				
				</div>
				<div class="div-3 text-center" >
					<span style="color:#F44C9B;font-weight:bold;font-size:16px;">
						{{ChecklistController::countTasksComplete()}}/{{ChecklistController::countTasksToDo()}}
						&nbsp |  &nbsp({{ChecklistController::countTasksCompletePercent()}}%)
					</span>
				</div>
			</div>
			<div class="div-1">				
				Danh sách công việc
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 content-index-item">
			<div class="border-dv">
				<div class="div-2">
					<span><i class="fa fa-group" style="font-size:3em;color: #b4b4b4"></i></span>
				</div>
				<div class="div-3 text-center">
					<span style="color:#F44C9B;font-weight:bold;font-size:16px;">
						{{GuestController::getGuestInvited()}}/{{GuestController::getAllGuest()}}
						&nbsp |  &nbsp({{GuestController::getGuestInvitedPercent()}}%)
					</span>
				</div>
			</div>
			<div class="div-1">
				Danh sách khách mời
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 content-index-item">
			<div class="border-dv">
				<div class="div-2">
					<span><i class="fa fa fa-dollar" style="font-size:3em;color: #b4b4b4"></i></span>
				</div>
				<div class="div-3 text-center">
					<span style="color:#F44C9B;font-weight:bold;font-size:16px;">
						{{UserBudgetController::getDisplayMoneyTotal('pay')}}/{{UserBudgetController::getDisplayMoneyTotal('actual')}}
						&nbsp |  &nbsp ({{UserBudgetController::getDisplayMoneyTotalPercent()}}%)
					</span>
				</div>
			</div>
			<div class="div-1">
				Quản lý ngân sách
			</div>
		</div>

		<div class="col-lg-3 col-sm-6 content-index-item">
			<div class="border-dv">
				<div class="div-2">
					<span><i class="fa fa-globe" style="font-size:3em;color: #b4b4b4"></i></span>		
				</div>
				<div class="div-3 text-center" >
					<span style="color:#F44C9B;font-weight:bold;font-size:16px;">
						{{WebsiteController::getCountDataPercent()}}%
					</span>
				</div>
			</div>
			<div class="div-1" >
				Website cưới
			</div>
		</div>
	</div><!--/.row-->
</div><!--/.content-thong-ke-->