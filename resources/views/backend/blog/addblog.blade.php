@extends('backend.layouts.master')

@section('content')
    <h1>{{ trans('message.addblog') }}</h1>

    {!! Form::open(['method' => 'POST', 'url' => 'admin/blog/addblog', 'files' => true]) !!}
        {!! Form::label('title', trans('message.title') , ['class' => 'label']) !!}<br>
        {!! Form::text('title', '', ['class' => 'input', 'placeholder' => trans('message.title')]) !!}<br><br>

        {!! Form::label('status', trans('message.status'), ['class' => 'label']) !!}<br>
        {!! Form::file('file', ['class' => 'label']) !!}<br><br>

        {!! Form::label('describe', trans('message.describe'), ['class' => 'label']) !!}<br>
        {!! Form::textarea('describe') !!}<br>

        {!! Form::label('content', trans('message.content'), ['class' => 'label']) !!}<br>
        {!! Form::textarea('content', null, ['id' => 'editor1']) !!}<br>
        
        {!! Form::label('slug', trans('message.slug') , ['class' => 'label']) !!}<br>
        {!! Form::text('slug', '', ['class' => 'input']) !!}<br>
        
        {!! Form::label('status', trans('message.status'), ['class' => 'label']) !!}<br>
        {!! Form::textarea('status') !!}<br>

        {!! Form::label('cat', trans('message.name') , ['class' => 'label']) !!}<br>
        {!! Form::select('category_post_id', $cat->pluck('name', 'id'), null, ['placeholder' => trans('message.cate')]) !!}<br>

        {!! Form::submit(trans('message.add')) !!}
        {!! Form::reset(trans('message.Reset')) !!}
    {!! Form::close() !!}
@endsection

