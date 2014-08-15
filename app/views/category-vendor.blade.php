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
		  		<div class="col-md-7"></div>
		  		<div class="col-md-5">
		  			<div class="top-list-vendor-function">
		  					<form action="{{URL::route('category_vendor')}}" method="get" style="float:left;" >
		  						<input type="hidden" name="id" value="{{$id}}">
		  						<button type="submit" class="btn btn-default" id="list-vendor-photo" ><span class="glyphicon glyphicon-th-large"></span> DẠNG LƯỚI</button>
		  					</form>
								
							<form action="{{URL::route('category_vendor_list')}}" method="get" style="float:left;" >
		  						<input type="hidden" name="id" value="{{$id}}">
		  						<button type="submit" class="btn btn-default" id="list-vendor-list" ><span class="glyphicon glyphicon-list"></span> DẠNG DANH SÁCH</button>
		  					</form>
							
							<button class="btn btn-default" id="submit_compare" ><span class="glyphicon glyphicon-retweet"></span> SO SÁNH</button>
					</div>

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
	                <input type="text" name="name" class="form-control input-lg"
	                		value="" placeholder="Từ tìm kiếm" />
	                <select name="location" class="form-control input-lg">
	                	@foreach(Location::get() as $location)
				    	<option value="{{$location->id}}">{{$location->name}}</option>
				    	@endforeach
			    	</select>
	                <input id="searchTxt" name="category" type="text" data-toggle="dropdown" class="input-text form-control input-lg" placeholder="Danh mục">
			    	<input id="searchId" name="category_id" type="hidden">
			    	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					    <li role="presentation">
					    	<div class="row" id="menu">
						    	<div class="col-xs-6">
						      		<ul class="list-unstyled">
							      		@foreach (Category::get() as $index=> $category)
			    						@if($index<6)
						      			<li><span>{{$category['name']}}</span>
						      			<input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}">
						      			</li>
						      			@endif
		      							@endforeach
						      		</ul>
						      	</div>
						      	<div class="col-xs-6">
						      		<ul class="list-unstyled">
						      			@foreach (Category::get() as $index=> $category)
		    							@if($index>=6)
						      			<li><span>{{$category['name']}}</span>
						      			<input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}">
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
				    <button type="submit" class="btn btn-skin btn-lg btn-block">Tìm kiếm</button>			
		    	</form>
            </div>
        </div>

        <form id="form-compare" method="get" action="{{Asset('compare')}}">

			<div class="col-md-7 " id="display-photo">
			@if(!empty($compares))
				<input type="hidden" id="count" name="a" value="{{count($compares)}}">
				@foreach($results as $key=>$vendor)

					<div class="row">
						<div class="col-sm-4 col-lg-4 col-md-4">
		                    <div class="thumbnail">
		                        <a href="{{URL::to('vendor',array($vendor->id))}}">{{'<img class="list_vendor_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a>
		                        <div class="category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
		                        <div class="caption">
		                            <div class="name"><a href="{{URL::to('vendor',array($vendor->id))}}">{{$vendor->name}}</a></div>
		                            <?php $about=$vendor->about ?>
		                            <p>{{str_limit($about, 30, "....")}}</p>
		                        </div>
		                        <div class="ratings">
		                            <p class="pull-right">6 reviews</p>
		                            <p>
		                                <span class="glyphicon glyphicon-star"></span>
		                                <span class="glyphicon glyphicon-star"></span>
		                                <span class="glyphicon glyphicon-star"></span>
		                                <span class="glyphicon glyphicon-star-empty"></span>
		                                <span class="glyphicon glyphicon-star-empty"></span>
		                            </p>
		                        </div>

		                        <!-- case vendor had in session compare -->
			                    @if( in_array($vendor->id, $compares) )
		                        <div class="checkbox compare">
                        			<label>
								        <input checked type="checkbox" name="chk[]" value="{{$vendor->id}}" class='compare-title'> Compare
								        <input type="hidden" name="checkbox-{{$vendor->id}}" value="{{$vendor->id}}" >
							        </label>
							        <script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
								        
								</div>
								@else
								<div class="checkbox compare">
	                        			<label>
									        <input type="checkbox" name="chk[]" value="{{$vendor->id}}" class='compare-title'> Compare
									        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
								        </label>
								        <script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
								        
								</div>
							    @endif
		                    </div> <!-- end div thumbnail -->
		                </div>
			        @endforeach()

			    @else <!-- not isset session compare -->

			    	<input type="hidden" id="count" name="a" value="0">
		        	@foreach($results as $key=>$vendor)
						<div class="col-sm-4 col-lg-4 col-md-4">
		                    <div class="thumbnail">
		                        <a href="{{URL::to('vendor',array($vendor->id))}}">{{'<img class="list_vendor_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a>
		                        <div class="category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
		                        <div class="caption">
		                            <div class="name"><a href="{{URL::to('vendor',array($vendor->id))}}">{{$vendor->name}}</a></div>
		                            <?php $about=$vendor->about ?>
		                            <p>{{str_limit($about, 30, "....")}}</p>
		                        </div>
		                        <div class="ratings">
		                            <p class="pull-right">6 reviews</p>
		                            <p>
		                                <span class="glyphicon glyphicon-star"></span>
		                                <span class="glyphicon glyphicon-star"></span>
		                                <span class="glyphicon glyphicon-star"></span>
		                                <span class="glyphicon glyphicon-star-empty"></span>
		                                <span class="glyphicon glyphicon-star-empty"></span>
		                            </p>
		                        </div>
		                        <div class="checkbox compare">
							        <label>
								        <input type="checkbox" name="chk[]" value="{{$vendor->id}}" class='compare-title'> Compare
								        <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
							        </label>
							        <input type="hidden" id="count" name="a" value="0">
							        <script type="text/javascript" src="{{Asset('assets/js/script-giang.js')}}"></script>
							    </div>

		                    </div> <!-- end div thumbnail -->
		                </div>
		                @endforeach

				@endif <!-- end check isset session compare -->

				</div> <!-- end div row -->
			</div> <!-- end div display photo -->

		<div class="col-md-1"></div>
	</div> <!-- div row -->

	</form>

	<button id="toida" style="display:none;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalToiDa">GH</button>
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
		        <button type="submit" id="compare_submit_modal" class="btn btn-primary" data-dismiss="modal">So sánh</button>
		        <script type="text/javascript">
		        	$('#compare_submit_modal').click(function(){
		        		$("#form-compare").submit();
		        	});
		        </script>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		<button id="chuachon" style="display:none;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalChuaChon"></button>
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
@endsection
