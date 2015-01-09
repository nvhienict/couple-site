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
		 		<li><a class="active-a" href="{{URL::route('question')}}">Câu hỏi thuờng gặp</a></li>
		 		<li><a href="{{URL::route('contact')}}">Liên hệ</a></li>
		 	</ul>
	 	</div>			 				 	
	 </div>
	 <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 content-footer">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title-content-footer text-center">
	 		Câu hỏi thường gặp
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 para-content">           
		<p style="text-align: justify;"><strong>1. THUNAWEDDING LÀ GÌ?</strong></p>

		<p style="text-align: justify;">ThunaWedding là cộng đồng cưới hỏi lớn nhất Việt Nam nằm trong Thuna Network: ThunaWedding, ThunaBaby, ThunaHome, chuyên cung cấp các thông tin và kinh nghiệm hữu ích trong việc lên kế hoạch và tổ chức đám cưới.</p>

		<p style="text-align: justify;"><strong>2. <strong>THUNAWEDDING </strong>MANG ĐẾN CHO BẠN NHỮNG NỘI DUNG GÌ?</strong></p>

		<p style="text-align: justify;">Chỉ cần gõ Thuna.vn, bạn sẽ có ngay một nguồn thông tin, hình ảnh vô cùng phong phú và chất lượng từ các nhà cung cấp dịch vụ cưới hàng đầu Việt Nam và thế giới.</p>

		<p style="text-align: justify;"><strong>Dịch vụ cưới</strong></p>

		<p style="text-align: justify;">Là nơi bạn có thể tìm thấy những nhà cung cấp dịch vụ cưới theo đúng yêu cầu và mong muốn của bạn với khoảng 3.000 nhà cung cấp. Cách tìm kiếm thông tin: theo sản phẩm/dịch vụ; theo khu vực địa lý; theo các tiêu chí đánh giá thường gặp, theo giá thành. Đây sẽ là nơi bạn tìm hiểu và lựa chọn các Wedding Planner, dịch vụ làm hoa cưới, tổ chức tiệc cưới, may váy cưới… chuyên nghiệp, nhanh nhất và đáng tin cậy nhất.</p>

		<p style="text-align: justify;"><strong>Ý tưởng cưới</strong></p>

		<p style="text-align: justify;">Cách hiệu quả nhất để định hình những gì bạn muốn cho ngày cưới của mình là tham khảo thông tin hình ảnh từ những người đi trước. Chuyên mục ý tưởng cưới với hàng trăm bộ sưu tập hình ảnh có thể cho bạn một số khái niệm tổng quan về ngày cưới của mình với đủ mọi phong cách từ truyền thống tới hiện đại, từ cổ điển tới phá cách. Tại đây có hàng trăm hàng nghìn bức ảnh với các chuyên mục khác nhau: nhẫn cưới, hoa cưới, xe cưới, hình cưới, sân khấu, tiệc cưới… dành cho bạn tham khảo.</p>

		<p style="text-align: justify;"><strong>Áo cưới</strong></p>

		<p style="text-align: justify;">Đây là phần được các cô dâu quan tâm nhiều nhất trong quá trình chuẩn bị đám cưới. Ở chuyên mục này, ThunaWedding sẽ cung cấp cho bạn hàng nghìn mẫu áo cưới cho cô dâu, chú rể và cả phụ dâu, phụ rể.</p>

		<p style="text-align: justify;"><strong>Kinh nghiệm cưới</strong></p>

		<p style="text-align: justify;">Là chuyên mục có nhiều bài viết phong phú và đa dạng chia sẻ kinh nghiệm cưới hỏi của các chuyên gia hàng đầu hay những người đã trải qua đám cưới. Từ việc lên kế hoạch, tới những vấn đề gặp phải trong đám hỏi, đám cưới, trong việc trang điểm và làm đẹp… tất cả sẽ có trên ThunaWedding.</p>

		<p style="text-align: justify;"><strong>Cộng đồng</strong></p>

		<p style="text-align: justify;">Bạn có thể chia sẻ kinh nghiệm với các cô dâu khác trong cộng đồng ThunaWedding như Blog, Chia sẻ album cưới… hoặc được các Wedding Planner, các chuyên gia có uy tín tại Việt Nam giải đáp những thắc mắc về cưới hỏi. Các cô dâu thường có vô vàn thắc mắc xung quanh các thủ tục cưới hỏi, lên kế hoạch cũng như mong muốn tìm ra lựa chọn tốt nhất cho ngày cưới của mình. Trước khi bắt đầu việc lập kế hoạch, hãy hỏi chúng tôi tất cả những gì bạn đang thắc mắc. Các chuyên gia của Thuna.vn sẽ giúp bạn chuẩn bị cho ngày cưới của mình.</p>

		<p style="text-align: justify;"><strong>Tin tức</strong></p>

		<p style="text-align: justify;">Luôn cập nhật các tin tức mới nhất liên quan đến cưới hỏi của Việt Nam và thế giới.</p>

		<p style="text-align: justify;"><strong>Ứng dụng thông minh và hữu ích</strong></p>

		<p style="text-align: justify;">Không chỉ mang đến cho bạn những thông tin bổ ích, ThunaWedding còn có hệ thống ứng dụng đa dạng và tiện lợi với các công cụ giúp Lập kế hoạch, Tính toán ngân sách, Quản lý khách mời, Lựa chọn yêu thích sẽ giúp bạn chuẩn bị cho đám cưới dễ dàng và chu đáo hơn.</p>

		<p style="text-align: justify;">Sau khi đăng ký thông tin cá nhân, bạn sẽ được cập nhật thông tin về các giai đoạn trong quá trình chuẩn bị đám cưới và nhiều thông tin hữu ích khác đúng với nhu cầu cưới hỏi của bạn qua email cá nhân.</p>

		<p style="text-align: justify;"><strong>3.ĐIỂM CỦA THÀNH VIÊN TRÊN THUNAWEDDING LÀ GÌ?</strong></p>

		<p style="text-align: justify;">Điểm thành viên là điểm dùng để đánh giá hoạt động của thành viên trên ThunaWedding, điểm càng cao chứng tỏ thành viên hoạt động và đóng góp càng nhiều. Khi bạn tham gia viết blog, tạo chủ đề, tham gia thảo luận hội nhóm, đăng ảnh cưới, bình luận… tất cả những hoạt động đó của bạn khi được xác nhận là hợp lệ (xem thêm tại quy định sử dụng dành cho thành viên) sẽ góp phần tăng điểm thành viên.</p>

		<p style="text-align: justify;"><strong>4.TÔI SẼ THAM GIA THUNAWEDDING NHƯ THẾ NÀO?</strong></p>

		<p style="text-align: justify;">ThunaWedding luôn chào đón sự hoạt động tích cực từ tất cả các thành viên thông qua việc gửi câu hỏi, viết blog, tạo album ảnh, tạo chủ đề, tham gia thảo luận trong nhóm… Đóng góp của thành viên vào trang web ThunaWedding cũng là đóng góp vào việc chia sẻ kinh nghiệm cho các bạn sắp cưới giúp họ chuẩn bị một đám cưới thật dễ dàng và chu đáo. Vì vậy đừng ngần ngại thảo luận, bình luận hay viết những dòng tâm sự về kinh nghiệm cưới hỏi cũng như chia sẻ những kỷ niệm đẹp qua các album ảnh cưới.</p>

		<p style="text-align: justify;"><strong>5.TẠI SAO TÔI PHẢI ĐĂNG NHẬP VÀO TÀI KHOẢN? TÀI KHOẢN CÓ MIỄN PHÍ HAY KHÔNG?</strong></p>

		<p style="text-align: justify;">Tài khoản của bạn tại ThunaWedding là hoàn toàn miễn phí. Việc tạo tài khoản và cung cấp một số thông tin cơ bản sẽ giúp chúng tôi gửi đến bạn những nội dung phù hợp nhất mà bạn không cần phải mất công tìm kiếm. Ngoài ra, những thành viên tích cực còn nhận được nhiều ưu đãi và quà tặng từ ThunaWedding.</p>

		<p style="text-align: justify;"><strong>6.NẾU TÔI KHÔNG ĐIỀN ĐẦY ĐỦ THÔNG TIN VỀ HÔN PHU, NGÀY CƯỚI, PHONG CÁCH CƯỚI THÌ CÓ ẢNH HƯỞNG GÌ KHÔNG?</strong></p>

		<p style="text-align: justify;">Không ảnh hưởng gì, có rất nhiều thành viên cũng như bạn, chưa chọn được ngày cưới cho mình, chưa xác định được phong cách mình và hôn phu cùng mong muốn… Những thông tin này hoàn toàn có thể bổ sung sau trong quá trình đồng hành cùng Thuna.vn. Tuy nhiên, việc điền đầy đủ các thông tin sẽ tốt cho bạn khi Thuna.vn cung cấp các Công cụ hỗ trợ quá trình lên kế hoạch cưới. Thông tin này sẽ được ghi nhớ để Thuna.vn có thể mang đến cho bạn lời khuyên, kinh nghiệm và địa chỉ dịch vụ phù hợp với nhu cầu của bạn về thời gian, ngân sách và phong cách cưới.</p>

		<p style="text-align: justify;"><strong>7.THÔNG TIN CÁ NHÂN CÓ ĐƯỢC ĐẢM BẢO AN TOÀN TRÊN THUNAWEDDING?</strong></p>

		<p style="text-align: justify;">Các thông tin cá nhân bạn điền vào khi đăng ký tài khoản tại Thuna.vn được đảm bảo tính bảo mật 100%. Nếu bạn chọn Nhận Thư điện tử tin tức từ Thuna.vn thông tin cá nhân của bạn sẽ được dùng để chuyển thư điện tử này.</p>

		<p style="text-align: justify;"><strong>8.KHI CẦN HỖ TRỢ, TÔI LIÊN LẠC VỚI AI?</strong></p>

		<p style="text-align: justify;">Bạn có thắc mắc về ThunaWedding hay cần hỗ trợ khi sử dụng, vui lòng liên lạc tại địa chỉ mail thanh@Thuna.vn</p>                   
	 	</div>
	 </div>
</div>
@endsection
	