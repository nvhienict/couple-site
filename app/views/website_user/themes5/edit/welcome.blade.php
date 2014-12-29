<section id="section_welcome" class="r-title{{$tabWeb->id}}">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<div class="inline-title text-center">
			            <h2 style="color: #{{$website_item->color2}}" data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}" class="TT{{$tabWeb->id}}" id = "nameTitle{{$tabWeb->id}}">{{$tabWeb->title}}</h2>
			            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
			        </div>
				</div>
			</div>
		</div>
	</div>			
	<div class="fest-portion text-center sptr-position">
		<div class="container">	
			<div class="partion">
			    <div class="show-content phara{{$tabWeb->id}}"  onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static">                            
			    	<span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
				</div>
			   
		        <div class="row phara-margin">
			    	<div class="col-xs-6 col-md-10 col-sm-10 col-lg-10"></div>
			    	<div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
			    		
			            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
			    	</div>
			    </div>
			    
			</div>
		</div>
	</div>	
</section>