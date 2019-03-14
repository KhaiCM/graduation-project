@extends('fontend.layouts.master')
@section('content')

<!-- User page start -->
<div class="user-page content-area-14">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="user-profile-box mrb">
                    <!--header -->
                    <div class="header clearfix">
                        <h2>{{ 1 }}</h2>
                        <img src="{{ asset(config('fontend.fontend_image.sub_property')) }}" alt="avatar" class="img-fluid profile-img">
                    </div>
                    <!-- Detail -->
                    <div class="detail clearfix">
                        <ul>
                            <li>
                                <a href="#" class="active">
                                    <i class="flaticon-user"></i>{!! __('label.my_profile') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property.show', Auth::user()->id) }}">
                                    <i class="flaticon-house"></i>{!! __('label.my_property') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('property') }}">
                                    <i class="flaticon-add"></i>{!! __('label.submit_new_property') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('user.change_pass', Auth::user()->id) }}">
                                    <i class="flaticon-locked-padlock"></i>{!! __('label.change_password') !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <i class="flaticon-logout"></i>{!! __('Logout') !!}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="my-properties">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('label.name') }}</th>
                                <th>{{ __('label.address') }}</th>
                                <th>{{ __('label.date_added') }}</th>
                                <!-- <th>Views</th> -->
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
                                        <div class="tag price">{{ $property->price }}</div>
                                    </div>
                                </td>
                                <td>{{ $property->created_at }}</td>
                                <!-- <td>421</td> -->
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

