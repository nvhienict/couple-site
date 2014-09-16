<div>
    <div class="partion">	             
          <h3 class="text-center title-tab">{{$tabWeb->title}}</h3> 
          <div class="row">                           
              <p>{{$tabWeb->content}}</p>
          </div>
          <div class="edit-content">
        	<textarea name="editor4" class="ckeditor form-control" id="editor4" cols="40" rows="10" tabindex="1"></textarea>

        </div>
        <div class="row ">
            <div class="col-xs-11">
            </div>
            <div class="col-xs-1 click-edit">
                <span><a class="glyphicon glyphicon-edit" href=""></a></span>
                <span><a class="glyphicon glyphicon-cog" href=""></a></span>
            </div>               
        </div>
        <div class="row ">
      	<div class="col-xs-11"></div>
      	<div class="col-xs-1 ok-edit">
      		<span><a class="glyphicon glyphicon-ok" href=""></a></span>
                <span><a class=" glyphicon glyphicon-remove" href=""></a></span>
      	</div>
    	</div>

    </div> 
    <div class="partion">
    	<div class="col-xs-6 ">
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
          <div class="col-xs-6"></div> 
    </div> 
</div> 