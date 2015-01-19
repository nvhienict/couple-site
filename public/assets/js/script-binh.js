$("#add-guest-wedding").click(function(){
		var $validator=$("#form_add_guest").validate().resetForm();
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
