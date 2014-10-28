@extends('main_website')
@section('title')
{{$firstname}}'s Website cưới - http://thuna.vn
@endsection
@section('content')
<body style="overflow:hidden;">

	<div class="row design_website_heading">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">			
			<a href="{{URL::route('index')}}" class="thuna" >Thuna.vn</a>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col-md-offset-8">			
			
			@if($id_tmp==1)
				<a href="{{URL::route('view-previous', array('id'=>$id_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
			@endif

			@if($id_tmp==2)
				<a href="{{URL::route('view-previous', array('id'=>$id_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
			@endif

			@if($id_tmp==3)
				<a href="{{URL::route('view-previous', array('id'=>$id_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
			@endif

			@if($id_tmp==5)
				<a href="{{URL::route('view-previous', array('id'=>$id_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
			@endif
			@if($id_tmp==6)
				<a href="{{URL::route('view-previous', array('id'=>$id_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
			@endif
			
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			<a href="{{Asset('website')}}" class="thuna2" ><i class="glyphicon glyphicon-log-out"></i></a>
		</div>
	</div>
	<!-- .heading -->


	<div class="row">

		<div class="col-xs-12 col-sm-3 col-lg-3 col-md-3 design_website_content_left">
			<div class="minus-plus">
				<a href="javascript:;" onclick="design_website_minus_circle();"><i class='fa fa-minus-circle fa-fw'></i></a>
			</div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
			  	<li ><a href="#page_design_home" role="tab" data-toggle="tab">Thiết kế</a></li>
			  	<li class="active"><a href="#design_page" role="tab" data-toggle="tab">Trang Web</a></li>
			  	<li><a href="#design_setup" role="tab" data-toggle="tab">Cài đặt</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content" style="padding: 5px;">
			  	<div class="tab-pane" id="page_design_home" >
			  		<span>Website được design bởi <a href="http://thuna.vn">thuna.vn</a> </span>
			  		<p>
			  			<a href="{{Asset('change_temp')}}">Thay đổi giao diện <i class="fa fa-chevron-right fa-fw"></i></a>
			  		</p>
			  		<div class="page_design_home_item">
			  			<span class="span_design_item">Hình nền:</span><br />
			  			
			  				<img src="{{Asset("{$backgrounds}")}}">
						
			  			<button class="btn btn-primary" data-toggle="modal" data-target='#modal-changebackground' style="background: #19b5bc; border:none;">Đổi Ảnh Nền</button>

			  			<hr>
						<span class="span_design_item">Ngày tổ chức tiệc cưới</span><br />
						<span class="span_design_item">
			  				<input class="form-control" type="text" name="count_down" id="count_down" value="{{WebsiteController::getCountDown()}}">
			  				<script type="text/javascript">
			  					$("input[name=count_down]").bind("mousewheel", function() {
							        return false;
							    });
			  				</script>
			  				<script type="text/javascript">
			  					
			  					jQuery('#count_down').datetimepicker({
									lang:'en',
									i18n:{
									en:{
										months:[
										    'January','February','March','April',
										    'May','June','July','August',
										    'September','October','November','December',
										   ],
										dayOfWeek:[
										    "Su", "Mo", "Tu", "We", 
										    "Th", "Fr", "Sa",
										   ]
										}
									},
									timepicker:false,
									format:'d-m-Y'
								});

								$('#count_down').change(function(){
									var data_input=$(this).val();
									$.ajax({
										type:"post",
										url:"{{URL::route('time_count_down')}}",
										data:{data_input:data_input},
										success:function(data){
											location.reload();

										}
									});
								});

				            </script>
						</span>

			  			<hr>
			  			
			  			<span class="span_design_item">Font chữ:</span><br />
			  			<span class="span_design_item">
			  					<select class="form-control" name="font_website" onchange="font_website(this.value);" class="select_design1">
  									@foreach( $website as $item_website )
	  									@foreach($arFont as $font_name)
	  										@if( ($item_website->font)==($font_name) )
	  											<?php $str='selected="selected"'; ?>
	  										@else
	  											<?php $str=''; ?>
	  										@endif
				  							<option <?php echo $str?> value="{{$font_name}}">{{$font_name}}</option>
				  						@endforeach
			  						@endforeach
			  					</select>
						</span><br />
			  			<!-- <span class="span_design_item">Nhấn mạnh:
			  				<select class="form-control" name="accent_website" onchange="style_website(this.value);" class="select_design2">
  							@for($i=1;$i<=3;$i++)
  								<option value="{{$i}}">Style {{$i}}</option>
  							@endfor
  						</select>
						</span> -->
			  			<hr>
			  			<span class="span_design_item">Màu: <a href="javascript:;" onclick="reset_color();" >Khôi phục mặc định</a></span><br />

			  			@for($i=1;$i<=3;$i++)
				  			@if((WebsiteController::returnColor($i)) )

									@if( $i==1 )
										<span class="span_design_item">Màu {{$i}}: <span style="color: #4B8DF9">Tiêu đề Website</span>
							  				<input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design form-control">
							  			</span><br />
									@endif

									@if( $i==2 )
										<span class="span_design_item">Màu {{$i}}: <span style="color: #4B8DF9">Tiêu đề các thành phần</span>
							  				<input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design form-control">
							  			</span><br />
									@endif

									@if( $i==3 )
										<span class="span_design_item">Màu {{$i}}: <span style="color: #4B8DF9">Tiêu đề nội dung</span>
							  				<input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design form-control">
							  			</span><br />
									@endif

					  			
					  		@else
					  			@if( $i==1 )
									<span class="span_design_item">Màu {{$i}}: <span style="color: #4B8DF9">Tiêu đề Website</span>
						  				<input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design form-control">
						  			</span><br />
								@endif

								@if( $i==2 )
									<span class="span_design_item">Màu {{$i}}: <span style="color: #4B8DF9">Tiêu đề các thành phần</span>
						  				<input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design form-control">
						  			</span><br />
								@endif

								@if( $i==3 )
									<span class="span_design_item">Màu {{$i}}: <span style="color: #4B8DF9">Tiêu đề nội dung</span>
						  				<input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design form-control">
						  			</span><br />
								@endif

					  		@endif
				  		@endfor
			  			
			  		</div>
			  		
			  	</div>
			  	<div class="tab-pane active" id="design_page">
			  		<table class="table sorted_table"  >
			  			<tbody id="tableSort">
			  				<input name="idweb" hidden value="{{$id_web}}">
						@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tab)
							<tr class="odd" id="{{$tab->id}}" >
								<td><input type="text" size="2" value="{{$tab->sort}}" onchange= "changeSort({{$tab->id}})" class="website_tabs_input" name="{{$tab->id}}Sort" id="{{$tab->id}}Sort" ></td>
								<td><a style="text-decoration: none;" class="TT{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" onclick="tab_click({{$tab->id}});" >{{$tab->title}}</a></td>
								<td><input type="text" hidden="hidden" id="tab{{$tab->id}}" value="{{$tab->id}}"><span  class="glyphicon glyphicon-cog pop{{$tab->id}} popoverThis" style="color: #19B5BC; cursor: pointer;" onclick="titleTab({{$tab->id}})" ></span></td>
							</tr>
							<script type="text/javascript">
								$(function () {
									 $(".pop{{$tab->id}}").popover({
								        title: 'Chỉnh sửa',
								        content: $('#divContentHTML').html(),
								        placement: 'right',
								        html: true
								      });
								});
		
								$('body').on('click', function (e) {
							        $('.pop{{$tab->id}}').each(function () {
							          if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
							            $(this).popover('hide');
							          }
							        });
							      });

								function tab_click(tab_id){
									$('li a.'+tab_id).click();
								}
							</script>
						@endforeach
						</tbody>
					</table>
					<div>
						<a class="btn btn-primary"  href="#" data-toggle="modal" data-target="#addpage">Thêm chủ đề mới</a>
						<div class="modal fade " tabindex="-1" role="dialog" id="addpage" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
							    <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							        <h4 class="modal-title">Thêm chủ đề</h4>
							    </div>
							    <div class="modal-body">
							        <div class="row">
							        	@foreach(Tab::get() as $index=>$tab)
								        	@if($index < 4)
								        	<div class="col-xs-6">
								        		@if(in_array($tab->type,$typeTab) )
								        			<input type="checkbox" name="Topic{{$tab->id}}" id="Topic{{$tab->id}}" onclick="topic({{$tab->id}})" value="{{$tab->type}}" checked >{{$tab->title}}</input><br>
								        		@else
								        			<input type="checkbox" name="Topic{{$tab->id}}" id="Topic{{$tab->id}}" onclick="topic({{$tab->id}})" value="{{$tab->type}}">{{$tab->title}}</input><br>
								        		@endif
								        	</div>
								        	@endif
								        	@if($index >= 4)
								        	<div class="col-xs-6">
								        		@if(in_array($tab->type,$typeTab) )
								        			<input type="checkbox" name="Topic{{$tab->id}}" id="Topic{{$tab->id}}" onclick="topic({{$tab->id}})" value="{{$tab->type}}" checked >{{$tab->title}}</input><br>
								        		@else
								        			<input type="checkbox" name="Topic{{$tab->id}}" id="Topic{{$tab->id}}" onclick="topic({{$tab->id}})" value="{{$tab->type}}">{{$tab->title}}</input><br>
								        		@endif
								        	</div>
								        	@endif
							        	@endforeach
							        </div>
							    </div>
							    <div class="modal-footer">
							        
							        <a  class="btn btn-primary"  onclick ="submitTopic()">Thêm </a>
							    </div>
						    </div>
						  </div>
						</div>
					</div>
			  	</div>
			  	<div class="tab-pane" id="design_setup">
		  		@foreach( $website as $item_website )
			  		<div class="url">
			  			<div class=" header_url">Website URL<span style="color:#2A64B9;"><i  class='fa fa-info-circle fa-fw'></i></span>
			  			</div>
			  			<div class="url_link">
			  				
			  				<a style="text-decoration: none;color:##2A64B9;" target="_blank" class="a_url" href="{{URL::route('url_website',array('url'=>$item_website->url))}}">				
			  					http://www.thuna.vn/website/{{$item_website->url}}	  					
			  				</a>
			  				
			  			</div>
			  			
			  			<div class="edit_url">
			  				<span class="change_url "><a onclick="load_url()" data-backdrop="static" data-toggle="modal" data-target="#modal-url" style="text-decoration: none;color:##2A64B9;" href="javascript:;">Thay đổi URL»</a></span>
			  				<span class="share_url"><a style="text-decoration: none;color:##2A64B9;" href="">Chia sẻ URL»</a></span>
			  			</div>
			  		</div>
			  	@endforeach
			  	
			  	</div>
			</div>
		</div>
		<!-- . left -->
		
		<!-- button hide content design left -->
		<div class="col-xs-12 col-sm-1 col-lg-1 col-md-1 design_website_content_left_hide">
			<a href="javascript:;" onclick="design_website_plus_circle();" ><i class='fa fa-plus-circle fa-fw'></i></a>
		</div>
		<!-- .button -->

		<!-- content right include from view -->
		<div class="col-xs-12 col-sm-9 col-lg-9 col-md-9 design_website_content_right">
			
			@if($id_tmp==2)
					@include('website_user.themes2.edit.index')
			@else
					@if($id_tmp==1)
						@include('website_user.themes.edit.index')
					@endif

					@if($id_tmp==3)
						@include('website_user.themes3.edit.index')
					@endif

					@if($id_tmp==6)
						@include('website_user.themes6.edit.index')
					@endif

					@if($id_tmp==5)
						@include('website_user.themes5.edit.index')
					@endif

			@endif
			

		</div>
		<!-- .end -->

	</div>
	<!-- .row -->
	<div id="divContentHTML" class="text-align" >
     
      	<div class="form-group row">
		    <label for="title" class="col-xs-5 control-label">Tiêu đề*:</label>
		    <div class="col-xs-7">
		    	<input type="text" class="form-control" name="title" id="title" placeholder="welcome" value="">
		    	<input type="text" name="id_title" hidden id="id_title"   value=""> 
		    	<input type="text" name="id_type" hidden id="id_type"   value=""> 	
	  		</div>
	  	</div>
	  	<div class="form-group row">
		    <label class="col-xs-5 control-label"> Canh chỉnh:</label>
		    <div class="col-xs-7">
			    <div class="btn-group" >
				  <button type="button" class="btn btn-primary" id="btleft" onclick="Align('left')"><i class="glyphicon glyphicon-align-left"></i></button>
				  <button type="button" class="btn btn-primary" id="btcenten" onclick="Align('center')"><i class="glyphicon glyphicon-align-center"></i></button>
				  <button type="button" class="btn btn-primary" id="btright" onclick="Align('right')"><i class="glyphicon glyphicon-align-right"></i></button>
				  <input  type="text" id="Align_title" hidden name="Align_title" >
				  
				</div>
			</div>
	  	</div>
	  	<div class="form-group row">
		    <label class="col-sm-6 control-label"> Ẩn khỏi trang?</label>
		    <div class="col-xs-6">
		    	<input type="checkbox" name="hideTitle" id="hideTitle">
			</div>
	  	</div>
	  	<div class="form-group row">
		    <label class="col-xs-5 control-label"><a href="#" onclick="deleteTab();"> Xoá trang</a></label>
		    <div class="col-xs-7">
		    	<a class="btn btn-primary"  href="javascript:;" onclick="submit_title();" >Lưu thay đổi</a>
			</div>
	  	</div>
      
	</div>




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
					<div class="col-xs-6 col-md-2 menu-image" >
						
						<a style="text-align:center" href="javascript:void(0);">Upload Ảnh</a></li>
					</div>
					<div class="col-xs-12 col-md-10 tab-image">
						<br>
							<div class="tab-pane " id="tab-modal-1">
									<div class="upload-image-tab">
											
											<form action="{{URL::route('upload')}}" method="POST" role="form" accept-charset="UTF-8" enctype="multipart/form-data" >																																		
												<br>
												<br>
												<br>
												<br>
												
												<div class="form-group">
													<div class="text-center "><img id="image-preview-website" ></div>
													<div class="text-center"><a onclick="chose_image_backgound()" style="cursor:pointer;" id="chose_image_background" ><span class="glyphicon glyphicon-picture"></span>Chọn ảnh từ máy tính của bạn</a><br><br><br></div>
													<input id="input_image_modal" name="input_image_modal"  type="file" class="file" accept="image/*" required>
												</div>
												<div class="form-group">
													<button type="submit" style="float:right"class="btn btn-primary">Upload</button> 
												</div>
												<br>
												<br>
																								
																																																																																
											<script type="text/javascript">
											
												function chose_image_backgound()
												{
													 $('#input_image_modal').trigger('click');
												};
												
												 function readURL(input) {
													        if (input.files && input.files[0]) {
													            var reader = new FileReader();
													            
													            reader.onload = function (e) {
													                $('#image-preview-website').attr('src', e.target.result);
													            }
													            
													            reader.readAsDataURL(input.files[0]);
													        }
													    }
													     $("#input_image_modal").change(function(){
													     	 var fileName = $("#input_image_modal").val().toLowerCase();
															    if(fileName.lastIndexOf("png")===fileName.length-3 | fileName.lastIndexOf("jpeg")===fileName.length-3 |fileName.lastIndexOf("gif")===fileName.length-3|fileName.lastIndexOf("jpg")===fileName.length-3)
															        readURL(this);
															    else
															    {
															    	$("#input_image_modal").val("");
															    	$("#image-preview-website").removeAttr('src');
															    	swal("Vui lòng chọn đúng định dạng file Ảnh!");																		        	
															    	
															    }																				    	
														        																				        	
														    });																																								
											</script>

										</form>
									</div><br>

							</div>
							
																																									
					</div>

				</div>
				
			</div>
			
				
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- -end modal change background -->



<!-- Change URL -->

<div class="modal fade" id="modal-url">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" >
        <button onclick="remove_error()" style="color:red;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title">Website URL</h3>
      </div>
      <div class="modal-body">
        <h4>Thay đổi URL Website :</h4>
        <div class="col-xs-12">
        	<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 " style="padding-left:0px;">
	        	<h4 style="color:#3276B1; font-size:16px;">http://www.thuna.vn/website/</h4>
	        </div>
	        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7" style="padding-left:0px;">
	        	@foreach($website as $website)
	        	<input type="text" class="form-control url_website " name="url_website" value="{{$website->url}}">
	        	@endforeach()
        	</div>        	
        </div>
        <h4 class="url_error"></h4>
        
      </div>
      <div class="modal-footer" style="text-align:center;margin-top:100px;">
      	<button onclick="save_url()" type="button" class="btn btn-primary" >Save</button>
        <button onclick="remove_error()" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade " id="modal-up_images">
	<div class="modal-dialog modal-lg">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chọn Ảnh</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6 col-md-2 menu-image" >
						
								<a class="upload" style="text-align:center;text-decoration: none;" href="javascript:void(0);">Upload Ảnh</a><br>
								<a  class="text-center myalbum" style="text-decoration: none;" href="javascript:;">My Album</a>
					</div>
					<div class="col-xs-12 col-md-10 tab-image">
						<script type="text/javascript">
								function add_images(){
									$('.gird_ablum').hide();
									$('.delete_images').hide();
									$('.upload-image-tab').show();
								}
								$('.myalbum').click(function(){
									$('.gird_ablum').show();
									$('.delete_images').show();
									$('.upload-image-tab').hide();
								});
								$('.upload').click(function(){
									$('.gird_ablum').hide();
									$('.delete_images').hide();
									$('.upload-image-tab').show();
								});
								function del_album(){
									var id_array=new Array() ;
									var i=0;
									$('input[name="images_del"]'). each(function(){
										if (this.checked==true) 
										{
											id_array[i]=$(this).next().val();
											i++;
										};
									});
									$.ajax({
												type:"post",
												url:"{{URL::route('del_album')}}",
												data:{
													id_images:id_array
												},
												success:function(data){
													for (var i = 0; i < id_array.length; i++) {
														$('.remove_image'+id_array[i]).remove();
													};		
												}
											});																		
								}

						</script>
						<br>
							<div class="tab-pane " id="tab-modal-image_album">
									<div class="col-xs-12 gird_ablum">
										<?php $images=PhotoTab::where('user',WebsiteController::id_user())->get(); ?>
										@foreach($images as $images)
											<div style="padding-left: 1px;padding-right:1px;" class="col-xs-2 padding_album text-center remove_image{{$images->id}}">
												<a href="javascript:;">
													<img class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
												</a>
												<input class="images_del{{$images->id}}" name="images_del" type="checkbox" value="">
												<input type="hidden" value="{{$images->id}}">
											</div>
										@endforeach
									</div>

									<div class="delete_images"> 
										<button onclick="del_album()" class="btn btn-primary">Xóa</button>
										<button onclick=" add_images()" class="btn btn-primary">Thêm</button>
									</div>
									<div class="upload-image-tab">
											
											<form action="{{URL::route('up_images_album')}}" method="POST" role="form" accept-charset="UTF-8" enctype="multipart/form-data" >																																		
												<br><br><br>																							
												
												<div class="form-group">
													<div class="text-center "><img id="image-preview_album" ></div>
													<div class="text-center"><a onclick="chose_image_album()" style="cursor:pointer;" id="chose_image_album" ><span class="glyphicon glyphicon-picture"></span>Chọn ảnh từ máy tính của bạn</a></div>
													<h5 style="color:red;" class="text-center message_album_image"></h5>
													<input style="display:none;" id="input_image_album" name="input_image_album[]"  multiple="true" type="file" class="file" accept="image/*" autocomplete="off" data-max-size="2097152" required>
													<input type="hidden" name="id_tab_album" id="id_tab_album" value="">
												</div>
												<div class="form-group">
													<button type="submit" style="float:right"class="btn btn-primary">Upload</button> 
												</div>
												<br><br>																																			
																																																																																
											<script type="text/javascript">
											
												function chose_image_album()
												{
													 $('#input_image_album').trigger('click');
												};
												
												$("#input_image_album").change(function(){
								                   var files = $(this)[0].files;
								                   var fileInput = $('#input_image_album');
   												   var maxSize = fileInput.data('max-size');   												   									
								                    if(files.length > 30){
								                        swal("Chỉ được upload tối đa 30 ảnh!");
								                        $("#input_image_album").val("");
								                    }
								                    else{
								                    	
								                        var fileName = $("#input_image_album").val().toLowerCase();
								                        if(fileName.lastIndexOf("png")===fileName.length-3 | fileName.lastIndexOf("jpeg")===fileName.length-3 |fileName.lastIndexOf("gif")===fileName.length-3|fileName.lastIndexOf("jpg")===fileName.length-3)
								                         {   
								                         	$.ajax({
								                                type:"POST",
								                                url:"{{URL::route('check_image_album')}}",								                                
								                                success:function(data)
								                                {
								                                    var obj=JSON.parse(data);
								                                    if(obj.check+files.length>=30)
								                                    {
								                                        $("#input_image_album").val("");
								                                        swal("Tổng số ảnh của bạn lớn 30, vui lòng chọn lại!"); 
								                                    }
								                                    else
								                                    {
								                                    	for (var j=0; j<files.length; j++) 
											                         	{		   												   
															            var fileSize = files[j].size; // in bytes
																            if(fileSize<maxSize){
																            	var str="Ảnh đã được chọn!";
								                                    			$(".message_album_image").text(str);
																                
																            }
																            else
																            {
																            	swal("Dung lượng của mỗi bức ảnh phải nhỏ hơn 2MB(mega byte), vui lòng chọn lại!"); 
																                $("#input_image_album").val("");
																                $(".message_album_image").text("");
																                
																            }												            												       
			        													}		
								                                    	
								                                    }

								                                }
								                            });
								                         	
								                         	
								                           } 
								                        else
								                        {
								                            $("#input_image_album").val("");                        
								                            swal("Vui lòng chọn đúng định dạng file Ảnh!");                                                                                 
								                            
								                        }                                 
								                    }                                               
													    																		    	
									       																				        	
												});
													     
											     function send_id_album(id){
													// var id_tab=$('#id_tab_web'+id).val();
														$('input[name=id_tab_album]').val(id);
														
														
													
												};						
																																																
											</script>

										</form>
									</div><br>

							</div>
							
																																									
					</div>

				</div>
				
			</div>
			
				
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- upload ajax -->
<script src="{{Asset("assets/js/jquery-ajax-upload-images.js")}}"></script>

<!-- upload ajax -->
	<form style="display:none;" class="form-horizontal" id="upload" action="{{ url('upload_images') }}" enctype="multipart/form-data" method="post" autocomplete="off">
	    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
	    <input type="file" name="image" id="image" /> 
	    <input type="hidden" name="id_tab" id="id_tab" value="" />
	</form>
<!-- end upload ajax -->


<script type="text/javascript" src="{{Asset('assets/js/design_color_font.js')}}"></script>

<script type="text/javascript">
	// Save Url
	 function load_url(){
	 	$.ajax({
			type:'post',
			url:"{{URL::route('load_url')}}",
			success: function(data){
				var obj = JSON.parse(data);
				$('.url_website').val(obj.url);				
			}
		});
	 };
	function save_url(){
		$.ajax({
			type:'post',
			url:"{{URL::route('change_url')}}",
			data:{
				url_website:$('.url_website').val()
			},
			success: function(data){
				var obj = JSON.parse(data);
				$('.url_error').text(obj.error_url);
				$('.url_error').css('color',obj.color);
				
				$('.a_url').text('http://www.thuna.vn/website/'+obj.res_url);
				$('.a_url').attr("href",'http://www.thuna.vn/website/'+obj.res_url);
				$('..url_link').css('overflow','hidden').css('text-overflow','ellipsis');			 					
			}
		});
	};

	function remove_error(){
			$('.url_error').text('');
			$('.url_error').css('color','#fff');
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

	// get style design
	function style_website(style_website){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_style_website')}}",
			data:{style_website:style_website},
			success: function(data){
				
				if(style_website==1){
					$("h1, h2").css("font-family",""+data+"");
				}
				if(style_website==2){
					$("h2, h3").css("font-family",""+data+"");
				}
				if(style_website==3){
					$("h4, p").css("font-family",""+data+"");
				}
			}
		});
	}

	// reset color
	function reset_color(){
		$.ajax({
			type:"post",
			url:"{{URL::to('reset_color')}}",
			success: function(data){
				location.reload();
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
				$("#dateTime").css("color","#"+data+"");
			}
		});

	}
	function color_design2(color_design){
		$.ajax({
			type:"post",
			url:"{{URL::to('change_color_website2')}}",
			data:{color_design:color_design},
			success: function(data){
				$("h2, h3").css("color","#"+data+"");
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
				$("span[name=phara]").css("color","#"+data+"");
			}
		});
	}

	// //  thêm một chủ để mới, hoặc xoá một hoặc nhiều chủ đề cũ
	var id_tab = new Array();
	var valueTab = new Array();

	function topic(id){
		var typeTab = $('input[name=Topic'+id+']').val();
		valueTab[id]= typeTab;
		if ($('input[name=Topic'+id+']').is( ":checked" ))
		{
			id_tab[id]= "1";
		}
		else
		{
			id_tab[id] = "0";
		};
	}
	function submitTopic(){
		$.ajax({
			type: "POST",
			url: "{{URL::route('addTopic')}}",
			data:{
				id_tab: id_tab,
				valueTab: valueTab
			},
			success:function(data){
				location.reload(true);
			},
			error: function (){
                alert('Có lỗi xảy ra');
            }
		});
	}
	function deleteTab(){
		var id = $("input[name=id_title]").val();
		var type = $("input[name=id_type]").val();
		if(confirm("Bạn chắc chắn muốn xoá chủ để này này?")){
        	$.ajax({
				type: "post",
				url: "{{URL::route('delete-title')}}",
				data:{
					id: id
				},
				success: function(data){
					$("#section_"+type).remove();
					$('#Tr'+id).remove();
					$('.TT'+id).remove();
					location.reload(true);
				}
			});
			return true;
        }
        else{
            return false;
        };
	}
	function submit_title(){
		var id_title = $("input[name=id_title]").val();
		var title = $("input[name=title]").val();
		var Align_title = $("input[name=Align_title]").val();
		var id_type = $("input[name=id_type]").val();
		var hidetab = 0;
		if ($("input[name=hideTitle]").is( ":checked" )) 
			{
				hidetab = 1;
			}
			else
			{
				hidetab = 0;
			};
		$.ajax({
  			type: "post",
  			url:"{{URL::route('update-title')}}",
  			
  			data:{
	  			id_title: id_title,
	  			title: title ,
	  			Align_title: Align_title,
	  			hideTitle: hidetab
  			},
  			success:function(data){
  				// $('.TT'+id_title).text(data['title']);
  				// $('#nameTitle'+id_title).text(data['title']);
  				// $('#nameTitle'+id_title).css('text-align',data['titlestyle']);
  				// if (data['visiable'] == 1) 
  				// {
  				// 	$("#section_"+id_type).hide();
  				// }
  				// else
  				// {
  				// 	$("#section_"+id_type).show();
  				// };
  				location.reload(true);
  			}

  		});
  		
  		$(".pop"+id_title).popover('hide');
	};
	function Align(value){
		if(value == 'left')
		{
			$('#btleft').removeClass('btn btn-primary').addClass('btn btn-primary active');
			$('#btcenten').removeClass('btn btn-primary active').addClass('btn btn-primary ');
			$('#btright').removeClass('btn btn-primary active').addClass('btn btn-primary ');
		}
		else
		if(value == 'center')
		{
			$('#btcenten').removeClass('btn btn-primary').addClass('btn btn-primary active');
			$('#btleft').removeClass('btn btn-primary active').addClass('btn btn-primary ');
			$('#btright').removeClass('btn btn-primary active').addClass('btn btn-primary ');
		}
		else
		{
			$('#btright').removeClass('btn btn-primary').addClass('btn btn-primary active');
			$('#btcenten').removeClass('btn btn-primary active').addClass('btn btn-primary ');
			$('#btleft').removeClass('btn btn-primary active').addClass('btn btn-primary ');
		}
		
			$("#Align_title").val(value);
	}
	function changeSort(id){
		var position = $("#"+id+"Sort").val();
		var id_web = $('input[name=idweb]').val();
		$.ajax({
			type: "post",
			url: "{{URL::route('reSort')}}",
			data:{position: position,
				id: id,
				id_web: id_web
			},
			success: function(data){
				location.reload(true);
			}
		});
		
	}
	function titleTab(id){
		$.ajax({
			type: "post",
			url:"{{URL::route('get-id-tab')}}",
			dataType: "text",
			data:{id: $("#tab"+id).val()},
			success:function(data){
				var result = JSON.parse(data);
				$('#title').val(result['title']);
				$('#hideTitle').replaceWith(result['visiable']);
				$('#id_title').val(result['id']);
				$('#id_type').val(result['type']);
				$('#Align_title').val(result['titlestyle']);
				if(result['titlestyle'] == 'left')
					{
						$('#btleft').removeClass('btn btn-primary').addClass('btn btn-primary active');
						$('#btcenten').removeClass('btn btn-primary active').addClass('btn btn-primary ');
						$('#btright').removeClass('btn btn-primary active').addClass('btn btn-primary ');
					}
					else
					if(result['titlestyle'] == 'center')
					{
						$('#btcenten').removeClass('btn btn-primary').addClass('btn btn-primary active');
						$('#btleft').removeClass('btn btn-primary active').addClass('btn btn-primary ');
						$('#btright').removeClass('btn btn-primary active').addClass('btn btn-primary ');
					}
					else
					{
						$('#btright').removeClass('btn btn-primary').addClass('btn btn-primary active');
						$('#btcenten').removeClass('btn btn-primary active').addClass('btn btn-primary ');
						$('#btleft').removeClass('btn btn-primary active').addClass('btn btn-primary ');
					}
			}
		});
	}


	// upload images ajax

    function send_id(id_tab) {

    	$('input[name=id_tab]').val(id_tab);

        $('#image').trigger('click');

        var options = { 
            beforeSubmit: showRequest,
            success: showResponse,
            dataType: 'json' 
            }; 
        
        $('body').delegate('#image','change', function(){
            $('#upload').ajaxForm(options).submit(); 
        }); 
    }

    function showRequest(formData, jqForm, options) { 
        $("#validation-errors").hide().empty();
        $("#output").css('display','none');
        return true; 
    } 

    function showResponse(response, statusText, xhr, $form)  { 
        if(response.success == false)
        {
            var arr = response.errors;
            $.each(arr, function(index, value)
            {
                if (value.length != 0)
                {
                    // $("#validation-errors").append('<div style="color: #FB1A6B" class="alert alert-error"><strong>'+ value +'</strong><div>');
                    swal("Định dạng ảnh chưa đúng");
                }
            });
            // $("#validation-errors").show();
            return false;
        } else {
            // $("#output").html("<img src='"+response.file+"' />");

            $("#prev_output"+response.id_tab+" a").html("<img class='img-responsive' src='"+response.file+"' />");
            $("#prev_outputcc"+response.id_tab+" a").html("<img style='width: 350px;height: 350px;' class='img-responsive img-circle' src='"+response.file+"' />");

            $("#prev_output_themes3"+response.id_tab+" a").html("<img style='width: 100%;height: 100%;' class='img-responsive' src='"+response.file+"' />");
            // $("#output").css('display','block');
        }
    }

    // end upload images ajax

    $(document).ready(function(){
		$("#tableSort").sortable();
		var sortArray
	    $("#tableSort").sortable({
	        stop : function(event, ui){
	        	sortArray = $(this).sortable('toArray');
	        	$.ajax({
			  		type: "post",
					url:"{{URL::route('sortable')}}",
					dataType: "text",
					data:{newSort: sortArray},
					success:function(result){location.reload(true);}
			    });
	     	}
	     });
	    
	  $("#tableSort").disableSelection();
	});//ready
</script>
<script src="{{Asset("assets/js/jquery-ui.js")}}"></script>
@endsection

