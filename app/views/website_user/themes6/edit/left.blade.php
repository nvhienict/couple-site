
<div class="col-xs-8 partion">
    <div class="row phara-margin">
        <h3 class="text-center title-tab" style="text-align: {{$tab->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tab->id}}">
            {{$tab->title}}
        </h3>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 float-left">
            <span id="prev_output{{$tab->id}}"> 
                <a href="#">
                    <?php 
                    $images=PhotoTab::where('tab',$tab->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes6/tab_temp_6.jpg")}}" alt="">

                @endif
                </a>
            </span>
            <span>
                <button  onclick="send_id({{$tab->id}},null,0)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                <input id="id-tab-photo{{$tab->id}}" type="hidden" value="{{$tab->id}}">
            </span>
        </div>
        <div class="show-content phara{{$tab->id}}">
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tab->content}}</span>
        </div>
      
    </div>
    <div class="row phara-margin float-right">      
        <div class="click-edit click-edit-hide{{$tab->id}}" >            
           
            <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tab->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
        </div>
    </div>
    
    <br>
</div>