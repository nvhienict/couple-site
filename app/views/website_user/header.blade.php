@extends('main')
@section('title')
Website cưới
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<script type="text/javascript">
	function opacity(){
 		$('.dz-message').css('opacity',0);
 	};
	function send_check(check){
		$('#check-avatar').val(check);
	};
	function load_wedding(){
		var check_avatar = $('#check-avatar').val();
		$.ajax({
			type:"post",
			url:"{{URL::route('load_wedding')}}",
			data:{check_avatar: check_avatar},
			success:function(data){
				$('.dz-preview').remove();
				$('.dz-message').css('opacity',1);
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
				$('.dz-preview').remove();
				$('.dz-message').css('opacity',1);
				$('.padding-images').remove();
				$('.grid-album').append(data);
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
	function loadBg(){
		$.ajax({
			type:"post",
			url:"{{URL::route('load_bg')}}",
			success:function(data){
				$('.dz-preview').remove();
				$('.dz-message').css('opacity',1);
				$('.load-bg').html('<img class="img-responsive" src="'+data.bg+'">');
			}
		});	
	};

	function nextStep2 () {
		$('.tab-step1').hide();
		$('.tab-step2').show();
		$('.step1 a').css('color','#66B5BC');
		$('.step2 a').css('color','#E75280');

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
			}
		});
	};
	function nextStep3(){
		$('.tab-step2').hide();
		$('.tab-step3').show();
		$('.step2 a').css('color','#66B5BC');
		$('.step3 a').css('color','#E75280');
	};
	function preStep1(){
		$('.tab-step1').show();
		$('.tab-step2').hide();
		$('.step1 a').css('color','#E75280');
		$('.step2 a').css('color','#66B5BC');
	};	
	function preStep2(){
		$('.tab-step3').hide();
		$('.tab-step2').show();
		$('.step3 a').css('color','#66B5BC');
		$('.step2 a').css('color','#E75280');
	};
	function checkURL(){
		var url = $('#input-url').val();
		$.ajax({
			type:"post",
			url:"{{URL::route('check_url_step')}}",
			data:{url: url},
			success: function(data){
				$('.infor-url').text(data.msg);
				$('.infor-url').css('color',data.color);
			}
		});
	};
	function createURL(){
		 var url = $('#input-url').val();
		$.ajax({
			type:"post",
			url:"{{URL::route('create_url_step')}}",
			data:{url: url},
			success: function(data){
			window.location.href = "{{URL::route('template-website',array($id_tmp))}}";
			}
		});
	};
</script>
<div class="container body-step">
	<ul class="nav nav-tabs" role="tablist" style="margin:0% 25%;">
	  	<li class="step1" style="display: inline-flex;">
	  		<a href="javascript:void(0);" >Bước 1</a>
	  		<span class="glyphicon glyphicon-arrow-right arrow"></span>
	  	</li>
	  	<li class="step2" style="display: inline-flex;">
	  		<a href="javascript:void(0);" >Bước 2</a>
	  		<span class="glyphicon glyphicon-arrow-right arrow"></span>
	  	</li>
	  	<li class="step3" style="display: inline-flex;">
	  		<a href="javascript:void(0);" >Bước 3</a>
	  	</li>
	</ul>
	<!-- thong tin co dau chu re -->
	<div class="tab-step1 col-xs-12 col-md-12 col-sm-12 col-lg-12" id="design-about">
		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
				<h6>Nhập thông tin cô dâu-chú rể</h6>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-1 col-md-1 col-lg-1"></div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<div class="load-avatar-bride">
					<img  class="img-responsive" src="{{Asset('images/website/themes1/girl.jpg')}}">
				</div>
				<div class="text-center btn-change-img">
					<button type="button" class="btn btn-responsive btn-primary"  onclick="send_check(111)" data-backdrop="static" data-toggle="modal" data-target='#modal-wedding'>Đổi ảnh</button>
				</div>
				<div class="about-infor">
					<label>Tên cô dâu :</label>
					<input type="text" id="name-bride" class="form-control" value="">
					<label>Thông tin cô dâu :</label>
					<textarea style="margin-bottom:2%;" type="text" id="about-bride" class="form-control" value=""></textarea>
				</div>				
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<div class="load-avatar-groom">
					<img  class="img-responsive" src="{{Asset('images/website/themes1/boy.jpg')}}">
				</div>
				<div class="text-center btn-change-img-groom">
					<button type="button" class="btn btn-responsive btn-primary"  onclick="send_check(222)" data-backdrop="static" data-toggle="modal" data-target='#modal-wedding'>Đổi ảnh</button>
				</div>
				<div class="about-infor">
					<label>Tên chú rể :</label>
					<input type="text" id="name-groom" class="form-control" value="">
					<label>Thông tin chú rể :</label>
					<textarea type="text" id="about-groom" class="form-control" value=""></textarea>				
				</div>	
			</div>
		</div>
		<nav class="text-center">
			  <ul class="pagination">
			    <li><a href="javascript:void(0);" onclick="nextStep2()">Tiếp</a></li>
			    <li>
			      <a href="javascript:void(0);" aria-label="Next"  onclick="nextStep2()">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
		</nav>		
	</div>
	<!-- end thong tin co dau chu re -->

	<!-- cai dat anh -->
	<div class="tab-step2 col-xs-12 col-md-12 col-sm-12 col-lg-12" id="design-img">
		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
				<h6>Cài đặt ảnh</h6>
			</div>
		</div>
		<div class="row about-img">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
				<label>Ảnh nền của website</label>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
				<div class="load-bg">
					<img  class="img-responsive" src="{{Asset('images/website/themes1/template_1.jpg')}}">
				</div>
				<div class="text-center btn-change-bg"><button type="button" class="btn btn-responsive btn-primary" data-backdrop="static" data-toggle="modal" data-target='#modal-bg'>Đổi ảnh</button></div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<img  class="img-responsive" src="{{Asset('images/website/tmp/infor-images.jpg')}}">
			</div>
		</div>
		<div class="row about-img">
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
				<label>Album ảnh cưới</label>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-md-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 grid-album"></div>
			<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12 text-center btn-upload">
				<button type="button" class="btn btn-primary btn-responsive change-btn" data-backdrop="static" data-toggle="modal" data-target='#modal-album'>Tải ảnh lên</button>
			</div>
		</div>
		<nav class="text-center">
			  <ul class="pagination">
			    <li>
			      <a href="javascript:void(0);" onclick="preStep1()" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="javascript:void(0);" onclick="preStep1()">Quay lại</a></li>
			    <li><a href="javascript:void(0);" onclick="nextStep3()">Tiếp</a></li>
			    <li>
			      <a href="javascript:void(0);" onclick="nextStep3()" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
		</nav>
	</div>
	<!-- end cai dat anh -->

	<!-- cai dat url -->
	<div class="tab-step3 col-xs-12 col-md-6 col-sm-6 col-lg-6 co-md-offset-3 col-sm-offset-3 col-lg-offset-3" id="design-url">
		<h6>Cài đặt URL</h6>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 show-url-step">
				<a href="javascript:void(0);">http:://thuna.vn/website/</a>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<input onkeyup="checkURL()" type="text" class="form-control" id="input-url" placeholder="tên url">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<p style="margin-top:5%;" class="text-center infor-url"></p>
			</div>
		</div>
		<div class="row">
			<p style="margin-left:3%;color:#66B5CD;">URL là link dùng để chia sẻ trang web của bạn với bạn bè</p>
		</div>

		<nav class="text-center">
			  <ul class="pagination">
			    <li>
			      <a href="javascript:void(0);" onclick="preStep2()" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li><a href="javascript:void(0);" onclick="preStep2()">Quay lại</a></li>
			    <li><a href="javascript:void(0);" onclick="createURL()">Hoàn thành</a></li>
			  </ul>
		</nav>
	</div>
	<!-- end cai dat url -->

</div>

<!-- many modal -->
<!-- change bg -->
<div class="modal fade " id="modal-bg">
	<div class="modal-dialog modal-md">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" onclick="loadBg()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center">Cài đặt ảnh nền</h4>
			</div>
			<div class="modal-body">
				
				<form onclick="opacity()" action="{{URL::route('upload')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
					
				</form>
					
			</div>
			<div class="modal-footer" style="text-align:center;">
	      		<button onclick="loadBg()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- end change bg -->

<!-- upload ajax album  -->
<div class="modal fade " id="modal-album">
	<div class="modal-dialog modal-lg">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" onclick="loadMyAlbum()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center">Cài đặt album ảnh</h4>
			</div>
			<div class="modal-body">
				
				<form onclick="opacity()" action="{{URL::route('upload_photo')}}" class="dropzone dz-clickable" id="upload-photo-album" method="POST">
					
				</form>
					
			</div>
			<div class="modal-footer" style="text-align:center;">
	      		<button onclick="loadMyAlbum()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end upload ajax album -->

<!-- upload ajax avatar wedding-->
<div class="modal fade " id="modal-wedding">
	<div class="modal-dialog modal-md">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" onclick="load_wedding()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title text-center">Cài đặt ảnh cô dâu-chú rể</h4>
			</div>
			<div class="modal-body">
				
				<form  onclick="opacity()" action="{{URL::route('upload_wedding')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
					<input name="check-avatar" id="check-avatar" type="hidden" value="">
				</form>
					
			</div>
			<div class="modal-footer" style="text-align:center;">
	      		<button onclick="load_wedding()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	<!-- end upload ajax -->
@endsection
