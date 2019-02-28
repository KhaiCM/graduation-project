@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="high">
        <a>{{ trans('message.bloglist') }}</a>
        <button class="button">{{ trans('message.add') }}</button>
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
                <td>{{ $cb -> id }}</td>
                <td>{{ $cb -> name }}</td>
                <td class="tdshow"><button class="bntshow">{{ trans('message.edit') }}</button><button class="bntshowdl">{{ trans('message.delete') }}</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $cat->links(); !!}
</div>
@endsection
