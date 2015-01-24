@extends('main')
@section('title')
Công cụ lập kế hoạch | thuna.vn
@endsection
@section('nav-bar')
@include('intruduce.nav-planner')
@endsection
@section('content')

<div class="row" id="menu-bar-bottom" style="margin-top: 50px;">
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#checklist" role="tab" data-toggle="tab" class="active" >
			<i class="fa fa-list fa-2x"></i>
			<span>Danh sách công việc</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#budget" role="tab" data-toggle="tab" >
			<i class="fa fa-dollar fa-2x"></i>
			<span>Quản lý ngân sách</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#guestlist" role="tab" data-toggle="tab" >
			<i class="fa fa-users fa-2x"></i>
			<span>Danh sách khách mời</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#website" role="tab" data-toggle="tab" >
			<i class="fa fa-globe fa-2x"></i>
			<span>Website cưới</span>
		</a>
	</div>
</div>

<div id="load-content" class="tab-content tab-content-index" style="margin-bottom: 50px;">
	<div role="tabpanel" class="tab-pane active" id="checklist">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Công cụ cung cấp cho cô dâu và chú rể danh sách những công việc 
					cần làm trước ngày cưới, chi tiết và gần như đầy đủ.</p>
					<p>Thuận lợi, sắp xếp một cách khoa học: theo tháng và theo danh mục</p>
					<p>Có thể thêm, xóa, sửa nội dung từng công việc cụ thể</p>
					<p>In báo cáo bằng file Excel để dễ lưu trữ và kiểm tra tốt hơn</p>
				</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('user-checklist')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/checklist.png')}}">
			</div>

		</div>
	</div>
  	<div role="tabpanel" class="tab-pane" id="budget">
  		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/budget.png')}}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Sử dụng dễ dàng, tính toán một cách chính xác, phân bố ngân sách chi tiết, hợp lý.</p>

				</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('budget')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
		</div>
  	</div>
  	<div role="tabpanel" class="tab-pane" id="guestlist">
  		<div class="row">	
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/guestlist.png')}}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Có thể thêm nhóm khách, từng khách riêng lẻ.</p>
					<p>Kiểm tra tình trạng khách mời cho buổi tiệc: đã mời hay chưa mời</p>
					<p>Cung cấp mã xác nhận cho từng khách hàng thông Website cưới của bạn, 
					được tạo <a href="{{URL::route('website')}}">tại đây</a></p>
				</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('guest-list')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
		</div>
  	</div>
  	<div role="tabpanel" class="tab-pane" id="website">
  		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Với một số giao diện của chúng tôi, cho phép bạn tạo ra những giao diện đẹp và bắt mắt.</p>
					<p>Lưu giữ những câu chuyện tình lãng mạng, chia sẻ những bức ảnh đáng nhớ, 
					những dòng tâm sự hạnh phúc của 2 bạn với người thân và bạn bè khắp mọi nơi.</p>
					<p>Thân thiện, miễn phí, dễ sử dụng và đạt thẩm mỹ là những gì chúng tôi hướng đến.</p>
				</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('website')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/website.png')}}">
			</div>
		</div>
  	</div>
</div> <!--/.tab-content-->

@endsection