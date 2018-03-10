@extends('layouts.master')

@section('css')

@endsection

@section('content')
	<div class="row">
		<ol class="breadcrumb">
			<li class="breadcrumb-li"><a href="/products/view">View Products List</a></li>
			<li class="breadcrumb-li"><a href="#">View Products Stock</a></li>
		</ol>
	</div>
	

	<div class="row">
		<div class="col-md-12">



			<div class="panel-group" id="accordion">


			@foreach($stocks as $stock)

			  <div class="panel panel-info">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $stock[0]->productStocks->id }}">
			        {{ $stock[0]->productStocks->name }}</a>
			      </h4>
			    </div>
			    <div id="collapse{{ $stock[0]->productStocks->id }}" class="panel-collapse collapse">
			      <div class="panel-body">
			      	
			      	<table class="table table-condensed table-bordered table-striped">
			      		<thead>
			      			<tr>
			      				<th>Store Branch</th>
			      				<th>Stock's Available</th>
			      				<th>Stock's Sold</th>
			      				<th>Total Stocks</th>
			      				<th>Sales</th>
			      			</tr>
			      		</thead>
			      		<tbody>
			      			@foreach($stock as $stockDetails)
			      			<tr>
			      				<td>{{ $stockDetails->storeBranch->city }}</td>
			      				<td>{{ $stockDetails->stocks }}</td>
			      				<td>
			      					<?php $stockSolds = 0; ?>

			      					@foreach($stockDetails->productSolds as $sales)
			      						
			      						@if($sales->branch_id == $stockDetails->store_id)
			      							<?php $stockSolds += $sales->quantity ?>
			      						@endif
			      					@endforeach
			      					{{ $stockSolds }}
			      				</td>
			      				<td>{{ $stockDetails->stocks + $stockSolds}}</td>
			      				<td>
			      					<?php $stockSales = 0 ?>

			      					@foreach($stockDetails->productSolds as $sales)

			      						@if($sales->branch_id == $stockDetails->store_id)
			      							<?php $stockSales += $sales->total_amount ?>
			      						@endif
			      					@endforeach
			      					{{ $stockSales }}
			      				</td>
			      			</tr>
			      			@endforeach
			      		</tbody>
			      	</table>

			      </div>
			    </div>
			  </div>

			 @endforeach

			</div>



		</div>
	</div>

@endsection

@section('js')
	<script type="text/javascript">
		$(function(){
			// $('.table-stocks').DataTable({
			// 	"createdRow" : function(row, data, index){
			// 		if(data[1] < 10){
			// 			$(row).addClass('danger');
			// 		}
			// 	}
			// });

			$('table').DataTable({
				"createdRow" : function(row, data, index){
				
				},
				"columnDefs": [ {
				    "targets": 4,
				    "createdCell": function (td, cellData, rowData, row, col) {
				      if ( cellData < 1 ) {
				        $(td).css('color', 'red');
				      }else{
				      	$(td).addClass('success');
				      }
				    }
				  } ]


			});

			

			// $('.delete-stock').click(function(event){
			// 	$('#stock-'+this.id).remove();
			// });
		});
	</script>	
@endsection
