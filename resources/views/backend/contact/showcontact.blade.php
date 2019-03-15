@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="high">
        <a>{{ trans('message.contact') }}</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>{{ trans('message.id') }}</th>
                <th>{{ trans('message.title') }}</th>
                <th>{{ trans('message.email') }}</th>
                <th>{{ trans('message.task') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ct as $cts)
            <tr>
                <td>{{ $cts->id }}</td>
                <td>{{ $cts->title }}</td>
                <td>{{ $cts->email }}</td>
                <td class="tdshow"><a href="{{ route('deletecontact', $cts->id) }}"><button class="bntshowdl">{{ trans('message.delete') }}</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ct->links(); !!}
</div>
@endsection
