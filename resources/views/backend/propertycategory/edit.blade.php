@extends('backend.layouts.master')

@section('content')
<!-- Start content -->
<div class="container-fluid">



    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">{{ trans('province.listPropertyCategory') }}</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ trans('province.listPropertyCategory') }}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
        <!-- end row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     
                <div class="card mb-3">
                    <div class="card-body">
                        {!! Form::open(['route' => ['procat.edit', $propertyCategories->id], 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! Form::label('name', trans('province.name')) !!}
                            <span class="text-danger">*</span>
                            @if ($errors->first('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                            @endif
                            {!! Form::text('name', $propertyCategories->name, ['class' => 'form-control', 'placeholder' => trans('province.name')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit(trans('message.Submit'), ['class' => 'btn btn-primary']) !!}
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
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
                {{ $err }}<br>
            @endforeach
        </div>
    @endif
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    {!! Form::open(['route' => ['procat.edit', $propertyCategories->id], 'method' => 'post']) !!}
        {!! Form::label('name', trans('province.name') , ['class' => 'label']) !!}
        {!! Form::text('name', $propertyCategories->name, ['class' => 'input', 'placeholder' => trans('province.name')]) !!}<br/>
        {!! Form::submit(trans('message.Submit')) !!}
    {!! Form::close() !!}
@endsection
