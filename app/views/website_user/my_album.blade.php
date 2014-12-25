	
	@foreach($images as $images)
		<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 padding-images remove-image{{$images->id}}">
			<span class="btn-delete"> <i class="glyphicon glyphicon-remove-sign" onclick="del_album({{$images->id}})"></i></span>
			<img class="img-responsive" src="{{Asset("{$images->photo}")}}">
		</div>	
	@endforeach
	