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
		<div class="col-md-12">
			<table class="table table-condensed table-striped table-bordered table-stocks">
				<thead>
					<tr>
						<th>Product's Name</th>
						<th>Stock's Available</th>
						<th>Stock's Sold</th>
						<th>Total Stocks</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($stocks as $stock)
						<tr>
							<td>{{ $stock->productStocks->name }}</td>
							<td>{{ $stock->stocks }}</td>
							<td>0</td>
							<td>{{ $stock->stocks }}</td>
							<td>
								<a href="#"><i class="fa fa-pencil" title="Update Product"></i></a>
								<a href="#"><i class="fa fa-trash" title="Delete Product"></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
@endsection

@section('js')
	<script type="text/javascript">
		$(function(){
			$('.table-stocks').DataTable();
		});
	</script>
@endsection
