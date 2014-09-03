@extends('main')
@section('title')
Thông tin cá nhân
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container">
<div class="row">
	<div class="col-xs-2">
		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',1)->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',1)->get()->first()->name}}</span>

		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',2)->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',2)->get()->first()->name}}</span>
	</div>
	@foreach($user as $key=>$user_item)
	<div class="col-xs-8">

		<ul class="nav nav-tabs" role="tablist" id="myTab">
			<li class="active"><a href="#profile" role="tab" data-toggle="tab">Thông tin cá nhân</a></li>
			<li><a href="#edit_profile" role="tab" data-toggle="tab">Chỉnh sửa</a></li>
		</ul>

		<div class="tab-content">
			<div class="col-xs-12 tab-pane active" id="profile">
				<div class="row form-group" id="thead_edit_profile">
					<label class="col-xs-12 control-label">THÔNG TIN CÁ NHÂN</label>
				</div>
				<div class="row form-group">
					<label for="firstname" class="col-xs-2 control-label">Họ: </label>
					<div class="col-xs-10">
					   	<input type="text" class="form-control" name="firstname" id="firstname" value="{{$user_item->firstname}}" readonly >
					</div>
				</div>
				<div class="row form-group">
					<label for="lastname" class="col-xs-2 control-label">Tên: </label>
					<div class="col-xs-10">
					   	<input type="text" class="form-control" name="lastname" id="lastname" value="{{$user_item->lastname}}" readonly >
					</div>
				</div>
				<div class="row form-group">
					<label for="email" class="col-xs-2 control-label">Email: </label>
					<div class="col-xs-10">
					   	<input type="email" class="form-control" name="email" id="email" value="{{$user_item->email}}" readonly >
					</div>
				</div>
				<div class="row form-group">
					<label for="weddingdate" class="col-xs-2 control-label">Ngày cưới: </label>
			        <div class="col-xs-10">
			            <div class="form-group">
			            	<input type='text' class="form-control" id="weddingdate" name="weddingdate" value="{{UserController::getDates()}}" readonly >
			            </div>
			        </div>
			    </div>
			</div> <!-- profile -->

			<div class="col-xs-12 tab-pane" id="edit_profile">
			<form action="{{Asset('profile')}}" id="frmEditProfile" method="post">
				<div class="row form-group" id="thead_edit_profile">
					<label class="col-xs-12 control-label">CHỈNH SỬA THÔNG TIN</label>
				</div>
				<div class="row form-group">
					<label for="firstname" class="col-xs-2 control-label">Họ: </label>
					<div class="col-xs-10">
					   	<input type="text" class="form-control" name="firstname" id="firstname" value="{{$user_item->firstname}}" >
					</div>
				</div>
				<div class="row form-group">
					<label for="lastname" class="col-xs-2 control-label">Tên: </label>
					<div class="col-xs-10">
					   	<input type="text" class="form-control" name="lastname" id="lastname" value="{{$user_item->lastname}}" >
					</div>
				</div>
				<div class="row form-group">
					<label for="email" class="col-xs-2 control-label">Email: </label>
					<div class="col-xs-10">
					   	<input type="email" class="form-control" name="email" id="email" value="{{$user_item->email}}" >
					</div>
				</div>
				<div class="row form-group">
					<label for="weddingdate-edit" class="col-xs-2 control-label">Ngày cưới: </label>
			        <div class="col-xs-10">
			            <div class="form-group">
			            	<input type='text' class="form-control" id="weddingdate-edit" name="weddingdate" value="{{UserController::getDates()}}" >
			            	<script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
			            </div>
			        </div>
			    </div>
			    <div class="row form-group">
					<label for="new_password" class="col-xs-2 control-label">Mật khẩu: </label>
			        <div class="col-xs-10">
			            <div class="form-group">
			            	<input type='password' class="form-control" id="new_password" name="new_password" >
			            </div>
			        </div>
			    </div>
			    <div class="row form-group">
					<label for="confim_new_password" class="col-xs-2 control-label">Xác nhận: </label>
			        <div class="col-xs-10">
			            <div class="form-group">
			            	<input type='password' class="form-control" id="confim_new_password" name="confim_new_password" >
			            </div>
			        </div>
			    </div>
			    <div class="row form-group">
			  		<div class="col-xs-3"></div>
			  		<div class="col-xs-4">
				    	<button type="submit" class="btn btn-primary" id="update_profile" > CẬP NHẬT </button>
				    	<a href="{{Asset('profile')}}" style="cursor:pointer; margin-left: 10px;"> HUỶ BỎ </a>
			  			<script type="text/javascript">
			  				$('#update_profile').click(function(){
			  					$('#frmEditProfile').submit();
			  				});
			  			</script>
			  		</div>
			  		<div class="col-xs-4"></div>
			  	</div>
			</form>
			</div> <!-- edit_profile -->

		</div> <!-- tab-content -->
	</div>
	@endforeach
	<div class="col-xs-2">
		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',10)->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',10)->get()->first()->name}}</span>

		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',11)->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',11)->get()->first()->name}}</span>
	</div>
</div>

<script type="text/javascript">
	$('#frmEditProfile').validate({
		rules:{
			firstname:{
				required:true,
			},
			lastname:{
				required:true,
			},
			email:{
				required:true,
				email: true,
				remote:{
					url:"{{URL::route('check_email_edit',array(UserController::id_user()))}}",
					type:"post"
				}
			},
			weddingdate:{
				required:true,
			},
			new_password:{
				required:true,
				minlength:3
			},
			confim_new_password:{
				equalTo:"#new_password",
			}
		},

		messages:{
			firstname:{
				required:"Bạn chưa nhập Họ của mình",
			},
			lastname:{
				required:"Bạn chưa nhập Tên của mình",
			},
			email:{
				required:"Bạn chưa nhập email của mình",
				email:"Email bạn vừa nhập chưa đúng định dạng",
				remote:"Email bạn vừa nhập đã tồn tại, xin nhập email khác"
			},
			weddingdate:{
				required:"Bạn chưa chọn ngày cưới cho mình",
			},
			new_password:{
				required:"Bạn phải nhập mật khẩu",
				minlength:"Mật khẩu của bạn phải lớn hơn 3 ký tự"
			},
			confim_new_password:{
				equalTo:"Xác nhận mật khẩu của bạn chưa đúng"
			}
		}
	});
</script>
</div><!--container-->
@endsection