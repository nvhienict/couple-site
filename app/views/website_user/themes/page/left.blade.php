<div class="partion">
    <div class="row">
        <h3 class="text-center title-tab" >{{$tabWeb->title}}</h3>
        <div class="col-xs-6 float-left">
            <span>
                <a href="#">
                    <?php
                        $gh=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                    ?>
                <img class="img-responsive" src="{{Asset("images/website/background/{$gh->photo}")}}" alt="">
                </a>
            </span>
        </div>
        <div class="show-content phara{{$tabWeb->id}}">
            <p>{{$tabWeb->content}}</p>
        </div>
    </div>
</div>