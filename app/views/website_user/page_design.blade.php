@extends('main_website')
@section('title')
{{$firstname}}'s Website cưới 
@endsection
@section('content')

<body style="overflow-x:hidden;">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
			
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
	<div class="modal fade" id="modal-changeimage">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button" onclick="load_photo_tab()" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chọn Ảnh</h4>
				</div>
				<div class="modal-body">
					
					<form  action="{{URL::route('upload_avatar')}}" class="dropzone dz-clickable" id="upload-photo-tab" method="POST">
						<input name="check-tab" id="check-tab" type="hidden" value="">
					</form>
						
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="load_photo_tab()" type="button" data-dismiss="modal" class="btn btn-primary" >Đóng</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end upload ajax -->

	<!-- edit title -->
	<div class="modal fade" id="modal-edit-menu">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chỉnh sửa tiêu đề</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<input type="text" name="get-id-title" id="get-id-title" class="form-control" value="">
							<input type="hidden" value="">
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							<input style="visibility:visible;" type="checkbox" name="sh-title" id="sh-title" class="form-control" value="">
						</div>
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" style="padding-top:10px;font-weight: bold;">
							Ẩn khỏi trang
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

<!-- add title -->
	<div class="modal fade" id="modal-add-title">
		<div class="modal-dialog modal-md">
			<div class="modal-content ">
				<div class="modal-header">
					<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Chỉnh sửa tiêu đề</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<select id="get-id-hide-tab" style="height: 25px; margin-top: 7px;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								@foreach($arTab as $tab) 
									@if( $tab->visiable==1)
									<option value={{$tab->id}}>{{$tab->title}}</option>
									@endif
								@endforeach()
							</select>
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							<input style="visibility:visible;" type="checkbox" class="form-control" name="show-title" id="show-title" value=""> 
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="padding-top:10px;font-weight: bold; padding-left: 0px;">
							Hiển thị trên trang web
						</div>
					</div>
				</div>
				<div class="modal-footer" style="text-align:center;">
		      		<button onclick="addTitle()" type="button" data-dismiss="modal" class="btn btn-primary" >Thêm</button>
		      		<button  type="button" data-dismiss="modal" class="btn btn-primary" >Thoát</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- end add title -->

<script type="text/javascript" src="{{Asset('assets/js/design_color_font.js')}}"></script>

<script type="text/javascript">

	// add Title
	function loadAddTitle(){
		$('#show-title').removeAttr('checked');
	};
	function addTitle(){
		var id_title = $('#get-id-hide-tab').find(":selected").val();
		$('input[name="show-title"]').each(function(){
			if (this.checked==true) {
				$(this).val("0");
			};
		});
		var ck_visiable = $('#show-title').val();
		$.ajax({
			type:"post",
			url: "{{URL::route('update_visiable')}}",
			data: { id_tab : id_title, visiable : ck_visiable},
			success: function(data){
				if (data.visiable == 0) {
					$('.r-title'+id_title).show();
					$('.menu-id'+id_title).show();
					$('#get-id-hide-tab').find(":selected").remove();
				} else{
					$('.r-title'+id_title).hide();
					$('.menu-id'+id_title).hide();
				};
			}
		});
	};
	// upload-image-tab
	function send_id(id_tab,check){
		 var id_tab = $('#id-tab-photo'+id_tab).val();
		 $('#check-tab').val(id_tab);
	};
	function load_photo_tab(){
		var id_tab = $('#check-tab').val();		
		$.ajax({
			type:"post",
			data:{ check_tab : id_tab },
			url: "{{URL::route('load_avatar')}}", 
			success: function(data){
				$("#prev_output"+id_tab+" a").html("<img style='width:100%; height:100%;' class='img-responsive' src='"+data.image+"' />");
				$("#prev_output_themes21"+id_tab+" a").html("<img class='tab-text-img' src='"+data.image+"' />");
				$("#prev_output_theme4"+id_tab+" a").html("<img style='width: 350px;height: 350px;' class='img-responsive img-circle' src='"+data.image+"' />");					 
			}
		});
	};

	// upload title
	function sendTitle(id_title, visiable){
		var visiable = visiable;
		$('#get-id-title').next().val(id_title);
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
					$('.r-title'+id_title).hide();
					$('.menu-id'+id_title).hide();
					$('#get-id-hide-tab').append('<option value="'+id_title+'">'+data.title+'</option');
				} else{
					$('.r-title'+id_title).show();
					$('.menu-id'+id_title).show();
				};

			}
		});
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