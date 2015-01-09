
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
<div class="col-xs-8 partion r-title{{$tab->id}}">
    <div class="row phara-margin ">
            <div class="inline-title text-center">
                <h3 class="text-center title-tab" style="font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" id = "nameTitle{{$tab->id}}">
                    {{$tab->title}}
                </h3>
            <span onclick="sendTitle({{$tab->id}},{{$tab->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
        </div>
        <div  class="show-content phara{{$tab->id}}" onclick="showckeditorpartion({{$tab->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static">                            
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tab->content}}</span>
        </div>   
        
        <div class="row phara-margin float-right">      
            <div class="click-edit click-edit-hide{{$tab->id}}" >            
              
                <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tab->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>
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
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding remove_image{{$album->id}}">
                            <a class="fancybox" href="{{Asset("{$album->photo}")}}">
                                <img style="width:100%;height:100px;" src="{{Asset("{$album->photo}")}}" alt="" />
                            </a>
                        </div>
                    @endforeach
                </div>
                
                @else
                        
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes6/1.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/1.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes6/2.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/2.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes6/3.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/3.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes6/4.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes6/4.jpg")}}" alt="" />
                            </a>
                        </div>
                   
                @endif
   
     </div>     
<br>
<br>
<br> 
</div>