
@extends('main-dashboard')
@section('title')
Dashboard
@endsection

@section('content')


	
	 <!-- <div class="col-lg-12 thong-ke"> -->
		<!-- <div id="morris-bar-chart" style="height: 400px;"></div> -->
	<!-- </div>/thong ke -->

	<div class="data-hidden" style="display:none;">
		<div class="thong-ke-cong-viec">
			{{ChecklistController::countTasksCompletePercent()}}
		</div>
		<div class="thong-ke-khach-moi">
			{{GuestController::getGuestInvitedPercent()}}
		</div>
		<div class="thong-ke-ngan-sach">
			{{UserBudgetController::getDisplayMoneyTotalPercent()}}
		</div>
		<div class="thong-ke-website">
			{{WebsiteController::getCountDataPercent()}}
		</div>
	</div>

	<script type="text/javascript" src="{{Asset("assets/js/morris/raphael.min.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/morris/morris.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/morris/morris-data.js")}}"></script>

@endsection