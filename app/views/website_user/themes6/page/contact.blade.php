<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

<div class="col-xs-8 partion contact-main" >
  <div class="row phara-margin ">
        
            <h3 class="text-center title-tab" style="text-align: {{$tab->titlestyle}}" id = "nameTitle{{$tab->id}}">{{$tab->title}}</h3> 
              
           <div class="text-center map-hove">
                <!-- -change map -->       
                 <!--  <div id="geomap">
                      <p>Loading Please Wait...</p>
                  </div>
                  <div id="cor" style="width:100%; height:100%;"></div>
                  <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
                  <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">  -->
               <!-- -end map -->
           </div>                                   
              
    </div> 
<br><br>
     <div class="row phara-margin">
        <div class="row contact-content">
            <div class="col-xs-12">
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
                       <input type="text" class="form-control" id="" placeholder=Messages>
                   </div>  
                    <button type="submit" class="btn btn-primary send-contact">Send Mesages</button>                          
               </form>                             
              <br><br>
        </div>

        </div>
            
           
    </div>
       
        
    </div>
  <br>
<br>
<!-- -script map -->
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
            google.maps.event.addDomListener(window, 'load', initialize);
            geocoder = new google.maps.Geocoder();    
        
            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: latlng
            });
        
            google.maps.event.addListener(marker, "dragend", function (event) {
                var point = marker.getPosition();
                map.panTo(point);
            });
            markersArray.push(marker);
 
        };
        
        $(document).ready(function () {
        
            initialize();
        
           
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
<!-- -end script map -->