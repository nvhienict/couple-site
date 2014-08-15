
// CREAT SESSION FOR USER LOGIN GOTO PAGE REQUEST




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

