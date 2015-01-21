
@extends((Session::has('email')) ? 'main-dashboard' : 'main')

@section('title')
Âm nhạc | thuna.vn
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

	@foreach($cats as $index=>$cat)
	<div class="row" style="padding-right: 15px; margin-top: 50px;">
		@if (Session::has('email'))
			<div class="col-lg-9 col-xs-12 margin-footer" >
		@else
			<div class="col-lg-7 col-xs-12 col-xs-offset-1">
		@endif
			<h2>Âm nhạc: {{$cat['name']}}</h2>
			<h6>{{$cat['description']}}</h6>

			<table class="table-song">
				<thead>
					<th>Tên bài hát</th>
			 		<th>Ca sĩ</th>
			 		<th class="last">Bình luận</th>
				</thead>
				<tbody>
					@foreach( $songs as $key=>$song )
					<tr>
						<td><a href="{{URL::route('play_song', array(SongCategory::where('id',Song::where('id',$song->id)->get()->first()->category)->get()->first()->slug,$song['slug']))}}" onclick="get_song({{$song['id']}});">{{$song['name']}}</a></td>
						<td><a href="{{URL::route('play_song', array(SongCategory::where('id',Song::where('id',$song->id)->get()->first()->category)->get()->first()->slug,$song['slug']))}}" onclick="get_song({{$song['id']}});">{{$song['artist']}}</a></td>
						<td class="last">{{SongComment::where('song',$song['id'])->count()}} <i class="fa fa-comment"></i></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<div class="col-lg-3 col-xs-12 song-menu-right">

			<div class="row song-record-title">
				<div class="col-xs-12">Nghi lễ</div>
			</div>
			
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('mo-dau'))}}"><i class="fa fa-music"></i> Mở đầu</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('doan-ruoc'))}}"><i class="fa fa-music"></i> Đoàn rước</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('nghi-thuc'))}}"><i class="fa fa-music"></i> Nghi thức</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('ket-thuc'))}}"><i class="fa fa-music"></i> Kết thúc</a>
			</div>
		</div><!--/.song-menu-right-->
		
		<div class="col-lg-3 col-xs-12 song-menu-right">

			<div class="row song-record-title">
				<div class="col-xs-12">Đãi tiệc</div>
			</div>

			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('khai-tiec'))}}"><i class="fa fa-music"></i> Khai tiệc</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('phat-bieu'))}}"><i class="fa fa-music"></i> Phát biểu</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('cat-banh'))}}"><i class="fa fa-music"></i> Cắt bánh</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('vao-tiec'))}}"><i class="fa fa-music"></i> Vào tiệc</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('chuc-mung'))}}"><i class="fa fa-music"></i> Chúc mừng</a>
			</div>
			<div class="col-xs-12 song-record-item">
				<a href="{{URL::route('songs', array('cuoi-tiec'))}}"><i class="fa fa-music"></i> Cuối tiệc</a>
			</div>
		</div><!--/.song-menu-right-->

	</div> <!-- end row -->
	@endforeach

@endsection