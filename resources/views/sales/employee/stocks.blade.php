@extends('layouts.slave')

@section('css')
<style type="text/css">
	tr{
		border: 1px solid black;
		border: 1px solid #b5b5b5;
	    border-left: 0;
	    border-right: 0;
	}

	tr:first-child{
		border-top: 0;
	}

	tr:last-child{
		border-bottom: 0;
	}

	.table>tbody>tr>td:first-child{
		border: none;
		font-size: 16px;
		line-height: 35px;
	}

	.table{
		margin-bottom: 0;
	}

</style>
@endsection

@section('content')
 <div class="col-md-8 col-md-offset-2">
 	<div class="row margin-top-bottom">
 			<a href="#" class="btn btn-default"><i class="fa fa-trash"></i> </a>
 			<a href="#" class="btn btn-default"><i class="fa fa-edit"></i> </a>
 			<div class="form-group pull-right col-md-4" style="padding: 0">
 				<select class="form-control" id="membership-type">
 					<option>Membership Type</option>
 					<option value="none">None</option>
 					<option value="member">Members</option>
 					<option value="reseller">Resellers</option>
 				</select>
 			</div>
 	</div>
 	<div class="row margin-top-bottom">
 		<div class="form-group">
 			<input type="text" name="" id="name-of-item" class="form-control" placeholder="Name of Item" onkeyup="searchItem(this.value)" style="border-radius: 0">
 			<div id="search-results" class="col-md-12" style="padding: 5px; background-color: white; display: none; position: absolute; z-index: 9999999; border: 1px solid #ccbebe; border-top: none;">
 				<table class="table table-hover">
 					<tbody id="display-results">
 						
 					</tbody>
 				</table>
 			</div>
 		</div>
 		<div class="form-group">
 			<div class="form-group col-md-4" style="padding: 0">
 				<input type="text" name="" id="item-price" class="form-control" placeholder="Price" style="border-radius: 0">
 			</div>
 			<div class="form-group col-md-4" style="padding: 0">
 				<input type="text" name="" id="item-quantity" onkeyup="calc(this.value)" class="form-control" placeholder="Quantity" style="border-radius: 0; border-left: none; border-right: none">
 			</div>
 			<div class="form-group col-md-4" style="padding: 0">
 				<input type="text" name="" id="total-payment" class="form-control" placeholder="Total Amount" style="border-radius: 0">
 			</div>
 		</div>
 		<div class="form-submit">
 			<button type="button" class="btn btn-primary" onclick="addItem()"><i class="fa fa-add"></i> Add Item</button>
 		</div>
 	</div>
 	<div class="row">
 	 <div class="col" style="padding: 0; display: none" id="checkout-item" >
 		<div class="panel-group" id="accordion">
		  <div class="panel panel-default" >
		    <div class="panel-heading">
		      <div class="panel-title" style="height: auto; line-height: 35px">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
		        {{ Auth::user()->name }}</a>
		        <button class="btn btn-success pull-right" onclick="checkOut()">Checkout</button>
		      </div>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse in">
		      <div class="panel-body">
		      	<table class="table table-condensed table-bordered">
		      		<thead>
		      			<tr>
		      				<th>No.</th>
		      				<th>Name of Product</th>
		      				<th>Price</th>
		      				<th>Quantity</th>
		      				<th>Total</th>
		      			</tr>
		      		</thead>
		      		<tbody id="tbody-item">
		      		</tbody>
		      	</table>
		      </div>
		    </div>
		  </div>
		</div>
     </div>
 	</div>
 </div>
@endsection

@section('js')
<script type="text/javascript">
	var itemListed = 1;
	var arrayListedItem = [];
	function searchItem(e){
		if(e != ""){
		var search = $.ajax({
				method : 'get',
				url : 'searchItem/'+e,
				dataType : 'json'
		});

			search.done(function(data){
				if(data.length !=0 ){
					$("#search-results").css("display", "block");
					$("#display-results").html("");
					var itemDisplay = "";
						$.each(data, function(key, value){
							itemDisplay += "<tr><td>" + value['name'] + "<button type='button' onclick='checkItem("+value['id']+")' class='btn btn-primary pull-right'><i class='fa fa-check'></button></td></tr>";
						});
					$("#display-results").append(itemDisplay);
				}
			});
		}
		else{
					$("#search-results").css("display", "none");
		 }	
	}

	function checkItem(e){
		var getItem = $.ajax({
				method : 'get',
				url : 'itemDetails/'+e,
				dataType : 'json'
		});

		getItem.done(function(data){	
			var type = $("#membership-type").val();
			$("#name-of-item").val(data['name']);
			if(type == 'member'){
				$('#item-price').val(data['members_price']);
				$("#search-results").css("display", "none");
			}else if(type == 'reseller'){
				$('#item-price').val(data['resellers_price']);
				$("#search-results").css("display", "none");
			}else{
				$('#item-price').val(data['retailers_price']);
				$("#search-results").css("display", "none");
			}
		});
	}

	function calc(e){
		var total = $("#item-price").val();
		total *= e;
		$("#total-payment").val("Php "+ total.toLocaleString());
	}

	function addItem(){
		$("#checkout-item").css("display", "block");

			arrayListedItem.push({
				name : $("#name-of-item").val(),
				price : $("#item-price").val(),
				quantity : $("#item-quantity").val(),
				totalpayment : $("#total-payment").val()
			});

		var item = "<tr>";
			item += "<td>"+(itemListed++)+"</td>";
			item += "<td>"+($("#name-of-item").val())+"</td>";
			item += "<td>"+($("#item-price").val())+"</td>";
			item += "<td>"+($("#item-quantity").val())+"</td>";
			item += "<td>"+($("#total-payment").val())+"</td>";
			item += "</tr>";
		$("#tbody-item").append(item);

		$("#name-of-item").val("");
		$("#item-price").val("");
		$("#item-quantity").val("");
		$("#total-payment").val("");

	}

	function checkOut(){
		var checkOut  = $.ajax({ 
			url: '/sales/postSales',
			method: 'post',
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			data: {arrayListedItem},
			dataType: 'json'
		});

			checkOut.done(function(data){
				console.log(data);
			});

			checkOut.fail(function(error, message){

			});
	}
</script>
@endsection