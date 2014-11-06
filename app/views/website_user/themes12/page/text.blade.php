
        <div class="item-title" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}" >
            {{$tabWeb->title}}
        </div>

        <div class="item-content" >
            <span name="phara" style="color: #{{$website_item->color3}}" onclick="showckeditor_text({{$tabWeb->id}})">
                {{$tabWeb->content}}
            </span>        
        </div>

   