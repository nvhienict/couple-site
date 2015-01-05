<div style="padding-bottom: 20px;">
    <div class="partion" style="padding-top:0px;">              
          <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}" id = "nameTitle{{$tabWeb->id}}">{{$tabWeb->title}}</h3> 
          <div class="show-content phara{{$tabWeb->id}}">   
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
          </div>
          <div class="col-xs-3"></div>
          
        <div class="row phara-margin">
            <div class="col-xs-4">
            </div>
            <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
              
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>               
        </div>
        
    </div> 
    <div class="partion" style="padding-top:0px;">
      <div class="row phara-margin">
        <!-- <div class="col-xs-4"></div> -->
            <div class="col-xs-4 col-xs-offset-4 ">
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