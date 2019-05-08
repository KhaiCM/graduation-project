<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title>{{ trans('message.Admin') }}</title>
	<meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
	<meta name="author" content="Pike Web Development - https://www.pikephp.com">

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('bower_components/lib_bower/backend/assets/images/favicon.ico') }}">

	<!-- Bootstrap CSS -->
	<link href="{{ asset('bower_components/lib_bower/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	
	<!-- Font Awesome CSS -->
	<link href="{{ asset('bower_components/lib_bower/backend/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	
	<!-- Custom CSS -->
	<link href="{{ asset('bower_components/lib_bower/backend/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
	
	<!-- BEGIN CSS for this page -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
	<!-- END CSS for this page -->
	
</head>

<body class="adminbody">

	<div id="main">

		@include('backend.admin.layouts.header')
		
		
		@include('backend.admin.layouts.sidebar')


		<div class="content-page">

			<!-- Start content -->
			<div class="content">
				@yield('content')
				
			</div>
		</div>
	</div>
	<!-- END content-page -->

	@include('backend.admin.layouts.footer')

</div>
<!-- END main -->

<script src="{{ asset('bower_components/lib_bower/backend/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_bower/backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_bower/backend/assets/js/moment.min.js') }}"></script>

<script src="{{ asset('bower_components/lib_bower/backend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_bower/backend/assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('bower_components/lib_bower/backend/assets/js/detect.js') }}"></script>
<script src="{{ asset('bower_components/lib_bower/backend/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('bower_components/lib_bower/backend/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('bower_components/lib_bower/backend/assets/js/jquery.nicescroll.js') }}"></script>

<!-- App js -->
<script src="{{ asset('bower_components/lib_bower/backend/assets/js/pikeadmin.js') }}"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Counter-Up-->
<script src="{{ asset('bower_components/lib_bower/backend/assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('bower_components/lib_bower/backend/assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor1'); </script>			
<script> CKEDITOR.replace('editor2'); </script>	
<script>
	$(document).ready(function() {
			// data-tables
			$('#example1').DataTable();
			
			// counter-up
			$('.counter').counterUp({
				delay: 10,
				time: 600
			});
		} );	
	</script>
	<script>
		setTimeout(function(){
			$('#alert').hide();
		}, 2000);
	</script>

</body>
</html>

