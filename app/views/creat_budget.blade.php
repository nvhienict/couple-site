
@extends('main-dashboard')
@section('title')
Quản lý ngân sách | thuna.vn
@endsection
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
			      	<li>
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
			      	<li class="active"><a href="{{URL::route('budget')}}" title="Quăn lí ngân sách">
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

			      	<li><a href="{{URL::action('FortuneController@getIndex')}}" title="Xem ngày cưới">
			      			Xem ngày cưới
			      		</a>
			      	</li>
			    
			    </ul>
		  	</div>
		</div><!--/.nav-->
	</div><!--/.bg-menu-top-->
@endsection
@section('content')

	<div class="row creat_budget">
		<div class="col-lg-9 col-lg-offset-3 col-sm-10 col-sm-offset-2 col-xs-11 col-xs-offset-1">
			<div class="row">
				<div class="row form-group">
					<h1 class="title-create-budget">Nhập vào số tiền dự toán của bạn</h1>
				</div>
			</div>
			<div class="row">
				<form id="form-create-money" action="{{URL::route('money_budget')}}" method="post" autocomplete="off">
					<div class="row form-group">
						<div class="col-lg-6 col-lg-offset-1 col-sm-7 col-sm-offset-1 col-xs-10">
							<input type="text" onkeyup="key_money(event)" class="form-control" id="money_budget1" name="money_budget1" placeholder="Nhập số tiền"  />
						   	<input type="text" hidden name="money_budget" id="money_budget"/>
						</div>
						<small>VND</small>
					</div>
					<div class="row form-group">
						<div class="col-lg-4 col-lg-offset-3 col-sm-4 col-sm-offset-3 col-xs-4 col-xs-offset-2">
						   	<button type="submit" id="submit_money" class="btn btn-success">Tính tổng chi phí</button>
						</div>
					</div>
				</form>
				<script type="text/javascript">


					$("#form-create-money").validate({
						rules:
						{
							money_budget1:
							{
								required:true
							}
						},
						messages:
						{
							money_budget1:
							{
								required:"Bạn chưa nhập số tiền"
							}
						}
					})
				
	                function key_money(event){
		                if(event.which >= 37 && event.which <= 40) return;
			                $("#money_budget1").val(function(index, value) {
						        return value
						            .replace(/\D/g, '')
						            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						            $('#money_budget').val($("#money_budget1").val().replace(/,/gi,''));
						    	});
			                $('#money_budget').val($("#money_budget1").val().replace(/,/gi,''));    
			            };
				
				</script>
			</div>
		</div>
		<div class="col-xs-3"></div>
	</div> <!-- row -->

@endsection