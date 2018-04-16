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
	.form-control{
		border-radius: 0;
	}
	.calendar-table  .calendar-td{
		width: 100px;
		height: 60pt;
		text-align: center;
	}
	table.table-bordered.dataTable tbody th, 
	table.table-bordered.dataTable tbody td {
	    border-bottom-width: 0;
	    text-align: center;
	}
	table.table-bordered.dataTable tbody th{
		/*background-color: #d86464;*/
	    padding: 5px;
	    letter-spacing: 2px;
	    font-size: 10px;
	    /*color: white;*/
	}
/*	.danger{
		background-color: #ec7b7bc9;
	    color: white;
	    box-shadow: 0px 0px 3px 1px #bfb5b5;
		font-weight: bold;
	}*/
	.date-display{
		border-right: 1px solid #dddddd;
	    border-bottom: 1px solid #dddddd;
	    background: #dcb9b9;
	    color: #871010;
	    text-shadow: 0px 0px 2px white;
	    line-height: 20px;
	    font-size: 12px;
	    width: 30px;
	    position: relative;
	    top: -10px;
	}
	.calendar-table{
		empty-cells: hide;
	}
	.sale-container{
		position: relative;
	    font-size: 12px;
	    text-align: left;
	    padding: 2px;
	    color: red;
	    font-weight: bold;
	}
	.sale{
		text-align: center;
    	color: green;
	}
	.span-sale{
		padding: 2px;
	    padding-right: 10px;
	    padding-left: 10px;
	    font-size: 10px;
	    text-shadow: 1px 0px 2px black;
	    background: #cdcdf0;
	    color: white;
	}
	.modal-header-extend{
		background-color: #b32f2f;
	    color: white;
	    font-weight: bold;
	    letter-spacing: 2px;
	    text-align: center;
	}
	.modal-title{
		margin: 0;
    	line-height: 2;
	}
	.product-purchase:last-child{
		border-bottom: 1px solid;
    	margin: 1px;
	}
	.purchase-item-header{
		background-color: #7d1b1b;
	    color: white;
	    line-height: 40px;
	    letter-spacing: 2px;
	    text-align: center;
	    text-shadow: 1px 2px 2px black;
	}
	.panel-default>.panel-heading {
    /* color: #333; */
    /* background-color: #fff; */
    border-color: #d3e0e9;
	}
	.panel-body{
		font-size: 12px;
	}
	.purchase-boxes-header{
		font-weight: bold;
	    letter-spacing: 2px;
	    font-size: 9px;
	}
	.purchase-items-container{
		font-size: 10px;
    	letter-spacing: 1.2px;
	}
	.purchase-total-payment-container{
		font-weight: bolder;
	    letter-spacing: 2px;
	    color: green;
	}
	.btn-checkout{
		background-color: #ffc65c;
	    color: white;
	    font-weight: bold;
	    text-shadow: 0 0 5px #a40f0f;
	    letter-spacing: 2px;
	}
	.btn{
		outline: none !important;
	}
	.panel{
		box-shadow: none;
	}
	
</style>
@endsection

@section('content')
<div class="row margin-top-bottom">
	<div class="col-md-8 col-md-offset-2 no-padding">
		<a href="#requestProduct" data-toggle="modal" class="btn btn-default">Request Product</a>
		<a href="#stockProduct" data-toggle="modal" class="btn btn-default">Product Stocks</a>
		<a href="#storeSales" data-toggle="modal" class="btn btn-default">View Sales</a>
		<a href="#viewOrders" data-toggle="modal" class="btn pull-right btn-default"><span class="fa fa-cart-plus"></span> View Orders</a>


		<div id="requestProduct" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header modal-header-extend">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Request&Pending Products</h4>
		      </div>
		      <div class="modal-body">
		      	<div class="row">
		      	 <div class="col-md-12">
		      	 	<ul class="nav nav-pills">
					    <li class="active"><a data-toggle="pill" href="#menu-request">Request Products</a></li>
					    <li><a data-toggle="pill" href="#menu-pending-request">Pending Request</a></li>
				    </ul>	
		      	 </div>
		      	</div>
		      	<br>
		       <div class="tab-content">
		       	<div id="menu-request" class="tab-pane fade in active">
			      	<div class="row">
			        	<div class="col-md-12">
			        		<select class="form-control" id="request-product">
			        				@foreach($products as $product)
			        					<option value="{{ $product->id }}" >{{ $product->name }}</option>
			        				@endforeach
			        		</select>
			        	</div>
			        </div>
			        <div class="row">
			        	<div class="col-md-12">
			        		<input type="text" class="form-control" placeholder="Number of Stocks" id="request-stocks">
			        	</div>
			        </div>
		      	</div>
		      	<div id="menu-pending-request" class="tab-pane fade">
		      		<div class="row">
		      			<div class="col-md-12">
		      				<table class="table table-bordered table-striped">
		      					<thead>
		      						<tr>
		      							<th>Product Requested</th>
		      							<th>Number of Stocks</th>
		      							<th>Date Requested</th>
		      						</tr>
		      					</thead>
		      					<tbody>
		      						@foreach($requests as $request)
		      							<tr>
		      								<td>{{ $request->productRequested->name }}</td>
		      								<td>{{ $request->productStocks }}</td>
		      								<td>{{ $request->created_at }}</td>
		      							</tr>
		      						@endforeach
		      					</tbody>
		      				</table>
		      			</div>
		      		</div>
		      	</div>
		       </div>
		      	
		        

		      </div>
		      <div class="modal-footer">
		      	<div class="col-md-12 text-center">
		      		<button type="button" class="btn btn-success btn-request-product" >Request</button>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
		      </div>
		    </div>

		  </div>
		</div>

		<div id="stockProduct" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header modal-header-extend">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Products Stocks</h4>
		      </div>
		      <div class="modal-body">
		        <div class="row">
		        	<div class="col-md-12">
		        		<table class="table table-bordered table-striped">
		        			<thead>
		        				<tr>
		        					<th>Product Name</th>
		        					<th>Member's Price</th>
		        					<th>Reseller's Price</th>
		        					<th>Retailer's Price</th>
		        					<th>Stock's Available</th>
		        				</tr>
		        			</thead>
		        			<tbody>
		        				@foreach($productStocks as $product)
		        					<tr>
		        						<td>{{ $product->productStocks->name }}</td>
		        						<td>{{ $product->productStocks->members_price }}</td>
		        						<td>{{ $product->productStocks->resellers_price }}</td>
		        						<td>{{ $product->productStocks->retailers_price }}</td>
		        						<td>{{ $product->stocks }}</td>
		        					</tr>
		        				@endforeach
		        			</tbody>
		        		</table>
		        	</div>
		        </div>
		      </div>
		      <div class="modal-footer">
		      	<div class="col-md-12 text-center">
		      		<button type="button" class="btn btn-success btn-request-product" >Request</button>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
		      </div>
		    </div>

		  </div>
		</div>

		<div id="storeSales" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header modal-header-extend">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title"><span class="fa fa-calendar"></span> Calendar Sales</h4>
		      </div>
		      <div class="modal-body">
		        <div class="row">
		        	<div class="col-md-12 text-center">
						<?php
							$days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
							$currentYear = date('Y');
							$currentMonth = date('n');
							$numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
							$getStartDayOfMonth = gregoriantojd($currentMonth, 1, $currentYear);
							$startDay = jddayofweek($getStartDayOfMonth, 1);
							$arraySearch = array_search($startDay, $days);
							$calendarMatrix = array();
							$nullPlot = 0;
							$startingPlot = 0;

							for($x=0; $x<6; $x++){
								$week = array();
								for($y=0; $y<7; $y++){
									if($nullPlot != $arraySearch){
										$week[] = null;
										$nullPlot++;
									}elseif($nullPlot == $arraySearch && $startingPlot < $numberOfDaysInMonth){
										$week[] = ++$startingPlot;
							 		}else{
							 			$week[] = null;
							 		}
								}
								$calendarMatrix[] = $week;
							}
						?>
						<table class="table-bordered calendar-table">
								<tr>
									<?php for($x=0; $x<count($days); $x++) { ?>
										<th> <?php echo $days[$x] ?> </th>
									<?php } ?>		
								</tr>
								
							<?php for($x=0; $x<6; $x++) { ?>
								<tr>
									<?php for($y=0; $y<7; $y++){ ?>
										<td class="<?php echo $calendarMatrix[$x][$y] == date("d") ? 'danger' : '' ?> calendar-td">
											<div class="<?php echo $calendarMatrix[$x][$y] != null ? 'date-display' : null ?>"> 
												<?php echo $calendarMatrix[$x][$y] == " " ? 0 : $calendarMatrix[$x][$y]; ?>
											</div>
											<?php if( $calendarMatrix[$x][$y] != null) {?>
											<div class="sale-container">
												<span class="span-sale">Sales</span>
												<?php
													$dateSales = $currentYear.'-'.date('m').'-'.($calendarMatrix[$x][$y] < 10 ? '0'.$calendarMatrix[$x][$y] : $calendarMatrix[$x][$y] ); ?>
												<div class="sale">

													<?php
													$salesZero = 0;
													 foreach ($sales as $sale) { 
														$trimDate= explode(" ", $sale->created_at);
														if($trimDate[0] == $dateSales){
															 echo "Php ".$sale->total; 
															 $salesZero++;
														} 
												    }
												    if($salesZero == 0){
												    	echo 0;
												    }

												    ?>
												</div>
											</div>
											<?php } ?>
										</td>
									<?php } ?>
								</tr>
							<?php } ?>
						</table>
					
		        	</div>
				</div>
		      </div>
		     
		    </div>

		  </div>
		</div>


		<div id="viewOrders" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header modal-header-extend">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Products Stocks</h4>
		      </div>
		      <div class="modal-body">
		        <div class="row">
					<div class="col-md-12">
						  <div class="panel">
						    <div class="panel-body">
						    	<div class="col-md-12 purchase-boxes-header">
						    		<div class="col-md-3">Product</div>
						    		<div class="col-md-3">Qty</div>
						    		<div class="col-md-3">Price</div>
						    		<div class="col-md-3">Total</div>
						    		<hr>
						    	</div>
						    	<div class="col-md-12 purchase-items-container">
							    
						    	</div>
						  	  	<div class="col-md-12 purchase-total-payment-container">
							    	<div class="row">
							    		<div class="col-md-12">
							    			<hr>
							    			<div class="col-md-3">
							    				Total Payment
							    			</div>
							    			<div class="col-md-6 text-center">
							    			</div>
							    			<div class="col-md-3 total-payment">
							    				
							    			</div>
							    		</div>
							    	</div>
						    	</div>
						    	<div class="col-md-12 text-center margin-top-bottom">
									<button type="button" class="btn btn-checkout">Purchase</button>
						    	</div>
						    </div>
						  </div>
					</div>
				</div>
		      </div>
		    </div>

		  </div>
		</div>


		<div>
			
		</div>
	</div>
</div>
<div class="row margin-top-bottom">
	<div class="col-md-8 col-md-offset-2">
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
						<option value="{{ $productStock->productStocks->id }}"> {{ $productStock->productStocks->name }} 
						</option>
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
				<!-- <button class="btn btn-danger"><span class="fa fa-close"></span> Cancel Purchase</button> -->
			</div>
		</div>
	</div>
</div>


@endsection

@section('js')

<script type="text/javascript">
var orders = [];
var productsAvailable = [];


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
 		orders.push({
 			productID : $("#product-selected").val(),
 			productQuantity : $("#item-purchase").val(),
 			productTotal : $("#td-price").val()
 		});

 		var purchaseItem = "";
 			purchaseItem += '<div class="row">';
			purchaseItem += '<div class="col-md-12">';
			purchaseItem += '<div class="product-name-container col-md-3">'+$("#product-selected option:selected").text()+'</div>';	
			purchaseItem += '<div class="product-quantity-container col-md-3">'+$("#item-purchase").val()+'</div>';
			purchaseItem += '<div class="product-price-container col-md-3">'+$("#product-price").val()+'</div>';
			purchaseItem += '<div class="product-total-container col-md-3">'+$("#td-price").val()+'</div>';
			purchaseItem += '</div>';
			purchaseItem += '</div>';	

			
			var payment = (parseInt($(".total-payment").text()) >= 0 ? parseInt($(".total-payment").text()) : 0 ) + parseInt($("#td-price").val());
			$(".total-payment").text(payment);
			$("#product-selected").val('');
			$("#item-purchase").val('');
			$("#product-price").val('');
			$("#td-price").val('');

 		$(".purchase-items-container").append(purchaseItem);
 	});

 	$(".btn-checkout").click(function(event){
 		console.log(orders);
 		$.ajax({
 			url : '/sales/postSales',
 			method : 'post',
 			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
 			data : {orders},
 			success : function(data){
			 	location.reload();
 			}
 		});
 	});

 	$(".btn-request-product").click(function(event){
 		var requests = {
 			productID : $("#request-product").val(),
 			productStock : $("#request-stocks").val()
 		};

 		$.ajax({
 			url: '/store/post/request',
 			method: 'post',
 			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
 			data: {requests}
 		});

 	});

 	 $("table").DataTable();

 });

</script>

<script>


</script>


@endsection
