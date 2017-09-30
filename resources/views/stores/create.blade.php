@extends('layouts.master')

@section('css')

@endsection

@section('content')
<div class="row">
	<ol class="breadcrumb">
			<li class="breadcrumb-li"><a href="/stores/view">View Stores</a></li>
			<li class="breadcrumb-li active"><a href="#">Add New Branch</a></li>
	</ol>

	<div class="col-md-12 title-page">
		<h3>Add New Branch</h3>
	</div>
	<div class="col-md-12">
		@if($errors->any())
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>

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
		<form role="form" method="post" action="/stores/addStore">
			{{ csrf_field() }}

			<div class="form-group">
				<label for="province">Province</label>
				<input type="text" name="province" class="form-control">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" name="city" class="form-control">
			</div>
			<div class="form-group">
				<label for="street">Street</label>
				<input type="text" name="street"  class="form-control">
			</div>
			<div class="form-group">
				<label for="landmarks">Landmarks</label>
				<input type="text" name="landmark" class="form-control">
			</div>
			<div class="form-group">
				<label for="sales">Sales</label>
				<input type="text" name="sales" class="form-control">
			</div>
			<div class="form-action pull-right">
				<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('js')
	

@endsection