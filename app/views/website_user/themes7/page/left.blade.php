<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-template">
     <h2 class="text-center section-title section-title-wedding" >
        Đám cưới
    </h2>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 float-left"  style="margin-left: 10%; margin-top:2%;">        
        <span id="prev_output{{$tabWeb->id}}">     
            <a href="#"> 
                 <?php 
                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                     ?>
                @if($images)
                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                @else 
                    <img  class="img-responsive" src="{{Asset("images/website/themes7/tab_temp_7.jpg")}}" alt="">          
                @endif            
               
            </a>
        </span >     
            
    </div>
    <div class="show-content phara{{$tabWeb->id}}" style=" margin-right:10%;"  >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center map-hove" style="margin-top:3%">
            <!-- -change map -->
            
              <div id="geomap" class="text-center">
                  <p>Loading Please Wait...</p>
              </div>
              <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
              <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">
              <input id="hidAdd" name="hidAdd" type="hidden" value="{{$website_item->address}}">  
           <!-- -end map -->
    </div>   
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
                       
                };
                
                
                $(document).ready(function () {
                    
                 
                    
                  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    google.maps.event.trigger(map, 'resize');
                    
                  });
                  $('#myTab a[href="#contact"]').on('shown', function(){
                    google.maps.event.trigger(map, 'resize');
                  });
                     initialize();
                   $("#geomap").css("width","100%").css("height", "40%");
                    
                
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
    
</div>

