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
				<form action="{{URL::route('money_budget')}}" method="post">
					<div class="row form-group">
						<label for="money_budget" class="col-xs-2 control-label">Số tiền</label>
						<div class="col-xs-7">
						   	<input type="text" class="form-control" name="money_budget" id="money_budget" placeholder="VND" />
						</div>
					</div>
					<div class="row form-group">
						<div class="col-xs-4"></div>
						<div class="col-xs-4">
						   	<button type="submit" class="btn btn-success">OK</button>
						</div>
						<div class="col-xs-4"></div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-xs-3"></div>
	</div> <!-- row -->
</div><!--container-->
@endsection