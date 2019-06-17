@extends('fontend.layouts.master')
@section('content')

<!-- User page start -->
<div class="user-page content-area-14">
    <div class="container">
        <div class="row-myproperty">
            <div class="">
                <div class="my-properties">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('label.name_property') }}</th>
                                <th>{{ __('label.property_owner') }}</th>
                                <th>{{ __('label.address') }}</th>
                                <th>{{ __('label.date') }}</th>
                                <th>{{ __('label.time') }}</th>
                                <th>{{ __('label.price') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calendar as $key => $item)
                            <tr>
                                <td>&nbsp;{{ $item->properties->name }}</td>
                                <td>{{ $item->properties->users->name}}</td>
                                <td>
                                    <div class="inner">
                                        <a href="#"><h2></h2></a>
                                        <figure><i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>{{ $item->properties->address}}</figure>
                                    </div>
                                </td>
                                <td>{{ $item->date->format('d/m/Y')}}</td>
                                <td>{{ $item->time}}</td>
                                <td>{{ $item->properties->price}} {{ $item->properties->unit->name ?? '' }}</td>
                                <td class="actions">
                                    <a href="#" class="edit"><i class="fa fa-pencil"></i>{{ __('label.edit') }}</a>
                                    <a href="#"><i class="delete fa fa-trash-o"></i>{{ __('label.delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User page end -->
@endsection
