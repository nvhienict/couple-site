@extends('main')
@section('title')
Trang chủ
@endsection
@section('nav-bar')
<!-- Navigation -->
<div id="nav-bar" class="row">
	<div class="col-xs-12">
	<div class="navbar navbar-default">
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
	                <li><a href="#">Áo cưới cô dâu</a></li>
	                <li><a href="#">Ban nhạc</a></li>
	                <li><a href="#">Bánh cưới</a></li>
	                <li><a href="#">Dịch vụ vận chuyển</a></li>
	                <li><a href="#">Trang điểm</a></li>
	                <li><a href="#">Wedding Planner</a></li>
	              </ul>
	            </div>
	            <div class="col-md-6 col-xs-12">
	              <ul class="list-unstyled">
	                <li><a href="#">Nhà hàng tiệc cưới</a></li>
	                <li><a href="#">Quay phim chụp ảnh</a></li>
	                <li><a href="#">Thiệp cưới</a></li>
	                <li><a href="#">Trang phục chú rể</a></li>
	                <li><a href="#">Trang sức cưới hỏi</a></li>
	                <li><a href="#">Trang trí hoa</a></li>
	              </ul>
	            </div>
	          </div>
	          </li>
	        </ul>
	      </li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li role="presentation" class="dropdown-header"><span>Dịch vụ</span>
	          <div class="row">
	            <div class="col-xs-6">
	              <ul class="list-unstyled">
	                <li><a href="#">Áo cưới cô dâu</a></li>
	                <li><a href="#">Ban nhạc</a></li>
	                <li><a href="#">Bánh cưới</a></li>
	                <li><a href="#">Dịch vụ vận chuyển</a></li>
	                <li><a href="#">Trang điểm</a></li>
	                <li><a href="#">Wedding Planner</a></li>
	              </ul>
	            </div>
	            <div class="col-xs-6">
	              <ul class="list-unstyled">
	                <li><a href="#">Nhà hàng tiệc cưới</a></li>
	                <li><a href="#">Quay phim chụp ảnh</a></li>
	                <li><a href="#">Thiệp cưới</a></li>
	                <li><a href="#">Trang phục chú rể</a></li>
	                <li><a href="#">Trang sức cưới hỏi</a></li>
	                <li><a href="#">Trang trí hoa</a></li>
	              </ul>
	            </div>
	          </div>
	          </li>
	        </ul>
	      </li>
	      <li><a href="#about">Giới thiệu</a></li>
	      <li><a href="#service">Dịch vụ</a></li>
	      <li><a href="">Đăng kí</a></li>
	      <li><a href="#search">Tìm kiếm nhà cung cấp</a></li>
	      <li><a href="#contact">Liên hệ</a></li>
	      
	    </ul>
	  </div>
	</div>
	  </div>
	  
	</div>
@endsection
	

@section('content')
    <!-- /Navigation -->
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
                            <h2>
                            	<span>Chào mừng bạn đến với Thuna.vn</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                            </h3>
                            <br>
                            <div class="">
                                 <a class="btn btn-theme btn-sm btn-min-block" href="{{URL::route('index')}}#about">Giới thiệu</a><a class="btn btn-theme btn-sm btn-min-block" href="{{URL::route('index')}}#search">Tìm nhà cung cấp</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="{{Asset("assets/img/2.jpg")}}" alt="Second slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>Awesome Bootstrap template</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                            </h3>
                            <br>
                            <div class="">
                                 <a class="btn btn-theme btn-sm btn-min-block" href="{{URL::route('index')}}#about">Giới thiệu</a><a class="btn btn-theme btn-sm btn-min-block" href="{{URL::route('index')}}#search">Tìm kiếm nhà cung cấp</a></div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<img src="{{Asset("assets/img/3.jpg")}}" alt="Third slide">
			    	<!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h2>
                                <span>Use without any charge</span>
                            </h2>
                            <br>
                            <h3>
                            	<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                            </h3>
                            <br>
                            <div class="">
                                <a class="btn btn-theme btn-sm btn-min-block" href="{{URL::route('index')}}#about">Giới thiệu</a><a class="btn btn-theme btn-sm btn-min-block" href="{{URL::route('index')}}#search">Tìm kiếm nhà cung cấp</a></div>
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
	
<!-- Section: about -->
    <section id="about" class="home-section color-dark bg-white">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Thông tin về chúng tôi</h2>
					<div class="divider-header"></div>
					<p>Lorem ipsum dolor sit amet, agam perfecto sensibus usu at duo ut iriure.</p>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="container">
        <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
			<div class="text-center">
		<div class="container">
			<div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-users fa-5x"></span> 
					</div>
					<div class="service-desc">						
						<h5>Chúng tôi là ai?</h5>
						<p>
						Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
						</p>
						<a href="#" class="btn btn-skin">Chi tiết</a>
					</div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-cog fa-5x"></span> 
					</div>
					<div class="service-desc">
						<h5>Cách thức làm việc</h5>
						<p>
						Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
						</p>
						<a href="#" class="btn btn-skin">Chi tiết</a>
					</div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-question fa-5x"></span> 
					</div>
					<div class="service-desc">
						<h5>Thắc mắc</h5>
						<p>
						Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
						</p>
						<a href="#" class="btn btn-skin">Chi tiết</a>
					</div>
                </div>
				</div>
            </div>
        </div>
        		
		</div>
		</div>		    		
		</div>
		</div>


	</section>
	<!-- /Section: about -->
	
	
	<!-- Section: services -->
    <section id="service" class="home-section color-dark bg-gray">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Dịch vụ</h2>
					<div class="divider-header"></div>
					<p>Lorem ipsum dolor sit amet, agam perfecto sensibus usu at duo ut iriure.</p>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		<div class="container">

        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-cogs fa-5x"></span> 
					</div>
					<div class="service-desc">						
						<h5>Web Design</h5>
						<p>
						Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
						</p>
						<a href="#" class="btn btn-skin">Chi tiết</a>
					</div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-camera fa-5x"></span> 
					</div>
					<div class="service-desc">
						<h5>Photography</h5>
						<p>
						Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
						</p>
						<a href="#" class="btn btn-skin">Chi tiết</a>
					</div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-laptop fa-5x"></span> 
					</div>
					<div class="service-desc">
						<h5>Graphic design</h5>
						<p>
						Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
						</p>
						<a href="#" class="btn btn-skin">Chi tiết</a>
					</div>
                </div>
				</div>
            </div>
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow fadeInRight" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<span class="fa fa-mobile-phone fa-5x"></span> 
					</div>
					<div class="service-desc">
						<h5>Mobile apps</h5>
						<p>
						Ad denique euripidis signiferumque vim, iusto admodum quo cu. No tritani neglegentur mediocritatem duo.
						</p>
						<a href="#" class="btn btn-skin">Chi tiết</a>
					</div>
                </div>
				</div>
            </div>
        </div>		
		</div>
		</div>
	</section>
	<!-- /Section: services -->
	

	<!-- Section: search -->
    <section id="search" class="home-section color-dark text-center bg-white">
    <div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Tìm nhà cung cấp</h2>
					<div class="divider-header"></div>
					<p>Với các nguồn thông tin đáng tin cậy nhất cho đám cưới của bạn </p>
					</div>
					</div>
				</div>
			</div>

		</div>	
		<div class="container">
			<div class="row marginbot-80">
				<div class="col-md-8 col-md-offset-2">
						<form id="form-search" class="wow bounceInUp form-homepage" data-wow-offset="10" data-wow-delay="0.2s" action="{{Asset('list-vendor')}}" method="post">
						<div class="row marginbot-20">
							<div class="col-md-6 xs-marginbot-20">
								<input type="text" name="name" class="form-control input-lg" placeholder="Enter Name" />
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
								<input id="searchTxt" name="category" type="text" data-toggle="dropdown" class="input-text form-control input-lg" placeholder="Click choose Categories">
						    	<input id="searchId" name="category_id" type="hidden">
						    	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								    <li role="presentation">
								    	<div class="row" id="menu">
									    	<div class="col-xs-6">
									      		<ul class="list-unstyled">
										      		@foreach (Category::get() as $index=> $category)
						    						@if($index<6)
									      			<li><span>{{$category['name']}}</span>
									      			<input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}">
									      			</li>
									      			@endif
					      							@endforeach
									      		</ul>
									      	</div>
									      	<div class="col-xs-6">
									      		<ul class="list-unstyled">
									      			@foreach (Category::get() as $index=> $category)
					    							@if($index>=6)
									      			<li><span>{{$category['name']}}</span>
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
		<div class="container">
			<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
					<div class="wow bounceInUp" data-wow-delay="0.4s">
                    <div id="owl-works" class="owl-carousel">
                        <div class="item"><a href="{{Asset("assets/img/works/1.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="{{Asset("assets/img/works/1.jpg")}}" class="img-responsive" alt="img"></a></div>
                        <div class="item"><a href="{{Asset("assets/img/works/2.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="{{Asset("assets/img/works/2.jpg")}}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{Asset("assets/img/works/3.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="i{{Asset("assets/img/works/3.jpg")}}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{Asset("assets/img/works/4.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="{{Asset("assets/img/works/4.jpg")}}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{Asset("assets/img/works/5.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="{{Asset("assets/img/works/5.jpg")}}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{Asset("assets/img/works/6.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="{{Asset("assets/img/works/6.jpg")}}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{Asset("assets/img/works/7.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/7@2x.jpg"><img src="{{Asset("assets/img/works/7.jpg")}}" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="{{Asset("assets/img/works/8.jpg")}}" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/8@2x.jpg"><img src="{{Asset("assets/img/works/8.jpg")}}" class="img-responsive " alt="img"></a></div>
                    </div>
					</div>
                </div>
            </div>
		</div>

	</section>
	<!-- /Section: search -->

	<!-- Section: contact -->
    <section id="contact" class="home-section nopadd-bot color-dark bg-gray text-center">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow flipInY" data-wow-offset="0" data-wow-delay="0.4s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Liên hệ</h2>
					<div class="divider-header"></div>
					<p>114 Đặng Huy Trứ, Thành phố Huế</p>
					<p>Tel <span class="tel">0949290110</span></p>
					</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d15306.227941012417!2d107.591868!3d16.447311!3m2!1i1024!2i768!4f13.1!2m1!1zMTE0IMSQ4bq3bmcgSHV5IFRy4bupLCBUcsaw4budbmcgQW4sIHRwLiBIdeG6vyBUcsaw4budbmcgQW4sIHRwLiBIdeG6vyBUaOG7q2EgVGhpw6puIEh14bq_LCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1406192204654" width="755" height="300" frameborder="0" style="border:0"></iframe>
					</div>
				</div>
			</div>

		</div>
		
		<div class="container">

			<div class="row marginbot-80">
				<div class="col-md-8 col-md-offset-2">
				<h2>Gửi phản hồi</h2>
						<form class="wow bounceInUp form-homepage" data-wow-offset="10" data-wow-delay="0.2s">
						<div class="row marginbot-20">
							<div class="col-md-6 xs-marginbot-20">
								<input type="text" class="form-control input-lg" id="name" placeholder="Enter name" required="required" />
							</div>
							<div class="col-md-6">
								<input type="email" class="form-control input-lg" id="email" placeholder="Enter email" required="required" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
										<input type="text" class="form-control input-lg" id="subject" placeholder="Subject" required="required" />
								</div>
								<div class="form-group">
									<textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required"
										placeholder="Message"></textarea>
								</div>						
								<button type="submit" class="btn btn-skin btn-lg btn-block" id="btnContactUs">
									Send Message</button>
							</div>
						</div>
						</form>
				</div>
			</div>	


		</div>
	</section>
	<!-- /Section: contact -->
@endsection
	