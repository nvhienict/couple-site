<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes13.css")}}">
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
<div id="page1">
<div class="body1 container">
	<div class="main">
<!-- header -->
		<header>
			<div class="navbar-wrapper menu-theme-13">

	          <!-- <div class="container"> -->
	           <div class="navbar navbar-inverse slide-menu" role="navigation">
                <!-- <div class="container"> -->
                  <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>
                  <div class="navbar-collapse collapse menu-ul-edit ">
                    <ul id='menu' class="nav navbar-nav navbar-right text-center" style="background-color:rgba(255,255,255,0);">
                          <li  id="s1" class="">
                              <a class="scrollTo" href="#title-home" >Trang chủ</a>
                          </li>
                      @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
                        @if($index<2)
                    <li class="menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" >{{$tab->title}}</a></li>
                        @endif
                       @endforeach
                    <li class="dropdown" role="presentation">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                          Xem thêm <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->get() as $index => $tab)
                            @if($index>=2)
                            <li class="menu-id{{$tab->id}}"><a class="{{$tab->id}} scrollTo" href="#section_{{$tab->type}}" >{{$tab->title}}</a></li>
                            @endif
                          @endforeach
                        </ul>
                    </li>
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
         </div>
      </div>
			<div class="row" style="margin-left: 0px; margin-right: 0px;">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 slider_box">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						
						<!-- Wrapper for slides -->
            <?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
						<div class="carousel-inner">
						    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
				            @if( $check > 0 )
				                @foreach($albums as $index => $album)
				                	@if($index==0)
				                    	<div class="item active">
									    	<img src="{{Asset("{$album->photo}")}}" alt="" />
									    </div>
				                    @else
				                    	<div class="item">
									    	<img src="{{Asset("{$album->photo}")}}" alt="" />
									    </div>
				                    @endif

				                @endforeach
				            @else
				            	<div class="item active">
							    	<img src=" {{Asset("images/website/themes9/01.jpg")}}" alt="First slide">
				                </div>
							    <div class="item">
							    	<img src="{{Asset("images/website/themes9/02.jpg")}}" alt="Second slide">
							    </div>
							    <div class="item">
							    	<img  src="{{Asset("images/website/themes9/01.jpg")}}" alt="Third slide">
							    </div>
				            @endif
						</div>
						<!-- Controls -->
					</div><!-- /carousel -->
				</div>
				<!-- end featured-img  -->
				<div id="title-home" class="col-xs-12 col-sm-5 col-md-5 col-lg-5 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 bg-infor">
					<hgroup>
                        <h2 class="text-center" style="font-family: 'UvfAphroditePro',cursive;"> Ours Wedding </h2>
                        <h1 style="font-family: 'UvfAphroditePro',cursive; color: #{{$website_item->color2}};" class="font-name text-center name-g">
                            {{$website_item->name_groom}}
                        </h1>
                        <h6 class="text-center" style="font-size:20px;">&</h6>
                        <h1 style="font-family: 'UvfAphroditePro',cursive; color: #{{$website_item->color2}};" class="font-name text-center name-b">
                            {{$website_item->name_bride}}
                        </h1>
                        <h6 class="text-center" style="font-size:20px;">on</h6>
                        <h3 class="text-center title-tab" style="color: #{{$website_item->color1}}">
                            @if(Session::has('email'))
                                {{WebsiteController::getDates()}}
                            @else
                                {{$date_url}}
                            @endif
                        </h3>
                    </hgroup>
                    <p class="text-center" style="color:#FF4FD0;">
		        		Hân hạnh mời các bạn đến tham dự cùng chúng tôi.
		        	</p>
				</div>
			</div>
	</header>
		<!-- end header -->

	</div>
</div>
<div class="body2 container">

@foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tabWeb)
	
		@if($tabWeb->type =="welcome" )
		<div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
		@include('website_user.themes13.edit.left')
		</div>
		
		<div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
		@endif

		<!-- cau chuyen tinh yeu -->
		@if($tabWeb->type=="love_story")
		<div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
		@include('website_user.themes13.edit.right')
		</div>
		
		<div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
		@endif

		<!-- About Us -->
		@if($tabWeb->type=="about")
		<div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
		@include('website_user.themes13.edit.right')
		</div>
		<div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
		
		
		@endif

		<!-- Wedding Event -->
		@if($tabWeb->type=="wedding" )
		<div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
		@include('website_user.themes13.edit.left')
		</div>
		<div class="row phara-margin r-title{{$tabWeb->id}}" style="padding-top:30px;">
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
		<div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
		
		@endif
		

		<!-- Travaling -->
		@if($tabWeb->type=="traval")
		<div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
		@include('website_user.themes13.edit.right')
		</div>
		<div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
        
        @endif
        <!-- Photo Album -->
        @if($tabWeb->type=="album" )
        <div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
        @include('website_user.themes13.edit.photo')
        </div>
        <div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
        <hr>
        
        @endif

       <!--  Register -->
       @if($tabWeb->type=="register" )
       <div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
       @include('website_user.themes13.edit.left')  
       </div>  
       <div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>   
        
        
        @endif

        <!-- Contact Us -->
        @if($tabWeb->type=="contact")
        <div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
        @include('website_user.themes13.edit.contact')
        </div>
        <div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
        
        
        @endif

         <!--  Guest book -->
       @if($tabWeb->type=="guestbook")
        <div id="section_{{$tabWeb->type}}" class="r-title{{$tabWeb->id}}">
        	@include('website_user.themes13.edit.guestbook')
    	  </div>
    	<div class=" bg-line r-title{{$tabWeb->id}}" style="margin-left: 0px; margin-right: 0px;"></div>
    	
    	
        @endif

@endforeach
<!-- content / -->
</div>
<div class="body3 container">
	<div class="main">
<!-- footer -->
		<footer class="text-center" style="margin-top: 40px;">
			<p class="col-xs-12">
				{{$website_item->name_groom}} &amp; {{$website_item->name_bride}} 
			</p>
			on 
			<p>
				
                @if(Session::has('email'))
                    {{WebsiteController::getDates()}}
                @else
                    {{$date_url}}
                @endif.
			</p>	       	
        	<p>
        		Site design by 
        		<a title="" href="http://thuna.vn"> 
                Thuna.vn
            </a>
        	</p>
		</footer>
<!-- / footer -->
	</div>
</div>
	@endforeach
@endif
</div>

</html>