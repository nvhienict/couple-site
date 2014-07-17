@extends('main')
@section('title')
Compare
@endsection
@section('content')
<div class="row">
	<div class="col-xs-10 col-md-offset-1">
		<table id="compare">
			<tr>
				<th>
					
				</th>
				<td>
					<div class="img-vendor">
						<div class="link-img">
							<div class="icon-button">
								<button type="button" class="btn btn-default">
									<img src="{{Asset('icon/delete.png')}}" class="img-icon" >
								</button>
							</div>
							<a href="#detailvendor"><img src="{{Asset('vendor/1.jpg')}}" class="img-thumbnail"></a>
						</div>
						<a style="text-align: center;" href="#">View photo</a>
					</div>
				</td>
				<td>
					<div class="img-vendor">
						<div class="link-img">
							<div class="icon-button">
								<button type="button" class="btn btn-default">
									<img src="{{Asset('icon/delete.png')}}" class="img-icon">
								</button>
							</div>
							<a href="#detailvendor"><img src="{{Asset('vendor/1.jpg')}}" class="img-thumbnail"></a>
						</div>
						<a style="text-align: center;" href="#">View photo</a>
					</div>
				</td>
				<td>
					<div class="img-vendor">
						<div class="link-img">
							<div class="icon-button">
								<button type="button" class="btn btn-default">
									<img src="{{Asset('icon/delete.png')}}" class="img-icon">
								</button>
							</div>
							<a href="#detailvendor"><img src="{{Asset('vendor/1.jpg')}}" class="img-thumbnail"></a>
						</div>
						<a style="text-align: center;" href="#">View photo</a>
					</div>
				</td>
				<td>
					<div class="img-vendor">
						<div class="link-img">
							<div class="icon-button">
								<button type="button" class="btn btn-default">
									<img src="{{Asset('icon/delete.png')}}" class="img-icon">
								</button>
							</div>
							<a href="#detailvendor"><img src="{{Asset('vendor/1.jpg')}}" class="img-thumbnail"></a>
						</div>
						<a style="text-align: center;" href="#">View photo</a>
					</div>
				</td>
				<td>
					<div class="img-vendor">
						<div class="link-img">
							<div class="icon-button">
								<button type="button" class="btn btn-default">
									<img src="{{Asset('icon/delete.png')}}" class="img-icon">
								</button>
							</div>
							<a href="#detailvendor"><img src="{{Asset('vendor/1.jpg')}}" class="img-thumbnail img-photo"></a>
						</div>
						<a style="text-align: center;" href="#">View photo</a>
					</div>
				</td>
			</tr>
			<tr>
				<th> </th>
				<td> vendor1</td>
				<td> vendor2</td>
				<td> vendor3</td>
				<td> vendor4</td>
				<td> vendor5</td>
			</tr>
			<tr style="background: #f6cddd;">
				<th> </th>
				<td> vendor1</td>
				<td> vendor2</td>
				<td> vendor3</td>
				<td> vendor4</td>
				<td> vendor5</td>
			</tr>
			<tr>
				<th> </th>
				<td> vendor1</td>
				<td> vendor2</td>
				<td> vendor3</td>
				<td> vendor4</td>
				<td> vendor5</td>
			</tr>
			<tr style="background: #f6cddd;">
				<th>Đánh giá</th>
				<td> vendor1</td>
				<td> vendor2</td>
				<td> vendor3</td>
				<td> vendor4</td>
				<td> vendor5</td>
			</tr>
			<tr>
				<th>Style</th>
				<td> vendor1</td>
				<td> vendor2</td>
				<td> vendor3</td>
				<td> vendor4</td>
				<td> vendor5</td>
			</tr>
			<tr style="background: #f6cddd;">
				<th>Gói dịch vụ</th>
				<td> vendor1</td>
				<td> vendor2</td>
				<td> vendor3</td>
				<td> vendor4</td>
				<td> vendor5</td>
			</tr>
			<tr>
				<th>Bao hiem</th>
				<td> 
					<div>Vendor 1</div>
					<div class="icon-ok "> <i class="glyphicon glyphicon-ok"></i></div>
					<div class="button-contact"><button type="button"  class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Liên Hệ</button>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h4 class="modal-title align">Liên hệ</h4>
						      </div>
						      <form class="form-horizontal" role="form">
						      <div class="modal-body">
						      	 <div class="row ">
						      	 	<div class="col-xs-2"> <h4>Đến: </h4></div>
						      	 	<div class="col-xs-6"> <h5>Tên vendor muốn gởi đến </h5></div>
						      	 </div>
						        <div class="row form-group">
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder="frist name">
								  </div>
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder="last name">
								  </div>
								</div>
								<div class="row form-group">
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder="Email">
								  </div>
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder="Điện thoại">
								  </div>
								</div>
								<div class="row form-group">
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder="Đám cưới">
								  </div>
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder="Ngày cưới">
								  </div>
								</div>
								<div class="row form-group">
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder="Thành phố">
								  </div>
								  <div class="col-xs-6">
								    <input type="text" class="form-control" placeholder=" Quận">
								  </div>
								</div>
								<div class="row form-group">
								  <div class="col-xs-12">
								  	<textarea class="form-control" rows="3"></textarea>								    
								  </div>
								</div>
						      </div>
						      <div class="modal-footer center-align">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						        <button type="button" class="btn btn-primary">Submit</button>
						      </div>
						  	</form>
						    </div><!-- /.modal-content -->
						  </div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
					</div>
					<div><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-heart heart"></i> Lưu</button></div>
				</td>
				<td> 
					<div>Vendor 1</div>
					<div class="icon-ok "> <i class="glyphicon glyphicon-ok"></i></div>
					<div class="button-contact"><button type="button" class="btn btn-primary btn-lg">Liên Hệ</button></div>
					<div><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-heart heart"></i> Lưu</button></div>
				</td>
				<td> 
					<div>Vendor 1</div>
					<div class="icon-ok "> <i class="glyphicon glyphicon-ok"></i></div>
					<div class="button-contact"><button type="button" class="btn btn-primary btn-lg">Liên Hệ</button></div>
					<div><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-heart heart"></i> Lưu</button></div>
				</td>
				<td> 
					<div>Vendor 1</div>
					<div class="icon-ok "> <i class="glyphicon glyphicon-ok"></i></div>
					<div class="button-contact"><button type="button" class="btn btn-primary btn-lg">Liên Hệ</button></div>
					<div><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-heart heart"></i> Lưu</button></div>
				</td>
				<td> 
					<div>Vendor 1</div>
					<div class="icon-ok "> <i class="glyphicon glyphicon-ok"></i></div>
					<div class="button-contact"><button type="button" class="btn btn-primary btn-lg">Liên Hệ</button></div>
					<div><button type="button" class="btn btn-default btn-lg"><i class="glyphicon glyphicon-heart heart"></i> Lưu</button></div>
				</td>
			</tr>
		</table>
	</div>
</div>
@endsection