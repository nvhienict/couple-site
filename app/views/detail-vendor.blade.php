@extends('main')
@section('title')
{{$vendor->name}}
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
		<div class="row" id="infor-vendor">
			<div class="container body-detailvendor">
			<div class="col-xs-12 col-sm-6 col-md-9" id="body-left">
				<div class="row" id="top-left">
						<div class="col-xs-6 col-sm-4" id="left-infor">
							<a href="" onclick="history.go(-1);return false" id="left-infor title-infor">Địa điểm đám cưới {{Vendor::find($vendor->id)->location()->get()->first()->name}}</a>
							<div id="left-infor avata-vendor" >
								{{'<img class="img-responsive" style="width:250px;height:600 "src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}
								<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="false" data-share="false"></div>
						</div>
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
								
						<div calss="col-xs-6 col-sm-4" id="right-infor">
							<h3 id="right-infor name">{{$vendor->name}}</h3>
							<p id="right-infor address">{{$vendor->address}} {{Vendor::find($vendor->id)->location()->get()->first()->name}}<a href="#map" data-toggle="tab" class="outside-link"> |Map.</a></p>
							<p id="right-infor web"><b>Website</b>:<a href="http://{{$vendor->website}}"id="right-infor link" target="_blank"> Ghé thăm Website của tôi</a></p>
							<p id="right-infor service"><b>Dịch vụ</b>:
								{{Vendor::find($vendor->id)->category()->get()->first()->name}}
							</p>
							<p id="right-infor catering"><b>Phục vụ</b>: Vui chơi, ẩm thức, giải trí, thư giãn...Sức chứa 200 người lớn.</p>
							<p id="right-infor capaty"><b>Sức chứa</b>: 200 người lớn.</p>
						</div>

					</div><!-- -End infor vendor -->
					<div class="tab-content">
					
						<div class="tab-menu"  id="tabs">
											
								<!-- Nav tabs -->
							<ul  class="nav nav-tabs" id="vendor-menu" role="tablist"  >
								  <li class="active"><a data-toggle="tab" href="#aboutme">Hồ sơ</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#review" >{{Lang::get('messages.Review')}}</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#photos" >{{Lang::get('messages.Photo')}}</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#video" >Video</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#FAQ">FAQ</a></li>
								  <li class="boder-style"><a data-toggle="tab" href="#map">{{Lang::get('messages.Map')}}</a></li>
							</ul>

							
						<div class="tab-content">
						  <div class="tab-pane active" id="aboutme">
						  		<div id="content-vendor">
									<h4> Đôi nét về chúng tôi</h4>
									<p>{{$vendor->about}}.</p>
								</div>
								<div id="content-photo">
									<h4>Ảnh</h4>
										<ul id="thumbs-main">
											@if(!empty($photoslides))	
												@foreach($photoslides as $index => $photoslide)
												<li rel="{{$index+1}}">{{'<img alt="" src="data:image/jpeg;base64,' . base64_encode($photoslide->smallpic) . '">'}}</li>
												@endforeach
											@endif	   
										</ul>
										   
									<a href="#photos" class="outside-link"data-toggle="tab">Xem thêm</a>
										<script type="text/javascript">
										   $(".outside-link").click(function() {
											    $(".nav li").removeClass("active");
											    $($(this).attr("data-toggle-tab")).parent("li").addClass("active");
											});
										</script>

															<!-- Script click to sub Tab -->
														

								</div>
								<div style="clear:both"></div>

								<div id="content-video">
									<h4> Video</h4>
									{{$vendor->video}}	
								</div>
						  	</div>
						  	<div class="tab-pane" id="review">

						  	@if(!Session::has('email'))
								<span><a href="{{URL::route('cmt_vendor', array($vendor['id']))}}" >Đăng nhận xét!</a></span>
							@endif

						  		@foreach(VendorComment::where('vendor',$vendor->id)->get() as $cmt)
								
								<div class="vendor_comment">
									<div class="vendor_avatar">
										{{'<img class="user_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" />'}}
									</div>
									<div class="vendor_content">
										<span style="color: #428bca;">{{$cmt['user_name']}}</span> nhận xét:<br />
										
										{{$cmt['content']}}
									</div>
								</div>
								
								@endforeach
								<div id="your_cmt"></div> <!-- add comment -->

								@if(Session::has('email'))

								<div class="vendor_comment">
									<div class="vendor_avatar">
										{{'<img class="user_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" />'}}<br />
										<span style="color: #428bca;">{{$user_name}}</span>
									</div>
									<div class="vendor_content">
										<input type="text" id="vendor_comment" placeholder="Nhận xét của bạn..."></input><br />
										<button class="btn btn-primary" onclick="post_comment({{UserController::id_user()}})">Đăng</button>
									</div>
								</div>
						
								@endif
								<script type="text/javascript">
									function post_comment (id_user) {
										
										var cmt = $("#vendor_comment").val(); 
										$("#vendor_comment").val("");

										$.ajax({
											type: "post",
											url: "{{URL::route('vendor_comment', array('id_vendor'=>$vendor['id']))}}",
											data: {
												id_user:id_user,
												cmt:cmt
											},
											success: function(data){
												$('#your_cmt').replaceWith(data);
											}

										});

									}
								</script>
						  	</div>
						  	<div class="tab-pane" id="photos">
						  			<h4>{{Lang::get('messages.Photo')}}</h4>
						  			  <!-- Wrapper for slides -->
								<div id="bigPic">
									@if(!empty($photoslides))
										@foreach($photoslides as $index => $photoslide)
												{{'<img alt="" src="data:image/jpeg;base64,' . base64_encode($photoslide->bigpic) . '">'}}
										@endforeach
									@endif			    
								</div>

								<ul id="thumbs">
									@if(!empty($photoslides))
										@foreach($photoslides as $index => $photoslide)
												<li rel="{{$index+1}}">{{'<img alt="" src="data:image/jpeg;base64,' . base64_encode($photoslide->smallpic) . '">'}}</li>
										@endforeach
									@endif			   
								</ul>
								<!-- script slides		 -->		
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
						  		
						  			<h4>Video</h4>
						  			{{$vendor->video}}	
						  </div>
						  <div class="tab-pane" id="FAQ">
						  		@yield('tab-FAQ')
						  			<h4>{{Lang::get('messages.FAQ')}}</h4>

						  </div>
						  <div class="tab-pane" id="map">	  		
						  			<h4>{{Lang::get('messages.Map')}}</h4>
						  			{{$vendor->map}}
						  </div>

						 
						</div>
					</div>
					
				</div>
			
			</div>
			<div class="col-xs-6 col-md-3" id="right-contact">
					<div class="contact-me">
						<h4> <i class="glyphicon glyphicon-earphone"></i> 01234 856 856 </h4>
						<p>Xin vui lòng cho biết nhà cung cấp này bạn tìm thấy trên Thuna.vn</p>
					<div  class="form">
							<form class="form-horizontal" role="form">
							  <div class="form-group">
							    <div class="">
							    	@if(!empty($firstname))
							    	
							    		<input type="text" class="form-control" id="input-firstname"  value="{{$firstname}}">
							    	
							    	@else
							    	
							    		<input type="text" class="form-control" id="input-firstname" placeholder="Họ" value="">
							    	@endif
							      
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      @if(!empty($lastname))
							    		<input type="text" class="form-control" id="input-lastname"  value="{{$lastname}}">
							    	@else
							    	
							    		<input type="text" class="form-control" id="input-lastname" placeholder="Tên"  value="">
							    	@endif
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							      @if(!empty($firstname))
							    		<input type="text" class="form-control" id="input-email"  value="{{$email}}">
							    	
							    	@else
							    	
							    		<input type="text" class="form-control" id="input-email" placeholder="Email"  value="">
							    	@endif
							    </div>
							  </div>
							  <div class="form-group">
							    <div class="">
							    @if(!empty($weddingdate))
							      	
							      	<input data-format="yyyy-MM-dd" type="text"   id="input-date" class="form-control  " placeholder="" value="{{$weddingdate}}"tabindex="3">
							    	@else
							    	<input data-format="yyyy-MM-dd" type="text"   id="input-date" class="form-control  " placeholder="Ngày cưới" tabindex="3">
							      <script type="text/javascript">
						                $(function() {
						                  $('#input-date').datetimepicker({
						                    format: 'd-m-Y',
						                    timepicker:false
						                  });
						                  
										  
						                });
						              </script>
						         @endif
							    </div>
							  </div>
							  <div class="form-group">
							    
							      <select class="form-control" id="selection-contact">
									  <option value="1"> Gởi thông tin qua mail cho tôi</option>
									  <option value="2"> Hãy gọi cho tôi </option>
									  <option value="3"> Đặt một câu hỏi</option>
								  </select>
							    </div><br/>
							    <ul id="options" style="margin-left:10px">
							  		<li style="display:none;list-style:none;list-style-position:inside; "><div id="number1" calss="number" ></div></li>
								    <li style="display:none;list-style:none;list-style-position:inside;width:300px;margin-left: -20px;"><div id="number2" calss="number" >
								    	 <div class="form-group">
											<div class="">
												   <input type="text" class="form-control" id="Input-phonenumber" value="" style="width:80%; margin-left: -31px;">
											</div>
										</div>
										<p style="margin-left:35px; ">e.g.xxx.xxx.xxxx</p>
										<h6 style="margin-left:-45px; font-weight:bold " >Thời gian tốt nhất để liên lạc:</h6>
										<div id="check-call">
											<div class="row">
												<div class="col-xs-6 col-md-5">
													<div class="checkbox" style="margin-left:0px;">
													
													    <input type="checkbox" value="" >
														Bất kì thời gian
												
													</div>

													<div class="checkbox" style="margin-left:0px;">
													
													    <input type="checkbox" value="">
														Hằng ngày
													  
													</div>
												</div>
												<div class="col-xs-6 col-md-5" >
													<div class="checkbox" style="margin-left:5px;">
													  
													    <input type="checkbox" value="">
														Mỗi đêm
													
													</div>
													<div class="checkbox" style="margin-left:5px;">
													 
													    <input type="checkbox" value="">
														Mỗi cuối tuần
													
													</div>

												</div>
											</div>
										</div>

								    </div></li><!-- -endcall-div -->
								    
								    <li style="display:none ; list-style:none"><div id="number3" class="number">
								    	<textarea rows="7" cols="31" style="margin-left:-68px; resize: none" >
								    	</textarea>

								    </div></li>
								 </ul>

								    <!-- -script show select -->
									
								  <script >

									$("#selection-contact").change(function(){
										      var index = $(this).children(":selected").index();
										      $("#options").children().hide().eq(index).show();
										});

				        			</script>
							  <div class="form-group" style="margin-left: 62px">
							    <div class="">
							      <button type="button" class="btn btn-skin btn-lg" id="btn-contact"> Liên lạc</button>
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
