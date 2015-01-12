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
		      	<li><a href="{{URL::to('website-introduce')}}" title="Website cưới">
		        		<img class="icon-hover-website" src="{{Asset('icon/Quanlyngansach.png')}}">
		        		<span class="txt-menu">Website cưới</span>
		        	</a>
		        </li>
		      	<li><a href="{{URL::to('planning-tool')}}" title="Công cụ lập kế hoạnh">
		      			<img class="icon-hover-planning-tool" src="{{Asset('icon/notepad-icon.png')}}">
		      			<span class="txt-menu">Công cụ lập kế hoạch</span>
 		      		</a>
		      	</li>
		        <!-- <li><a href="{{URL::route('website')}}" title="Website cưới">
		        		<img class="icon-hover-website" src="{{Asset('icon/Quanlyngansach.png')}}">
		        		<span class="txt-menu">Website cưới</span>
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
		        </li> -->
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
	  

@include('site-map')

@endsection

@section('content')

<div class="row slider-index">
	<div class="col-md-12 hidden-sm hidden-xs" style="padding:0" >

		<!-- Carousel -->
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<!-- <ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
 -->			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<img src=" {{Asset("images/slide-main/1-1.jpg")}}" alt="">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <!-- <h2><span>Liên hệ ngay !!! <br /> Để được tư vấn miễn phí</span></h2> -->
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src=" {{Asset("images/slide-main/2.jpg")}}" alt="">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-left">
                            <!-- <h2><span>Niềm vui trọn vẹn</span></h2> -->
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src=" {{Asset("images/slide-main/3.jpg")}}" alt="">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <!-- <h2><span>Hạnh phúc vĩnh cửu</span></h2> -->

                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src=" {{Asset("images/slide-main/4.jpg")}}" alt="">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                           <!--  <h2><span>
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            Happy 
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                             Ending ♥</span></h2> -->

                        </div>
                    </div><!-- /header-text -->
			    </div>
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
			<h6 class="user_register_title">Đăng ký ngay</h6>

		    @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>@endif
		    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount" class="frm-register">
		      	<div class="row">
			      	<div class="col-md-12">
			          	<div class="form-group">
			            	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="4" autofocus>
			            	@foreach ($errors->get('email') as $message)
			              		<p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
			            	@endforeach
			          	</div>
			        </div>
		        </div>
		      	<div class="row">
		        	<div class="col-md-12">
		          
			            <div  class="input-append form-group">
			              <input data-format="yyyy-MM-dd" type="text" readonly name="weddingdate" id="weddingdate" class="form-control input-lg " placeholder="Ngày cưới" tabindex="3">
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
			            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mật khẩu" tabindex="5">
			            @foreach ($errors->get('password') as $message)
			              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
			            @endforeach
			          </div>
			        </div>
			        <div class="col-md-12">
			          <div class="form-group">
			            <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="Xác nhận mật khẩu" tabindex="6">
			            @foreach ($errors->get('password_confirm') as $message)
			              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
			            @endforeach
			            <input type="text" name="role" id="role" hidden value="2">
			          </div>
			        </div>
		      	</div>
		      	<div class="row">
		        	<div class="col-md-12">
		        		<div class="form-group">
		        			<button type="submit" class="btn btn-primary btn-register">Đăng ký</button>
					      	<a href="{{URL::to('login/facebook')}}" class="btn btn-social btn-facebook bn-login-fb-index">
						      <i class="fa fa-facebook"></i> Login Facebook
						    </a>
					    </div>
					</div>
				</div>
		    </form>
			    <script type="text/javascript">
			        $('#create_acount').validate({
			        rules:{
			          
			            weddingdate:{
			            required:true,
			            },
			            email:{
			            required:true,
			            email: true,
			            remote:{
			                      url:'{{URL::route('check_user_email')}}',
			                      type:"POST"
			                  }
			            },
			            password:{
			            required:true,
			            minlength:6,
			            },
			            password_confirm:{
			            equalTo:'#password',
			            }
			        },
			        messages:{
			            
			            weddingdate:{
			            required:'Bạn chưa chọn ngày cưới',
			            
			            },
			            email:{
			            required:'Bạn chưa điền email của bạn',
			            email:'Định dạng email không đúng',
			            remote:'Email này đã tồn tại',
			            },
			            password:{
			            required:'Bạn chưa nhập mật khẩu',
			            minlength:'Password ít nhất phải có 6 kí tự',
			            },
			            password_confirm:{
			            equalTo:'Không trùng với mật khẩu bạn đã nhập',
			            }
			        }
			    })
			</script>
		<!-- END FORM REGISTER -->

</div><!--/.row -->

<div class="row" id="menu-bar-bottom">
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#checklist" role="tab" data-toggle="tab" class="active" >
			<img src="{{Asset('icon/task.png')}}"><br /><br />
			<span>Danh sách công việc</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#budget" role="tab" data-toggle="tab" >
			<img src="{{Asset('icon/data31.png')}}"><br /><br />
			<span>Quản lý ngân sách</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#guestlist" role="tab" data-toggle="tab" >
			<img src="{{Asset('icon/group12.png')}}"><br /><br />
			<span>Danh sách khách mời</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#website" role="tab" data-toggle="tab" >
			<img src="{{Asset('icon/internet5.png')}}"><br /><br />
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

<div class="row cam-nhan-khach-hang">
	<div class="col-lg-12 cam-nhan-title">CẢM NHẬN KHÁCH HÀNG ĐỐI VỚI THUNA</div>
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="col-lg-4 col-sm-6 col-xs-12 cam-nhan-item ">
			<img class="img-cam-nhan" src="{{Asset('images/slide-main/kh-nhan-xet-h2.png')}}">
			<div class="name-khach-hang">Hoài Anh & Bích Phương</div>
			<div class="nhan-xet-khach-hang">Lorem ipsum dolor sit amet, 
				consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
				et dolore magna aliqua. Ut enim ad 
				minim veniam, quis nostrud 
				exercitation ullamco laboris nisi ut 
				aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehenderit 
				in voluptate velit esse cillum dolore 
				eu fugiat nulla pariatur. Excepteur 
				sint occaecat cupidatat non proident, 
				sunt in culpa qui officia deserunt 
				mollit anim id est laborum.
			</div>
		</div>

		<div class="col-lg-4 col-sm-6 col-xs-12 cam-nhan-item">
			<img class="img-cam-nhan" src="{{Asset('images/slide-main/kh-nhan-xet-h3.png')}}">
			<div class="name-khach-hang">Đăng Khánh & Thu Lan</div>
			<div class="nhan-xet-khach-hang">Lorem ipsum dolor sit amet, 
				consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
				et dolore magna aliqua. Ut enim ad 
				minim veniam, quis nostrud 
				exercitation ullamco laboris nisi ut 
				aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehenderit 
				in voluptate velit esse cillum dolore 
				eu fugiat nulla pariatur. Excepteur 
				sint occaecat cupidatat non proident, 
				sunt in culpa qui officia deserunt 
				mollit anim id est laborum.
			</div>
		</div>

		<div class="col-lg-4 col-sm-6 col-xs-12 cam-nhan-item">
			<img class="img-cam-nhan" src="{{Asset('images/slide-main/kh-nhan-xet-h1.png')}}">
			<div class="name-khach-hang">Tùng Lâm & Ngọc Hà</div>
			<div class="nhan-xet-khach-hang">Lorem ipsum dolor sit amet, 
				consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 
				et dolore magna aliqua. Ut enim ad 
				minim veniam, quis nostrud 
				exercitation ullamco laboris nisi ut 
				aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehenderit 
				in voluptate velit esse cillum dolore 
				eu fugiat nulla pariatur. Excepteur 
				sint occaecat cupidatat non proident, 
				sunt in culpa qui officia deserunt 
				mollit anim id est laborum.
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
	