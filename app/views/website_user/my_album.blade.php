
	
	@foreach($images as $images)
		<div style="padding-left: 1px;padding-right:1px;" class="col-xs-2 padding_album text-center remove_image{{$images->id}}">
			<a href="javascript:;">
				<img class="img-responsive" src="{{Asset("{$images->photo}")}}" alt="">
			</a>
			<input style="visibility:visible;" class="images_del{{$images->id}}" name="images_del" type="checkbox" value="">
			<input type="hidden" value="{{$images->id}}">
		</div>
	
	@endforeach
	