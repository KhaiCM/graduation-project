@extends('backend.layouts.master')
@section('content')
<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        {!! Form::open(['route' => 'property.create', 'method' => 'POST', 'files' => true]) !!}
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <fieldset>
            <legend>{{  __('label.property_title') }}</legend>
            <div class="form-group">
                {!! Form::label('name', __('label.property_title')) !!} 
                <div class="col-lg-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('label.property_title')]) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::submit(__('label.create'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
                </div>
            </div>
        </fieldset>
        {{ Form::close() }}
    </div>
</div>
<div class="container col-md-8 col-md-offset-2">
    <div class="well well bs-component">
        {!! Form::open(['route' => 'property.create', 'method' => 'POST', 'files' => true]) !!}
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <fieldset>
            <legend>{{  __('label.property_title') }}</legend>
            <div class="form-group">
                {!! Form::label('name', __('label.property_title')) !!} 
                <div class="col-lg-10">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('label.property_title')]) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {!! Form::submit(__('label.create'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
                </div>
            </div>
        </fieldset>
        {{ Form::close() }}
    </div>
</div>
<form>
    <h2>{{  __('label.property_title') }}</h2>
    <div class="form-group">
        {!! Form::label(__('label.property_category')) !!}
        {!! Form::select('province_id', [], '', ['class' => 'selectpicker search-fields']) !!}
    </div>
    <div class="input-group mb-3">
        {!! Form::checkbox('hobbies', 'value', true) !!}
        {!! Form::label('name', __('label.property_title')) !!}
        {!! Form::checkbox('hobbies', 'value', true) !!}
        {!! Form::label('name', __('label.property_title')) !!}
        {!! Form::checkbox('hobbies', 'value', true) !!}
        {!! Form::label('name', __('label.property_title')) !!}
        {!! Form::checkbox('hobbies', 'value', true) !!}
        {!! Form::label('name', __('label.property_title')) !!}
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            {!! Form::submit(__('label.create'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
        </div>
    </div>
</form>
@endsection
