
@extends((Session::has('email')) ? 'main-dashboard' : 'main')

@section('title')
Âm nhạc
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

	@foreach( $songs as $key=>$song )
	
			@if (Session::has('email'))
			<div class="row" style="padding-right:15px; margin-top: 50px;">
				<div class="col-lg-9 col-xs-12">
			@else
			<div class="row" style="padding-right:15px;">
				<div class="col-xs-7 col-xs-offset-1">
			@endif
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
					<h6>Bình luận (<span class="count_cmt">{{SongComment::where('song',$song['id'])->count()}}</span>):</h6>
					

					@if(!Session::has('email'))
						<span><a href="{{URL::route('cmt_song', array(SongCategory::where('id',Song::where('id',$song->id)->get()->first()->category)->get()->first()->slug,$song['slug']))}}" >Đăng nhận xét!</a></span>
					@endif
					
                		@foreach($arCmt=SongComment::where('song',$song['id'])->get() as $cmt)
							
							<div class="song_comment">
								<div class="song_avatar">
									<?php
										$user_avatar_old = User::where('id', $cmt['user'])->get()->first()->avatar;
									?>
									<img src="{{Asset("{$user_avatar_old}")}}">
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
									<img src="{{Asset("{$user_avatar}")}}">
									<span style="color: #428bca;">{{$user_name}}</span>
								</div>
								<div class="song_content">
									<input type="text" id="song_comment" placeholder="Bình luận của bạn..." ><br />
									<button class="btn btn-primary btn_post_cmt" onclick="post_comment({{UserController::id_user()}})">Đăng</button>
								</div>
							</div>
						
						@endif
						<script type="text/javascript">

							$(document).ready(function(){
							    $('.btn_post_cmt').attr('disabled',true);

							    $('#song_comment').keyup(function(){
							        if($(this).val().length !=0){
							            $('.btn_post_cmt').attr('disabled', false);
							        }
							        else
							        {
							            $('.btn_post_cmt').attr('disabled', true);        
							        }
							    })
							});

							function post_comment (id_user) {

								var cmt = $("#song_comment").val();

								var g=parseInt($(".count_cmt").text())+1;
								$(".count_cmt").text(g);
								
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
					<br><br>
					@if(Session::has('email'))

						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=1450451991884119&version=v2.0";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<div class="fb-comments" data-href=""  data-numposts="5" data-width="100%"data-order-by="social" data-mobile="auto-detect" data-colorscheme="light"></div>												

						<script>
						    $(document).ready(function() {
						        $('.fb-comments').attr("data-href", document.URL);
						    });
						</script>
					@endif

			</div><!--/.col-xs-9-->

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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


@endsection