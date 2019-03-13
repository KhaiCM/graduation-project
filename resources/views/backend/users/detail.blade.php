@extends('backend.layouts.master')
@section('content')
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
{{ Form::open(['route' => ['user.update', $user->id], 'method' => 'PUT', 'files' => true]) }}
<div class="form-group row">
    {!! Form::label('name', __('label.name') , ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => __('label.name')]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('email', __('label.email') , ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::email('email', $user->email, ['class' => 'form-control', 'id' => 'inputEmail3', 'placeholder' =>
        __('label.email'), 'readonly' => 'readonly']) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('phone', __('label.phone') , ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'id' => 'inputEmail3', 'placeholder' =>
        __('label.phone')]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('address', __('label.address') , ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('address', $user->address, ['class' => 'form-control', 'id' => 'inputEmail3', 'placeholder' =>
        __('label.address')]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('avatar', __('label.avatar'), ['class' => 'col-sm-2 col-form-label']) !!}
    <div class="col-sm-10">
	{{ Form::file('file', ['class' => 'form-control', 'id' => 'inputEmail3']) }}
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10">
        {!! Form::submit(__('label.changes'), ['class' => 'btn btn-primary float-right']) !!}
    </div>
</div>
{!! Form::close() !!}
@endsection
