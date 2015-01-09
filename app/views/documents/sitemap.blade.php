@extends('main')
@section('title')
Trang chủ
@endsection
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
		    <!-- <a href="{{URL::route('index')}}" class="navbar-brand brand"> -->
		    	<!-- <img class="img-logo" src="{{Asset('icon/logo-thuna.png')}}"> -->
		    <!-- </a> -->
	  	</div>
	  	<div class="navbar-collapse collapse navbar-responsive-collapse">
		    <ul class="nav navbar-nav">
		      	<li><a href="{{URL::route('index')}}" title="Trang chủ">
		      			<img class="icon-hover-home" src="{{Asset('icon/home78.png')}}">
		      			<span class="txt-menu">Trang chủ</span>
 		      		</a>
		      	</li>
		      	<li><a href="{{URL::route('guest-list')}}" title="Danh sách khách mời">
		      			<img class="icon-hover" src="{{Asset('icon/DSKM.png')}}">
		      			<span class="txt-menu">Danh sách khách mời</span>
		      		</a>
		      	</li>
		        <li><a href="{{URL::route('user-checklist')}}" title="Danh sách công việc">
		        		<img class="icon-hover" src="{{Asset('icon/Danhsachcongviec.png')}}">
		        		<span class="txt-menu">Danh sách công việc</span>
		        	</a>
		        </li>
		        <li><a href="{{URL::route('budget')}}" title="Quản lý ngân sách">
		        		<img class="icon-hover" src="{{Asset('icon/Congculapkehoach.png')}}">
		        		<span class="txt-menu">Quản lý ngân sách</span>
		        	</a>
		        </li>
		        <li><a href="{{URL::route('website')}}" title="Website cưới">
		        		<img class="icon-hover-website" src="{{Asset('icon/Quanlyngansach.png')}}">
		        		<span class="txt-menu">Website cưới</span>
		        	</a>
		        </li>
		      	<li class="dropdown">
			        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown" title="Âm nhạc">
						<img class="icon-hover-music" src="{{Asset('icon/musical7.png')}}">
			        	<span class="txt-menu">Âm nhạc</span>
			        	<b class="caret"></b>
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
		      			<img class="icon-hover" src="{{Asset('icon/ngaycuoi.png')}}">
		      			<span class="txt-menu">Xem ngày cưới</span>
		      		</a>
		      	</li>
		    
		    </ul>
	  	</div>
	</div><!--/.nav-->
</div><!--/.bg-menu-top-->
<div class="row lr-bottom-menu"></div>
@endsection
	

@section('content')

<div class="row main-content-footer">
	 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 box-menu ">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center you-know">
	 		Bạn cần biết			 		
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu-content-footer">
	 		<ul>
		 		<li><a href="{{URL::route('introduce')}}">Giới thiệu</a></li>
		 		<li><a href="{{URL::route('term')}}">Điều khoản sử dụng</a></li>
		 		<li><a href="{{URL::route('policy')}}">Chính sách riêng tư</a></li>
		 		<li><a href="{{URL::route('question')}}">Câu hỏi thuờng gặp</a></li>
		 		<li><a href="{{URL::route('contact')}}">Liên hệ</a></li>
		 		<li><a class="active-a" href="{{URL::route('sitemap')}}">SiteMap</a></li>
		 	</ul>
	 	</div>			 				 	
	 </div>
	 <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 content-footer">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title-content-footer text-center">
	 		Giới thiệu
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 para-content">
	 		
            <p>MarryWedding là website cưới nằm trong hệ thống của Marry Network: MarryWedding, MarryBaby, MarryHome, chuyên cung cấp các thông tin và kinh nghiệm hữu ích trong việc chuẩn bị và tổ chức đám cưới.</p>
			<p>Không chỉ mang đến cho bạn những thông tin hữu ích, MarryWedding còn có một hệ thống ứng dụng đa dạng và tiện lợi như công cụ giúp Lập kế hoạch cưới, Quản lý ngân sách cưới, Quản lý khách mời, và Lựa chọn yêu thích, giúp bạn dễ dàng, thuận tiện hơn trong quá trình chuẩn bị đám cưới.</p>
			<p>Sau khi đăng ký thông tin cá nhân, bạn sẽ được cập nhật các công việc hàng tuần liên quan đến cưới hỏi cần phải chuẩn bị cùng nhiều thông tin hữu ích khác đúng với nhu cầu của bạn qua email cá nhân đó.</p>
			<p>Ngoài ra, bạn có thể chia sẻ kinh nghiệm cưới của mình với các cô dâu khác trong cộng đồng MarryWedding như Blog, chia sẻ album cưới… hoặc được các chuyên gia có uy tín giải đáp các thắc mắc về chuyện cưới hỏi.<br>
			Đám cưới là một trong những việc quan trọng nhất của đời người và MarryWedding sẽ luôn đồng hành cùng bạn trong khoảng thời gian tuyệt vời nhất này!</p>
			<p>MarryWedding là website cưới nằm trong hệ thống của Marry Network: MarryWedding, MarryBaby, MarryHome, chuyên cung cấp các thông tin và kinh nghiệm hữu ích trong việc chuẩn bị và tổ chức đám cưới.</p>
			<p>Không chỉ mang đến cho bạn những thông tin hữu ích, MarryWedding còn có một hệ thống ứng dụng đa dạng và tiện lợi như công cụ giúp Lập kế hoạch cưới, Quản lý ngân sách cưới, Quản lý khách mời, và Lựa chọn yêu thích, giúp bạn dễ dàng, thuận tiện hơn trong quá trình chuẩn bị đám cưới.</p>
			<p>Sau khi đăng ký thông tin cá nhân, bạn sẽ được cập nhật các công việc hàng tuần liên quan đến cưới hỏi cần phải chuẩn bị cùng nhiều thông tin hữu ích khác đúng với nhu cầu của bạn qua email cá nhân đó.</p>
			<p>Ngoài ra, bạn có thể chia sẻ kinh nghiệm cưới của mình với các cô dâu khác trong cộng đồng MarryWedding như Blog, chia sẻ album cưới… hoặc được các chuyên gia có uy tín giải đáp các thắc mắc về chuyện cưới hỏi.<br>
			Đám cưới là một trong những việc quan trọng nhất của đời người và MarryWedding sẽ luôn đồng hành cùng bạn trong khoảng thời gian tuyệt vời nhất này!</p>


                    
	 	</div>
	 </div>
</div>
@endsection
	