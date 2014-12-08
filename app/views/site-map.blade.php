<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	#site-map-bar{
		width: 101.1%;
		padding-left: 8%;
		padding-top: 3px;
		height: 30px;
		background-color: #F2F0EE;
		font-size: 17px;
	}
	span.icon-site-map{
		color: #E75280;
		margin: 0 0.5%;
	}
	</style>

</head>
<body>
	<div id="site-map-bar">
		
		<?php
			// $url 		= URL::current();
			$url 		= "http://thuna.vn";
			$arUrl  	= explode('/', $url);
			$countArUrl	= count( $arUrl );
			
			$http 		= "http:";
			$thuna 		= "thuna.vn";
			$arUnset 	= array($http, $thuna, ' ', '', 'song');

			$arUrl_2 	= array_diff($arUrl, $arUnset);

		?>

		@if ( ($countArUrl < 4) || ($countArUrl==0) || ($arUrl[$countArUrl-1]=='index') )
			<!-- no action -->
		@else
			@if ( count($arUrl_2)==0 )
				<!-- no action -->
			@else
				<a href="http://thuna.vn/">Thuna.vn</a>
				<span class="icon-site-map">></span>
				@foreach ( $arUrl_2 as $index=>$urlItem )
					{{HTML::linkRoute(''.$urlItem.'', ''.$urlItem.'')}}
					<span class="icon-site-map">></span>
				@endforeach
			@endif
		@endif

	</div>

	<script type="text/javascript">
		var txt = $('#site-map-bar').html();
		var gh  = txt.length;
		if (gh==35) {
			$('#site-map-bar').hide();
		} else {
			$('#site-map-bar').show();
		};
	</script>

</body>	
</html>