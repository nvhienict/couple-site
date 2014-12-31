<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes20-edit.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
    <script type="text/javascript" src="{{Asset("assets/slide/f-slide.js")}}"></script>
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }

    </style>
   
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
                            <li class="menu-id{{$tab->id}}" ><a class="{{$tab->id}} TT{{$tab->id}}" href="#{{$tab->type}}"  role="tab" data-toggle="tab">{{$tab->title}}</a></li> 
                        @endforeach()
                        <li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
                       <li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
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

