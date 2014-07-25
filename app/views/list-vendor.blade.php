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
					<button class="btn btn-default" id="button-submit" ><span class="glyphicon glyphicon-random"></span> COMPARE</button>
				</li>
			</ul>
		</div>
	  </div>
	</div>
	<div class="row">
		<div class="col-xs-2"></div>
		<div class="tab-content">
			<div class="col-xs-10 tab-pane active" id="display-photo">
			<input type="hidden" id="count" name="a" value="0">
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
				<div class="vendor-item" id="lz">
					<div class="avatar"><a href="{{URL::to('detail-vendor',array($vendor->id))}}">{{'<img class="img-responsive img-thumbnail" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a></div>
					<div class="category-name">{{Vendor::find($vendor->id)->category()->get()->first()->name}}</div>
					<a href="{{URL::to('detail-vendor',array($vendor->id))}}"><div class="name">{{$vendor->name}}</div></a>
					<div class="clr"></div>
						<div class="checkbox compare">
					        <label>
					          <input type="checkbox" value="{{$vendor->id}}" class='compare-title'> Compare
					          <input type="hidden" name="checkbox-{{$vendor->id}}" value="" >
					        </label>
					    </div>
				</div>
				@endforeach
				@else <p class="empty">Không tìm thấy kết quả</p>
				@endif
			</div> <!-- div col-xs-8 tab-pane active -->

			<div class="col-xs-10 tab-pane " id="display-list">
			@if(!empty($results))
				@foreach($results as $vendor)
				<script type="text/javascript">
					$(document).ready(function(){
								$('input[type="checkbox"]').click(function(){
								if($(this).is(':checked')) {
									var id= $(this).val();
									$(this).next().val(id);
								}
							});
					});
				</script>
				<div class="vendor-item-list" id="lz">
					<div class="vendor-item-list-left">
						<div class="avatar"><a href="{{URL::to('detail-vendor',array($vendor->id))}}">{{'<img src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a></div>
						<div class="category-name">{{Vendor::find($vendor->id)->category()->get()->first()->name}}</div>
					</div>
					<div class="vendor-item-list-right">
						<div class="name">{{$vendor->name}}</div>
						<div class="address">{{$vendor->address}}</div>
						<div class="decription-list">Set in the heart of Mayfair on prestigious Park Lane, the iconic London Hilton on Park Lane is the perfect place to celebrate your wedding day.
							<a href="{{URL::to('detail-vendor',array($vendor->id))}}"><span class="label label-info">Detail</span></a>
						</div>
						<div class="list-vendor-function">
							<a class="list-check-rates" href="#">
							<span class="glyphicon glyphicon-th">Check-Rates</span>
							</a>
							<a class="list-check-rates" href="#">
								<span class="glyphicon glyphicon-envelope">Contact-Us</span>
							</a>
						</div>
						<a href="#" class="compare-list">
							<div class="checkbox">
						        <label>
						          <input name="checkbox" type="checkbox" class='compare-title'> Compare
						          <input type="hidden" name="checkbox-{{$vendor->name}}" value="" >
						        </label>
						    </div>
						</a>
					</div>
				</div>
				@endforeach
				@else <p class="empty">Không tìm thấy kết quả</p>
				@endif
			</div> <!-- display list -->
		</div> <!--div tab-content-->

		<!-- lazy load -->
		<!-- lazy load -->

	</div>
	</form>
</div>
@endsection
