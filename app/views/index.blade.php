@extends('main')
@section('title')
Trang chủ
@endsection
@section('content')
<section>
<div class="container-fluid">
	<div class="row slide">
	<div class="col-xs-12">
			<div id="carousel-example-generic" class="carousel" data-ride="carousel">
		  <!-- Indicators -->
		  	<ol class="carousel-indicators">
		    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		  	</ol>

		  <!-- Wrapper for slides -->
		  	<div class="carousel-inner">
		    	<div class="item active">
		  		<img class="img-responsive" src="{{Asset('assets/img/slide1.jpg')}}" alt="jpg">
		  		<div class="carousel-caption">
					<p>Photo by Thuna Company</p>
					</div>
				</div>
		    	<div class="item">
		  		<img class="img-responsive" src="{{Asset('assets/img/slide2.jpg')}}" alt="jpg">
		  		<div class="carousel-caption">
					<p>Photo by Thuna Company</p>
					</div>
				</div>
		    	<div class="item">
		  		<img class="img-responsive" src="{{Asset('assets/img/slide3.jpg')}}" alt="jpg">
		  		<div class="carousel-caption">
					<p>Photo by Thuna Company</p>
					</div>
				</div>
			</div>
			</div><!--slide-->
		</div>
	</div>
	<div class="row search-main">
		<div class="col-xs-12">
		<div class="form-title text-center">
			<h2>Tìm nhà cung cấp</h2>
			<p>Với các nguồn thông tin đáng tin cậy nhất cho đám cưới của bạn </p>
		</div>
		<form action="{{Asset('list-vendor')}}" method="post" class="form-horizontal form-group-lg" role="form">
		  <div class="form-group">
		    <div class="row search-form">
		    	<div class="col-xs-3">
			    	<input type="text" name="name" class="form-control input-lg" placeholder="Enter Name">
			  	</div>
			  	<div class="col-xs-3">
			    	<select name="location" class="form-control input-lg">
			    	@foreach(Location::get() as $location)
			    	<option value="{{$location->id}}">{{$location->name}}</option>
			    	@endforeach
			    	</select>
			  	</div>	
			  	<div class="col-xs-4 dropdown">
			    	<input id="searchTxt" name="category" type="text" data-toggle="dropdown" class="input-text form-control input-lg" placeholder="Click choose Categories">
			    	<input id="searchId" name="category_id" type="hidden">
			    	<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				    <li role="presentation">
				    	<div class="row" id="menu">
					    	<div class="col-xs-6">
					      		<ul class="list-unstyled">
					    	@foreach (Category::get() as $index=> $category)
					    	@if($index<6)
					      			<li><span>{{$category['name']}}</span>
					      			<input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}">
					      			</li>
					      	@endif
					      	@endforeach
					      		</ul>
					      	</div>
					      	<div class="col-xs-6">
					      		<ul class="list-unstyled">
					    	@foreach (Category::get() as $index=> $category)
					    	@if($index>=6)
					      			<li><span>{{$category['name']}}</span>
					      			<input name="{{$category['name']}}" type="hidden" value="{{$category['id']}}">
					      			</li>
					      	@endif
					      	@endforeach
					      		</ul>
					      	</div>
				      	</div>
				    </li>
				    <script>
				    $(document).ready(function(){
						$('#menu li span').click(function(){
						  var text= $(this).text();
						  var id= $(this).next().val();
							$( "#searchTxt" ).val(text);
							$( "#searchId").val(id);
						});
					});
					</script>
				  </ul>
			  	</div>
			  	
			  	<div class="col-xs-2">
			    	<button type="submit" class="btn btn-default btn-lg">Tìm kiếm</button>
			  	</div>
			</div>
		  </div>
		</form>
		</div><!--col-xs-12-->
	</div>
	<div class="container content">
		<div class="row">
			<div class="col-xs-6">
				<h4 class="text-center">Nhà cung cấp có hơn 200,000 lượt đánh giá</h4>
				<img class="img-responsive" src="http://wwcdn.weddingwire.com/static/8.2.37/images/wedding/homePage/ssSearch.jpg">
				<p>WeddingWire offers the most comprehensive vendor catalog with over 200,000 reviewed wedding vendors from across the US. Quickly and easily search based on your location and preferences to find the perfect match.</p>
				</div>
			<div class="col-xs-6">
				<h4 class="text-center">So sánh về xếp hạng và đánh giá</h4>
				<img class="img-responsive" src="http://wwcdn.weddingwire.com/static/8.2.37/images/wedding/homePage/ssReviews.jpg">
				<p>WeddingWire offers over 200,000 vendors reviewed by real newlyweds. Our community of newlyweds have shared their wedding experiences to help you find the perfect vendors</p>
			</div>
		</div>
		<small>Ultimately the flawless execution of your wedding day will largely rest on the shoulders of your wedding vendors. When you consider the number of different little "mini-events" that take place throughout your wedding day, it becomes quickly apparent that each of them will be greatly influenced by your wedding vendors. </small>
	</div>
	</div>
	</section>

@endsection
	