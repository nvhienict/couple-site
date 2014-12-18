Number.prototype.format = function(n, x, s, c) {
		    var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
		        num = this.toFixed(Math.max(0, ~~n));
		    return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
		};

		//Register jQuery Event 'OnEnter'
		(function ($) {
		  $.fn.onEnter = function (func) {
		    this.bind('keypress', function (e) {
		      if (e.keyCode == 13) func.apply(this, [e]);
		    });
		    return this;
		  };
		})(jQuery);
		function validateNumber(event) {
		    var key = window.event ? event.keyCode : event.which;
		    if (event.keyCode == 8 || event.keyCode == 46
		     || event.keyCode == 37 || event.keyCode == 39) {
		    	$(this).number(true);
		        return true;
		    }
		    else if ( key < 48 || key > 57 ) {

		        return false;
		    }
		    else{
		     $(this).number(true);
		     return true;

		    } true;
		} 					
		//hàm click ẩn hiện

		function ShowSummary(result){
    		result = $.parseJSON(result);
			var bID = result['budgetID'];
			var cID = result['categoryID'];
			$(".Due" + bID).text(result['budgetDue'].format(0,3,',') + " VND");
			$("#totalEstimate" + cID).text(result['totalEstimate'].format(0,3,',') + " VND");
    		$("#totalCat" + cID).text(result['totalActual'].format(0,3,',') + " VND");
    		$("#totalCatPay" + cID).text(result['totalPay'].format(0,3,',') + " VND");
    		$("#totalCatDue" + cID).text(result['totalDue'].format(0,3,',') + " VND");
    		$("#rowSumExpected").text(result['sumExpected'].format(0,3,',') + " VND");
    		$("#rowSumActual").text(result['sumActual'].format(0,3,',') + " VND");
    		$("#rowSumPay").text(result['sumPay'].format(0,3,',') + " VND");
    		$("#rowSumDue").text(result['sumDue'].format(0,3,',') + " VND");

    		//tom tat
    		$("#ubsDuKien").text(result['sumExpected'].format(0,3,',') + " VND");
    		$("#ubsThucTe").text(result['sumActual'].format(0,3,',') + " VND");
    		$("#ubsThanhToan").text(result['sumPay'].format(0,3,',') + " VND");
    		$("#ubsConNo").text(result['sumDue'].format(0,3,',') + " VND");
		} 		