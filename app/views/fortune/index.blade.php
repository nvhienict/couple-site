
@extends((Session::has('email')) ? 'main-dashboard' : 'main')

@section('title')
Xem ngày cưới | thuna.vn
@endsection
@section('nav-bar')
@include('nav')
@endsection

@section('content')
	
	@if (Session::has('email'))
		<div class="row" style="margin-top: 50px;">
			<div class="col-lg-10 col-lg-offset-1 ft-title">
	@else
		<div class="row" style="margin-top: 20px;">
			<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 ft-title">
	@endif

			<h2>Xem ngày cưới</h2>
			<p class="hidden-xs">
				Quan niệm <span class="txt-bold-italic">phong tục tập quán xưa</span> có câu: 
				"Lấy vợ xem tuổi đàn bà, làm nhà xem tuổi đàn ông", 
				vì vậy khi muốn tổ chức cưới, hai gia đình sẽ căn cứ vào tuổi của cô dâu.
				Hầu hết các vị phụ huynh sẽ tránh cưới cho con đúng vào năm tuổi
				<span class="txt-bold-italic">Kim Lâu</span> của cô dâu.
			</p>
		</div> <!-- title -->
		
		<div class="col-lg-12 col-sm-12 text-center">

        		<div class="row form-group">
        			<div class="lb-input-year col-lg-1 col-lg-offset-4 col-sm-2 col-sm-offset-4 col-xs-3 col-xs-offset-1">
        				Chú rể
        			</div>
	        		<div class="col-lg-2 col-sm-2 col-xs-7">
		        		<select class="form-control" name="tuoi_chu_re" onchange="yearGroomSelect(this.value);">
		        			@for($i=1954; $i<=2015; $i++)

			        			@if (Session::has('tuoi_chu_re'))
			        				@if (FortuneController::convertYear($i)==Session::get('tuoi_chu_re'))
			        					<option selected="selected" value="{{FortuneController::convertYear($i)}}">
				        					{{FortuneController::convertYear($i)}}
				        					&nbsp(<span class="txt-bold">{{$i}}</span>)
				        				</option>
			        				@else
			        					<option value="{{FortuneController::convertYear($i)}}">
				        					{{FortuneController::convertYear($i)}}
				        					&nbsp(<span class="txt-bold">{{$i}}</span>)
				        				</option>
			        				@endif
			        			@else
			        				<option value="{{FortuneController::convertYear($i)}}">
			        					{{FortuneController::convertYear($i)}}
			        					&nbsp(<span class="txt-bold">{{$i}}</span>)
			        				</option>
			        			@endif

		        			@endfor
		        		</select>
	        		</div>
	        	</div>
	        	<div class="row form-group">
        			<div class="lb-input-year col-lg-1 col-lg-offset-4 col-sm-2 col-sm-offset-4 col-xs-3 col-xs-offset-1">
	        			Cô dâu
	        		</div>
	        		<div class="col-lg-2 col-sm-2 col-xs-7">
	        			<select class="form-control" name="tuoi_co_dau" onchange="yearBrideSelect(this.value);">
		        			@for($i=1954; $i<=2015; $i++)

			        			@if (Session::has('tuoi_co_dau'))
			        				@if (FortuneController::convertYear($i)==Session::get('tuoi_co_dau'))
			        					<option selected="selected" value="{{FortuneController::convertYear($i)}}">
				        					{{FortuneController::convertYear($i)}}
				        					&nbsp(<span class="txt-bold">{{$i}}</span>)
				        				</option>
			        				@else
			        					<option value="{{FortuneController::convertYear($i)}}">
				        					{{FortuneController::convertYear($i)}}
				        					&nbsp(<span class="txt-bold">{{$i}}</span>)
				        				</option>
			        				@endif
			        			@else
			        				<option value="{{FortuneController::convertYear($i)}}">
			        					{{FortuneController::convertYear($i)}}
			        					&nbsp(<span class="txt-bold">{{$i}}</span>)
			        				</option>
			        			@endif

		        			@endfor
		        		</select>
		        	</div>
	        	</div>
	        	<button type="button" class="btn btn-warning" onclick="viewResult()">Xem kết quả</button>

		</div> <!--/col-lg-12-->

		@if (Session::has('email'))
			<div class="row" style="margin-top: 50px;">
				<div class="col-lg-10 col-lg-offset-1 lich-ket-qua">
		@else
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 lich-ket-qua">
		@endif

			<div class="ngay-hien-tai">
				Ngày <span class="current-day"></span> Tháng <span class="current-month"></span> Năm <span class="current-year"></span>
				<span id="gh" style="display:none;">
					@if (Session::has('tuoi_xung_khac_chu_re'))
						{{Session::get('tuoi_xung_khac_chu_re')}}
					@endif
				</span>
				<span id="hg" style="display:none;">
					@if (Session::has('tuoi_xung_khac_co_dau'))
						{{Session::get('tuoi_xung_khac_co_dau')}}
					@endif
				</span>
			</div> <!--/ngay-hien-tai-->
			<script type="text/javascript">

				function yearGroomSelect(value) {
					var year = value.replace(/&nbsp/gi,' ');

					$.ajax({
						type: "post",
						url: "{{URL::action('FortuneController@postYearGroom')}}",
						data:{
							year:year
						}
					});
				};

				function yearBrideSelect(value) {
					var year = value.replace(/&nbsp/gi,' ');

					$.ajax({
						type: "post",
						url: "{{URL::action('FortuneController@postYearBride')}}",
						data:{
							year:year
						}
					});
				};

				function viewResult(){

					var yearGroom = $('select[name=tuoi_chu_re]').val();
					var yearBride = $('select[name=tuoi_co_dau]').val();

					var groom = yearGroom.replace(/&nbsp/gi,' ');
					var bride = yearBride.replace(/&nbsp/gi,' ');

					$.ajax({
						type: "post",
						url: "{{URL::action('FortuneController@postYear')}}",
						data:{
							groom:groom,
							bride:bride
						},
						success:function(data){
							$('#gh').text(data.chu_re);
							$('#hg').text(data.co_dau);
							location.reload();
						}
					});

				}

			</script>
			<script type="text/javascript" src="{{Asset('assets/js/xem-ngay-input.js')}}"></script>
			<script type="text/javascript" src="{{Asset('assets/js/xem-ngay-output.js')}}"></script>
			<script language="JavaScript">
				<!--
				setOutputSize("small");
				document.writeln(printSelectedYear());
				-->
			</script>

			<form action="" method="get" id="frmViewMMYY">
				<label>Chọn ngày tháng năm: </label>
				<select name="mm">
					@for ($i=1; $i<=12; $i++)
						<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
				<select name="yy">
					@for ($i=2015; $i<=2100; $i++)
						<option value="{{$i}}">{{$i}}</option>
					@endfor
				</select>
				<input type="submit" value="Xem ngày tháng" />
			</form>
			
		</div> <!--/lich-ket-qua-->

		<div class="col-lg-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 ft-content">
			<div class="title-ft-content">
				<span class="start-red">*</span> Đầu tiên, <span class="txt-bold">Chọn năm đẹp để cưới gả</span> phải <span style="color: red; font-weight:bold">kỵ</span> những <span class="txt-bold">Năm hung niên</span>
			</div> <!--/ft-content-->
			<div class="tbl-nam-hung-nien">
				<div class="col-xs-12">
					<table class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th>Tuổi</th>
								<th>Năm hung niên tuổi chú rể</th>
								<th>Năm hung niên tuổi cô dâu</th>
							</tr>
						</thead>
						<tbody>
							@foreach( FortuneController::getHungNien() as $item )
							<tr>
								<td>{{$item->tuoi}}</td>
								<td>{{$item->chu_re}}</td>
								<td>{{$item->co_dau}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div> <!--/tbl-nam-hung-nien-->

			<div class="title-ft-content">
				<span class="start-red">*</span> 
				<span class="txt-bold">Chọn tháng đẹp để cưới gả.</span> 
				Tháng tốt nhất, đẹp nhất là tháng đại lợi ( tháng đại lợi là tháng tốt nhất, có nhiều lợi nhất, lợi về tiền bạc, công danh, con cái...) , 
				sau đó là tiểu lợi ( Có lợi nhưng không lớn). Nếu không cưới và Đại lợi, tiểu lợi, mà cưới vào các tháng còn lại, thì phải 
				<span style="color: red; font-weight:bold">tránh</span> các trường hợp như trong bảng hướng dẫn dưới đây:
			</div> <!--/ft-content-->
			<div class="tbl-nam-hung-nien">
				<div class="col-xs-12">
					<table class="table table-bordered table-striped text-center">
						<thead>
							<tr>
								<th>
									<a href="#" title="Tuổi con gái Xuất giá">
										Năm tuổi con gái Xuất giá
									</a>
								</th>
								<th>
									<a href="#" title="Tháng tốt nhất">
										Tháng đại lợi
									</a>
								</th>
								<th>
									<a href="#" title="Tức là tháng tiểu lợi và kiêng kỵ tránh gặp người mai mối ( Nếu có người mai mối thì không nên cưới tháng này)">
										Phòng tiểu lợi mai nhân
									</a>
								</th>
								<th>
									<a href="#" title="Lúc đón dâu, cô dâu tránh gặp mặt bố mẹ chồng">
										Phòng ông cô
									</a>
								</th>
								<th>
									<a href="#" title="Lúc đón dâu, tránh mặt bố mẹ cô dâu">
										Phòng phụ mẫu
									</a>
									
								</th>
								<th>
									<a href="#" title="Lúc đón dâu, tránh mặt người trai">
										Phòng phụ chủ
									</a>
								</th>
								<th>
									<a href="#" title="﻿Lúc đón dâu, tránh mặt người ﻿gái">
										Phòng nữ nhân
									</a>
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach( FortuneController::getNamTuoi() as $item )
							<tr>
								<td>{{$item->nam_tuoi}}</td>
								<td>{{$item->dai_loi}}</td>
								<td>{{$item->tieu_loi}}</td>
								<td>{{$item->ong_co}}</td>
								<td>{{$item->phu_mau}}</td>
								<td>{{$item->phu_chu}}</td>
								<td>{{$item->nu_than}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div> <!--/tbl-nam-hung-nien-->


		</div> <!--/col-lg-8-->

	</div> <!--/row-->

	
@endsection