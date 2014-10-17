<section id="section_wedding">
	<div class="container text-center">
		<div class="row sptr-position">
			<div class="col-md-12">
				<div class="separator" style="background: url({{Asset('/images/website/themes5/separetor.png')}}) no-repeat center;">
					<h2 data-uk-scrollspy="{cls:'uk-animation-scale-up', repeat: true}">{{$tabWeb->title}}</h2>
				</div>
			</div>
		</div>
	</div>	
	<div class="fest-portion sptr-position">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-6">
					<div class="shape">
						<div class="overlay hexagon_mask" style="background: url({{Asset('/images/website/themes5/hexagonal-maskorg.png')}}); background-size: cover;"></div>
							<a href="#">
			                    <?php 
			                    $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
			                     ?>
			                @if($images)
			                    <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
			                @else 
			                    <img  class="img-responsive" src="{{Asset("images/website/themes1/tab_temp_1.jpg")}}" alt="">

			                @endif
			                </a>
					</div>
				</div>
				
				<div class="col-md-6 s_txt">
					<div class="shape">
						<div class="overlay hexagon_mask" style="background: url({{Asset('/images/website/themes5/hexagonal-maskorg.png')}});"></div>
						
						<div class="slide-txt">
					
							<p>{{$tabWeb->content}}</p>
						</div>									
					</div>															
				</div>
			</div>
		</div>	
		<div class="row">
		<div class="col-xs-6 col-xs-offset-3">
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
           <div class="text-center map-hove">
            <!-- -change map -->       
              <div id="geomap">
                  <p>Loading Please Wait...</p>
              </div>
              <div id="cor" style="width:100%; height:100%;"></div>
              <input id="hidLat" name="hidLat" type="hidden" value="{{$website_item->latitude}}">
              <input id="hidLong" name="hidLong" type="hidden" value="{{$website_item->longitude}}">
              <input id="hidAdd" name="hidAdd" type="hidden" value="{{$website_item->address}}">  
           <!-- -end map -->
           </div>   
    	</div>
    	</div>
	</div>
	<script type="text/javascript">
        var PostCodeid = "#hidAdd";
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
            $("#geomap").css("height", 400);
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
</section>