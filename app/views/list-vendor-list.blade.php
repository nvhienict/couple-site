@extends('main')
@section('title')
Danh sách Dịch vụ
@endsection
@section('content')
<div id='container'>
	<div class="panel panel-default">
	  <div class="panel-body">
	   	Kết quả tìm kiếm với <span style="color: #19B5BC">keyword</span>
	   	<div class="top-list-vendor-function">
					<a class="list-photo" href="{{ URL::to('list-vendor') }}">
						<span class="glyphicon glyphicon-camera"></span>
						<p>PHOTO</p>
					</a>
					<a class="list-list" href="{{ URL::to('list-vendor-list') }}">
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
	<div class="row">
		<div class="col-xs-1"></div>
		<div class="col-xs-3">
			<div class="filter">FILTER HERE (FORWARD WE'll DEV IN FUTURE)</div>
		</div>
		<div class="col-xs-7">
			<div class="vendor-item-list">
				<div class="vendor-item-list-left">
					<div class="avatar"><img src=""></div>
					<div class="category-name">Category</div>
				</div>
				<div class="vendor-item-list-right">
					<div class="name">Name</div>
					<div class="address">Address</div>
					<div class="decription-list">Decription..........
						<span class="label label-info">Detail</span>
					</div>
					<div class="list-vendor-function">
						<a class="list-check-rates" href="#">
						<span class="glyphicon glyphicon-th">Check-Rates</span>
						</a>
						<a class="list-check-rates" href="#">
							<span class="glyphicon glyphicon-envelope">Contact-Us</span>
						</a>
					</div>
					<a href="#" class="compare-list">
						<span class='compare-checkbox'>
							<img src="{{Asset('icon/ui-check-box-uncheck-icon.png')}}">
						</span>
						<span class='compare-title'>Compare</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-xs-1"></div>
	</div>
</div>
@endsection
