@extends('main')
@section('title')
Trang chủ
@endsection
@section('nav-bar')
<!-- Navigation -->
<div id="nav-bar" class="row">	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
	<div class="navbar" style="z-index: 99000;">
	  <div class="">
	    <button type="button" style="background-color:#404040;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a href="{{URL::route('index')}}" class="navbar-brand brand">Thuna.vn</a>
	  </div>
	  <div class="navbar-collapse collapse navbar-responsive-collapse">
	    <ul class="nav navbar-nav">
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown"><span>Nhà cung cấp</span><b class="caret"></b></a>
	        <ul class="dropdown-menu oneUl" role="menu">
	          <li role="presentation" class="dropdown-header"><span>Dịch vụ</span>
	          <div class="row">
	            <div class="col-md-6 col-xs-12">
	              <ul class="list-unstyled ">
	                  @foreach (Category::get() as $index=> $category)
	                  @if($index < 7)
	                    <li><a href="{{URL::route('category', array($category->slug))}}">{{$category['name']}}</a></li>
	                  @endif
	                  @endforeach
	              </ul>
	            </div>
	            <div class="col-md-6">
	              <ul class="list-unstyled ">
	                  @foreach (Category::get() as $index=> $category)
	                  @if($index >= 7)
	                    <li><a href="{{URL::route('category', array($category->slug))}}">{{$category['name']}}</a></li>
	                  @endif
	                  @endforeach
	              </ul>
	            </div>
	          </div>
	          </li>
	        </ul>
	      </li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown"><span>Công cụ lập kế hoạch </span><b class="caret"></b></a>
	        <ul class="dropdown-menu " role="menu" style="width:100%;">

		        <li role="presentation" class="dropdown-header"><span>Công cụ</span>
			        <ul class="list-unstyled">
			      		<li><a href="{{URL::route('guest-list')}}" >Danh sách khách mời</a></li>
				        <!-- <li><a href="#">Sơ đồ ghế  ngồi</a></li>-->
				        <li ><a href="{{URL::route('user-checklist')}}"  >Danh sách công việc</a></li>
				        <!-- <li><a href="#">Quản lý ve ndor</a></li>-->
				        <li><a href="{{URL::route('budget')}}"  >Quản lý ngân sách</a></li>
				        <li><a href="{{URL::route('website')}}"  >Website cưới</a></li>
				    </ul>
	          	</li>
	        </ul> 
	      </li>

	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown"><span>Âm nhạc</span><b class="caret"></b></a>
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
	                  <li><a href="{{URL::route('songs', array(8))}}">Vào tiệc</a></li>
	                  <li><a href="{{URL::route('songs', array(9))}}">Chúc mừng</a></li>
	                  <li><a href="{{URL::route('songs', array(10))}}">Cuối tiệc</a></li>
	                </ul>
	              </div>
	            </div>
	          </li>
	        </ul>
	      </li>
	    </ul>
	  </div>
	</div>
	</div>
	  
</div>
@endsection
	

@section('content')

<div class="row main-content-footer">
	 <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 box-menu ">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center you-know">
	 		Bạn cần biết			 		
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu-content-footer">
	 		<ul>
		 		<li><a href="{{URL::route('introduce')}}">Giới thiệu</a></li>
		 		<li><a href="{{URL::route('term')}}">Điều khoản sử dụng</a></li>
		 		<li><a class="active-a" href="{{URL::route('policy')}}">Chính sách riêng tư</a></li>
		 		<li><a href="{{URL::route('question')}}">Câu hỏi thuờng gặp</a></li>
		 		<li><a href="{{URL::route('contact')}}">Liên hệ</a></li>
		 		<li><a href="{{URL::route('sitemap')}}">SiteMap</a></li>
		 	</ul>
	 	</div>			 				 	
	 </div>
	 <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 content-footer">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title-content-footer text-center">
	 		Chính sách riêng tư
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 para-content">
	 		
       	<p style="text-align: center;"><strong>CÁCH THU THẬP THÔNG TIN CÁ NHÂN TỪ THUNAWEDDING</strong></p>

		<p style="text-align: justify;">Điều trước nhất bạn cần lưu ý về chính sách riêng tư là có rất nhiều thông tin để bất kỳ website nào thu thập mà không cần đến phần trả lời của bạn cho những câu hỏi cụ thể. ThunaWedding ghi nhận các địa chỉ IP vì mục đích quản trị hệ thống, xử lý sự cố và khảo sát xu hướng truy cập nói chung. (Chẳng hạn, địa chỉ IP giúp ThunaWedding xác định tỷ lệ người dùng đến từ nhiều cổng trực tuyến khác nhau). Thông tin này được lưu lại chỉ để phục vụ các mục đích quản trị. Địa chỉ IP không liên quan đến bất kỳ thông tin cá nhân nào.</p>

		<p style="text-align: justify;">ThunaWedding sử dụng cookie – một file dữ liệu nhỏ lưu trữ trong máy tính của bạn -&nbsp; để tùy biến các phần thuộc website theo lựa chọn của bạn. Ví dụ, ThunaWedding dùng một cookie để nhận dạng bạn là thành viên website này và đảm bảo chỉ mình bạn có quyền truy cập vào ngân sách và lịch trình cho lễ cưới của mình. Với cách thức này, bạn chỉ cần trả lời các câu hỏi một lần và không phải lúc nào bạn cũng cần tham gia vào một hoạt động hoặc sự kiện nào đó. Tự cookie này không báo cho chúng tôi, hay bất kỳ ai khác, biết bạn là ai, email của bạn hoặc những chi tiết cá nhân khác. Bạn cung cấp thông tin đó khi bạn đăng ký làm thành viên và chỉ ThunaWedding có quyền truy cập vào thông tin đó. Nếu bạn chọn cách thiết lập trình duyệt của mình từ chối tất cả cookie, có thể bạn sẽ bị hạn chế xem một số phần hoặc sử dụng một số tính năng trên website của chúng tôi. Để biết thêm chi tiết về cookie, mời xem phần Cookie FAQ của ThunaWedding.</p>

		<p style="text-align: justify;">Bạn có thể xem tổng thể ThunaWedding và đọc các bài viết trên website mà không cần đăng ký hay cung cấp bất cứ thông tin cá nhân nào. Tuy nhiên, để có được ưu tiên sử dụng các dịch vụ cá nhân hóa của chúng tôi, bạn cần cung cấp các thông tin như tên, email, địa chỉ thật, ngày cưới và vai trò cô dâu/chú rể. Chúng tôi thu thập thông tin tương tự từ những người dùng chọn tham gia các cuộc thi và sự kiện quảng bá trên website này. Chúng tôi luôn thông báo trước khi tiến hành thu thập bất kỳ thông tin cá nhân nào từ bạn.</p>

		<p style="text-align: justify;">ThunaWedding cung cấp box tin nhắn, trang cá nhân, chat room và blog trên website của chúng tôi. Bất cứ thông tin nào bạn tự nguyện tiết lộ khi đưa lên một trong các khu vực này sẽ hiển thị công khai và có thể được chúng tôi sử dụng cho mục đích quảng bá và quảng cáo online lẫn offline. Nếu chọn tính năng đăng bình luận trên website, bất kỳ thông tin nhận dạng cá nhân nào bạn đưa ra cũng ở dạng công khai và có thể được những người dùng khác đọc, thu thập và sử dụng cũng như có thể được dùng để gửi tin nhắn đến bạn. ThunaWedding không chịu trách nhiệm với bất kỳ thông tin nhận dạng cá nhân nào bạn lựa chọn đưa lên website.</p>

		<p style="text-align: justify;">Nếu bạn chọn dùng “Gửi cho một người bạn” (Send to a Friend) – tính năng cho phép bạn gửi tin nhắn email đến các địa chỉ cụ thể và chứa đường link dẫn đến một bài viết trên website ThunaWedding mà bạn cho là bạn bè mình sẽ quan tâm, chúng tôi sẽ yêu cầu bạn đưa ra các email để gửi tin nhắn này. Chúng tôi tự động gửi đi một email mời người nhận đọc bài viết. Chúng tôi lưu trữ thông tin này cho mục đích duy nhất là gửi đi email đó và theo dõi tiến trình gửi thành công của tính năng “Gửi cho một người bạn”.</p>

		<p style="text-align: justify;">Với một số trường hợp, các phần tài tài trợ và quảng bá thuộc bên thứ ba trên website cung cấp tính năng tương tự và trong trường hợp đó, thông tin không được chia sẻ với bên thứ ba. Bạn bè của bạn có thể liên hệ với chúng tôi qua http://www.Thuna.vn/lien-he để đề nghị gỡ bỏ thông tin này khỏi cơ sở dữ liệu của ThunaWedding.</p>

		<p style="text-align: justify;"><strong>CÁCH XỬ LÝ THÔNG TIN CÁ NHÂN THU THẬP ĐƯỢC</strong></p>

		<p style="text-align: justify;">Thông tin thu thập từ thành viên giúp chúng tôi cải tiến nội dung, tùy biến các trang nào đó cho bạn và cập nhật đến bạn những gì liên quan tới ThunaWedding. Thỉnh thoảng, ThunaWedding chia sẻ tên, địa chỉ, email và các thông tin liên hệ khác với những tổ chức đã được kiểm tra trước có cung cấp sản phẩm và dịch vụ cụ thể mà chúng tôi cho rằng bạn có thể quan tâm. ThunaWedding còn chia sẻ thông tin thành viên với những nhà bán lẻ đối tác để các mục đăng ký của bạn được cập nhật theo tình trạng mua sắm. Bạn có thể chọn loại bỏ tên và thông tin liên hệ của mình khỏi những danh sách này bất cứ lúc nào, bằng cách chỉnh sửa quyền riêng tư (xem hướng dẫn bên dưới) hoặc thông báo cho chúng tôi qua email&nbsp;<a href="mailto:lienhe@Thuna.vn" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">lienhe@Thuna.vn</a></p>

		<p style="text-align: justify;">Chúng tôi là thành viên của Facebook Beacon Program. Nếu bạn là một thành viên Facebook và đang đăng nhập vào mạng xã hội này suốt thời gian đăng nhập Thuna.vn, chúng tôi có thể chia sẻ thông tin liên quan tới các hoạt động của bạn trên website của chúng tôi với Facebook theo sự cho phép từ bạn. Nếu bạn đồng ý để Facebook truy cập vào thông tin này, Facebook có thể hiển thị nó công khai trên profile Facebook của bạn, gửi nó đến “bạn bè” trong News Feed và dùng nó để cải tiến mạng xã hội, các dịch vụ của họ hoặc nhằm các mục đích khác. Chúng tôi không kiểm soát chính sách riêng tư của Facebook, và chính sách riêng tư trên mạng xã hội này sẽ quyết định cách họ sử dụng thông tin của bạn khi nó được chúng tôi chia sẻ. Vì vậy, chúng tôi đề nghị nếu bạn dự định ủy quyền việc chuyển thông tin cá nhân đã được truy xuất trên Thuna.vn cho Facebook, trước tiên bạn nên xem qua chính sách riêng tư của Facebook tại<a href="http://www.facebook.com/home.php#/policy.php" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">http://www.facebook.com/home.php#/policy.php</a>.</p>

		<p style="text-align: justify;">Chúng tôi sử dụng các công ty quảng cáo thuộc bên thứ ba để phục vụ cho các banner quảng cáo đăng trên website. Những công ty này thuê cookie và ảnh gif 1×1 (còn gọi là web beacon) để đo lường và cải thiện hiệu quả quảng cáo cho khách hàng của họ. Để làm như thế, các công ty này có thể sử dụng thông tin nặc danh về những lần bạn truy cập website ThunaWedding và các website khác. Thông tin này có thể bao gồm: ngày/giờ của banner quảng cáo hiển thị, banner quảng cáo được hiển thị, cookie, địa chỉ IP. Thông tin này còn có khả năng được dùng cho các mục đích marketing online.</p>

		<p style="text-align: justify;">Nếu muốn chặn một bên quảng cáo thứ ba thu thập dữ liệu, hiện giờ bạn có thể xem từng website của mạng quảng cáo với tư cách cá nhân và thoát ra hoặc ghé trang opt-out trên NAI để bỏ cookie quảng cáo. Tham khảo tại<a href="http://www.networkadvertising.org/choices/" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">http://www.networkadvertising.org/choices/</a>. Trang này cũng sẽ cho phép bạn xem lại các chính sách riêng tư của những công ty quảng cáo thuộc bên thứ ba.</p>

		<p style="text-align: justify;"><strong>THAY ĐỔI THÔNG TIN CÁ NHÂN CỦA BẠN VÀ/HOẶC ĐĂNG KÝ NEWSLETTER</strong></p>

		<p style="text-align: justify;">Bạn có thể truy cập hoặc cập nhật thông tin cá nhân, bao gồm cả đăng ký nhận newsletter từ chúng tôi, bất cứ lúc nào. Để hủy đăng ký, bạn làm theo hướng dẫn phía dưới cùng mỗi newsletter, chỉnh sửa mục ưu tiên riêng tư trong Hồ sơ thành viên tại&nbsp;<a href="http://thuna.vn/profile" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">http://Thuna.vn/profile</a>.</p>

		<p style="text-align: justify;">Nếu muốn ngưng sử dụng (deactivate) tài khoản thành viên trên ThunaWedding, bạn nên liên hệ qua email&nbsp;<a href="mailto:thanh@thuna.vn" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">lienhe@Thuna.vn</a>và đặt tiêu đề “Deactivate tài khoản”. Bạn còn có thể viết thư gửi về Công ty TNHH Asia cas, Lầu 3 Tòa nhà Copac, Số 12, Đường Tôn Đản, Phường 13, Quận 4, TP. HCM hoặc gọi đến số&nbsp;(08) 3940 5071.</p>

		<p style="text-align: justify;"><strong>NHỮNG TRANG WEB KHÁC</strong></p>

		<p style="text-align: justify;">ThunaWedding có thể chứa các đường link dẫn đến những website khác. Chúng tôi không chịu trách nhiệm về nội dung của họ hoặc thông tin cá nhân mà bạn chọn chia sẻ với họ. Lưu ý: Thông tin bạn trực tiếp gửi đến các bên cung cấp dịch vụ cho ThunaWedding, chẳng hạn bất kỳ bên nhà cung cấp nào trên website của chúng tôi hoặc các website khác bạn bắt gặp trên Internet (kể cả những trang trong cùng hệ thống Thuna) có thể phải lệ thuộc vào những quy định khác nhau về việc sử dụng hoặc tiết lộ thông tin. Chúng tôi khuyến khích bạn tìm hiểu và đặt câu hỏi trước khi để lộ thông tin cá nhân cho các bên thứ ba.</p>

		<p style="text-align: justify;"><strong>AN NINH MẠNG TRÊN THUNAWEDDING</strong></p>

		<p style="text-align: justify;">ThunaWedding rất xem trọng sự riêng tư của bạn, nhưng với điều luật và môi trường an ninh hiện tại, chúng tôi không thể hoàn toàn đảm bảo các mối liên hệ riêng tư của bạn và những thông tin nhận dạng cá nhân khác sẽ không bị tiết lộ với bên thứ ba. Ở một số trường hợp, chính phủ hoặc bên thứ ba có thể ngăn chặn hoặc truy cập trái phép vào quá trình chuyển giao hoặc các cuộc đối thoại riêng tư.</p>

		<p style="text-align: justify;">Ngoài ra, trong những sự kiện cần tìm hiểu hoặc giải quyết những vấn đề tiềm tàng, chúng tôi có thể tiết lộ bất kỳ thông tin nào về bạn với cơ quan cá nhân, tổ chức thi hành luật hoặc các công chức chính phủ khác theo luật quy định, theo nhu cầu nghiên cứu có cam kết bảo mật hoặc theo yêu cầu của tòa án.</p>

		<p style="text-align: justify;">Chúng tôi áp dụng các nỗ lực đúng chuẩn để bảo đảm an toàn cho thông tin nhận dạng cá nhân của bạn, chẳng hạn như tường lửa và Secure Socket Layers (SSL) trong trường hợp thích đáng. Chúng tôi cũng làm hết mọi thứ trong khả năng để bảo vệ thông tin người dùng ngoại tuyến. Tất cả thông tin của người dùng ThunaWedding, không chỉ những thông tin nhạy cảm nêu trên, đều được xử lý theo quy trình nghiêm ngặt trong văn phòng của chúng tôi. Chỉ những nhân viên cần thông tin này để thực hiện một nhiệm vụ cụ thể (ví dụ, một mẫu đại diện Dịch vụ Thành viên) mới được chấp nhận đăng nhập vào thông tin nhận dạng cá nhân. Nhân viên ThunaWedding phải dùng screen-saver bảo vệ bằng mật khẩu khi rời bàn làm việc. Vào thời điểm quay trở lại, họ cần đăng nhập lần nữa bằng mật khẩu.</p>

		<p style="text-align: justify;">Bên cạnh đó, toàn bộ nhân viên phải liên tục cập nhật quy định về an ninh mạng và chính sách riêng tư của chúng tôi. Mỗi quý, cũng như bất kỳ thời điểm nào có chính sách mới bổ sung, các nhân viên đều được lưu ý và/hoặc nhắc nhở về tầm quan trọng đối với quyền riêng tư, cũng như những gì họ có thể làm để đảm bảo thông tin của khách hàng được bảo mật. Sau cùng, server chúng tôi dùng để lưu trữ thông tin nhận dạng cá nhân được đặt trong môi trường an ninh nghiêm ngặt.</p>

		<p style="text-align: justify;">Hy vọng chính sách này đã làm rõ các thủ tục của chúng tôi liên quan đến thông tin cá nhân của bạn. Nếu có bất kỳ thắc mắc nào về an ninh mạng trên website này, bạn có thể gửi email về &nbsp;<a href="mailto:thanh@thuna.vn" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">lienhe@Thuna.vn</a></p>

		<p style="text-align: justify;"><strong>LƯU Ý VỀ CÁC THAY ĐỔI TRÊN THUNAWEDDING</strong></p>

		<p style="text-align: justify;">Nếu tại một thời điểm nào đó ở tương lai có sự thay đổi trong quy trình sử dụng thông tin từ chúng tôi tác động đến thông tin nhận dạng cá nhân của bạn, chúng tôi sẽ thông báo với bạn qua email về những thay đổi có liên quan. Ngay hiện tại, bạn có quyền từ chối cách sử dụng thông tin này bằng cách gửi tin nhắn về&nbsp;<a href="mailto:lienhe@Thuna.vn" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">lienhe@Thuna.vn</a>. Chúng tôi sẽ đăng những thay đổi trong chính sách bảo mật 30 ngày trước khi thực hiện. Bạn nên thường xuyên kiểm tra thông báo thay đổi về quyền riêng tư.</p>

		<p style="text-align: justify;"><strong>LIÊN HỆ VỚI THUNAWEDDING</strong></p>

		<p style="text-align: justify;">Nếu bạn có bất kỳ thắc mắc nào liên quan đến Chính sách bảo mật – Quyền riêng tư, vui lòng gửi email cho ThunaWedding qua&nbsp;<a href="mailto:thanh@thuna.vn" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">lienhe@Thuna.vn</a>&nbsp;với tiêu đề “Chính sách Riêng tư”. Bạn cũng có thể gửi thư về địa chỉ Công ty TNHH Asia Cas, Lầu 3 Tòa nhà Copac, Số 12, Đường Tôn Đản, Phường 13, Quận 4, TP. HCM.</p>

		<p style="text-align: justify;">ThunaWedding chia sẻ thông tin cá nhân của bạn với các bên thứ ba để phục vụ cho mục đích marketing. Bạn có thể đề nghị chúng tôi ngừng động thái này bằng cách sửa lại quyền riêng tư trong Hồ sơ thành viên (member profile) tại<a href="http://www.Thuna.vn/user/%5bprofile" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">http://www.Thuna.vn/user/[profile</a>] hoặc gửi email về&nbsp;<a href="mailto:lienhe@Thuna.vn" style="box-sizing: border-box; margin: 0px; padding: 0px; outline: none; vertical-align: baseline; color: rgb(37, 37, 37); text-decoration: none; background: transparent;">lienhe@Thuna.vn</a>&nbsp;(ghi rõ họ tên, địa chỉ và email của bạn).</p>                    
	 	</div>
	 </div>
</div>
@endsection
	