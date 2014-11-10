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
    </style>

    <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes14-edit.css")}}">
   
</head>
<script type="text/javascript">
        function showckeditor(id){
                var text=$('.phara'+id).html();
                $('.phara'+id).hide();
                CKEDITOR.instances['editor'+id].setData(text);

                $('.editphara'+id).addClass("col-xs-12 col-sm-5 col-md-5 col-lg-5");
                $('.editphara'+id).show();
                $('.click-edit-hide'+id).hide();
                $('.ok-edit-show'+id).show();
            }
        function showckeditor_text(id){
                var text=$('.phara'+id).html();
                $('.phara'+id).hide();
                CKEDITOR.instances['editor'+id].setData(text);

                $('.editphara'+id).addClass("col-xs-12 col-sm-12 col-md-12 col-lg-12");
                $('.editphara'+id).show();
                $('.click-edit-hide'+id).hide();
                $('.ok-edit-show'+id).show();
            }
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
        function exitckeditor(id){
                $('.editphara'+id).hide();
                $('.phara'+id).show();
                $('.click-edit-hide'+id).show();
                $('.ok-edit-show'+id).hide();
        } 

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


<!-- <img src="{{Asset("{$backgrounds}")}}" class=" img-responsive" alt="Image">   -->
<div class="content_temp_slide">
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
                            <li data-target="#myCarousel"  data-slide-to="{{$index+1}}"><a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}"  role="tab" data-toggle="tab">{{$tab->title}}</a></li> 
                        @endforeach()
                  </ul>
               </div>
           
          </nav>
        </div>
          <!-- Wrapper for slides -->
        <div class="carousel-inner slide_edit_temp">           
           
            <div class="item active">                  
                 @include('website_user.themes14.edit.main')         
        
            </div><!-- End Item -->
        @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)     
            @if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
                 <div class="item">
                    @include('website_user.themes14.edit.left')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="about" && $tabWeb->visiable==0 )
                 <div class="item">
                    @include('website_user.themes14.edit.about_us')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )  
               <div class="item">
                    @include('website_user.themes14.edit.text')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="wedding" && $tabWeb->visiable==0 ) 
            <div class="item">
              @include('website_user.themes14.edit.left')
            </div>
          @endif 
          @if($tabWeb->type =="traval" && $tabWeb->visiable==0 )  
            <div class="item">
              @include('website_user.themes14.edit.right')
            </div>
          @endif 
          @if($tabWeb->type =="album" && $tabWeb->visiable==0 ) 
            <div class="item">
              @include('website_user.themes14.edit.photo')
            </div>
          @endif 
          @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
            <div class="item">
              @include('website_user.themes14.edit.contact')
            </div>  
          @endif
        @endforeach         
       </div>   
    </div>
</div>  
  

@endforeach
@endif

</html>

