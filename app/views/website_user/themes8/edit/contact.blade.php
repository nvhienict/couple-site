<div class="partion">
    <div class="row phara-margin">
          
          <div class="title-content" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}" >
            {{$tabWeb->title}}
          </div>
          
          <div class="show-content phara{{$tabWeb->id}}" > 
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>                                     
          </div>
          
        <div class="row phara-margin">
            <div class="col-xs-10">
            </div>
            <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
                
              <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>               
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
                       <textarea type="text" class="form-control" id="" placeholder=Messages></textarea>
                   </div>  
                    <button type="submit" class="btn btn-primary send-contact">Send Mesages</button>                          
               </form> 
            </div>
            <div class="col-xs-8"></div>
         </div>
    </div> 
</div> 