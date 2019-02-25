@extends('backend.layouts.master')

@section('content')
    {!! Form::open() !!}
        {!! Form::label('fname', trans('message.Firstname') , ['class' => 'label']) !!}
        {!! Form::text('username', 'firstname', ['class' => 'input', 'placeholder' => trans('message.Firstname')]) !!}      
        {!! Form::text('username2', 'lastname', ['class' => 'input', 'placeholder' => trans('message.Lastname')]) !!}
        {!! Form::label('fname', trans('message.Firstname'), ['class' => 'label']) !!}
        {!! Form::textarea('name') !!}
        {!! Form::label('fname', trans('message.Firstname'), ['class' => 'label']) !!}
        {!! Form::checkbox('name', 'value') !!} <br>
        {!! Form::label('fname', trans('message.Firstname'), ['class' => 'label']) !!}
        {!! Form::checkbox('name', 'value') !!} <br>
        {!! Form::label('fname', trans('message.Firstname'), ['class' => 'label']) !!}
        {!! Form::checkbox('name', 'value') !!} <br>
        {!! Form::label('fname', trans('message.Firstname'), ['class' => 'label']) !!}
        {!! Form::radio('name', 'value', true) !!}
        {!! Form::label('fname', trans('message.Firstname'), ['class' => 'label']) !!}
        {!! Form::radio('name', 'value', true) !!} <br>
        {!! Form::submit(trans('message.Submit')) !!}
        {!! Form::reset(trans('message.Reset')) !!}
    {!! Form::close() !!}
@endsection
