@extends('main')
@section('content')
	<head>
		<title>Detail vendor</title>
		<link href="{{Asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="{{Asset('assets/css/bootstrap-theme.min.css')}}" rel="stylesheet">
		<link href="{{Asset('assets/css/style.css')}}" rel="stylesheet">
		<link href="{{Asset('assets/js/bootstrap.min.js')}}" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	</head>
	<body id="body-detailvendor">
		<div class="row" id="infor-vendor">
			<div class="container">
			<div class="col-xs-12 col-sm-6 col-md-8">
				
				<div class="row">
						<div class="col-xs-4 col-sm-4" id="left-infor">
							<a href="#" id="left-infor title-infor">Địa điểm đám cưới Đà Nẵng</a>
							<div id="left-infor avata-vendor">
								<img src="{{Asset('images/maia-resort.jpg')}}" class="img-responsive" alt="Responsive image">
								<div class="fb-like" data-href="https://www.facebook.com/thuna.1987" data-width="150px" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
								
							</div>
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));
							</script>
						</div>
						<div calss="col-xs-8 col-sm-6" id="right-infor">
							<h3 id="right-infor name">Fusion Maia Resort-Trường Sa.</h3>
							<p id="right-infor address">Trường Sa, Quận Ngũ Hành Sơn<a href="" id="right-infor map"> |Map.</a></p>
							<p id="right-infor web"><b>Website</b>:<a href="http://www.fusionmaiadanang.com"id="right-infor link"> Ghé thăm Website của tôi</a></p>
							<p id="right-infor service"><b>Dịch vụ</b>: Nhà hàng, khu du lịch.</p>
							<p id="right-infor catering"><b>Phục vụ</b>: Vui chơi, ẩm thức, giải trí, thư giãn...Sức chứa 200 người lớn.</p>
							<p id="right-infor capaty"><b>Sức chứa</b>: 200 người lớn.</p>
						


						</div>

					</div><!-- -End infor vendor -->

					
					<div class="tab-menu">
										
							<!-- Nav tabs -->
						<ul  class="nav nav-tabs" id="vendor-menu" role="tablist"  >
							  <li class="active"><a data-toggle="tab" href="#aboutme">Hồ sơ</a></li>
							  <li class="boder-style"><a data-toggle="tab" href="#review" >Nhận xét</a></li>
							  <li class="boder-style"><a data-toggle="tab" href="#photos" >Ảnh</a></li>
							  <li class="boder-style"><a data-toggle="tab" href="#video" >Video</a></li>
							  <li class="boder-style"><a data-toggle="tab" href="#FAQ">FAQ</a></li>
							  <li class="boder-style"><a data-toggle="tab" href="#map">Map</a></li>
						</ul>

						
					<div class="tab-content">
					  <div class="tab-pane active" id="aboutme">
					  		<div id="content-vendor">
								<h4> Đôi nét về chúng tôi</h4>
								<p>Ở đây có đầy đủ tiện nghi : dịch vụ giặt là, cho thuê xe, dụng cụ các món nướng, dịch vụ đưa đón, tiện nghi cho người khuyết tật chỉ là một vài trong số những thiết bị được lắp đặt tại Fusion Maia resort- All spa inclusive ngoài một số khách sạn khác trong thành phố. Phòng tắm nước khoáng nóng, bóng bàn, bể bơi trong nhà, câu cá ở Fusion Maia resort thật sự rất tuyệt. Là một nơi lý tưởng cho du khách nghỉ chân tìm kiếm sự thoải mái và tiện nghi ở Đà Nẵng.</p>
									
							</div>
					  </div>
					  <div class="tab-pane" id="review">
					  		@yield('tab-review')
					  		<p>Review</p>
					  </div>
					  <div class="tab-pane" id="photos">
					  		
					  		@yield('tab-photos')
					  		<p>Photos</p>
					  </div>
					  <div class="tab-pane" id="video">
					  		@yield('tab-video')
					  		<p>video</p>
					  </div>
					  <div class="tab-pane" id="FAQ">
					  		@yield('tab-FAQ')
					  		<p>FAQ</p>

					  </div>
					  <div class="tab-pane" id="map">
					  		@yield('tab-map')
					  		<p>Map</p>
					  </div>

					  <script type="text/javascript">
						$(function () {
    						$('#vendor-menu a:last').tab('show');
 						 });
					</script>
					</div>

					
				</div>
			
		</div>
			<div class="col-xs-6 col-md-4">
					<div class="contact-me">
						<h3> <i class="glyphicon glyphicon-earphone"></i> 01234 856 856 </h3>
						<p>Xin vui lòng cho biết nhà cung cấp này bạn tìm thấy trên Thuna.vn</p>
					<div  class="form">
							<form class="form-horizontal" role="form">
							  <div class="form-group">
							    <div class="">
							      <input type="text" class="form-control" id="input-firstname" value="Phước">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <input type="text" class="form-control" id="Input-lastname" value="Bình">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <input type="email" class="form-control" id="input-email" value="aaa@gmail.com">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <input type="date" class="form-control" id="date-wedding" value="25/07/2014">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <select class="form-control">
									  <option> Gởi thông tin qua mail cho tôi</option>
									  <option> Hãy gọi cho tôi </option>
									  <option> Đặt một câu hỏi</option>
								  </select>
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <button type="button" class="btn btn-primary btn-lg active" id="btn-contact"style="background-color: #f7dde7;border-color: #f7dde7"> Liên lạc</button>
							  </div>
							</div>
							 <div class="form-group">
							   <a href="" class="compare-btn">
							        <span class="compare-checkbox checked"><input type="checkbox"></span>
							        <span class="compare-link-text">So Sánh</span>
							    </a>
							  </div>
							</form>
					</div>
					<div class="action">
						<a href="#"><i class="glyphicon glyphicon-star yellow"></i> Viết phản hồi</a><br/>
						<a href="#"><i class="glyphicon glyphicon-heart pink"></i> Lưu nhà cung cấp dịch vụ này</a><br/>
						<img src="{{Asset('icon/icon-fb.jpg')}}"><a href="#"> Tìm tôi trên Facebook</a><br/>
						<img src="{{Asset('icon/twitter.jpg')}}"><a href="#"> Theo dõi tôi trên twitter</a><br/>
						<img src="{{Asset('icon/pin.jpg')}}"><a href="#"> Theo dõi tôi trên Pinterest</a>
					</div>
					
				</div>
			</div>
			</div>
		</div>
		
	</body>
@endsection