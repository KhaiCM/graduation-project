@extends('backend.layouts.master')

@section('content')

<!-- Start content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">{{ trans('province.list_property_type') }}</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ trans('province.list_property_type') }}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
@if (session('message'))
<div class="alert alert-success" id="alert">
    {{ session('message') }}
</div>
@endif
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     

        <div class="card mb-3">

            <div class="card-header">
                <span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ trans('province.add_property_type') }}</button></span>
                <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modal_add_user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(['route' => 'protype.store', 'method' => 'post']) }}            
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans('label.add_blog_cat') }}</h5>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>             
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::label('name', trans('province.name')) }}<br>
                                            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => trans('province.name')]) !!}</br>
                                            {{ Form::label('provinces_id', trans('province.province')) }}<br>
                                            {{ Form::select('property_category_id', $propertyCategories->pluck('name', 'id'), null, ['class' => 'form-control']) }}<br>
                                        </div>
                                    </div>
                                </div>             
                            </div>             
                            <div class="modal-footer">
                                {!! Form::submit(trans('message.add'), ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div> 
            </div>
            <!-- end card-header -->    

            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width:50px">{{ trans('province.stt') }}</th>
                            <th>{{ trans('province.name_property_type') }}</th>
                            <th style="width:180px">{{ trans('province.for_property_category') }}</th>
                            <th style="width:120px">{{ trans('province.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($PropertyTypes as $key => $district)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td class="name">{{ $district->name }}</td>
                            <td>{{ $district->propertyCategory->name ?? '' }}</td>
                            <td>
                                <a href="{{ route('protype.edit', $district->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <button type="button" class="btn btn-danger show-modal btn-sm" data-toggle="modal" data-target="#m_modal" data-menu-id="{{ $district->id }}"><i class="fa fa-trash-o"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $PropertyTypes -> links() !!}
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
                <p class="modal-title">Xóa kiểu tài sản - </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route('protype.destroy', ['id' => ''])}}" method="POST">
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
            console.log($nameOfMenu);
            $nameOfMenu = $nameOfMenu.text();
            console.log($nameOfMenu);
            $menuID = $(this).data('menu-id')
            $form = $('#m_modal').find('form')
            $form.attr('action', $baseActionDelete + '/' + $menuID);
            $modalContent = $('#m_modal').find('p.modal-title');
            $modalContent.children().remove();
            $modalContent.append('<span class="m--font-danger">' + $nameOfMenu + '</span>')
        });
    });
</script>
@endsection


