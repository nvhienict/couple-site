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
					<h6>Bình luận (<span class="count_cmt">{{SongComment::where('song',$song['id'])->count()}}</span>):</h6>
					

					@if(!Session::has('email'))
						<span><a href="{{URL::route('cmt_song', array(SongCategory::where('id',Song::where('id',$song->id)->get()->first()->category)->get()->first()->slug,$song['slug']))}}" >Đăng nhận xét!</a></span>
						{{SongCategory::where('id',Song::where()->get()->first()->category)->get()->first()->slug}}
					@endif
					
                		@foreach($arCmt=SongComment::where('song',$song['id'])->get() as $cmt)
							
							<div class="song_comment">
								<div class="song_avatar">
									<!-- {{'<img class="user_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" />'}} -->
									<?php $avatar = base64_decode($user_avatar); ?>
									<img src="{{$avatar}}">
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
									<!-- {{'<img class="user_avatar" alt="" src="data:image/jpeg;base64,' . base64_encode($user_avatar) . '" />'}}<br /> -->
									<?php $avatar = base64_decode($user_avatar); ?>
									<img src="{{$avatar}}">
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
			<!-- -facebookcommnet -->	
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
			<!-- -End facebookcommnet -->	
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</div><!--container-->
@endsection