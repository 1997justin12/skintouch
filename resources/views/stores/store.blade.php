@extends('layouts.master')

@section('css')
<style type="text/css">
  .calendar-table  .calendar-td{
    width: 100px;
    height: 60pt;
    text-align: center;
  }
  table.table-bordered.dataTable tbody th, 
  table.table-bordered.dataTable tbody td {
      border-bottom-width: 0;
      text-align: center;
  }
  table.table-bordered.dataTable tbody th{
    /*background-color: #d86464;*/
      padding: 5px;
      letter-spacing: 2px;
      font-size: 10px;
      /*color: white;*/
  }
/*  .danger{
    background-color: #ec7b7bc9;
      color: white;
      box-shadow: 0px 0px 3px 1px #bfb5b5;
    font-weight: bold;
  }*/
  .date-display{
    border-right: 1px solid #dddddd;
      border-bottom: 1px solid #dddddd;
      background: #dcb9b9;
      color: #871010;
      text-shadow: 0px 0px 2px white;
      line-height: 20px;
      font-size: 12px;
      width: 30px;
      position: relative;
      top: -10px;
  }
  .calendar-table{
    empty-cells: hide;
  }
  .sale-container{
    position: relative;
      font-size: 12px;
      text-align: left;
      padding: 2px;
      color: red;
      font-weight: bold;
  }
  .sale{
    text-align: center;
      color: green;
  }
  .span-sale{
    padding: 2px;
      padding-right: 10px;
      padding-left: 10px;
      font-size: 10px;
      text-shadow: 1px 0px 2px black;
      background: #cdcdf0;
      color: white;
  }
  .modal-header-extend{
    background-color: #b32f2f;
      color: white;
      font-weight: bold;
      letter-spacing: 2px;
      text-align: center;
  }
  .modal-title{
    margin: 0;
      line-height: 2;
  }
  .btn{
    border-radius: 0;
    width: 100px;
    border-radius: 0;
    width: 120px;
    font-size: 10px;
  }
</style>

@endsection

@section('content')
<div class="row">
    <ol class="breadcrumb">
      <li class="breadcrumb-li"><a href="/stores/view">View Stores</a></li>
    </ol>
  </div>
<div class="row">
	<div class="col-md-12 text-left button-groups margin-top-bottom"> 
		 <a data-target="#addStocks" data-toggle="modal" class="btn btn-default">Stocks</a>
		 <a href="#storeSales" data-toggle = "modal" class="btn btn-default">Sales</a>
     <a data-target="#" class="btn btn-default">Logs</a>
		 <a data-target="#addManager" data-toggle="modal" class="btn btn-default pull-right">Add Manager</a>
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

    <div id="storeSales" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header modal-header-extend">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><span class="fa fa-calendar"></span> Calendar Sales</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 text-center">
            <?php
              $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
              $currentYear = date('Y');
              $currentMonth = date('n');
              $numberOfDaysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
              $getStartDayOfMonth = gregoriantojd($currentMonth, 1, $currentYear);
              $startDay = jddayofweek($getStartDayOfMonth, 1);
              $arraySearch = array_search($startDay, $days);
              $calendarMatrix = array();
              $nullPlot = 0;
              $startingPlot = 0;

              for($x=0; $x<6; $x++){
                $week = array();
                for($y=0; $y<7; $y++){
                  if($nullPlot != $arraySearch){
                    $week[] = null;
                    $nullPlot++;
                  }elseif($nullPlot == $arraySearch && $startingPlot < $numberOfDaysInMonth){
                    $week[] = ++$startingPlot;
                  }else{
                    $week[] = null;
                  }
                }
                $calendarMatrix[] = $week;
              }
            ?>
            <table class="table-bordered calendar-table">
                <tr>
                  <?php for($x=0; $x<count($days); $x++) { ?>
                    <th> <?php echo $days[$x] ?> </th>
                  <?php } ?>    
                </tr>
                
              <?php for($x=0; $x<6; $x++) { ?>
                <tr>
                  <?php for($y=0; $y<7; $y++){ ?>
                    <td class="<?php echo $calendarMatrix[$x][$y] == date("d") ? 'danger' : '' ?> calendar-td">
                      <div class="<?php echo $calendarMatrix[$x][$y] != null ? 'date-display' : null ?>"> 
                        <?php echo $calendarMatrix[$x][$y] == " " ? 0 : $calendarMatrix[$x][$y]; ?>
                      </div>
                      <?php if( $calendarMatrix[$x][$y] != null) {?>
                      <div class="sale-container">
                        <span class="span-sale">Sales</span>
                        <?php
                          $dateSales = $currentYear.'-'.date('m').'-'.($calendarMatrix[$x][$y] < 10 ? '0'.$calendarMatrix[$x][$y] : $calendarMatrix[$x][$y] ); ?>
                        <div class="sale">

                          <?php
                          $salesZero = 0;
                           foreach ($sales as $sale) { 
                            $trimDate= explode(" ", $sale->created_at);
                            if($trimDate[0] == $dateSales){
                               echo "Php ".$sale->total; 
                               $salesZero++;
                            } 
                            }
                            if($salesZero == 0){
                              echo 0;
                            }

                            ?>
                        </div>
                      </div>
                      <?php } ?>
                    </td>
                  <?php } ?>
                </tr>
              <?php } ?>
            </table>
          
              </div>
        </div>
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
  //$("table").DataTable();

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

      console.log("test");
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

    $("table").DataTable();

	});
</script>
@endsection