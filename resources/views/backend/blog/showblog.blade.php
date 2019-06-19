@extends('backend.layouts.master')

@section('content')

<!-- Start content -->

<div class="container-fluid">


    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">{{ trans('message.bloglist') }}</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">{{ trans('message.bloglist') }}</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">                     

            <div class="card mb-3">

                <div class="card-header">
                    <span class="pull-right"><a href="{{ route('addblog') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i>{{ trans('message.add') }}</a></span>
                    <!-- <h3><i class="fa fa-file-text-o"></i> All articles (8 articles)</h3>                                 -->
                </div>
                <!-- end card-header -->    
                
                <div class="card-body">

                    <div class="table-responsive">  
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:50px">{{ trans('province.stt') }}</th>
                                <th>{{ trans('label.article_overview') }}</th>
                                <th style="width:160px">{{ trans('message.category_post_id') }}</th>
                                <th>{{ trans('message.status') }}</th>
                                <th style="width:100px">{{ trans('message.task') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bl as $key => $cb)
                            <tr>
                                <td>{{ ++$key }}</td>                           
                                <td>
                                    <span style="float: left; margin-right:10px;"><img alt="image" style="max-width:140px; height:auto;" src="{{ asset(config('app.blog_image')) }}/{{ $cb->image }}" /></span>
                                    <h5  class="name">{{ $cb->title }}</h5>Posted by <b>{{ $cb->User->name }}</b> {{ $cb->created_at }}<br />
                                    <small>{!! $cb->describe !!}</small>
                                </td>
                                
                                <td>{{ $cb->categoryPost->name }}</td>
                                @if($cb->status == 0)
                                <td>{{ trans('label.pending') }}</td>
                                @else
                                <td>{{ trans('label.active')}}</td>
                                @endif
                                <td>
                                    <a href="{{ route('editblog', $cb->id) }}" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>                             
                                    <a href="{{ route('deleteblog', $cb->id) }}" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <button type="button" class="btn btn-danger show-modal btn-sm" data-toggle="modal" data-target="#m_modal" data-menu-id="{{ $cb->id }}"><i class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $bl->links(); !!}
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
<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Xóa tin tức - </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route('deleteblog', ['id' => ''])}}" method="POST">
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
