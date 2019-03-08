@extends('backend.layouts.master')

@section('content')
    {!! Form::open(['method' => 'POST', route('editblogcat',$cat->id )]) !!}
        {!! Form::label('name', trans('message.name') , ['class' => 'label']) !!}<br>
        {!! Form::text('name', '', ['class' => 'input', 'placeholder' => trans('message.name')]) !!}<br>
        {!! Form::submit(trans('message.add')) !!}
        {!! Form::reset(trans('message.Reset')) !!}
    {!! Form::close() !!}
@endsection