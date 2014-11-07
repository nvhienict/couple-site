  <!--  Slide Album -->        
<script src="{{Asset("assets/js/jquery.min.js")}}"></script>           
<script type="text/javascript" src="{{Asset("assets/js/jquery.slides.js")}}"></script>
<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 phara-temp main-template text-center" >

          <!-- count datime to weddingdate -->
            @if(empty($website_item->count_down))
              @foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
                <div id="getD{{$index}}" style="display:none;">
                  {{$dd}}
                </div>
              @endforeach
            @else
            @foreach( $date = explode('-', WebsiteController::getCountDown()) as $index=>$dd )
                <div id="getD{{$index}}" style="display:none;">
                  {{$dd}}
                </div>
              @endforeach
            @endif
            
          <div id="count_dateTime">
          
            <table align="center" class="count_table_dateTime">
            <script type="text/javascript" src="{{Asset("assets/js/count-down-time.js")}}"></script>
            <!-- .end -->
              <tr >
                <td class="time_wedding" id="echo_dday"></td>
                <td class="time_wedding_">:</td>
                <td class="time_wedding" id="echo_dhour"></td>
                <td class="time_wedding_">:</td>
                <td class="time_wedding" id="echo_dmin"></td>
                <td class="time_wedding_">:</td>
                <td class="time_wedding" id="echo_dsec"></td>
              </tr>
              <tr >
                <td class="time_txt">Ngày</td>
                <td></td>
                <td class="time_txt">Giờ</td>
                <td></td>
                <td class="time_txt">Phút</td>
                <td></td>
                <td class="time_txt">Giây</td>
              </tr>
            </table>
            <p class="date-time-title">
             
                      {{WebsiteController::getDates()}}
                 
                  </p>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 image-title-temp text-center">
            
            <h2 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section-title" id="showName" >
              <span id="topNameGroom">{{$website_item->name_groom}}</span>
                <em>&</em>
              <span id="topNameBride">{{$website_item->name_bride}}</span>
              
            </h2>
            
          </div>
          <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
          <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 main-template text-center" >
            <?php $check=PhotoTab::where('user',$website_item->user)->get()->count();?>
               
                @if($check>0)
                 <div id="slides">
                    <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
                    @foreach($albums as $album)
                      <a class="fancybox" rel="gallery1" href="{{Asset("{$album->photo}")}}" >
                        <img class="img-responsive"  src="{{Asset("{$album->photo}")}}">
                      </a>  
                    @endforeach
              
                 </div>
                @else
                   <div id="slides">     
                    <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/1.jpg")}}" >
                        <img class="img-responsive"  src="{{Asset("images/website/themes10/1.jpg")}}">
                    </a>
                     <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/2.jpg")}}" >
                        <img class="img-responsive"  src="{{Asset("images/website/themes10/2.jpg")}}">
                    </a>
                    <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/3.jpg")}}" >
                        <img class="img-responsive"  src="{{Asset("images/website/themes10/3.jpg")}}">
                    </a>  
                            <a class="fancybox" rel="gallery1" href="{{Asset("images/website/themes10/4.jpg")}}" >
                        <img class="img-responsive"  src="{{Asset("images/website/themes10/4.jpg")}}">
                    </a>    
                  </div>      
                @endif
               
          
  </div>
</div>

<script type="text/javascript">
    $("#slides").slidesjs({
    play: {
      active: true,
        // [boolean] Generate the play and stop buttons.
        // You cannot use your own buttons. Sorry.
      effect: "slide",
        // [string] Can be either "slide" or "fade".
      interval: 4000,
        // [number] Time spent on each slide in milliseconds.
      auto: true,
        // [boolean] Start playing the slideshow on load.
      swap: true,
        // [boolean] show/hide stop and play buttons
      pauseOnHover: false,
        // [boolean] pause a playing slideshow on hover
      restartDelay: 2000
        // [number] restart delay on inactive slideshow
    }
  });
      
  </script>