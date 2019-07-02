@extends('backend.layouts.master')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">{{ trans('label.edit_user') }}</h1>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">{{ trans('label.edit_user') }}</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-md-6 col-md-offset-3">
        <div class="well well bs-component">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     
                    <div class="card mb-3">
                        <div class="card-body">
                            {!! Form::open(['route' => ['user.editRole', $user->id], 'method' => 'POST']) !!}
                            <fieldset>
                                <!-- <legend>{{ __('label.edit_user') }}</legend> -->
                                <div class="form-group">
                                    {!! Form::label('name', __('label.name')) !!}
                                    <div class="col-lg-10">
                                        {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => __('label.name_role')]) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', __('label.email')) !!}
                                    <div class="col-lg-10">
                                        {!! Form::email('email', $user->email, ['class' => 'form-control', 'id' => 'inputEmail3', 'placeholder' =>__('label.email'), 'readonly' => 'readonly']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('status', trans('label.role')) }}<span class="text-danger"> *</span><br>
                                    {{ Form::select('role_id', $role->pluck('name', 'id')->reverse(), ($user->role->count() ? $user->role->first()->id : false), ['class' => 'form-control']) }}<br>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        {!! Form::submit(__('label.save'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
                                    </div>
                                </div>
                            </fieldset>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
