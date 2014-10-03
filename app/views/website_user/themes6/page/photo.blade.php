


<head>
    <!--  Slide Album -->

            <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>
            <script src="{{Asset('assets/js/bootstrap.3.2.0.min.js')}}"></script>

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
            </style>

</head>
<div class="col-xs-8 partion ">
    <div class="row phara-margin ">
            <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}" id = "nameTitle{{$tabWeb->id}}">{{$tabWeb->title}}</h3> 
        <div class="show-content phara{{$tabWeb->id}}">                            
            <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
        </div>           
        
    </div>                   
     <br>
     <br>
     <br>
     <div class="row phara-margin ">     
            <?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
                @if($check>0)
                <div class="row phara-margin">
                    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                    @foreach($albums as $album)
                        <div class="col-xs-3 images-padding">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
                                <img style="width:100%;height:100px;" src="{{Asset("{$album->photo}")}}" alt="" />
                            </a>
                        </div>
                    @endforeach
                </div>
                
                @else
                        
                        <div class="col-xs-3 images-padding">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("images/website/themes6/1.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/1.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-3 images-padding">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("images/website/themes6/2.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/2.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-3 images-padding">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("images/website/themes6/3.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/3.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-3 images-padding">
                            <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("images/website/themes6/4.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/4.jpg")}}" alt="" />
                            </a>
                        </div>
                   
                @endif
           

          
        
       
   
     </div>     
<br>
<br>
<br> 
</div>