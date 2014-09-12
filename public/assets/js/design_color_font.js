
function design_website_minus_circle(){
		$('div.design_website_content_left').hide();
		$('div.design_website_content_right').removeClass('col-xs-9 design_website_content_right').addClass('col-xs-11 design_website_content_right');
		$('div.design_website_content_left_hide').show();
	};
	function design_website_plus_circle(){
		$('div.design_website_content_left').show();
		$('div.design_website_content_right').removeClass('col-xs-12 design_website_content_right').addClass('col-xs-9 design_website_content_right');
		$('div.design_website_content_left_hide').hide();
	};
