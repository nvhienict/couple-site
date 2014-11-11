<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dịch vụ cưới hỏi chuyên nghiệp">
    <meta name="author" content="Thuna.vn">

    <title>{{$firstname}}'s wedding</title>

   
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <script src="{{Asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="{{Asset("assets/js/jquery.min.js")}}"></script>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes7-edit.css")}}">
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
    <div class="row">
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
                            <li><a href="#{{$tab->type}}" class="{{$tab->id}} TT{{$tab->id}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>                
                        @endforeach()
                      </ul>
                   </div>
            </nav>
         </div>    
     </div>  
     <div class="container"> 
        <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 tab-content "> 
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
  @endforeach
  @endif    
  
    