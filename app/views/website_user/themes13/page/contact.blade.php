<article id="content">
	<!-- <div class="wrapper">
		<div class="pad-left">
			<h2>About <span>Our Wedding</span></h2>
			<figure class="img1"><img src="{{Asset('images/website/themes13/page1_img1.jpg')}}" alt=""></figure>
			
		</div>
	</div> -->
	<div class="wrapper">
		<div class="partion">	             
	        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">{{$tabWeb->title}}</h3> 
	        
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
	           <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>      
	        </div>
	      </div>
	    </div> 
	</div>
</article>