@extends('main')
@section('title')
Đăng ký
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <div id="user_register">
      @if(isset($msg)) <p class="alert alert-danger">{{$msg}}</p>
      @endif
    <form role="form" action="{{Asset('register')}}" method="post" id="create_acount">
      <h2>Vui lòng Đăng ký <small>Hoàn toàn miễn phí và dễ dàng.</small></h2>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Họ" tabindex="1">
            @foreach ($errors->get('first_name') as $message)
              <p class="text-left alert alert-danger">{{$message}}</p>
            @endforeach
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Tên" tabindex="2">
            @foreach ($errors->get('last_name') as $message)
              <p class="text-left alert alert-danger">{{$message}}</p>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          
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
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Địa chỉ email" tabindex="4">
            @foreach ($errors->get('email') as $message)
              <p class="text-left alert alert-danger">{{$message}}</p>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mật khẩu" tabindex="5">
            @foreach ($errors->get('password') as $message)
              <p class="text-left alert alert-danger">{{$message}}</p>
            @endforeach
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
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
        <div class="col-xs-12 col-md-6 col-md-offset-3"><input type="submit" value="Đăng ký" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
      </div>
    </form>
  </div>
</div>
</div>
<script type="text/javascript">
        $('#create_acount').validate({
        rules:{
          first_name:{
            required:true,
            minlength:2,
            
            },
            last_name:{
              required:true,
              minlength:2,
            },
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
            first_name:{
            required:'Bạn chưa điền Họ',
            minlength:'Firstname ít nhất phải 2 kí tự trở lên',
            
            },
            last_name:{
              required:'Bạn chưa điền Tên',
              minlength:'Last name ít nhất phải có 1 kí tự',
            },
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
@endsection