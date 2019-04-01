@extends('backend.layouts.master')
@section('content')
<div>
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            {!! Form::open(['route' => 'role.create', 'method' => 'POST']) !!}
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-10">
                        {!! Form::label('name', __('label.create_role')) !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('label.name_role')]) !!}
                        {!! Form::submit(__('label.create'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
                    </div>
                </div>
            </fieldset>
            {{ Form::close() }}
        </div>
    </div>
    <div class="container col-md-8 col-md-offset-2">
        <div class="well well bs-component">
            {!! Form::open(['route' => 'permission.create', 'method' => 'POST']) !!}
            <fieldset>
                <div class="form-group">
                    <div class="col-lg-10">
                       {!! Form::label('name', __('label.create_permission')) !!}
                       {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('label.name_permission')]) !!}
                       {!! Form::submit(__('label.create'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
                   </div>
               </div>
           </fieldset>
           {{ Form::close() }}
       </div>
   </div>
</div>
{!! Form::open(['route' => 'permission.set', 'method' => 'POST']) !!}
    <h2>{{  __('label.select_permission_with_role') }}</h2>
    <div class="form-group">
        {!! Form::label(__('label.role')) !!}
        {!! Form::select('role_id', $role->pluck('name', 'id'), '', ['class' => 'selectpicker search-fields']) !!}
    </div>
    <div class="input-group mb-3">
        {!! Form::label(__('label.role')) !!}
        @foreach ($permission as $item)
        {!! Form::checkbox('permission_id[]', $item->id) !!}
        {!! Form::label('name', $item->name) !!}
        @endforeach
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            {!! Form::submit(__('label.save'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
        </div>
    </div>
{{ Form::close() }}
@endsection
