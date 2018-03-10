@extends('layouts.master')

@section('css')

@endsection

@section('content')
<div class="row">
	<div class="col-md-12 margin-top-bottom">
		<select class="form-control">
			<option>Daily</option>
			<option>Weekly</option>
			<option>Monthly</option>
		</select>
	</div>

	<div class="col-md-12">
		<div id="container" style="height: 400px; min-width: 310px; width: 100%; margin: 0 auto"></div>

        <canvas id="myChart"></canvas>
	</div>
</div>
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<script type="text/javascript">
  $(function(){
    $.ajax({
        url: '/sales/store/{{$store}}',
        method: 'get',
        dataType: 'json',
        success: function(data){
            var categories = [];
            var dataCategories = [];
            $.each(data, function(key, values){
                dataCategories.push(values['quantity']);
                categories.push(values['name']);
            });

            drawCharts(categories, dataCategories);
        }   
    });

  });

</script>


<script type="text/javascript">


function drawCharts(categories, dataCategories){
var chart = Highcharts.chart('container', {

    title: {
        text: 'Chart.update'
    },

    subtitle: {
        text: 'Plain'
    },

    xAxis: {
        categories: categories
    },
    yAxis: {
        tickInterval: 20,
        min: 0,
        max: 200
    },

    series: [{
        type: 'column',
        colorByPoint: true,
        data: dataCategories,
        showInLegend: false
    }]

});

}

</script>

@endsection