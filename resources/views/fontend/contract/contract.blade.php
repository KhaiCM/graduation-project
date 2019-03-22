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
                            <h3>{{ $ct->name }}</h3>
                            <p>{{ $ct->describe }}</p>
                            {{ Form::open(['method' => 'POST', route('contracts', $ct->id )]) }}
                            <h3 class="heading">{{ __('label.contract') }}</h3>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.youremail')) }}
                                        {{ Form::text('email', Auth::user()->email, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.leaseemail')) }}
                                        {{ Form::text('email', $ct->users->email ?? '', ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.leasename')) }}
                                        {{ Form::text('email', $ct->users->name ?? '', ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('time', trans('message.startday')) }}<br>
                                        {{ Form::date('date') }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.time')) }}
                                        {{ Form::text('time', null, ['class' => 'form-control', 'placeholder' => __('message.time')]) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.endday')) }}
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('message.endday')]) !!}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.totalmoney')) }}
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('message.totalmoney')]) !!}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.note')) }}<br>
                                        {!! Form::textarea('note') !!}
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
