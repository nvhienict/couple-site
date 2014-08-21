


// COMPARE

$(document).ready(function(){
	var $i=$('#count').val();

	$('input[type="checkbox"]').click(function(){
		if($(this).is(':checked')) {
			var id= $(this).val();
			$(this).next().val(id);
				$i++;
			$("#count").val($i);

			if($i==5)
				{
					// đã chọn 5 checkbox
					$('#toida').trigger('click');
				}
			if($i>5)
				{
					$('#toida').trigger('click');
					return false;
				}
		}
		else{
			if($i>5)
			{
				$('#toida').trigger('click');
				return false;
			}
			$(this).next().val("");
				$i--;
			$("#count").val($i);
			}
	});

	$('#submit_compare').click(function(){

		if($i==0){
			$('#chuachon').trigger('click');
		 	return false;
		}
		else if($i<6&&$i>0){
			$("#form-compare").submit();
		}
		});
});


// user-checklist

$("#add-checklist").click(function(){
	var $validator=$("#form_addChecklist").validate().resetForm();
});

$("#form_addChecklist").validate({
	rules:{
		task:{
			required:true,
			remote:{
				url:"{{URL::route('check_task_add')}}",
				type:"post"
			}
		},
		startdate:{
			required:true
		},
		category:{
			required:true
		}
	},
	messages:{
		task:{
			required:"Bạn phải nhập tên công việc",
			remote:"Công việc đã tồn tại"
		},
		startdate:{
			required:"Bạn phải chọn ngày làm"
		},
		category:{
			required:"Bạn phải chọn danh mục"
		}
	}
});

$("#form_editChecklist").validate({
	rules:{
		task:{
			required:true,
			remote:{
				url:"",
				type:"post"
			}
		},
		startdate:{
			required:true
		},
		category:{
			required:true
		}
	},
	messages:{
		task:{
			required:"Bạn phải nhập tên công việc",
			remote:"Công việc đã tồn tại"
		},
		startdate:{
			required:"Bạn phải chọn ngày làm"
			
		},
		category:{
			required:"Bạn phải chọn danh mục"
		}
	},
	errorPlacement: function (error, element) {
		error.insertAfter(element);
	}
});

jQuery('#startdate-edit').datetimepicker({
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
	format:'Y-m-d'
	});
jQuery('#startdate').datetimepicker({
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
	format:'Y-m-d'
	});


// profile user
jQuery('#weddingdate-edit').datetimepicker({
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
	format:'Y-m-d'
	});
