@extends('backend.layouts.master')

@section('content')
<!-- Start content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">{{ trans('province.listCalendar') }}</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ trans('province.listCalendar') }}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @if (session('message'))
    <div class="alert alert-success" id="alert">
        {{ session('message') }}
    </div>
    @endif
</div>
<!-- end row -->

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     

        <div class="card mb-3">
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width:50px">{{ trans('province.stt') }}</th>
                            <th>{{ trans('message.lessee_id') }}</th>
                            <th>{{ trans('message.property_id') }}</th>
                            <th style="width:180px">{{ trans('rent_time') }}</th>
                            <th style="width:120px">{{ trans('message.start_date') }}</th>
                            <th>{{ trans('message.end_date') }}</th>
                            <th>{{ trans('message.content') }}</th>
                            <th>{{ trans('message.total_money') }}</th>
                            <th>{{ trans('message.task') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ct as $key => $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->property_id }}</td>
                            <td>{{ $a->date }}</td>
                            <td>{{ $a->time }}</td>
                            <td>{{ $a->time }}</td>
                            <td>{{ $a->time }}</td>
                            <td>{{ $a->time }}</td>
                            <td>{{ $a->time }}</td>
                            <td>{{ $a->time }}</td>
                            <td>
                                <a href="{{ route('detail.calendars', $a->id) }}"><button class="bntshow">{{ trans('message.detail') }}</button></a>
<!--                                 <a href="{{ route('detail.calendars', $a->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                                <a href="{{ route('delete.calendars', $a->id) }}" class="btn btn-danger btn-sm" data-placement="top" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>  
            <!-- end card-body -->                              

        </div>
        <!-- end card -->                   

    </div>
    <!-- end col -->    
</div>
<!-- end row -->

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
                <th>{{ trans('message.task') }}</th>
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
                <td class="tdshow"> <a href="{{ route('detail.contracts', $cr->id) }}"><button class="bntshow">{{ trans('message.detail') }}</button></a>
                </td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $ct->links(); !!}
</div>
@endsection
