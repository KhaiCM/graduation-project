@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="high">
        <a>{{ trans('message.blogcate') }}</a>
        <a href="{{ route('addblogcat') }}"><button class="button">{{ trans('message.add') }}</button></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>{{ trans('message.id') }}</th>
                <th>{{ trans('message.name') }}</th>
                <th>{{ trans('message.task') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cat as $cb)
            <tr>
                <td>{{ $cb->id }}</td>
                <td>{{ $cb->name }}</td>
                <td class="tdshow"><a href="{{ route('editblogcat', $cb->id) }}"><button class="bntshow">{{ trans('message.edit') }}</button></a>
                <a href="{{ route('deleteblogcat', $cb->id) }}"><button class="bntshowdl">{{ trans('message.delete') }}</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cat->links() }}
</div>
@endsection
