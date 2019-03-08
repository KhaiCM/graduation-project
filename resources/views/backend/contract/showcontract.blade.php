@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="high">
        <a>{{ trans('message.contract') }}</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>{{ trans('message.id') }}</th>
                <th>{{ trans('message.lessee_id') }}</th>
                <th>{{ trans('message.property_id') }}</th>
                <th>{{ trans('message.rent_time') }}</th>
                <th>{{ trans('message.start_date') }}</th>
                <th>{{ trans('message.end_date') }}</th>
                <th>{{ trans('message.content') }}</th>
                <th>{{ trans('message.total_money') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ct as $cr)
            <tr>
                <td>{{ $cr->id }}</td>
                <td>{{ $cr->lessee_id }}</td>
                <td>{{ $cr->property_id }}</td>
                <td>{{ $cr->rent_time }}</td>
                <td>{{ $cr->start_date }}</td>
                <td>{{ $cr->end_date }}</td>
                <td>{{ $cr->content }}</td>
                <td>{{ $cr->total_money }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ct->links(); !!}
</div>
@endsection
