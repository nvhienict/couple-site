<section id="section_about">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 style="color: #{{$website_item->color2}}" data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}">{{$tabWeb->title}}</h2>
				</div>
			</div>
		</div>
	</div>			

	<div class="gift-portion text-center sptr-position">
		<div class="container">
			<div class="row">
				<div class="partion">
					<div class="phara-margin">
				        <div class="col-xs-6 float-right">
				            <span id="prev_output{{$tabWeb->id}}" >
				                <a href="#">
				                    <?php 
				                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
				                     ?>
				                @if($images)
				                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
				                @else 
				                    <img  class="img-responsive" src="{{Asset("images/website/themes1/tab_temp_1.jpg")}}" alt="">

				                @endif
				                </a>
				            </span>
				            <span>
				                <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
				            </span>
				        </div>
				        <!-- <div class="show-content phara{{$tabWeb->id}}">
				        	<p>
				                {{$tabWeb->content}}
							</p>
				        </div> -->
				        <div class="col-xs-6  show-content phara{{$tabWeb->id}}">
				        	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
				        </div>
					    <!-- <div class="edit-content editphara{{$tabWeb->id}}">
				        	<textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
				               {{$tabWeb->content}}
				            </textarea>
				        </div> -->
				        <div class="row phara-margin">
					    	<div class="col-xs-10"></div>
					    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
					    		<!-- <span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
					            <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span> -->
					            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
					    	</div>
					    </div>
					    <!-- <div class="row phara-margin">
					    	<div class="col-xs-11"></div>
					    	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
					    		<span>
					                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
					                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
					            </span>
					            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
					    	</div>
					    </div> -->
				    </div>
				</div>
			</div>	
		</div>
	</div>
</section>	

<!-- <section id="section_about" class="tab-pane">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}"><span class="TT{{$tabWeb->id}}">{{$tabWeb->title}}</span></h2>
				</div>
			</div>
		</div>
	</div>			

	<div class="gift-portion text-center sptr-position">
		<div class="container">
			<div class="row">
				<div class="partion">
					<div class="row phara-margin">
				       	<h3 class="text-center title-tab" >{{$tabWeb->title}}</h3>
				        <div class="col-xs-6 float-right">
				            <span>
				                <a href="#">
				                    <?php 
				                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
				                     ?>
				                @if($images)
				                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
				                @else 
				                    <img  class="img-responsive" src="{{Asset("images/website/themes1/tab_temp_1.jpg")}}" alt="">

				                @endif
				                </a>
				            </span>
				            <span>
				                <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
				            </span>
				        </div>
				        <div class="show-content phara{{$tabWeb->id}}">
				        	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
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
	</div>

</section>	 -->