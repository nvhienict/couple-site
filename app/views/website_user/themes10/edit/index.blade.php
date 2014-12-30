<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

<head>  
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/themes10-edit.css")}}">
    <link rel="stylesheet" type="text/css" href="{{Asset("assets/css/style-checkbox-guestbook.css")}}">	
    <script type="text/javascript" src="{{Asset("assets/slide/f-slide.js")}}"></script>
    <style type="text/css">
        .fancybox-custom .fancybox-skin {
            box-shadow: 0 0 50px #222;
        }
    </style>

    <!-- Custom CSS -->
    
  
</head>
<script type="text/javascript">
        
    $('.side-nav li').click(function(e) {
        $('.side-nav li.active').removeClass('active');
        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        e.preventDefault();
    });

    function updateName()
        {
            var nameBride = $('input[name=name_bride]').val();
            var nameGroom = $('input[name=name_groom]').val();
            $.ajax({
                type:"post",
                dataType: "html",
                url:"{{URL::route('updateName')}}",
                data: {nameBride: nameBride,
                        nameGroom: nameGroom},
                success:function(data){
                    var obj = JSON.parse(data);
                    $('#topNameGroom').text(obj['name_groom']);
                    $('#topNameBride').text(obj['name_bride']);
                    $('#titleNameGroom').text(obj['name_groom']);
                    $('#titleNameBride').text(obj['name_bride']);
                }
            });

          
        }

</script>
<body>
@if($website)
@foreach( $website as $website_item )
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
        <nav class="navbar navbar-default  side-nav-menu" role="navigation" style="position:fixed;width:100%;">
           <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" 
                 data-target="#example-navbar-collapse">
                 <span class="sr-only">Toggle navigation</span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
              </button>
           </div>
           <div  class="collapse navbar-collapse" id="example-navbar-collapse">
              <ul style="width:100%;" class="nav navbar-nav side-nav">
              		<li class="active always-visible" ><a href="#home" role="tab" data-toggle="tab">Trang chủ</a></li>                             
                    @foreach(TabWebsite::where('website',$id_web)->where('visiable',0)->orderBy('sort','ASC')->get() as $tab)
                         <li class="menu-id{{$tab->id}}"><a href="#{{$tab->type}}" class="{{$tab->id}} TT{{$tab->id}}" role="tab" data-toggle="tab">{{$tab->title}}</a></li>                
                    @endforeach()
                    <li><a onclick="loadAddTitle()" class="fa fa-plus-square btn-add-title" data-toggle="modal" data-target="#modal-add-title"></a></li>
                    <li><a class="fa fa-wrench fa-2x btn-config" href="{{URL::route('website')}}"></a></li>
              </ul>
           </div>
        
    </nav>
</div>
<div class="main_temp_10 container">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 index-title-temp " >
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
				<img style="position: relative;" class="img-responsive" src="{{Asset("images/website/themes10/temp_title.png")}}" alt="">
				<h3 class="col-xs-12 col-sm-12 col-md-12 col-lg-12 section-title" id="showName" >
					<span class="name-g"  id="topNameGroom">{{$website_item->name_groom}}</span>
						<em>&</em>
					<span class="name-b" id="topNameBride">{{$website_item->name_bride}}</span>
					
				</h3>
				
			</div>
			
		<!-- <p class="subline">Chào mừng bạn đến với Website cưới của chúng tôi!</p> -->
		
	</div>




  	<div class="tab-content ">
  			<div class="row tab-pane active" id="home">			  			
			  	@include('website_user.themes10.edit.main')			  		
			</div>
  		@foreach(TabWebsite::where('website',$id_web)->orderBy('sort','ASC')->get() as $tabWeb)	

  			@if($tabWeb->type =="welcome" && $tabWeb->visiable==0 )
  				<div class="tab-pane " id="{{$tabWeb->type}}">
  					@include('website_user.themes10.edit.left')
  				</div>
  			@endif
  			
  			@if($tabWeb->type =="about" && $tabWeb->visiable==0 )	
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.edit.about_us')
  				</div>
				@endif
				@if($tabWeb->type =="love_story" && $tabWeb->visiable==0 )
				<div class="tab-pane" id="{{$tabWeb->type}}">
					@include('website_user.themes10.edit.text')
				</div>						
			@endif
				@if($tabWeb->type =="wedding" && $tabWeb->visiable==0 )	
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.edit.left')
  				</div>
				@endif
				@if($tabWeb->type =="traval" && $tabWeb->visiable==0 )	
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.edit.right')
  				</div>
				@endif
				@if($tabWeb->type =="album" && $tabWeb->visiable==0 )
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.edit.photo')
  				</div>
  			@endif
  			
  			@if($tabWeb->type=="contact" && $tabWeb->visiable==0)
  				<div class="tab-pane" id="{{$tabWeb->type}}">
  					@include('website_user.themes10.edit.contact')
  				</div>	
			@endif	

      <!--  Guest book -->
       @if($tabWeb->type=="guestbook" && $tabWeb->visiable==0)
        <div class="tab-pane" id="{{$tabWeb->type}}">
          @include('website_user.themes10.edit.guestbook') 
      </div>
        @endif 	
		
	@endforeach
	</div>

</div>
</body>
@endforeach
@endif
</html>

