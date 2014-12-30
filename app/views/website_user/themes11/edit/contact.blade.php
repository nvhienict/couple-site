
<div class="item r-title{{$tabWeb->id}}">                   
    <div id="slide{{$i+2}}" class="masonry margin-partion container" style="min-height:450px;" >
        <div class="post-box{{$i+2}} col-sx-12 col-lg-6 col-md-6 col-sm-6 bg-images "> 
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
        <div class="post-box{{$i+2}} col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="inline-title text-center">
                    <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tabWeb->id}}">
                        {{$tabWeb->title}}
                    </h3>
                    <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 show-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' >
                 <span style="color: #{{$website_item->color3}}" >
                    {{$tabWeb->content}}
                </span> 
            </div>           
        </div>
                        
    </div>
    <div class="container phara-margin">
        <div class="col-xs-10"></div>
        <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}" >
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>
    </div>
    
</div>
