<div style="padding-bottom: 20px;">
    <div class="partion">	             
        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">{{$tabWeb->title}}</h3> 
        <div class="show-content phara{{$tabWeb->id}}">                           
           <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>      
        </div>
    </div> 
    <div class="partion">
        <div class="row phara-margin">
        	<div class="col-xs-4 ">
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
                     <input type="text" class="form-control" id="" placeholder=Messages>
                 </div>  
                  <button type="submit" class="btn btn-primary send-contact">Send Mesages</button>                          
            </form>
        </div>
      </div>
    </div> 
</div> 