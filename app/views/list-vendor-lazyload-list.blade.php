					
	@foreach($results as $key=>$vendor)
	<div class="row" id="show-list">
		<div class="col-sm-4 col-lg-4 col-md-4">

			<!-- Vendor Images -->
			<div class="list-avatar">
				<a href="{{URL::route('vendor',array(VendorController::getCategorySlug( VendorController::getVendorCategory($vendor->id) ),$vendor->slug))}}">
					{{VendorController::getImagesVendor($vendor->photo)}}
				</a>
			</div>
			
			<!-- Location Name -->
            <div class="category-name">
            	{{VendorController::getLocationName($vendor->id)}}
            </div>

		</div>
		<!-- edn div col-sm-4 col-lg-4 col-md-4 -->
		
		<div class="col-sm-8 col-lg-8 col-md-8">

			<!-- Vendor About -->
			<div class="caption-list">
				<!-- Vendor Name -->
                <div class="name">
                    <a href="{{URL::route('vendor',array(VendorController::getCategorySlug( VendorController::getVendorCategory($vendor->id) ),$vendor->slug))}}">
                    	{{$vendor->name}}
                    </a>
                </div>

                <!-- Vendor About -->
                <p>{{VendorController::getVendorAbout($vendor->about)}}</p>

                <!-- Vendor Website -->
                <div class="website">
                	{{$vendor->website}}
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

            @if(!empty($compares))
				<input type="hidden" id="count" name="a" value="{{count($compares)}}">
                <!-- case vendor had in session compare -->
                @if( in_array($vendor->id, $compares) )
				<div class="compare-list">
			        <label>
				        <input checked type="checkbox" name="" value="" id="checkbox-list{{$vendor->id}}" class='compare-title'> Compare
				        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
			        </label>
			    </div>
			    @else
			    <div class="compare-list">
			    	<label>
				        <input type="checkbox" name="" value="" id="checkbox-list{{$vendor->id}}" class='compare-title'> Compare
				        <input type="hidden" name="checkbox-{{$vendor->id}}" value="{{$vendor->id}}" >
			        </label>
			    </div>
			    @endif
			@else
				<input type="hidden" id="count" name="a" value="0">
				<div class="compare-list">
			    	<label>
				        <input type="checkbox" name="" value="" id="checkbox-list{{$vendor->id}}" class='compare-title'> Compare
				        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
			        </label>
			    </div>
			    <!-- end compare-list -->
			@endif
			<!-- check session compares -->
		    <script type="text/javascript">
			    $('#checkbox-list{{$vendor->id}}').on("click", function(){
			    	$('#checkbox-photo{{$vendor->id}}').click();
			    });
		    </script>

		</div>
		<!-- end div col-sm-8 col-lg-8 col-md-8 -->
	</div>
	<!-- end div show-list -->

	@endforeach
	<!-- end foreach results -->