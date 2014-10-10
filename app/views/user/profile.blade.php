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
		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',VendorController::last_vendor())->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',VendorController::last_vendor())->get()->first()->name}}</span>

		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',VendorController::last_vendor()-1)->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',VendorController::last_vendor()-1)->get()->first()->name}}</span>
	</div>
	@foreach($user as $key=>$user_item)
	<div class="col-xs-8">
		
		<div class="col-xs-5 info_user_dashboard">
			<div class="info_user_avatar">
				<?php $user_avatar = base64_decode($user_item->avatar); ?>
				<!-- {{'<img alt="" src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" />'}} -->
				<img src="{{$user_avatar}}">
				<a href="javascript:;" onclick="update_avatar();" title="Thay đổi"><i class="fa fa-pencil-square-o fa-fw"></i></a>
				
				<!-- <input type="file" name="file" style="display:none;" >
				<input type="hidden" name="img" value="" > -->
				<form id="update" enctype="multipart/form-data" method="post" action="{{ url('update_avatar') }}" autocomplete="off" style="display:none;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="file" name="file" id="image" /> 
                </form>

				<script type="text/javascript">
					function update_avatar(){
						$('input[name=file]').trigger('click');
					}
					$('input[name=file]').change(function() {
							
						// $('input[name=img]').val($(this).val());

						// var img_avatar = $(this).val();
						// $.ajax({
						// 	type: "post",
						// 	url: "{{URL::route('update_avatar')}}",
						// 	data: {img_avatar:img_avatar}
						// });
						$('#update').submit();

					});
				</script>
				<p>
					<a href="javascript:;" id="user_info" ><i class="fa fa-info-circle fa-fw"></i> THÔNG TIN CÁ NHÂN </a><br />
					<a href="javascript:;" id="user_password" ><i class="fa fa-compass fa-fw"></i> MẬT KHẨU </a>
					<script type="text/javascript">
						$('#user_info').click(function(){
							$('div.user_info').show();
							$('div.update_password').hide();
						});
						
						$('#user_password').click(function(){
							$('div.user_info').hide();
							$('div.update_password').slideDown();
						});
					</script>
				</p>
			</div>
			<div class="info_user_avatar">

					<span>Ứng dụng của bạn</span>
					<ul class="list-unstyled info_user_ul">
		                <li><a href="#"><i class="fa fa-arrow-right fa-fw"></i>Website cưới</a></li>
		                <li><a href="{{URL::route('guest-list')}}" ><i class="fa fa-arrow-right fa-fw"></i>Danh sách khách mời</a></li>
		                <li><a href="#"><i class="fa fa-arrow-right fa-fw"></i>Sơ đồ ghế ngồi</a></li>
		                <li><a href="{{URL::route('user-checklist')}}"  ><i class="fa fa-arrow-right fa-fw"></i>Danh sách công việc</a></li>
		                <li><a href="#"><i class="fa fa-arrow-right fa-fw"></i>Quản lý vendor</a></li>
		                <li><a href="{{URL::route('budget')}}"  ><i class="fa fa-arrow-right fa-fw"></i>Quản lý ngân sách</a></li>

		            </ul>

			</div>
			<div class="info_user_avatar">

					<span>Cộng đồng</span>

					<ul class="list-unstyled info_user_ul">
		                <li><a href="#"><i class="fa fa-star-o fa-fw"></i>Blog</a></li>
		                <li><a href="#"><i class="fa fa-star-o fa-fw"></i>Website</a></li>
		                <li><a href="#"><i class="fa fa-star-o fa-fw"></i>Forum</a></li>
		            </ul>
					

			</div>
		</div>

		<div class="col-xs-7 update_password" style="display:none;">
			<form action="{{Asset('profile_password')}}" id="frmEditProfilePassword" method="post">
				<div class="row form-group">
					<label class="col-xs-12 control-label info_user">MẬT KHẨU</label>
				</div>
				<div class="row form-group">
					<div class="col-xs-12 msg_info_user">
						@if(isset($msg))
							{{$msg}}
						@endif
					</div>	
				</div>
				<div class="row form-group">
					<label for="password" class="col-xs-4 control-label">Mật khẩu cũ: </label>
					<div class="col-xs-8">
					   	<input type="password" class="form-control" name="password" id="password"  >
					</div>
				</div>
			    <div class="row form-group">
					<label for="new_password" class="col-xs-4 control-label">Mật khẩu mới: </label>
					<div class="col-xs-8">
					   	<input type="password" class="form-control" name="new_password" id="new_password"  >
					</div>
				</div>
				<div class="row form-group">
					<label for="confim_new_password" class="col-xs-4 control-label">Xác nhận mật khẩu: </label>
					<div class="col-xs-8">
					   	<input type="password" class="form-control" name="confim_new_password" id="confim_new_password" >
					</div>
				</div>
			    <div class="row form-group">
			  		<div class="col-xs-4"></div>
			  		<div class="col-xs-4">
				    	<button type="submit" class="btn btn-primary" id="update_profile_password" > THAY ĐỔI </button>
				    	
				    	<script type="text/javascript">
			  				$('#update_profile_password').click(function(){
			  					$('#frmEditProfilePassword').submit();
			  				});
			  			</script>
			  		</div>
			  		<div class="col-xs-4"></div>
			  	</div>
			</form>
			<!-- .form -->
		</div>
		<!-- .form edit -->


		<div class="col-xs-7 user_info">
			<form action="{{Asset('profile')}}" id="frmEditProfile" method="post">
				<div class="row form-group">
					<label class="col-xs-12 control-label info_user">THÔNG TIN CÁ NHÂN</label>
				</div>
				<div class="row form-group">
					<div class="col-xs-12 msg_info_user">
						@if(isset($msg))
							{{$msg}}
						@endif
					</div>	
				</div>
				<div class="row form-group">
					<label for="firstname" class="col-xs-4 control-label">Họ: </label>
					<div class="col-xs-8">
					   	<input type="text" class="form-control" name="firstname" id="firstname" value="{{$user_item->firstname}}" >
					</div>
				</div>
				<div class="row form-group">
					<label for="lastname" class="col-xs-4 control-label">Tên: </label>
					<div class="col-xs-8">
					   	<input type="text" class="form-control" name="lastname" id="lastname" value="{{$user_item->lastname}}" >
					</div>
				</div>
				<div class="row form-group">
					<label for="email" class="col-xs-4 control-label">Email: </label>
					<div class="col-xs-8">
					   	<input type="email" class="form-control" name="email" id="email" value="{{$user_item->email}}" >
					</div>
				</div>
				<div class="row form-group">
					<label for="weddingdate-edit" class="col-xs-4 control-label">Ngày cưới: </label>
			        <div class="col-xs-8">
			            <div class="form-group">
			            	<input type='text' class="form-control" id="weddingdate-edit" name="weddingdate" value="{{UserController::getDates()}}" >
			            	<script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
			            </div>
			        </div>
			    </div>
			    <div class="row form-group">
			  		<div class="col-xs-4"></div>
			  		<div class="col-xs-8">
				    	<button type="submit" class="btn btn-primary" id="update_profile" > CẬP NHẬT </button>

				    	<script type="text/javascript">
			  				$('#update_profile').click(function(){
			  					$('#frmEditProfile').submit();
			  				});
			  			</script>
			  		</div>
			  		<div class="col-xs-2"></div>
			  	</div>
			</form>
			<!-- .form -->
		</div>
		<!-- .form edit -->

		
	</div>
	@endforeach
	<div class="col-xs-2">
		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',VendorController::last_vendor()-2)->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',VendorController::last_vendor()-2)->get()->first()->name}}</span>

		{{'<img width="100%;" alt="" src="data:image/jpeg;base64,' . base64_encode(Vendor::where('id',VendorController::last_vendor()-3)->get()->first()->avatar) . '" />'}}
		<span style="color: #68ceee">{{Vendor::where('id',VendorController::last_vendor()-3)->get()->first()->name}}</span>
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
			}
		}
	});

	$('#frmEditProfilePassword').validate({
		rules:{
			password:{
				required: true,
				remote:{
					url:"{{URL::route('check_pass_edit',array(UserController::id_user()))}}",
					type:"post"
				}
			},
			new_password:{
				required:true,
				minlength:3
			},
			confim_new_password:{
				equalTo:"#new_password"
			}
		},

		messages:{
			password:{
				required: "Bạn chưa nhập mật khẩu",
				remote:"Mật khẩu không đúng"
			},
			new_password:{
				required:"Bạn chưa nhập mật khẩu mới",
				minlength:"Mật khẩu phải lớn hơn 3 ký tự"
			},
			confim_new_password:{
				equalTo:"Xác nhận mật khẩu chưa đúng"
			}
		}
	});
</script>
</div><!--container-->
@endsection