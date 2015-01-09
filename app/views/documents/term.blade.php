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
		 		<li><a class="active-a" href="{{URL::route('term')}}">Điều khoản sử dụng</a></li>
		 		<li><a href="{{URL::route('policy')}}">Chính sách riêng tư</a></li>
		 		<li><a href="{{URL::route('question')}}">Câu hỏi thuờng gặp</a></li>
		 		<li><a href="{{URL::route('contact')}}">Liên hệ</a></li>
		 	</ul>
	 	</div>			 				 	
	 </div>
	 <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 content-footer">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title-content-footer text-center">
	 		Điều khoản sử dụng
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 para-content">
	 		
       		<h5 style="text-align: center;">Chào mừng bạn đến với ThunaWedding!</h5>

			<p style="text-align: justify;">Đây sẽ là nơi để bạn gặp gỡ những cô dâu và những người có niềm đam mê đối với dịch vụ tổ chức đám cưới hoặc đang trong cùng giai đoạn lên kế hoạch cưới giống bạn với nhiều nội dung vô cùng hấp dẫn. Trong chuyên mục Cộng đồng, bạn có thể chia sẻ những lời khuyên giá trị, những câu chuyện vui và trải lòng về cuộc sống của một cô dâu trong những ngày chuẩn bị cưới hay trong đời sống hôn nhân.</p>

			<p style="text-align: justify;">Tuy nhiên, có một số quy định mà bạn cần tuân thủ. Vui lòng đọc bản Điều khoản dịch vụ dưới đây (điều này thực sự quan trọng đối với các thành viên của cộng đồng) trước khi tham gia thảo luận. Những quy định này được tạo ra để giúp cộng đồng giữ được một môi trường thông tin luôn lành mạnh và thú vị.</p>

			<p style="text-align: justify;">Khi tạo tài khoản trên ThunaWedding, để có thể chủ động đăng tải bài trên Cộng đồng, bạn phải cam kết tuân thủ những điều như sau:</p>

			<p style="text-align: justify;"><strong>CÁC QUY ĐỊNH:</strong></p>

			<p style="text-align: justify;"><strong>1. Không cho phép gây rối, công kích cá nhân</strong></p>

			<p style="text-align: justify;">Chúng tôi biết rằng bạn đã trưởng thành, và chúng tôi không cấm bạn dùng những từ ngữ thông tục, mỉa mai hay chia sẻ ý kiến của mình trong cuộc trò chuyện. Tuy nhiên, bạn sẽ bị khóa tài khoản nếu bạn gây hiềm khích với những người sử dụng (hay còn gọi là những user) khác.</p>

			<p style="text-align: justify;">Hiềm khích và những công kích mang tính cá nhân không được chấp nhận dù ở bất kỳ hình thức nào. Vì vậy, vui lòng chú ý đến cách bạn giải quyết hoặc thảo luận về người khác.</p>

			<p style="text-align: justify;">Công kích cá nhân bao gồm bắt đầu một chủ đề với một tên người dùng để công kích họ, tạo liên kết đến một chủ đề để đối chất về bài đăng, suy nghĩ hay niềm tin (không phải là một topic) của họ, bắt đầu một khảo sát/câu hỏi độc hại hoặc có tính xúc phạm về một user khác, sử dụng những hình ảnh (về hành động, cử chỉ hay biểu tượng…) để trực tiếp công kích hay cách xử sự tồi tệ, v.v…</p>

			<p style="text-align: justify;">ThunaWedding khuyến khích bạn chia sẻ những quan điểm đồng thời tôn trọng suy nghĩ và cảm xúc của người khác. Không ngại chia sẻ, nhưng sẵn sàng lắng nghe và chấp nhận quan điểm của người khác dù bạn không phải lúc nào cũng tán đồng, bởi vì không đồng ý không có nghĩa rằng đây là nơi để bạn công kích niềm tin của bất kỳ một ai khác.</p>

			<p style="text-align: justify;">Gây mâu thuẫn, tạo sự đối kháng trên các trang của ThunaWedding bằng cách đăng tải các nội dung có tính kích động hoặc những tin nhắn ngoài chủ đề có khuynh hướng thách thức các thành viên/làm gián đoạn cuộc thảo luận bình thường là hành động không được cho phép và dẫn đến việc bị cảnh cáo hoặc khóa tài khoản trên các trang.</p>

			<p style="text-align: justify;">Gây hấn trên mạng không chỉ là một hành động của tuổi vị thành niên, hành vi này là có thật ở mọi lứa tuổi và nó không được chấp nhận.</p>

			<p style="text-align: justify;">Nếu vì bất kỳ lý do nào mà bạn bị cho là đang gây hấn, hậu quả cuối cùng, nếu không diễn ra một cách tự động, sẽ là lệnh cấm truy cập từ cộng đồng.</p>

			<p style="text-align: justify;"><strong>2. Tất cả đều được công khai</strong></p>

			<p style="text-align: justify;">Chúng tôi biết rằng bạn rất vui khi chia sẻ tất cả tin tức của mình bằng cách đăng blog hay thông qua các website cá nhân. Nhưng bạn nên lưu ý một điều: đây là một forum công cộng do đó bạn nên chắc chắn mình có thể tin cậy những người mà bạn cho biết thông tin cá nhân của mình.</p>

			<p style="text-align: justify;">Một điều quan trọng khác cần ghi nhớ là tên người sử dụng (username) của bạn sẽ hiện ra khi có người gõ vào ô tìm kiếm. Vì vậy, mong bạn hãy lưu ý rằng bất cứ ai cũng có thể đọc những gì mà bạn đăng tải nếu họ có username của bạn.</p>

			<p style="text-align: justify;">Nếu bạn đang băn khoăn chia sẻ một nội dung đến mức nào là đủ, tốt hơn hết, bạn không nên đăng tải nội dung ấy.</p>

			<p style="text-align: justify;"><strong>3. Thông tin cá nhân và/hoặc tin nhắn cá nhân sẽ không được phép chia sẻ trên các trang ThunaWedding</strong></p>

			<p style="text-align: justify;">Không thu thập, lưu trữ hay đăng thông tin cá nhân của các thành viên khác, trong bất kỳ hoàn cảnh nào.</p>

			<p style="text-align: justify;">Bất kể thông tin nào được thành viên khác chia sẻ, bạn không thể đăng lại với tên thật, hình ảnh hay bất cứ thông tin nhận dạng nào của họ.</p>

			<p style="text-align: justify;">Những tin nhắn riêng tư trong phạm vi cộng đồng cần được để ở chế độ riêng tư giữa hai user. Nếu có một thành viên liên lạc với bạn bằng tin nhắn riêng, tin nhắn này sẽ ở chế độ riêng tư. Vui lòng tôn trọng lẫn nhau và giữ những tin nhắn riêng ở chế độ riêng tư.</p>

			<p style="text-align: justify;">Nếu bạn nghi ngờ mình nhận được một tin quấy rối trong tin nhắn cá nhân, vui lòng liên hệ với người điều hành của ThunaWedding. Bạn cũng có thể gửi email vào lienhe@Thuna.vn</p>

			<p style="text-align: justify;">Bất kỳ vi phạm nào đều không được chấp nhận. Xâm phạm sự riêng tư của thành viên khác sẽ dẫn đến việc bạn bị khóa tài khoản ngay lập tức.</p>

			<p style="text-align: justify;"><strong>4. Ban điều hành và báo cáo</strong></p>

			<p style="text-align: justify;">Mặc dù đã có các nhóm quản lý, chúng ta đều hiểu rằng không phải tất cả các bài đăng vi phạm đều bị phát hiện.</p>

			<p style="text-align: justify;">Quản trị viên là những thành viên của ThunaWedding đã có những đóng góp vượt qua vị trí thành viên thông thường. Họ tình nguyện dành thời gian để quản trị các trang chuyên mục cụ thể trong cộng đồng. Những thành viên này ở đây là để sử dụng các trang chuyên mục, giống như bạn vậy, nhưng họ cũng theo dõi để giúp đỡ những thành viên khác và xác định những trục trặc xảy ra. Các quản trị viên cũng có quyền cảnh báo/khóa tài khoản của các user khác khi cần thiết, dựa trên quyết định của họ sau khi đã đọc và hiểu rõ những quy định của cộng đồng.</p>

			<p style="text-align: justify;">ThunaWedding cũng tin cậy những thành viên của mình trong việc báo cáo những bài đăng mà bạn cảm thấy có sự vi phạm quy định. Nếu bạn nhận thấy có những vi phạm, vui lòng báo cáo và chúng sẽ được xác định.</p>

			<p style="text-align: justify;">Nếu các bài đăng của bạn bị báo cáo bởi nhiều user khác, hoặc tỉ lệ bài bị báo cáo cao, tài khoản của bạn sẽ bị kiểm tra bởi một quản trị viên. Sau khi tiến hành khảo sát kỹ lưỡng, tài khoản của bạn có thể bị khóa chỉ vì một hành động nhỏ, vì lịch sử các bài đăng của bạn đã chứng minh rằng bạn thường xuyên góp phần vào việc tạo ra một môi trường tiêu cực trong cộng đồng.</p>

			<p style="text-align: justify;">Chúng tôi rất trân trọng sự cá tính và vui vẻ, nhưng không hỗ trợ cho những gì tiêu cực hay độc hại.</p>

			<p style="text-align: justify;"><strong>5. Tạo tài khoản thực</strong></p>

			<p style="text-align: justify;">Không mạo danh các thành viên hay nhân viên của ThunaWedding. Những hành động này sẽ khiến bạn bị cảnh cáo, khóa hay xóa tài khoản.</p>

			<p style="text-align: justify;">Những điều trên cũng sẽ được áp dụng đối với những trường hợp tạo tài khoản nhằm công kích hay giả mạo bất kỳ thành viên/tên thành viên nào (kể cả bạn thân) trong bất kỳ hoàn cảnh nào. Sẽ không có sự cảm thông nào cho hành động này trên các chuyên mục của chúng tôi.</p>

			<p style="text-align: justify;">Tất cả các tên người dùng và việc sử dụng của họ luôn được theo dõi và đánh giá bởi ban quản trị và điều hành.</p>

			<p style="text-align: justify;">ThunaWedding, các quản trị viên và ban điều hành tình nguyện có quyền xóa bỏ hay biên tập các bài đăng nào theo quyết định của họ.</p>

			<p style="text-align: justify;">Bất kỳ bài đăng nào góp phần vào việc tạo ra bầu không khí tiêu cực và đe dọa trên các chuyên mục sẽ bị xóa và dẫn đến việc cảnh cáo, đình chỉ hoặc chấm dứt quyền đăng bài trên diễn đàn. Vi phạm bất kỳ quy định nào sẽ dẫn đến việc bị xóa bài và đình chỉ quyền đăng bài.</p>

			<p style="text-align: justify;">Nếu bạn muốn báo cáo một vấn đề nào đó, vui lòng liên hệ với điều hành của mỗi chuyên mục hoặc gửi email cho chúng tôi qua lienhe@Thuna.vn</p>

			<p style="text-align: justify;">Nếu bạn đã kết hôn, chúng tôi hân hạnh giới thiệu trang ThunaHome với nhiều chuyên mục thú vị dành cho bạn. Nếu đang mong có con, bạn nên thử ghé thăm trang ThunaBaby.</p>

			<p style="text-align: justify;">ThunaWedding là kho tài nguyên hàng đầu về đám cưới cung cấp thông tin, hướng dẫn, tiếp đãi và hỗ trợ những người chuẩn bị làm đám cưới ở bất cứ nơi đâu, trong suốt giai đoạn chuẩn bị căng thẳng, bận rộn và hạnh phúc (và còn hơn thế), thông qua những diễn đàn có tính tương tác cao ở Việt Nam và trên thế giới. Bản Điều khoản sử dụng này có thể được cập nhật nhiều lần mà không cần thông báo trước.</p>

			<p style="text-align: justify;">Ở đây có một số vấn đề mà chúng tôi muốn bạn nhận thức rõ trước khi sử dụng website ThunaWedding, các dịch vụ được cung cấp bởi ThunaWedding hay thông qua website ThunaWedding và bất bất kỳ bộ phận hay chuyên mục nào thuộc về nội dung website, trang tin nhắn, biểu mẫu liên hệ nhà cung cấp, thông tin thành viên, dữ liệu về đám cưới cá nhân của thành viên và thông tin, folder, bài đăng, tin nhắn, hình ảnh và đồ họa được gọi là các chuyên mục của chúng tôi, các chuyên mục thuộc ThunaWedding. Bạn hiểu và đồng ý rằng các chuyên mục của chúng tôi được tạo ra một cách mặc định và ThunaWedding không chịu trách nhiệm về khả năng tiếp cận (hay bất kỳ phí tổn, lệ phí nào đi cùng với khả năng này) các chuyên mục của chúng tôi. ThunaWedding cũng không chịu trách nhiệm về việc lưu trữ hay duy trì các giao tiếp bất kỳ hay cài đặt cá nhân của người dùng.</p>

			<p style="text-align: justify;"><em>1. Tôi, thành viên của ThunaWedding, quản lý website này…</em></p>

			<p style="text-align: justify;">Với sự xem xét các lượt thăm quan và sử dụng các Chuyên mục, bạn được cho là có thể tạo nên một hợp đồng ràng buộc. Bạn cũng đồng ý rằng bất kỳ thông tin nào mình cung cấp về chính bản thân là chính xác và hoàn thiện vào khoảng thời gian nó được cung cấp. Bạn đồng ý về việc cập nhật thông tin kịp thời cho ThunaWedding để đảm bảo sự chính xác và đầy đủ này. Việc không cung cấp đầy đủ và chính xác, kịp thời cập nhật thông tin về bạn sẽ tạo thành cơ sở để ThunaWedding đình chỉ hoặc chấm dứt quyền sử dụng tài khoản của bạn và từ chối các dịch vụ của bạn trong tương lai.</p>

			<p style="text-align: justify;">ThunaWedding quan tâm đến sự an toàn và riêng tư của tất cả các cô dâu, chú rể và những người sử dụng khác, kể cả trẻ em. Vui lòng ghi nhớ rằng Các Chuyên mục của ThunaWedding được thiết kế để cung cấp thông tin, hướng dẫn, giải trí và hỗ trợ cho những người chuẩn bị đám cưới và gia đình họ, và vì vậy, chúng tôi có rất nhiều đối tượng độc giả khác nhau. Theo đó, trách nhiệm của người giám hộ hợp pháp (hoặc cha và mẹ) là quyết định phần nào trong các Chuyên mục là thích hợp cho con của bạn.</p>

			<p style="text-align: justify;">Ngoài Điều khoản sử dụng, khi bạn dùng một Chuyên mục của ThunaWedding, bạn cũng bị ràng buộc bởi các hướng dẫn và quy định đã được công bố áp dụng cho Chuyên mục cụ thể đó.</p>

			<p style="text-align: justify;"><em>2. Bảo mật</em></p>

			<p style="text-align: justify;">Những thông tin và dữ liệu được bạn cung cấp phải tuân thủ chính sách bảo mật của chúng tôi. Chính sách bảo mật được cập nhật theo thời gian. Bạn có thể tham khảo tại www/Thuna.vn.chinh sach bao mat.</p>

			<p style="text-align: justify;"><em>3. Đây là bản thỏa thuận trước lễ cưới</em></p>

			<p style="text-align: justify;">Bất kỳ tên gọi, logo, và/hoặc cụm từ trong các Chuyên Mục của chúng tôi đều có thể tạo thành nhãn hiệu và/hoặc bản quyền của ThunaWedding hoặc khách hàng của ThunaWedding. Nhãn hiệu ThunaWedding và những nội dung của website này là tài sản độc quyền của Thuna. Tái sản xuất toàn bộ hoặc từng phần là hành động bị nghiêm cấm khi không có văn bản cho phép của ThunaWedding.</p>

			<p style="text-align: justify;">Tất cả những gì được viết trong Các Chuyên mục là tài sản của ThunaWedding, và được bảo vệ như trên. Không có bất kỳ một dữ liệu nào được phép tái sản xuất mà không có văn bản đồng ý của chúng tôi, trừ trường hợp tải xuống hay in ra một bản độc nhất dành cho chính bạn (và, tất nhiên, cho hôn phu/hôn thê và các phù dâu, phù rể). Bản quyền bao gồm những dữ liệu gốc trên Thuna.vn, bản thảo của các bài đăng trong các thư mục, các soạn thảo được biên tập hay chọn lọc của các bài đăng mà chúng tôi có thể bán hoặc phân phối. Quyền được tải và lưu trữ hoặc cung cấp các dữ liệu được tìm thấy trên ThunaWedding chỉ được dùng cho mục đích xem tham khảo. Dữ liệu sẽ không được tái sản xuất dưới bất cứ dạng nào. Bất cứ dạng tái sản xuất hay biên tập, chỉnh sửa bằng bất kỳ phương tiện cơ học hay điện tử nào mà không có văn bản đồng ý của ThunaWedding đều bị nghiêm cấm.</p>

			<p style="text-align: justify;">ThunaWedding có quyền tái xuất bản bất kỳ tư liệu nào được đóng góp bởi độc giả của chúng tôi. Thông qua việc đăng một tin nhắn, một bạn đọc dài hạn đã đương nhiên cấp quyền cho ThunaWedding tái bản hay bán tin nhắn như một phần của bất kỳ soạn thảo nào như một Tin tức của ThunaWedding. Những dữ liệu được bảo vệ bản quyền sẽ không được trình bày mà không có sự cho phép của chủ sở hữu bản quyền. Bởi có hàng ngàn nguồn dữ liệu trên internet, ThunaWedding không thể biết liệu một bài viết có đang vi phạm bản quyền hay không. Vui lòng ghi nhớ rằng bạn chịu trách nhiệm về những tư liệu mà bạn đăng trên ThunaWedding, bao gồm phong cách, độ tin cậy, nguồn gốc và bản quyền. Các tác giả có thể phải chịu trách nhiệm pháp lý đối với việc vi phạm bản quyền, bôi nhọ hay xâm phạm đời tư, cũng như bất kỳ một sự hư hại nào phát sinh từ những hành động được gây ra bởi bài mà bạn gửi và được đăng bởi ThunaWedding. Bạn chịu trách nhiệm đảm bảo rằng các tin nhắn hay bài đăng không không vi phạm bất kỳ một bản quyền đang có hiệu lực. Nếu bạn cho rằng bài đăng có bản quyền của mình đã được đăng trên ThunaWedding mà không có sự cho phép, vui lòng tham khảo Điều khoản sử dụng để nắm các chính sách của chúng tôi liên quan đến việc loại bỏ chúng.</p>

			<p style="text-align: justify;">ThunaWedding có giấy phép để xuất bản những nội dung được gửi bởi bất kỳ user và người đóng góp nào trong phạm vi ThunaWedding. ThunaWedding cũng sẽ có quyền viết lại và bán lại không độc quyền đối với bất kỳ nội dung và dữ liệu nào được gửi bởi user và các cá nhân đóng góp trong website toàn cầu của ThunaWedding. Giấy phép xuất bản không độc quyền này và quyền viết lại/ bán lại được áp dụng trên tất cả các dữ liệu nào được gửi để xuất bản trong phạm vị ThunaWedding, bao gồm cả những bảng chuyên mục để đăng tin nhắn và những nội dung được gửi lên ThunaWedding để đăng tải và tiếp đó được xuất bản trong những Chuyên mục không dành để đăng tin nhắn. ThunaWedding và các nhân viên không và sẽ không chịu trách nhiệm về bất kỳ sự sai lệch, hiểu lầm hay những thông tin gây tổn hại và lời khuyên được đưa ra trong Chuyên mục hay bất kỳ kết quả nào đạt được từ việc sử dụng những thông tin và lời khuyên này. Chúng tôi cũng không chịu trách nhiệm về tổn thất hay thiệt hại nào của user được gây ra bởi việc dựa vào những thông tin và lời khuyên mà họ có được trên các Chuyên mục này. (Nghe nghiêm trọng nhỉ? Chúng tôi không muốn hù dọa bạn! Chúng tôi không thể kiểm soát về mặt vật chất đối với các forum như các bảng tin nhắn, và chúng tôi tin vào sự nhạy bén và thông minh của các user trong việc đưa ra những quyết định của chính mình).</p>

			<p style="text-align: justify;"><em>4. Luôn cẩn trọng</em></p>

			<p style="text-align: justify;">Với tính tương tác tự nhiên của các forum, tất cả các nhân viên được trả lương và user đều tạo ra nội dung trên diễn đàn. Chúng tôi có thể kiểm soát các bài đóng góp của nhân viên, nhưng không thể biên tập hay chắc chắn về độ chính xác về nội dung được tạo bởi user, rất nhiều người trong số họ sử dụng tên hiển thị là vô danh và với những người dùng này chúng tôi không có một mối liên hệ chính thức. Vì vậy, những user của ThunaWedding nên nắm bắt những thông tin được tạo ra bởi những người đồng sử dụng với sự thận trọng. Có rất nhiều lời khuyên hữu ích trên ThunaWedding, nhưng người sử dụng nên cân nhắc bất cứ thông tin hay lời khuyên nào được đưa ra bởi các thành viên khác và xem đó như là điểm khởi đầu cho một nghiên cứu của riêng mình. Thuna.vn không thể bảo chứng độ chính xác, hiệu quả hay xác thực của những thông tin bất kỳ được cung cấp trong phạm vi các forum của ThunaWedding.</p>

			<p style="text-align: justify;">Thuna.vn không thể bảo đảm rằng tất cả các nội dung và chất liệu hiển thị trên Các chuyên mục của ThunaWedding không vi phạm vào các bản quyền đã được đăng ký hoặc không được đăng ký. Hàng ngày, có thể có hàng ngàn bài đăng mới xuất hiện trên bảng tin nhắn của Thuna và trong giới hạn của sức người, khó có thể xác nhận rằng mỗi hay tất cả các bài đăng đó không vi phạm bản quyền. (Chúng tôi ước mình có thể! Chúng tôi ước mình có thật nhiều nhân viên để làm tất cả những điều chúng tôi cần và muốn, nhưng thực tế là không thể).</p>

			<p style="text-align: justify;"><em>5. Tất cả những điều không được phép</em></p>

			<p style="text-align: justify;">Những hành vi online đòi hỏi một cảm quan thông thường và những nghi thức cơ bản. Theo đó, có một vài quy tắc mà bạn đồng ý tuân theo:</p>

			<p style="text-align: justify;">-Không thô bạo, thô tục, khiêu dâm, hay nói cách khác là ngôn ngữ độc hại.</p>

			<p style="text-align: justify;">-Không phân biệt chủng tộc, dân tộc, hay sử dụng ngôn ngữ chướng tai.</p>

			<p style="text-align: justify;">-Không quấy rối, rình rập, hăm dọa những thành viên khác trong cộng đồng.</p>

			<p style="text-align: justify;">-Không nói xấu, bôi nhọ hoặc dùng ngôn ngữ quanh co.</p>

			<p style="text-align: justify;">-Không có hành vi phá hoại trực tuyến. Điều này bao gồm sử dụng ngôn ngữ lăng mạ và liên tục nhấn phím return trong chat room, hay hành động tạo ra những ảnh hưởng tiêu cực đến khả năng tiến hành những trao đổi trong thời gian thực.</p>

			<p style="text-align: justify;">-Không mạo danh bất cứ ai, bao gồm, nhưng không giới hạn, những thành viên khác trong cộng đồng hoặc nhân viên của Thuna.</p>

			<p style="text-align: justify;">-Không đăng tải, phân phối, truyền tải hay cổ vũ cho những nội dung bất hợp pháp.</p>

			<p style="text-align: justify;">-Không xâm phạm quyền riêng tư của bất cứ ai.</p>

			<p style="text-align: justify;">-Không có hành động gây nguy hiểm đối với những vị thành niên.</p>

			<p style="text-align: justify;">-Không lôi kéo, giả mạo các dấu hiệu nhận dạng để giả mạo nguồn gốc của bất kỳ thông tin nào được đăng trên ThunaWedding hay được cung cấp bởi Thuna và các nhân viên.</p>

			<p style="text-align: justify;">-Không đăng tải, cung cấp, truyền tải hoặc tạo sẵn bất kỳ thông tin nào (như những thông tin nội bộ, thông tin độc quyền hoặc bảo mật) mà bạn không có quyền tạo sẵn theo hợp đồng, nhiệm vụ ủy thác hoặc thừa hành pháp luật.</p>

			<p style="text-align: justify;">-Không đăng tải, cung cấp, truyền tải hay tạo sẵn những thư rác hay spam.</p>

			<p style="text-align: justify;">-Không đăng tải, upload, email hay các dạng truyền tải bất cứ một tư liệu nào có chứa mã độc (bao gồm spyware, worm, Trojan hourses, virus…).</p>

			<p style="text-align: justify;">- Không thu thập, lưu trữ hay đăng các dữ liệu cá nhân về hoặc thuộc về những thành viên khác trong cộng đồng.</p>

			<p style="text-align: justify;">-Không quảng cáo ở bất kỳ hình thức nào trên bảng tin nhắn hoặc chat room.</p>

			<p style="text-align: justify;"><em>6. Xem nhưng không dùng</em></p>

			<p style="text-align: justify;">Những nội dung trên Thuna.vn, bao gồm nhưng không giới hạn thông tin profile của thành viên như tên thành viên, địa chỉ email, thông tin liên lạc của thành viên hay những thông tin cá nhân liên quan đến đám cưới của các thành viên, sẽ không được lấy để sử dụng cho bất kỳ mục đích nào. Tên, địa chỉ email và những thông tin liên lạc khác từ profile hay từ các trang và bài đăng trên website này sẽ không được sử dụng bởi các nhà cung cấp bên ngoài hay bên thứ ba nào với mục đích quảng cáo. Những email không được yêu cầu gửi đến các thành viên hay nhà cung cấp trên Thuna.vn có thể xuyên tạc, làm mất thương hiệu kinh doanh và uy tín của ThunaWedding, cạnh tranh không lành mạnh, và có thể cũng vi phạm các luật cấm email không được yêu cầu, dẫn tới việc ThunaWedding sẽ đưa ra những hành động mang tính pháp lý thích hợp, bao gồm lệnh đình chỉ hành vi vi phạm, khoản thanh toán những lợi nhuận, thiệt hại và các khoản đóng phí pháp lý và các chi phí. Như đã nói ở trên, các thành viên của Thuna có thể liên kết tới website này, nhưng chỉ theo đúng các điều khoản và điều kiện áp dụng cho các liên kết được trình bày ở Điều khoản sử dụng.</p>

			<p style="text-align: justify;"><em>7. Chúng tôi có thể thay đổi</em></p>

			<p style="text-align: justify;">Chúng ta đều thay đổi, và ThunaWedding cũng vậy. Thuna.vn có quyền thay đổi và sửa đổi trong những chuyên mục của mình. Những sửa đổi hay thay đổi này có thể bao gồm, nhưng không bị giới hạn: ngưng tạm thời hay vĩnh viễn bất kỳ một dịch vụ được cung cấp bởi/thông qua ThunaWedding mà không báo trước, không chịu trách nhiệm trước bất kỳ một bên nào cho bất kỳ một thay đổi hay sửa đổi nào đối với các chuyên mục của chúng tôi.</p>

			<p style="text-align: justify;"><em>8. Xóa tài khoản không báo trước</em></p>

			<p style="text-align: justify;">Trong bất kỳ hoàn cảnh nào và không có thông báo trước, ThunaWedding có thể chấm dứt quyền truy cập của bạn, bao gồm xóa bỏ tài khoản thành viên của bạn và bất kỳ tư liệu và thông tin nào đi cùng với tài khoản thành viên (bao gồm tên người sử dụng, password, đăng ký và profile). Những nguyên nhân dẫn đến việc chấm dứt này có thể bao gồm việc vi phạm những điều được đăng ở mục số 5 trong Bản điều khoản sử dụng này hoặc hơn thế. Bạn đã thừa nhận và đồng ý rằng tất cả các nguyên nhân dẫn đến chấm dứt sẽ được quyết định bởi Thuna và ThunaWedding sẽ không chịu trách nhiệm trước bạn hay bất kỳ một bên nào về việc chấm dứt quyền truy cập vào những chuyên mục của chúng tôi hay về việc xóa bỏ bất kỳ tư liệu nào.</p>

			<p style="text-align: justify;"><em>9. Những phần không được bảo đảm</em></p>

			<p style="text-align: justify;">Bạn hoàn toàn hiểu và đồng ý:</p>

			<p style="text-align: justify;">Những dịch vụ được cung cấp trong chuyên mục của chúng tôi được cung cấp trên một nền tảng mặc định và có sẵn. Thuna.vn từ chối đảm bảo dưới bất kỳ hình thức nào, dù rõ ràng hay ngụ ý, cho những bảo chứng về khả năng kinh doanh, sự phù hợp với một mục đích cụ thể, và sự không vi phạm.</p>

			<p style="text-align: justify;">Thuna.vn không bảo đảm rằng: (i) Các dịch vụ sẽ đáp ứng được bất kỳ nhu cầu nào của bạn, (ii) các dịch vụ sẽ đúng giờ, an toàn, không bị gián đoạn, hay việc sử dụng bất kỳ dịch vụ nào trên các chuyên mục của chúng tôi sẽ hữu ích, chính xác hay đáng tin cậy, (iv) Số lượng của bất kỳ các sản phẩm, dịch vụ, thông tin hay những tư liệu khác được mua bán hay bạn có được thông qua các dịch vụ được cung cấp trên các chuyên mục sẽ đạt được nguyện vọng, (v) Bất kỳ lỗi nào trong quá trình vận hành các chuyên mục bao gồm sự vận hành của bất kỳ phần mềm nào sẽ được khắc phục.</p>

			<p style="text-align: justify;">Bất kỳ tư liệu nào được download hay có được thông qua việc sử dụng bất kỳ dịch vụ nào trên các chuyên mục của chúng tôi được tiến hành trên các rủi ro của chính bạn và bạn sẽ là người chịu trách nhiệm chính cho tất cả các tổn hại đến hệ thống máy tính (hay bất kỳ thiết bị nào kết nối với máy tính của bạn) hay mất dữ liệu tải về (cố ý hay khác) của bất kỳ loại tư liệu nào.</p>

			<p style="text-align: justify;">Không có thông tin hay lời khuyên nào, dù là truyền miệng hay được viết ra mà bạn nhận được từ ThunaWedding hay từ bất kỳ một dịch vụ nào của chúng tôi sẽ tạo ra bảo chứng là không nằm trong điều khoản sử dụng.</p>

			<p style="text-align: justify;">Một số quyền không cho phép loại trừ các bảo đảm nhất định hoặc sự giới hạn hoặc miễn trách nhiệm đối với những tổn hại ngẫu nhiên hay có tính hệ thống. Theo đó, một số giới hạn ở trên trong phần này sẽ có thể không được áp dụng cho bạn.</p>

			<p style="text-align: justify;"><em>10. Không chịu trách nhiệm về bất kỳ sự tổn hại nào</em></p>

			<p style="text-align: justify;">Bạn hiểu rõ và đồng ý rằng ThunaWedding sẽ không chịu trách nhiệm trước bạn về bất kỳ sự tổn hại, trực tiếp, gián tiếp, ngẫu nhiên, bao gồm: tổn thất về lợi nhuận, uy tín và danh tiếng, hay bất kỳ thiệt hại vô hình nào khác hoặc hơn thế nữa. Sự giới hạn trách nhiệm này được áp dụng kể cả trong trường hợp ThunaWedding đã đưa ra lời khuyên về khả năng thiệt hại.</p>

			<p style="text-align: justify;"><em>11. Liên quan đến pháp lý</em></p>

			<p style="text-align: justify;">Thực hiện luật. Bạn nên biết rằng ThunaWedding có thể truy cập, duy trì và tiết lộ những thông tin mà bạn cung cấp cho Thuna nếu được yêu cầu bởi luật định hay nếu ThunaWedding, trong một sự đảm bảo, tin rằng những truy cập, bảo trì hay tiết lộ đó là hợp lý và cần thiết để: (i) tuân thủ bất kỳ quy trình pháp lý nào, (ii) thực hiện điều khoản sử dụng của Thuna.vn, (iii) để đáp lại các cáo buộc rằng bất kỳ nội dung hay thông tin nào mà bạn cung cấp hay truyền tải, hay tạo sẵn vi phạm quyền lợi của bên thứ ba; (iv) đáp lại những yêu cầu dịch vụ khách hàng của bạn; hoặc (v) bảo vệ quyền lợi và tài sản của ThunaWedding, các nhà cung cấp của ThunaWedding, các thành viên trong cộng đồng, người sử dụng và công chúng nói chung.</p>

			<p style="text-align: justify;">Bồi thường. Bạn đồng ý bồi thường và không làm hại cho ThunaWedding, những chi nhánh, công ty con, các giám đốc, cán bộ, đại lý, nhà cung cấp và những đối tác khác, và các nhân viên, bao gồm phí ủy quyền, được tạo ra bởi bất kỳ bên thứ ba nào do phát sinh của bất kỳ một tư liệu hay thông tin nào được đăng, cung cấp hay truyền đạt, tạo sẵn bởi bạn trong Chuyên mục của chúng tôi, hay từ việc sử dụng các chuyên mục, hay từ sự vi phạm bản điều khoản sử dụng, hoặc từ sự vi phạm quyền lợi của một người khác.</p>

			<p style="text-align: justify;">Thỏa thuận. Điều khoản sử dụng tạo ra một thỏa thuận giữa bạn và ThunaWedding và chi phối việc sử dụng của bạn trong chuyên mục của chúng tôi và bất kỳ dịch vụ nào được cung cấp trên chuyên mục của chúng tôi. Thỏa thuận này thay thế cho bất kỳ thỏa thuận nào trước đó giữa bạn và ThunaWedding.</p>

			<p style="text-align: justify;">Chỉ hai chúng ta. Bạn đồng ý rằng, ngoại trừ những điều đã được ghi rõ trong Điều khoản sử dụng, sẽ không có bên thứ ba nào được hưởng lợi từ bản thỏa thuận này.</p>

			<p style="text-align: justify;">Những gì đã được liên kết thì không được chia rẽ. Việc ThunaWedding không thực hiện hoặc thi hành bất kỳ quyền hay quy định nào trong Điều khoản sử dụng không đồng nghĩa với việc hủy bỏ quyền hay quy định đó. Nếu có bất kỳ quy định nào trong điều khoản sử dụng được cơ quan có thẩm quyền xác định là không hợp lệ, những điều khoản khác và quy định khác vẫn có hiệu lực thi hành.</p>

			<p style="text-align: justify;">Sở hữu của bạn.</p>

			<p style="text-align: justify;">Bạn đồng ý rằng tài khoản thành viên của ThunaWedding không thể chuyển nhượng và bất kỳ quyền lợi nào gắn với tài khoản của bạn hoặc những nội dung trong tài khoản của bạn sẽ chấm dứt ngay khi bạn qua đời.</p>

			<p style="text-align: justify;">Thời gian đang gõ nhịp. Bạn đồng ý rằng bất kể các quy chế hay luật định trái ngược, bất kỳ khiếu nại hay nguyên nhân của hành động phát sinh hay có liên quan đến các dịch vụ được cung cấp trên chuyên mục của chúng tôi hay từ các điều khoản sử dụng cần phải được đệ trình trong vòng một (1) năm sau khi khiếu nại hay nguyên nhân của hành động đó phát sinh hoặc sẽ bị ngăn cản vĩnh viễn.</p>

			<p style="text-align: justify;">Các tựa đề. Tựa đề chuyên mục và những tựa đề khác trong bản Điều khoản sử dụng là để tạo sự thuận tiện và không có tác dụng về mặt pháp lý hoặc hợp đồng.</p>                    
	 	</div>
	 </div>
</div>
@endsection
	