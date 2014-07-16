@extends('main')
@section('title')
Danh sách Dịch vụ
@endsection
@section('content')
<div id='container'>
	<div class="row">
		<div class="col-xs-1"></div>
		<div class="col-xs-10">
			<div class="top-list-vendor">
				<div class="top-list-vendor-title">
					Kết quả tìm kiếm với <span style="color: #19B5BC">keyword</span>
				</div>
				<div class="top-list-vendor-function">
					<a class="list-photo" href="#">
						<span class="glyphicon glyphicon-camera"></span>
						<p>PHOTO</p>
					</a>
					<a class="list-list" href="#">
						<span class="glyphicon glyphicon-list"></span>
						<p>LIST</p>
					</a>
					<a class="list-compare" href="#">
						<span class="glyphicon glyphicon-random"></span>
						<p>COMPARE</p>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-1"></div>
	</div>
	<div class="panel panel-default">
	  <div class="panel-body">
	    Basic panel example
	  </div>
	</div>
	<div class="row">
		<div class="col-xs-1"></div>
		<div class="col-xs-3">
			<div class="filter">FILTER HERE (FORWARD WE'll DEV IN FUTURE)</div>
		</div>
		<div class="col-xs-7">
			@foreach($vendors as $vendor)
			<div class="vendor-item">
				<div class="avatar"><img src="{{ $vendor->avatar }}"></div>
				<div class="category-name">{{ $vendor->category }}</div>
				<div class="name">{{ $vendor->name }}</div>
				<div class="clr"></div>
				<a href="#" class="compare">
					<span class='compare-checkbox'>
						<img src="{{Asset('icon/ui-check-box-uncheck-icon.png')}}">
					</span>
					<span class='compare-title'>Compare</span>
				</a>
			</div>
			@endforeach()
		</div>
		<div class="col-xs-1"></div>
	</div>
</div>
@endsection
