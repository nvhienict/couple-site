@extends('main_website')
@section('title')
{{$firstname}}'s Website cưới - http://thuna.vn
@endsection

@section('content')
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
														<div class="tab-pane " id="tab-modal-1">
																<div class="upload-image-tab">
																		
																	<form action="" method="POST" role="form">
																		
																	
																		<div class="form-group">
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			
																			<a onclick="chose_image()" id="chose_image" >Chọn ảnh từ máy tính của bạn</a>
																			<input id="input-image-modal"  type="file" class="file" multiple="true">
																			
																			
																		</div>
																																																			
																		
																		<script type="text/javascript">
																		
																			function chose_image()
																			{
																				 $('#input-image-modal').trigger('click');
																			};
																		</script>

																	</form>
																</div>

														</div>
														<div class="tab-pane active" id="tab-modal-2">
														
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
			  			<span class="span_design_item">Bố trí Website:</span><br />
			  			<input type="radio" name="design_layout"  > Theo từng phần &nbsp&nbsp&nbsp&nbsp&nbsp
			  			<input type="radio" name="design_layout" > Theo trang

			  			<hr>
			  			<span class="span_design_item">Font chữ:</span><br />
			  			<span class="span_design_item">Nội dung:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<select name="font_website" class="select_design">
						  							<option value="">Arial</option>
						  							<option value="">Verdana</option>
						  							<option value="">Times New Roman</option>
						  							<option value="">Wedding</option>
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
			  			<span class="span_design_item">Màu 1: <input name="" type="color" class="color_design"></span><br />
			  			<span class="span_design_item">Màu 2: <input name="" type="color" class="color_design"></span><br />
			  			<span class="span_design_item">Màu 3: <input name="" type="color" class="color_design"></span>
			  		</div>
			  		
			  	</div>
			  	<div class="tab-pane" id="design_page">
			  		<table class="website_tabs">
						<tr class="odd">
							<td>Welcome</td>
							<td><span id="giang" class="glyphicon glyphicon-cog"></span>
							<script type="text/javascript">
								$(document).ready(function()
									{
									  $('#giang').popover(
									  {
									     trigger: 'click',
									     html: true,
									     placement: 'right',
									     content: 'hello world'
									  });
									});
							</script>
							</td>
						</tr>
						<tr class="even">
							<td>About</td>
							<td><span class="glyphicon glyphicon-cog"></span></td>
						</tr>
						<tr class="odd">
							<td>Sự kiện cưới</td>
							<td><span class="glyphicon glyphicon-cog"></span></td>
						</tr>
						<tr class="even">
							<td>Du lịch</td>
							<td><span class="glyphicon glyphicon-cog"></span></td>
						</tr>
						<tr class="odd">
							<td>Đăng ký</td>
							<td><span class="glyphicon glyphicon-cog"></span></td>
						</tr>
						<tr class="even">
							<td>Album ảnh</td>
							<td><span class="glyphicon glyphicon-cog"></span></td>
						</tr>
						<tr class="odd">
							<td>Liên lạc</td>
							<td><span class="glyphicon glyphicon-cog"></span></td>
						</tr>
						<tr class="even">
							<td>Lời chúc</td>
							<td><span class="glyphicon glyphicon-cog"></span></td>
						</tr>
					</table>
			  	</div>
			  	<div class="tab-pane" id="design_setup">
			  	setup
			  	</div>
			</div>
		</div>

		<div class="col-xs-9 design_website_content_right">
			@include('website_user/edit_page_temp')
		</div>

	</div>
	<!-- .row -->
@endsection