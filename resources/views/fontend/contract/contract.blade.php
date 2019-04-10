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
                            {{ Form::open(['method' => 'POST', route('contracts', $ct->id )]) }}
                            <h3 class="heading">{{ __('label.contract') }}</h3>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.yourname')) }}
                                        {{ Form::text('lessee_id', $ct->name, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.yourname')) }}
                                        {{ Form::text('lessee_id', Auth::user()->name, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::hidden('lessee_id', Auth::user()->id, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::hidden('property_id', $ct->id, ['class' => 'form-control']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.youremail')) }}
                                        {{ Form::text('email1', Auth::user()->email, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.leasename')) }}
                                        {{ Form::text('email', $ct->users->name ?? '', ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('email', trans('message.leaseemail')) }}
                                        {{ Form::text('email', $ct->users->email ?? '', ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('time', trans('message.startday')) }}<br>
                                        {{ Form::date('start_date') }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.time')) }}
                                        {{ Form::text('rent_time', null, ['class' => 'form-control', 'placeholder' => __('message.time')]) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.endday')) }}<br>
                                        {{ Form::date('end_date') }}                                    
                                        </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.price')) }}
                                        {{ Form::text('time', $ct->price, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.unit')) }}
                                        {{ Form::text('time', $ct->unit->name, ['class' => 'form-control', 'readonly' => 'true']) }}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.totalmoney')) }}
                                        {!! Form::text('total_money', null, ['class' => 'form-control', 'placeholder' => __('message.totalmoney')]) !!}
                                    </div>
                                    <div class="form-group name">
                                        {{ Form::label('content', trans('message.note')) }}<br>
                                        {!! Form::textarea('content') !!}
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
