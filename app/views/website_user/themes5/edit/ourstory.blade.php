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
				                <button  onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
				            	<input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
				            </span>
				        </div>
				       
				        <div class="col-xs-6  show-content phara{{$tabWeb->id}}">
				        	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
				        </div>
					    
				        <div class="row phara-margin">
					    	<div class="col-xs-10"></div>
					    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
					    		
					            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
					    	</div>
					    </div>
					    
				    </div>
				</div>
			</div>	
		</div>
	</div>
</section>	

