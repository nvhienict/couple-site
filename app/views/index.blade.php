@extends('main')
@section('title')
Trang chủ
@endsection
@section('nav-bar')
<!-- Navigation -->
<div id="nav-bar" class="row">
	<div class="col-xs-12">
	<div class="navbar" style="z-index: 99999;">
	  <div class="">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a href="{{URL::route('index')}}" class="navbar-brand brand">Thuna.vn</a>
	  </div>
	  <div class="navbar-collapse collapse navbar-responsive-collapse">
	    <ul class="nav navbar-nav">
	      <li class="active"><a href="{{URL::route('index')}}">Trang chủ</a></li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nhà cung cấp <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li role="presentation" class="dropdown-header"><span>Dịch vụ</span>
	          <div class="row">
	            <div class="col-md-6 col-xs-12">
	              <ul class="list-unstyled">
	                  @foreach (Category::get() as $index=> $category)
	                  @if($index < 7)
	                    <li><a href="{{URL::route('category', array($category->id))}}">{{$category['name']}}</a></li>
	                  @endif
	                  @endforeach
	              </ul>
	            </div>
	            <div class="col-xs-6">
	              <ul class="list-unstyled">
	                  @foreach (Category::get() as $index=> $category)
	                  @if($index >= 7)
	                    <li><a href="{{URL::route('category', array($category->id))}}">{{$category['name']}}</a></li>
	                  @endif
	                  @endforeach
	              </ul>
	            </div>
	          </div>
	          </li>
	        </ul>
	      </li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Công cụ lập kế hoạch <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li role="presentation" class="dropdown-header"><span>Công cụ</span>
	          <div class="row">
	            <div class="col-xs-6">
	              <ul class="list-unstyled">
	                <li><a href="#">Website cưới</a></li>
	                <li><a href="{{URL::route('guest-list')}}" onclick="get_url(3);" >Danh sách khách mời</a></li>
	                <li><a href="#">Sơ đồ ghế ngồi</a></li>
	                <li><a href="{{URL::route('user-checklist')}}" onclick="get_url(1);" >Danh sách công việc</a></li>
	                <li><a href="#">Quản lý vendor</a></li>
	                <li><a href="{{URL::route('budget')}}" onclick="get_url(2);" >Quản lý ngân sách</a></li>

					@if(!Session::has('email'))
					<script type="text/javascript">

                		function get_url(id){
                			// create session
							$.ajax({
								type: "post",
								url: "{{URL::to('get_url')}}",
								data: {id:id},
								success: function(data){
									return id;
								}
							});
							alert('Bạn phải đăng nhập!');
						};

                	</script>
                	@endif

	              </ul>
	            </div>
	            <div class="col-xs-6">
	              <ul class="list-unstyled">
	                <li><a href="#">Viết nhật ký</a></li>
	                <li><a href="#">Thiết kế thiệp cưới</a></li>
	                <li><a href="#">Làm video</a></li>
	              </ul>
	            </div>
	          </div>
	          </li>
	        </ul>
	      </li>

	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Âm nhạc<b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li role="presentation" class="dropdown-header"><span>Nghi lễ</span>
	            <div class="row">
	              <div class="col-xs-6">
	                <ul class="list-unstyled">
	                  <li><a href="{{URL::route('songs', array(1))}}">Mở đầu</a></li>
	                  <li><a href="{{URL::route('songs', array(2))}}">Đoàn rước</a></li>
	                </ul>
	              </div>
	              <div class="col-xs-6">
	                <ul class="list-unstyled">
	                  <li><a href="{{URL::route('songs', array(3))}}">Nghi thức</a></li>
	                  <li><a href="{{URL::route('songs', array(4))}}">Kết thúc</a></li>
	                </ul>
	              </div>
	            </div>
	          </li>
	          <li role="presentation" class="dropdown-header"><span>Đãi tiệc</span>
	            <div class="row">
	              <div class="col-xs-6">
	                <ul class="list-unstyled">
	                  <li><a href="{{URL::route('songs', array(5))}}">Khai tiệc</a></li>
	                  <li><a href="{{URL::route('songs', array(6))}}">Phát biểu</a></li>
	                  <li><a href="{{URL::route('songs', array(7))}}">Cắt bánh</a></li>
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

	      <li><a href="#about">Giới thiệu</a></li>
	      <li><a href="#service">Dịch vụ</a></li>
	      <li><a href="#contact">Liên hệ</a></li>
	      
	    </ul>
	  </div>
	</div>
	</div>
	  
</div>
@endsection
	

@section('content')
    <!-- /Navigation -->
<div class="row">
	<section id="intro" class="home-slide text-light">

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
			    	<img src="{{Asset("assets/img/1.jpg")}}" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2><span>Chào mừng bạn đến với Thuna.vn</span></h2>
                            
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="{{Asset("assets/img/2.jpg")}}" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2><span>Dịch vụ đa dạng, phong phú</span></h2>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="{{Asset("assets/img/3.jpg")}}" alt="Third slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2><span>Cộng đồng sử dụng rộng rãi</span></h2>

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
      

	<!-- form search -->
		<div id="form-search-index" class="container">
			<div class="row marginbot-80">
				<div class="col-md-8 col-md-offset-2">
						<form id="form-search" class="wow bounceInUp form-homepage" data-wow-offset="10" data-wow-delay="0.2s" action="{{Asset('list-vendor/search')}}" method="get">
						<div class="row marginbot-20">
							<div class="col-md-6 xs-marginbot-20">
								<input type="text" name="name" class="form-control input-lg" placeholder="Từ tìm kiếm" />
							</div>
							<div class="col-md-6">
								<select name="location" class="form-control input-lg">
						    		@foreach(Location::get() as $location)
							    	<option value="{{$location->id}}">{{$location->name}}</option>
							    	@endforeach
						    	</select>
							</div>
						</div>
						<div class="row xs-marginbot-20">
							<div class="col-md-12">
								<input id="searchTxt" name="category" type="text" data-toggle="dropdown" class="input-text form-control input-lg" placeholder="Danh mục" readonly style="cursor:pointer;">
						    	<input id="searchId" name="category_id" type="hidden">
						    	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								    <li role="presentation">
								    	<div class="row" id="menu">
									    	<div class="col-xs-6">
									      		<ul class="list-unstyled">
										      		@foreach (Category::get() as $index=> $category)
						    						@if($index<7)
									      			<li class="budget-column-icon images_li" style="background-image:url({{Asset("icon/cat/{$category->images}")}})"><span style="cursor:pointer;">{{$category['name']}}</span>
									      			<input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}">
									      			</li>
									      			@endif
					      							@endforeach
									      		</ul>
									      	</div>
									      	<div class="col-xs-6">
									      		<ul class="list-unstyled">
									      			@foreach (Category::get() as $index=> $category)
					    							@if($index>=7)
									      			<li class="budget-column-icon images_li" style="background-image:url({{Asset("icon/cat/{$category->images}")}})"><span style="cursor:pointer;">{{$category['name']}}</span>
									      			<input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}">
									      			</li>
									      			@endif
					      							@endforeach
									      		</ul>
									      	</div>
								      	</div>
								    </li>
								    <script>
									    $(document).ready(function(){
											$('#menu li span').click(function(){
											  var text= $(this).text();
											  var id= $(this).next().val();
												$( "#searchTxt" ).val(text);
												$( "#searchId").val(id);
											});
										});
									</script>	
							    </ul>					
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<button type="submit" class="btn btn-skin btn-lg btn-block">Tìm kiếm</button>
							</div>
						</div>
						</form>
				</div>
			</div>	
		</div>
	<!-- form search -->

	<div class="row">
		<div class="col-xs-1"></div>
		<div class="col-xs-10" id="index-tool">
			<div class="row tool-1" >
				<div class="col-xs-4">
					<h3>Danh sách công việc</h3>
					<h5>Thuận lợi, sắp xếp một cách khoa học, chính xác thời gian trước ngày cưới...</h5>
					<h6><a href="#">Sử dụng ngay</a></h6>
				</div>
				<div class="col-xs-1"></div>
				<div class="col-xs-5">
					<img src="{{Asset('images/tool/tool-1.png')}}">
				</div>
			</div>
			<div class="row tool-1" >

				<div class="col-xs-6">
					<img src="{{Asset('images/tool/tool-22.png')}}">
				</div>

				<div class="col-xs-4">
					<h3>Quản lý ngân sách</h3>
					<h5>Sử dụng dễ dàng, tính toán một cách chính xác, phân bố ngân sách chi tiết, hợp lý...</h5>
					<h6><a href="#">Sử dụng ngay</a></h6>
				</div>
				
			</div>
		</div>
		<div class="col-xs-1"></div>
	</div>
	

@endsection
	