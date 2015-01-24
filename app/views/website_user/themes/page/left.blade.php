<div class="partion">
    <div class="row phara-margin">
        <h3 class="text-center title-tab" style=" font-family:UvfAphroditePro;">{{$tabWeb->title}}</h3>
        <div class="col-xs-12 col-md-6 col-sm-6 col-lg-6 float-left share-img">
            <span> 
                <a>
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
            <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
        </div>
    </div>
</div>
