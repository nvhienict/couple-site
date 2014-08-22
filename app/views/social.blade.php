<style type="text/css">
	#social{
		position: fixed;
		left: 1%;
		bottom:15%;
		z-index: 9999;
		margin-top: 20px;
		padding-top: 10px;
		border: 1px solid black;
		background-color: white;
		width: 6%;
		text-align: center;
		
	}
	.button_social{
		margin-bottom: 5px;
	}
</style>
<link rel="canonical" href="http://thunaplanner.com/" />
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-1">
		<div id="social">
		<!-- facebook -->
			 <div class="button_social">
				<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fthunaplanner.com%2F&amp;
				width=60&amp;layout=box_count&amp;action=like&amp;show_faces=true&amp;share=false&amp;ref=none&amp;
				height=60" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:60px; height:60px;"
				 allowTransparency="true">
				</iframe>
			</div>
		<!-- tweet -->
			<div class="button_social">
				<a href="https://twitter.com/share" class="twitter-share-button" 
				 data-width="60px" data-via="your_screen_name" data-dnt="true"
				 data-related="anywhereTheJavascriptAPI" data-count="vertical"
				 style="border:none; overflow:hidden; width:60px; height:60px;"
				 >Tweet</a>
				 <script>!
					function(d,s,id){
						var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
						if(!d.getElementById(id)){js=d.createElement(s);
							js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
							fjs.parentNode.insertBefore(js,fjs);
						}}(document, 'script', 'twitter-wjs');
				</script>
				 <!-- <iframe allowtransparency="true" count="vertical" frameborder="0" scrolling="no"
			        src="https://platform.twitter.com/widgets/tweet_button.html?count=vertical" width="57" height="61"
			        style="width:57px; height:62px;">
			    </iframe>  -->
			    <!-- //thẻ iframe cũng tương tự thẻ a và script -->
			</div>
		<!-- google + -->
			<div>
				<div class="g-plusone" data-size="tall"></div>
				<script type="text/javascript">
				window.___gcfg = {
			        lang: 'vi'
			      };
				  (function() {
				    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				    po.src = 'https://apis.google.com/js/plusone.js';
				    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
				  })();
				</script>
			</div>

			
		</div>
	</div>
	<script type="text/javascript">
		$(window).scroll(function(){
		    if( $(window).scrollTop() > 200 ) {
		        $('#go_top').stop(false,true).fadeOut(600);
		    }else{
		        $('#go_top').stop(false,true).fadeIn(600);
		    }
		});
	</script>
	<div class="col-sm-9"></div>
</div>
