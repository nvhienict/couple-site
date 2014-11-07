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

				@for($i=1; $i<=13; $i++)

					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="span_choose_tmp">
							<a href="{{URL::route('template-website', array('id'=>"{$i}"))}}">
								<img src="{{Asset("images/website/tmp/{$i}.png")}}">
							</a>
						</div>
		  			</div>

				@endfor

		</div>
		<div class="col-md-1"></div>
	</div>
	<!-- .row -->
</div>
<!-- .container -->

@endsection