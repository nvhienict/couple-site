		
		$('#home').click(function() {
			$( ".welcome" ).hide();
			$(".photo-book").show();
			$(".event").hide();
			$(".about").hide();
			$(".travel").hide();
			$(".images").hide();
			$(".contact").hide();

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".event").removeAttr("style");
			$(".travel").removeAttr("style");
			$(".images").removeAttr("style");
			$(".contact").removeAttr("style");

		});

		$('#welcome').click(function() {
			$( ".welcome" ).show();
			$(".photo-book").hide();
			$(".event").hide();
			$(".about").hide();
			$(".travel").hide();
			$(".images").hide();
			$(".contact").hide();

			$( ".welcome" ).animate({
				width: "100%",
				left: "0",
				margin: "0",
				marginTop: "30px"
				}, 1000 );
		});
		$('#about').click(function() {
			$( ".welcome" ).hide();
			$(".photo-book").hide();
			$(".event").hide();
			$(".about").show();
			$(".travel").hide();
			$(".images").hide();
			$(".contact").hide();

			$( ".about" ).animate({
				width: "100%",
				left: "0",
				margin: "0",
				marginTop: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".event").removeAttr("style");
			$(".travel").removeAttr("style");
			$(".images").removeAttr("style");
			$(".contact").removeAttr("style");
		});
		$('#event').click(function() {
			$( ".welcome" ).hide();
			$(".photo-book").hide();
			$(".event").show();
			$(".about").hide();
			$(".travel").hide();
			$(".images").hide();
			$(".contact").hide();

			$( ".event" ).animate({
				width: "100%",
				left: "0",
				margin: "0",
				marginTop: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".travel").removeAttr("style");
			$(".images").removeAttr("style");
			$(".contact").removeAttr("style");
		});
		$('#travel').click(function() {
			$( ".welcome" ).hide();
			$(".photo-book").hide();
			$(".event").hide();
			$(".about").hide();
			$(".travel").show();
			$(".images").hide();
			$(".contact").hide();

			$( ".travel" ).animate({
				width: "100%",
				left: "0",
				margin: "0",
				marginTop: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".event").removeAttr("style");
			$(".images").removeAttr("style");
			$(".contact").removeAttr("style");
		});
		$('#images').click(function() {
			$( ".welcome" ).hide();
			$(".photo-book").hide();
			$(".event").hide();
			$(".about").hide();
			$(".travel").hide();
			$(".images").show();
			$(".contact").hide();

			$( ".images" ).animate({
				width: "100%",
				left: "0",
				margin: "0",
				marginTop: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".event").removeAttr("style");
			$(".travel").removeAttr("style");
			$(".contact").removeAttr("style");
		});
		$('#contact').click(function() {
			$( ".welcome" ).hide();
			$(".photo-book").hide();
			$(".event").hide();
			$(".about").hide();
			$(".travel").hide();
			$(".images").hide();
			$(".contact").show();

			$( ".contact" ).animate({
				width: "100%",
				left: "0",
				margin: "0",
				marginTop: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".event").removeAttr("style");
			$(".travel").removeAttr("style");
			$(".images").removeAttr("style");
		});