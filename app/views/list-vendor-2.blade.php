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

        <form id="form-compare" method="get" action="{{Asset('compare')}}">
        <!-- Tab panes -->
		<div class="tab-content">

			<!-- tab-photo -->
			<div class="col-md-7 tab-pane active" id="display-photo" class="margin-footer">
				<div class="row">
					@if( count($results)==0 )
						<h2>
							Không có kết quả nào được tìm thấy
						</h2>
					@else
						@if(!empty($compares))
						<input type="hidden" id="count" name="a" value="{{count($compares)}}">

								@foreach($results as $key=>$vendor)
									<div class="col-sm-4 col-lg-4 col-md-4">
					                    <div class="thumbnail">
					                        <a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{'<img class="img-responsive" alt="" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a>
					                        <div class="category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
					                        <div class="caption">
					                            <div class="name"><a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{$vendor->name}}</a></div>
					                
					                        </div>
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

					                        <!-- case vendor had in session compare -->
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
					                    </div> <!-- end div thumbnail -->
					                </div>
					            @endforeach
					            <!-- end foreach $result -->
					            


					        @else
					        	<input type="hidden" id="count" name="a" value="0">
					        	@foreach($results as $key=>$vendor)
								
									<div class="col-sm-4 col-lg-4 col-md-4">
					                    <div class="thumbnail">
					                        <a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{'<img class="img-responsive" alt="" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a>
					                        <div class="category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
					                        <div class="caption">
					                            <div class="name"><a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{$vendor->name}}</a></div>
					                            
					                        </div>
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

						@endif <!-- end check isset session compare -->

					@endif
					<!-- end check empty rusult -->

				</div> <!-- end div row -->
			</div>
			<!-- .tab-photo -->

			<!-- tab-list -->
			<div class="col-md-7 tab-pane " id="display-list">

			@if( count($results)==0 )
				<h2>
					Không có kết quả nào được tìm thấy
				</h2>
				@else
					@if(!empty($compares))
					<input type="hidden" id="count" name="a" value="{{count($compares)}}">

							@foreach($results as $key=>$vendor)
							<div class="row" id="show-list">
								<div class="col-sm-4 col-lg-4 col-md-4">
									<div class="list-avatar"><a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{'<img class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a></div>
									<div class="list-category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
								</div>
								<div class="col-sm-8 col-lg-8 col-md-8">
									<div class="caption-list">
			                            <div class="name"><a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{$vendor->name}}</a></div>
			                         	<?php
			                            	
			                            	$about=strip_tags($vendor->about);
			                            	if($about)
			                            	{	
			                            		$lengthstr=strlen($about);
			                            		if($lengthstr<210)
			                            		{
			                            			$shortContent=$about;
			                            		}
			                            		else
			                            		{
			                            			$pos=strpos($about, ' ', 210);	                            		
			                						$shortContent=substr($about,0,$pos )."..."; 	
			                            		}	
			                            		                            	
			                            	}
			                            	else
			                            	{
			                            		$shortContent="Chưa có mô tả về Dịch vụ này.";
			                            	}	
			                            	

			                            ?>
			                            <p>{{ $shortContent }}</p>
			                            <div class="website">http://{{$vendor->website}}</div>
			                        </div>
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

			                        <!-- case vendor had in session compare -->
				                    @if( in_array($vendor->id, $compares) )
									<div class="compare-list">
								        <label>
									        <input checked type="checkbox" name="" value="" id="checkbox-list{{$vendor->id}}" class='compare-title'> Compare
									        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
								        </label>
								        <script type="text/javascript" src="{{Asset('assets/js/count-compare.js')}}"></script>
								    </div>
								    @else
								    <div class="compare-list">
								    	<label>
									        <input type="checkbox" name="" value="" id="checkbox-list{{$vendor->id}}" class='compare-title'> Compare
									        <input type="hidden" name="checkbox-{{$vendor->id}}" value="{{$vendor->id}}" >
								        </label>
								    </div>
								    @endif

								    <script type="text/javascript">
									    $('#checkbox-list{{$vendor->id}}').on("click", function(){
									    	$('#checkbox-photo{{$vendor->id}}').click();
									    });
								    </script>
								</div>
							</div>
							@endforeach

						@else
						<input type="hidden" id="count" name="a" value="0">

							@foreach($results as $key=>$vendor)
							<div class="row" id="show-list">
								<div class="col-sm-4 col-lg-4 col-md-4">
									<div class="list-avatar"><a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{'<img class="img-responsive" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a></div>
									<div class="list-category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
								</div>
								<div class="col-sm-8 col-lg-8 col-md-8">
									<div class="caption-list">
			                            <div class="name"><a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{$vendor->name}}</a></div>
			                            
			                            <?php
			                            	
			                            	$about=strip_tags($vendor->about);
			                            	if($about)
			                            	{	
			                            		$lengthstr=strlen($about);
			                            		if($lengthstr<210)
			                            		{
			                            			$shortContent=$about;
			                            		}
			                            		else
			                            		{
			                            			$pos=strpos($about, '.', 210);
			                						$shortContent=substr($about,0,$pos )."...";
			                						// $shortContent=$about;
			                            		}	
			                            		                            	
			                            	}
			                            	else
			                            	{
			                            		$shortContent="Chưa có mô tả về Dịch vụ này.";
			                            	}	
			                            	

			                            ?>
			                            <p>{{ $shortContent }}</p>
			                            <div class="website">http://{{$vendor->website}}</div>
			                        </div>
			                        <!-- end caption-list -->

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

								    <div class="compare-list">
								    	<label>
									        <input type="checkbox" name="" value="" id="checkbox-list{{$vendor->id}}" class='compare-title'> Compare
									        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
								        </label>

								        <script type="text/javascript">
										    $('#checkbox-list{{$vendor->id}}').on("click", function(){
										    	$('#checkbox-photo{{$vendor->id}}').click();
										    });
									    </script>
								    </div>
								    <!-- end compare-list -->

								</div>
								<!-- end col-sm-8 col-lg-8 col-md-8 -->

							</div>
							<!-- end show-list -->
							@endforeach
							<!-- end results -->

						@endif
						<!-- end not in $compares -->

				@endif
				<!-- end $results != 0 -->
			</div>
			<!-- end .tab-list -->

	</div>
	<!-- .tab-content -->

	</form> <!-- form compare -->


	
	<!-- modal note when check for checkbox in each vendor -->
	<button id="toida" style="display:none;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalToiDa" data-backdrop="static"></button>
		<div class="modal fade" id="ModalToiDa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">Thông báo</h4>
		      </div>
		      <div class="modal-body">
		        <span style="color: #ff2642; font-size: 25px;">Bạn đã chọn đủ 5 dịch vụ để so sánh</span>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" id="compare_submit_modal" class="btn btn-primary" data-dismiss="modal" data-backdrop="static">So sánh</button>
		        <script type="text/javascript">
		        	$('#compare_submit_modal').click(function(){
		        		$("#form-compare").submit();
		        	});
		        </script>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<button id="chuachon" style="display:none;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalChuaChon" data-backdrop="static"></button>
		<div class="modal fade" id="ModalChuaChon" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">Thông báo</h4>
		      </div>
		      <div class="modal-body">
		        <span style="color: #ff2642; font-size: 25px;">Bạn phải chọn ít nhất 1 dịch vụ</span>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary" data-dismiss="modal">Đóng</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

</div>

<script type="text/javascript">

	function get_location(name){
		$.ajax({
			type: "post",
			url: "{{URL::route('get_location')}}",
			data:{name:name}
		});
	};

</script>	

@endsection
