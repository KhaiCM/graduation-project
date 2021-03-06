@extends('backend.layouts.master')

@section('content')

<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="breadcrumb-holder">
                    <h1 class="main-title float-left">{{ trans('message.addblog') }}</h1>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @if (session('noti'))
        <div class="alert alert-success">
            {{ session('noti') }}
        </div>
        @endif
        <!-- end row -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     
                <div class="card mb-3">
                    <div class="card-body">
                        {{ Form::open(['method' => 'POST', 'url' => 'admin/blog/addblog', 'files' => true]) }}

                        <div class="form-group">
                            {{ Form::label('title', trans('message.title')) }}
                            <span class="text-danger">*</span>
                            @if ($errors->first('title'))
                            <span class="text-danger">{{$errors->first('title')}}</span>
                            @endif
                            {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => trans('message.title')]) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('describe', trans('message.describe')) }}
                            <span class="text-danger">*</span>
                            @if ($errors->first('describe'))
                            <span class="text-danger">{{$errors->first('describe')}}</span>
                            @endif
                            {{ Form::textarea('describe', '', ['class' => 'form-control', 'id' => 'editor1']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('content', trans('message.content')) }}
                            <span class="text-danger">*</span>
                            @if ($errors->first('content'))
                            <span class="text-danger">{{$errors->first('content')}}</span>
                            @endif
                            {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'editor2']) !!}
                        </div>

                        <div class="form-group">
                            <div class="format-image">
                                <img id="preview" class="thumb"></br>
                            </div>
                            {{ Form::label('file', trans('message.image')) }}<span class="text-danger">*</span></br>
                            @if ($errors->first('file'))
                            <span class="text-danger">{{$errors->first('file')}}</span></br>
                            @endif
                            {{ Form::file('file', ['onchange' => 'encodeImageFileAsURL(this)']) }}<br> 
                        </div>

                        <div class="form-group">
                            {{ Form::label('status', trans('message.status')) }}<span class="text-danger">*</span><br>
                            {{ Form::select('status', [0 => 'pending', 1 => 'active'], '', ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('cat', trans('message.blogcat')) }}<span class="text-danger">*</span><br>
                            {{ Form::select('category_post_id', $cat->pluck('name', 'id'), null, ['class' => 'form-control']) }}<br>   
                        </div>
                        <div class="form-group">
                            {{ Form::submit(trans('message.add'), ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div>  
                    <!-- end card-body -->                              
                </div>
                <!-- end card -->                   
            </div>
            <!-- end col -->   
        </div>
        <!-- end row -->    
    </div>
    <!-- END container-fluid -->
    @endsection
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            var reader = new FileReader();
            reader.onloadend = function() {
                $('#preview').attr('src', reader.result);
            }
            reader.readAsDataURL(file);
        }
    </script>

