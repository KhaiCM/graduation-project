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
    {!! Form::open(['route' => ['procat.edit', $propertyCategories->id], 'method' => 'post']) !!}
        {!! Form::label('name', trans('province.name') , ['class' => 'label']) !!}
        {!! Form::text('name', $propertyCategories->name, ['class' => 'input', 'placeholder' => trans('province.name')]) !!}<br/>
        {!! Form::submit(trans('message.Submit')) !!}
    {!! Form::close() !!}
@endsection
