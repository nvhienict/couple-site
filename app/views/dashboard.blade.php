
@extends('main-dashboard')
@section('title')
Dashboard | thuna.vn
@endsection
@section('nav-dash')
	<!-- Navigation -->
	<div class="row bg-menu-top">
		<div class="navbar">
		  	<div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		      	</button>
		  	</div>
		  	<div class="navbar-collapse collapse navbar-responsive-collapse">
			    <ul class="nav navbar-nav">
			      	<li class="active">
			      		<a href="{{URL::route('index')}}" title="Trang chủ">
			      			Trang chủ
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('website')}}" title="Website cưới">
			        		Website cưới
			        	</a>
			        </li>
			      	<li><a href="{{URL::route('user-checklist')}}" title="Danh sách công việc">
			      			Danh sách công việc
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('guest-list')}}" title="Danh sách khác mời">
			      			Danh sách khách mời
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('budget')}}" title="Quăn lí ngân sách">
			      			Quản lí ngân sách
	 		      		</a>
			      	</li>
			      	<li class="dropdown">
				        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown" title="Âm nhạc">
							Âm nhạc
				        </a>
				        <ul class="dropdown-menu oneUl" role="menu">
				          	<li role="presentation" class="dropdown-header"><span>Nghi lễ</span>
					            <div class="row">
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('mo-dau'))}}">Mở đầu</a></li>
					                  <li><a href="{{URL::route('songs', array('doan-ruoc'))}}">Đoàn rước</a></li>
					                </ul>
					              </div>
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('nghi-thuc'))}}">Nghi thức</a></li>
					                  <li><a href="{{URL::route('songs', array('ket-thuc'))}}">Kết thúc</a></li>
					                </ul>
					              </div>
					            </div>
				          	</li>
				          	<li role="presentation" class="dropdown-header"><span>Đãi tiệc</span>
					            <div class="row">
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('khai-tiec'))}}">Khai tiệc</a></li>
					                  <li><a href="{{URL::route('songs', array('phat-bieu'))}}">Phát biểu</a></li>
					                  <li><a href="{{URL::route('songs', array('cat-banh'))}}">Cắt bánh</a></li>
					                </ul>
					              </div>
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('vao-tiec'))}}">Vào tiệc</a></li>
					                  <li><a href="{{URL::route('songs', array('chuc-mung'))}}">Chúc mừng</a></li>
					                  <li><a href="{{URL::route('songs', array('cuoi-tiec'))}}">Cuối tiệc</a></li>
					                </ul>
					              </div>
					            </div>
				          	</li>
				        </ul>
			      	</li> <!--/music-->

			      	<li><a href="{{URL::action('FortuneController@getIndex')}}" title="Xem ngày cưới">
			      			Xem ngày cưới
			      		</a>
			      	</li>
			    
			    </ul>
		  	</div>
		</div><!--/.nav-->
	</div><!--/.bg-menu-top-->
@endsection
@section('content')
	
	<div class="row">
		<div class="col-xs-12">
			<h2 style="color:#E75292;">Trang chủ</h2>
		</div>
	</div>

	<div class="row" style="margin-top: 1%;">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 bg-introduce">
			<h4>Chọn giao diện và cài đặt website của bạn</h4>
			<p>Giao diện website luôn được cập nhật liên tục, có nhiều giao diện đẹp đang chờ bạn.</p>
			<a class="btn btn-sd" href="{{URL::route('website')}}">Sử dụng ngay</a>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 bg-img-dash" style="margin-left:2%;">
			<img class="img-responsive" src="{{Asset('images/tool/website.png')}}">
		</div>
	</div>

	<div class="row" style="margin-top: 3%;">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 bg-img-dash" style="margin-right:2%;">
			<img class="img-responsive" src="{{Asset('images/tool/checklist.png')}}">
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 bg-introduce">
			<h4>Công cụ quản lí danh sách công việc đám cưới</h4>
			<p>Cập nhật công việc mỗi ngày sẽ giúp bạn chủ động trong mọi việc.Mọi việc sẽ sẽ diễn ra như ý muốn của bạn.</p>
			<a class="btn btn-sd" href="{{URL::route('user-checklist')}}">Sử dụng ngay</a>
		</div>
	</div>

	<div class="row" style="margin-top: 3%;">
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 bg-introduce">
			<h4>Công cụ quản lí ngân sách đám cưới</h4>
			<p>Kiểm tra ngân sách mỗi ngày sẽ giúp bạn quản lí ngân sách của đám cưới một cách chính xác, mọi việc đều nằm trong tầm kiểm soát của bạn.</p>
			<a class="btn btn-sd" href="{{URL::route('budget')}}">Sử dụng ngay</a>
		</div>
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 bg-img-dash" style="margin-left:2%;">
			<img class="img-responsive" src="{{Asset('images/tool/budget.png')}}">
		</div>
	</div>

	<div class="row" style="margin-top: 3%;">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 bg-img-dash" style="margin-right:2%;">
			<img class="img-responsive" src="{{Asset('images/tool/guestlist.png')}}">
		</div>
		<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
			
		</div>
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 bg-introduce">
			<h4>Công cụ quản lí khách mời đám cưới</h4>
			<p>Luôn luôn kiểm tra danh sách khách mời để đảm bảo rằng bạn sẽ không thiếu sót bất kì một người thân hay bạn bè đến chung vui cùng đám cưới của bạn.</p>
			<a class="btn btn-sd" href="{{URL::route('guest-list')}}">Sử dụng ngay</a>
		</div>
	</div>

@endsection