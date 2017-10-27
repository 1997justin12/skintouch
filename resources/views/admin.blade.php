@extends('layouts.master')

@section('css')


@endsection

@section('content')
	<div class="col-md-12">
		<div class="button-group margin-top-bottom">
			<button class="btn btn-primary"><i class="fa fa-plus"></i> New Member</button>	
		</div>

		<table class="table table-condensed table-bordered">
			<thead>
				<tr>
					<th>Name</th>
					<th>Membership</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($customers as $customer)
					<tr>
						<td>{{ $customer->name }}</td>
						<td>{{ $customer->type }}</td>
						<td>
							<a href="#"><i class="fa fa-eye"></i></a>
							<a href="#"><i class="fa fa-trash"></i></a>
							<a href="#"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('js')
	<script type="text/javascript">
		$(".table").DataTable({
			"columns" : [
				null,
				{"width" : "10%"},
				{"width" : "5%"}
			]
		});
	</script>
@endsection