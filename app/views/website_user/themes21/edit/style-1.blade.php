
        <div class="about-us-img">
            <span id="prev_output_theme21_g">
                <a href="#">
                    @if(!empty($website_item->avatar_groom))
                        <img class="img-circle img-groom" src="{{Asset("$website_item->avatar_groom")}}">
                    @else
                        <img class="img-circle img-groom" src="{{Asset('images/website/themes21/groom.png')}}">
                    @endif
                </a>
                
            </span>
            
            <img style="width: 35%;" class="img-cake-wedding" src="{{Asset('images/website/themes21/p2_pic3.png')}}">
            
            <span id="prev_output_theme21_b">
                <a href="#">
                    @if(!empty($website_item->avatar_bride))
                        <img class="img-circle img-bride" src="{{Asset("$website_item->avatar_bride")}}">
                    @else
                        <img class="img-circle img-bride" src="{{Asset('images/website/themes21/bride.png')}}">
                    @endif
                </a>
                
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
