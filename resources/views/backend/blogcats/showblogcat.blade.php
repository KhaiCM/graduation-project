@extends('backend.layouts.master')

@section('content')

<!-- Start content -->

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
    <!-- end row -->
    @if (session('noti'))
    <div class="alert alert-success" id="alert">
        {{ session('noti') }}
    </div>
    @endif
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     

            <div class="card mb-3">

                <div class="card-header">
                    <span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-plus" aria-hidden="true"></i>{{ trans('message.add') }}</button></span>
                    <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modal_add_category">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                {!! Form::open(['method' => 'POST', 'url' => 'admin/blogcat/addblogcat']) !!}            
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ trans('label.add_blog_cat') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>             
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                {!! Form::label('name', trans('label.name_blog_cat')) !!}<br>
                                                {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => trans('message.name')]) !!}<br>
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
                    <!-- <h3><i class="fa fa-sitemap"></i> All categories </h3>                                 -->
                </div>
                <!-- end card-header -->    

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width:50px">{{ trans('province.stt') }}</th>
                            <th>{{ trans('label.name_blog_cat') }}</th>
                            <th style="width:150px">số bài viết của thẻ loại chưa lm </th>
                            <th style="width:120px">{{ trans('message.task') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cat as $key => $cb)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $cb->name }}</td>
                            <td>2</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_category_10"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modal_edit_category_10">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="post">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit category</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>             
                                                </div>

                                                <div class="modal-body">                

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Category title (required)</label>
                                                                <input class="form-control" name="title" type="text" value="Blog" required />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label>Description (optional)</label>
                                                                <textarea class="form-control" name="description" rows="5">Our blog articles</textarea>
                                                            </div>
                                                        </div>  
                                                    </div>

                                                    <div class="row">                                   
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label>Active</label>
                                                                <select name="active" class="form-control">
                                                                    <option selected="selected" value="1">YES</option>
                                                                    <option  value="0">NO</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>             

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary">Edit category</button>
                                                </div>

                                            </form> 

                                        </div>
                                    </div>
                                </div> 
                                <a href="javascript:deleteRecord_10('10');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                <script>
                                    function deleteRecord_10(RecordId)
                                    {
                                        if (confirm('Confirm delete')) {
                                            window.location.href = '#';
                                        }
                                    }
                                </script>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $cat->links() }}   
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

