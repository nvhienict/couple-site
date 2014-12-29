@extends('main')
@section('title')
Website cưới
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

<div id='container'>
	<div class="row" style="margin: 0px;">
		<div class="col-xs-1"></div>
		<div class="col-xs-10">
			<h1>Website cưới</h1>
		</div>
		<div class="col-xs-1"></div>
	</div>
	<!-- .row -->
	<div class="row" style="margin-bottom: 50px;">
		<div class="col-xs-1"></div>
		<div class="col-sm-4 col-lg-4 col-md-4 website_dashboard_left">
			<div class="row website_dashboard_left_top">
				<div class="col-sm-6 col-lg-6 col-md-6"><h6>Ảnh Website</h6></div>
				<div class="col-sm-6 col-lg-6 col-md-6">
					<a href="{{Asset('website/edit/pages')}}" target="_blank">
						<button class="btn btn-primary btn-responsive" style="background: #19b5bc; border:none;">Chỉnh sửa Website</button>
					</a>
				</div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-sm-6 col-lg-6 col-md-6">
				
				<?php
					$arIdThemes = array(1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,20,21);
				?>

				@if( in_array($img_tmp, $arIdThemes) )
					<img style="width:100%;" src="{{Asset("images/website/tmp/{$img_tmp}.jpg")}}">
				@endif

				</div>
				<div class="col-sm-6 col-lg-6 col-md-6 ">
					Website được thiết kế bởi <a href="http://thuna.vn/" >thuna.vn</a><br />
					<a href="{{Asset('change_temp')}}">Thay đổi giao diện <i class="fa fa-chevron-right fa-fw"></i></a>
				</div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-xs-1"></div>
				<div class="col-xs-5">Trang web:</div>
				<div class="col-xs-5 ">
					<?php
						$arIdThemes = array(1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18,19,20,21);
					?>

					@if( in_array($img_tmp, $arIdThemes) )
						<a href="{{URL::route('view-previous', array('id'=>$img_tmp))}}" target="_blank" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
					@endif
				</div>
				<div class="col-xs-1"></div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<table class="website_tabs">
						<tr>
							<td class="t-table">Tiêu đề</td>
							<td class="t-table text-center">Trạng thái</td>
						</tr>
						@foreach( $tab as $tab)						
						<tr class="even">
							<td>{{$tab->title}}</td>
							@if( $tab->visiable ==0)
							<td class="text-center">
								<i class="fa fa-circle c-green t-visiable{{$tab->id}}" onclick="visiableTab({{$tab->id}})"></i>
								<input  type="hidden" value="">
							</td>
							@else()
							<td class="text-center">
								<i class="fa fa-circle c-red t-visiable{{$tab->id}}" onclick="visiableTab({{$tab->id}})"></i>
								<input type="hidden" value="">
							</td>
							@endif()
						</tr>
						@endforeach()
					</table>
				</div>
				<div class="col-xs-1"></div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-xs-1"></div>
				
				<div class="col-xs-3">
					<!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
					<div class="g-plus" data-action="share" data-annotation="bubble" ></div>
				</div>
				<div class="col-xs-3">
					<a href="http://thuna.vn/" class="twitter-share-button">Tweet</a>	
				</div>
				<div class="col-xs-2" style="vertical-align: top;" >
					<div class="fb-share-button" data-href="http://thuna.vn/"></div>
				</div>
				
				<div class="col-xs-1"></div>
			</div>
			<!-- .row -->

		</div>
		<div class="col-sm-6 col-lg-6 col-md-6 website_dashboard_left">
			<div class="row website_dashboard_left_top">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<h6>Cài đặt chung</h6>
					<ul class="nav nav-tabs" role="tablist">
					  	<li class="active" ><a href="#design-about" role="tab" data-toggle="tab" onclick="hide_msg()">Thông Tin</a></li>
					  	<li ><a href="#design-image" role="tab" data-toggle="tab" onclick="hide_msg()">Ảnh</a></li>
					  	<li><a href="#design-url" role="tab" data-toggle="tab" onclick="hide_msg()">URL</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="design-about">
							<div class="about-infor">
								<h6>Nhập thông tin cô dâu-chú rể</h6>
								<label>Tên cô dâu :</label>
								<input type="text" id="name-bride" class="form-control" value="{{$web->name_bride}}">
								<label>Thông tin cô dâu :</label>
								<textarea type="text" id="about-bride" class="form-control" value="{{$web->about_bride}}">{{$web->about_bride}}</textarea>
								<label>Tên chú rể :</label>
								<input type="text" id="name-groom" class="form-control" value="{{$web->name_groom}}">
								<label>Thông tin chú rể :</label>
								<textarea type="text" id="about-groom" class="form-control" value="{{$web->about_groom}}">{{$web->about_groom}}</textarea>
								<p class="re-infor"></p>
								<button class="btn btn-primary btn-responsive" onclick="save_infor()">Cập nhật</button>
							</div>	
						</div>
						<div class="tab-pane" id="design-image">
							<h6>Ảnh nền của website</h6>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 load-bg">
									@if( !empty($web->background) )
									<img class="img-responsive" src="{{Asset("{$web->background}")}}">
									@endif()
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<img  class="img-responsive" src="{{Asset('images/website/tmp/infor-images.jpg')}}">
								</div>
							</div>
							<div class="row btn-upload">
								<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-center">
									<button type="button" class="btn btn-primary btn-responsive change-btn" data-backdrop="static" data-toggle="modal" data-target='#modal-bg'>Đổi Ảnh nền</button>
								</div>
							</div>
							<h6>Ảnh cô dâu-chú rể</h6>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 load-avatar-bride">
									@if( !empty($web->avatar_bride) )
									<img  class="img-responsive" src="{{Asset("{$web->avatar_bride}")}}">
									@else
									<img  class="img-responsive" src="{{Asset('images/website/themes1/girl.jpg')}}">
									@endif()

								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 load-avatar-groom">
									@if( !empty($web->avatar_groom) )
									<img class="img-responsive" src="{{Asset("{$web->avatar_groom}")}}">
									@else
									<img  class="img-responsive" src="{{Asset('images/website/themes1/boy.jpg')}}">
									@endif()

								</div>
							</div>
							<div class="row btn-upload">
								<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-center">
									<button type="button" class="btn btn-primary btn-responsive change-btn" onclick="send_check(0,111)" data-backdrop="static" data-toggle="modal" data-target='#modal-avatar'>Đổi Ảnh</button>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
									
								</div>
								<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text-center">
									<button class="btn btn-primary btn-responsive change-btn" onclick="send_check(0,222)" data-backdrop="static" data-toggle="modal" data-target='#modal-avatar' >Đổi Ảnh</button>
								</div>
							</div>
							<h6>Album ảnh cưới</h6>
							<div class="row grid-album">
								@foreach($image as $image)
									<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 padding-images remove-image{{$image->id}}">
										<span class="btn-delete"> <i class="glyphicon glyphicon-remove-sign" onclick="del_album({{$image->id}})"></i></span>
										<img class="img-responsive" src="{{Asset("{$image->photo}")}}">
									</div>
								@endforeach()
							</div>
							<div class="row text-center btn-upload">
								<button type="button" class="btn btn-primary btn-responsive change-btn" data-backdrop="static" data-toggle="modal" data-target='#modal-album'>Tải ảnh lên</button>

							</div>

						</div>
						<div class="tab-pane" id="design-url">
							<div class="setting-url">
								<h6>Cài đặt URL</h6>
								<label>URL :</label>
								<div class="show-url">
									<a class="show-link" href="http://thuma.vn/website/"{{$web->url}}"">http://thuna.vn/website/{{$web->url}}</a>
									<a class="btn-url" href="javascript:void(0);" onclick="change_url()">Thay đổi URL</a>
								</div>
								<div class="row edit-url">
									<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
										<h6 class="edit-link">hppt://thuna.vn/website/</h6>
									</div>
									<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
										<input type="text" id="name_url" class="form-control" value="{{$web->url}}">
									</div>
									<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1">
										<a href="javascript:void(0);" onclick="save_url()">Lưu</a>
									</div>
								</div>
								<div>
									<p class="re-msg"></p>
								</div>
								

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .row -->
		</div>
		<div class="col-xs-1"></div>
	</div>
	<!-- .row -->
</div>
<!-- .container -->

<!-- upload ajax avatar -->
	<div class="modal fade " id="modal-avatar">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" onclick="load_avatar()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chọn Ảnh</h4>
				</div>
				<div class="modal-body">
					
					<form  action="{{URL::route('upload_avatar')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
						<input name="check-avatar" id="check-avatar" type="hidden" value="">
						<input name="check-tab" id="check-tab" type="hidden" value="">
					</form>
						
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="load_avatar()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end upload ajax -->

	<!-- upload ajax album  -->
	<div class="modal fade " id="modal-album">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" onclick="loadMyAlbum()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chọn Ảnh</h4>
				</div>
				<div class="modal-body">
					
					<form  action="{{URL::route('upload_photo')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
						
					</form>
						
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="loadMyAlbum()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end upload ajax album -->

	<!-- change bg -->
	<div class="modal fade " id="modal-bg">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" onclick="loadBg()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chọn Ảnh</h4>
				</div>
				<div class="modal-body">
					
					<form  action="{{URL::route('upload')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
						
					</form>
						
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="loadBg()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end change bg -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=280821198756185&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">

	function hide_msg(){
		$('.re-msg').text("");
		$('.re-infor').text("");
	};
	function change_url(){
		$('.show-url').hide();
		$('.edit-url').show();
		$('.re-msg').text("");
	}
	function save_url(){
		$('.show-url').show();
		$('.edit-url').hide();
		var v_url = $('#name_url').val();
		$.ajax({
			type:'post',
			url:"{{URL::route('change_url')}}",
			data:{
				url_website : v_url
			},
			success: function(data){
				var obj = JSON.parse(data);
				$('.show-link').text('http://www.thuna.vn/website/'+obj.res_url);
				$('.show-link').attr("href",'http://www.thuna.vn/website/'+obj.res_url);
				$('.re-msg').text(obj.error_url); $('.re-msg').css('color',obj.color);			 					
			}
		});
	};
	function save_infor(){
		var name_groom = $('#name-groom').val();
		var name_bride = $('#name-bride').val();
		var about_groom = $('#about-groom').val();
		var about_bride = $('#about-bride').val();
		$.ajax({
			type:"POST",
			url:"{{URL::route('update_infor')}}",
			data:{
				name_groom: name_groom,
				name_bride: name_bride,
				about_groom: about_groom,
				about_bride: about_bride
			},
			success:function(data){
				var obj = JSON.parse(data);
				$('.re-infor').text(obj.message_infor);
			}
		});
	};

	//upload avatar
	function send_check(check_tab,check){
		var ck = check;
		var ck_tab = check_tab;
		$('#check-avatar').val(ck);
		$('#check-tab').val(ck_tab);
	};
	function load_avatar(){
		var check_avatar = $('#check-avatar').val();
		var check_tab = $('#check-tab').val();
		$.ajax({
			type: "post",
			url: "{{URL::route('load_avatar')}}",
			data: { check_avatar : check_avatar,
					check_tab : check_tab },
			success: function(data){
				if (check_avatar == 111) {
					$('.load-avatar-bride').html('<img  class="img-responsive" src="'+data.image+'">');
				} else{
					$('.load-avatar-groom').html('<img  class="img-responsive" src="'+data.image+'">');
				};
			}
		});
	};
	function loadMyAlbum(){
		$.ajax({
			type:"post",
			url:"{{URL::route('load_my_album')}}",
			success:function(data){
				$('.padding-images').remove();
				$('.grid-album').append(data);
			}
		});		
	};
	function loadBg(){
		$.ajax({
			type:"post",
			url:"{{URL::route('load_bg')}}",
			success:function(data){
				$('.load-bg').html('<img class="img-responsive" src="'+data.bg+'">');
			}
		});	
	};
	function del_album(id_photo){
		$.ajax({
			type:"post",
			url:"{{URL::route('del_album')}}",
			data:{ id_photo: id_photo},
			success:function(data){
				$('.remove-image'+id_photo).remove();
			}
		});	
	};
	function visiableTab(id_tab){
		if ($('.t-visiable'+id_tab).hasClass('c-green')) {
			 $('.t-visiable'+id_tab).next().val('1');
			 visiable = $('.t-visiable'+id_tab).next().val();
		} else{
			$('.t-visiable'+id_tab).next().val('0');
			 visiable = $('.t-visiable'+id_tab).next().val();
		};
		$.ajax({
			type:"post",
			url:"{{URL::route('update_visiable')}}",
			data:{ id_tab: id_tab, visiable: visiable},
			success:function(data){
				if (data.visiable == 0) {
					$('.t-visiable'+id_tab).removeClass('c-red');
					$('.t-visiable'+id_tab).addClass('c-green');
				} else{
					$('.t-visiable'+id_tab).removeClass('c-green');
					$('.t-visiable'+id_tab).addClass('c-red');
				};
			}
		});		
	};


</script>
@endsection
