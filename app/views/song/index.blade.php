@extends('main')
@section('title')
Âm nhạc
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container user-checklist">
	@foreach($cats as $index=>$cat)
	<div class="row">
		<div class="col-xs-9">
			<h2>Âm nhạc: {{$cat['name']}}</h2>
			<h6>{{$cat['description']}}</h6>

			<table class="table-song">
				<tr>
					<th>Tên bài hát</th>
			 		<th>Ca sĩ</th>
			 		<th class="last">Bình luận</th>
				</tr>
				@foreach( $songs as $key=>$song )
				<tr>
					<td><a href="{{URL::route('play_song', array($song['id']))}}" onclick="get_song({{$song['id']}});">{{$song['name']}}</a></td>
					<td><a href="{{URL::route('play_song', array($song['id']))}}" onclick="get_song({{$song['id']}});">{{$song['artist']}}</a></td>
					<td class="last">{{SongComment::where('song',$song['id'])->count()}} <i class="fa fa-comment"></i></td>
				</tr>
				@endforeach
			</table>
		</div>

		<div class="col-xs-3" style="background: #f3f3f3;">
			<div class="row">
				<div class="col-xs-12" style="font-size: 20px; font-weight:bold; margin-top: 5px;">Âm nhạc</div>
			</div>

			<div class="row">
				<div class="col-xs-12" style="font-size: 13px;">Nghi lễ</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(1))}}">Mở đầu</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(2))}}">Đoàn rước</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(3))}}">Nghi thức</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(4))}}">Kết thúc</a>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12" style="font-size: 13px;">Đãi tiệc</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(5))}}">Khai tiệc</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(6))}}">Phát biểu</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(7))}}">Cắt bánh</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(8))}}">Vào tiệc</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(9))}}">Chúc mừng</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array(10))}}">Cuối tiệc</a>
				</div>
			</div>
		</div>

	</div> <!-- end row -->
	@endforeach
</div><!--container-->
@endsection