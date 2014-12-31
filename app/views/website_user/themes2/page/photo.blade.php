<head>
    <!--  Slide Album -->

            <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>

            <!-- Add mousewheel plugin (this is optional) -->
            <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery.mousewheel-3.0.6.pack.js")}}"></script>

            <!-- Add fancyBox main JS and CSS files -->
            <script type="text/javascript" src="{{Asset("assets/slide/source/jquery.fancybox.js?v=2.1.3")}}"></script>
            <link rel="stylesheet" type="text/css"  href="{{Asset("assets/slide/source/jquery.fancybox.css?v=2.1.2")}}" media="screen" />

            <!-- Add Button helper (this is optional) -->
            <link rel="stylesheet" type="text/css" href="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.css?v=1.0.5")}}" />
            <script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.js?v=1.0.5")}}"></script>

            <!-- Add Media helper (this is optional) -->
            <script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-media.js?v=1.0.5")}}"></script>
            <script type="text/javascript" src="{{Asset("assets/slide/f-slide.js")}}"></script>
            <style type="text/css">
                .fancybox-custom .fancybox-skin {
                    box-shadow: 0 0 50px #222;
                }
                .fancybox-title iframe {
                    min-height: 30px;
                    vertical-align: middle;
                }
            </style>

</head>
<div>
    <div class="partion">                
        <h3 class="text-center title-tab">Album ảnh</h3>
        <div class="show-content phara{{$tabWeb->id}}">                            
        <p> {{$tabWeb->content}}</p>
        </div> 
    </div>
    <div class="partion">
        <div class="row phara-margin text-center">
            <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
            @if($albums)
                @foreach($albums as $album)
                    <div class="col-xs-1 images-padding">
                        <a class="fancybox" href="{{Asset("{$album->photo}")}}">
                            <img style="width:100%;height:100px;" src="{{Asset("{$album->photo}")}}" alt="" />
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
     