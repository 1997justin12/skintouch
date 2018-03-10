@extends('layouts.slave')

@section('css')
<style type="text/css">
	.no-padding{
		padding: 0;
	}
	.btn{
		width: 150px;
	    padding: 10px;
	    font-size: 12px;
	    border-radius: 0;
	}
</style>
@endsection

@section('content')
<div class="row margin-top-bottom">
	<div class="col-md-8 col-md-offset-2">
		<a href="" class="btn btn-default">Request Product</a>
	</div>
</div>
<div class="row margin-top-bottom">
	<div class="col-md-6 col-md-offset-3">
		<div class="row">
			<div class="col-md-3 form-group no-padding pull-right">
					<select class="form-control" id="membership-check">
						<option value="0">Find Membership</option>
						@foreach($customers as $customer)
							<option value="1">{{ $customer->name }}</option>
						@endforeach
					</select>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<select class="form-control" id="product-selected">
					<option>Choose Products</option>
					@foreach($productStocks as $productStock)
						<option value="{{ $productStock->productStocks->id }}"> {{ $productStock->productStocks->name }} </option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 no-padding">
				<div class="row">
					<div class="col-md-4">
						<input class="form-control" placeholder="Product Price" id="product-price">
					</div>
					<div class="col-md-4">
						<input class="form-control" placeholder="Purchase" id="item-purchase">
					</div>
					<div class="col-md-4">
						<input class="form-control" placeholder="Total Price" id="td-price">
					</div>
				</div>
			</div>
		</div>
		<div class="row margin-top-bottom">
			<div class="col-md-12 text-center">
				<button class="btn btn-success" id="add-purchase"><span class="fa fa-plus"></span> Add Item</button>
				<button class="btn btn-danger"><span class="fa fa-close"></span> Cancel Purchase</button>
			</div>
		</div>
	</div>
</div>
<div class="row margin-top-bottom">
	<div class="col-md-8 col-md-offset-2">
		<table class="table table-bordered table-striped"> 
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Item Purchase</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody id="list-purchase">
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('js')

<script type="text/javascript">
 $(function(){
 	var productID = "";

 	$("#membership-check").change(function(event){
 		productID = $("#product-selected").val();

 		$.ajax({
 			url: '/sales/get/product/'+productID,
 			method: 'get',
 			dataType: 'json',
 			success: function(data){
 				if(this.value == 1)
 					$("#product-price").val(data[0]['members_price']);
 				else
 					$("#product-price").val(data[0]['retailers_price']);

 			}
 		});
 	});

 	$("#product-selected").change(function(event){
 		productID = $("#product-selected").val();
 		
 		$.ajax({
 			url: '/sales/get/product/'+productID,
 			method: 'get',
 			dataType: 'json',
 			success: function(data){
 				if($("#membership-check").val() == 1)
 					$("#product-price").val(data[0]['members_price']);
 				else
 					$("#product-price").val(data[0]['retailers_price']);
 			}
 		});

 	});

 	$("#item-purchase").keyup(function(event){
 		var price = $("#product-price").val();
 			price = price * this.value;
 			$("#td-price").val(price);

 	});

 	$("#add-purchase").click(function(event){
 		
 		var purchaseItem = "";
 			purchaseItem += "<tr>";
 			purchaseItem += "<td>"+$("#product-selected").val()+"</td>";
 			purchaseItem += "<td>"+$("#item-purchase").val()+"</td>";
 			purchaseItem += "<td>"+$("#td-price").val()+"</td>";
 			purchaseItem += "</tr>";
 			$(".dataTables_empty").remove();
 			$("#product-selected").val('');
 			$("#item-purchase").val('');
 			$("#td-price").val('');


 		$("#list-purchase").append(purchaseItem);
 	});

 	$("table").DataTable();

 });
</script>


@endsection