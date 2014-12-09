@extends('main')
@section('title')
Trang chủ
@endsection
@section('nav-bar')
<!-- Navigation -->
<div id="nav-bar" class="row">	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
	<div class="navbar" style="z-index: 99000;">
	  <div class="navbar-header">
	    <button style="background-color: #E75280;" type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        	<span class="sr-only">Toggle navigation</span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      	</button>
	    <a href="{{URL::route('index')}}" class="navbar-brand brand">
	    	<img class="img-logo" src="{{Asset('icon/logo-thuna.png')}}">
	    </a>
	  </div>
	  <div class="navbar-collapse collapse navbar-responsive-collapse">
	    <ul class="nav navbar-nav">
	      <li><a href="{{URL::route('index')}}" ><i class="fa fa-home fa-2x"></i> Trang chủ</a></li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown">
		        <i class="fa fa-wrench fa-2x"></i>
		        <span>Công cụ lập kế hoạch </span>
		        <!-- <b class="caret"></b> -->
	        </a>
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
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown">
	        	<i class="fa fa-music fa-2x"></i>
	        	<span>Âm nhạc</span>
	        	<!-- <b class="caret"></b> -->
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
	      </li>
	    </ul>
	  </div>
	</div>
	</div>
	  
</div>

@include('site-map')

@endsection

@section('content')
<!-- /Navigation -->
<div class="row" style="margin: 0; clear:both;">
	<div class="col-md-9" >
		<section id="intro" class="text-light">

			<!-- Carousel -->
	    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
				    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
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
	                            <h2><span>Niềm vui trọn vẹn</span></h2>
	                        </div>
	                    </div><!-- /header-text -->
				    </div>
				    <div class="item">
				    	<img src=" {{Asset("images/slide-main/3.jpg")}}" alt="">
				    	<!-- Static Header -->
	                    <div class="header-text hidden-xs">
	                        <div class="col-md-12 text-center">
	                            <h2><span>Hạnh phúc vĩnh cửu</span></h2>

	                        </div>
	                    </div><!-- /header-text -->
				    </div>
				    <div class="item">
				    	<img src=" {{Asset("images/slide-main/4.jpg")}}" alt="">
				    	<!-- Static Header -->
	                    <div class="header-text hidden-xs">
	                        <div class="col-md-12 text-center">
	                            <h2><span>
	                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	                            Happy 
	                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	                             Ending ♥</span></h2>

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
			</div><!-- /carousel -->
		</section>
		<!-- /Section: intro -->
	</div>

	<div class="col-md-3" style="padding:0">
		<div id="user_register">
	      @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>
	      @endif
	    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount">
	      	<h2>
		      	Đăng ký ngay
		      	<small style="display: block; margin-top: 5px; font-size: 15px; line-height:20px;">
		      		Trải nghiệm đầy đủ tiện ích của chúng tôi miễn phí trong 7 ngày
		      	</small>
	      	</h2>
	      	<div class="row">
		      	<div class="col-md-12">
		          	<div class="form-group">
		            	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="4" autofocus>
		            	@foreach ($errors->get('email') as $message)
		              		<p class="text-left alert alert-danger">{{$message}}</p>
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
		                <p class="text-left alert alert-danger">{{$message}}</p>
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
		              <p class="text-left alert alert-danger">{{$message}}</p>
		            @endforeach
		          </div>
		        </div>
		        <div class="col-md-12">
		          <div class="form-group">
		            <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="Xác nhận mật khẩu" tabindex="6">
		            @foreach ($errors->get('password_confirm') as $message)
		              <p class="text-left alert alert-danger">{{$message}}</p>
		            @endforeach
		            <input type="text" name="role" id="role" hidden value="2">
		          </div>
		        </div>
	      	</div>
	      	<div class="row">
	        	<div class="col-md-12">
	        		<div class="form-group">
	        			<input type="submit" value="Đăng ký" class="btn btn-primary btn-block btn-lg" tabindex="7">
	        		</div>
	        	</div>
	      	</div>
	      	<div class="row">
	        	<div class="col-md-12">
	        		<div class="form-group">
				      	<a href="{{URL::to('login/facebook')}}" class="btn btn-block btn-social btn-facebook">
					      <i class="fa fa-facebook"></i> Đăng nhập Facebook
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
	</div>
	<!-- end register index -->
</div>
<!-- end content index -->

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

<div id="load-content" class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="checklist">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h5 class="introduce-index">Thuận lợi, sắp xếp một cách khoa học, chính xác thời gian trước ngày cưới...</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('user-checklist')}}" >Sử dụng ngay</a>
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
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h5 class="introduce-index">Sử dụng dễ dàng, tính toán một cách chính xác, phân bố ngân sách chi tiết, hợp lý...</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('budget')}}" >Sử dụng ngay</a>
				</h6>
			</div>
		</div>
  	</div>
  	<div role="tabpanel" class="tab-pane" id="guestlist">
  		<div class="row">	
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/guestlist.png')}}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h5 class="introduce-index">Có thể thêm nhóm khách, từng khách riêng lẻ, kiểm tra tình trạng khách mời cho buổi tiệc, thật tiện ích...</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('guest-list')}}" >Sử dụng ngay</a>
				</h6>
			</div>
		</div>
  	</div>
  	<div role="tabpanel" class="tab-pane" id="website">
  		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-">
				<h5 class="introduce-index">Lưu giữ những câu chuyện tình lãng mạng, chia sẻ những bức ảnh đáng nhớ, những dòng tâm sự hạnh phúc của 2 bạn...với khả năng tạo website cưới cá nhân đơn giản, đẹp và hoàn toàn miễn phí.</h5>
				<h6 class="use-now">
					<a class="btn btn-success btn-sm" href="{{URL::route('website')}}" >Sử dụng ngay</a>
				</h6>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/website.png')}}">
			</div>
		</div>
  	</div>
</div>



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
	