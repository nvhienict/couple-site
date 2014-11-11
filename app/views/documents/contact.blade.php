@extends('main')
@section('title')
Trang chủ
@endsection
@section('nav-bar')
<!-- Navigation -->
<div id="nav-bar" class="row">	
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">			
	<div class="navbar" style="z-index: 99000;">
	  <div class="">
	    <button type="button" style="background-color:#404040;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a href="{{URL::route('index')}}" class="navbar-brand brand">Thuna.vn</a>
	  </div>
	  <div class="navbar-collapse collapse navbar-responsive-collapse">
	    <ul class="nav navbar-nav">
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown"><span>Nhà cung cấp</span><b class="caret"></b></a>
	        <ul class="dropdown-menu oneUl" role="menu">
	          <li role="presentation" class="dropdown-header"><span>Dịch vụ</span>
	          <div class="row">
	            <div class="col-md-6 col-xs-12">
	              <ul class="list-unstyled ">
	                  @foreach (Category::get() as $index=> $category)
	                  @if($index < 7)
	                    <li><a href="{{URL::route('category', array($category->slug))}}">{{$category['name']}}</a></li>
	                  @endif
	                  @endforeach
	              </ul>
	            </div>
	            <div class="col-md-6">
	              <ul class="list-unstyled ">
	                  @foreach (Category::get() as $index=> $category)
	                  @if($index >= 7)
	                    <li><a href="{{URL::route('category', array($category->slug))}}">{{$category['name']}}</a></li>
	                  @endif
	                  @endforeach
	              </ul>
	            </div>
	          </div>
	          </li>
	        </ul>
	      </li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown"><span>Công cụ lập kế hoạch </span><b class="caret"></b></a>
	        <ul class="dropdown-menu " role="menu" style="width:100%;">

		        <li role="presentation" class="dropdown-header"><span>Công cụ</span>
			        <ul class="list-unstyled">
			      		<li><a href="{{URL::route('guest-list')}}" >Danh sách khách mời</a></li>
				        <!-- <li><a href="#">Sơ đồ ghế  ngồi</a></li>-->
				        <li ><a href="{{URL::route('user-checklist')}}"  >Danh sách công việc</a></li>
				        <!-- <li><a href="#">Quản lý ve ndor</a></li>-->
				        <li><a href="{{URL::route('budget')}}"  >Quản lý ngân sách</a></li>
				        <li><a href="{{URL::route('website')}}"  >Website cưới</a></li>
				    </ul>
	          	</li>
	        </ul> 
	      </li>

	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown"><span>Âm nhạc</span><b class="caret"></b></a>
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
	                  <li><a href="{{URL::route('songs', array(8))}}">Vào tiệc</a></li>
	                  <li><a href="{{URL::route('songs', array(9))}}">Chúc mừng</a></li>
	                  <li><a href="{{URL::route('songs', array(10))}}">Cuối tiệc</a></li>
	                </ul>
	              </div>
	            </div>
	          </li>
	        </ul>
	      </li>
	    </ul>
	  </div>
	</div>
	</div>
	  
</div>
@endsection
	

@section('content')

<div class="row main-content-footer">
	 <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 box-menu ">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center you-know">
	 		Bạn cần biết			 		
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 menu-content-footer">
	 		<ul>
		 		<li><a href="{{URL::route('introduce')}}">Giới thiệu</a></li>
		 		<li><a href="{{URL::route('term')}}">Điều khoản sử dụng</a></li>
		 		<li><a href="{{URL::route('policy')}}">Chính sách riêng tư</a></li>
		 		<li><a href="{{URL::route('question')}}">Câu hỏi thuờng gặp</a></li>
		 		<li><a class="active-a" href="{{URL::route('contact')}}">Liên hệ</a></li>
		 	</ul>
	 	</div>			 				 	
	 </div>
	 <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 content-footer">
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title-content-footer text-center">
	 		Giới thiệu
	 	</div>
	 	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 para-content">            
        <table width="673" border="0" cellspacing="0" cellpadding="0">
				<tbody>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; background-color: #e25280; color: #ffffff;" colspan="4" align="center" height="35"><b>TRỤ SỞ CHÍNH TẠI TP.HUẾ</b></td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #FFFFFF;" colspan="4" align="center" height="35">114 Đặng Huy Trứ - Thành Phố Huế - Việt Nam</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #FFFFFF;" colspan="4" align="center" height="35">Điện thoại: 094-929-0110</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="185"><b>Liên hệ quảng cáo</b></td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="155"><b>Chức danh</b></td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="175"><b>Email</b></td>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="140"><b>Mobile</b></td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">* Đoàn Ngọc Diễm Trang</td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">Advertising Sales<br>
						Director</td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">diemtrang@ringier.com.vn</td>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">090 381 1381</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">* Nguyễn Bình Trung</td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">Digital Sales<br>
					Manager</td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">trung@ringier.com.vn</td>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">093 200 8082</td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">* Nguyễn Thị Minh Tâm</td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">Senior Sales<br>
					Executive</td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">minhtam@ringier.com.vn</td>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">093 610 2075</td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid #DEDEDE; border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">* Đặng Ngọc Thiên Phú</td>
					<td style="border-bottom: 1px solid #DEDEDE; border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">Digital Sales<br>
					Executive</td>
					<td style="border-bottom: 1px solid #DEDEDE; border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">thienphu@ringier.com.vn</td>
					<td style="padding: 8px 7px; border: 1px solid #DEDEDE;" align="center">093 869 3123</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<table width="673" border="0" cellspacing="0" cellpadding="0">
			<tbody style="color: #333333; font: 13px/20px Arial,Helvetica,sans-serif;">
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; color: #ffffff; background-color: #e25280;" colspan="4" align="center" height="35"><b style="color: #222222; font-family: arial, sans-serif; font-size: small;"><span lang="EN-US" style="font-size: 10pt; color: white;">VĂN PHÒNG ĐẠI DIỆN&nbsp;</span></b><b style="color: #e25280; font-family: arial, sans-serif; font-size: small;"><span style="font-size: 10pt; font-family: Arial, sans-serif; color: white;">TẠI</span></b><b style="color: #222222; font-family: arial, sans-serif; font-size: small;"><span lang="EN-US" style="font-size: 10pt; font-family: Arial, sans-serif; color: white;">&nbsp;ĐÀ NĂNG</span></b></td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #FFFFFF;" colspan="4" align="center" height="35"><b><span style="font-size: 10pt;">Số 47 , Đường Đỗ Huy Uyển, Phường An Hải, Quận Sơn Trà, Tp. Đà Nẵng</span></b></td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #FFFFFF;" colspan="5" align="center" height="35"><b style="color: #222222; font-family: arial, sans-serif; font-size: small;"><span>Điện thoại:  0966-666-886 </span><span style="text-align: start;"><span>&nbsp;(Số nội bộ: 14)</span></span></b></td>
				</tr>
				<tr>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="185"><b>Liên hệ quảng cáo</b></td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="155"><b>Chức danh</b></td>
					<td style="border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="175"><b>Email</b></td>
					<td style="border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center" width="140"><b>Mobile</b></td>
				</tr>
				<tr>
					<td style="border-bottom: 1px solid #DEDEDE; border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">* Chu Nguyệt Anh</td>
					<td style="border-bottom: 1px solid #DEDEDE; border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">Sales Manager</td>
					<td style="border-bottom: 1px solid #DEDEDE; border-left: 1px solid #DEDEDE; border-top: 1px solid #DEDEDE; padding: 8px 7px;" align="center">nguyetanh@ringier.com.vn</td>
					<td style="padding: 8px 7px; border: 1px solid #DEDEDE;" align="center">090 412 8177</td>
				</tr>
			</tbody>
		</table>
		<p>&nbsp;</p>            
	 	</div>
	 </div>
</div>
@endsection
	