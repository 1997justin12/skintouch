@extends('layouts.master')

@section('css')

@endsection

@section('content')
<div class="row">

		<ol class="breadcrumb">
			<li class="breadcrumb-li"><a href="/products/view">View Products List</a></li>
			<li class="breadcrumb-li active"><a href="#">Add New Product's</a></li>
		</ol>


	<div class="col-md-12">
		<h3>Add Products</h3>
	</div>
	<div class="col-md-12">
	@if($errors->any())
		<div class="alert alert-warning">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

				@foreach($errors->all() as $error)
					{{ $error }}<br>
				@endforeach
		</div>
	@endif
	@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
	@endif
	</div>

	<div class="col-md-6">
	<form role="form" action="createProduct" method="post">
		{{ csrf_field() }}
	 <div class="form-body">
		<div class="form-group">
			<label for="product's name">Product's Name</label>
			<input type="text" name="name" value="{{old('name')}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="retailer's price">Retailer's Price</label>
			<input type="text" name="retailers_price" value="{{old('name')}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="member's price">Member's Price</label>
			<input type="text" name="members_price" value="{{old('name')}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="reseller's price">Reseller's Price</label>
			<input type="text" name="resellers_price" value="{{old('name')}}" class="form-control">
		</div>
		<div class="form-group">
			<label for="product's stock">Number of Stocks</label>
			<input type="text" name="products_stock" value="{{old('name')}}" class="form-control">
		</div>
	</div>
	<div class="form-action pull-right">
			<button type="submit" class="btn btn-"><i class="fa fa-plus"></i> Add</button>
	</div>

	</form>
	</div>
</div>
@endsection

@section('js')

@endsection