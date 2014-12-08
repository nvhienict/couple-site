<!DOCTYPE html>
<html lang="">
    <head>
        <title>{{$firstname}}'s wedding</title>

    <script src="{{Asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{Asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{Asset("assets/js/map-themes.js")}}"></script>

    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/bootstrap.min.css")}}">
    <link href="{{Asset("assets/font-awesome/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes19.css")}}">

    <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>
    <script type="text/javascript" src="{{Asset('assets/js/bootstrap.3.2.0.min.js')}}"></script>
    

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

        .fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style]
       {width: 100% !important;}
      .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] 
      {width: 100% !important;}

    </style>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <script src="{{Asset("assets/js/map-themes.js")}}"></script>
    <script src="{{Asset('assets/js/jquery.scrollTo.js')}}"></script>
    <script type="text/javascript">
        // function updateckeditor(id){
        //         //var t= CKEDITOR.instances['editor4'].getData();alert(t);
        //         $.ajax({
        //             type:"post",
        //             dataType: "html",
        //             url:"{{URL::route('update_content_tab')}}",
        //             data: { content:CKEDITOR.instances['editor'+id].getData(),
        //                     id_tab:$('.get_id'+id).val()
        //                 },
        //             success:function(data){
        //                 var obj = JSON.parse(data);
        //                 $('.phara'+id).html(obj.content);   
        //             }
        //         });
        //             $('.editphara'+id).hide();
        //             $('.phara'+id).show();
        //             $('.click-edit-hide'+id).show();
        //             $('.ok-edit-show'+id).hide();
        //     }  

        jQuery(document).ready(function($) {
        // Call & Apply function scrollTo
            $('a.scrollTo').click(function () {
                $('.design_website_content_right').scrollTo($(this).attr('href'),{duration:'slow', offsetTop : '-10'});
                return false;
            });
        });
    </script>

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
        <div class="navbar_edits header">
            <nav style="padding:0px;" class="navbar navbar-default nav-themes19-default" role="navigation">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" 
                     data-target="#example-navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
               </div>
               <div style="margin-top: 15px;" class="collapse navbar-collapse" id="example-navbar-collapse">
                  <ul style="background-color: #FF8EC6;" class="nav navbar-nav nav-themes19">
                     <span><a class="a_menu scrollTo" href="#title_home" style="padding:15px 8px; text-decoration: none;">Trang Chủ</a></span>
                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
                     <span><a style="padding:15px 8px;text-decoration: none;" class="{{$tab->id}} scrollTo a_menu" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a></span>
                     @endforeach()
                  </ul>
               </div>
            </nav>
        </div>
        <!-- end navbar -->
        <!-- header infor -->
            <div class="row" id="title_home">
                <div class="header-name">
                    <h1 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-bg name-g">{{$website_item->name_groom}}</h1>
                    <h1><span class="fa fa-heart myheart"></span></h1>
                    <h1 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-bg name-b">{{$website_item->name_bride}}</h1>
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
                
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 infor text-center"  id="prev_outputcc222">
                    <a href="#">
                        @if(($website_item->avatar_groom))
                        <img  class="img-responsive img-circle img-infor" src="{{Asset("$website_item->avatar_groom")}}">
                        @else
                        <img  class="img-responsive img-circle img-infor" src="{{Asset('images/website/themes1/boy.jpg')}}">
                        @endif
                    </a>
                    <button onclick="send_id(222)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
                    <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-bg name-g">{{$website_item->name_groom}}</h3>
                    <p class="about-g text-center">{{$website_item->about_groom}} </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 infor-slide">
                    <!-- slide image -->

                    <div id="carousel-example-generic" class="carousel slide item-slide"  data-interval="false" data-ride="carousel">
                                <!-- data-interval="false" -->
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                            @if($albums)
                                @foreach($albums as $index => $album)
                                    @if($index==0)
                                        <div class="item active">
                                            <img class="img-responsive img-circle fix-slide" src="{{Asset("{$album->photo}")}}" alt="" />
                                        </div>
                                    @else
                                        <div class="item ">
                                            <img class="img-responsive img-circle fix-slide" src="{{Asset("{$album->photo}")}}" alt="" />
                                        </div>
                                    @endif

                                @endforeach
                            @else
                                <div class="item active item-slide ">
                                    <img class="img-responsive img-circle fix-slide " src="{{Asset("images/website/themes16/picture2.jpg")}}" alt="First slide">
                                </div>
                                <div class="item item-slide ">
                                    <img src="{{Asset("images/website/themes16/picture1.jpg")}} fix-slide" alt="Second slide">
                                </div>
                                <div class="item item-slide">
                                    <img  class="img-responsive img-circle fix-slide" src="{{Asset("images/website/themes16/picture3.jpg")}}" alt="Third slide">
                                </div>
                            @endif
                        </div>
                        <!-- Controls -->
                    </div>
                    <!-- end slide images -->
                </div>
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 infor text-center" id="prev_outputcc111">
                    <a href="#">
                        @if(($website_item->avatar_bride))
                        <img  class="img-responsive img-circle img-infor" src="{{Asset("$website_item->avatar_bride")}}">
                        @else
                        <img  class="img-responsive img-circle img-infor" src="{{Asset('images/website/themes1/boy.jpg')}}">
                        @endif
                    </a>
                    <button onclick="send_id(111)" class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage'>Đổi ảnh</button>
                    <h3 style="font-family: 'Great Vibes',cursive; color: #{{$website_item->color2}};" class="text-center title-bg name-b">{{$website_item->name_bride}}</h3>
                    <p class="about-g text-center">{{$website_item->about_bride}} </p>
                </div>
            </div>
            <!-- end header infor -->
            <div class="line-infor1"></div>

            <!-- content -->
            <div class="row time-until">
                <div class="margin-time">
                    <table align="center">
                    <!-- count datime to weddingdate -->
                    @if(empty($website_item->count_down))
                        @if(Session::has('email'))
                            @foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
                                <div id="getD{{$index}}" style="display:none;">
                                    {{$dd}}
                                </div>
                            @endforeach
                        @else
                            @foreach( $date = explode('-',$date_url) as $index=>$dd )
                                <div id="getD{{$index}}" style="display:none;">
                                    {{$dd}}
                                </div>
                            @endforeach
                                
                        @endif
                    @else
                        @if(Session::has('email'))
                            @foreach( $date = explode('-', WebsiteController::getCountDown()) as $index=>$dd )
                                <div id="getD{{$index}}" style="display:none;">
                                    {{$dd}}
                                </div>
                            @endforeach
                        @else
                            @foreach( $date = explode('-',$count_down_url) as $index=>$dd )
                                <div id="getD{{$index}}" style="display:none;">
                                    {{$dd}}
                                </div>
                            @endforeach
                        @endif
                    @endif
                    
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
            <div class="row bg-w" id="section_{{$tabWeb->type}}">  
                     
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
                     <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                            {{$tabWeb->title}}
                    </h3>
                    <div class="part-content phara{{$tabWeb->id}}">
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>

                <!-- <div class="edit-content editphara{{$tabWeb->id}}">
                    <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
                       {{$tabWeb->content}}
                    </textarea>
                </div> -->
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                    <!-- <span > <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                </div>               
            </div>
           <!--  <div class="row ok-edit ok-edit-show{{$tabWeb->id}}">               
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            </div> -->
            <div class="line-infor1"></div>
            @endif
            <!-- end welcome -->

            <!-- story -->
            @if($tabWeb->type =="love_story" )
            <div class="row bg-w" id="section_{{$tabWeb->type}}">  
                     
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
                     <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                </div>
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                            {{$tabWeb->title}}
                    </h3>
                    <div class="part-content phara{{$tabWeb->id}}" onclick="showckeditor({{$tabWeb->id}})">
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>

                <!-- <div class="edit-content editphara{{$tabWeb->id}}">
                    <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
                       {{$tabWeb->content}}
                    </textarea>
                </div> -->
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                    <!-- <span > <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                </div>               
            </div>
            <!-- <div class="row ok-edit ok-edit-show{{$tabWeb->id}}">               
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            </div> -->
            @endif
            <!-- end story -->

            <!-- about -->
            @if($tabWeb->type =="about" )
            <div class="row bg-w text-center" id="section_{{$tabWeb->type}}">  
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>                   
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                            {{$tabWeb->title}}
                    </h3>
                    <div class="part-content phara{{$tabWeb->id}}">
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
                <!-- <div class="edit-content editphara{{$tabWeb->id}}">
                    <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
                       {{$tabWeb->content}}
                    </textarea>
                </div> -->
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center" id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                        @if($images)
                            <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                        @else 
                            <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                        @endif 
                    </a>  
                     <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    
                    <!-- <span  style="float:right;"> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>
            <!-- <div class="row ok-edit ok-edit-show{{$tabWeb->id}}"> 
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>                 
            </div> -->
            <div class="line-infor1"></div>
            @endif
            <!-- end about -->

            <!-- event -->
            @if($tabWeb->type =="wedding" )
            <div class="row bg-w" id="section_{{$tabWeb->type}}">  
                     
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
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                            {{$tabWeb->title}}
                    </h3>
                    <div class="part-content phara{{$tabWeb->id}}" >
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>

                <!-- <div class="edit-content editphara{{$tabWeb->id}}">
                    <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
                       {{$tabWeb->content}}
                    </textarea>
                </div> -->
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                    <!-- <span > <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                </div>               
            </div>
            <!-- <div class="row ok-edit ok-edit-show{{$tabWeb->id}}">               
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            </div> -->
            <div class="line-infor1"></div>
            @endif
            <!-- end event -->

            <!-- traval -->
            @if($tabWeb->type=="traval")
            <div class="row bg-w" id="section_{{$tabWeb->type}}">  
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> </div>                       
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                            {{$tabWeb->title}}
                    </h3>
                    <div class="part-content phara{{$tabWeb->id}}">
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
                <!-- <div class="edit-content editphara{{$tabWeb->id}}">
                    <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
                       {{$tabWeb->content}}
                    </textarea>
                </div> -->
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center" id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                        @if($images)
                            <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                        @else 
                            <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                        @endif 
                    </a>  
                     <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <!-- <span  style="float:right;"> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>
            <!-- <div class="row ok-edit ok-edit-show{{$tabWeb->id}}"> 
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>                 
            </div> -->
            <div class="line-infor1"></div>
            @endif
            <!-- end traval -->

            <!-- album -->
            @if($tabWeb->type=="album" )
            <div class="row bg-w" id="section_{{$tabWeb->type}}">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>
                 <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                        {{$tabWeb->title}}
                    </h3> 
                     <div class="part-content phara{{$tabWeb->id}}">
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>

                </div>  
                
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    <!-- <span  style="float:right;"> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
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
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 images-padding">
                                <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
                                    <img class="img-reponsive part-photo-edit" src="{{Asset("{$album->photo}")}}" alt="" />
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>  
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            
                </div>
            </div>
            <div class="row phara-margin">
                <div class="col-xs-8 click-edit ">
                    
                     <!-- <span style="float:right;"><a  onclick="send_id_album({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);"></a></span> -->
                </div>
                <div class="col-xs-1 ">
                   
                   <span><a style="background: #19b5bc; border:none;" onclick="send_id_album({{$tab->id}})" class="btn btn-primary"  data-toggle="modal" data-target='#modal-up_images' href="javascript:void(0);">Tải ảnh lên</a></span>
                </div>               
            </div>
           <!--  <div class="row"> -->
                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 show-content phara{{$tabWeb->id}}" onclick="showckeditor_text({{$tabWeb->id}})">
                        <span style="color: #{{$website_item->color3}}">
                            {{$tabWeb->content}}
                        </span>
                    </div>
                      
                </div>  -->

               <!--  <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 " >   
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                        
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 click-edit click-edit-hide{{$tabWeb->id}}">
                       <span  style="float:right;"> <a  onclick="showckeditor_text({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
                    </div>

                                   
                </div> -->
                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ok-edit ok-edit-show{{$tabWeb->id}}">
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                         
                     </div> 
                     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                         <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                        <span style="float:right;">
                            <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                            <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                        </span >
                     </div>
                                    
                </div> -->
            <!-- </div> -->
            <div class="line-infor1"></div>
            @endif
            <!-- end album -->

            <!-- contact -->
            @if($tabWeb->type=="contact" )
            <div class="row bg-w" id="section_{{$tabWeb->type}}">  
                     
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
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                            {{$tabWeb->title}}
                    </h3>
                    <div class="part-content phara{{$tabWeb->id}}">
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>

               <!--  <div class="edit-content editphara{{$tabWeb->id}}">
                    <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
                       {{$tabWeb->content}}
                    </textarea>
                </div> -->
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"></div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                   <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                    <!-- <span > <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                </div>               
            </div>
            <!-- <div class="row ok-edit ok-edit-show{{$tabWeb->id}}">               
                <div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            </div> -->
            <div class="line-infor1"></div>
            @endif
            <!-- end contact -->

            <!-- guest book -->
            @if($tabWeb->type=="guestbook")
            <div class="row bg-w" id="section_{{$tabWeb->type}}">  
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> </div>                       
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
                    <h3 id = "nameTitle{{$tabWeb->id}}" class="title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}">
                            {{$tabWeb->title}}
                    </h3>
                    <div class="part-content phara{{$tabWeb->id}}">
                       <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
                    </div>
                </div>
                <!-- <div class="edit-content editphara{{$tabWeb->id}}">
                    <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1">
                       {{$tabWeb->content}}
                    </textarea>
                </div> -->
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 pad-l text-center" id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php  $images=PhotoTab::where('tab',$tabWeb->id)->get()->first(); ?>

                        @if($images)
                            <img  class="img-responsive " src="{{Asset("{$images->photo}")}}" alt="">
                        @else 
                            <img  class="img-responsive " src="{{Asset("images/website/themes16/picture1.jpg")}}" alt="">

                        @endif 
                    </a>  
                     <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>         
                </div>
            </div>

            <div class=" row click-edit click-edit-hide{{$tabWeb->id}}" >
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <!-- <span  style="float:right;"> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
                </div>               
            </div>

            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"> </div>   
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                    <!-- -facebookcommnet --> 
                      <div id="fb-root"></div>
                      <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1450451991884119&version=v2.0";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                      </script>
                      <div class="fb-comments" data-href=""  data-numposts="5" data-width="100%"data-order-by="social" data-mobile="auto-detect" data-colorscheme="light"></div>                        

                      <script>
                          $(document).ready(function() {
                              $('.fb-comments').attr("data-href", document.URL);
                          });
                      </script>
                    <!-- -End facebookcommnet -->
                </div>
            </div>

            <!-- <div class="row ok-edit ok-edit-show{{$tabWeb->id}}"> 
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                    <span style="float:right;">
                        <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                        <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                    </span >
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>                 
            </div> -->
            <div class="line-infor1"></div>
            @endif
            <!-- end guest book -->
            @endforeach

            <footer>
                <div class="bird"></div>
                <div class="row bg-footer">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center margin-footer">
                        <h4>WELCOME</h4>
                        <h4>on</h4>
                        <h4>
                            @if(Session::has('email'))
                                {{WebsiteController::getDates()}}
                            @else
                                {{$date_url}}
                            @endif
                        </h4>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center margin-footer">
                        <img src="{{Asset('images/website/themes19/bg-footer.png')}}">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center margin-footer">
                        <h4>WEBSITE DESIGN BY THUNA</h4>
                        <h4>Contact to email:<a href="thanh@thuna.vn">thanh@thuna.vn</a> or mobille:0966666886</h4>
                        
                    </div>
                </div>
            </footer>
        @endforeach
    @endif
</html>