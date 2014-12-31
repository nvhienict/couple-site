<div class="partion">
    <div class="row phara-margin">        
        <div class="title-content" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </div>

        <div class="col-xs-6 show-content phara{{$tabWeb->id}}" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
        </div>

        <div class="col-xs-6 float-right">
            <span id="prev_output{{$tabWeb->id}}" >
                <a href="#">
                    <?php 
                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes1/tab_temp_1.jpg")}}" alt="">

                @endif
                </a>
            </span>
        </div>

    </div>
</div>

