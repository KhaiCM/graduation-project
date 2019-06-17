@extends('backend.layouts.master')

@section('content')
<!-- Start content -->
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="breadcrumb-holder">
					<h1 class="main-title float-left">{{ trans('message.editcategory') }}</h1>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		@if (session('noti'))
		<div class="alert alert-success">
			{{ session('noti') }}
		</div>
		@endif
		<!-- end row -->
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     
				<div class="card mb-3">
					<div class="card-body">
						{{ Form::open(['method' => 'POST', route('editblogcat', $cat->id )]) }}
						<div class="form-group">
							{{ Form::label('name', trans('message.name')) }}
							<span class="text-danger">*</span>
							@if ($errors->first('title'))
							<span class="text-danger">{{$errors->first('title')}}</span>
							@endif
							{{ Form::text('name', $cat->name, ['class' => 'form-control', 'placeholder' => trans('message.name')]) }}
						</div>
						<div class="form-group">
							{{ Form::submit(trans('message.Submit'), ['class' => 'btn btn-primary']) }}
						</div>
						{{ Form::close() }}
					</div>  
					<!-- end card-body -->                              
				</div>
				<!-- end card -->                   
			</div>
			<!-- end col -->   
		</div>
		<!-- end row -->        
	</div>
	<!-- END container-fluid -->
</div>
@endsection
