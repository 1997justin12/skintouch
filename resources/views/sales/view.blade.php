@extends('layouts.master')

@section('css')
<style type="text/css">
	.container-inventory{
		display: table;
		white-space: nowrap;
		height: 300px;
		table-layout: fixed;
		width: 200px;
	}
	.container-inventory-header{
		display: table-cell;
	    border: 1px solid black;
	    width: 200px;
	    line-height: 30px;
	    text-align: left;
	    font-weight: bold;
		padding: 2px;
	}
	.container-inventory-item{
		display: table-cell; 
		border: 1px solid black; 
		padding: 2;
		width: 50px;
		text-align: center;
   	    font-weight: bold;
	}
	.test{
		/*margin: 0;*/
		display: table-row;
		/*flex-wrap: row wrap;*/
	}
	.btn{
		border-radius: 0px;
		letter-spacing: 2px;
	}
	.generate-sales{
		margin-top: 100px;
	}
</style>
@endsection

@section('content')
<div class="row">
	<div class="inventory-container">
		<form role="form" action="inventory" method="post" enctype="
		multipart/form-data">
	    <div class="col-md-8 col-md-offset-2 margin-top-bottom">
	    	<div class="col-md-6">
	    		 <button class="btn btn-lg btn-success">Monthly Inventory</button>
	    	</div>
	    	<div class="col-md-6">
	    		<button class="btn btn-lg btn-success weekly">Weekly Inventory</button>    		
	    	</div>
	   			
	            {{ csrf_field() }}
	    </form>
    </div>

</div>
@endsection

@section('js')
<script type="text/javascript">
$(".weekly").click(function(event){
	$("form").attr('action', 'inventory/weekly');
});


</script>
@endsection
