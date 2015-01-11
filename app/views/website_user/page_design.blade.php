@extends('main_website')
@section('title')
{{$firstname}}'s Website cưới 
@endsection
@section('content')

<body style="overflow-x:hidden;">
	<div class="row">
			<!-- viet theo thu tu cho de kiem soat =>Giang -->
			@if($id_tmp==1)
					@include('website_user.themes.edit.index')
			@else
					@if($id_tmp==2)
						@include('website_user.themes2.edit.index')
					@endif

					@if($id_tmp==3)
						@include('website_user.themes3.edit.index')
					@endif
					
					@if($id_tmp==4)
						@include('website_user.themes4.edit.index')	
					@endif

					@if($id_tmp==5)
						@include('website_user.themes5.edit.index')
					@endif

					@if($id_tmp==6)
						@include('website_user.themes6.edit.index')
					@endif

					@if($id_tmp==7)
						@include('website_user.themes7.edit.index')
					@endif

					@if($id_tmp==8)
						@include('website_user.themes8.edit.index')
					@endif

					@if($id_tmp==9)
						@include('website_user.themes9.edit.index')
					@endif

					@if($id_tmp==10)
						@include('website_user.themes10.edit.index')
					@endif

					@if($id_tmp==11)
						@include('website_user.themes11.edit.index')
					@endif

					@if($id_tmp==12)
						@include('website_user.themes12.edit.index')
					@endif
					@if($id_tmp==13)
						@include('website_user.themes13.edit.index')
					@endif

					@if($id_tmp==14)
						@include('website_user.themes14.edit.index')
					@endif

					@if($id_tmp==15)
						@include('website_user.themes15.edit.index')
					@endif
					@if($id_tmp==16)
						@include('website_user.themes16.edit.index')
					@endif
					@if($id_tmp==17)
						@include('website_user.themes17.edit.index')
					@endif

					@if($id_tmp==18)
						@include('website_user.themes18.edit.index')
					@endif

					@if($id_tmp==19)
						@include('website_user.themes19.edit.index')
					@endif
					@if($id_tmp==20)
						@include('website_user.themes20.edit.index')
					@endif
					@if($id_tmp==21)
						@include('website_user.themes21.edit.index')
					@endif
			@endif
	</div>	
<!-- modal edit content website -->

<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3  class="modal-title text-center title-partion"></h3>
      </div>
      <div class="modal-body">
        <div class="row">
    		<textarea name="editor" class="ckeditor form-control" id="editor" cols="40" rows="10" tabindex="1">
          	 	
            </textarea>
        	<p></p>   	
        </div>       
      </div>
      <div class="modal-footer" style="margin-top: 0px;border-top:none; padding-top: 5px; padding-right: 39%;">
      	<button onclick="updateContent()" type="button" data-dismiss="modal" class="btn btn-primary update-content " >Lưu</button>
      	<input type="hidden" value="">
        <button  type="button" class="btn btn-primary id-tab" data-dismiss="modal">Hủy</button>       
      </div>
    </div>
  </div>
</div>

<!-- end modal edit content website -->

<script type="text/javascript">
	function showckeditorpartion (id) {
		$.ajax({
			type:'post',			
			url:"{{URL::route('get_content')}}",
			data:{id_tab:id},
			success: function(data){
				var obj = JSON.parse(data);
				$('.id-tab').val(id);
				$('.title-partion').text('Thay đổi nội dung của '+obj.title);
				CKEDITOR.instances['editor'].setData(obj.content);			
			}
		});
	};

	function updateContent(){
		var id_tab 	= $('.id-tab').val();
		$.ajax({
			type:'post',			
			url:"{{URL::route('update_content')}}",
			data:{id_tab:$('.id-tab').val(),
					content:CKEDITOR.instances['editor'].getData() },
			success: function(data){
				var obj = JSON.parse(data);
				$('.phara'+id_tab).html(obj.content);
			}
		});
	}
</script>

<!-- upload ajax phototab -->
	<div class="modal fade" id="modal-changeimage" style="z-index:9999;">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" onclick="load_photo_tab()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chọn Ảnh</h4>
				</div>
				<div class="modal-body">
					
					<form onclick="opacity()" action="{{URL::route('upload_avatar')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
						<input name="check-tab" id="check-tab" type="hidden" value="">
						<input name="check-vc" id="check-vc" type="hidden" value="">
					</form>
						
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="load_photo_tab()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end upload ajax -->

	<!-- upload bg -->
	<div class="modal fade" id="change-bg-edit">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" onclick="loadBgEdit()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Chọn Ảnh Nền</h4>
				</div>
				<div class="modal-body">
					
					<form  action="{{URL::route('upload')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
	
					</form>
						
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="loadBgEdit()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end upload bg -->

	<!-- edit title -->
	<div class="modal fade" id="modal-edit-menu">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Chỉnh sửa tiêu đề</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="text" name="get-id-title" id="get-id-title" class="form-control" value="">
							<input type="hidden" value="">
						</div>								
					</div>
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="updateTitle()" type="button" data-dismiss="modal" class="btn btn-primary" >Cập nhật</button>
		      		<button  type="button" data-dismiss="modal" class="btn btn-primary" >Thoát</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end edit title -->

	<!-- edit infor bride -->
	<div class="modal fade" id="edit-infor-bride">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Chỉnh sửa thông tin cô dâu</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-sm-offset-2 col-lg-offset-2">
							<label>Tên cô dâu</label>
							<input type="text" name="name-bride-load" id="name-bride-load" class="form-control" value="">
							<label>Thông tin về cô dâu</label>
							<textarea  type="text" name="about-bride-load" id="about-bride-load" class="form-control" value=""></textarea>
						</div>							
					</div>
				</div>
				<div class="modal-footer remove-border" style="text-align:center;">
		      		<button onclick="updateInforBride()" type="button" data-dismiss="modal" class="btn btn-primary" >Cập nhật</button>
		      		<button  type="button" data-dismiss="modal" class="btn btn-primary" >Thoát</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end edit infor bride -->

	<!-- edit infor groom -->
	<div class="modal fade" id="edit-infor-groom">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Chỉnh sửa thông tin về chú rể</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-md-offset-2 col-sm-offset-2 col-lg-offset-2">
							<label>Tên chú rể</label>
							<input type="text" name="name-groom-load" id="name-groom-load" class="form-control" value="">
							<label>Thông tin về chú rể</label>
							<textarea  type="text" name="about-groom-load" id="about-groom-load" class="form-control" value=""></textarea>
						</div>							
					</div>
				</div>
				<div class="modal-footer remove-border" style="text-align:center;">
		      		<button onclick="updateInforGroom()" type="button" data-dismiss="modal" class="btn btn-primary" >Cập nhật</button>
		      		<button  type="button" data-dismiss="modal" class="btn btn-primary" >Thoát</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end edit infor groom-->

<!-- upload album -->
	<div class="modal fade" id="album-photo-user">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" onclick="reloadEdit()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Quản lí ảnh</h4>
				</div>
				<div class="modal-body body-album">
					<div class="row grid-album">		
						@foreach(WebsiteController::getImages() as $image)
						<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 padding-images remove-image{{$image->id}}">
							<span class="btn-delete"> <i class="glyphicon glyphicon-remove-sign" onclick="del_album({{$image->id}})"></i></span>
							<img class="img-responsive" src="{{Asset("{$image->photo}")}}">
						</div>	
						@endforeach
					</div>			
					<div class="row upload-album">								
						<form  action="{{URL::route('upload_photo')}}" class="dropzone dz-clickable" id="upload-my-album" method="POST">
						</form>								
					</div>									
				</div>
				<div class="modal-footer" style="text-align:center;">
					<button onclick="loadMyAlbum()" type="button" class="btn btn-primary btn-responsive btn-my-photo" style="display:none;" >My Photo</button>
					<button onclick="uploadMyAlbum()" type="button" class="btn btn-primary btn-responsive btn-upload-album" >Tải ảnh lên</button>
		      		<button type="button" onclick="reloadEdit()" data-dismiss="modal" class="btn btn-primary btn-responsive" >Đóng</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end upload album -->

<!-- edit url -->
	<div class="modal fade" id="change-url-user">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Thay đổi URL</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 in-url">
							<a class="link-url" href="" target="_blank"></a>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<input onkeyup="checkUrlEdit()" type="text" name="url-user" id="url-user" class="form-control" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 in-url">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<p class="text-center infor-check-url"></p>
						</div>						
					</div>
				</div>
				<div class="modal-footer remove-border" style="text-align:center;">
		      		<button onclick="updateUrlEdit()" type="button" data-dismiss="modal" class="btn btn-primary" >Cập nhật</button>
		      		<button  type="button" data-dismiss="modal" class="btn btn-primary" >Thoát</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
<!-- end edit url-->

<script type="text/javascript" src="{{Asset('assets/js/design_color_font.js')}}"></script>

<script type="text/javascript">
 	// remove image when upload other
 	function opacity(){
 		$('.dz-message').css('opacity',0);
 	};

	// load URL into modal
	function loadURL(){
		$.ajax({
			type:"post",
			url:"{{URL::route('load_url')}}",
			success:function(data){
				$('.infor-check-url').text("");
				$('#url-user').val(data.url);
				$('.link-url').attr('href','thuna.vn/website/'+data.url);
				$('.link-url').text('http://thuna.vn/website/');
			}
		});	
	};

	function checkUrlEdit(){
		var url = $('#url-user').val();
		$.ajax({
			type:"post",
			url:"{{URL::route('check_url_step')}}",
			data:{url:url},
			success:function(data){
				$('.infor-check-url').text(data.msg);
				$('.infor-check-url').css('color',data.color);
			}
		});	
	};
	function updateUrlEdit(){
		var url = $('#url-user').val();
		$.ajax({
			type:"post",
			url:"{{URL::route('create_url_step')}}",
			data:{url:url},
			success:function(data){
				
			}
		});	
	};
	// upload uploadMyAlbum in edit
	function loadMyAlbum(){
		$('.grid-album').show();
		$('.upload-album').hide();
		$('.btn-upload-album').show();
		$('.btn-my-photo').hide();
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
	function uploadMyAlbum(){
		// $('#upload-my-album').toggle('click');
		$('.btn-upload-album').hide();
		$('.btn-my-photo').show();
		$('.upload-album').show();
		$('.grid-album').hide();
	};
	function reloadEdit(){
		window.location.href = "{{URL::route('template-website',array($id_tmp))}}";
	};

	// delete image in album
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
	// update infor bride
	function editInforBride(){
		$.ajax({
			type:"post",
			url: "{{URL::route('load_infor_bride')}}",
			success: function(data){
					$('#name-bride-load').val(data.name_bride);
					$('#about-bride-load').val(data.about_bride);
			}
		});
	}
	function updateInforBride(){
		var name_bride = $('#name-bride-load').val();
		var about_bride = $('#about-bride-load').val();
		$.ajax({
			type:"post",
			url: "{{URL::route('update_infor_bride')}}",
			data:{ name_bride:name_bride, about_bride:about_bride},
			success: function(data){
					$('.name-bride').text(data.name_bride);
					$('.about-bride').text(data.about_bride);
			}
		});
	}
	// end  update infor bride

	// update infor groom
	function editInforGroom(){
		$.ajax({
			type:"post",
			url: "{{URL::route('load_infor_groom')}}",
			success: function(data){
					$('#name-groom-load').val(data.name_groom);
					$('#about-groom-load').val(data.about_groom);
			}
		});
	}
	function updateInforGroom(){
		var name_groom = $('#name-groom-load').val();
		var about_groom = $('#about-groom-load').val();
		$.ajax({
			type:"post",
			url: "{{URL::route('update_infor_groom')}}",
			data:{ name_groom:name_groom, about_groom:about_groom},
			success: function(data){
					$('.name-groom').text(data.name_groom);
					$('.about-groom').text(data.about_groom);
			}
		});
	}
	//end update infor groom

	// upload bg in edit
	function loadBgEdit(){
		$('.dz-preview').remove();
		$('.dz-message').css('opacity',1);
		window.location.href = "{{URL::route('template-website',array($id_tmp))}}";
	}

	// upload-image-tab
	function send_id(id_tab,check_vc){
		 $('#check-tab').val(id_tab);
		 $('#check-vc').val(check_vc);
	};
	function load_photo_tab(){
		var check_tab = $('#check-tab').val();	
		var check_vc = $('#check-vc').val();	
		$.ajax({
			type:"post",
			data:{ check_tab : check_tab, check_vc: check_vc },
			url: "{{URL::route('load_avatar')}}", 
			success: function(data){
				$('.dz-preview').remove();
				$('.dz-message').css('opacity',1);
				if (check_tab == 0) {
					if (check_vc == 111) {
						$("#prev_outputcc111 a").html("<img style='width: 350px;height: 350px;' class='img-responsive img-circle' src='"+data.image+"' />");
						$("#prev_output111 a").html("<img class='img-responsive' src='"+data.image+"' />");
						$("#prev_output_theme9_b a").html("<img 'width:100% class='img-responsive' src='"+data.image+"' />");
						$("#prev_output_theme12_b a").html("<img  class='img-circle' src='"+data.image+"' />");
						$("#prev_output_theme16_b a").html("<img  class='img-responsive img-infor ' src='"+data.image+"' />");
						$("#prev_output_theme19_b a").html("<img  class='img-responsive img-infor img-circle' src='"+data.image+"' />");
						$("#prev_output_theme21_b a").html("<img  class='img-bride img-circle' src='"+data.image+"' />");
					} else{
						$("#prev_outputcc222 a").html("<img style='width: 350px;height: 350px;' class='img-responsive img-circle' src='"+data.image+"' />");
						$("#prev_output222 a").html("<img class='img-responsive' src='"+data.image+"' />");
						$("#prev_output_theme9_g a").html("<img 'width:100% class='img-responsive' src='"+data.image+"' />");
						$("#prev_output_theme12_g a").html("<img  class='img-circle' src='"+data.image+"' />");
						$("#prev_output_theme16_g a").html("<img  class='img-responsive img-infor' src='"+data.image+"' />");
						$("#prev_output_theme19_g a").html("<img  class='img-responsive img-infor img-circle' src='"+data.image+"' />");
						$("#prev_output_theme21_g a").html("<img  class='img-groom img-circle' src='"+data.image+"' />");
					};
				} else{
					$("#prev_output"+check_tab+" a").html("<img style='width:100%; height:100%;' class='img-responsive' src='"+data.image+"' />");
					$("#prev_output_themes21"+check_tab+" a").html("<img class='tab-text-img' src='"+data.image+"' />");
					$("#prev_output_theme4"+check_tab+" a").html("<img style='width: 350px;height: 350px;' class='img-responsive img-circle' src='"+data.image+"' />");
				};
									 
			}
		});
	};
	// upload title
	function sendTitle(id_title, visiable){
		var visiable = visiable;
		$('#get-id-title').next().val(id_title);
		$('#sh-title').val("");
		$('#sh-title').removeAttr('checked');
		$.ajax({
			type:"post",
			url: "{{URL::route('load_title')}}",
			data: { id_tab : id_title},
			success: function(data){
				$('#get-id-title').val(data.title);
			}
		});
	};
	function updateTitle(){
		var id_title = $('#get-id-title').next().val();
		var title = $('#get-id-title').val();
		$('input[name="sh-title"]').each(function(){
			if (this.checked==true) {
				$(this).val("1");
			};
		});
		var ck_visiable = $('#sh-title').val();
		$.ajax({
			type:"post",
			url: "{{URL::route('update_title')}}",
			data: { id_tab : id_title, ck_visiable :ck_visiable, title: title },
			success: function(data){
				if (data.ck == 1) {
					$('.menu-id'+id_title+'> a').text(data.title);
					$('.r-title'+id_title).hide();
					$('.menu-id'+id_title).hide();
					$('#nameTitle'+id_title).text(data.title);
					$('#get-id-hide-tab').append('<option value="'+id_title+'">'+data.title+'</option');
				} else{
					$('.r-title'+id_title).show();
					$('.menu-id'+id_title).show();
					$('.menu-id'+id_title+ '> a').text(data.title);
					$('#nameTitle'+id_title).text(data.title);
				};

			}
		});
	};

</script>
@endsection