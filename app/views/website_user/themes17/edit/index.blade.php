<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>  
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

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes17-edit.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
   
</head>
<script type="text/javascript">
    
    $('.side-nav li').click(function(e) {
        $('.side-nav li.active').removeClass('active');
        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        e.preventDefault();
    });

    function updateName()
        {
            var nameBride = $('input[name=name_bride]').val();
            var nameGroom = $('input[name=name_groom]').val();
            $.ajax({
                type:"post",
                dataType: "html",
                url:"{{URL::route('updateName')}}",
                data: {nameBride: nameBride,
                        nameGroom: nameGroom},
                success:function(data){
                    var obj = JSON.parse(data);
                    $('#topNameGroom').text(obj['name_groom']);
                    $('#topNameBride').text(obj['name_bride']);
                    $('#titleNameGroom').text(obj['name_groom']);
                    $('#titleNameBride').text(obj['name_bride']);
                }
            });

          
        }

</script>



<div class="content_temp_slide background-themes" style="background-image: url({{Asset("images/website/themes17/temp_17.jpg")}});">
  @if($website)
  @foreach( $website as $website_item )
      
     <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="row container" >
            <nav class="navbar navbar-default side-nav-menu" role="navigation" style="position:fixed;width:100%;" >
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
                  <ul style="width:100%;" class="nav navbar-nav side-nav">
                        <li data-target="#myCarousel" data-slide-to="0" class="active always-visible"><a href="#" role="tab"  data-toggle="tab">Trang chủ</a></li>                                               
                        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $index=>$tab)
                        <li class="menu-id{{$tab->id}}" data-target="#myCarousel"  data-slide-to="{{$index+1}}"><a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}"  role="tab" data-toggle="tab">{{$tab->title}}</a></li> 
                        @endforeach()
                        <li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
                        <li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
                  </ul>
               </div>
           
          </nav>
        </div>
          <!-- Wrapper for slides -->
        <div class="carousel-inner slide_edit_temp">           
           
            <div class="item active">                  
                 @include('website_user.themes17.edit.main')         
        
            </div><!-- End Item -->
        @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)     
            @if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
                 <div class="item">
                    @include('website_user.themes17.edit.left')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="about" && $tabWeb->visiable==0 )
                 <div class="item">
                    @include('website_user.themes17.edit.about_us')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )  
               <div class="item">
                    @include('website_user.themes17.edit.text')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="guestbook" && $tabWeb->visiable==0 )
                 <div class="item">
                    @include('website_user.themes17.edit.guestbook')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="wedding" && $tabWeb->visiable==0 ) 
            <div class="item">
              @include('website_user.themes17.edit.left')
            </div>
          @endif 
          @if($tabWeb->type =="traval" && $tabWeb->visiable==0 )  
            <div class="item">
              @include('website_user.themes17.edit.right')
            </div>
          @endif 
          @if($tabWeb->type =="album" && $tabWeb->visiable==0 ) 
            <div class="item">
              @include('website_user.themes17.edit.photo')
            </div>
          @endif 
          @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
            <div class="item">
              @include('website_user.themes17.edit.contact')
            </div>  
          @endif
        @endforeach         
       </div>   
    </div>
</div>  
  

@endforeach
@endif

<script type="text/javascript">
  $('.modal').appendTo("body");
</script>

</html>

