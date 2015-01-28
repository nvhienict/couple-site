@extends((Session::has('email')) ? 'main-dashboard' : 'main')

@section('title')
  Giới thiệu
@endsection
@if(!Session::has('email'))
  @section('nav-bar')
    @include('nav')
  @endsection
@else
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
@endif
	

@section('content')

<div class="row main-content-footer">
	 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 box-menu ">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center you-know">
	 		Bạn cần biết			 		
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu-content-footer">
	 		<ul>
		 		<li><a class="active-a" href="{{URL::route('introduce')}}">Giới thiệu</a></li>
		 		<li><a href="{{URL::route('term')}}">Điều khoản sử dụng</a></li>
		 		<li><a href="{{URL::route('policy')}}">Chính sách riêng tư</a></li>
		 		<li><a href="{{URL::route('question')}}">Câu hỏi thuờng gặp</a></li>
		 		<li><a href="{{URL::route('contact')}}">Liên hệ</a></li>
		 	</ul>
	 	</div>			 				 	
	 </div>
	 <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 content-footer">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title-content-footer text-center">
	 		Giới thiệu
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 para-content">
			<p style="text-align: justify;">ThunaWedding là website cưới nằm trong hệ thống của Thuna Network: ThunaWedding, ThunaBaby, ThunaHome, chuyên cung cấp các thông tin và kinh nghiệm hữu ích trong việc chuẩn bị và tổ chức đám cưới.</p>

			<p style="text-align: justify;">Không chỉ mang đến cho bạn những thông tin hữu ích, ThunaWedding còn có một hệ thống ứng dụng đa dạng và tiện lợi như công cụ giúp Lập kế hoạch cưới, Quản lý ngân sách cưới, Quản lý khách mời, và Lựa chọn yêu thích, giúp bạn dễ dàng, thuận tiện hơn trong quá trình chuẩn bị đám cưới.</p>

			<p style="text-align: justify;">Sau khi đăng ký thông tin cá nhân, bạn sẽ được cập nhật các công việc hàng tuần liên quan đến cưới hỏi cần phải chuẩn bị cùng nhiều thông tin hữu ích khác đúng với nhu cầu của bạn qua email cá nhân đó.</p>

			<p style="text-align: justify;">Ngoài ra, bạn có thể chia sẻ kinh nghiệm cưới của mình với các cô dâu khác trong cộng đồng ThunaWedding như Blog, chia sẻ album cưới… hoặc được các chuyên gia có uy tín giải đáp các thắc mắc về chuyện cưới hỏi.</p>

			<p style="text-align: justify;">Đám cưới là một trong những việc quan trọng nhất của đời người và ThunaWedding sẽ luôn đồng hành cùng bạn trong khoảng thời gian tuyệt vời nhất này!</p>                
	 	</div>
	 </div>
</div>
@endsection
	