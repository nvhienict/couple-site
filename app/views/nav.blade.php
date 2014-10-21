
<div class="row" id="nav-bar">
  <div class="col-xs-12">
<div class="navbar">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="{{URL::route('index')}}" class="navbar-brand brand">Thuna.vn</a>
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Nhà cung cấp</span><b class="caret"></b></a>
        <ul class="dropdown-menu oneUl">
          <li role="presentation" class="dropdown-header"><span>Dịch vụ</span>
          <div class="row">
            <div class="col-xs-6">
              <ul class="list-unstyled">
                  @foreach (Category::get() as $index=> $category)
                  @if($index < 7)
                    <li><a href="{{URL::route('category', array($category->id))}}">{{$category['name']}}</a></li>
                  @endif
                  @endforeach
              </ul>
            </div>
            <div class="col-xs-6">
              <ul class="list-unstyled">
                  @foreach (Category::get() as $index=> $category)
                  @if($index >= 7)
                    <li><a href="{{URL::route('category', array($category->id))}}">{{$category['name']}}</a></li>
                  @endif
                  @endforeach
              </ul>
            </div>
          </div>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Công cụ lập kế hoạch </span><b class="caret"></b></a>
        <ul class="dropdown-menu" style="width:100%;">
          <li role="presentation" class="dropdown-header" style="padding-left:5px;"><span>Công cụ</span>
          <div class="row">
            <!-- <div class="col-xs-6"> -->
              <ul class="list-unstyled" style="padding-left:15px; ">
                <!-- <li><a href="#">Website cưới</a></li> -->
                <li><a href="{{URL::route('guest-list')}}" >Danh sách khách mời</a></li>
                <!-- <li><a href="#">Sơ đồ ghế ngồi</a></li> -->
                <li><a href="{{URL::route('user-checklist')}}" >Danh sách công việc</a></li>
                <!-- <li><a href="#">Quản lý vendor</a></li> -->
                <li><a href="{{URL::route('budget')}}" >Quản lý ngân sách</a></li>
                <li><a href="{{URL::route('website')}}"  >Website cưới</a></li>

              </ul>
            <!-- </div> -->
            <!-- <div class="col-xs-6">
              <ul class="list-unstyled">
                <li><a href="#">Viết nhật ký</a></li>
                <li><a href="#">Thiết kế thiệp cưới</a></li>
                <li><a href="#">Làm video</a></li>
              </ul>
            </div> -->
          </div>
          </li>
        </ul>
      </li>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Âm nhạc</span><b class="caret"></b></a>
          <ul class="dropdown-menu oneUl">
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
        </li>

    </ul>
  </div>
</div>
  </div>
</div>