@extends('main')
@section('title')
Budget
@endsection
@section('nav-bar')
@include('nav')
@endsection
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-3"></div>
		<div class="col-xs-6">
			<div class="row">
				<div class="row form-group"><h1>Nhập vào số tiền dự toán của bạn</h1></div>
			</div>
			<div class="row">
				<form id="form-create-money" action="{{URL::route('money_budget')}}" method="post">
					<div class="row form-group">
						<label for="money_budget" class="col-xs-2 control-label">Số tiền</label>
						<div class="col-xs-5">
							<input type="text" onkeyup="key_money(event)" class="form-control" id="money_budget1" name="money_budget1" placeholder="Nhập số tiền"  />
						   	<input type="text" hidden name="money_budget" id="money_budget"/>
						</div>
						<small>VND</small>
					</div>
					<div class="row form-group">
						<div class="col-xs-3">
							
						</div>
						<div class="col-xs-4">
						   	<button type="submit" id="submit_money" class="btn btn-success">Tính tổng chi phí</button>
						</div>
						<div class="col-xs-5"></div>
					</div>
				</form>
				<script type="text/javascript">


				$("#form-create-money").validate({
					rules:
					{
						money_budget1:
						{
							required:true
							
						
						}
					},
					messages:
					{
						money_budget1:
						{
							required:"Chưa nhập số tiền"
							
							
						}
					}
				})
				
                  function key_money(event){
	                 if(event.which >= 37 && event.which <= 40) return;
		                 $("#money_budget1").val(function(index, value) {
						        return value
						            .replace(/\D/g, '')
						            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
						            $('#money_budget').val($("#money_budget1").val().replace(/,/gi,''));
						    });
		                 $('#money_budget').val($("#money_budget1").val().replace(/,/gi,''));
		        //alert($("#money_budget1").val().replace(/,/gi,''));      
		                
				};
				
				</script>
			</div>
		</div>
		<div class="col-xs-3"></div>
	</div> <!-- row -->
</div><!--container-->
@endsection