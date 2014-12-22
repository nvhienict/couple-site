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
                .fancybox-title iframe {
                    min-height: 30px;
                    vertical-align: middle;
                }
            </style>

</head>
<div>
    <div class="partion" style="padding-top:0px;">
                 
        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}" id = "nameTitle{{$tabWeb->id}}" > {{$tabWeb->title}}</h3>  
        <div class="show-content phara{{$tabWeb->id}}">                            
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
        </div> 
        <div class="col-xs-3"></div>
         
        <div class="row phara-margin">
            <div class="col-xs-4"></div>
            <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
                
                <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>               
        </div>
       
        

    </div>
    <div class="partion">
        <div class="row phara-margin">
            <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
            @if($albums)
            <div class="col-xs-3"></div>
                @foreach($albums as $index => $album)
                    <div class="col-xs-1 images-padding">
                        <a class="fancybox" href="{{Asset("{$album->photo}")}}">
                            <img style="width:100%;height:100px;" src="{{Asset("{$album->photo}")}}" alt="" />
                        </a>
                    </div>
                @endforeach
            <div class="col-xs-3"></div>
            @endif
        </div>
        <div class="row phara-margin">
            <div class="col-xs-7">
            </div>
            <div class="col-xs-1 click-edit ">
                <span><a onclick="send_id_album({{$tabWeb->id}})" class="btn btn-primary" style="background: #19b5bc; border:none;" data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);">Thêm Ảnh</a></span>
            </div>               
        </div>
        <div class="row phara-margin">
            <div class="col-xs-8"></div>
            <div class="col-xs-1 ok-edit ">
                <span><a class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a></span>
                <span><a class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
            </div>
        </div> 
    </div>
</div>




     