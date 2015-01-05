
<div class="row" id="nav-bar">
  <div class="col-xs-12">
    <div class="navbar">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="{{URL::route('index')}}" class="navbar-brand brand">
          <!-- <img class="img-logo" src="{{Asset('icon/logo-thuna.png')}}"> -->
        </a>
      </div>
      <div class="navbar-collapse collapse navbar-responsive-collapse">
        <ul class="nav navbar-nav">
            <li><a href="{{URL::route('index')}}" ><i class="fa fa-home"></i> Trang chủ</a></li>
            <li><a href="{{URL::route('guest-list')}}" >Danh sách khách mời</a></li>
            <li><a href="{{URL::route('user-checklist')}}"  >Danh sách công việc</a></li>
            <li><a href="{{URL::route('budget')}}"  >Quản lý ngân sách</a></li>
            <li><a href="{{URL::route('website')}}"  >Website cưới</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown">
                <span>Âm nhạc</span>
                <b class="caret"></b>
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

          <li><a href="{{URL::action('FortuneController@getIndex')}}" >Xem ngày cưới</a></li>

          </ul>
        </div>
    </div>
  </div>

  @include('site-map')
  
</div>