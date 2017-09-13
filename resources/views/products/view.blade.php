@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
	<div class="col-md-12">
		<a href="" class="btn btn-info margin-top-bottom active button-no-radius"><i class="fa fa-cube"></i> <span>Add Product</span></a>
		<table class="table table-condensed table-striped table-bordered compact" id="products">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price 1</th>
					<th>Price 2</th>
					<th>Price 3</th>
					<th>Date Added</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
					<?php foreach ($products as  $product){ ?>
						<tr>
							<td>{{ $product->name }}</td>
							<td>{{ $product->price1 }}</td>
							<td>{{ $product->price2 }}</td>
							<td>{{ $product->price3 }}</td>
							<td>{{ $product->created_at }}</td>
							<td>
								<a href=""><i class="fa fa-eye" title="View Product's Information"></i></a>&nbsp;
								<a href=""><i class="fa fa-pencil" title="Edit Product's Information"></i></a>&nbsp;
								<a href=""><i class="fa fa-trash" title="Delete Product's"></i></a>
							</td>
						</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>
		
@endsection

@section('js')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">

		$("#products").dataTable();
	</script>
@endsection