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

			@if($id_tmp==2)
				<a href="{{URL::route('view-previous', array('id'=>$id_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
			@endif
			@if($id_tmp==1)
				<a href="{{URL::route('view-previous', array('id'=>$id_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
			@endif
			
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
			  			

			  		
			  			<span class="span_design_item">Font chữ:</span><br />
			  			<span class="span_design_item">Nội dung:
			  					<select name="font_website" onchange="font_website(this.value);" class="select_design1">
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
			  			<span class="span_design_item">Nhấn mạnh:<select name="accent_website" onchange="style_website(this.value);" class="select_design2">
						  							@for($i=1;$i<=3;$i++)
						  								<option value="{{$i}}">Style {{$i}}</option>
						  							@endfor
						  						</select>
						</span>
			  			<hr>
			  			<span class="span_design_item">Màu: <a href="javascript:;" onclick="reset_color();" >Khôi phục mặc định</a></span><br />

			  			@for($i=1;$i<=3;$i++)
				  			@if( !empty(WebsiteController::returnColor($i)) )
					  			<span class="span_design_item">Màu {{$i}}: 
					  				<input type="text" name="color" value="#{{WebsiteController::returnColor($i)}}" onchange="color_design{{$i}}(this.value);" class="color color_design">
					  			</span><br />
					  		@else
					  			<span class="span_design_item">Màu {{$i}}: 
					  				<input type="text" name="color" value="" onchange="color_design{{$i}}(this.value);" class="color color_design">
					  			</span><br />
					  		@endif
				  		@endfor
			  			
			  		</div>
			  		
			  	</div>
			  	<div class="tab-pane active" id="design_page">
			  		<table class="website_tabs">
			  			<input type="text" hidden value="{{$id_web}}" name="idweb">
						@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tab)
							<tr class="odd" id="Tr{{$tab->id}}" >
								<td><input type="text" size="2" value="{{$tab->sort}}"  onchange= "changeSort({{$tab->id}})" class="website_tabs_input" name="{{$tab->id}}Sort" id="{{$tab->id}}Sort" ></td>
								<td id="TT{{$tab->id}}">{{$tab->title}}</td>
								<input type="text" hidden id="tab{{$tab->id}}" value="{{$tab->id}}">
								<td><span  class="glyphicon glyphicon-cog pop{{$tab->id}} popoverThis" style="color: #19B5BC; cursor: pointer;" onclick="titleTab({{$tab->id}})" ></span></td>
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
							</script>
						@endforeach
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
			
			@if($id_tmp==2)
					@include('website_user.themes2.edit.index')
			@else
					@include('website_user.themes.edit.index')
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
		    <label class="col-xs-5 control-label"><a href="#"> Xoá trang</a></label>
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
															    	alert('Vui lòng chọn đúng định dạng file Ảnh');																				        	

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

<!-- -modal change image -->
	<div class="modal fade " id="modal-changeimage">
	<div class="modal-dialog modal-lg">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chọn Ảnh</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-6 col-md-2 menu-image" >
						
								<a style="text-align:center" href="javascript:void(0);">Upload Ảnh</a></li>
					</div>
					<div class="col-xs-12 col-md-10 tab-image">
						<br>
							<div class="tab-pane " id="tab-modal-image">
									<div class="upload-image-tab">
											
											<form action="{{URL::route('change-image-tab')}}" method="POST" role="form" accept-charset="UTF-8" enctype="multipart/form-data" >																																		
												<br>
												<br>
												<br>
												<br>
												
												<div class="form-group">
													<div class="text-center "><img id="image-preview" ></div>
													<div class="text-center"><a onclick="chose_image()" style="cursor:pointer;" id="chose_image" ><span class="glyphicon glyphicon-picture"></span>Chọn ảnh từ máy tính của bạn</a><br><br><br></div>
													<input id="input_image" name="input_image"  type="file" class="file" accept="image/*" required>
													<input type="hidden" name="id_tab" id="id_tab" value="">
												</div>
												<div class="form-group">
													<button type="submit" style="float:right"class="btn btn-primary">Upload</button> 
												</div>
												<br>
												<br>
																								
																																																																																
											<script type="text/javascript">
											
												function chose_image()
												{
													 $('#input_image').trigger('click');
												};
												
												 function readURL_image(input) {
													        if (input.files && input.files[0]) {
													            var reader = new FileReader();
													            
													            reader.onload = function (e) {
													                $('#image-preview').attr('src', e.target.result);
													            }
													            
													            reader.readAsDataURL(input.files[0]);
													        }
													    }
													     $("#input_image").change(function(){
													     	 var fileName = $("#input_image").val().toLowerCase();
															    if(fileName.lastIndexOf("png")===fileName.length-3 | fileName.lastIndexOf("jpeg")===fileName.length-3 |fileName.lastIndexOf("gif")===fileName.length-3|fileName.lastIndexOf("jpg")===fileName.length-3)
															        readURL_image(this);
															    else
															    {
															    	$("#input_image").val("");
															    	$("#image-preview").removeAttr('src');
															    	alert('Vui lòng chọn đúng định dạng file Ảnh');																				        	

															    }																				    	
														        																				        	
														    });
													     
											     function send_id(id){
													// var id_tab=$('#id_tab_web'+id).val();
														$('input[name=id_tab]').val(id);
														
													
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
<!-- -end modal change image -->	

<script type="text/javascript" src="{{Asset('assets/js/design_color_font.js')}}"></script>

<script type="text/javascript">
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
				$("p").css("color","#"+data+"");
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
			type: "post",
			url: "{{URL::route('addTopic')}}",
			data:{
				id_tab: id_tab,
				valueTab: valueTab
			},
			success:function(data){
				var data = JSON.parse(data);
				location.reload(true);
			}
		});
	}
	function deleteTab(){
		var id = $("input[name=id_title]").val();
		if(confirm("Bạn chắc chắn muốn xoá chủ để này này?")){
        	$.ajax({
				type: "post",
				url: "{{URL::route('delete-title')}}",
				data:{
					id: id
				},
				success: function(data){
					$("#section-welcome"+id).remove();
					$('#Tr'+id).remove();
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
  				$('#TT'+id_title).text(data['title']);
  				$('#nameTitle'+id_title).text(data['title']);
  				$('#nameTitle'+id_title).css('text-align',data['titlestyle']);
  				if (data['visiable'] == 1) 
  				{
  					$("#section-welcome"+id_title).hide();
  				}
  				else
  				{
  					$("#section-welcome"+id_title).show();
  				};
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

</script>

@endsection