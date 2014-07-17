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
					<a class="list-photo" href="{{route('list-vendor-display', array('display'=>'photo'))}}">
						<span class="glyphicon glyphicon-camera"></span>
						<p>PHOTO</p>
					</a>
					<a class="list-list" href="{{route('list-vendor-display', array('display'=>'list'))}}">
						<span class="glyphicon glyphicon-th"></span>
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
			<div class="vendor-item">
				<div class="avatar"><img src=""></div>
				<div class="category-name">Category</div>
				<div class="name">Name</div>
				<div class="clr"></div>
				<a href="#" class="compare">
					<span class='compare-checkbox'>
						<img src="{{Asset('icon/ui-check-box-uncheck-icon.png')}}">
					</span>
					<span class='compare-title'>Compare</span>
				</a>
			</div>
		</div>
		<div class="col-xs-1"></div>
	</div>
</div>
@endsection
