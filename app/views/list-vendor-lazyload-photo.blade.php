
<div class="row">
	@foreach($results as $key=>$vendor)
		<div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
                
                <!-- Vendor Images -->
                <a href="{{URL::route('vendor',array(VendorController::getCategorySlug( VendorController::getVendorCategory($vendor->id) ),$vendor->slug))}}">
                	{{VendorController::getImagesVendor($vendor->photo)}}
                </a>
                
                <!-- Location Name -->
                <div class="category-name">
                	{{VendorController::getLocationName($vendor->id)}}
                </div>
                
                <!-- Vendor Name -->
                <div class="caption">
                    <div class="name">
                        <a href="{{URL::route('vendor',array(VendorController::getCategorySlug( VendorController::getVendorCategory($vendor->id) ),$vendor->slug))}}">
                        	{{$vendor->name}}
                        </a>
                    </div>
                </div>

                <!-- Vendor Ratings -->
                <div class="ratings">
                    <span class="pull-right">{{VendorComment::where('vendor',$vendor->id)->get()->count()}} Nhận xét</span>
			            <p>
                        @if(Rating::where('vendor',$vendor->id)->get()->count()>0)
                        	@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1)==0)
	  							<img src="{{Asset('images/star/0.jpg')}}" class="img-responsive agv-rating " alt="">
	  						@else
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) > 0 & round(Rating::where('vendor',$vendor->id)->avg('rating'),1) < 1)
		  							<img src="{{Asset('images/star/0.5.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) == 1)
		  							<img src="{{Asset('images/star/1.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) > 1 & round(Rating::where('vendor',$vendor->id)->avg('rating'),1) < 2)
		  							<img src="{{Asset('images/star/1.5.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) == 2)
		  							<img src="{{Asset('images/star/2.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) > 2 & round(Rating::where('vendor',$vendor->id)->avg('rating'),1) < 3)
		  							<img src="{{Asset('images/star/2.5.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) == 3)
		  							<img src="{{Asset('images/star/3.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) > 3 & round(Rating::where('vendor',$vendor->id)->avg('rating'),1) < 4)
		  							<img src="{{Asset('images/star/3.5.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) == 4)
		  							<img src="{{Asset('images/star/4.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) > 4 & round(Rating::where('vendor',$vendor->id)->avg('rating'),1) < 5)
		  							<img src="{{Asset('images/star/4.5.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
		  						@if(round(Rating::where('vendor',$vendor->id)->avg('rating'),1) == 5)
		  							<img src="{{Asset('images/star/5.jpg')}}" class="img-responsive agv-rating" alt="">
		  						@endif
	  						@endif
                        	@else
                        		<img src="{{Asset('images/star/0.jpg')}}" class="img-responsive agv-rating " alt="">
                        @endif
                    </p>
                    
                </div>
                <!-- end ratings -->

                @if(!empty($compares))
					<input type="hidden" id="count" name="a" value="{{count($compares)}}">

						<!-- Checkbox Compare -->
                        @if( in_array($vendor->id, $compares) )
	                        <div class="compare-photo">
                    			<label>
							        <input checked type="checkbox" name="chk[]" value="{{$vendor->id}}" id="checkbox-photo{{$vendor->id}}" class='compare-title'> Compare
							        <input type="hidden" name="checkbox-{{$vendor->id}}" value="{{$vendor->id}}" >
						        </label>

						        <script type="text/javascript" src="{{Asset('assets/js/count-compare.js')}}"></script>
							        
							</div>
						@else
							<div class="compare-photo">
                    			<label>
							        <input type="checkbox" name="chk[]" value="{{$vendor->id}}" id="checkbox-photo{{$vendor->id}}" class='compare-title'> Compare
							        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
						        </label>
						        
						        <script type="text/javascript" src="{{Asset('assets/js/count-compare.js')}}"></script>
						        
							</div>
					    @endif
				@else
        			<input type="hidden" id="count" name="a" value="0">

        			<!-- Checkbox Compare -->
        			<div class="compare-photo">
            			<label>
					        <input type="checkbox" name="chk[]" value="{{$vendor->id}}" id="checkbox-photo{{$vendor->id}}" class='compare-title'> Compare
					        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
				        </label>
				        
				        <script type="text/javascript" src="{{Asset('assets/js/count-compare.js')}}"></script>
				        
					</div>
				@endif
				<!-- end check isset session compare -->

			    <script type="text/javascript">
					$('#checkbox-photo{{$vendor->id}}').on("click", function(){
						if( $(this).prop('checked') ){
							$('#checkbox-list{{$vendor->id}}').prop("checked", true);
						} else {
							$('#checkbox-list{{$vendor->id}}').prop("checked", false);
						};
					});
				</script>


            </div>
            <!-- end div thumbnail -->
        </div>
        <!-- end div col-sm-4 col-lg-4 col-md-4 -->

    @endforeach

</div>