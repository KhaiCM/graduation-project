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
                                <th>{{ __('label.name') }}</th>
                                <th>{{ __('label.address') }}</th>
                                <th>{{ __('label.form') }}</th>
                                <th>{{ __('label.acreage') }}</th>
                                <th>{{ __('label.price') }}</th>
                                <th>{{ __('label.date_added') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                            <tr>
                                <td class="image">
                                    <a href="#"><img alt="my-properties-3" src="{{ asset(config('app.property_path') . $property->propertyImage()->value('link')) }}" class="img-fluid"></a>
                                </td>
                                <td>
                                    <div class="inner">
                                        <a href="#"><h2></h2></a>
                                        <figure><i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>{{ $property->address }}</figure>
                                    </div>
                                </td>
                                <td>{{ $property->form }}</td>
                                <td>{{ $property->acreage }} m2</td>
                                <td>{{ $property->price }} {{ $property->unit->name ?? '' }}</td>
                                <td>{{ $property->created_at->format('d/m/Y') }}</td>
                                <td class="actions">
                                    <a href="{{ route('property.edit', $property->id) }}" class="edit"><i class="fa fa-pencil"></i>{{ __('label.edit') }}</a>
                                    <a href="{{ route('property.delete', $property->id) }}"><i class="delete fa fa-trash-o"></i>{{ __('label.delete') }}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</div>
<!-- User page end -->
@endsection
