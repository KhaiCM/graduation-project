@extends('backend.layouts.master')
@section('content')
<div class="container col-md-6 col-md-offset-3">
    <div class="well well bs-component">
        {!! Form::open(['route' => ['user.editRole', $user->id], 'method' => 'POST']) !!}
        @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        <fieldset>
            <legend>{{ __('label.edit_user') }}</legend>
            <div class="form-group">
                {!! Form::label('name', __('label.name')) !!}
                <div class="col-lg-10">
                    {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => __('label.name_role')]) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', __('label.email') , ['class' => 'col-sm-2 col-form-label']) !!}
                <div class="col-lg-10">
                    {!! Form::email('email', $user->email, ['class' => 'form-control', 'id' => 'inputEmail3', 'placeholder' =>__('label.email'), 'readonly' => 'readonly']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="input-group mb-3">
                    {!! Form::label(__('label.role')) !!}
                    @foreach ($role as $item)
                    {!! Form::checkbox('role_id[]', $item->id) !!}
                    {!! Form::label('name', $item->name) !!}
                    @endforeach
                </div>
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
@endsection
