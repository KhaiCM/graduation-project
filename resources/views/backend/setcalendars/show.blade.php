@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="high">
        <a>{{ trans('message.setcalendar') }}</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>{{ trans('message.id') }}</th>
                <th>{{ trans('message.property') }}</th>
                <th>{{ trans('message.date') }}</th>
                <th>{{ trans('message.time') }}</th>
                <th>{{ trans('message.phone') }}</th>
                <th>{{ trans('message.email') }}</th>
                <th>{{ trans('message.note') }}</th>
                <th>{{ trans('message.task') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sc as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->property_id }}</td>
                <td>{{ $a->date }}</td>
                <td>{{ $a->time }}</td>
                <td>{{ $a->phone }}</td>
                <td>{{ $a->email }}</td>
                <td>{{ $a->note }}</td>
                <td class="tdshow"><a href="{{ route('deletecalendar', $a->id) }}"><button class="bntshowdl">{{ trans('message.delete') }}</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $sc->links(); !!}
</div>
@endsection
