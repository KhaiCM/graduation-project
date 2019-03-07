@extends('fontend.layouts.master')
@section('content')
<!-- Sub banner 2 start -->
<div class="sub-banner-2">
    <div class="container">
        <div class="breadcrumb-area">
            <h1>{{ __('label.submit_property') }}</h1>
            <ul class="breadcrumbs">
                <li><a href="#">{{ __('label.home') }}</a></li>
                <li class="active">{{ __('label.submit_property') }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner 2 end -->
<!-- User page start -->
<div class="user-page content-area-7">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="search-area">
                    <div class="search-area-inner">
                        <div class="search-contents ">
                            {!! Form::open(['method' => 'POST']) !!}
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
                                        {!! Form::select('province', $provinces, '', ['class' => 'selectpicker search-fields', 'id' => 'province']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.property_category')) !!}
                                        {!! Form::select('form', $propertyCategorys, '', ['class' => 'selectpicker search-fields', 'id' => 'property_category']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.district')) !!}
                                        {!! Form::select('property_type_id', $districts, '', ['class' => 'selectpicker search-fields', 'id' => 'district']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.property_type')) !!}
                                        {!! Form::select('property_type_id', $propertyTypes, '', ['class' => 'selectpicker search-fields', 'id' => 'property_type']) !!}
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
                                        {!! Form::select('property_type_id', [0 => 'sale', 1 => 'rent'], '', ['class' => 'selectpicker search-fields']) !!}
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
                                        {!! Form::select('unit', [0 => 'trăm nghìn/tháng', 1 => 'triệu/tháng'], '', ['class' => 'selectpicker search-fields']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label(__('label.acreage')) !!}
                                        {!! Form::text('acreage', null, ['class' => 'form-control', 'placeholder' => __('label.acreage')]) !!}
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
                            <div class="row mb-50">
                                <div class="col-lg-12">
                                    <div id="myDropZone" class="dropzone dropzone-design mb-50">
                                        <div class="dz-default dz-message"><span>{{ __('label.drop_files_here_to_upload') }}</span></div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="heading">{!! Form::label(__('label.contact_detail')) !!}</h3>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label(__('label.name')) !!}
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('label.name')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label(__('label.email')) !!}
                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('label.email')]) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        {!! Form::label(__('label.phone')) !!}
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('label.phone')]) !!}
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

