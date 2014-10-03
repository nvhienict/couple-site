<section id="section_wedding">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}">{{$tabWeb->title}}</h2>
				</div>
			</div>
		</div>
	</div>	
	<div class="fest-portion sptr-position">
		<div class="container text-center ">
			<div class="row partion">
				<div class="col-md-6">
					<div class="shape">
						<div class="overlay hexagon_mask"></div>
						<img src="{{Asset('images/website/themes5/venue.jpg')}}" alt="" />
					</div>
					<span>
		                <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
		            </span>	
				</div>
				
				<div class="col-md-6 s_txt">
					<div class="shape">
						<div class="overlay hexagon_mask"></div>
						
						<div class="slide-txt">
							<h2>Ceremony, 5pm</h2>
							<h3>Cum sociis natoque penatibus</h3>
							<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>

						</div>									
					</div>
					<div class="edit-content editphara{{$tabWeb->id}}">
					        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
					               {{$tabWeb->content}}
					            </textarea>
					        </div>
					        <div class="row phara-margin">
						    	<div class="col-xs-11"></div>
						    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
						    		<span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
						            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
						    	</div>
						    </div>
						    <div class="row phara-margin">
						    	<div class="col-xs-11"></div>
						    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
						    		<span>
						                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
						                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
						            </span>
						            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
						    	</div>
						    </div>															
				</div>
			</div>
		</div>	
	</div>
</section>