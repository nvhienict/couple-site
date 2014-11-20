@extends('main')
@section('title')
Website cưới
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')

<div id='container'>
	<div class="row" style="margin: 0px;">
		<div class="col-xs-1"></div>
		<div class="col-xs-10">
			<h1>Website cưới</h1>
		</div>
		<div class="col-xs-1"></div>
	</div>
	<!-- .row -->
	<div class="row" style="margin-bottom: 50px;">
		<div class="col-xs-1"></div>
		<div class="col-sm-4 col-lg-4 col-md-4 website_dashboard_left">
			<div class="row website_dashboard_left_top">
				<div class="col-sm-6 col-lg-6 col-md-6"><h6>Ảnh Website</h6></div>
				<div class="col-sm-6 col-lg-6 col-md-6">
					<a href="{{Asset('website/edit/pages')}}">
						<button class="btn btn-primary btn-responsive" style="background: #19b5bc; border:none;">Chỉnh sửa Website</button>
					</a>
				</div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-sm-6 col-lg-6 col-md-6">
				
				<?php
					$arIdThemes = array(1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18);
				?>

				@if( in_array($img_tmp, $arIdThemes) )
					<img style="width:100%;" src="{{Asset("images/website/tmp/{$img_tmp}.jpg")}}">
				@endif

				</div>
				<div class="col-sm-6 col-lg-6 col-md-6 ">
					Website được thiết kế bởi <a href="http://thuna.vn/" >thuna.vn</a><br />
					<a href="{{Asset('change_temp')}}">Thay đổi giao diện <i class="fa fa-chevron-right fa-fw"></i></a>
				</div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-xs-1"></div>
				<div class="col-xs-5">Trang web:</div>
				<div class="col-xs-5 ">
					<?php
						$arIdThemes = array(1,2,3,4,5,6,7,8,9,10,11,12,14,15,16,17,18);
					?>

					@if( in_array($img_tmp, $arIdThemes) )
						<a href="{{URL::route('view-previous', array('id'=>$img_tmp))}}" target="_blank" class="thuna2" >Xem trước <i class="fa fa-chevron-right fa-fw"></i></a>
					@endif
				</div>
				<div class="col-xs-1"></div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<table class="website_tabs">
						<tr class="odd"><td>Welcome</td></tr>
						<tr class="even"><td>About</td></tr>
						<tr class="odd"><td>Sự kiện cưới</td></tr>
						<tr class="even"><td>Du lịch</td></tr>
						<tr class="odd"><td>Đăng ký</td></tr>
						<tr class="even"><td>Album ảnh</td></tr>
						<tr class="odd"><td>Liên lạc</td></tr>
						<tr class="even"><td>Lời chúc</td></tr>
					</table>
				</div>
				<div class="col-xs-1"></div>
			</div>
			<!-- .row -->
			<div class="row website_dashboard_left_top">
				<div class="col-xs-1"></div>
				
				<div class="col-xs-3">
					<!-- Đặt thẻ này vào nơi bạn muốn nút chia sẻ kết xuất. -->
					<div class="g-plus" data-action="share" data-annotation="bubble" ></div>
				</div>
				<div class="col-xs-3">
					<a href="http://thuna.vn/" class="twitter-share-button">Tweet</a>	
				</div>
				<div class="col-xs-2" style="vertical-align: top;" >
					<div class="fb-share-button" data-href="http://thuna.vn/"></div>
				</div>
				
				<div class="col-xs-1"></div>
			</div>
			<!-- .row -->

		</div>
		<div class="col-sm-6 col-lg-6 col-md-6 website_dashboard_left">
			<div class="row website_dashboard_left_top">
				<div class="col-xs-1"></div>
				<div class="col-xs-6"><h6>Dịch vụ của bạn</h6>
					<ul class="list-unstyled">
			      		<li><a href="{{URL::route('guest-list')}}" ><i class="fa fa-chevron-right fa-fw"></i>Danh sách khách mời</a></li>
				        <!-- <li><a href="#">Sơ đồ ghế  ngồi</a></li>-->
				        <li ><a href="{{URL::route('user-checklist')}}"  ><i class="fa fa-chevron-right fa-fw"></i>Danh sách công việc</a></li>
				        <!-- <li><a href="#">Quản lý ve ndor</a></li>-->
				        <li><a href="{{URL::route('budget')}}"  ><i class="fa fa-chevron-right fa-fw"></i>Quản lý ngân sách</a></li>
				        <li><a href="{{URL::route('website')}}"  ><i class="fa fa-chevron-right fa-fw"></i>Website cưới</a></li>
				    </ul>
				</div>
				<div class="col-xs-1"></div>
			</div>
			<!-- .row -->
		</div>
		<div class="col-xs-1"></div>
	</div>
	<!-- .row -->
</div>
<!-- .container -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=280821198756185&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Đặt thẻ này vào phần đầu hoặc ngay trước thẻ đóng phần nội dung của bạn. -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'vi'}
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>

@endsection
