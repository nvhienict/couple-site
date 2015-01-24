
$('.navbar-nav li').click(function () {
	$('.navbar-nav li.active').removeClass('active');
	$(this).addClass('active');
})