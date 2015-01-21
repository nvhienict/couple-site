@extends('main')
@section('title')
Đăng nhập
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

<form role="form" action="{{Asset('change_weddingdate')}}" method="post" id="user_login" style="margin: 70px auto 120px; max-width: 350px;" >
  
  <div class="form-group" style="text-align: center;">
    <label style="color: #4965B5;">ĐĂNG NHẬP BẰNG FACEBOOK</label>
  </div>

  <div class="form-group" style="text-align: justify;">
    <label>Để sử dụng tốt nhất những công cụ của thuna.vn, bạn vui lòng cập nhật ngày cưới của mình</label>
  </div>

  <div class="form-group">
    <input data-format="dd-mm-YYYY" type="text" name="weddingdate" id="weddingdate" class="form-control input-lg " value="<?php $dateNow = New DateTime('now'); $dateNow = $dateNow->format('d-m-Y'); echo $dateNow; ?>" >
  </div>  
    <script type="text/javascript">
          $('#weddingdate').bind("mousewheel", function() {
           return false;
       });
    </script>
    <script type="text/javascript">
      $(function() {
        $('#weddingdate').datetimepicker({
          format: 'd-m-Y',
          timepicker:false
        });
      });
    </script>

  <div class="form-group" style="text-align: center;">
    <button type="submit" class="btn btn-primary">CẬP NHẬT</button>
  </div>

</form>




@endsection