<article id="content">
	<div class="wrapper">
		<div class="partion">	             
	        <div class="inline-title text-center">
	            <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
	                {{$tabWeb->title}}
	            </h3>
	            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
	        </div> 
	        
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
		        <div class="col-xs-12 col-md-5 col-sm-5 show-content phara{{$tabWeb->id}}">                           
		           <span style="color: #{{$website_item->color3}}" >{{$tabWeb->content}}</span>      
		        </div>
	      	</div>

	     	<div class="row phara-margin">
	            <div class="col-xs-9">
	            </div>
	            <div class="col-xs-1 click-edit-hide{{$tabWeb->id}}">
	                
	               <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
	            </div>               
	        </div>

	    </div> 
	</div>
</article>