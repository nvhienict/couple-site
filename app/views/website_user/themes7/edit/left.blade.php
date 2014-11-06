<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 phara-temp wedding-template">
     <h2 class="text-center section-title section-title-wedding" >
        Đám cưới
    </h2>
    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 float-left"  style="margin-left: 7%; margin-top:2%;">        
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
        <span>
            <button  onclick="send_id({{$tabWeb->id}})"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
        </span>      
    </div>
    <div onclick="showckeditor({{$tabWeb->id}})" class="show-content phara{{$tabWeb->id}}" style=" margin-right:12%;"  >
            <span name="phara" style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>        
    </div>
     <div class="edit-content editphara{{$tabWeb->id}}" >
        <textarea name="editor{{$tabWeb->id}}" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="30" rows="10" tabindex="1">
               {{$tabWeb->content}}
        </textarea>      
    </div>
    <div class="phara-margin float-right" style="margin-right:15%">      
        <div class="click-edit click-edit-hide{{$tabWeb->id}}" >            
            <span> <a  onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
            
        </div>
    </div>
    <div class="phara-margin float-right"  style="margin-right: 12%;">    
        <div class="ok-edit ok-edit-show{{$tabWeb->id}}">
            <span>
                <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
            </span>
            <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        </div>
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center map-hove" style="margin-top:3%">
            <!-- -change map -->
            <p><input class="postcode" id="Postcode" name="Postcode" type="text" autocomplete="off" style="color: #755F49;line-height: 1.6;font-family: 'Roboto Slab', serif; font-size: 20px;"> <input type="submit" id="findbutton" value="Tìm địa điểm" style="color: #755F49;line-height: 1.6;font-family: 'Roboto Slab', serif; font-size: 20px;"/></p>       
              <div id="geomap" style="margin: 0 auto;">
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
                   $("#geomap").css("width","80%").css("height", 400);
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
</div>

