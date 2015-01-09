<head>

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes11.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">

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
    <script type="text/javascript">
        $('.carousel.slide').carousel({
            interval: 200000
        });
            </script>

</head>
    
@if($website)
    @foreach( $website as $website_item )
    <nav style="padding:0px;" class="navbar navbar-default navbar-fixed-top navbar-main" role="navigation">
       <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" 
             data-target="#example-navbar-collapse">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
          </button>
       </div>
       <div class="collapse navbar-collapse" id="example-navbar-collapse">
          <ul class="nav navbar-nav">
             <li><a href="#" data-target="#myCarousel" data-slide-to="0" class="active">Trang Chủ</a></span></li>
            @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $i=>$menu_tab)
             <li id="{{$i+2}}" class="clink">
                <a href="#" data-target="#myCarousel" data-slide-to="{{$i+1}}">{{$menu_tab->title}}</a>
            </li>
             @endforeach()
            <li  class="dropdown" role="presentation">
              <a  class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                <span class="glyphicon glyphicon-wrench"></span><span class="caret"></span>
              </a>
              <ul class="dropdown-menu setting-edit" role="menu">
                  <li><a  href="{{URL::route('index')}}">Dashboard</a></li>
                  <li role="presentation" class="divider"></li>
                  <li><a target="_blank" href="{{URL::route('view-previous',array($id_tmp))}}">Xem trước</a></li>
                  <li role="presentation" class="divider"></li>
                  <li><a href="{{URL::route('change_temp')}}">Thay đổi giao diện</a></li>
                  <li role="presentation" class="divider"></li>
                  <li><a href="javascript:void(0);" data-toggle="modal" data-target="#change-bg-edit" data-backdrop="static">Thay đổi hình nền</a></li>
                  <li role="presentation" class="divider"></li>
                  <li><a href="javascript:void(0);" data-toggle="modal" data-target="#album-photo-user" data-backdrop="static">Album ảnh</a></li>
                  <li role="presentation" class="divider"></li>
                  <li><a onclick="loadURL()" href="javascript:void(0);" data-toggle="modal" data-target="#change-url-user">Cài đặt URL</a></li>
              </ul>
            </li>

              
          </ul>
       </div>
    </nav>

    <div id="home" class="header">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false" style="margin-top: 0px; top: 53px;">
            <div class="carousel-inner bg-slide" style="margin-top: 0px;">

                <div class="item active">                   
                    <div id="slide1" class="masonry container margin-partion" style="min-height:550px;" >
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <figure id="prev_outputcc222" class="text-center">
                                <a href="#">
                                    @if(($website_item->avatar_groom))
                                    <img  style="height:350px; width:350px; margin:0 auto;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_groom")}}">
                                    @else
                                    <img  style="height:350px; width:350px;  margin:0 auto;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/boy.jpg')}}">
                                    @endif
                                </a>
                                <button onclick="send_id(0,222)"  data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
                            </figure>
                            <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-bg name-groom">{{$website_item->name_groom}}</h3>
                            <p class="about-groom text-center">{{$website_item->about_groom}} </p>
                            <div class="text-center icon-infor"><a onclick="editInforGroom()"data-toggle="modal" data-target="#edit-infor-groom" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
                            <hgroup>
                                <h2 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};"> Ours Wedding </h2>
                                <h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-g">
                                    {{$website_item->name_groom}}
                                </h1>
                                <h6 class="text-center" style="font-size:20px;">&</h6>
                                <h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-b">
                                    {{$website_item->name_bride}}
                                </h1>
                                <h6 class="text-center" style="font-size:20px;">on</h6>
                                <h3 class="text-center title-tab" style="color: #{{$website_item->color1}}">
                                    @if(Session::has('email'))
                                        {{WebsiteController::getDates()}}
                                    @else
                                        {{$date_url}}
                                    @endif
                                </h3>
                            </hgroup>
                            <span class="text-center " style="color:#FF4FD0;">
                                Hân hạnh mời các bạn đến với chúng tôi.
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <figure id="prev_outputcc111" class="theme-border-big border text-center">
                                    <a href="#">
                                        @if(($website_item->avatar_bride))
                                        <img style="height:350px; width:350px; margin:0 auto;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_bride")}}">
                                        @else
                                        <img style="height:350px; width:350px; margin:0 auto;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/girl.jpg')}}">
                                        @endif
                                    </a>
                                    <button onclick="send_id(0,111)"  data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
                                </figure>
                                <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-tab title-bg name-bride">{{$website_item->name_bride}}</h3>
                                <p class="about-bride text-center">{{$website_item->about_bride}}</p>
                                <div class="text-center icon-infor"><a onclick="editInforBride()" data-toggle="modal" data-target="#edit-infor-bride" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
                        </div>

                    </div>
                </div>
        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $i=>$tabWeb)

            @if($tabWeb->type=="welcome" )
               @include('website_user.themes11.edit.left')
             @endif

             @if($tabWeb->type=="about" )
                @include('website_user.themes11.edit.left')
            @endif

            @if($tabWeb->type=="wedding")
                @include('website_user.themes11.edit.left')
            @endif

            @if($tabWeb->type=="traval" )
                @include('website_user.themes11.edit.left')
            @endif

            @if($tabWeb->type=="album")
             @include('website_user.themes11.edit.photo') 
           
            @endif

            @if($tabWeb->type=="contact")
                @include('website_user.themes11.edit.contact')                
            @endif

            @if($tabWeb->type=="guestbook" )
                @include('website_user.themes11.edit.guestbook')
            @endif

            @if($tabWeb->type=="love_story" )
            @include('website_user.themes11.edit.left')
            @endif

                
        @endforeach 
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-footer">
        <footer>
            <div class="">
                <div class="aligncenter copyright">
                    <div class="footer-contact col-xs-12">
                        <p>Connect 
                            <a href="mailto:example@email.com">thanh@thuna.vn</a> 
                            0966666886
                        </p>
                        <ul id="dt-sc-social-icons">
                            <li>    
                                <a target="_blank" class="fa fa-twitter" href="https://www.facebook.com/thuna.weddingplaner?fref=ts"></a>
                            </li>
                            <li >
                                <a target="_blank" class="fa fa-youtube tb" href="https://www.youtube.com/channel/UCiKbAYqN2YUUKRkRHukt7SA"></a>
                            </li>
                            <li>    
                                <a target="_blank" class="fa fa-facebook " href="https://www.facebook.com/thuna.weddingplaner?fref=ts"></a>
                            </li>
                            <li>    
                                <a target="_blank" class="fa fa-google-plus fb" href="https://plus.google.com/u/0/+Thunaplannerwedding"></a>
                            </li>
                        </ul>
                    </div>                  
                                               
                    <p class="col-xs-12">{{$website_item->name_groom}} &amp; {{$website_item->name_bride}} on 
                            @if(Session::has('email'))
                                {{WebsiteController::getDates()}}
                            @else
                                {{$date_url}}
                            @endif. 
                            Site design by 
                        <a title="" href="http://thuna.vn"> 
                            Thuna.vn
                         </a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    @endforeach
@endif
