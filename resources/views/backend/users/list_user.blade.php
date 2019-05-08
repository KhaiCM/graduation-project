@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">


    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">{{ trans('label.blog_cat') }}</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ trans('message.blogcate') }}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>{{ __('label.all_user') }}</h2>
        </div>
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
        @if ($user->isEmpty())
        <p>{{ __('label.no_user') }}</p>
        @else
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('label.stt') }}</th>
                    <th>{{ __('label.name') }}</th>
                    <th>{{ __('label.email') }}</th>
                    <th>{{ __('label.join_at') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user as $key => $item)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <a href="{{ route('user.edit', $item->id) }}">{{ $item->name }}</a>
                    </td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
