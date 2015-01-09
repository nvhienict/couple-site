<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>    
    <script type="text/javascript" src="{{Asset("assets/slide/f-slide.js")}}"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes14-edit.css")}}">
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


<!-- <img src="{{Asset("{$backgrounds}")}}" class=" img-responsive" alt="Image">   -->
<div class="content_temp_slide">
  @if($website)
  @foreach( $website as $website_item )
      
     <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="row container" >
            <nav class="navbar navbar-default side-nav-menu" role="navigation" style="position:fixed;width:103%;" >
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
                          <li data-target="#myCarousel"  data-slide-to="{{$index+1}}" class="menu-id{{$tab->id}}"><a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}"  role="tab" data-toggle="tab">{{$tab->title}}</a></li> 
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
        </div>
          <!-- Wrapper for slides -->
        <div class="carousel-inner slide_edit_temp">           
           
            <div class="item active">                  
                 @include('website_user.themes14.edit.main')         
        
            </div><!-- End Item -->
        @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)     
            @if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
                 <div class="item r-title{{$tabWeb->id}}">
                    @include('website_user.themes14.edit.left')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="about" && $tabWeb->visiable==0 )
                 <div class="item r-title{{$tabWeb->id}}">
                    @include('website_user.themes14.edit.about_us')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )  
               <div class="item r-title{{$tabWeb->id}}">
                    @include('website_user.themes14.edit.text')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="guestbook" && $tabWeb->visiable==0 )
                 <div class="item r-title{{$tabWeb->id}}">
                    @include('website_user.themes14.edit.guestbook')
                </div><!-- End Item -->
            @endif
            @if($tabWeb->type =="wedding" && $tabWeb->visiable==0 ) 
            <div class="item r-title{{$tabWeb->id}}">
              @include('website_user.themes14.edit.left')
            </div>
          @endif 
          @if($tabWeb->type =="traval" && $tabWeb->visiable==0 )  
            <div class="item r-title{{$tabWeb->id}}">
              @include('website_user.themes14.edit.right')
            </div>
          @endif 
          @if($tabWeb->type =="album" && $tabWeb->visiable==0 ) 
            <div class="item r-title{{$tabWeb->id}}">
              @include('website_user.themes14.edit.photo')
            </div>
          @endif 
          @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
            <div class="item r-title{{$tabWeb->id}}">
              @include('website_user.themes14.edit.contact')
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

