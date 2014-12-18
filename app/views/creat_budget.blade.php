
@extends('main-dashboard')
@section('title')
Quản lý ngân sách
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

	<div class="row creat_budget">
		<div class="col-lg-9 col-lg-offset-3 col-sm-10 col-sm-offset-2 col-xs-11 col-xs-offset-1">
			<div class="row">
				<div class="row form-group">
					<h1 class="title-create-budget">Nhập vào số tiền dự toán của bạn</h1>
				</div>
			</div>
			<div class="row">
				<form id="form-create-money" action="{{URL::route('money_budget')}}" method="post" autocomplete="off">
					<div class="row form-group">
						<div class="col-lg-6 col-lg-offset-1 col-sm-7 col-sm-offset-1 col-xs-10">
							<input type="text" onkeyup="key_money(event)" class="form-control" id="money_budget1" name="money_budget1" placeholder="Nhập số tiền"  />
						   	<input type="text" hidden name="money_budget" id="money_budget"/>
						</div>
						<small>VND</small>
					</div>
					<div class="row form-group">
						<div class="col-lg-4 col-lg-offset-3 col-sm-4 col-sm-offset-3 col-xs-4 col-xs-offset-2">
						   	<button type="submit" id="submit_money" class="btn btn-success">Tính tổng chi phí</button>
						</div>
					</div>
				</form>
				<script type="text/javascript">


					$("#form-create-money").validate({
						rules:
						{
							money_budget1:
							{
								required:true
							}
						},
						messages:
						{
							money_budget1:
							{
								required:"Bạn chưa nhập số tiền"
							}
						}
					})
				
	                function key_money(event){
		                if(event.which >= 37 && event.which <= 40) return;
			                $("#money_budget1").val(function(index, value) {
						        return value
						            .replace(/\D/g, '')
						            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						            $('#money_budget').val($("#money_budget1").val().replace(/,/gi,''));
						    	});
			                $('#money_budget').val($("#money_budget1").val().replace(/,/gi,''));    
			            };
				
				</script>
			</div>
		</div>
		<div class="col-xs-3"></div>
	</div> <!-- row -->

@endsection