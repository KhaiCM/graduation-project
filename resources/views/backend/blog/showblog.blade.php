@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="high">
        <a>{{ trans('message.bloglist') }}</a>
        <a href="{{ route('addblog') }}"><button class="button">{{ trans('message.add') }}</button></a>
    </div>
    <table>
        <thead>
            <tr>
                <th>{{ trans('message.id') }}</th>
                <th>{{ trans('message.title') }}</th>
                <th>{{ trans('message.describe') }}</th>
                <th>{{ trans('message.slug') }}</th>
                <th>{{ trans('message.status') }}</th>
                <th>{{ trans('message.category_post_id') }}</th>
                <th>{{ trans('message.task') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($bl as $cb)
            <tr>
                <td>{{ $cb->id }}</td>
                <td>{{ $cb->title }}<br>
                <div><img class="imgblog" src="{{ asset(config('app.blog_image')) }}/{{ $cb->image }}"/></td></div>
                <td>{{ $cb->describe }}</td>
                <td>{{ $cb->slug }}</td>
                <td>{{ $cb->status }}</td>
                <td>{{ $cb->categoryPost['name'] }}</td>
                <td class="tdshow"><a href="{{ route('editblog', $cb->id) }}"><button class="bntshow">{{ trans('message.edit') }}</button></a>
                <a href="{{ route('deleteblog', $cb->id) }}"><button class="bntshowdl">{{ trans('message.delete') }}</button></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $bl->links(); !!}
</div>
@endsection
