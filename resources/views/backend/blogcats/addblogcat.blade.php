@extends('backend.layouts.master')

@section('content')
<h2>{{ trans('message.addcat') }}</h2>
    @if (count($errors) > 0)
        <div>
            @foreach ($errors -> all() as $err)
            {{$err}}
            @endforeach
        <div>
    @endif

    @if (session('noti'))
        <div>
            {{session('noti')}}
        <div>
    @endif

    {!! Form::open(['method' => 'POST', 'url' => 'addblogcat']) !!}
        {!! Form::label('name', trans('message.name') , ['class' => 'label']) !!}<br>
        {!! Form::text('name', '', ['class' => 'input', 'placeholder' => trans('message.name')]) !!}<br>
        {!! Form::submit(trans('message.add')) !!}
        {!! Form::reset(trans('message.Reset')) !!}
    {!! Form::close() !!}
@endsection
