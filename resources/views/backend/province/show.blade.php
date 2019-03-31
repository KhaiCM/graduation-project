@extends('backend.layouts.master')

@section('content')

<div class="container">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="high">
        <a>{{ trans('province.listProvince') }}</a>
    <a href="{{ route('province.create') }}"><button class="button">{{ trans('province.addProvince') }}</button></a>
    </div>
    <table>
        <tr>
            <th>{{ trans('province.stt') }}</th>
            <th>{{ trans('province.name') }}</th>
            <th colspan="2">{{ trans('province.action') }}</th>
        </tr>
        @foreach ($provinces as $key => $province)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $province->name }}</td>
                <td><a href="{{ route('province.edit', $province->id) }}">{{ trans('province.edit') }}</a></td>
                <td><a href="{{ route('province.destroy', $province->id) }}">{{ trans('province.delete') }}</a></td>
            </tr>
        @endforeach
    </table>
    {!! $provinces -> links() !!}
</div>
@endsection
