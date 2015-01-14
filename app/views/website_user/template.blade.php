@extends('main')
@section('title')
Giao diện Website cưới
@endsection
@section('nav-bar')
@include('nav')
@endsection

@section('content')
<div id='container'>
	<div class="row" style="margin:0px;">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h1>Giao diện Website</h1>
		</div>
		<div class="col-md-1"></div>
	</div>
	<!-- .row -->
	<div class="row" style="margin:0px;">
		<div class="col-md-1"></div>
		<div class="col-md-10 choose_temp">

				@for($i=1; $i<=21; $i++)

					<div class="col-sm-4 col-lg-4 col-md-4 hover-theme">
						<div class="span_choose_tmp">
							<a href="javascript:void(0);">
								<img src="{{Asset("images/website/tmp/{$i}.jpg")}}">
							</a>
						</div>
						<a href="{{URL::route('view_theme', array('id'=>"{$i}"))}}" target="b_blank" class="btn btn-default btn-pre">Xem trước</a>		
						<a href="{{URL::route('header-website', array('id'=>"{$i}"))}}" class="btn btn-default btn-select">Chọn</a>
		  			</div>

				@endfor

		</div>
		<div class="col-md-1"></div>
	</div>
	<!-- .row -->
</div>
<!-- .container -->


@endsection