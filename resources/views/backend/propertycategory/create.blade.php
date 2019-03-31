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
    {{ Form::open(['route' => 'procat.create', 'method' => 'post']) }}
        {{ Form::label('name', trans('province.name'), ['class' => 'label']) }}<br>
        {{ Form::text('name', null, ['class' => 'input', 'placeholder' => trans('province.name')]) }}<br/>
        {{ Form::submit(trans('message.Submit')) }}
    {{ Form::close() }}
@endsection
