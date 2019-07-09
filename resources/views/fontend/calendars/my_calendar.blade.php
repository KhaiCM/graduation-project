@extends('fontend.layouts.master')
@section('content')

<!-- User page start -->
<div class="user-page content-area-14">
    <div class="container">
        <div class="row-myproperty">
            <div class="">
                <div class="my-properties">
                    @if (session('noti'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('label.name_property') }}</th>
                                <th>{{ __('label.property_owner') }}</th>
                                <th>{{ __('label.address') }}</th>
                                <th>{{ __('label.date') }}</th>
                                <th>{{ __('label.time') }}</th>
                                <th>{{ __('label.price') }}</th>
                                <th>{{ __('label.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($calendar as $key => $item)
                            <tr>
                                <td class="name">&nbsp;{{ $item->properties->name }}</td>
                                <td>{{ $item->properties->users->name}}</td>
                                <td>
                                    <div class="inner">
                                        <a href="#"><h2></h2></a>
                                        <figure><i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i>{{ $item->properties->address}}</figure>
                                    </div>
                                </td>
                                <td>{{ $item->date->format('d/m/Y')}}</td>
                                <td>{{ $item->time}}</td>
                                <td>{{ $item->properties->price}} {{ $item->properties->unit->name ?? '' }}</td>
                                <td class="actions">
                                    <a href="{{ route('myCalendar.edit', $item->id) }}" class="edit"><i class="fa fa-pencil"></i>{{ __('label.edit') }}</a>
                                    <button type="button" data-toggle="modal" data-target="#m_modal" data-menu-id="{{ $item->id }}" class="show-modal">
                                        <i class="fa fa-trash-o">{{ __('label.delete') }}</i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- User page end -->
<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Xóa lịch hẹn xem tài sản - <span></span></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <form action="{{ route('myCalendar.destroy', ['id' => ''])}}" method="POST">
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
