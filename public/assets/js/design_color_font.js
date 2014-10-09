
	function design_website_minus_circle(){
		$('div.design_website_content_left').hide();
		$('div.design_website_content_right').removeClass('col-xs-12 col-sm-9 col-lg-9 col-md-9 design_website_content_right').addClass('col-xs-12 col-md-11 col-sm-11 col-lg-11 design_website_content_right');
		$('.navbar_edits').css("width","92.5%");
		$('.menu_tab_edit').css("width","90.7%");
		$('div.design_website_content_left_hide').show();
		event.preventDefault();
	};
	function design_website_plus_circle(){
		$('div.design_website_content_left').show();
		$('div.design_website_content_right').removeClass('col-xs-12 col-md-11 col-sm-11 col-lg-11 design_website_content_right').addClass('col-xs-12 col-sm-9 col-lg-9 col-md-9 design_website_content_right');
		$('.navbar_edits').css("width","75.5%");
		$('.menu_tab_edit').css("width","74%");
		$('div.design_website_content_left_hide').hide();
		event.preventDefault();
	};
