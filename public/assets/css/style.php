
	
<?php
	header("Content-type: text/css; charset: UTF-8");

	$color1 = WebsiteController::returnColor(1);

?>

.giang{
	font-weight: bold;
	color: <?php echo $color1; ?>;
}

