
@extends('main-dashboard')
@section('title')
Dashboard
@endsection

@section('content')
	
	<div class="row" style="margin-top: 50px;">
		<div class="col-xs-12">
			<h2 style="color:#E75292; font-size:25px;">Chọn giao diện và cài đặt website của bạn</h2>
		</div>
	</div>

	<div class="row" style="margin-top: 20px;">
		
		@for($i=1; $i<=21; $i++)
			<div class="col-sm-6 col-lg-4 col-md-4 col-xs-12 text-center hover-theme" style="margin-bottom: 2%">
				<a href="javascript:void(0);" style="outline: none">
					<img style="width: 100%; height: 300px " src="{{Asset("images/website/tmp/{$i}.jpg")}}">
				</a>				
				<a href="{{URL::route('view_theme', array('id'=>"{$i}"))}}" target="_blank" class="btn btn-default btn-pre">Xem trước</a>		
				<a href="{{URL::route('header-website', array('id'=>"{$i}"))}}" class="btn btn-default btn-select">Chọn</a>				
			</div>
		@endfor
	
	</div>

@endsection