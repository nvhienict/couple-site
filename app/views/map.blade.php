@extends('main')
@section('title')
Bản đồ
@endsection
@section('content')

	<div class="row">
		<div class="col-xs-6 col-md-offset-3">
			<div class="iframe"></div>
			@if(isset($map)) {{$map}} 
			@endif
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1916.9065720618062!2d108.23252326133986!3d16.07518335358564!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218260ee71329%3A0x580758b35e6f2825!2zxJDDtMyDIEh1eSBVecOqzINuLCBBbiBI4bqjaSBC4bqvYywgU8ahbiBUcsOgLCDEkMOgIE7hurVuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1405473821519" width="600" height="450" frameborder="0" style="border:0"></iframe>
		</div>
	</div>

@endsection