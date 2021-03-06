@extends('fontend.layouts.master')
@section('content')
<!-- User page start -->
<div class="user-page content-area-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-area">
                    <div class="search-area-inner">
                        <div class="search-contents ">
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
                            {{ Form::open(['method' => 'PUT', route('myCalendar.update', $sc->id )]) }}
                            <h3 class="heading">{{ __('label.setcalendar') }}</h3>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.propertyname')) }}
                                        {{ Form::text('name', $sc->properties->name, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.day')) }}<br>
                                        {{ Form::date('date', $sc->date) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.time')) }}
                                        {{ Form::text('time', $sc->time, ['class' => 'form-control', 'placeholder' => __('message.time')]) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.phone')) }}
                                        {{ Form::text('phone', $sc->phone, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.email')) }}
                                        {{ Form::text('email', Auth::user()->email, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.note')) }}<br>
                                        {!! Form::textarea('note', $sc->note) !!}
                                    </div>
                                <div class="col-lg-4">
                                    {{ Form::submit(__('label.create'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) }}
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- User page end -->
@endsection
