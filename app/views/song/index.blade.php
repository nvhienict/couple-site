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
		<div class="col-xs-9 margin-footer">
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
					<td><a href="{{URL::route('play_song', array(SongCategory::where('id',Song::where('id',$song->id)->get()->first()->category)->get()->first()->slug,$song['slug']))}}" onclick="get_song({{$song['id']}});">{{$song['name']}}</a></td>
					<td><a href="{{URL::route('play_song', array(SongCategory::where('id',Song::where('id',$song->id)->get()->first()->category)->get()->first()->slug,$song['slug']))}}" onclick="get_song({{$song['id']}});">{{$song['artist']}}</a></td>
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
					<a href="{{URL::route('songs', array('mo-dau'))}}">Mở đầu</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('doan-ruoc'))}}">Đoàn rước</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('nghi-thuc'))}}">Nghi thức</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('ket-thuc'))}}">Kết thúc</a>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12" style="font-size: 13px;">Đãi tiệc</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('khai-tiec'))}}">Khai tiệc</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('phat-bieu'))}}">Phát biểu</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('cat-banh'))}}">Cắt bánh</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('vao-tiec'))}}">Vào tiệc</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('chuc-mung'))}}">Chúc mừng</a>
				</div>
				<div class="col-xs-6">
					<a href="{{URL::route('songs', array('cuoi-tiec'))}}">Cuối tiệc</a>
				</div>
			</div>
		</div>

	</div> <!-- end row -->
	@endforeach
</div><!--container-->
@endsection