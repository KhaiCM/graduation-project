@extends('backend.layouts.master')

@section('content')

<div class="container">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="high">
        <a>{{ trans('province.listDistrict') }}</a>
    <a href="{{ route('district.create') }}"><button class="button">{{ trans('province.addDistrict') }}</button></a>
    </div>
    <table>
        <tr>
            <th>#</th>
            <th>{{ trans('province.name') }}</th>
            <th>{{ trans('province.for') }}</th>
            <th colspan="2">{{ trans('province.action') }}</th>
        </tr>
        @foreach ($districts as $district)
            <tr>
                <td>{{ $district->id }}</td>
                <td>{{ $district->name }}</td>
                <td>{{ $district->provinces->name ?? '' }}</td>
                <td><a href="{{ route('district.edit', $district->id) }}">{{ trans('province.edit') }}</a></td>
                <td><a href="{{ route('district.destroy', $district->id) }}">{{ trans('province.delete') }}</a></td>
            </tr>
        @endforeach
    </table>
    {!! $districts -> links() !!}
</div>
@endsection
