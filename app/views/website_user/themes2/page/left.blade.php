
<div class="partion">
    <div class="row phara-margin">
        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        <div class="col-xs-6 float-left" style="z-index:-1;">
            <span> 
                <a href="#">
                    <?php 
                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                @endif
                </a>
            </span>
            <div class="btn-share">
                <div class="fb-share-button" data-layout="button"></div>
            </div>
        </div>
        <div class="show-content phara{{$tabWeb->id}}">
            <p style="color: #{{$website_item->color3}}">
                {{$tabWeb->content}}
            </p>
        </div>
    </div>

</div>