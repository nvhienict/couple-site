
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 partion contact-main r-title{{$tab->id}}" >
  <div class="row phara-margin ">
        
        <div class="inline-title text-center">
            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tab->id}}">
                {{$tab->title}}
            </h3>
            <span onclick="sendTitle({{$tab->id}},{{$tab->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
        </div>
          
    </div> 
<br><br>
     <div class="row phara-margin">
        <div class="row contact-content">
            <div class="col-xs-12">
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
              <br><br>
        </div>

        </div>
            
           
    </div>
        <br>
        <br>
      
        
    </div>
  
<br>
