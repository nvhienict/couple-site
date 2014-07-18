@extends('main')
@section('title')
Danh sách Dịch vụ
@endsection
@section('content')
<div id='container'>
<form id="formCheck" action="compare" method="post">
	<div class="panel panel-default">
	  <div class="panel-body">
	   	Kết quả tìm kiếm với <span style="color: #19B5BC">
	   	{{Input::get('name')}}</span> Location: <span style="color: #19B5BC">{{Location::where("id",Input::get('location'))->get()->first()->name}}</span> Category: <span style="color: #19B5BC">{{Input::get('category')}}</span>
	   	<div class="top-list-vendor-function">
					<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li class="active">
					<a href="#display-photo" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-camera"></span> PHOTO</a>
				</li>
				<li>
					<a href="#display-list" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-th"></span> LIST</a>
				</li>
				<li>
					<!-- <a href="#" onclick="getCompare();" ><span class="glyphicon glyphicon-random"></span> COMPARE</a> -->
					<button id="btnSubmit" class="btn btn-default" type="submit">
					<span class="glyphicon glyphicon-random"></span> COMPARE</button>
				</li>
					<script type="text/javascript">
					</script>
			</ul>

		</div>
	  </div>
	</div>
	<div class="row">
		<div class="col-xs-3"></div>
		<div class="tab-content">
			<div class="col-xs-8 tab-pane active " id="display-photo">
				@if(!empty($results))
				@foreach($results as $vendor)
				<div class="vendor-item" id="lz">
					<div class="avatar"><a href="detail-vendor">{{'<img class="gh" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a></div>
					<div class="category-name">{{Vendor::find($vendor->id)->category()->get()->first()->name}}</div>
					<div class="name">{{$vendor->name}}</div>
					<div class="clr"></div>
					<div class="compare">
						<div class="checkbox">
					        <label>
					        	<input type="checkbox" class='compare-title' name="chk[]" value={{$vendor->id}} > Compare
					        </label>
					    </div>
					</div>
				</div>
				@endforeach
				@else <p class="empty">Không tìm thấy kết quả</p>
				@endif
			</div> <!-- div col-xs-8 tab-pane active -->

			<div class="col-xs-8 tab-pane " id="display-list">
				@if(!empty($results))
				@foreach($results as $vendor)
				<div class="vendor-item-list" id="lz">
					<div class="vendor-item-list-left">
						<div class="avatar"><a href="detail-vendor">{{'<img class="gh" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a></div>
						<div class="category-name">{{Vendor::find($vendor->id)->location()->get()->first()->name}}</div>
					</div>
					<div class="vendor-item-list-right">
						<div class="name">{{$vendor->name}}</div>
						<div class="address">{{$vendor->address}}</div>
						<?php $about=$vendor->about ?>
						<div class="decription-list">{{str_limit($about, 20, "....")}}
							<span class="label label-info">Detail</span>
						</div>
						<div class="list-vendor-function">
							<a class="list-check-rates" href="#">
							<span class="glyphicon glyphicon-th">Check-Rates</span>
							</a>
							<a class="list-check-rates" href="#">
								<span class="glyphicon glyphicon-envelope">Contact-Us</span>
							</a>
						</div>
						<div class="compare-list">
							<div class="checkbox">
						        <label>
						          	<input type="checkbox" class='compare-title' name="chk[]" value={{$vendor->id}} > Compare
						        </label>
						    </div>
						</div>
					</div>
				</div>
				@endforeach
				@else <p class="empty">Không tìm thấy kết quả</p>
				@endif
			</div> <!-- display list -->

		</div> <!--div tab-content-->

		<!-- lazy load -->
		<script type="text/javascript">
			$(function() {    
			   	$("#lz img").lazyload({
			   		placeholder: "{{Asset('icon/loading.gif')}}",
				    effect: "fadeIn",
				    threshold : 0,
			  	});
			   	window.onload = function() {
        		$(window).resize()
    			};
			});
		</script>
		<!-- lazy load -->

	</div>
</form>
</div>
@endsection
