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
			    	<img  class="image-responsive" src=" {{Asset("assets/img/1.jpg")}}" alt="First slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2><span>Chào mừng bạn đến với Thuna.vn</span></h2>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img class="image-responsive" src="{{Asset("assets/img/2.jpg")}}" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2><span>Dịch vụ đa dạng, phong phú</span></h2>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img class="image-responsive" src="{{Asset("assets/img/3.jpg")}}" alt="Third slide">
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
	<!-- <!-- <!-- form search -->
		<div id="form-search-index" class="container">
			<div class="row marginbot-80">
				<div class="col-xs-8 col-md-8 col-md-offset-2">
						<form id="form-search" class="wow bounceInUp form-homepage" data-wow-offset="10" data-wow-delay="0.2s" action="{{Asset('list-vendor/search')}}" method="get">
							<div class="row marginbot-20">
								<div class=" col-xs-6 col-md-6 xs-marginbot-20">
									<input type="text" name="name" class="form-control input-lg input_s btn-responsive" placeholder="Từ tìm kiếm" />
								</div>
								<div class="col-xs-6 col-md-6">
									<select name="location" class="form-control input-lg input_s btn-responsive" onchange="get_location(this.value)" >
							    		@foreach(Location::get() as $location)

							    			@if(!Session::has('location'))
							    				<option  value="{{$location->id}}" >{{$location->name}}</option>
								    		@else
								    			@if(Session::get('location')==$location->id)
								    				<option  selected="selected" value="{{$location->id}}" >{{$location->name}}</option>
								    			@else
								    				<option  value="{{$location->id}}" >{{$location->name}}</option>
								    			@endif
								    		@endif

								    	@endforeach
							    	</select>
								</div>
							</div>
							<div class="row xs-marginbot-20">
								<div class="col-xs-12 col-md-12">
									<input id="searchTxt" name="category" type="text" data-toggle="dropdown" class="input-text form-control input-lg input_s btn-responsive" placeholder="Danh mục" readonly style="cursor:pointer;">
							    	<input id="searchId" name="category_id" type="hidden">
							    	<ul class="dropdown-menu " role="menu" aria-labelledby="dropdownMenu1">
									    <li role="presentation">
									    	<div class="row" id="menu">
										    	<div class="col-xs-6">
										      		<ul class="list-unstyled  btn-responsive">
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
										      		<ul class="list-unstyled btn-responsive">
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
								<div class=" col-xs-12 col-md-12">
									<button type="submit" class="btn btn-skin btn-lg btn-block btn-responsive">Tìm kiếm</button>
								</div>
							</div>
						</form>
				</div>
			</div>	
		</div>
	
	<div class="row" id="index-tool">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  tool-1">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-">
				<h3>Danh sách công việc</h3>
				<h5>Thuận lợi, sắp xếp một cách khoa học, chính xác thời gian trước ngày cưới...</h5>
				<h6><a href="#">Sử dụng ngay</a></h6>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/tool-1.png')}}">
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  tool-1">		
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<img class="img-responsive" src="{{Asset('images/tool/tool-22.png')}}">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h3>Quản lý ngân sách</h3>
				<h5>Sử dụng dễ dàng, tính toán một cách chính xác, phân bố ngân sách chi tiết, hợp lý...</h5>
				<h6><a href="#">Sử dụng ngay</a></h6>
			</div>
		</div>
	</div>


<script type="text/javascript">

	function get_location(id){
		$.ajax({
			type: "post",
			url: "{{URL::route('get_location')}}",
			data:{id:id}
		});
	};

</script>	

@endsection
	