@extends('main')
@section('title')
Detail Vendor
@endsection
@section('content')
		<div class="row" id="infor-vendor">
			<div class="container">
			<div class="col-xs-12 col-sm-6 col-md-9" id="body-left">
				<div class="row" id="top-left">
						<div class="col-xs-4 col-sm-4" id="left-infor">
							<a href="#" id="left-infor title-infor">Địa điểm đám cưới Đà Nẵng</a>
							<div id="left-infor avata-vendor">
								{{'<img class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}
								<div class="fb-like" data-href="https://www.facebook.com/thuna.1987" data-width="150px" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
								
							</div>
							<div id="fb-root"></div>
							<script>(function(d, s, id) {
								  var js, fjs = d.getElementsByTagName(s)[0];
								  if (d.getElementById(id)) return;
								  js = d.createElement(s); js.id = id;
								  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
								  fjs.parentNode.insertBefore(js, fjs);
								}(document, 'script', 'facebook-jssdk'));
							</script>
						</div>
						<div calss="col-xs-8 col-sm-6" id="right-infor">
							<h3 id="right-infor name">{{$vendor->name}}</h3>
							<p id="right-infor address">{{$vendor->address}} {{Vendor::find($vendor->id)->location()->get()->first()->name}}<a href="#map" id="right-infor map"> |Map.</a></p>
							<p id="right-infor web"><b>Website</b>:<a href="http://{{$vendor->website}}"id="right-infor link"> Ghé thăm Website của tôi</a></p>
							<p id="right-infor service"><b>Dịch vụ</b>:
								{{Vendor::find($vendor->id)->category()->get()->first()->name}}
							</p>
							<p id="right-infor catering"><b>Phục vụ</b>: Vui chơi, ẩm thức, giải trí, thư giãn...Sức chứa 200 người lớn.</p>
							<p id="right-infor capaty"><b>Sức chứa</b>: 200 người lớn.</p>
						


						</div>

					</div><!-- -End infor vendor -->
					<div class="tab-content">
					
						<div class="tab-menu" >
											
								<!-- Nav tabs -->
							<ul  class="nav nav-tabs" id="vendor-menu" role="tablist"  >
								  <li class="active"><a data-toggle="tab" href="#aboutme">Hồ sơ</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#review" >Nhận xét</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#photos" >Ảnh</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#video" >Video</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#FAQ">FAQ</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#map">Map</a></li>
							</ul>

							
						<div class="tab-content">
						  <div class="tab-pane active" id="aboutme">
						  		<div id="content-vendor">
									<h4> Đôi nét về chúng tôi</h4>
									<p>{{$vendor->about}}.</p>
								</div>
								<div id="content-photo">
									<h4>Ảnh</h4>
								</div>

								<div id="content-video">
									<h4> Video</h4>
									{{$vendor->video}}	
								</div>
						  </div>
						  <div class="tab-pane" id="review">
						  		
						  			<h4>Review</h4>
						  </div>
						  <div class="tab-pane" id="photos">
						  			<h4>Photos</h4>  <!-- Wrapper for slides -->
					<div id="bigPic">
						<img alt="" src="{{Asset("images/slide/1.jpg")}}">
						<img alt="" src="{{Asset("images/slide/2.jpg")}}">
						<img alt="" src="{{Asset("images/slide/3.jpg")}}">
						<img alt="" src="{{Asset("images/slide/4.jpg")}}">
						<img alt="" src="{{Asset("images/slide/5.jpg")}}">
						<img alt="" src="{{Asset("images/slide/6.jpg")}}">
						<img alt="" src="{{Asset("images/slide/7.jpg")}}">
									    
					</div>

					<ul id="thumbs">
						<li class="active" rel="1"><img alt="" src="{{Asset("images/slide/1_thumb.jpg")}}"> </li>
						<li rel="2"><img alt="" src="{{Asset("images/slide/2_thumb.jpg")}}"> </li>
						<li rel="3"><img alt="" src="{{Asset("images/slide/3_thumb.jpg")}}"> </li>
						<li rel="4"><img alt="" src="{{Asset("images/slide/4_thumb.jpg")}}"> </li>
						<li rel="5"><img alt="" src="{{Asset("images/slide/5_thumb.jpg")}}"> </li>
						<li rel="6"><img alt="" src="{{Asset("images/slide/6_thumb.jpg")}}"> </li>
						<li rel="7"><img alt="" src="{{Asset("images/slide/7_thumb.jpg")}}"> </li>
									   
					</ul>
									
					<script type="text/javascript">
						var currentImage;
						var currentIndex = -1;
						var interval;
							function showImage(index){
								if(index < $('#bigPic img').length){
									var indexImage = $('#bigPic img')[index]
									if(currentImage){   
										if(currentImage != indexImage ){
											$(currentImage).css('z-index',2);
												clearTimeout(myTimer);
											$(currentImage).fadeOut(250, function() {
												myTimer = setTimeout("showNext()", 3000);
											$(this).css({'display':'none','z-index':1})
										 });
									}
							  }
								$(indexImage).css({'display':'block', 'opacity':1});
								currentImage = indexImage;
								currentIndex = index;
								$('#thumbs li').removeClass('active');
								$($('#thumbs li')[index]).addClass('active');
									}
								}

								function showNext(){
									var len = $('#bigPic img').length;
									var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
								 	showImage(next);
								}

										var myTimer;

											$(document).ready(function() {
											myTimer = setTimeout("showNext()", 3000);
											showNext(); //Load first image
											$('#thumbs li').bind('click',function(e){
											var count = $(this).attr('rel');
											showImage(parseInt(count)-1);
											});
								});
											</script>	
						  </div>
						  <div class="tab-pane" id="video">
						  		
						  			<h4>video</h4>
						  			{{$vendor->video}}	
						  </div>
						  <div class="tab-pane" id="FAQ">
						  		@yield('tab-FAQ')
						  			<h4>FAQ</h4>

						  </div>
						  <div class="tab-pane" id="map">	  		
						  			<h4>Map</h4>
						  			{{$vendor->map}}
						  </div>

						  <script type="text/javascript">
							$(function () {
	    						$('#vendor-menu a:last').tab('show');
	 						 });
						</script>
						</div>
					</div>
					
				</div>
			
			</div>
			<div class="col-xs-6 col-md-3" id="right-contact">
					<div class="contact-me">
						<h3> <i class="glyphicon glyphicon-earphone"></i> 01234 856 856 </h3>
						<p>Xin vui lòng cho biết nhà cung cấp này bạn tìm thấy trên Thuna.vn</p>
					<div  class="form">
							<form class="form-horizontal" role="form">
							  <div class="form-group">
							    <div class="">
							      <input type="text" class="form-control" id="input-firstname" value="Phước">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <input type="text" class="form-control" id="Input-lastname" value="Bình">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <input type="email" class="form-control" id="input-email" value="aaa@gmail.com">
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      <input type="date" class="form-control" id="date-wedding" value="25/07/2014">
							    </div>
							  </div>
							  <div class="form-group">
							    
							      <select class="form-control" id="selection-contact">
									  <option value="1"> Gởi thông tin qua mail cho tôi</option>
									  <option value="2"> Hãy gọi cho tôi </option>
									  <option value="3"> Đặt một câu hỏi</option>
								  </select>
							    </div><br/>
							    <ul id="options" style="margin-left:-40px">
							  		<li style="display:none;list-style:none;list-style-position:inside; "><div id="number1" calss="number" ></div></li>
								    <li style="display:none;list-style:none;list-style-position:inside;width:300px;margin-left: -20px;"><div id="number2" calss="number" >
								    	 <div class="form-group">
											<div class="">
												   <input type="text" class="form-control" id="Input-phonenumber" value="" style="width:80%; margin-left: 20px;">
											</div>
										</div>
										<p style="margin-left:80px; ">e.g.xxx.xxx.xxxx</p>
										<h5 style="margin-left:30px;; font-weight:bold " >Thời gian tốt nhất để liên lạc:</h5>
										<div class="row">
											<div class="col-xs-6 .col-sm-2">
												<div class="checkbox">
												  <label style="font-weight:bold ">
												    <input type="checkbox" value="">
													Bất kì thời gian
												  </label>
												</div>

												<div class="checkbox">
												  <label style="font-weight:bold ">
												    <input type="checkbox" value="">
													Hằng ngày
												  </label>
												</div>
											</div>
											<div class="col-xs-6 .col-sm-4" >
												<div class="checkbox">
												  <label style="font-weight:bold ">
												    <input type="checkbox" value="">
													Mỗi đêm
												  </label>
												</div>
												<div class="checkbox">
												  <label style="font-weight:bold ">
												    <input type="checkbox" value="">
													Mỗi cuối tuần
												  </label>
												</div>

											</div>
										</div>

								    </div></li><!-- -endcall-div -->
								    
								    <li style="display:none ; list-style:none"><div id="number3" class="number">
								    	<textarea rows="7" cols="35" style="margin-left:-15px" >Vui lòng gởi thông tin về dịch vụ của chúng tôi.
								    	</textarea>

								    </div></li>
								 </ul>

								    <!-- -script show call-div -->
							
								  <script >

									$("#selection-contact").change(function() {
										      var index = $(this).children(":selected").index();
										      $("#options").children().hide().eq(index).show();
										});

				        			</script>

								  </div>
								  

							  <div class="form-group" style="margin-left: 62px">
							    <div class="">
							      <button type="button" class="btn btn-primary btn-lg active" id="btn-contact"style="background-color: #f7dde7;border-color: #f7dde7"> Liên lạc</button>
							  </div>
							</div>
							 <div class="form-group"style="margin-left:72px">
							   <a href="" class="compare-btn">
							        <span class="compare-checkbox checked"><input type="checkbox"></span>
							        <span class="compare-link-text">So Sánh</span>
							    </a>
							  </div>
							</form>
					</div>
					<div class="action">
						<a href="#"><i class="glyphicon glyphicon-star yellow"></i> Viết phản hồi</a><br/>
						<a href="#"><i class="glyphicon glyphicon-heart pink"></i> Lưu nhà cung cấp dịch vụ này</a><br/>
						<img src="{{Asset('icon/icon-fb.jpg')}}"><a href="#"> Tìm tôi trên Facebook</a><br/>
						<img src="{{Asset('icon/twitter.jpg')}}"><a href="#"> Theo dõi tôi trên twitter</a><br/>
						<img src="{{Asset('icon/pin.jpg')}}"><a href="#"> Theo dõi tôi trên Pinterest</a>
					</div>
					
				</div>
			</div>
			</div>
		</div>
@endsection