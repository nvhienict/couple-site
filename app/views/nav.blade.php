<div class="row" id="nav-bar">
  <div class="col-xs-12">
<div class="navbar navbar-default">
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
      <li><a href="{{URL::route('index')}}">Trang chủ</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nhà cung cấp <b class="caret"></b></a>
        <ul class="dropdown-menu">
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
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Công cụ lập kế hoạch<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li role="presentation" class="dropdown-header"><span>Công cụ</span>
          <div class="row">
            <div class="col-xs-6">
              <ul class="list-unstyled">
                <li><a href="#">Website cưới</a></li>
                <li><a href="#">Danh sách khách mời</a></li>
                <li><a href="#">Sơ đồ ghế ngồi</a></li>
                <li>
                    <a href="{{URL::route('user-checklist')}}" onclick="get_url(1);" >Danh sách công việc</a><span class="glyphicon glyphicon-ok"></span>
                </li>
                <li><a href="#">Quản lý vendor</a></li>
                <li>
                    <a href="{{URL::route('budget')}}" onclick="get_url(2);" >Quản lý ngân sách</a><span class="glyphicon glyphicon-ok"></span>
                </li>
                  @if(empty(Session::has('email')))
                    <script type="text/javascript">
                      function get_url(id){
                        $.ajax({
                          type: "post",
                          url: "{{URL::to('get_url')}}",
                          data: {id:id}
                        });
                        alert('Bạn phải đăng nhập để sử dụng công cụ này!')
                      };
                    </script>
                  @else
                    <script type="text/javascript">
                      function get_url(id){
                        $.ajax({
                          type: "post",
                          url: "{{URL::to('get_url')}}",
                          data: {id:id}
                        });
                      };
                    </script>
                  @endif

              </ul>
            </div>
            <div class="col-xs-6">
              <ul class="list-unstyled">
                <li><a href="#">Viết nhật ký</a></li>
                <li><a href="#">Thiết kế thiệp cưới</a></li>
                <li><a href="#">Làm video</a></li>
              </ul>
            </div>
          </div>
          </li>
        </ul>
      </li>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Âm nhạc<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li role="presentation" class="dropdown-header"><span>Nghi lễ</span>
              <div class="row">
                <div class="col-xs-6">
                  <ul class="list-unstyled">
                    <li><a href="{{URL::route('songs', array(1))}}">Mở đầu</a></li>
                    <li><a href="{{URL::route('songs', array(2))}}">Đoàn rước</a></li>
                  </ul>
                </div>
                <div class="col-xs-6">
                  <ul class="list-unstyled">
                    <li><a href="{{URL::route('songs', array(3))}}">Nghi thức</a></li>
                    <li><a href="{{URL::route('songs', array(4))}}">Kết thúc</a></li>
                  </ul>
                </div>
              </div>
            </li>
            <li role="presentation" class="dropdown-header"><span>Đãi tiệc</span>
              <div class="row">
                <div class="col-xs-6">
                  <ul class="list-unstyled">
                    <li><a href="{{URL::route('songs', array(5))}}">Khai tiệc</a></li>
                    <li><a href="{{URL::route('songs', array(6))}}">Phát biểu</a></li>
                    <li><a href="{{URL::route('songs', array(7))}}">Cắt bánh</a></li>
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

      <li><a href="{{URL::route('index')}}#about">Giới thiệu</a></li>
      <li><a href="{{URL::route('index')}}#service">Dịch vụ</a></li>
      <li><a href="{{URL::route('index')}}#contact">Liên hệ</a></li>
      
    </ul>
  </div>
</div>
  </div>
</div>