@extends('layouts.master')

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
@endsection

@section('content')
	<div class="row">
			<div class="col-md-8 text-left button-groups margin-top-bottom">
                <a href="" class="btn btn-info active button-no-radius "><i class="fa fa-money"></i>Add New Branch</a>
          
			</div>

			<div class="col-md-12">
				<table class="table table-condesed table-bordered" id="stores">
					<thead>
						<tr>
							<th>Province</th>
							<th>Street</th>
							<th>Location</th>
							<th>Sales</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Davao Del Sur</td>
							<td>Blk. 19 Street</td>
							<td>Boulevard Davao CIty</td>
							<td>Php 5000.00</td>
							<td>
								<a href=""><i class="fa fa-eye"></i></a>
								<a href=""><i class="fa fa-trash"></i></a>
							</td>
						</tr>
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
	</script>
@endsection