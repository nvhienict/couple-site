<style type="text/css">
	#social{
		position: fixed;
		left: 1%;
		bottom:35%;
		z-index: 9999;
		margin-top: 20px;
		padding-top: 10px;
		border: 1px solid black;
		background-color: white;
		width: 6%;
		text-align: center;
		
	}
	.button_social{
		margin-bottom: 4px;
		margin-left: 9px;
	}
</style>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-1">
		<div id="social">
		<!-- facebook -->
			 <div class="button_social">
				
				<div id="fb-root"></div>
					<script>
						(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));
					</script>
				<div class="fb-like" data-layout="box_count" data-action="like" data-show-faces="true" 
				data-share="false" data-ref="none"></div>
				
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
	
	<div class="col-sm-9"></div>
</div>
