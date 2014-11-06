

        <div class="item-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </div>

            <?php 
            $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
             ?>
        @if($images)
            <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
        @else 
            <img src="{{Asset('images/website/themes9/widget1.png')}}">
        @endif

        <div class="item-content phara{{$tabWeb->id}}" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>    	
        </div>

