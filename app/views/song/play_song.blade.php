@extends('main')
@section('title')
Âm nhạc
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container user-checklist">
	@foreach( $songs as $key=>$song )
	<div class="row" style="margin-bottom: 50px;">
			<div class="col-xs-9">
				<h6><i class="fa fa-th"></i> {{SongCategory::where('id',$song['category'])->get()->first()->name}}</h6>
				<h2>{{$song['name']}}</h2>
				<hr>

				<div class="fb-like" data-href="http://thuna.vn/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
				
				<p>
					<span>Ca sĩ: {{$song['artist']}}</span>
				</p>
				<p>
					<span>Thể loại: {{$song['genre']}}</span>
				</p>
				<hr>
					<h5>Bạn đang nghe nhạc từ <a href="#">thuna.vn</a></h5>
					<div>{{$song['link']}}</div>
				<hr>
					<h6>Lời:</h6>
					<p>{{SongController::lyric($song['lyric'])}}</p>
				<hr>
					<h6>Bình luận ({{SongComment::where('song',$song['id'])->count()}}):</h6>

					@if(!Session::has('email'))
						<span><a href="{{URL::route('login')}}" onclick="get_url(11);">Đăng nhận xét!</a></span>
					@endif
					<script type="text/javascript">
                		function get_url(id){
							$.ajax({
								type: "post",
								url: "{{URL::to('get_url')}}",
								data: {id:id}
							});
							alert('Bạn phải đăng nhập!')
						};
                	</script>
                	

						@foreach($arCmt=SongComment::where('song',$song['id'])->get() as $cmt)
							
							<div class="song_comment">
								<div class="song_avatar">
									{{'<img class="user_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" />'}}
								</div>
								<div class="song_content">
									<span style="color: #428bca;">{{$cmt['user_name']}}</span> nói rằng:<br />
									
									{{$cmt['content']}}
								</div>
							</div>
						@endforeach
							<div id="your_cmt"></div>
						@if(Session::has('email'))

							<div class="song_comment">
								<div class="song_avatar">
									{{'<img class="user_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" />'}}<br />
									<span style="color: #428bca;">{{$user_name}}</span>
								</div>
								<div class="song_content">
									<input type="text" id="song_comment" placeholder="Bình luận của bạn..."></input><br />
									<button class="btn btn-primary" onclick="post_comment({{UserController::id_user()}})">Đăng</button>
								</div>
							</div>
						
						@endif
						<script type="text/javascript">
							function post_comment (id_user) {
								
								var cmt = $("#song_comment").val(); 
								$("#song_comment").val("");

								$.ajax({
									type: "post",
									url: "{{URL::route('song_comment', array('id_song'=>$song['id']))}}",
									data: {
										id_user:id_user,
										cmt:cmt
									},
									success: function(data){
										$('#your_cmt').replaceWith(data);
									}

								});

							}
						</script>
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=280821198756185&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</div><!--container-->
@endsection