@extends('main')
@section('title')
Công cụ lập kế hoạch | thuna.vn
@endsection
<script>
    var url = {
        {{--base: '{{ URL::to() }}',--}}
        current: '{{ URL::current() }}',
        previous: '{{ URL::previous() }}',
        validateFrmRegister: '{{ URL::route('check_user_email') }}',
        loginFb: '{{URL::to('login-facebook')}}'
    }
</script>
@section('nav-bar')
@include('intruduce.nav-planner')
@endsection
@section('content')

<div class="row" id="menu-bar-bottom" style="margin-top: 50px;">
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#checklist" role="tab" data-toggle="tab" class="active" >
			<i class="fa fa-list fa-2x"></i>
			<span>Danh sách công việc</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#budget" role="tab" data-toggle="tab" >
			<i class="fa fa-dollar fa-2x"></i>
			<span>Quản lý ngân sách</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#guestlist" role="tab" data-toggle="tab" >
			<i class="fa fa-users fa-2x"></i>
			<span>Danh sách khách mời</span>
		</a>
	</div>
	<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
		<a href="#website" role="tab" data-toggle="tab" >
			<i class="fa fa-globe fa-2x"></i>
			<span>Website cưới</span>
		</a>
	</div>
</div>
<script type="text/javascript">
	$('#menu-bar-bottom div a').click(function(){
		$('#menu-bar-bottom div a').removeClass('active');
		$(this).addClass('active');
	});
</script>

<div class="row">
	
		<div class="col-md-12">

			<div id="load-content" class="tab-content tab-content-index" style="margin-bottom: 50px; padding-top:0;">
				<div role="tabpanel" class="tab-pane active" id="checklist">

					<div class="row">
						<div class="col-md-3 col-md-offset-1 hidden-sm hidden-xs td-register">
							<h6 class="user_register_title">
								Đăng ký tài khoản miễn phí<br />
								<a href="http://thuna.vn/">Thuna.vn</a>
							</h6>

						    @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>@endif
						    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount" >
						      	<div class="row">
							      	<div class="col-md-12">
							          	<div class="form-group">
							            	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="1" autofocus>
							            	@foreach ($errors->get('email') as $message)
							              		<p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            	@endforeach
							          	</div>
							        </div>
						        </div>
						      	<div class="row">
						        	<div class="col-md-12">
						          
							            <div  class="input-append form-group">
							              <input data-format="yyyy-MM-dd" type="text" readonly name="weddingdate" id="weddingdate" class="form-control input-lg " placeholder="Ngày cưới" tabindex="2">
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
							            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mật khẩu" tabindex="3">
							            @foreach ($errors->get('password') as $message)
							              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            @endforeach
							          </div>
							        </div>
							        <div class="col-md-12">
							          <div class="form-group">
							            <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="Xác nhận mật khẩu" tabindex="4">
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
											<button type="submit" class="btn btn-register" tabindex="5" >Đăng ký</button>
									      	<a href="javascript:;" onclick="loginFb();" class="btn btn-social btn-facebook bn-login-fb-index">
										      <i class="fa fa-facebook"></i> Login Facebook
										    </a>
										    <script src="//connect.facebook.net/en_US/all.js"></script>
										    <div id="fb-root"></div>
										    <script type="text/javascript" src="{{Asset('assets/js/login-fb.js')}}"></script>
										</div>
									</div>
								</div>
						    </form>
							<script type="text/javascript" src="{{Asset('assets/js/validate-frm-register-index.js')}}"></script>
						</div><!--/.col-md-4-->

						<div class="col-md-7" style="margin-left: 15px;">
							<div class="row div-content-intruduce">
								<div class="col-xs-12" style="margin-bottom: 20px;">
									<img class="img-responsive" src="{{Asset('images/tool/checklist.png')}}">
								</div>
								<div class="col-xs-12 des-index-tool">
									<h5 class="introduce-index">
										<p>Công cụ cung cấp cho cô dâu và chú rể danh sách những công việc 
										cần làm trước ngày cưới, chi tiết và gần như đầy đủ.</p>
									</h5>
								</div>
							</div>


						<div class="row div-content-intruduce">
							<div class="col-xs-12" style="margin-bottom: 20px;">
								<img class="img-responsive" src="{{Asset('images/tool/checklist-1.png')}}">
							</div>
							<div class="col-xs-12 des-index-tool">
								<h5 class="introduce-index">
									<p>Thuận lợi, sắp xếp một cách khoa học: theo tháng và theo danh mục</p>
								</h5>
							</div>
						</div>

						<div class="row div-content-intruduce">
							<div class="col-xs-12" style="margin-bottom: 20px;">
								<img class="img-responsive" src="{{Asset('images/tool/checklist-add.png')}}"><br />
								<img class="img-responsive" src="{{Asset('images/tool/checklist-edit.png')}}"><br />
								<img class="img-responsive" src="{{Asset('images/tool/checklist-del.png')}}">
							</div>
							<div class="col-xs-12 des-index-tool">
								<h5 class="introduce-index">
									<p>Có thể thêm, xóa, sửa nội dung từng công việc cụ thể</p>
								</h5>
							</div>
						</div>

						<div class="row div-content-intruduce">
							<div class="col-xs-12" style="margin-bottom: 20px;">
								<img class="img-responsive" src="{{Asset('images/tool/checklist-export.png')}}">
							</div>
							<div class="col-xs-12 des-index-tool">
								<h5 class="introduce-index">
									<p>In báo cáo bằng file Excel để dễ lưu trữ và kiểm tra tốt hơn</p>
								</h5>
							</div>
						</div>

					</div>

					</div><!--/.row-->

				</div>
			  	<div role="tabpanel" class="tab-pane" id="budget">

			  		<div class="row">
			  			<div class="col-md-7 col-md-offset-1" style="margin-right: 15px;">
							<div class="row div-content-intruduce">
								<div class="col-xs-12" style="margin-bottom: 20px;">
									<img class="img-responsive" src="{{Asset('images/tool/budget.png')}}">
								</div>
								<div class="col-xs-12 des-index-tool">
									<h5 class="introduce-index">
										<p>Sử dụng dễ dàng, tính toán một cách chính xác, phân bố ngân sách chi tiết, hợp lý.</p>
									</h5>
								</div>
							</div>

							<div class="row div-content-intruduce">
								<div class="col-xs-12" style="margin-bottom: 20px;">
									<img class="img-responsive" src="{{Asset('images/tool/budget-1.png')}}">
								</div>
								<div class="col-xs-12 des-index-tool">
									<h5 class="introduce-index">
										<p>Có thể thêm mục quản lý, sửa, xóa. Công cụ sẽ thống kê, báo cáo cho người dùng.</p>
									</h5>
								</div>
							</div>
						</div>


						<div class="col-md-3 hidden-sm hidden-xs td-register">
							<h6 class="user_register_title">
								Đăng ký tài khoản miễn phí<br />
								<a href="http://thuna.vn/">Thuna.vn</a>
							</h6>

						    @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>@endif
						    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount" >
						      	<div class="row">
							      	<div class="col-md-12">
							          	<div class="form-group">
							            	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="1" autofocus>
							            	@foreach ($errors->get('email') as $message)
							              		<p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            	@endforeach
							          	</div>
							        </div>
						        </div>
						      	<div class="row">
						        	<div class="col-md-12">
						          
							            <div  class="input-append form-group">
							              <input data-format="yyyy-MM-dd" type="text" readonly name="weddingdate" id="weddingdate" class="form-control input-lg " placeholder="Ngày cưới" tabindex="2">
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
							            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mật khẩu" tabindex="3">
							            @foreach ($errors->get('password') as $message)
							              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            @endforeach
							          </div>
							        </div>
							        <div class="col-md-12">
							          <div class="form-group">
							            <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="Xác nhận mật khẩu" tabindex="4">
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
											<button type="submit" class="btn btn-register" tabindex="5" >Đăng ký</button>
									      	<a href="javascript:;" onclick="loginFb();" class="btn btn-social btn-facebook bn-login-fb-index">
										      <i class="fa fa-facebook"></i> Login Facebook
										    </a>
										    <script src="//connect.facebook.net/en_US/all.js"></script>
										    <div id="fb-root"></div>
										    <script type="text/javascript" src="{{Asset('assets/js/login-fb.js')}}"></script>
										</div>
									</div>
								</div>
						    </form>
							<script type="text/javascript" src="{{Asset('assets/js/validate-frm-register-index.js')}}"></script>
						</div><!--/.col-md-4-->
					</div><!--/.row-->

			  	</div>
			  	<div role="tabpanel" class="tab-pane" id="guestlist">

			  		<div class="row">
						<div class="col-md-3 col-md-offset-1 hidden-sm hidden-xs td-register">
							<h6 class="user_register_title">
								Đăng ký tài khoản miễn phí<br />
								<a href="http://thuna.vn/">Thuna.vn</a>
							</h6>

						    @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>@endif
						    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount" >
						      	<div class="row">
							      	<div class="col-md-12">
							          	<div class="form-group">
							            	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="1" autofocus>
							            	@foreach ($errors->get('email') as $message)
							              		<p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            	@endforeach
							          	</div>
							        </div>
						        </div>
						      	<div class="row">
						        	<div class="col-md-12">
						          
							            <div  class="input-append form-group">
							              <input data-format="yyyy-MM-dd" type="text" readonly name="weddingdate" id="weddingdate" class="form-control input-lg " placeholder="Ngày cưới" tabindex="2">
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
							            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mật khẩu" tabindex="3">
							            @foreach ($errors->get('password') as $message)
							              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            @endforeach
							          </div>
							        </div>
							        <div class="col-md-12">
							          <div class="form-group">
							            <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="Xác nhận mật khẩu" tabindex="4">
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
											<button type="submit" class="btn btn-register" tabindex="5" >Đăng ký</button>
									      	<a href="javascript:;" onclick="loginFb();" class="btn btn-social btn-facebook bn-login-fb-index">
										      <i class="fa fa-facebook"></i> Login Facebook
										    </a>
										    <script src="//connect.facebook.net/en_US/all.js"></script>
										    <div id="fb-root"></div>
										    <script type="text/javascript" src="{{Asset('assets/js/login-fb.js')}}"></script>
										</div>
									</div>
								</div>
						    </form>
							<script type="text/javascript" src="{{Asset('assets/js/validate-frm-register-index.js')}}"></script>
						</div><!--/.col-md-4-->

			  			<div class="col-md-7" style="margin-left: 15px">
							<div class="row div-content-intruduce">
								<div class="col-xs-12" style="margin-bottom: 20px;">
									<img class="img-responsive" src="{{Asset('images/tool/guestlist.png')}}">
								</div>
								<div class="col-xs-12 des-index-tool">
									<h5 class="introduce-index">
										<p>Quản lý khách mời tiệc cưới theo nhóm riêng lẻ.</p>
										<p>Có thể thêm nhóm khách, từng khách trong nhóm.</p>
										<p>Kiểm tra tình trạng đã mời hay chưa mời cho mỗi khách.</p>
										<p>Cung cấp mã xác nhận cho từng khách hàng thông Website cưới của bạn.</p>
									</h5>
								</div>
							</div>
						</div>
					</div><!--/.row-->

			  	</div>
			  	<div role="tabpanel" class="tab-pane" id="website">

			  		<div class="row">
			  			<div class="col-md-7 col-md-offset-1" style="margin-right:15px;">
							<div class="row div-content-intruduce">
								<div class="col-xs-12" style="margin-bottom: 20px;">
									<img class="img-responsive" src="{{Asset('images/tool/website.png')}}">
								</div>
								<div class="col-xs-12 des-index-tool">
									<h5 class="introduce-index">
										<p>Với một số giao diện của chúng tôi, cho phép bạn tạo ra những giao diện đẹp và bắt mắt.</p>
										<p>Lưu giữ những câu chuyện tình lãng mạng, chia sẻ những bức ảnh đáng nhớ, 
										những dòng tâm sự hạnh phúc của 2 bạn với người thân và bạn bè khắp mọi nơi.</p>
										<p>Thân thiện, miễn phí, dễ sử dụng và đạt thẩm mỹ là những gì chúng tôi hướng đến.</p>
									</h5>
								</div>
							</div>
						</div>

						<div class="col-md-3 hidden-sm hidden-xs td-register">
							<h6 class="user_register_title">
								Đăng ký tài khoản miễn phí<br />
								<a href="http://thuna.vn/">Thuna.vn</a>
							</h6>

						    @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>@endif
						    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount" >
						      	<div class="row">
							      	<div class="col-md-12">
							          	<div class="form-group">
							            	<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="1" autofocus>
							            	@foreach ($errors->get('email') as $message)
							              		<p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            	@endforeach
							          	</div>
							        </div>
						        </div>
						      	<div class="row">
						        	<div class="col-md-12">
						          
							            <div  class="input-append form-group">
							              <input data-format="yyyy-MM-dd" type="text" readonly name="weddingdate" id="weddingdate" class="form-control input-lg " placeholder="Ngày cưới" tabindex="2">
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
							            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mật khẩu" tabindex="3">
							            @foreach ($errors->get('password') as $message)
							              <p class="text-left alert alert-danger" style="color: #ffffff">{{$message}}</p>
							            @endforeach
							          </div>
							        </div>
							        <div class="col-md-12">
							          <div class="form-group">
							            <input type="password" name="password_confirm" id="password_confirm" class="form-control input-lg" placeholder="Xác nhận mật khẩu" tabindex="4">
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
											<button type="submit" class="btn btn-register" tabindex="5" >Đăng ký</button>
									      	<a href="javascript:;" onclick="loginFb();" class="btn btn-social btn-facebook bn-login-fb-index">
										      <i class="fa fa-facebook"></i> Login Facebook
										    </a>
										    <script src="//connect.facebook.net/en_US/all.js"></script>
										    <div id="fb-root"></div>
										    <script type="text/javascript" src="{{Asset('assets/js/login-fb.js')}}"></script>
										</div>
									</div>
								</div>
						    </form>
							<script type="text/javascript" src="{{Asset('assets/js/validate-frm-register-index.js')}}"></script>
						</div><!--/.col-md-4-->
					</div><!--/row-->

			  	</div>
			</div> <!--/.tab-content-->

		</div><!--/.col-md-6-->

</div><!--/.row-->


@endsection