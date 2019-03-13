@extends('backend.layouts.master')

@section('content')
    <h1>{{ trans('message.editpost') }}</h1>
    <a>{{ $bl->name }}</a>
    {!! Form::open(['method' => 'POST', route('editblog', $bl->id )]) !!}
        {!! Form::label('title', trans('message.title') , ['class' => 'label']) !!}<br>
        {!! Form::text('title', "$bl->title", ['class' => 'input']) !!}<br><br>

        {!! Form::label('status', trans('message.status'), ['class' => 'label']) !!}<br>
        {!! Form::file('image', ['class' => 'label'])!!}<br><br>

        {!! Form::label('describe', trans('message.describe'), ['class' => 'label']) !!}<br>
        {!! Form::textarea('describe', "$bl->describe") !!}<br>

        {!! Form::label('content', trans('message.content'), ['class' => 'label']) !!}<br>
        {!! Form::textarea('content', "$bl->content", ['id' => 'editor1']) !!}<br>
        
        {!! Form::label('slug', trans('message.slug') , ['class' => 'label']) !!}<br>
        {!! Form::text('slug', "$bl->slug", ['class' => 'input', 'placeholder' => trans('message.name')]) !!}<br>
        
        {!! Form::label('status', trans('message.status'), ['class' => 'label']) !!}<br>
        {!! Form::textarea('status', "$bl->status") !!}<br>

        {!! Form::label('', trans('message.cate') , ['class' => 'label']) !!}<br>
        {!! Form::select('category_post_id', $cat->pluck('name', 'id'), null, ['placeholder' => trans('message.cate')]) !!}<br>

        {!! Form::submit(trans('message.add')) !!}
        {!! Form::reset(trans('message.Reset')) !!}
    {!! Form::close() !!}
@endsection

