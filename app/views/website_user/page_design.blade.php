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
												<div class="col-xs-6 col-md-3 menu-image" >
													<div class="menu-tab-modal">
														<ul class="nav nav-pills nav-stacked" id="#my-menu-tab">
															<li><a style="text-align:center"data-toggle="tab" href="#tab-modal-1">Upload Ảnh</a></li>
															<li class="active"><a style="text-align:center" data-toggle="tab" href="#tab-modal-2">Ảnh Của Tôi</a></li>
														</ul>
													</div>
												</div>
												<div class="col-xs-12 col-md-9 tab-image">
													<div class="tab-content ">
														<div></div>
														<div class="tab-pane " id="tab-modal-1">
																<div class="upload-image-tab">
																		
																		<form action="{{URL::route('upload')}}" method="POST" role="form" accept-charset="UTF-8" enctype="multipart/form-data" >
																																		
																																			<br>
																			<br>
																			<br>
																			<br>
																			<br>
																			
																			<div class="form-group">
																				<a onclick="chose_image()" id="chose_image" ><span class="glyphicon glyphicon-picture"></span>Chọn ảnh từ máy tính của bạn</a><br><br><br>
																				<input id="input-image-modal" name="input-image-modal"  type="file" class="file" >
																			</div>
																			<div class="form-group">
																				<button type="submit" style="float:right"class="btn btn-primary">Upload</button> 
																			</div>
																			<br>
																			<br>
																															
																																																																																							
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
			  			<span class="span_design_item">Nội dung:
			  					<select name="font_website" onchange="font_website(this.value);" class="select_design1">
  									@foreach($arFont as $font_name)
			  							<option value="{{$font_name}}">{{$font_name}}</option>
			  						@endforeach
			  					</select>
						</span><br />
			  			<span class="span_design_item">Nhấn mạnh:<select name="accent_website" class="select_design2">
						  							<option value="">Style 1</option>
						  							<option value="">Style 2</option>
						  							<option value="">Style 3</option>
						  						</select>
						</span>
			  			<hr>
			  			<span class="span_design_item">Màu: <a href="javascript:;" onclick="reset_color();" >Khôi phục mặc định</a></span><br />

			  			@for($i=1;$i<=3;$i++)
				  			@if( !empty(WebsiteController::returnColor($i)) )
					  			<span class="span_design_item">Màu {{$i}}: <input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design"></span><br />
					  		@else
					  			<span class="span_design_item">Màu {{$i}}: <input type="text" name="color" value="" onchange="color_design{{$i}}(this.value);" class="color color_design"></span><br />
					  		@endif
				  		@endfor
			  			
			  		</div>
			  		
			  	</div>
			  	<div class="tab-pane" id="design_page">
			  		<table class="website_tabs">
						@foreach(Tab::get() as $tab)
							<tr class="odd">
								<td><input type="text" size="2" value="1" class="website_tabs_input" ></td>
								<td><input type="text" hidden id="tab{{$tab->id}}" value="{{$tab->id}}">{{$tab->title}}</td>
								<td><span  class="glyphicon glyphicon-cog pop{{$tab->id}} popoverThis" style="color: #19B5BC; cursor: pointer;" onclick="titleTab({{$tab->id}})" ></span></td>
							</tr>
						@endforeach
					</table>
			  	</div>
			  	<div class="tab-pane" id="design_setup">
			  	
			  	</div>
			</div>
		</div>
		
		<!-- button hide content design left -->
		<div class="col-xs-1 design_website_content_left_hide">
			<a href="javascript:;" onclick="design_website_plus_circle();" ><i class='fa fa-plus-circle fa-fw'></i></a>
		</div>
		<!-- .button -->

		<!-- content right include from view -->
		<div class="col-xs-9 design_website_content_right">
			@include('website_user.edit_page_temp')
		</div>
		<!-- .end -->

	</div>
	<!-- .row -->
	<div id="divContentHTML" class="text-align" >
      <form  class="form-horizontal" role="form" id="TitleForm" action="{{Asset('')}}" method="post">
      	<div class="form-group">
		    <label for="title" class="col-xs-5 control-label">Tiêu đề*:</label>
		    <div class="col-xs-7">
		    	<input type="text" class="form-control" name="title" id="title" placeholder="welcome" value=""> 	
	  		</div>
	  	</div>
	  	<div class="form-group">
		    <label class="col-xs-5 control-label"> Canh chỉnh:</label>
		    <div class="col-xs-7">
			    <div class="btn-group" >
				  <button type="button" class="btn btn-primary" onclick="Align('left')"><i class="glyphicon glyphicon-align-left"></i></button>
				  <button type="button" class="btn btn-primary" onclick="Align('center')"><i class="glyphicon glyphicon-align-center"></i></button>
				  <button type="button" class="btn btn-primary" onclick="Align('right')"><i class="glyphicon glyphicon-align-right"></i></button>
				  <input  type="text" id="Align-title" hidden  >
				  
				</div>
			</div>
	  	</div>
	  	<div class="form-group">
		    <label class="col-sm-6 control-label"> Ẩn khỏi trang?</label>
		    <div class="col-xs-6">
		    	<input type="checkbox" name="hideTitle" id="hideTitle">
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
			data:{font_name:font_name},
			success: function(data){
				$("h1, h2, h3").css("font-family",""+data+"");
			}
		});
	};

	// reset color
	function reset_color(){
		$.ajax({
			type:"post",
			url:"{{URL::to('reset_color')}}",
			success: function(data){
				$("input[name=color]").val('FFFFFF');
			}
		});
	}

	// get color
	function color_design1(color_design){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_color_website1')}}",
			data:{color_design:color_design},
			success: function(data){
				$("h1").css("color","#"+data+"");
			}
		});

	}
	function color_design2(color_design){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_color_website2')}}",
			data:{color_design:color_design},
			success: function(data){
				$("h2").css("color","#"+data+"");
			}
		});
	}
	function color_design3(color_design){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_color_website3')}}",
			data:{color_design:color_design},
			success: function(data){
				$("h4").css("color","#"+data+"");
				$("p").css("color","#"+data+"");
			}
		});
	}


	// 
	function Align(value){
		
			$("#Align-title").val(value);
	}
	
	function titleTab(id){
		var validator = $( "#TitleForm" ).validate();
		$.ajax({
			type: "post",
			url:"{{URL::route('get-id-tab')}}",
			data:{id: $("#tab"+id).val()},
			success:function(result){
				$('#title').val(result['title']),
				$('#hideTitle').replaceWith(result['visiable'])
			}
		});
		
	      //popover option
	      $(".pop"+id).popover({
	        title: 'Chỉnh sửa',
	        content: $('#divContentHTML').html(),
	        placement: 'right',
	        html: true
	      });
	      $(".pop"+id).click(function (e) {
					e.stopPropagation();
				});
			$(document).click(function (e) {
				if (($('.popover').has(e.target).length == 0) || $(e.target).is('.close')) {
					$(".pop"+id).popover('hide');
				}
			});
	   
	}

</script>

@endsection