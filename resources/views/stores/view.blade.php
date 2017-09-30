@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
	<div class="row">
			<div class="col-md-8 text-left button-groups margin-top-bottom">
                <a href="addStore" class="btn btn-info active button-no-radius "><i class="fa fa-money"></i>Add New Branch</a>
			</div>

			<div class="col-md-12">
				<table class="table table-condesed table-bordered" id="stores">
					<thead>
						<tr>
							<th>Province</th>
							<th>City</th>
							<th>Street</th>
							<th>Landmark</th>
							<th>Sales</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($stores as $store)
							<tr id="store-{{ $store->id }}">
								<td>{{ $store->province }}</td>		
								<td>{{ $store->city }}</td>		
								<td>{{ $store->street }}</td>		
								<td>{{ $store->landmark }}</td>		
								<td>{{ $store->sales }}</td>	
								<td>
								<a href=""><i class="fa fa-eye"></i></a>
								<a href="" onclick="event.preventDefault()"><i class="fa fa-trash delete-branch" id="{{ $store->id }}"></i></a>
								</td>	
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$("#stores").DataTable();

		$(".delete-branch").click(function(){
			$("#store-"+this.id).remove();
		});
	</script>
@endsection