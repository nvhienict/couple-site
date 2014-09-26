<br>
<div class="col-xs-8 partion">
    <div class="row phara-margin">
        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}} " id = "nameTitle{{$tabWeb->id}}">
            {{$tabWeb->title}}
        </h3>
        <div class="col-xs-6 float-left">
            <span> 
                <a href="#">
                    <?php 
                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes6/tab_temp_6.jpg")}}" alt="">

                @endif
                </a>
            </span>           
        </div>
        
    </div>
    
    <br>
</div>