    <head>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/website/themes19.css")}}">
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
        .phara-margin{
            margin-left: 0px;
            margin-right: 0px;
        }
        .fancybox-title iframe {
            min-height: 30px;
            vertical-align: middle;
        }

    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script src="{{Asset("assets/js/map-themes.js")}}"></script>
    <script src="{{Asset('assets/js/jquery.scrollTo.js')}}"></script>
    <script type="text/javascript">
       var PostCodeid = "#Postcode";
        var longval = "#hidLong";
        var latval = "#hidLat";
        var geocoder;
        var map;
        var marker;
        var markersArray = [];
          function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;

            }

        }
        function initialize() {
            //MAP
            var initialLat = $(latval).val();
            var initialLong = $(longval).val();
            
            var latlng = new google.maps.LatLng(initialLat, initialLong);
            var options = {
                zoom: 16,
                center: latlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
        
            map = new google.maps.Map(document.getElementById("geomap"), options);  
                
            geocoder = new google.maps.Geocoder();    
        
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: latlng
            });
             google.maps.event.addListener(marker, 'click', function() {      
              infowindow.setContent(contentString);
              infowindow.open(map, marker);              
            });     
            google.maps.event.addListener(marker, "dragend", function (event) {
                var point = marker.getPosition();
                map.panTo(point);
            });
            markersArray.push(marker);
               google.maps.event.addListener(map, "click",function(event){

                var lat = event.latLng.lat();
                var lng = event.latLng.lng();
                $(latval).val(lat);
                $(longval).val(lng);
                $('#Postcode').val('');
                $.ajax({
                          type:"POST",
                          url:"{{URL::route('change-map')}}",
                          data:{
                              latitude: $('#hidLat').val(),
                              longitude: $('#hidLong').val()
                          },

                      });

                deleteOverlays();

                  marker = new google.maps.Marker({
                      position: event.latLng, 
                      title: 'Changer la position',
                      map: map,
                      draggable: true
                    });

  
                  markersArray.push(marker);
            });
        };
        
        $(document).ready(function () {
            
         
            
          $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            google.maps.event.trigger(map, 'resize');
            
          });
          $('#myTab a[href="#contact"]').on('shown', function(){
            google.maps.event.trigger(map, 'resize');
          });
             initialize();
           $("#geomap").css("height", 400);
            $('#findbutton').click(function (e) {
                var address = $(PostCodeid).val();
                geocoder.geocode({ 'address': address }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        map.setCenter(results[0].geometry.location);
                        marker.setPosition(results[0].geometry.location);
                        $(latval).val(marker.getPosition().lat());
                        $(longval).val(marker.getPosition().lng());
                        $.ajax({
                          type:"POST",
                          url:"{{URL::route('change-map')}}",
                          data:{
                              address : address,
                              latitude: $('#hidLat').val(),
                              longitude: $('#hidLong').val()
                          },

                      });
                    } else {
                        alert("Vui lòng nhập tên địa điểm");
                    }

                });
                e.preventDefault();
            });
        
            //Add listener to marker for reverse geocoding
            google.maps.event.addListener(marker, 'drag', function () {
                geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $(latval).val(marker.getPosition().lat());
                            $(longval).val(marker.getPosition().lng());
                            $("#cor").html(marker.getPosition().lat());
                        }
                    }
                });
            });
        
        });


        </script>
    </head>
    @if($website)
        @foreach( $website as $website_item )
        <!-- navbar -->
        <div class="row">
            <nav class="navbar navbar-default navbar-fixed-top navbar-main nav-themes19-default" role="navigation" style="padding:0px;">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" 
                     data-target="#example-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
               </div>
               <div  class="collapse navbar-collapse navbar-left " id="example-navbar-collapse">
                  <ul  class="nav navbar-nav nav-themes19" style="background-color:rgba(255, 255, 255, 0);">
                     <li><a class="a_menu scrollTo" href="#title_home" >Trang Chủ</a></li>
                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
                     <li class="menu-id{{$menu_tab->id}}"><a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></li>
                     @endforeach()
                    <li  class="dropdown" role="presentation">
                          <a  class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <span class="fa fa-wrench"></span><span class="caret"></span>
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
        <!-- end navbar -->
        <!-- header infor -->
            <div class="row" id="title_home">
                <div class="header-name">
                    <h1 style="font-family: 'UvfAphroditePro'" class="text-center title-bg name-groom">{{$website_item->name_groom}}</h1>
                    <h1><span class="fa fa-heart myheart"></span></h1>
                    <h1 style="font-family: 'UvfAphroditePro'" class="text-center title-bg name-bride">{{$website_item->name_bride}}</h1>
                    <h4>ARE GETTING MARRIED!</h4>
                    <h4>on</h4>
                    <h3 class="text-center title-tab" style="color: #{{$website_item->color1}}">
                        @if(Session::has('email'))
                            {{WebsiteController::getDates()}}
                        @else
                            {{$date_url}}
                        @endif
                    </h3>
                </div>
                <div class="line-infor"></div>
                
            </div>
            <div class="row">
                
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 infor text-center"  >
                    <div id="prev_output_theme19_g">
                    <a href="#">
                        @if(($website_item->avatar_groom))
                        <img style="margin-left:5%;"  class="img-responsive img-circle img-infor" src="{{Asset("$website_item->avatar_groom")}}">
                        @else
                        <img style="margin-left:5%;" class="img-responsive img-circle img-infor" src="{{Asset('images/website/themes1/boy.jpg')}}">
                        @endif
                    </a>
                    </div>
                    <button onclick="send_id(0,222)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>
                    
                    <h3 style="font-family: 'UvfAphroditePro'" class="text-center title-bg name-groom">{{$website_item->name_groom}}</h3>
                    <p class="about-groom text-center" style="font-family: 'UvfAphroditePro'">{{$website_item->about_groom}} </p>
                    <div class="text-center icon-infor"><a onclick="editInforGroom()"data-toggle="modal" data-target="#edit-infor-groom" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 infor-slide">
                    <!-- slide image -->

                    <div id="carousel-example-generic" class="carousel slide item-slide"  data-interval="false" data-ride="carousel">
                                <!-- data-interval="false" -->
                        <!-- Wrapper for slides -->
                        <?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
                        <div class="carousel-inner">
                            <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                            @if( $check > 0 )
                                @foreach($albums as $index => $album)
                                    @if($index==0)
                                        <div class="item active">
                                            <img style="margin-left:5%;" class="img-responsive img-circle fix-slide" src="{{Asset("{$album->photo}")}}" alt="" />
                                        </div>
                                    @else
                                        <div class="item ">
                                            <img style="margin-left:5%;" class="img-responsive img-circle fix-slide" src="{{Asset("{$album->photo}")}}" alt="" />
                                        </div>
                                    @endif

                                @endforeach
                            @else
                                <div class="item active item-slide ">
                                    <img style="margin-left:5%;"  class="img-responsive img-circle fix-slide " src="{{Asset("images/website/themes16/picture2.jpg")}}" alt="First slide">
                                </div>
                                <div class="item item-slide ">
                                    <img style="margin-left:5%;"  src="{{Asset("images/website/themes16/picture1.jpg")}} fix-slide" alt="Second slide">
                                </div>
                                <div class="item item-slide">
                                    <img style="margin-left:5%;"  class="img-responsive img-circle fix-slide" src="{{Asset("images/website/themes16/picture3.jpg")}}" alt="Third slide">
                                </div>
                            @endif
                        </div>
                        <!-- Controls -->
                    </div>
                    <!-- end slide images -->
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 infor text-center" >
                    <div id="prev_output_theme19_b">
                    <a href="#">
                        @if(($website_item->avatar_bride))
                        <img  class="img-responsive img-circle img-infor" src="{{Asset("$website_item->avatar_bride")}}">
                        @else
                        <img  class="img-responsive img-circle img-infor" src="{{Asset('images/website/themes1/boy.jpg')}}">
                        @endif
                    </a>
                    </div>
                    <button onclick="send_id(0,111)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' type="button" class="btn btn-primary btn-responsive">Đổi ảnh</button>
                    
                    <h3 style="font-family: 'UvfAphroditePro'" class="text-center title-bg name-bride">{{$website_item->name_bride}}</h3>
                    <p class="about-bride text-center" style="font-family: 'UvfAphroditePro'">{{$website_item->about_bride}} </p>
                    <div class="text-center icon-infor"><a onclick="editInforBride()" data-toggle="modal" data-target="#edit-infor-bride" data-backdrop="static" class="glyphicon glyphicon-edit" href="javascript:void(0);"></a></div>
                </div>
            </div>
            <!-- end header infor -->
            <div class="line-infor1"></div>

            <!-- content -->
            <div class="row time-until">
                <div class="margin-time">
                    <table align="center">
                    <!-- count datime to weddingdate -->
                   
                        @foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
                          <div id="getD{{$index}}" style="display:none;">
                              {{$dd}}
                          </div>
                        @endforeach
                  
                    <script type="text/javascript" src="{{Asset("assets/js/count-down-time.js")}}"></script>
                    <!-- .end -->
                        <tr >
                            <td class="time_wedding" id="echo_dday"></td>
                            <td class="time_wedding_ text-center">:</td>
                            <td class="time_wedding" id="echo_dhour"></td>
                            <td class="time_wedding_ text-center">:</td>
                            <td class="time_wedding" id="echo_dmin"></td>
                            <td class="time_wedding_ text-center">:</td>
                            <td class="time_wedding" id="echo_dsec"></td>
                        </tr>
                        <tr >
                            <td class="time_txt">Ngày</td>
                            <td></td>
                            <td class="time_txt">Giờ</td>
                            <td></td>
                            <td class="time_txt">Phút</td>
                            <td></td>
                            <td class="time_txt">Giây</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="line-infor1"></div>
          @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
            <!-- welcome -->
            @if($tabWeb->type =="welcome" )
            <div class="row bg-w r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">  
                     
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>      
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center" id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                        @if($images)
                            <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                        @else 
                            <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                        @endif 
                    </a>  
                     <button  onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                    <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="inline-title text-center">
                        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                            {{$tabWeb->title}}
                        </h3>
                        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                    </div>
                    <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>
            <div class="line-infor1 r-title{{$tabWeb->id}}"></div>
            @endif
            <!-- end welcome -->

            <!-- story -->
            @if($tabWeb->type =="love_story" )
            <div class="row bg-w r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">  
                     
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>      
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center" id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                        @if($images)
                            <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                        @else 
                            <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                        @endif 
                    </a>  
                     <button  onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                    <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="inline-title text-center">
                        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                            {{$tabWeb->title}}
                        </h3>
                        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                    </div>
                    <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>
            @endif
            <!-- end story -->

            <!-- about -->
            @if($tabWeb->type =="about" )
            <div class="row bg-w text-center r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">  
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>                   
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="inline-title text-center">
                        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                            {{$tabWeb->title}}
                        </h3>
                        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                    </div>
                    <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center" id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                        @if($images)
                            <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                        @else 
                            <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                        @endif 
                    </a>  
                     <button onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                    <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>
            <div class="line-infor1 r-title{{$tabWeb->id}}"></div>
            @endif
            <!-- end about -->

            <!-- event -->
            @if($tabWeb->type =="wedding" )
            <div class="row bg-w r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">  
                     
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>      
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center">
                     <!-- -change map --> 
                    <div class="text-center map-hove " style='padding:20px 20px;'>         
                        <p><input class="postcode" id="Postcode" name="Postcode" type="text"> <input type="submit" id="findbutton" value="Tìm địa điểm" /></p>        
                          <div id="geomap" >
                              <p>Loading Please Wait...</p>
                          </div>
                          <div id="cor"></div>
                          <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
                          <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">    
                    </div>                              
                    <!-- -end map -->          
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="inline-title text-center">
                        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                            {{$tabWeb->title}}
                        </h3>
                        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                    </div>
                    <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>

            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>

            <div class="line-infor1 r-title{{$tabWeb->id}}"></div>
            @endif
            <!-- end event -->

            <!-- traval -->
            @if($tabWeb->type=="traval")
            <div class="row bg-w r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">  
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> </div>                       
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="inline-title text-center">
                        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                            {{$tabWeb->title}}
                        </h3>
                        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                    </div>
                    <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center" id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                        @if($images)
                            <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                        @else 
                            <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                        @endif 
                    </a>  
                     <button  onclick="send_id({{$tabWeb->id}},null)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                    <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                   
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>

            <div class="line-infor1 r-title{{$tabWeb->id}}"></div>
            @endif
            <!-- end traval -->

            <!-- album -->
            @if($tabWeb->type=="album" )
            <div class="row bg-w r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>
                 <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <div class="inline-title text-center">
                        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                            {{$tabWeb->title}}
                        </h3>
                        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                    </div>
                     <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>

                </div>  
                
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8">
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>

            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>  
                <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                   <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                    @if($albums)
                        @foreach($albums as $album)
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 images-padding">
                                <a class="fancybox" href="{{Asset("{$album->photo}")}}">
                                    <img  style="width:100%;" class="img-reponsive" src="{{Asset("{$album->photo}")}}" alt="" />
                                </a>
                            </div>
                        @endforeach
                    @endif 
                </div>  
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>
            </div>
            <div class="line-infor1 r-title{{$tabWeb->id}}"></div>
            @endif
            <!-- end album -->

            <!-- contact -->
            @if($tabWeb->type=="contact" )
            <div class="row bg-w r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">  
                     
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>      
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l">
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
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <div class="inline-title text-center">
                        <h3 class="text-center title-tab" style="font-family: 'UvfAphroditePro'" id = "nameTitle{{$tabWeb->id}}">
                            {{$tabWeb->title}}
                        </h3>
                        <span onclick="sendTitle({{$tabWeb->id}},{{$tabWeb->visiable}})" class="glyphicon glyphicon-edit" data-toggle="modal" data-target='#modal-edit-menu'></span>
                    </div>
                    <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit'>
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                   <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>
            <div class="line-infor1 r-title{{$tabWeb->id}}"></div>
            @endif
            <!-- end contact -->

            <!-- guest book -->
            @if($tabWeb->type=="guestbook")
            <div class="row bg-w r-title{{$tabWeb->id}}" id="section_{{$tabWeb->type}}">  
               @include('website_user.themes19.edit.guestbook')
            </div>

            <div class="line-infor1 r-title{{$tabWeb->id}}"></div>
            @endif
            <!-- end guest book -->
          @endforeach

            <footer>
                <div class="bird"></div>
                <div class="row bg-footer">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="padding-top: 2%;color: white; font-weight: bold">
                        WELCOME<br>
                        on<br>
                        
                            @if(Session::has('email'))
                                {{WebsiteController::getDates()}}
                            @else
                                {{$date_url}}
                            @endif
                        
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
                        <img src="{{Asset('images/website/themes19/bg-footer.png')}}">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="padding-top: 2%;color: white; font-weight: bold">
                        WEBSITE DESIGN BY THUNA<br>
                        Contact to email:<a href="thanh@thuna.vn" style="color:#19B5BC;">thanh@thuna.vn</a> or mobille:0966666886<br>
                        
                    </div>
                </div>
            </footer>
        @endforeach
    @endif
