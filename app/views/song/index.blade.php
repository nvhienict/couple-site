
@extends((Session::has('email')) ? 'main-dashboard' : 'main')

@section('title')
Âm nhạc | thuna.vn
@endsection
@if(!Session::has('email'))
	@section('nav-bar')
	@include('song.nav')
	@endsection
@else
	@section('nav-dash')
	<!-- Navigation -->
	<div class="row bg-menu-top">
		<div class="navbar">
		  	<div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		        	<span class="icon-bar"></span>
		      	</button>
		  	</div>
		  	<div class="navbar-collapse collapse navbar-responsive-collapse">
			    <ul class="nav navbar-nav">
			      	<li >
			      		<a href="{{URL::route('index')}}" title="Trang chủ">
			      			Trang chủ
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('website')}}" title="Website cưới">
			        		Website cưới
			        	</a>
			        </li>
			      	<li><a href="{{URL::route('user-checklist')}}" title="Danh sách công việc">
			      			Danh sách công việc
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('guest-list')}}" title="Danh sách khác mời">
			      			Danh sách khách mời
	 		      		</a>
			      	</li>
			      	<li><a href="{{URL::route('budget')}}" title="Quăn lí ngân sách">
			      			Quản lí ngân sách
	 		      		</a>
			      	</li>
			      	<li class="dropdown">
				        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown" title="Âm nhạc">
							Âm nhạc
				        </a>
				        <ul class="dropdown-menu oneUl" role="menu">
				          	<li role="presentation" class="dropdown-header"><span>Nghi lễ</span>
					            <div class="row">
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('mo-dau'))}}">Mở đầu</a></li>
					                  <li><a href="{{URL::route('songs', array('doan-ruoc'))}}">Đoàn rước</a></li>
					                </ul>
					              </div>
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('nghi-thuc'))}}">Nghi thức</a></li>
					                  <li><a href="{{URL::route('songs', array('ket-thuc'))}}">Kết thúc</a></li>
					                </ul>
					              </div>
					            </div>
				          	</li>
				          	<li role="presentation" class="dropdown-header"><span>Đãi tiệc</span>
					            <div class="row">
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('khai-tiec'))}}">Khai tiệc</a></li>
					                  <li><a href="{{URL::route('songs', array('phat-bieu'))}}">Phát biểu</a></li>
					                  <li><a href="{{URL::route('songs', array('cat-banh'))}}">Cắt bánh</a></li>
					                </ul>
					              </div>
					              <div class="col-xs-6">
					                <ul class="list-unstyled">
					                  <li><a href="{{URL::route('songs', array('vao-tiec'))}}">Vào tiệc</a></li>
					                  <li><a href="{{URL::route('songs', array('chuc-mung'))}}">Chúc mừng</a></li>
					                  <li><a href="{{URL::route('songs', array('cuoi-tiec'))}}">Cuối tiệc</a></li>
					                </ul>
					              </div>
					            </div>
				          	</li>
				        </ul>
			      	</li> <!--/music-->

			      	<li class="active"><a href="{{URL::action('FortuneController@getIndex')}}" title="Xem ngày cưới">
			      			Xem ngày cưới
			      		</a>
			      	</li>
			    
			    </ul>
		  	</div>
		</div><!--/.nav-->
	</div><!--/.bg-menu-top-->
	@endsection
@endif

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