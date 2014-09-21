<div>
    <div class="partion">                
          <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
          </h3>
          
          <div class="edit-content editphara{{$tabWeb->id}}">
            <textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

        </div>
        <div class="row phara-margin">
            <div class="col-xs-11">
            </div>
            <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
                <span><a onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
                <span><a class="glyphicon glyphicon-cog icon-site" href="javascript:void(0);"></a></span>
            </div>               
        </div>
        <div class="row phara-margin">
        <div class="col-xs-11"></div>
        <div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
            <span>
            <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
            <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
          </span>
          <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        </div>
        </div>

    </div> 
    <div class="partion">
      <div class="row phara-margin">
      <div class="row">
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
    </div> 
</div> 