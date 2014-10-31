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

				<div class="col-sm-4 col-lg-4 col-md-4">
					<div class="span_choose_tmp">
						<a href="{{URL::route('template-website', array('id'=>1))}}">
							<img src="{{Asset('images/website/tmp/1.png')}}">
						</a>
					</div>
	  			</div>

	  			<div class="col-sm-4 col-lg-4 col-md-4">
	  				<div class="span_choose_tmp">
						<a href="{{URL::route('template-website', array('id'=>2))}}">
							<img src="{{Asset('images/website/tmp/2.png')}}">
						</a>
					</div>
	  			</div>
	  			
		  	
			  	<div class="col-sm-4 col-lg-4 col-md-4">
	  				<div class="span_choose_tmp">
						<a href="{{URL::route('template-website', array('id'=>5))}}">
							<img src="{{Asset('images/website/tmp/5.png')}}">
						</a>
					</div>
	  			</div>

			  	<div class="col-sm-4 col-lg-4 col-md-4">
	  				<div class="span_choose_tmp">
						<a href="{{URL::route('template-website', array('id'=>6))}}">
							<img src="{{Asset('images/website/tmp/6.png')}}">
						</a>
					</div>
	  			</div>

	  			<div class="col-sm-4 col-lg-4 col-md-4">
	  				<div class="span_choose_tmp">
						<a href="{{URL::route('template-website', array('id'=>3))}}">
							<img src="{{Asset('images/website/tmp/3.png')}}">
						</a>
					</div>
	  			</div>

	  			<div class="col-sm-4 col-lg-4 col-md-4">
	  				<div class="span_choose_tmp">
						<a href="{{URL::route('template-website', array('id'=>8))}}">
							<img src="{{Asset('images/website/tmp/8.png')}}">
						</a>
					</div>
	  			</div>
	  			
		  	</div>
		  	<!-- .row -->
		</div>
		<div class="col-xs-1"></div>
	</div>
	<!-- .row -->
</div>
<!-- .container -->

@endsection
	