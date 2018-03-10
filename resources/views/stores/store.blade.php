@extends('layouts.master')

@section('css')

@endsection

@section('content')
<div class="row">
	<div class="col-md-12 text-left button-groups margin-top-bottom"> 
		 <a data-target="#addStocks" data-toggle="modal" class="btn btn-info">Stocks</a>
		 <a href="/stores/view/sales/{{$store}}" class="btn btn-info">Sales</a>
     <a data-target="#" class="btn btn-info">Logs</a>
		 <a data-target="#addManager" data-toggle="modal" class="btn btn-info pull-right">Add Manager</a>
	</div>

	  <div class="modal fade" id="addStocks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Stocks</h4>
              </div>
              <div class="modal-body">
              	<div class="row ">
              	 <div class="col-md-12">
              		<div class="form-group">
              			 <label>Product Name</label>
              			 <select class="form-control" id="store-product">
              			 	<option selected hidden>Choose Product's</option>
              			 	@foreach($products as $product)
              			 		<option value="{{$product->id}}">{{$product->name}}</option>
              			 	@endforeach	
              			 </select>
              		</div>
              		<div class="form-group">
              			<label>Product's Stocks</label>
              			<input type="text" class="form-control" id="store-stocks">
              		</div>
              	 </div>
              	</div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="add-stocks"><span class="glyphicon glyphicon-plus"></span> Add Stocks</button>
              </div>
            </div>
          </div>
    </div>

     <div class="modal fade" id="addManager" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Stocks</h4>
              </div>
              <div class="modal-body">
                <div class="row ">
                 <div class="col-md-12">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" id="manager-name">
                    </div>
                    <div class="form-group">
                      <label>E-mail Address</label>
                      <input type="text" class="form-control" id="manager-email">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="manager-password">
                    </div>
                 </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="add-manager"><span class="glyphicon glyphicon-plus"></span> Add Stocks</button>
              </div>
            </div>
          </div>
    </div>

</div>



<div class="row">

  <div class="col-md-12">
    <table class="table table-condensed table-bordered">
      <thead>
        <tr>
          <th>Product Name</th>
          <th>Stocks</th>
        </tr>
      </thead>
      <tbody>
        @foreach($productStocks as $productStock)
        <tr id="tr-{{ $productStock->id }}">
          <td><a href="#" id="{{ $productStock->id }}" class="delete-stock" ><i class="fa fa-trash"></i></a> {{ $productStock->productStocks->name }}</td>
          <td>{{ $productStock->stocks }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>




















</div>
@endsection

@section('js')
<script type="text/javascript">
  $("table").DataTable();

	$(function(){
		$("#add-stocks").click(function(event){
			var stocks = {
				storeId : {{ $store }},
				productId : $("#store-product").val(),
				stockQuantity : $("#store-stocks").val()
			};

			$.ajax({	
				url: '/stores/add/stock',
				method: 'post',
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				data: { dataStocks : stocks },
				success: function(data){
					console.log(data);
				}
			});
		});

    $("#add-manager").click(function(event){
      var manager = {
          storeId : {{ $store }},
          name: $("#manager-name").val(),
          email: $("#manager-email").val(),
          password: $("#manager-password").val(),
        };

        $.ajax({
          url: '/store/add/manager',
          method: 'post',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {dataManager : manager},
          success: function(data){
            console.log(data);
          }

        });


    });

    $(".delete-stock").click(function(event){
      $("#tr-"+this.id).remove();
    });


	});
</script>
@endsection