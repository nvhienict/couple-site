$("#add-guest-wedding").click(function(){
		var $validator=$("#form_add_guest").validate().resetForm();
	});

$("#form_add_guest").validate({
		rules:{
			fullname:{
				required:true
			},
			email:{
                     required:true,
                     email:true,
                     remote:{
                                url:"{{URL::route('check-email-guest')}}",
                                type:"POST"
                            }
                    },
             address:{
             	required:true
             	},
             phone:{
             	required:true,
                minlength:9

             	},
             attending:{
             	required:true,

                }
		},
		messages:{
			fullname:{
				required:"Bạn chưa nhập Tên Khách"
			},
			email:{
				required:"Bạn chưa nhập Email",
                email:"Không đúng định dạng Email",
                remote:"Email đã tồn tại"
			},
			address:{
				required:"Bạn chưa nhập địa chỉ"
			},
			 phone:{
             	required:"Bạn chưa nhập số điện thoại",
                minlength:"Yêu cầu nhập trên 9 kí tự"
             	},
             attending:{
             	required:"Bạn chưa nhập số người tham dự"
             }
		}
	});
