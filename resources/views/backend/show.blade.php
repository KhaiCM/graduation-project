@extends('backend.layouts.master')

@section('content')

<div class="container">
    <div class="high">
        <a>{{ trans('message.List') }}</a>
        <button class="button">{{ trans('message.ADD') }}</button>
    </div>
    <table>
        <tr>
            <th>{{ trans('message.Firstname') }}</th>
            <th>{{ trans('message.Lastname') }}</th>
            <th>{{ trans('message.age') }}</th>
            <th></th>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
            <td class="tdshow"><button class="bntshow">{{ trans('message.edit') }}</button><button class="bntshow">{{ trans('message.delete') }}</button></td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
            <td class="tdshow"><button class="bntshow">{{ trans('message.edit') }}</button><button class="bntshow">{{ trans('message.delete') }}</button></td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
            <td class="tdshow"><button class="bntshow">{{ trans('message.edit') }}</button><button class="bntshow">{{ trans('message.delete') }}</button></td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
            <td class="tdshow"><button class="bntshow">{{ trans('message.edit') }}</button><button class="bntshow">{{ trans('message.delete') }}</button></td>
        </tr>
    </table> 
</div>
@endsection
