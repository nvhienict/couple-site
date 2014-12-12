<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">
  
  <title>{{$firstname}}'s wedding</title>

    <script src="{{Asset("assets/js/jquery.min.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/js/bootstrap.min.js")}}"></script>
   
   
    
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

        .fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style]
         {width: 100% !important;}
        .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
        {width: 100% !important;}
    </style>

    <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes20-edit.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
   
</head>
<script type="text/javascript">
      
    jQuery(document).ready(function($) {
            $('a.scrollTo').click(function () {
            $('.design_website_content_right').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
            return false;
        });
    });

    
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




  @if($website)
  @foreach( $website as $website_item )       
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
                        <li class="active always-visible"><a href="#home" role="tab"  data-toggle="tab">Trang chủ</a></li>                                               
                        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $index=>$tab)
                            <li ><a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}"  role="tab" data-toggle="tab">{{$tab->title}}</a></li> 
                        @endforeach()
                  </ul>
               </div>
           
          </nav>
    
          <!-- Wrapper for slides -->
        <div class="row tab-content  slide_edit_temp">           
           
            <div class="tab-pane active" id="home">

                 @include('website_user.themes20.edit.main')         
        
            </div><!-- End Item -->
        @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)     
            @if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
                 <div class="tab-pane" id="{{$tabWeb->type}}">
                    @include('website_user.themes20.edit.left')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="about" && $tabWeb->visiable==0 )
                 <div class="tab-pane" id="{{$tabWeb->type}}">
                    @include('website_user.themes20.edit.about_us')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )  
               <div class="tab-pane" id="{{$tabWeb->type}}">
                    @include('website_user.themes20.edit.text')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="guestbook" && $tabWeb->visiable==0 )
                 <div class="tab-pane" id="{{$tabWeb->type}}">
                    @include('website_user.themes20.edit.guestbook')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="wedding" && $tabWeb->visiable==0 ) 
            <div class="tab-pane" id="{{$tabWeb->type}}">
              @include('website_user.themes20.edit.left')
            </div>
          @endif 
          @if($tabWeb->type =="traval" && $tabWeb->visiable==0 )  
            <div class="tab-pane" id="{{$tabWeb->type}}">
              @include('website_user.themes20.edit.right')
            </div>
          @endif 
          @if($tabWeb->type =="album" && $tabWeb->visiable==0 ) 
            <div class="tab-pane" id="{{$tabWeb->type}}">
              @include('website_user.themes20.edit.photo')
            </div>
          @endif 
          @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
            <div class="tab-pane" id="{{$tabWeb->type}}">
              @include('website_user.themes20.edit.contact')
            </div>  
          @endif
        @endforeach         
       </div>   
     

@endforeach
@endif

</html>

