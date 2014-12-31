<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 phara-temp wedding-contact" style="min-height:550px;">
  
    <div class="inline-title text-center">
            <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                {{$tabWeb->title}}
            </h3>
            <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
        </div>
     <div class="phara-margin ">
        <div class="row contact-content container">
          
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 show-content">
                <form  class="contact-website" action="" method="POST" role="form">
               
                   <div class="form-group">
                       <span for="">From</span>
                       <input  type="text" class="form-control" id="" placeholder="Your Name">
                   </div>
                   <div class="form-group">
                       <span for="">Email</span>
                       <input type="text" class="form-control" id="" placeholder="Email Adress Your">
                   </div>
                   <div class="form-group">
                       <span for="">Subject</span>
                       <input type="text" class="form-control" id="" placeholder="Subject">
                   </div>
                   <div class="form-group">
                       <span for="">Mesages</span>
                       <textarea type="text" class="form-control" id="" placeholder=Messages></textarea>
                   </div>  
                    <button type="submit" style="background: #fff;color:black;"class="btn  send-contact">Send Mesages</button>                          
               </form>                            
            </div>

        </div>            
    </div>
               
    </div>
  

