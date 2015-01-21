<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">

    <title>{{$firstname}}'s wedding</title>

    <script src="{{Asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{Asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>

    <script src="{{Asset("assets/js/themes11.js")}}"></script>

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
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
</head>
<body>
@if($website)
    @foreach( $website as $website_item )
    <div class="navbar-wrapper">
          <div class="container">
            <div class="navbar navbar-inverse navbar-fixed-top slide-menu" role="navigation">
              <div class="container">
                <div class="navbar-header">
                  <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <div class="navbar-collapse collapse nav-themes11">
                  <ul class="nav navbar-nav navbar-right text-center">
                    <li id="s1" class="clink">
                        <a href="#" data-target="#myCarousel" data-slide-to="0" class="active">Trang chủ</a>
                    </li>
                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $i=>$menu_tab)
                    <li id="{{$i+2}}" class="clink"><a href="#" data-target="#myCarousel" data-slide-to="{{$i+1}}"> {{$menu_tab->title}} </a></li>
                    @endforeach()
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

    <div id="home" class="header">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner bg-slide">

                <div class="item active">                   
                    <div id="slide1" class="masonry container margin-partion" >
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <figure class="">
                                <a href="#">
                                    @if(($website_item->avatar_groom))
                                    <img  style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_groom")}}">
                                    @else
                                    <img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/boy.jpg')}}">
                                    @endif
                                </a>
                            </figure>
                            <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-bg name-g">{{$website_item->name_groom}}</h3>
                            <p class="about-g text-center">{{$website_item->about_groom}} </p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <hgroup>
                                <h2 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};"> Ours Wedding </h2>
                                <h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-groom">
                                    {{$website_item->name_groom}}
                                </h1>
                                <h6 class="text-center" style="font-size:20px;">&</h6>
                                <h1 style="font-family: 'Great Vibes',cursive; text-transform: uppercase; color: #{{$website_item->color2}};" class="font-name text-center name-bride">
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
                                Hân hạnh mời các bạn đến tham dự cùng chúng tôi.
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <figure class="theme-border-big border">
                                    <a href="#">
                                        @if(($website_item->avatar_bride))
                                        <img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_bride")}}">
                                        @else
                                        <img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/girl.jpg')}}">
                                        @endif
                                    </a>
                                </figure>
                                <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-tab title-bg name-b">{{$website_item->name_bride}}</h3>
                                <p class="about-b text-center">{{$website_item->about_bride}}</p>
                        </div>

                    </div>
                </div>
        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)

            @if($tabWeb->type=="welcome" )

                <div class="item">                   
                    <div id="slide2" class="masonry container margin-partion" >
                        <div class="post-box2 col-sx-12 col-lg-6 col-md-6 col-sm-6 bg-images "> 
                            <?php 
                                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                                 ?>
                            @if($images)
                                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                            @else 
                                <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                            @endif
                        </div>
                        <div class="post-box2 col-sx-12 col-lg-6 col-md-6 col-sm-6 "> 
                            <h3 class="title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                                {{$tabWeb->title}}
                            </h3>
                             <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
                        </div>                          
                    </div>
                </div>
             @endif
             @if($tabWeb->type=="about" )
                <div class="item">                  
                    <div id="slide3" class="masonry container margin-partion">
                        <div class="post-box3 ccol-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                            <?php 
                                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                                 ?>
                            @if($images)
                                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                            @else 
                                <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                            @endif
                        </div>
                        <div class="post-box3 col-sx-12 col-lg-6 col-md-6 col-sm-6 "> 
                            <h3 class="title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                                {{$tabWeb->title}}
                            </h3>
                             <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
                        </div>
                    </div>
                </div>
                @endif

                @if($tabWeb->type=="wedding")

                <div class="item">                  
                    <div id="slide4" class="masonry container margin-partion">
                        <div class="post-box4 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                           <?php 
                                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                                 ?>
                            @if($images)
                                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                            @else 
                                <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                            @endif
                        </div>
                        <div class="post-box4 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                            <h3 class="title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                                {{$tabWeb->title}}
                            </h3>
                             <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
                        </div>
                    </div>
                </div>
                @endif

                @if($tabWeb->type=="traval" )
                <div class="item">                  
                    <div id="slide5" class="masonry container margin-partion">
                        <div class="post-box5 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                           <?php 
                                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                                 ?>
                            @if($images)
                                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                            @else 
                                <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                            @endif
                        </div>
                        <div class="post-box5 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                            <h3 class="title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                                {{$tabWeb->title}}
                            </h3>
                             <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
                        </div>
                    </div>
                </div>
                @endif

                @if($tabWeb->type=="album")
                <div class="item">                  
                    <div id="slide6" class="masonry container margin-partion">
                        <div class="post-box6 col-sx-12 col-lg-12 col-md-12 col-sm-12 "> 
                            <h3 class="title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                                {{$tabWeb->title}}
                            </h3>
                             <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
                        </div>
                        <div class="post-box6 col-sx-12 col-lg-12 col-md-12 col-sm-12" style="margin-top:20px;"> 
                           <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                                @if($albums)
                                    @foreach($albums as $album)
                                        <div class="col-sx-4 col-lg-3 col-md-3 col-sm-3 images-padding remove_image{{$album->id}}">
                                            <a class="fancybox" href="{{Asset("{$album->photo}")}}">
                                                <img class="img-responsive" src="{{Asset("{$album->photo}")}}" alt="" />
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                        </div>
                        
                    </div>
                </div>
                @endif

                @if($tabWeb->type=="contact")

                <div class="item">                  
                    <div id="slide7" class="masonry container margin-partion">
                        <div class="post-box7 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                           <form  class="contact-website" action="" method="POST" role="form">           
                               <div class="form-group">
                                   <label for="">From</label>
                                   <input  type="text" class="form-control" id="" placeholder="Your Name">
                               </div>
                               <div class="form-group">
                                   <label for="">Email</label>
                                   <input type="text" class="form-control" id="" placeholder="Email Adress Your">
                               </div>
                               <div class="form-group">
                                   <label for="">Subject</label>
                                   <input type="text" class="form-control" id="" placeholder="Subject">
                               </div>
                               <div class="form-group">
                                   <label for="">Mesages</label>
                                   <textarea type="text" class="form-control" id="" placeholder=Messages></textarea>
                               </div>  
                                <button type="submit" class="btn btn-primary send-contact">Send Mesages</button>                          
                           </form> 
                        </div>
                        <div class="post-box7 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                           <h3 class="title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                                {{$tabWeb->title}}
                            </h3>
                             <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
                        </div>
                    </div>
                </div>
                @endif

                @if($tabWeb->type=="guestbook" )
                    @include('website_user.themes11.page.guestbook')
                @endif

                @if($tabWeb->type=="love_story" )
                <div class="item">                  
                    <div id="slide9" class="masonry container margin-partion">
                        <div class="post-box9 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                            <?php 
                                $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                                 ?>
                            @if($images)
                                <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                            @else 
                                <img  class="img-responsive" src="{{Asset("images/website/themes1/images.jpg")}}" alt="">

                            @endif
                        </div>
                        <div class="post-box9 col-sx-12 col-lg-6 col-md-6 col-sm-6"> 
                            <h3 class="title-tab" style="text-align: {{$tabWeb->titlestyle}} font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                                {{$tabWeb->title}}
                            </h3>
                             <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span> 
                        </div>
                    </div>
                </div>
                @endif

                
            @endforeach 
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bg-footer">
        <footer>
            <div class="container">
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
<script type="text/javascript">
    $('.carousel').carousel({
      interval: 200000
    })
</script>

</body>