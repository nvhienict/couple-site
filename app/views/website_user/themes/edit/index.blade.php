<head>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.css?v=1.0.5")}}" />
    <link rel="stylesheet" type="text/css"  href="{{Asset("assets/slide/source/jquery.fancybox.css?v=2.1.2")}}" media="screen" />
    <script type="text/javascript" src="{{Asset("assets/js/api-google.js")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery-1.8.2.min.js")}}"></script>
    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{Asset("assets/slide/lib/jquery.mousewheel-3.0.6.pack.js")}}"></script>
    <!-- Add fancyBox main JS and CSS files -->
    <script type="text/javascript" src="{{Asset("assets/slide/source/jquery.fancybox.js?v=2.1.3")}}"></script>
    <!-- Add Button helper (this is optional) -->
    <script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-buttons.js?v=1.0.5")}}"></script>
    <!-- Add Media helper (this is optional) -->
    <script type="text/javascript" src="{{Asset("assets/slide/source/helpers/jquery.fancybox-media.js?v=1.0.5")}}"></script>
    <script type="text/javascript" src="{{Asset("assets/slide/f-slide.js")}}"></script>
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
        .fancybox-title iframe {
            min-height: 30px;
            vertical-align: middle;
        }
    </style>
    <script type="text/javascript">
      // scrollTo
     
      //map google
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
           $("#geomap").css("width","100%").css("height", 400);
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
<nav style="padding:0px;" class="navbar navbar-default navbar-fixed-top" role="navigation">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" 
         data-target="#example-navbar-collapse">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
   </div>
   <div style="background-color:#6EC7B6;" class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul style="background-color:#6EC7B6;" class="nav navbar-nav">
         <li><a class="a_menu scrollTo" href="#title_home">Trang Chủ</a></span></li>
        @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $menu_tab)
         <li class="menu-id{{$menu_tab->id}} text-center">
          <a class="a_menu scrollTo" href="#section_{{$menu_tab->type}}">{{$menu_tab->title}}</a>
        </li>
         @endforeach()
         <li><a onclick="loadAddTitle()" class="glyphicon glyphicon-plus" data-toggle="modal" data-target="#modal-add-title"></a></li>
         <li><a class="glyphicon glyphicon-cog" href="{{URL::route('website')}}"></a></li>

          
      </ul>
   </div>
</nav>	
<div class="background-themes" style="background-image: url({{Asset("{$backgrounds}")}}); margin-top:3%;margin-right: -15px; margin-left: 15px;">	
	<div class="after-image-themes">
		<!-- Themes Heading -->
		<div class="title-website"id="title_home">
            <h2 class="text-center title-tab" style="color: #{{$website_item->color2}}" >{{WebsiteController::getDates()}}</h2>
            <h1 class="text-center" style="text-transform: uppercase; color: #{{$website_item->color1}}; font-family: {{$website_item->font}};">
                {{$firstname}}'s wedding
            </h1>
            <h2 class="text-center" style="color: #{{$website_item->color2}}" >Chào bạn đến Website cưới của chúng tôi</h2>     
        </div>
		<hr>
		@include('website_user.themes.edit.circle')
	 @foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)

	 	  
		<!-- Welcome -->
		@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
		<div id="section_{{$tabWeb->type}}">
			@include('website_user.themes.edit.left')
		</div>
		<hr>
		@endif

		<!-- cau chuyen tinh yeu -->
		@if($tabWeb->type=="love_story")
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.text')
		</div>
		<hr>
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about" && $tabWeb->visiable==0)
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.right')
		</div>
		<hr>
		
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" && $tabWeb->visiable==0)
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.right')
		</div>
		<div class="row phara-margin" style="padding-top:30px;">
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
		<hr>
		
		@endif

		<!-- Travaling -->
		@if($tabWeb->type=="traval" && $tabWeb->visiable==0)
		<div id="section_{{$tabWeb->type}}">
		@include('website_user.themes.edit.text')
		</div>
        <hr>
        
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
        @include('website_user.themes.edit.photo')
        </div>
        <hr>
       
        @endif

       <!--  Register -->
      
       @if($tabWeb->type=="register" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
       @include('website_user.themes.edit.text')     
       </div>  
        <hr>
        
        @endif

        <!-- Contact Us -->
        @if($tabWeb->type=="contact" && $tabWeb->visiable==0)
        <div id="section_{{$tabWeb->type}}">
        	@include('website_user.themes.edit.contact')
    	</div>
        @endif

        <!--  Guest book -->
        @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
          <div id="section_{{$tabWeb->type}}">
        	 @include('website_user.themes.edit.guestbook')
          </div>
        @endif 
  	@endforeach  
	<hr>
	
	
	
</div> <!-- and after-images-themes -->
@endforeach
@endif
<div style="height:70px;">
	<div class="col-xs-6 col-md-offset-3">
		
		<div class="text-center">
			<p>47 Đỗ Huy Uyển, Đà Nẵng<br>
			© Copyright 2014 - <a href="http://thuna.vn">thuna.vn</a></p>
		</div>
		
	</div>
</div>
</div>
<!-- and image-themes -->

