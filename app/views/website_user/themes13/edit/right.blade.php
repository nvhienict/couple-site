<article id="content">
	<!-- <div class="wrapper">
		<div class="pad-right" style=''>
			<h2>About <span>Our Wedding</span></h2>
			<figure class="img1"><img src="{{Asset('images/website/themes13/page1_img1.jpg')}}" alt=""></figure>
			
		</div>
	</div> -->
	<div class="wrapper">
		<div class="row phara-margin">
           	<h3 id = "nameTitle{{$tabWeb->id}}" class=" title-tab" style="text-align: {{$tabWeb->titlestyle}}; font-familly: {{$website_item->font}}; color: #{{$website_item->color2}}" >
                {{$tabWeb->title}}
            </h3>
            
            <div class="col-xs-12 col-md-5 col-sm-5 col-lg-5 col-md-offset-1 col-sm-offset-1 col-offset-lg-1 show-content phara{{$tabWeb->id}}">
        
                <span style="color: #{{$website_item->color3}}">{{$tabWeb->content}}</span>
    			
            </div>

            <!-- <div class="edit-content editphara{{$tabWeb->id}}">
                <textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

            </div> -->
            <div class="col-xs-12 col-md-5 col-sm-5 col-lg-5 border-r ">
                <span id="prev_output{{$tabWeb->id}}">
                    <a href="#">
                        <?php 
                        $images=PhotoTab::where('tab',$tabWeb->id)->get()->first();
                         ?>
                    @if($images)
                        <img  class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
                    @else 
                        <img  class="img-responsive" src="{{Asset("images/website/themes1/tab_temp_1.jpg")}}" alt="">

                    @endif
                    </a>
                </span>
                <span>
                    <button onclick="send_id({{$tabWeb->id}},null,0)" data-backdrop="static"  class="btn btn-primary" data-toggle="modal" data-target='#modal-changeimage' style="background: #19b5bc; border:none;">Đổi Ảnh</button>
                    <input id="id-tab-photo{{$tabWeb->id}}" type="hidden" value="{{$tabWeb->id}}">
                </span>
            </div>
            
        </div>
        <div class="row phara-margin">
            <div class="col-xs-9"></div>
            <div class="col-xs-1 click-edit-hide{{$tabWeb->id}}">
                <!-- <span><a onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span> -->
                <span> <a style="background: #19b5bc; border:none;" onclick="showckeditorpartion({{$tabWeb->id}})" data-toggle="modal" data-target='#modal-edit' data-backdrop="static" class="btn btn-primary" href="javascript:void(0);">Sửa nội dung</a></span>
            </div>
        </div>
        <!-- <div class="row phara-margin">  
            <div class="col-xs-6 ok-edit ok-edit-show{{$tabWeb->id}}">
                <span style="float:right;"><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
                <span style="float:right;">
                    <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                    <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                </span>
            </div>
            <div class="col-xs-6"></div>
        </div> -->
	</div>
</article>