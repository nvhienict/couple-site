@extends('main')
@section('title')
Danh sách Dịch vụ
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')


<div id='container'>
	<div class="panel panel-default">
	  	<div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-1"></div>
		  		<div class="col-md-6">
		  			Kết quả tìm kiếm với 
		  			<span style="color: #19B5BC">
		  				@if( !empty(Input::get('name')) )
			   				{{Input::get('name')}}
			   			@else
			   				Từ tìm kiếm
			   			@endif
			   		</span> 
			   		Địa điểm: 
			   		<span style="color: #19B5BC">
			   			
			   			@if( !empty(Input::get('location')) )
			   				{{Input::get('location')}}
			   			@else
			   				@if( Session::has('location') )
			   					{{Location::where("id",Session::get('location'))->get()->first()->name}}
			   				@else
			   					{{VendorController::location_last()->name}}
			   				@endif
			   			@endif

			   		</span> 
			   		Danh mục: 
			   		<span style="color: #19B5BC">

			   			@if( !empty(Input::get('category')) )
			   				{{Input::get('category')}}
			   			@else
			   				@if( !empty($category_id) )
				   				{{Category::where("id",$category_id)->get()->first()->name}}
				   			@else
				   				Chưa chọn
				   			@endif
			   			@endif

			   		</span>
		  		</div>
		  		<div class="col-md-5">

					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
					  	<li class="active"><a href="#display-photo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-th-large"></span> DẠNG LƯỚI</a></li>
					  	<li><a href="#display-list" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> DẠNG DANH SÁCH</a></li>
						<li><a href="javascript:;" id="submit_compare" ><span class="glyphicon glyphicon-retweet"></span> SO SÁNH</a></li>
					</ul>

		  		</div>
		  	</div>
	  	</div>
	</div>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-3">
            <p class="lead">Tìm kiếm nhà cung cấp</p>
            <div class="list-group">
            	<form id="form-search" class="wow bounceInUp form-homepage" action="{{Asset('list-vendor/search')}}" method="get">
	                <input type="text" name="name" class="form-control input-lg" value="{{Input::get('name')}}" placeholder="Từ tìm kiếm" />
	                <select name="location" class="form-control input-lg" onchange="get_location(this.value)" >
			    		@foreach(Location::get() as $location)

			    			@if(!Session::has('location'))
			    				<option value="{{$location->name}}" >{{$location->name}}</option>
				    		@else
				    			@if(Session::get('location')==$location->id)
				    				<option selected="selected" value="{{$location->name}}" >{{$location->name}}</option>
				    			@else
				    				<option value="{{$location->name}}" >{{$location->name}}</option>
				    			@endif
				    		@endif

				    	@endforeach
			    	</select>
			    	<?php
				    	if( !empty(Input::get('category')) ){
			   				$nameCategory = Input::get('category');
				    	}
			   			elseif( isset($category_id) ) {
				   			$nameCategory = Category::where("id",$category_id)->get()->first()->name;
			   			}
			   			else{
			   				$nameCategory="";
			   			}
				   		
			   		?>
	                <input id="searchTxt" name="category" type="text" data-toggle="dropdown" class="input-text form-control input-lg" placeholder="Danh mục" value="{{$nameCategory}}" readonly style="cursor:pointer;" >
			    	<!-- <input id="searchId" name="category_id" type="hidden"> -->
			    	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					    <li role="presentation">
					    	<div class="row" id="menu">
						    	<div class="col-xs-6">
						      		<ul class="list-unstyled">
							      		@foreach (Category::get() as $index => $category)
			    						@if($index<7)
						      			<li><span style="cursor:pointer;" >{{$category['name']}}</span>
						      			<!-- <input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}"> -->
						      			</li>
						      			@endif
		      							@endforeach
						      		</ul>
						      	</div>
						      	<div class="col-xs-6">
						      		<ul class="list-unstyled">
						      			@foreach (Category::get() as $index=> $category)
		    							@if($index>=7)
						      			<li><span style="cursor:pointer;" >{{$category['name']}}</span>
						      			<!-- <input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}"> -->
						      			</li>
						      			@endif
		      							@endforeach
						      		</ul>
						      	</div>
					      	</div>
					    </li>
					    <script>
						    $(document).ready(function(){
								$('#menu li span').click(function(){
								  var text= $(this).text();
								  var id= $(this).next().val();
									$( "#searchTxt" ).val(text);
									$( "#searchId").val(id);
								});
							});
						</script>	
				    </ul>
				    <button type="submit" class="btn btn-skin btn-lg btn-block" id="list-vendor-search">Tìm kiếm</button>			
		    	</form>
            </div>
        </div>

		<div class="tab-content">

			<!-- tab-photo -->
			<div class="col-md-7 tab-pane active" id="display-photo" class="margin-footer">
				<div class="row">
					
					        	@foreach($results as $key=>$vendor)
								
									<div class="col-sm-4 col-lg-4 col-md-4">
					                    <div class="thumbnail">

					                    	<!-- Images -->
					                        <a href="#">
					                        	{{'<img class="img-responsive" alt="" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}
					                        </a>
					                        
					                        <!-- Location Name -->
					                        <div class="category-name">
					                        	{{VendorController::getLocationName($vendor->id)}}
					                        </div>
					                        
					                        <!-- Vendor Name -->
					                        <div class="caption">

					                            <div class="name">
						                            <a href="#">
						                            	{{$vendor->name}}
						                            </a>
					                            </div>
					                            
					                        </div>

					                        <!-- Vendor Rating -->
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

					                        <!-- Checkbox Compare -->
					                        <div class="compare-photo">
										        <label>
											        <input type="checkbox" name="chk[]" value="{{$vendor->id}}" id="checkbox-photo{{$vendor->id}}" class='compare-title'> Compare
											        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
										        </label>

										        <input type="hidden" id="count" name="a" value="0">

											    <script type="text/javascript">
													$('#checkbox-photo{{$vendor->id}}').on("click", function(){
														if( $(this).prop('checked') ){
															$('#gh').prop("checked", true);
															$('#checkbox-list{{$vendor->id}}').prop("checked", true);
														} else {
															$('#gh').prop("checked", false);
															$('#checkbox-list{{$vendor->id}}').prop("checked", false);
														};
													});
												</script>
										        <script type="text/javascript" src="{{Asset('assets/js/count-compare.js')}}"></script>
										    </div>

					                    </div> <!-- end div thumbnail -->
					                </div>
					                @endforeach


				</div> <!-- end div row -->

	</div>
	</div>
			
	</div>
	<!-- .tab-content -->



@endsection
