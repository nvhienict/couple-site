@extends('main')
@section('title')
So sánh dịch vụ
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

<div class="row" style="margin-bottom:20px;">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<div class="row">
			<div class="col-xs-6">
				<h3>So sánh dịch vụ nhà cung cấp</h3>
			</div>
			
		</div>
	</div>
	<div class="col-xs-1"></div>
</div>
<div class="row">
	<div class="col-xs-1"></div>
	<div class="col-xs-10"  id="compare_main">
		<div class="compare_title">
			<div class="compare_tr1">
				
			</div>
			<div class="compare_tr2">
				<p class="compare_tr_content"><b>Địa chỉ</b></p>
			</div>
			<div class="compare_tr3">
				<p class="compare_tr_content"><b>Số điện thoại</b></p>
			</div>
			<div class="compare_tr4">
				<p class="compare_tr_content"><b> Đánh giá</b></p>
			</div>
			<div class="compare_tr5">
				<p class="compare_tr_content"><b> Gói dịch vụ</b></p>
			</div>
			<div class="compare_tr6">
				<p class="compare_tr_content"><b> Nhà cung cấp</b></p>
			</div>
		</div>

		<!-- container data vendor -->
		<?php $i=0; ?>
		@if( !empty($compares) )
		<?php $arCompares = array_unique($compares); ?>
			@foreach ($arCompares as $key=>$compare)
				@foreach (Vendor::get() as $vendor)
					@if($vendor->id==$compare)
						<?php $i++; ?>
			
							<div class="compare_vendor_show{{$i}}" id="del_compare{{$key}}">
								<div class="compare_vendor_img-name">
									<div class="btn_del_vendor_compare">
										<button class="btn btn-default" id="btn_del_compare{{$key}}">
											<img src="{{Asset('icon/delete.png')}}" class="img-icon">
										</button>
										<script type="text/javascript">
											$('#btn_del_compare{{$key}}').click(function(){

												$.ajax({
													type: "post",
													url: "{{URL::route('remove_vendor_compare', array($key))}}"

												});

												$('#del_compare{{$key}}').remove();
											});
										</script>
									</div>
									<div class="compare_add_vendor_show">
										<a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{'<img class="img-responsive img-thumbnail" src="data:image/jpeg;base64,' . base64_encode($vendor->avatar) . '" />'}}</a>
										<a href="{{URL::route('vendor',array(Category::where('id',Vendor::where('id',$vendor->id)->get()->first()->category)->get()->first()->slug,$vendor->slug))}}">{{$vendor->name}}</a>
									</div>
								</div>
								<div class="compare_tr22">
									{{$vendor->address}}
								</div>
								<div class="compare_tr32">
									{{$vendor->phone}}
								</div>
								<div class="compare_tr42">
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
				                      
								</div>
								<div class="compare_tr52">
									{{Vendor::find($vendor->id)->category()->get()->first()->name}}
								</div>
								<div class="compare_tr62">
									<span style="color: #ff924c"><i class="glyphicon glyphicon-ok"></i></span>
									<div><button type="button" class="btn btn-skin btn-theme btn-lg"><i class="glyphicon glyphicon-heart-empty"></i> Lưu lại</button></div>
								</div>
							</div>
					@endif
				@endforeach
			@endforeach
		@endif
		<!-- vendor 1 -->
		<div class="compare_vendor" id="del_compare">
				<div class="compare_vendor_img-name">
					<div class="btn_del_vendor_compare">
						<button class="btn btn-default" id="btn_del_compare">
							<img src="{{Asset('icon/delete.png')}}" class="img-icon">
						</button>
					</div>
					<div class="compare_add_vendor">
						<a href="javascript:;" onclick="back_to_page();" ><i class="glyphicon glyphicon-plus"></i></a>
					</div>
				</div>
				<div class="compare_tr22"></div>
				<div class="compare_tr32"></div>
				<div class="compare_tr42"></div>
				<div class="compare_tr52"></div>
				<div class="compare_tr62"></div>
		</div>

		<!-- vendor 2 -->
		<div class="compare_vendor" id="del_compare">
				<div class="compare_vendor_img-name">
					<div class="btn_del_vendor_compare">
						<button class="btn btn-default" id="btn_del_compare">
							<img src="{{Asset('icon/delete.png')}}" class="img-icon">
						</button>
					</div>
					<div class="compare_add_vendor">
						<a href="javascript:;" onclick="back_to_page();" ><i class="glyphicon glyphicon-plus"></i></a>
					</div>
					
				</div>
				<div class="compare_tr22"></div>
				<div class="compare_tr32"></div>
				<div class="compare_tr42"></div>
				<div class="compare_tr52"></div>
				<div class="compare_tr62"></div>
		</div>

		<!-- vendor 3 -->
		<div class="compare_vendor" id="del_compare">
				<div class="compare_vendor_img-name">
					<div class="btn_del_vendor_compare">
						<button class="btn btn-default" id="btn_del_compare">
							<img src="{{Asset('icon/delete.png')}}" class="img-icon">
						</button>
					</div>
					<div class="compare_add_vendor">
						<a href="javascript:;" onclick="back_to_page();" ><i class="glyphicon glyphicon-plus"></i></a>
					</div>
					
				</div>
				<div class="compare_tr22"></div>
				<div class="compare_tr32"></div>
				<div class="compare_tr42"></div>
				<div class="compare_tr52"></div>
				<div class="compare_tr62"></div>
		</div>

		<!-- vendor 4 -->
		<div class="compare_vendor" id="del_compare">
				<div class="compare_vendor_img-name">
					<div class="btn_del_vendor_compare">
						<button class="btn btn-default" id="btn_del_compare">
							<img src="{{Asset('icon/delete.png')}}" class="img-icon">
						</button>
					</div>
					<div class="compare_add_vendor">
						<a href="javascript:;" onclick="back_to_page();" ><i class="glyphicon glyphicon-plus"></i></a>
					</div>
					
				</div>
				<div class="compare_tr22"></div>
				<div class="compare_tr32"></div>
				<div class="compare_tr42"></div>
				<div class="compare_tr52"></div>
				<div class="compare_tr62"></div>
		</div>

		<!-- vendor 5 -->
		<div class="compare_vendor" id="del_compare">
				<div class="compare_vendor_img-name">
					<div class="btn_del_vendor_compare">
						<button class="btn btn-default" id="btn_del_compare">
							<img src="{{Asset('icon/delete.png')}}" class="img-icon">
						</button>
					</div>
					<div class="compare_add_vendor">
						<a href="javascript:;" onclick="back_to_page();"><i class="glyphicon glyphicon-plus"></i></a>
					</div>
					
				</div>
				<div class="compare_tr22"></div>
				<div class="compare_tr32"></div>
				<div class="compare_tr42"></div>
				<div class="compare_tr52"></div>
				<div class="compare_tr62"></div>
		</div>

		<script type="text/javascript" >
			// ------- back to page list-vendor
			function back_to_page(){
				location.replace(document.referrer);
			}
		</script>

	</div>
	<div class="col-xs-1"></div>
</div>
@endsection