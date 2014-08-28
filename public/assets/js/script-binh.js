$("#add-guest-wedding").click(function(){
		var $validator=$("#form_add_guest").validate().resetForm();
	});

$("#form_add_guest").validate({
		rules:{
			fullname:{
				required:true
			},
			email:{
                    
                     email:true,
                     remote:{
                                url:"{{URL::route('check-email-guest')}}",
                                type:"POST"
                            }
                    },
            
             phone:{
             	
                minlength:9

             	},
           
		},
		messages:{
			fullname:{
				required:"Bạn chưa nhập Tên Khách"
			},
			email:{
				
                email:"Không đúng định dạng Email",
                remote:"Email đã tồn tại"
			},
			
			phone:{
             	
                minlength:"Yêu cầu nhập trên 9 kí tự"
             	},
             
		}
	});
		function phone_validate(event)
		      {  	
	     if(event.which >= 37 && event.which <= 40) return;
	         $("#phone").val(function(index, value) {
			        return value
			            .replace(/\D/g, '')
			            .replace(/\B(?=(\d{3})+(?!\d))/g, "")
			        ;
			    });
	    };
