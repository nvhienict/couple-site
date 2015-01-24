
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 partion">
    <div class="row phara-margin">
         <h3 class="text-center title-tab" style="text-align: {{$tab->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}} " id = "nameTitle{{$tab->id}}">
            {{$tab->title}}
        </h3>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 float-left">
            <span> 
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
            <div class="btn-share">
                <div class="fb-share-button" data-layout="button"></div>
            </div>         
        </div>
         <div class="show-content phara{{$tab->id}}">
            <span style="color: #{{$website_item->color3}}">{{$tab->content}}</span>
        </div>
        
    </div>
    
    <br>
</div>