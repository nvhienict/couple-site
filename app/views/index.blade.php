@extends('main')
@section('title')
	Trang chủ | thuna.vn
@endsection
<script>
    var url = {
        {{--base: '{{ URL::to() }}',--}}
        current: '{{ URL::current() }}',
        previous: '{{ URL::previous() }}',
        validateFrmRegister: '{{ URL::route('check_user_email') }}',
        loginFb: '{{URL::to('login-facebook')}}'
    }
</script>
@section('nav-bar')

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
		      	<li><a href="{{URL::to('website-introduce')}}" title="Website cưới">
		        		Website cưới
		        	</a>
		        </li>
		      	<li><a href="{{URL::to('planning-tool')}}" title="Công cụ lập kế hoạnh">
		      			Công cụ lập kế hoạch
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
<!-- <div class="row lr-bottom-menu"></div> -->
	  
@include('site-map')

@endsection

@section('content')

<div class="row slider-index">
	<div class="col-md-12 hidden-sm hidden-xs" style="padding:0" >

		<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src=" {{Asset("images/slide-main/1.jpg")}}" alt="">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <!-- <h2><span>Liên hệ ngay !!! <br /> Để được tư vấn miễn phí</span></h2> -->
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    @for($i=2; $i<=5; $i++)
				    <div class="item">
				    	<img src="{{Asset("images/slide-main/{$i}.jpg")}}" alt="">
	                    <!-- Static Header -->
	                    <div class="header-text hidden-xs">
	                        <div class="col-md-12 text-center">
	                            <!-- <h2><span>Liên hệ ngay !!! <br /> Để được tư vấn miễn phí</span></h2> -->
	                        </div>
	                    </div><!-- /header-text -->
				    </div>
			    @endfor
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div><!-- /.carousel -->
	</div><!--/.col-->

	<!-- FORM REGISTER -->
		<div class="col-md-3 col-xs-12 form-register-index hidden-sm hidden-xs">
			<h6 class="user_register_title">
				Đăng ký tài khoản miễn phí<br />
				<a href="http://thuna.vn/" style="color: #ea4398">Thuna.vn</a>
			</h6>

		    @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>@endif
		    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount" class="frm-register">
		      	<div class="row">
			      	<div class="col-md-12">
			          	<div class="form-group">
			            	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="1" autofocus>
			            	@foreach ($errors->get('email') as $message)
			              		<p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
			            	@endforeach
			          	</div>
			        </div>
		        </div>
		      	<div class="row">
		        	<div class="col-md-12">
		          
			            <div  class="input-append form-group">
			              <input data-format="yyyy-MM-dd" type="text" readonly name="weddingdate" id="weddingdate" class="form-control input-lg " placeholder="Ngày cưới" tabindex="2">
			              <script type="text/javascript">
			                    $('#weddingdate').bind("mousewheel", function() {
			                     return false;
			                 });
			              </script>
			              <!-- <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span> -->
			              @foreach ($errors->get('weddingdate') as $message)
			                <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
			              @endforeach
			              <script type="text/javascript">
			                $(function() {
			                  $('#weddingdate').datetimepicker({
			                    format: 'Y-m-d',
			                    timepicker:false
			                  });
			                });
			              </script>
			            </div>
		        	</div>
		      	</div>
		      	<div class="row">
			        <div class="col-md-12">
			          <div class="form-group">
			            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mật khẩu" tabindex="3">
			            @foreach ($errors->get('password') as $message)
			              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
			            @endforeach
			          </div>
			        </div>
			        <div class="col-md-12">
			          <div class="form-group">
			            <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="Xác nhận mật khẩu" tabindex="4">
			            @foreach ($errors->get('password_confirm') as $message)
			              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
			            @endforeach
			            <input type="text" name="role" id="role" hidden value="2">
			          </div>
			        </div>
		      	</div>
		      	<div class="row">
		        	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		        		<div class="form-group">
							<button type="submit" class="btn btn-register" tabindex="5" >Đăng ký</button>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		        		<div class="form-group">
					      	<a href="javascript:;" onclick="loginFb();" class="btn btn-social btn-facebook bn-login-fb-index">
						      <i class="fa fa-facebook"></i> Login Facebook
						    </a>
						    <script src="//connect.facebook.net/en_US/all.js"></script>
						    <div id="fb-root"></div>
						    <script type="text/javascript" src="{{Asset('assets/js/login-fb.js')}}"></script>
						</div>
					</div>
				</div>
		    </form>
			<script type="text/javascript" src="{{Asset('assets/js/validate-frm-register-index.js')}}"></script>
		<!-- END FORM REGISTER -->

</div><!--/.row -->

<div class="row" id="menu-bar-bottom">
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#checklist" role="tab" data-toggle="tab" class="active" title="Danh sách công việc" >
			<!-- <img src="{{Asset('icon/task.png')}}"><br /><br /> -->
			<i class="fa fa-list fa-2x"></i>
			<span class="hidden-xs">Danh sách công việc</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#budget" role="tab" data-toggle="tab" title="Quản lý ngân sách" >
			<!-- <img src="{{Asset('icon/data31.png')}}"><br /><br /> -->
			<i class="fa fa-dollar fa-2x"></i>
			<span class="hidden-xs">Quản lý ngân sách</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#guestlist" role="tab" data-toggle="tab" title="Danh sách khách mời" >
			<!-- <img src="{{Asset('icon/group12.png')}}"><br /><br /> -->
			<i class="fa fa-users fa-2x"></i>
			<span class="hidden-xs">Danh sách khách mời</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#website" role="tab" data-toggle="tab" title="Website cưới" >
			<!-- <img src="{{Asset('icon/internet5.png')}}"><br /><br /> -->
			<i class="fa fa-globe fa-2x"></i>
			<span class="hidden-xs">Website cưới</span>
		</a>
	</div>
</div>
<script type="text/javascript">
	$('#menu-bar-bottom div a').click(function(){
		$('#menu-bar-bottom div a').removeClass('active');
		$(this).addClass('active');
	});
</script>

<div id="load-content" class="tab-content tab-content-index" style="margin-bottom: 50px;">
	<div role="tabpanel" class="tab-pane active" id="checklist">
		<div class="container">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Công cụ cung cấp cho cô dâu và chú rể danh sách những công việc 
					cần làm trước ngày cưới, chi tiết và gần như đầy đủ.</p>
					<p>Thuận lợi, sắp xếp một cách khoa học: theo tháng và theo danh mục</p>
					<p>Có thể thêm, xóa, sửa nội dung từng công việc cụ thể</p>
					<p>In báo cáo bằng file Excel để dễ lưu trữ và kiểm tra tốt hơn</p>
				</h5>
				<h6 class="use-now">
					<a class="btn btn-sm btn-use-now" href="{{URL::route('user-checklist')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/checklist.gif')}}">
			</div>

		</div>
	</div>
  	<div role="tabpanel" class="tab-pane" id="budget">
  		<div class="container">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/budget.gif')}}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Sử dụng dễ dàng, tính toán một cách chính xác, phân bố ngân sách chi tiết, hợp lý.</p>

				</h5>
				<h6 class="use-now">
					<a class="btn btn-sm btn-use-now" href="{{URL::route('budget')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
		</div>
  	</div>
  	<div role="tabpanel" class="tab-pane" id="guestlist">
  		<div class="container">	
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/guestlist.gif')}}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Có thể thêm nhóm khách, từng khách riêng lẻ.</p>
					<p>Kiểm tra tình trạng khách mời cho buổi tiệc: đã mời hay chưa mời</p>
					<p>Cung cấp mã xác nhận cho từng khách hàng thông Website cưới của bạn, 
					được tạo <a href="{{URL::route('website')}}">tại đây</a></p>
				</h5>
				<h6 class="use-now">
					<a class="btn btn-sm btn-use-now" href="{{URL::route('guest-list')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
		</div>
  	</div>
  	<div role="tabpanel" class="tab-pane" id="website">
  		<div class="container">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 des-index-tool">
				<h5 class="introduce-index">
					<p>Với một số giao diện của chúng tôi, cho phép bạn tạo ra những giao diện đẹp và bắt mắt.</p>
					<p>Lưu giữ những câu chuyện tình lãng mạng, chia sẻ những bức ảnh đáng nhớ, 
					những dòng tâm sự hạnh phúc của 2 bạn với người thân và bạn bè khắp mọi nơi.</p>
					<p>Thân thiện, miễn phí, dễ sử dụng và đạt thẩm mỹ là những gì chúng tôi hướng đến.</p>
				</h5>
				<h6 class="use-now">
					<a class="btn btn-sm btn-use-now" href="{{URL::route('website')}}" >Miễn phí! Sử dụng ngay</a>
				</h6>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/website.gif')}}">
			</div>
		</div>
  	</div>
</div> <!--/.tab-content-->

<div class="row cam-nhan-khach-hang">
	<div class="col-lg-12 cam-nhan-title">CẢM NHẬN KHÁCH HÀNG ĐỐI VỚI THUNA</div>
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="col-lg-4 col-sm-6 col-md-4 col-xs-12 cam-nhan-item ">
			<img class="img-cam-nhan" src="{{Asset('images/slide-main/minhthanh-thaithu.jpg')}}">
			<div class="name-khach-hang">Minh Thanh & Thái Thu</div>
			<div class="nhan-xet-khach-hang">
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Thuna thật thú vị, đám cưới của tụi mình được trang trí đẹp,
				theo sở thích của cô dâu và chú rể, tông màu, vật dụng tỉ mỷ trong từng họa tiết.<br />
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Cùng với công cụ website, nó đã giúp đỡ chúng mình rất nhiều 
				trong thời gian chuẩn bị đám cưới, phân chia công việc, túi tiền phù hợp.<br />
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Nếu bạn đang chuẩn bị tổ chức đám cưới, chúng mình nghĩ bạn nên sử dụng
				và trải nghiệm dịch vụ tiện ích từ Thuna.<br />
				Ghé thăm website của tụi mình &nbsp; <a href="#">Tại đây</a>
			</div>
		</div>

		<div class="col-lg-4 col-sm-6 col-md-4 col-xs-12 cam-nhan-item">
			<img class="img-cam-nhan" src="{{Asset('images/slide-main/khanhnhi-nguyenloc.jpg')}}">
			<div class="name-khach-hang">Khánh Nhi & Nguyên Lộc</div>
			<div class="nhan-xet-khach-hang">
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Đẹp, phong cách làm việc nhiệt tình! Đó là cảm nhận của tôi về Thuna.<br />
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Ban đầu mình hơi hoài nghi về những dịch vụ cũng như phong cách, 
				nhưng bạn thấy đấy, chúng mình đã có một bữa tiệc thật đẹp, nhận được sự phục vụ tận tình từ Thuna.<br />
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Nếu còn ngần ngại hãy đến với họ để khám phá như chúng mình nhé!
			</div>
		</div>

		<div class="col-lg-4 col-sm-6 col-md-4 col-xs-12 cam-nhan-item">
			<img class="img-cam-nhan" src="{{Asset('images/slide-main/minhnhat-ductri.jpg')}}">
			<div class="name-khach-hang">Minh Nhật & Đức Trí</div>
			<div class="nhan-xet-khach-hang">
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Dịch vụ chăm sóc khách hàng tận tình, khi bắt đầu truy cập vào website. Bạn không cần hỏi gì cả sẽ có nhân viên Thuna bắt chuyện và tư vấn cho bạn.<br />
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Chúng tôi không quan trọng vấn đề kinh phí, chúng tôi mong đợi sự làm việc chuyên nghiệp. Đó là lý do chúng tôi đến với Thuna!<br />
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Chắc chắn Thuna sẽ xây dựng cho mình một cộng đồng cưới hỏi lớn mạnh trong tương lai.<br />
				<i class="fa fa-heart" style="color: #F382B7"></i>&nbsp;
				Cùng đi dạo trong khu vườn tình yêu và cưới hỏi chuyên nghiệp tại Thuna với chúng tôi nhé!
			</div>
		</div>

	</div>
	<div class="col-xs-1"></div>
</div><!--/.cam-nhan-khac-hang-->


<script type="text/javascript">

	function get_location(name){
		$.ajax({
			type: "post",
			url: "{{URL::route('get_location')}}",
			data:{name:name}
		});
	};

</script>	

@endsection
	