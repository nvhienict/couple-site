@extends('main')
@section('title')
Webite cưới | thuna.vn
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
@include('intruduce.nav-website')
@endsection
@section('content')

	<div class="row" style="margin: 50px auto;">
		<div class="col-md-7 col-md-offset-1 col-sm-12 des-index-tool">
			<h5 class="introduce-index">
				<p>Chỉ cần <a href="{{URL::route('login')}}">Đăng nhập</a> 
				sau đó chọn một trong những giao diện.</p>
				<p>Thay đổi nội dung, hình ảnh cho Website của bạn rất đơn giản: 
				Chỉ cần <strong>click</strong> trên phần nội dung, <strong>chọn</strong> 
				Đổi ảnh, mọi thao tác nhanh và tiện lợi.</p>
				<img class="img-responsive" src="{{Asset('images/tool/edit-website.png')}}">
			</h5>
			<h6 class="use-now">
				<a class="btn btn-use-now btn-sm" href="{{URL::route('website')}}" >Miễn phí! Sử dụng ngay</a>
			</h6>
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
		</div>

	</div>

@endsection