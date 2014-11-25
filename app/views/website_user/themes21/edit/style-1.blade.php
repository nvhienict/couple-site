
        <div class="about-us-img">
            <span id="prev_output222">
                <a href="#">
                    @if(!empty($website_item->avatar_groom))
                        <img class="img-circle img-groom" src="{{Asset("$website_item->avatar_groom")}}">
                    @else
                        <img class="img-circle img-groom" src="{{Asset('images/website/themes21/groom.png')}}">
                    @endif
                </a>
                <button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #FE4447; border:none; position: absolute; top:27%; left:25%">Đổi Ảnh</button>
            </span>
            
            <img style="width: 35%;" class="img-cake-wedding" src="{{Asset('images/website/themes21/p2_pic3.png')}}">
            
            <span id="prev_output222">
                <a href="#">
                    @if(!empty($website_item->avatar_bride))
                        <img class="img-circle img-bride" src="{{Asset("$website_item->avatar_bride")}}">
                    @else
                        <img class="img-circle img-bride" src="{{Asset('images/website/themes21/bride.png')}}">
                    @endif
                </a>
                <button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #FE4447; border:none; position: absolute; top:27%; right:25%">Đổi Ảnh</button>
            </span>

        </div>
        <div style="top:38%;" class="about-us-content-groom">
            <em class="name">
                {{$website_item->name_groom}}
            </em>
            <div class="ctn-about about-g">
                {{$website_item->about_groom}}
            </div>

        </div>

        <div style="top:38%;" class="about-us-content-bride">
            <em class="name">
                {{$website_item->name_bride}}
            </em>
            <div class="ctn-about about-b">
                {{$website_item->about_bride}}
            </div>
        </div>
