
	$("#add-group-webding").click(function(){
		var $validator=$("#form_add_group").validate().resetForm();
	});
	$("#form_add_group").validate({
		rules:{
			name:{
				required:true
			}
		},
		messages:{
			name:{
				required:"Bạn chưa nhập tên nhóm"
			}
		}
	});
