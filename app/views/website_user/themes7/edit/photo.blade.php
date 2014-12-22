
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
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-photo">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-photo-temp">
        <h2 class="text-center section-title section-title-photo" >
        	Album ảnh
    	</h2>
        <div onclick="showckeditorpartion({{$tabWeb->id}})" class="show-content phara{{$tabWeb->id}}" >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>                                      
        </div>      
        
        <div class="phara-margin float-right" style="margin-right:15%">      
            <div class="click-edit click-edit-hide{{$tabWeb->id}}" >            
                 <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>
        </div>
       
                     
    </div>
    
     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 photoslide-temp ">     
            <?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
                @if($check>0)
                <div class="row phara-margin">
                    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                    @foreach($albums as $album)
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding remove_image{{$album->id}}">
                            <a class="fancybox" href="{{Asset("{$album->photo}")}}">
                                <img class="img-responsive"  src="{{Asset("{$album->photo}")}}" alt="" />
                            </a>
                        </div>
                    @endforeach
                </div>
                
                @else
                        
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes7/1.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes7/1.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes7/2.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes7/2.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes7/3.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes7/3.jpg")}}" alt="" />
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 images-padding">
                            <a class="fancybox" href="{{Asset("images/website/themes7/4.jpg")}}">
                                <img class="img-responsive" src="{{Asset("images/website/themes7/4.jpg")}}" alt="" />
                            </a>
                        </div>
                   
                @endif
           

             <div class="phara-margin float-right" style="margin-right:15%">
            
                <div class="click-edit click-edit-hide " >
                     <span><a  onclick="send_id_album({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);"></a></span>
                       
                </div>
            </div>
            <div class=" phara-margin float-right" style="margin-right:15%">      
                <div class=" ok-edit ok-edit-show ">
                    <span>
                       <span><a  class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a></span>
                        <span><a class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    </span>
                    
                </div>
            </div>
              
     </div>     

</div>