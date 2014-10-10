$(function(){
	$("ul.nav li.dropdown").hover(function(){
		$(this).addClass("open");
		$("ul.dropdown-menu", this).fadeIn();
	},function(){
		$(this).removeClass("open");
		$("ul.dropdown-menu", this).fadeOut("slow");
	});
});

