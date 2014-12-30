<head>
   
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes7-edit.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">
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

</head>
@if($website)
@foreach( $website as $website_item )
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <nav class="navbar navbar-default  side-nav-menu" role="navigation" style="position:fixed;width:100%; border-top-width: 0px; padding-top: 0px; padding-bottom: 0px;">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" 
                     data-target="#example-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
               </div>
               <div  class="collapse navbar-collapse" id="example-navbar-collapse" >
                  <ul class="nav navbar-nav side-nav" style="background-color:#EE7B74;">
                    <li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>
                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
                        <li class="menu-id{{$tab->id}}"><a href="#{{$tab->type}}" class="{{$tab->id}} TT{{$tab->id}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>                
                    @endforeach()
                        <li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
                        <li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>  
                  </ul>
               </div>
             </nav>
           
             <div class="container"> 
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tab-content "> 
                            <div class="row tab-pane active" id="home">                     
                                @include('website_user.themes7.edit.main')                 
                            </div>     
                            @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)

                            <!-- Welcome -->
                            @if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
                                <div class="tab-pane" id="{{$tabWeb->type}}">
                                    @include('website_user.themes7.edit.left')
                                </div>                
                            @endif

                            <!-- About Us -->
                            @if($tabWeb->type=="about" && $tabWeb->visiable==0)
                                <div class="tab-pane" id="{{$tabWeb->type}}">
                                    @include('website_user.themes7.edit.about_us')
                                </div>               
                            @endif

                            <!-- Wedding Event -->
                            @if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
                               <div class="tab-pane" id="{{$tabWeb->type}}">
                                    @include('website_user.themes7.edit.left')
                                </div>              
                            @endif

                             <!-- Travaling -->
                            @if($tabWeb->type=="traval" && $tabWeb->visiable==0)
                                <div class="tab-pane" id="{{$tabWeb->type}}">
                                 @include('website_user.themes7.edit.right')
                                </div>           
                            @endif

                            @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
                                <div class="tab-pane" id="{{$tabWeb->type}}">
                                 @include('website_user.themes7.edit.guestbook')
                                </div>           
                            @endif

                            <!-- Photo Album -->
                            @if($tabWeb->type=="album" && $tabWeb->visiable==0)
                                <div class="tab-pane" id="{{$tabWeb->type}}">
                                    @include('website_user.themes7.edit.photo')
                                </div>                              
                            @endif   

                            <!-- Contact Us -->
                            @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
                            <div class="tab-pane" id="{{$tabWeb->type}}">
                                @include('website_user.themes7.edit.contact')
                            </div>
                            @endif

                            <!-- cau chuyen tinh yeu -->
                            @if($tabWeb->type=="love_story")
                                <div class="tab-pane" id="{{$tabWeb->type}}">
                                    @include('website_user.themes7.edit.text')
                                </div>               
                            @endif            
                                                                    
                         

                        @endforeach                    
                        
                  
                </div>
            </div>
         </div>      
  @endforeach
  @endif    
  
    