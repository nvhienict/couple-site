<head>
    <!-- Css -->
    <link href="{{Asset("assets/fancy/css/jquery.fancybox.css")}}" rel="stylesheet">
    <link href="{{Asset("assets/fancy/css/jquery.fancybox-buttons.css")}}" rel="stylesheet">
    <link href="{{Asset("assets/fancy/css/jquery.fancybox-thumbs.css")}}" rel="stylesheet">

    <!-- Core JavaScript Files -->
    <script src="{{Asset("assets/fancy/js/jquery.fancybox.js")}}"></script>
    <script src="{{Asset("assets/fancy/js/jquery.fancybox.pack.js")}}"></script>
    <script src="{{Asset("assets/fancy/js/jquery.fancybox-buttons.js")}}"></script>
    <script src="{{Asset("assets/fancy/js/jquery.fancybox-medias.js")}}"></script>
    <script src="{{Asset("assets/fancy/js/jquery.fancybox-thumbs.js")}}"></script>
    <script src="{{Asset("assets/fancy/js/jquery.mousewheel.pack.js")}}"></script>

</head>
<div>
    <div class="partion">
		         
        <h3 class="text-center title-tab" style="text-align: {{$tabWeb->titlestyle}}" id = "nameTitle{{$tabWeb->id}}" > {{$tabWeb->title}}</h3>  
        <div class="show-content phara{{$tabWeb->id}}">                            
            <p style="color: #{{$website_item->color3}}">
                {{$tabWeb->content}}
            </p>
    	</div> 
    	<div class="edit-content editphara{{$tabWeb->id}}">
        	<textarea name="editor4" class="ckeditor form-control ckedit{{$tabWeb->id}}" id="editor{{$tabWeb->id}}" cols="40" rows="10" tabindex="1"></textarea>

        </div>  
        <div class="row phara-margin">
            <div class="col-xs-11"></div>
            <div class="col-xs-1 click-edit click-edit-hide{{$tabWeb->id}}">
                <span><a onclick="showckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
                <span><a class="glyphicon glyphicon-cog icon-site" href=""></a></span>
            </div>               
        </div>
        <div class="row phara-margin">
        	<div class="col-xs-11"></div>
        	<div class="col-xs-1 ok-edit ok-edit-show{{$tabWeb->id}}">
        		<span>
                    <a onclick="updateckeditor({{$tabWeb->id}})" class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a>
                    <input type="hidden" class="get_id{{$tabWeb->id}}" value="{{$tabWeb->id}}">
                </span>
                <span><a style="color:#e74c3c;" onclick="exitckeditor({{$tabWeb->id}})" class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        	</div>
        </div> 
        

    </div>
    <div class="partion">
        <div class="row phara-margin">
            <?php $albums=PhotoTab::where('user',$website_item->user)->get();?>
            @if($albums)
                @foreach($albums as $album)
                    <div class="col-xs-2 images-padding">
                        <a class="fancybox-buttons" data-fancybox-group="button" href="{{Asset("{$album->photo}")}}">
                            <img style="width:100%;height:100px;" src="{{Asset("{$album->photo}")}}" alt="" />
                        </a>
                    </div>
                @endforeach
            @endif
        </div>   
        <div class="row phara-margin">
            <div class="col-xs-11">
            </div>
            <div class="col-xs-1 click-edit ">
                <span><a  class="glyphicon glyphicon-edit icon-site" href="javascript:void(0);"></a></span>
                <span><a  class="glyphicon glyphicon-cog icon-site" href=""></a></span>
            </div>               
        </div>
        <div class="row phara-margin">
        	<div class="col-xs-11"></div>
        	<div class="col-xs-1 ok-edit ">
        		<span><a  class="glyphicon glyphicon-ok icon-site" href="javascript:void(0);"></a></span>
                <span><a class=" glyphicon glyphicon-remove icon-site" href="javascript:void(0);"></a></span>
        	</div>
        </div> 
    </div>
</div>
        <script type="text/javascript">
                $(document).ready(function() {
                $(".fancybox").fancybox({
                    openEffect  : 'none',
                    closeEffect : 'none'
                });
            });
            // $("#single_1").fancybox({
            //       openEffect  : 'elastic', //Hiệu ứng khi hiện hình ảnh lớn('elastic', 'fade' or 'none')
            //       closeEffect : 'elastic', //Hiệu ứng khi đóng  hình ảnh lớn
            //       helpers : { 
            //               overlay : true, //set false nếu disable overlay
            //             title   : true,//set false nếu disable title
            //             title : {                     
            //                        type : 'inside'//('float', 'inside', 'outside' or'over',),
            //                        position : 'bottom' // 'top' or 'bottom'
            //             }
            //       }
            //     });
        </script>
     