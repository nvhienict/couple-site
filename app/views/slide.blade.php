		
 		<link href="{{Asset('assets/css/style.css')}}" rel="stylesheet">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 


				<div class="tab-menu" id="photos">
																		  <!-- Wrapper for slides -->
					<div id="bigPic">
						<img alt="" src="{{Asset("images/slide/1.jpg")}}">
						<img alt="" src="{{Asset("images/slide/2.jpg")}}">
						<img alt="" src="{{Asset("images/slide/3.jpg")}}">
						<img alt="" src="{{Asset("images/slide/4.jpg")}}">
						<img alt="" src="{{Asset("images/slide/5.jpg")}}">
						<img alt="" src="{{Asset("images/slide/6.jpg")}}">
						<img alt="" src="{{Asset("images/slide/7.jpg")}}">
									    
					</div>

					<ul id="thumbs">
						<li class="active" rel="1"><img alt="" src="{{Asset("images/slide/1_thumb.jpg")}}"> </li>
						<li rel="2"><img alt="" src="{{Asset("images/slide/2_thumb.jpg")}}"> </li>
						<li rel="3"><img alt="" src="{{Asset("images/slide/3_thumb.jpg")}}"> </li>
						<li rel="4"><img alt="" src="{{Asset("images/slide/4_thumb.jpg")}}"> </li>
						<li rel="5"><img alt="" src="{{Asset("images/slide/5_thumb.jpg")}}"> </li>
						<li rel="6"><img alt="" src="{{Asset("images/slide/6_thumb.jpg")}}"> </li>
						<li rel="7"><img alt="" src="{{Asset("images/slide/7_thumb.jpg")}}"> </li>
									   
					</ul>
									
					<script type="text/javascript">
						var currentImage;
						var currentIndex = -1;
						var interval;
							function showImage(index){
								if(index < $('#bigPic img').length){
									var indexImage = $('#bigPic img')[index]
									if(currentImage){   
										if(currentImage != indexImage ){
											$(currentImage).css('z-index',2);
												clearTimeout(myTimer);
											$(currentImage).fadeOut(250, function() {
												myTimer = setTimeout("showNext()", 3000);
											$(this).css({'display':'none','z-index':1})
										 });
									}
							  }
								$(indexImage).css({'display':'block', 'opacity':1});
								currentImage = indexImage;
								currentIndex = index;
								$('#thumbs li').removeClass('active');
								$($('#thumbs li')[index]).addClass('active');
									}
								}

								function showNext(){
									var len = $('#bigPic img').length;
									var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
								 	showImage(next);
								}

										var myTimer;

											$(document).ready(function() {
											myTimer = setTimeout("showNext()", 3000);
											showNext(); //Load first image
											$('#thumbs li').bind('click',function(e){
											var count = $(this).attr('rel');
											showImage(parseInt(count)-1);
											});
								});
											</script>	
									
								</div>