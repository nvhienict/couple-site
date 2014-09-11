@extends('main_website')
@section('title')
{{$firstname}}'s Website cưới - http://thuna.vn
@endsection

@section('content')
<body class="bodyScroll">
	<div class="row design_website_heading">
		<div class="col-xs-1">
			<a href="{{URL::route('index')}}" class="thuna" >Thuna.vn</a>
		</div>
		<div class="col-xs-8"></div>
		<div class="col-xs-2">
			<a href="#" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
		</div>
		<div class="col-xs-1">
			<a href="{{Asset('website')}}" class="thuna2" ><i class="glyphicon glyphicon-log-out"></i></a>
		</div>
	</div>
	<!-- .heading -->

	<div class="row">

		<div class="col-xs-3 design_website_content_left">
			<div class="minus-plus">
				<a href="javascript:;" onclick="design_website_minus_circle();"><i class='fa fa-minus-circle fa-fw'></i></a>
			</div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  	<li class="active"><a href="#page_design_home" role="tab" data-toggle="tab">Thiết kế</a></li>
			  	<li><a href="#design_page" role="tab" data-toggle="tab">Trang Web</a></li>
			  	<li><a href="#design_setup" role="tab" data-toggle="tab">Cài đặt</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content" style="padding: 5px;">
			  	<div class="tab-pane active" id="page_design_home" >
			  		<p>Website được design bởi <a href="http://thuna.vn">thuna.vn</a> </p>
			  		<p>
			  			<a href="#">Thay đổi giao diện <i class="fa fa-chevron-right fa-fw"></i></a>
			  		</p>
			  		<div class="page_design_home_item">
			  			<span class="span_design_item">Hình nền:</span><br />
			  			<img src="{{Asset('images/website/1.png')}}">
			  			<button class="btn btn-primary" data-toggle="modal" data-target='#modal-changebackground' style="background: #19b5bc; border:none;">Đổi Ảnh Nền</button>
			  			<!-- -modal change background -->
			  				<div class="modal fade " id="modal-changebackground">
								<div class="modal-dialog modal-lg">
									<div class="modal-content ">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Chọn Ảnh Nền</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-xs-4 col-md-2 menu-image" >
													<div class="menu-tab-modal">
														<ul class="nav nav-pills nav-stacked" id="#my-menu-tab">
															<li><a style="text-align:center"data-toggle="tab" href="#tab-modal-1">Upload Ảnh</a></li>
															<li class="active"><a style="text-align:center" data-toggle="tab" href="#tab-modal-2">Ảnh Của Tôi</a></li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-md-10 tab-image">
													<div class="tab-content ">
														<div></div>
														<div class="tab-pane " id="tab-modal-1">
																<div class="upload-image-tab">
																		
																	<form action="" method="POST" role="form" accept-charset="UTF-8" enctype="multipart/form-data" >
																		
																	
																		<div class="form-group">
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			

																			<a onclick="chose_image()" id="chose_image" ><span class="glyphicon glyphicon-picture"></span>Chọn ảnh từ máy tính của bạn</a><br><br><br>
																			<input id="input-image-modal"  type="file" class="file" multiple="true">
																			<a type="submit" style="float:right"class="btn btn-primary">Upload</a>
																			<br>

																																					
																			
																		</div>
																																																			
																		
																		<script type="text/javascript">
																		
																			function chose_image()
																			{
																				 $('#input-image-modal').trigger('click');
																			};
																		</script>

																	</form>
																</div><br>

														</div>
														<div class="tab-pane active" id="tab-modal-2">
															<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
														</div>
													</div>																																					
												</div>

											</div>
											
										</div>
										
											
										
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

			  			<!-- -end modal change background -->
			  			<hr>
			  			

			  		
			  			<span class="span_design_item">Font chữ:</span><br />
			  			<span class="span_design_item">Nội dung:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="font_website" onchange="font_website(this.value);" class="select_design">
						  							<option value="Arial">Arial</option>
						  							<option value="Verdana">Verdana</option>
						  							<option value="Times New Roman">Times New Roman</option>
						  							<option value="Open Sans">Open Sans</option>
						  							<option value="Open Sans Condensed">Open Sans Condensed</option>
						  							<option value="Roboto Condensed">Roboto Condensed</option>
						  						</select>
						</span><br />
			  			<span class="span_design_item">Nhấn mạnh:&nbsp&nbsp&nbsp<select name="accent_website" class="select_design">
						  							<option value="">Style 1</option>
						  							<option value="">Style 2</option>
						  							<option value="">Style 3</option>
						  						</select>
						</span>
			  			<hr>
			  			<span class="span_design_item">Màu: <a href="#">Khôi phục mặc định</a></span><br />
			  			<span class="span_design_item">Màu 1: <input type="text" name="color1" onchange="color_design1(this.value);" class="color color_design"></span><br />
			  			<span class="span_design_item">Màu 2: <input type="text" name="color2" onchange="color_design2(this.value);" class="color color_design"></span><br />
			  			<span class="span_design_item">Màu 3: <input type="text" name="color3" onchange="color_design3(this.value);" class="color color_design"></span>
			  		</div>
			  		
			  	</div>
			  	<div class="tab-pane" id="design_page">
			  		<table class="website_tabs">
						<tr class="odd">
							<td><input type="text" size="2" value="1" class="website_tabs_input" ></td>
							<td>Welcome</td>
							<td><span  class="glyphicon glyphicon-cog pop" style="color: #19B5BC; cursor: pointer;" ></span></td>
						</tr>
						<tr class="even">
							<td><input type="text" size="2" value="2" class="website_tabs_input" ></td>
							<td>About</td>
							<td><span class="glyphicon glyphicon-cog pop" style="color: #19B5BC; cursor: pointer;" ></span></td>
						</tr>
						<tr class="odd">
							<td><input type="text" size="2" value="3" class="website_tabs_input" ></td>
							<td>Sự kiện cưới</td>
							<td><span class="glyphicon glyphicon-cog pop" style="color: #19B5BC; cursor: pointer;" ></span></td>
						</tr>
						<tr class="even">
							<td><input type="text" size="2" value="4" class="website_tabs_input" ></td>
							<td>Du lịch</td>
							<td><span class="glyphicon glyphicon-cog" style="color: #19B5BC; cursor: pointer;" ></span></td>
						</tr>
						<tr class="odd">
							<td><input type="text" size="2" value="5" class="website_tabs_input" ></td>
							<td>Đăng ký</td>
							<td><span class="glyphicon glyphicon-cog" style="color: #19B5BC; cursor: pointer;" ></span></td>
						</tr>
						<tr class="even">
							<td><input type="text" size="2" value="6" class="website_tabs_input" ></td>
							<td>Album ảnh</td>
							<td><span class="glyphicon glyphicon-cog" style="color: #19B5BC; cursor: pointer;" ></span></td>
						</tr>
						<tr class="odd">
							<td><input type="text" size="2" value="7" class="website_tabs_input" ></td>
							<td>Liên lạc</td>
							<td><span class="glyphicon glyphicon-cog" style="color: #19B5BC; cursor: pointer;" ></span></td>
						</tr>
						<tr class="even">
							<td><input type="text" size="2" value="8" class="website_tabs_input" ></td>
							<td>Lời chúc</td>
							<td><span class="glyphicon glyphicon-cog" style="color: #19B5BC; cursor: pointer;"></span></td>
						</tr>
					</table>
			  	</div>
			  	<div class="tab-pane" id="design_setup">
			  	
			  	</div>
			</div>
		</div>
		
		<div class="col-xs-1 design_website_content_left_hide">
			<a href="javascript:;" onclick="design_website_plus_circle();" ><i class='fa fa-plus-circle fa-fw'></i></a>
		</div>
		<div class="col-xs-9 design_website_content_right">
			<!-- <iframe src="{{URL::route('edit_page_temp')}}" frameborder="0" class="col-xs-12" ></iframe> -->
			@include('website_user.edit_page_temp')
		</div>

	</div>
	<!-- .row -->
	<div id="divContentHTML" class="text-align" >
	      <form  class="form-horizontal" role="form">
	      	<div class="form-group">
			    <label for="title" class="col-xs-5 control-label">Tiêu đề*:</label>
			    <div class="col-xs-7">
			    	<input type="text" class="form-control" name="title"id="title" placeholder="welcome" value=""> 	
		  		</div>
		  	</div>
		  	<div class="form-group">
			    <label class="col-xs-5 control-label"> Canh chỉnh:</label>
			    <div class="col-xs-7">
				    <div class="btn-group">
					  <button type="button" class="btn btn-primary "><i class="glyphicon glyphicon-align-left"></i></button>
					  <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-align-center"></i></button>
					  <button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-align-right"></i></button>
					</div>
				</div>
		  	</div>
		  	<div class="form-group">
			    <label class="col-sm-6 control-label"> Ẩn khỏi trang?</label>
			    <div class="col-xs-6">
			    	<input type="checkbox" name="hideTitle">
				</div>
		  	</div>
		  	<div class="form-group">
			    <label class="col-xs-5 control-label"><a href="#"> Xoá trang</a></label>
			    <div class="col-xs-7">
			    	<button>Lưu thay đổi</button>
				</div>
		  	</div>
	      </form>
		</div>

<script type="text/javascript">
	function design_website_minus_circle(){
		$('div.design_website_content_left').hide();
		$('div.design_website_content_right').removeClass('col-xs-9 design_website_content_right').addClass('col-xs-11 design_website_content_right');
		$('div.design_website_content_left_hide').show();
	};
	function design_website_plus_circle(){
		$('div.design_website_content_left').show();
		$('div.design_website_content_right').removeClass('col-xs-12 design_website_content_right').addClass('col-xs-9 design_website_content_right');
		$('div.design_website_content_left_hide').hide();
	};

	// get font design
	function font_website(font_name){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_font_website')}}",
			data:{font_name:font_name}
		});
	};

	// get color
	function color_design1(color_design){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_color_website')}}",
			data:{color_design:color_design}
		});
	}
	function color_design2(color_design){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_color_website')}}",
			data:{color_design:color_design}
		});
	}
	function color_design3(color_design){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_color_website')}}",
			data:{color_design:color_design}
		});
	}


	// 
	$(function () {
      //popover option
      $(".pop").popover({
        title: 'Chỉnh sửa',
        content: $('#divContentHTML').html(),
        placement: 'right',
        html: true
      });
    });

</script>

@endsection