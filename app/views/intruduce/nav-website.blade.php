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
            <li><a href="{{URL::route('index')}}" title="Trang chủ">
                <!-- <img class="icon-hover-home" src="{{Asset('icon/home78.png')}}"> -->
                <!-- <span class="icon-show">&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-home icon-home"></i>
                  &nbsp;&nbsp;&nbsp;
                </span> -->
                <!-- <span class="txt-menu">Trang chủ</span> -->
                Trang chủ
              </a>
            </li>
            <li class="active"><a href="{{URL::to('website-introduce')}}" title="Website cưới">
                <!-- <img class="icon-hover-website" src="{{Asset('icon/Quanlyngansach.png')}}"> -->
                <!-- <span class="icon-show">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-heart"></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                <span class="txt-menu">Website cưới</span> -->
                Website cưới
              </a>
            </li>
            <li><a href="{{URL::to('planning-tool')}}" title="Công cụ lập kế hoạnh">
                <!-- <img class="icon-hover-planning-tool" src="{{Asset('icon/notepad-icon.png')}}"> -->
                <!-- <span class="icon-show">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-gears"></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                <span class="txt-menu">Công cụ lập kế hoạch</span> -->
                Công cụ lập kế hoạch
              </a>
            </li>
            <!-- <li><a href="{{URL::route('website')}}" title="Website cưới">
                <img class="icon-hover-website" src="{{Asset('icon/Quanlyngansach.png')}}">
                <span class="txt-menu">Website cưới</span>
              </a>
            </li>
            <li><a href="{{URL::route('guest-list')}}" title="Danh sách khách mời">
                <img class="icon-hover" src="{{Asset('icon/DSKM.png')}}">
                <span class="txt-menu">Danh sách khách mời</span>
              </a>
            </li>
            <li><a href="{{URL::route('user-checklist')}}" title="Danh sách công việc">
                <img class="icon-hover" src="{{Asset('icon/Danhsachcongviec.png')}}">
                <span class="txt-menu">Danh sách công việc</span>
              </a>
            </li>
            <li><a href="{{URL::route('budget')}}" title="Quản lý ngân sách">
                <img class="icon-hover" src="{{Asset('icon/Congculapkehoach.png')}}">
                <span class="txt-menu">Quản lý ngân sách</span>
              </a>
            </li> -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle main_menu" data-toggle="dropdown" title="Âm nhạc">
            <!-- <img class="icon-hover-music" src="{{Asset('icon/musical7.png')}}"> -->
                
                <!-- <span class="icon-show">&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-music"></i>
                  &nbsp;&nbsp;
                </span>
                <span class="txt-menu">Âm nhạc</span>
                <b class="caret"></b> -->
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
                <!-- <img class="icon-hover" src="{{Asset('icon/ngaycuoi.png')}}"> -->
                
                <!-- <span class="icon-show">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fa fa-calendar"></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                <span class="txt-menu">Xem ngày cưới</span> -->
                Xem ngày cưới
              </a>
            </li>
        
        </ul>
      </div>
  </div><!--/.nav-->
</div><!--/.bg-menu-top-->
<!-- <div class="row lr-bottom-menu"></div> -->