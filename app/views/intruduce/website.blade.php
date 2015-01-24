@extends('main')
@section('title')
Webite cưới | thuna.vn
@endsection
@section('nav-bar')
@include('intruduce.nav-website')
@endsection
@section('content')

	<div class="row" style="margin: 50px auto;">
		<div class="col-xs-12 col-sm-6 col-md-5 col-md-offset-1 col-lg-5 col-lg-offset-1 des-index-tool">
			<h5 class="introduce-index">
				<p>Chỉ cần <a href="{{URL::route('login')}}">Đăng nhập</a> 
				sau đó chọn một trong những giao diện.</p>
				<p>Thay đổi nội dung, hình ảnh cho Website của bạn rất đơn giản: 
				Chỉ cần <strong>click</strong> trên phần nội dung, <strong>chọn</strong> 
				Đổi ảnh, mọi thao tác nhanh và tiện lợi.</p>
				<img class="img-responsive" src="{{Asset('images/tool/edit-website.png')}}">
			</h5>
			<h6 class="use-now">
				<a class="btn btn-success btn-sm" href="{{URL::route('website')}}" >Miễn phí! Sử dụng ngay</a>
			</h6>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
			<img class="img-responsive" src="{{Asset('images/tool/chose-themes.png')}}">
		</div>

	</div>

@endsection