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
                            {!! Form::open(['route' => 'property.create', 'method' => 'POST', 'files' => true]) !!}
                            <h3 class="heading">{{ __('label.basic_information') }}</h3>
                            <div class="row">
                                <div class="col-lg-12 ">
                                    <div class="form-group name">
                                        {!! Form::label('name', __('label.property_title')) !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('label.property_title')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.province')) !!}
                                        {!! Form::select('province_id', $province->pluck('name', 'id'), '', ['class' => 'selectpicker search-fields', 'id' => 'province']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.property_category')) !!}
                                        {!! Form::select('property_category_id', $propertyCategory->pluck('name', 'id'), '', ['class' => 'selectpicker search-fields', 'id' => 'property_category']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.district')) !!}
                                        {!! Form::select('district_id', $district->pluck('name', 'id'), '', ['class' => 'selectpicker search-fields', 'id' => 'district']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.property_type')) !!}
                                        {!! Form::select('property_type_id', $propertyType->pluck('name', 'id'), '', ['class' => 'selectpicker search-fields', 'id' => 'property_type']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.address')) !!}
                                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('label.address')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.form')) !!}
                                        {!! Form::select('form', [1 => 'sale', 1 => 'rent'], '', ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label(__('label.price')) }}
                                        {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => __('label.property_title')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.unit')) !!}
                                        {!! Form::select('unit_id', $unit->pluck('name', 'id'), '', ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.acreage')) !!}
                                        {!! Form::text('acreage', null, ['class' => 'form-control', 'placeholder' => __('label.acreage')]) !!}
                                        <span>m2</span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group message">
                                        {!! Form::label(__('label.describe')) !!}
                                        {!! Form::textarea('describe', '', ['class' => 'form-control', 'id' =>'editor1', 'placeholder' => __('label.detailed_nformation')]) !!}
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading">{!! Form::label('name', __('label.property_image')) !!}</h3>
                            <div class="form-group">
                                {{ Form::file('file[]', ['multiple' => true, 'id' => 'exampleInputFile']) }}
                            </div>
                            <div class="form-group" id="image">
                                <div class="col-md-12">
                                </div>
                            </div>
                            <h3 class="heading">{!! Form::label(__('label.contact_detail')) !!}</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label(__('label.name')) !!}
                                        {!! Form::text('name_user', $user->name, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => __('label.name')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label(__('label.email')) !!}
                                        {!! Form::text('email', $user->email, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => __('label.email')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label(__('label.phone')) !!}
                                        {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'readonly' => 'readonly', 'placeholder' => __('label.phone')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    {!! Form::submit(__('label.create'), ['class' => 'btn btn-md btn-color', 'name' => 'submit']) !!}
                                </div>
                            </div>
                        </form>
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
