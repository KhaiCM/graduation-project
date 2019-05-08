@extends('backend.layouts.master')

@section('content')

<!-- Start content -->
<div class="container-fluid">



    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">{{ trans('province.listPropertyCategory') }}</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ trans('province.listPropertyCategory') }}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     

        <div class="card mb-3">

            <div class="card-header">
                <span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user"><i class="fa fa-user-plus" aria-hidden="true"></i> {{ trans('province.addPropertyCategory') }}</button></span>
                <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modal_add_user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {{ Form::open(['route' => 'procat.create', 'method' => 'post']) }}            
                            <div class="modal-header">
                                <h5 class="modal-title">{{ trans('label.add_blog_cat') }}</h5>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>             
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            {{ Form::label('name', trans('province.name')) }}<br>
                                            {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => trans('province.name')]) !!}
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
                <!--                         <h3><i class="fa fa-user"></i> All users (4 users)</h3>    -->                          
            </div>
            <!-- end card-header -->    

            <div class="card-body">


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width:50px">{{ trans('province.stt') }}</th>
                            <th>{{ trans('province.name_property_category') }}</th>
                            <th style="width:120px">{{ trans('province.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($propertyCategories as $key => $procat)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $procat->name }}</td>
                                <td>
                                    <a href="{{ route('procat.edit', $procat->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="javascript:deleteRecord_1('1');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <script>
                                        function deleteRecord_1(RecordId)
                                        {
                                            if (confirm('Confirm delete')) {
                                                window.location.href = '';
                                            }
                                        }
                                    </script>
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>  
            <!-- end card-body -->                              

        </div>
        <!-- end card -->                   

    </div>
    <!-- end col -->    

</div>
<!-- end row -->    

</div>
<!-- END container-fluid -->

</div>
<!-- END content -->

<div class="container">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="high">
        <a>{{ trans('province.listPropertyCategory') }}</a>
        <a href="{{ route('procat.create') }}"><button class="button">{{ trans('province.addPropertyCategory') }}</button></a>
    </div>
    <table>
        <tr>
            <th>#</th>
            <th>{{ trans('province.name') }}</th>
            <th colspan="2">{{ trans('province.action') }}</th>
        </tr>
        @foreach ($propertyCategories as $procat)
        <tr>
            <td>{{ $procat->id }}</td>
            <td>{{ $procat->name }}</td>
            <td><a href="{{ route('procat.edit', $procat->id) }}">{{ trans('province.edit') }}</a></td>
            <td><a href="{{ route('procat.destroy', $procat->id) }}">{{ trans('province.delete') }}</a></td>
        </tr>
        @endforeach
    </table>
    {!! $propertyCategories -> links() !!}
</div>
@endsection
