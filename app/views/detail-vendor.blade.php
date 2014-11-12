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
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9" id="body-left">
				<div class="row" id="top-left">
						<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5" id="left-infor">
							<a href="" onclick="history.go(-1);return false" id="left-infor title-infor">{{Vendor::find($vendor->id)->category()->get()->first()->name}} tại {{Vendor::find($vendor->id)->location()->get()->first()->name}}:</a>
							<div id="left-infor avata-vendor" >
								{{'<img class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}
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
								
						<div calss="col-xs-12 col-sm-7 col-md-7 col-lg-7" id="right-infor">
							<h3 id="right-infor name">{{$vendor->name}}</h3>
							<p id="right-infor address">{{$vendor->address}}<a href="#map" data-toggle="tab" class="outside-link" id="show_map_detail" onclick="show_map_detail()"> |Map.</a></p>
							<p id="right-infor address"><b>Điện thoại:</b> {{$vendor->phone}}</p>
							<p id="right-infor web"><b>Website</b>:<a href="{{$vendor->website}}"id="right-infor link" target="_blank"> Ghé thăm Website của tôi</a></p>
							<p id="right-infor service"><b>Dịch vụ</b>:
								{{Vendor::find($vendor->id)->category()->get()->first()->name}}
							</p>
							
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
										@if(!empty($photoslides))	
										<ul id="thumbs-main">											
												@foreach($photoslides as $index => $photoslide)
												<li rel="{{$index+1}}">{{'<img alt="" class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($photoslide->smallpic) . '">'}}</li>
												@endforeach											   
										</ul>
											<a href="#photos" class="outside-link"data-toggle="tab">Xem thêm</a>
										@else
												<p></p>;
										@endif	
										   
									
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
									<iframe width="600" height="400" src="{{$vendor->video}}" frameborder="0" allowfullscreen></iframe>	
								</div>
						  	</div>
						  	<div class="tab-pane" id="review">
						  		<div>
						  			@if($check_rating_avg)
							  				<h2>Trung bình:<span class="avg-show-rating"> {{round(Rating::where('vendor',$vendor->id)->avg('rating'),1)}}</span>/5</h2>
							  				<div class="star-avg-rating">
							  					@if($avg_rating==0)
							  						<img src="{{Asset('images/star/0.jpg')}}" class="img-responsive agv-rating " alt="">
							  					@else
							  						@if($avg_rating > 0 & $avg_rating < 1)
							  						<img src="{{Asset('images/star/0.5.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating == 1)
							  						<img src="{{Asset('images/star/1.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating > 1 & $avg_rating < 2)
							  						<img src="{{Asset('images/star/1.5.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating == 2)
							  						<img src="{{Asset('images/star/2.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating > 2 & $avg_rating < 3)
							  						<img src="{{Asset('images/star/2.5.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating == 3)
							  						<img src="{{Asset('images/star/3.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating > 3 & $avg_rating < 4)
							  						<img src="{{Asset('images/star/3.5.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating == 4)
							  						<img src="{{Asset('images/star/4.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating > 4 & $avg_rating < 5)
							  						<img src="{{Asset('images/star/4.5.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  						@if($avg_rating == 5)
							  						<img src="{{Asset('images/star/5.jpg')}}" class="img-responsive agv-rating" alt="">
							  						@endif
							  					@endif

							  				</div>		
							  			@else
							  				<h2>Trung bình:<span class="avg-show-rating "> 0</span>/5</h2>
							  				<div class="star-avg-rating">
							  					<img src="{{Asset('images/star/0.jpg')}}" class="img-responsive agv-rating" alt="">
							  				</div>
							  			@endif

						  		</div><br><br>

						  	@if(!Session::has('email'))
						  		<span><a href="{{URL::route('reviews',array($vendor->id))}}">Đánh giá,</a></span>
								<span><a href="{{URL::route('cmt_vendor', array($vendor['id']))}}" >Đăng nhận xét!</a></span>
							@endif

								@if(Session::has('email'))
																			
										<div class="rating" data-rating="{{$ratings}}">
											   Đánh giá: <div></div><div></div><div></div><div></div><div></div> (<span id='info'>{{$ratings}}</span>/5)<br>
											   <input class="id-vendor-rating" type="hidden" value="{{$vendor->id}}" name="id-vendor-rating">
										</div>
									
											
									
									<script type="text/javascript">
										function ShowRating($element, rating){
											    $stars = $element.find('div');
											    $stars.removeClass('selected highlighted');
											    rating = parseInt(rating);
											    if(rating < 1 || rating > $stars.length) return false;

											    $stars.eq(rating-1).addClass('selected')
											        .prevAll().addClass('highlighted');
											    return true;
											}

											$('.rating').each(function(){
											    var $this = $(this);
											    ShowRating($this, $this.data('rating'));
											}).bind({
											    mouseleave: function(){
											        var $this = $(this);
											        ShowRating($this, $this.data('rating'));
											    }
											}).find('div').bind({
											    mouseenter: function(){
											        var $this = $(this);
											        ShowRating($this.parent(), $this.index() + 1);
											    },
											    click: function(){
											        var $this = $(this);
											        var $parent = $this.parent();
											        var idx = $this.index() + 1;
											        if($parent.data('rating') == idx){
											            // Remove rating
											            ShowRating($parent, 0);
											            $parent.data('rating', 0);
											        } else {
											            // Set rating
											            ShowRating($parent, idx);
											            $parent.data('rating', idx);
											        }
											        
											        $('#info').text($parent.data('rating'));
											    }
											});
									</script>
									<script type="text/javascript">
									$('.rating').click(function(){
														
											$.ajax({
												type:"POST",
												url:"{{URL::route('rating')}}",
												data:{
													rating:$('#info').text(),
													vendor:	$('.id-vendor-rating').val()	
												},
												success:function(data){
													var obj= JSON.parse(data);
													$('.avg-show-rating').text(obj.avg_rating);
													if(obj.avg_rating==0)
														$('.agv-rating').attr('src','{{Asset('images/star/0.jpg')}}');
													if(obj.avg_rating>0 &&obj.avg_rating<1)
														$('.agv-rating').attr('src','{{Asset('images/star/0.5.jpg')}}');
													if(obj.avg_rating==1)
														$('.agv-rating').attr('src','{{Asset('images/star/1.jpg')}}');
													if(obj.avg_rating>1 &&obj.avg_rating<2)
														$('.agv-rating').attr('src','{{Asset('images/star/1.5.jpg')}}');
													if(obj.avg_rating==2)
														$('.agv-rating').attr('src','{{Asset('images/star/2.jpg')}}');	
													if(obj.avg_rating>2 &&obj.avg_rating<3)
														$('.agv-rating').attr('src','{{Asset('images/star/2.5.jpg')}}');
													if(obj.avg_rating==3)	
														$('.agv-rating').attr('src','{{Asset('images/star/3.jpg')}}');									
													if(obj.avg_rating>3 &&obj.avg_rating<4)
														$('.agv-rating').attr('src','{{Asset('images/star/3.5.jpg')}}');	
													if(obj.avg_rating==4)	
														$('.agv-rating').attr('src','{{Asset('images/star/4.jpg')}}');	
													if(obj.avg_rating>4 &&obj.avg_rating<5)
														$('.agv-rating').attr('src','{{Asset('images/star/4.5.jpg')}}');
													if(obj.avg_rating==5)	
														$('.agv-rating').attr('src','{{Asset('images/star/5.jpg')}}');
												}													
											});
										});

									</script>



								@endif


						  		@foreach(VendorComment::where('vendor',$vendor->id)->get() as $cmt)
								
								<div class="vendor_comment">
									<div class="vendor_avatar">
										<?php
										$user_avatar_old = User::where('id', $cmt['user'])->get()->first()->avatar;
										?>
										<img src="{{Asset("{$user_avatar_old}")}}">
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
										<img src="{{Asset("{$user_avatar}")}}">
										<span style="color: #428bca;">{{$user_name}}</span>
									</div>
									<div class="vendor_content">
										<input type="text" id="vendor_comment" placeholder="Nhận xét của bạn..."></input><br />
										<button class="btn btn-primary btn_post_cmt" onclick="post_comment({{UserController::id_user()}})">Đăng</button>
									</div>
								</div>
						
								@endif
								<br><br>
							<!-- -facebookcommnet -->	
								<div id="fb-root"></div>
								<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1450451991884119&version=v2.0";
									  fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
								</script>
								<div class="fb-comments" data-href=""  data-numposts="5" data-width="100%"data-order-by="social" data-mobile="auto-detect" data-colorscheme="light"></div>												

								<script>
								    $(document).ready(function() {
								        $('.fb-comments').attr("data-href", document.URL);
								    });
								</script>
							<!-- -End facebookcommnet -->	
								<script type="text/javascript">

									$(document).ready(function(){
									    $('.btn_post_cmt').attr('disabled',true);

									    $('#vendor_comment').keyup(function(){
									        if($(this).val().length !=0){
									            $('.btn_post_cmt').attr('disabled', false);
									        }
									        else
									        {
									            $('.btn_post_cmt').attr('disabled', true);        
									        }
									    })
									});

									function post_comment (id_user) {
										var cmt = $("#vendor_comment").val(); 
										if(cmt == ""){
											return false;
										}
										else
										{
											
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
									}
								</script>
						  	</div>
						  	<div class="col-xs-12 col-sm-12 col-md-12 tab-pane" id="photos">
						  			<h4>{{Lang::get('messages.Photo')}}</h4>
						  			  <!-- Wrapper for slides -->
								<div id="bigPic">
									@if(!empty($photoslides))
										@foreach($photoslides as $index => $photoslide)
												{{'<img alt="" class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($photoslide->bigpic) . '">'}}
										@endforeach
									@endif			    
								</div>
								<div id="smallPic">
									<ul id="thumbs">
										@if(!empty($photoslides))
											@foreach($photoslides as $index => $photoslide)
													<li rel="{{$index+1}}">{{'<img alt="" class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($photoslide->smallpic) . '">'}}</li>
											@endforeach
										@endif			   
									</ul>

								</div>
								
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
													$(currentImage).fadeOut(250, function() 
													{
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
				  			<iframe width="600" height="400" src="{{$vendor->video}}" frameborder="0" allowfullscreen></iframe>
				  			
						  </div>
						  <div class="tab-pane" id="FAQ">
						  		@yield('tab-FAQ')
						  		<h4>{{Lang::get('messages.FAQ')}}</h4>
						  </div>
						  <div class="tab-pane" id="map" data-src="{{$vendor->map}}">	  		
						  	<h4>{{Lang::get('messages.Map')}}</h4>
						  	<iframe src="" width="600" height="400" frameborder="0" style="border:0"></iframe>
						  </div>
						</div>
					</div>
				</div>
			
			</div>
			<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3" id="right-contact">
					<div class="contact-me">
						<h6> <i class="glyphicon glyphicon-earphone"></i> {{$vendor->phone}} </h6>						
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
							    <div>
							    <ul style="width:100%;"id="options" >
							  		<li style="display:none;list-style:none;list-style-position:inside; "><div id="number1" calss="number" ></div></li>
								    <li style="display:none;list-style:none;list-style-position:inside;"><div id="number2" calss="number" >
								    	 <div class="form-group">
											<div class="">
												   <input  style="margin-left: -19px;" type="text" class="form-control" id="Input-phonenumber" value="" >
											</div>
										</div>
										<p style="margin-left:35px; ">e.g.xxx.xxx.xxxx</p>
										<h6 style="margin-left:-45px; font-weight:bold " >Thời gian tốt nhất để liên lạc:</h6>
										<div id="check-call">											
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
													<div class="checkbox" style="margin-right: -24px;"  >
													
													    <input type="checkbox" value="" >
														Bất kì thời gian
												
													</div>

													<div class="checkbox" >
													
													    <input type="checkbox" value="">
														Hằng ngày
													  
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6" >
													<div class="checkbox">
													  
													    <input type="checkbox" value="">
														Mỗi đêm
													
													</div>
													<div class="checkbox"style="margin-right: -15px;">
													 
													    <input type="checkbox" value="">
														Mỗi cuối tuần
													
													</div>

												</div>
											
										</div>

								    </div></li><!-- -endcall-div -->
								    
								    <li style="display:none ; list-style:none">
								    	<div id="number3" class="number">
								    	 	<div class="form-group">								    	
								    			<textarea class="form-control" style="margin-left: -17px;width:100%;height:100px;resize: none;"></textarea> 
								    		</div>
								   		 </div>
									</li>
								 </ul>
								 </div>
								    <!-- -script show select -->
								<br>	
								  <script >

									$("#selection-contact").change(function(){
										      var index = $(this).children(":selected").index();
										      $("#options").children().hide().eq(index).show();
										});

				        			</script>
							  <div class="form-group" style="margin-left: 60px">
							    <div class="">
							      <button type="button" style="margin-top: 14px;" class="btn btn-skin btn-lg" id="btn-contact"> Liên lạc</button>
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
			<script type="text/javascript">
				$('#vendor-menu').click('show', function(e) {  
				    paneID = $(e.target).attr('href');
				    src = $(paneID).attr('data-src');
				    // if the iframe hasn't already been loaded once
				    if($(paneID+" iframe").attr("src")=="")
				    {
				        $(paneID+" iframe").attr("src",src);
				    }
				});
				function show_map_detail()
				{
					
				    src = $('#map').attr('data-src');
				    // if the iframe hasn't already been loaded once
				    if($("#map"+" iframe").attr("src")=="")
				    {
				        $("#map"+" iframe").attr("src",src);
				    }
				};
			</script>
		</div>
@endsection
