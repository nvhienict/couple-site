@extends('main')
@section('title')
Danh sách Dịch vụ
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div id='container'>
<form id="form-submit" method="post" action="{{Asset('compare')}}">
	<div class="panel panel-default">
	  	<div class="panel-body">
		  	<div class="row">
		  		<div class="col-md-9">
		  			Kết quả tìm kiếm với <span style="color: #19B5BC">
			   		{{Input::get('name')}}</span> Location: <span style="color: #19B5BC">{{Location::where("id",Input::get('location'))->get()->first()->name}}</span> Category: <span style="color: #19B5BC">{{Input::get('category')}}</span>
		  		</div>
		  		<div class="col-md-3">
		  			<div class="top-list-vendor-function">
						<ul class="nav nav-tabs" role="tablist">
							<li class="active">
								<a href="#display-photo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-th-large"></span> PHOTO</a>
							</li>
							<li>
								<a href="#display-list" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> LIST</a>
							</li>
							<li>
								<button class="btn btn-default" type="submit" id="button-submit" ><span class="glyphicon glyphicon-retweet"></span> COMPARE</button>
							</li>
						</ul>
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
                <input type="text" name="name" class="form-control input-lg" value="{{Input::get('name')}}" />
                <select name="category" class="form-control input-lg">
                	<option value="{{Input::get('category')}}">{{Input::get('category')}}</option>
		    		@foreach (Category::get() as $index=> $category)
			    	<option value="{{$category['id']}}">{{$category['name']}}</option>
			    	@endforeach
		    	</select>
                <select name="location" class="form-control input-lg">
                	<option value="{{Location::where("id",Input::get('location'))->get()->first()->name}}">{{Location::where("id",Input::get('location'))->get()->first()->name}}</option>
		    		@foreach(Location::get() as $location)
			    	<option value="{{$location->id}}">{{$location->name}}</option>
			    	@endforeach
		    	</select>
            </div>
        </div>
		<div class="tab-content">
		<input type="hidden" id="count" name="a" value="0">
			<div class="col-md-7 tab-pane active" id="display-photo">
				<div class="row">
					@if(!empty($results))
						@foreach($results as $vendor)
						<script type="text/javascript">
							$(document).ready(function(){
								var $i=$('#count').val();
										$('input[type="checkbox"]').click(function(){
										if($(this).is(':checked')) {
											var id= $(this).val();
											 $(this).next().val(id);
												$i++;
											$("#count").val($i);
										}
										else{
											 $(this).next().val("");
											 $i--;
											 $("#count").val($i);
											}
									});
									$("#button-submit").click(function(){
									if($i>5){ 
										alert('Chỉ so sánh tối đa 5 vendor');
										return false;
										
									}
									else if($i==0){
									 	alert('Chưa chọn Vendor nào');
									 	return false;
									    
									}
									else if($i<6&&$i>0){ $("#form-submit").submit();}
									});
							});
						</script>
							<div class="col-sm-4 col-lg-4 col-md-4">
			                    <div class="thumbnail">
			                        <a href="detail-vendor">{{'<img class="list_vendor_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a>
			                        <div class="category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
			                        <div class="caption">
			                            <div class="name"><a href="detail-vendor">{{$vendor->name}}</a></div>
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
								          <input type="checkbox" value="{{$vendor->id}}" class='compare-title'> Compare
								          <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
								        </label>
								    </div>
			                    </div> <!-- end div thumbnail -->
			                </div>
			            @endforeach()
						@else <p class="empty">Không tìm thấy kết quả</p>
						@endif
				</div> <!-- end div row -->
			</div> <!-- end div display photo -->

			<div class="col-md-7 tab-pane " id="display-list">
			<input type="hidden" id="count-list" name="a" value="0">
				@if(!empty($results))
				@foreach($results as $vendor)
				<div class="row" id="show-list">
					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="list-avatar"><a href="detail-vendor">{{'<img class="gh" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a></div>
						<div class="list-category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
					</div>
					<div class="col-sm-8 col-lg-8 col-md-8">
						<div class="caption">
                            <div class="name"><a href="detail-vendor">{{$vendor->name}}</a></div>
                            <?php $about=$vendor->about ?>
                            <p>{{str_limit($about, 30, "....")}}</p>
                            <div class="website">http://{{$vendor->website}}</div>
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
						<div class="compare-list">
					        <label>
					          <input type="checkbox" value="{{$vendor->id}}" class='compare-title'> Compare
					          <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
					        </label>
					    </div>
					</div>
				</div>
				@endforeach
				@else <p class="empty">Không tìm thấy kết quả</p>
				@endif
			</div> <!-- display list -->

		</div> <!--div tab-content-->
		<div class="col-md-1"></div>
	</div> <!-- div row -->


	</form>
</div>
@endsection
