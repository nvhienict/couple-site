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

    <script src="{{Asset("assets/js/theme11.js")}}"></script>

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes11.css")}}">

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

    <script type="text/javascript">
                function updateckeditor(id){
                //var t= CKEDITOR.instances['editor4'].getData();alert(t);
                $.ajax({
                    type:"post",
                    dataType: "html",
                    url:"{{URL::route('update_content_tab')}}",
                    data: { content:CKEDITOR.instances['editor'+id].getData(),
                            id_tab:$('.get_id'+id).val()
                        },
                    success:function(data){
                        var obj = JSON.parse(data);
                        $('.phara'+id).html(obj.content);   
                    }
                });
                    $('.editphara'+id).hide();
                    $('.phara'+id).show();
                    $('.click-edit-hide'+id).show();
                    $('.ok-edit-show'+id).hide();
            }  
             </script>   
</head>
<body>
    <script type="text/javascript">
        $('.carousel.slide').carousel({
            interval: 200000
});
    </script>
@if($website)
    @foreach( $website as $website_item )

        <div class="row header navbar_edits" style="width: 75.5%; margin: 0px; padding-left: 0px; padding-right: 0px;  position: fixed;z-index: 1000;">
                <!-- narbar -->
            <nav class="navbar-main "  id="" >
                <div class=" ">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 navbar-left nav-themes11">
                        <ul style="padding-left: 0px;">
                            <li style="padding-left: 5px; padding-right: 5px;"><a href="#" data-target="#myCarousel" data-slide-to="0" class="active" >Trang Chủ</a></li>
                            @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $i=>$menu_tab)
                            <li style="padding-left: 5px; padding-right: 5px;" id="{{$i+2}}" class="clink">
                                <a href="#" data-target="#myCarousel" data-slide-to="{{$i+1}}">{{$menu_tab->title}}</a>
                            </li>
                            @endforeach()
                        </ul>
                        
                    </div>                   
                </div>
            </nav>
            <!-- end narbar -->
        </div>

    <div id="home" class="header">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false" style="margin-top: 0px; top: 53px;">
            <div class="carousel-inner bg-slide" style="margin-top: 0px;">

                <div class="item active">                   
                    <div id="slide1" class="masonry margin-partion" style="min-height:480px;" >
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <figure class="text-center">
                                <a href="#">
                                    @if(($website_item->avatar_groom))
                                    <img  class="img-responsive img-circle" src="{{Asset("$website_item->avatar_groom")}}">
                                    @else
                                    <img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/boy.jpg')}}">
                                    @endif
                                </a>
                                <button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
                            </figure>
                            <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-bg name-g">{{$website_item->name_groom}}</h3>
                            <p class="about-g text-center">{{$website_item->about_groom}} </p>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
                            <figure class="theme-border-big border text-center">
                                    <a href="#">
                                        @if(($website_item->avatar_bride))
                                        <img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset("$website_item->avatar_bride")}}">
                                        @else
                                        <img style="width: 350px;height: 350px;" class="img-responsive img-circle" src="{{Asset('images/website/themes1/girl.jpg')}}">
                                        @endif
                                    </a>
                                    <button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
                                </figure>
                                <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-tab title-bg name-b">{{$website_item->name_bride}}</h3>
                                <p class="about-b text-center">{{$website_item->about_bride}}</p>
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
                @include('website_user.themes11.edit.left')
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


</body>