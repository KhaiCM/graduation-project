@extends('backend.layouts.master')

@section('content')

<div class="container">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="high">
        <a>{{ trans('province.listPropertyCategory') }}</a>
    <a href="{{ route('procat.create') }}"><button class="button">{{ trans('province.addPropertyCategory') }}</button></a>
    </div>
    <table>
        <tr>
            <th>#</th>
            <th>{{ trans('province.name') }}</th>
            <th colspan="2">{{ trans('province.action') }}</th>
        </tr>
        @foreach ($propertyCategories as $procat)
            <tr>
                <td>{{ $procat->id }}</td>
                <td>{{ $procat->name }}</td>
                <td><a href="{{ route('procat.edit', $procat->id) }}">{{ trans('province.edit') }}</a></td>
                <td><a href="{{ route('procat.destroy', $procat->id) }}">{{ trans('province.delete') }}</a></td>
            </tr>
        @endforeach
    </table>
    {!! $propertyCategories -> links() !!}
</div>
@endsection
