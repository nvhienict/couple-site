<article id="content">
	<!-- <div class="wrapper">
		<div class="pad-left">
			<h2>About <span>Our Wedding</span></h2>
			<figure class="img1"><img src="{{Asset('images/website/themes13/page1_img1.jpg')}}" alt=""></figure>
			
		</div>
	</div> -->
	<div class="wrapper">
		<div class="partion">	             
	        <h3 id = "nameTitle{{$tabWeb->id}}" class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
	        	{{$tabWeb->title}}
	        </h3> 
	        
		</div> 
	    <div class="partion">
	        <div class="row phara-margin">
	        	<div class="col-xs-12 col-md-5 col-sm-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-offset-lg-1 ">
	              <form  class="contact-website" action="" method="POST" role="form">
	             
	                 <div class="form-group">
	                     <label for="">From</label>
	                     <input  type="text" class="form-control" id="" placeholder="Your Name">
	                 </div>
	                 <div class="form-group">
	                     <label for="">Email</label>
	                     <input type="text" class="form-control" id="" placeholder="Email Adress Your">
	                 </div>
	                 <div class="form-group">
	                     <label for="">Subject</label>
	                     <input type="text" class="form-control" id="" placeholder="Subject">
	                 </div>
	                 <div class="form-group">
	                     <label for="">Mesages</label>
	                     <textarea type="text" class="form-control" id="" placeholder=Messages></textarea>
	                 </div>  
	                  <button type="submit" class="btn btn-primary send-contact">Send Mesages</button>                          
	            </form>
	        </div>
	        <div class="col-xs-12 col-md-5 col-sm-5 show-content phara{{$tabWeb->id}}" onclick="showckeditor_text({{$tabWeb->id}})">                           
	           <span style="color: #{{$website_item->color3}}" >{{$tabWeb->content}}</span>      
	        </div>
	        <div class="edit-content editphara{{$tabWeb->id}}">
	        	<textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

	        </div>
	        <div class="row phara-margin">
	            <div class="col-xs-11">
	            </div>
	            <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
	                <span><a onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
	               
	            </div>               
	        </div>
	        <div class="row phara-margin">
		      	<div class="col-xs-11"></div>
		      	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
		      		
		          	<span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
		      		<span style="float:right;">
			            <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
			            <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
		          	</span>
		      	</div>
	    	</div>

	      </div>
	    </div> 
	</div>
</article>