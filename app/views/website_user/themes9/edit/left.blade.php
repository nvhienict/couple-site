
    
        <div class="item-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </div>

        <span id="prev_output{{$tabWeb->id}}"> 
            <a href="#">
                <?php 
                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                 ?>
            @if($images)
                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
            @else 
                <img src="{{Asset('images/website/themes9/widget1.png')}}">
            @endif
            </a>
        </span>
        <span>
            <button  onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
            <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
        </span>

        <div class="item-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>    	
        </div>

        
    
  
    	<div class="row phara-margin">
            <div class="col-xs-7"></div>
            <div class="col-xs-1  click-edit-hide{{$tabWeb->id}}" >
                <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>
        </div>
        


