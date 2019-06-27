@extends('backend.layouts.master')

@section('content')

<!-- Start content -->
<div class="container-fluid">
	
	<div class="row">
		<div class="col-xl-12">
			<div class="breadcrumb-holder">
				<h1 class="main-title float-left">Dashboard</h1>
				<ol class="breadcrumb float-right">
					<li class="breadcrumb-item">Home</li>
					<li class="breadcrumb-item active">Dashboard</li>
				</ol>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- end row -->
	
	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-default">
				<i class="fa fa-file-text-o float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">Orders</h6>
				<h1 class="m-b-20 text-white counter">1,587</h1>
				<span class="text-white">15 New Orders</span>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-warning">
				<i class="fa fa-bar-chart float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">Visitors</h6>
				<h1 class="m-b-20 text-white counter">250</h1>
				<span class="text-white">Bounce rate: 25%</span>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-info">
				<i class="fa fa-user-o float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">Users</h6>
				<h1 class="m-b-20 text-white counter">120</h1>
				<span class="text-white">25 New Users</span>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
			<div class="card-box noradius noborder bg-danger">
				<i class="fa fa-bell-o float-right text-white"></i>
				<h6 class="text-white text-uppercase m-b-20">Alerts</h6>
				<h1 class="m-b-20 text-white counter">58</h1>
				<span class="text-white">5 New Alerts</span>
			</div>
		</div>
	</div>
	<!-- end row -->
	<div class="row">
		<div id="province" class="col-12" style="height: 500px"></div>
		<div id="property_category" class="col-12" style="height: 500px"></div>
	</div>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        	@foreach ($province_statistics as $rkey => $row)
        		[@foreach ($row as $key => $column){!! $rkey === 0 || $key === 0  ? '"' . $column . '"' : $column !!},@endforeach],
        	@endforeach
        ]);
        var options = {
          title: 'Tỉnh được tìm kiếm nhiều nhất',
					legend: { position: 'bottom' },
					vAxis: {
							viewWindow: {
									min: 0,
									max: 1000
							},
							// ticks: [0, 25, 50, 75, 100] // display labels every 25
					}
        };
        var chart = new google.visualization.LineChart(document.getElementById('province'));
        chart.draw(data, options);

        var data2 = google.visualization.arrayToDataTable([
        	@foreach ($property_category_statistics as $rkey => $row)
        		[@foreach ($row as $key => $column){!! $rkey === 0 || $key === 0  ? '"' . $column . '"' : $column !!},@endforeach],
        	@endforeach
        ]);
        var options2 = {
          title: 'Loại tài sản được tìm kiếm nhiều nhất',
          legend: { position: 'bottom' }
        };

        var chart2 = new google.visualization.LineChart(document.getElementById('property_category'));

        chart2.draw(data2, options2);
      }
    </script>
	@endsection