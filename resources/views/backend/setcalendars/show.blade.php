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
                            <th>{{ trans('province.property_owner') }}</th>
                            <th>{{ trans('province.person_appointment') }}</th>
                            <th>{{ trans('message.time') }}</th>
                            <th style="width:180px">{{ trans('message.task') }}</th>
                            <!-- <th style="width:120px">{{ trans('province.action') }}</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sc as $key => $a)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $a->properties->users->name }}</td>
                            <td class="name">{{ $a->users->name }}</td>
                            <td>{{ $a->time }}</td>
                            <td>
                                <a href="{{ route('detail.calendars', $a->id) }}"><button class="bntshow">{{ trans('message.detail') }}</button></a>
                                <button type="button" class="btn btn-danger show-modal btn-sm" data-toggle="modal" data-target="#m_modal" data-menu-id="{{ $a->id }}"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $sc->links(); !!}
            </div>  
            <!-- end card-body -->                              

        </div>
        <!-- end card -->                   

    </div>
    <!-- end col -->    
</div>
<!-- end row -->
<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Xóa lịch hẹn xem tài sản của người dùng - <span></span></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route('delete.calendars', ['id' => ''])}}" method="POST">
                    @method('DELETE')   
                    @csrf
                    <button class="btn btn-danger" type="submit">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        var $baseActionDelete = $('#m_modal').find('form').attr('action');
        $('.show-modal').click(function() {
            let $nameOfMenu = $(this).parents('tr').find('.name');
            $nameOfMenu = $nameOfMenu.text();
            $menuID = $(this).data('menu-id')
            $form = $('#m_modal').find('form')
            $form.attr('action', $baseActionDelete + '/' + $menuID);
            $('#m_modal').find('p.modal-title > span').text($nameOfMenu);
        });
    });
</script>
@endsection