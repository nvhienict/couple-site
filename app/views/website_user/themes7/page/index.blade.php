<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$firstname}}'s wedding</title>
    <meta name="description" content="Tạo website cưới miễn phí">
    <meta name="author" content="Thuna.vn">
    <meta property="og:title" content="{{$firstname}}'s wedding">
    <meta property="og:description" content="Chào mừng đến với website cưới của chúng tôi">
    <meta property="og:url" content="http://thuna.vn/website/{{$url}}">
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{Asset("{$web_fb}")}}" />
  
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap/bootstrap.min.css")}}">
    <script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{Asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>
    <script src="{{Asset("assets/js/jquery.scrollTo.js")}}"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/template-font.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes7.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=943743042306339&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script>
    $(document).ready(function() {
        $('.fb-share-button').attr("data-href", document.URL);
    });
</script>
@if($website)
@foreach( $website as $website_item )
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <nav class="navbar navbar-default navbar-fixed-top side-nav-menu" role="navigation">
           <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" 
                 data-target="#example-navbar-collapse">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
              </button>
           </div>
           <div  class="collapse navbar-collapse" id="example-navbar-collapse">
              <ul class="nav navbar-nav side-nav">                 
                    <li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
                        <li><a href="#{{$tab->type}}" class="{{$tab->id}} TT{{$tab->id}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>                
                    @endforeach()
              </ul>
           </div>
    </nav>
</div>
<div class="container">        
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tab-content">
                <div class="row tab-pane active" id="home">                     
                    @include('website_user.themes7.page.main')                 
                </div> 
        @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)

                <!-- Welcome -->
                @if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
                    <div class="tab-pane" id="{{$tabWeb->type}}">
                        @include('website_user.themes7.page.left')
                    </div>                
                @endif

                <!-- About Us -->
                @if($tabWeb->type=="about" && $tabWeb->visiable==0)
                    <div class="tab-pane" id="{{$tabWeb->type}}">
                        @include('website_user.themes7.page.about_us')
                    </div>               
                @endif

                <!-- Wedding Event -->
                @if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
                    <div class="tab-pane" id="{{$tabWeb->type}}">
                        @include('website_user.themes7.page.left')
                    </div>              
                @endif

                 <!-- Travaling -->
                @if($tabWeb->type=="traval" && $tabWeb->visiable==0)
                    <div class="tab-pane" id="{{$tabWeb->type}}">
                     @include('website_user.themes7.page.right')
                    </div>           
                 @endif

                <!-- Photo Album -->
                @if($tabWeb->type=="album" && $tabWeb->visiable==0)
                    <div class="tab-pane" id="{{$tabWeb->type}}">
                        @include('website_user.themes7.page.photo')
                    </div>                              
                @endif

                @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
                    <div class="tab-pane" id="{{$tabWeb->type}}">
                     @include('website_user.themes7.page.guestbook')
                    </div>           
                @endif

                <!-- Contact Us -->
                @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
                <div class="tab-pane" id="{{$tabWeb->type}}">
                    @include('website_user.themes7.page.contact')
                </div>
                @endif

                <!-- cau chuyen tinh yeu -->
                @if($tabWeb->type=="love_story")
                   <div class="tab-pane" id="{{$tabWeb->type}}">
                        @include('website_user.themes7.page.text')
                    </div>               
                @endif            
             

            @endforeach          
    </div>
    
</div>
@endforeach
@endif 

<body>
</html>
