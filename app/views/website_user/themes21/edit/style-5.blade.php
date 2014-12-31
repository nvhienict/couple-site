<div class="r-title{{$tabWeb->id}}">
  <div class="inline-title text-center div-text-tab-text-title">
        <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
    </div> 

    <div class="div-text-tab-text-content">
      <form class="contact-website" action="" method="POST" role="form">
     
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
