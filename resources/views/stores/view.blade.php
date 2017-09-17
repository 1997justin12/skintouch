@extends('layouts.master')

@section('css')
@endsection

@section('content')
	<div class="row margin-top-bottom">
			<div class="form-group col-md-4">
				<label for="stores">Select Branch</label>
				<select class="form-control">
					<option></option>
					<option>Davao City</option>
					<option>Tagum City</option>
					<option>Panabo City</option>
				</select>
			</div>
			<div class="col-md-8 text-right button-groups">
                <a href="" class="btn btn-info button-no-radius"><i class="fa fa-money"></i>Update Product's</a>
                <a href="" class="btn btn-info button-no-radius"><i class="fa fa-cog"></i>View Product's List</a>
			</div>
	</div>

@endsection