@extends('backend.layouts.master')

@section('content')
{{ Form::open() }}
    <h1 class="cen">{{ __('label.contract') }}</h1>

    {{ Form::label('email', trans('message.yourname')) }}<br>
    {{ Form::text('email1', $ct->users->name  ?? '', ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('email', trans('message.youremail')) }}<br>
    {{ Form::text('name', $ct->users->email  ?? '', ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('email', trans('message.leasename')) }}<br>
    {{ Form::text('email1', $ct->users->name  ?? '', ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('email', trans('message.leaseemail')) }}<br>
    {{ Form::text('name', $ct->users->email  ?? '', ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('time', trans('message.startday')) }}<br>
    {{ Form::text('start_date', $ct->start_date, ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('content', trans('message.time')) }}<br>
    {{ Form::text('rent_time', $ct->rent_time, ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('content', trans('message.endday')) }}<br>
    {{ Form::text('end_date', $ct->end_date, ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('content', trans('message.price')) }}<br>
    {{ Form::text('time', $ct->properties->price, ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('content', trans('message.unit')) }}<br>
    {{ Form::text('time', $ct->properties->unit->name, ['class' => 'form-control', 'readonly' => 'true']) }}<br>

    {{ Form::label('content', trans('message.totalmoney')) }}<br>
    {!! Form::text('total_money', $ct->total_money, ['class' => 'form-control', 'readonly' => 'true']) !!}<br>

    {{ Form::label('content', trans('message.note')) }}<br>
    {!! Form::textarea('content', $ct->content) !!}<br>

{{ Form::close() }}
@endsection
