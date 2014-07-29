@extends('main')
@section('title')
Checklist
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container user-checklist">
	<div class="row">
	<div class="notice-checklist text-center">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-2">
						WEDDINGDATE <br>
						2014/07/07
						</div>
						<div class="col-md-2">
						TO-DOS <br>
						100
						</div>
						<div class="col-md-2">
						OVERDUE <br>
						50
						</div>
						<div class="col-md-2">
						COMPLETED <br>
						10
						</div>
						<div class="col-md-2"></div>
					</div>
				</div><!--notice-checklist-->
		<div class="col-xs-12 col-md-9">
			  	<div class="row sort-by">
			  		<div class="col-md-6">
			  			<h2>Check list</h2>
			  		</div>
			  		<div class="col-md-4 pull-right">
			  			<div>
							<ul class="nav nav-pills text-right" role="tablist">
								<li class="active">
									<a href="#time" role="tab" data-toggle="tab"><span class="fa fa-calendar"></span> By Month</a>
								</li>
								<li>
									<a href="#category" role="tab" data-toggle="tab"><span class="glyphicon glyphicon-list"></span> By Category</a>
								</li>
							</ul>
						</div>
			  		</div>
			  	</div>
			  	<div class="tab-content">
			  	<div class="tab-pane fade in active" id="time">
			  		<div class="row">
			  		<div class="col-md-2"><a href="#" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span> Add an item</a>
			  		</div>
			  		<!-- Modal -->
					<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h4 class="modal-title" id="myModalLabel">Add an item</h4>
					      </div>
					      <div class="modal-body">
					        ...
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div>
			  		<div class="col-md-2"><a href="#" data-toggle="modal" data-target="#print"><span class="fa fa-print"></span> Print report</a>
			  		</div>
			  		<div class="col-md-8 pull-right text-right"> <a href="">Jan</a> - <a href="">Feb</a>- <a href="">Mar</a>- <a href="">Apr</a>- <a href="">May</a>- <a href="">Jun</a>- <a href="">Jul</a>- <a href=""><strong>Aug</strong></a>- <a href="">Sep</a>- <a href="">Oct</a>- <a href="">Nov</a>- <a href="">Dec</a></div>
			  	</div>
			  		<table class="table table-hover">
	  					<thead>
	  						<tr>
	  							<th>August 2014</th>
	  						</tr>
	  					</thead>
	  					<tbody>
	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Congratulations, you're engaged! Announce your engagement to family and friends. Consider making the announcement in local newspapers.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>

	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Congratulations, you're engaged! Announce your engagement to family and friends. Consider making the announcement in local newspapers.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>

	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Congratulations, you're engaged! Announce your engagement to family and friends. Consider making the announcement in local newspapers.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>

	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Congratulations, you're engaged! Announce your engagement to family and friends. Consider making the announcement in local newspapers.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>

	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Congratulations, you're engaged! Announce your engagement to family and friends. Consider making the announcement in local newspapers.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>

	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Congratulations, you're engaged! Announce your engagement to family and friends. Consider making the announcement in local newspapers.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>

	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Congratulations, you're engaged! Announce your engagement to family and friends. Consider making the announcement in local newspapers.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>

	  						<tr>
	  							<td>
	  								<div class="checkbox">
	  									<input type="checkbox" name="">
	  								</div>
	  							</td>
	  							<td>Determine a time frame for your wedding date. Narrow down your wedding date to a few weekends that don't conflict with other family events.
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  					</tbody>
	  				</table>
	  			</div><!--time-->
	  			<div class="tab-pane fade" id="category">
	  				<div class="row">
			  		<div class="col-md-2"><a href="#" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span> Add an item</a>
			  		</div>
			  		<!-- Modal -->
					<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					        <h4 class="modal-title" id="myModalLabel">Add an item</h4>
					      </div>
					      <div class="modal-body">
					        ...
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
					        <button type="button" class="btn btn-primary">Save changes</button>
					      </div>
					    </div>
					  </div>
					</div>
			  		<div class="col-md-2"><a href="#" data-toggle="modal" data-target="#print"><span class="fa fa-print"></span> Print report</a>
			  		</div>
			  	</div>
	  				<table class="table table-hover">
	  					<thead>
	  						<tr>
	  							<th>Band</th>
	  							<th></th>
	  							<th></th>
	  							<th></th>
	  							<th></th>
	  						</tr>
	  					</thead>
	  					<tbody>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>Search for a band</td>
	  							<td>Aug</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>Book your band. Record deposits and payments in your Budget Tool.</td>
	  							<td>Ocb</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>If you have a band, work on a list of 'must-play' and 'do-not play' songs. Be sure you also send them selections for your introductions, first dance, cake cutting, father/daughter dance, anniversary dance, and last dance.</td>
	  							<td>Feb</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  					</tbody>
	  					
	  					<thead>
	  						<tr>
	  							<th>Band</th>
	  							<th></th>
	  							<th></th>
	  							<th></th>
	  							<th></th>
	  						</tr>
	  					</thead>
	  					<tbody>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>Search for a band</td>
	  							<td>Aug</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>Book your band. Record deposits and payments in your Budget Tool.</td>
	  							<td>Ocb</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>If you have a band, work on a list of 'must-play' and 'do-not play' songs. Be sure you also send them selections for your introductions, first dance, cake cutting, father/daughter dance, anniversary dance, and last dance.</td>
	  							<td>Feb</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  					</tbody>

	  					<thead>
	  						<tr>
	  							<th>Band</th>
	  							<th></th>
	  							<th></th>
	  							<th></th>
	  							<th></th>
	  						</tr>
	  					</thead>
	  					<tbody>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>Search for a band</td>
	  							<td>Aug</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>Book your band. Record deposits and payments in your Budget Tool.</td>
	  							<td>Ocb</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  						<tr>
	  							<td>
	  								<input type="checkbox" name="">
	  							</td>
	  							<td>If you have a band, work on a list of 'must-play' and 'do-not play' songs. Be sure you also send them selections for your introductions, first dance, cake cutting, father/daughter dance, anniversary dance, and last dance.</td>
	  							<td>Feb</td>
	  							<td>
	  								<a href=""><span class="fa fa-edit"></span></a>
	  							</td>
	  							<td>
	  								<a href=""><span class="fa fa-trash-o"></span></a>
	  							</td>
	  						</tr>
	  					</tbody>
	  				</table>
	  			</div>	
			  	</div><!--tab-content-->

			
		</div><!--col-md-9-->
		<div class="col-xs-12 col-md-3">
			<div class="row">
			<div class="col-lg-12"><h3 class="text-center">Search Task</h3></div>
			  <div class="col-lg-12">
			    <div class="input-group">
			      <input type="text" name="input-search" placeholder="Search Task" class="form-control">
			      <span class="input-group-btn">
			        <button class="btn btn-primary" type="button">Go!</button>
			      </span>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			</div><!-- /.row -->			
		</div>
	</div>
</div><!--container-->
@endsection