
        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        

        <div class="frame_box frame_center" style="width:450px; height:192px; ">
            <span id="prev_output_themes3{{$tabWeb->id}}">
                <a href="#">
                    <?php $images = PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>
                    
                    @if($images)
                        <img style="width:100%; height:100%;" class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                    @else 
                        <img src="{{Asset('images/website/themes3/post_img_1.jpg')}}" style="width:100%; height:100%;" >
                    @endif
                </a>
            </span>
            <span class="img_tl"></span>
            <span class="img_tr"></span>
            <span class="img_bl"></span>
            <span class="img_br"></span>
            
        </div>
        <!-- end frame_box frame_big frame_center -->

        <div class="text_big show-content-page phara{{$tabWeb->id}}">
            
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
 
        </div>
        <!-- end text_big -->
