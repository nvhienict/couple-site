<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-template text-center" >
  <img src="{{Asset("{$backgrounds}")}}" class="img-responsive" alt="Image" style="margin-top:-2%;position:absolute;">                  
    <div class="image-title-temp text-center">
          <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"></div>          
           <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 love_bird">
              <img src="{{Asset('images/website/themes20/birds_icon.jpg')}}"class="img-responsive icon_bird" alt="Image">
          </div>
            <h2 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section-title" id="showName" >
              <span class="name-groom" id="topNameGroom">{{$website_item->name_groom}}</span>
                <em>&</em>
              <span class="name-bride" id="topNameBride">{{$website_item->name_bride}}</span>
              <p class="date-time-title">             
                      {{WebsiteController::getDates()}}                 
             </p>
            </h2>

            
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 count-time-wedding" style="background-color: #B5AF47">
          <!-- count datime to weddingdate -->
           
              @foreach( $date = explode('-', WebsiteController::getDates()) as $index=>$dd )
                <div id="getD{{$index}}" style="display:none;">
                  {{$dd}}
                </div>
              @endforeach
            @else
            
          <div id="count_dateTime" >
          
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
            
          </div>
       <br>   
    </div>      
</div>

