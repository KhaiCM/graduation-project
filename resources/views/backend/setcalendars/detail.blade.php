@extends('backend.layouts.master')

@section('content')

<h1>{{ trans('message.detail') }}</h1>

    {{ Form::open() }}
        {{ Form::label('title', trans('message.sender') , ['class' => 'label']) }}<br>
        {{ Form::text('title', $sc->email, ['class' => 'input', 'readonly' => 'true']) }}<br>

        {{ Form::label('title', trans('message.propertyname') , ['class' => 'label']) }}<br>
        {{ Form::text('title', $sc->properties->name  ?? '', ['class' => 'input', 'readonly' => 'true']) }}<br>

        {{ Form::label('title', trans('message.owner') , ['class' => 'label']) }}<br>
        {{ Form::text('title', $sc->properties->users->name, ['class' => 'input', 'readonly' => 'true']) }}<br>

        {{ Form::label('title', trans('message.owneremail') , ['class' => 'label']) }}<br>
        {{ Form::text('title', $sc->properties->users->email, ['class' => 'input', 'readonly' => 'true']) }}<br>

        {{ Form::label('title', trans('message.phone') , ['class' => 'label']) }}<br>
        {{ Form::text('title', $sc->phone, ['class' => 'input', 'readonly' => 'true']) }}<br>

        {{ Form::label('title', trans('message.date') , ['class' => 'label']) }}<br>
        {{ Form::text('title', "$sc->date", ['class' => 'input', 'readonly' => 'true']) }}<br>

        {{ Form::label('title', trans('message.time') , ['class' => 'label']) }}<br>
        {{ Form::text('title', $sc->time, ['class' => 'input', 'readonly' => 'true']) }}<br>

        {{ Form::label('status', trans('message.status'), ['class' => 'label']) }}<br>
        {{ Form::textarea('status', $sc->note, ['readonly' => 'true']) }}<br>
       
        {{ Form::close() }}

@endsection
