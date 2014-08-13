@extends('main')
@section('title')
Budget
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-6">
			<div class="row">
				<div class="row form-group"><h1>Nhập vào số tiền dự toán của bạn</h1></div>
			</div>
			<div class="row">
				<form id="form-create-money" action="{{URL::route('money_budget')}}" method="post">
					<div class="row form-group">
						<label for="money_budget" class="col-xs-2 control-label">Số tiền</label>
						<div class="col-xs-7">
						   	<input type="text" class="form-control" name="money_budget" id="money_budget" placeholder="Nhập số tiền" />
						</div>
						<small> Đơn vị: triệu VND</small>
					</div>
					<div class="row form-group">
						<div class="col-xs-4">
							
						</div>
						<div class="col-xs-4">
						   	<button type="submit" class="btn btn-success">Tính tổng chi phí</button>
						</div>
						<div class="col-xs-4"></div>
					</div>
				</form>
				<script type="text/javascript">
				$("#form-create-money").validate({
					rules:
					{
						money_budget:
						{
							required:true,
							number:true,
							range:[50,1000]
						}
					},
					messages:
					{
						money_budget:
						{
							required:"Chưa nhập số tiền",
							number:"Nhập không đúng định dạng số",
							range:" Hệ thống chỉ tính toán vs số tiền từ 50 triệu tới 1 tỷ"
						}
					}
				})
				</script>
			</div>
		</div>
		<div class="col-xs-3"></div>
	</div> <!-- row -->
</div><!--container-->
@endsection