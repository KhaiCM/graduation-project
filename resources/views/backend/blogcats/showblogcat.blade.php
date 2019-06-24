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
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-primary btn-sm" type="submit">Search</button>
                  </form>
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
                        <td class="name">{{ $cb->name }}</td>
                        <td>2</td>
                        <td>
                            <a href="{{ route('editblogcat', $cb->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-danger show-modal btn-sm" data-toggle="modal" data-target="#m_modal" data-menu-id="{{ $cb->id }}"><i class="fa fa-trash-o"></i></button>
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
<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Xóa loại tin tức - </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route('deleteblogcat', ['id' => ''])}}" method="POST">
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

