@extends('main')
@section('title')
Video
@endsection
@section('content')

	<div class="row">
		<div class="col-xs-6 col-md-offset-3">
			<div class="iframe"></div>
			@if(isset($video)) {{$video}} 
			@endif
			<iframe width="560" height="315" 
			src="//www.youtube.com/embed/dITvHXe4h6k" frameborder="0" 
			allowfullscreen></iframe>
		</div>
	</div>
@endsection