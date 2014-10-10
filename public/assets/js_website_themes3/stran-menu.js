
( function( window ) {
		$('#home').click(function() {
			$(".welcome").hide();
			$(".photo-book").show();
			$(".wedding").hide();
			$(".about").hide();
			$(".traval").hide();
			$(".album").hide();
			$(".contact").hide();
			$(".love_story").hide();
			$(".love_story").hide();

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".wedding").removeAttr("style");
			$(".traval").removeAttr("style");
			$(".album").removeAttr("style");
			$(".contact").removeAttr("style");
			$(".love_story").removeAttr("style");

		});

		$('#welcome').click(function() {
			$(".welcome").show();
			$(".photo-book").hide();
			$(".wedding").hide();
			$(".about").hide();
			$(".traval").hide();
			$(".album").hide();
			$(".contact").hide();
			$(".love_story").hide();

			$( ".welcome" ).animate({
				width: "100%",
				left: "0",
				top: "30px"
				}, 1000 );


		});
		$('#about').click(function() {
			$(".welcome").hide();
			$(".photo-book").hide();
			$(".wedding").hide();
			$(".about").show();
			$(".traval").hide();
			$(".album").hide();
			$(".contact").hide();
			$(".love_story").hide();

			$( ".about" ).animate({
				width: "100%",
				left: "0",
				top: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".wedding").removeAttr("style");
			$(".traval").removeAttr("style");
			$(".album").removeAttr("style");
			$(".contact").removeAttr("style");
			$(".love_story").removeAttr("style");

		});
		$('#wedding').click(function() {
			$(".welcome").hide();
			$(".photo-book").hide();
			$(".wedding").show();
			$(".about").hide();
			$(".traval").hide();
			$(".album").hide();
			$(".contact").hide();
			$(".love_story").hide();

			$( ".wedding" ).animate({
				width: "100%",
				left: "0",
				top: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".traval").removeAttr("style");
			$(".album").removeAttr("style");
			$(".contact").removeAttr("style");
			$(".love_story").removeAttr("style");

		});
		$('#traval').click(function() {
			$(".welcome").hide();
			$(".photo-book").hide();
			$(".wedding").hide();
			$(".about").hide();
			$(".traval").show();
			$(".album").hide();
			$(".contact").hide();
			$(".love_story").hide();

			$( ".traval" ).animate({
				width: "100%",
				left: "0",
				top: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".wedding").removeAttr("style");
			$(".album").removeAttr("style");
			$(".contact").removeAttr("style");
			$(".love_story").removeAttr("style");
			
		});
		$('#album').click(function() {
			$(".welcome").hide();
			$(".photo-book").hide();
			$(".wedding").hide();
			$(".about").hide();
			$(".traval").hide();
			$(".album").show();
			$(".contact").hide();
			$(".love_story").hide();

			$( ".album" ).animate({
				width: "100%",
				left: "0",
				top: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".wedding").removeAttr("style");
			$(".traval").removeAttr("style");
			$(".contact").removeAttr("style");
			$(".love_story").removeAttr("style");
			
		});
		$('#contact').click(function() {
			$(".welcome").hide();
			$(".photo-book").hide();
			$(".wedding").hide();
			$(".about").hide();
			$(".traval").hide();
			$(".album").hide();
			$(".love_story").hide();
			$(".contact").show();

			$(".contact").animate({
				width: "100%",
				left: "0",
				top: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".wedding").removeAttr("style");
			$(".traval").removeAttr("style");
			$(".album").removeAttr("style");
			$(".love_story").removeAttr("style");
			
		});
		$('#love_story').click(function() {
			$(".welcome").hide();
			$(".photo-book").hide();
			$(".wedding").hide();
			$(".about").hide();
			$(".traval").hide();
			$(".album").hide();
			$(".contact").hide();
			$(".love_story").show();

			$(".love_story").animate({
				width: "100%",
				left: "0",
				top: "30px"
				}, 1000 );

			$(".welcome").removeAttr("style");
			$(".about").removeAttr("style");
			$(".wedding").removeAttr("style");
			$(".traval").removeAttr("style");
			$(".album").removeAttr("style");
			$(".contact").removeAttr("style");
			
		});

})();