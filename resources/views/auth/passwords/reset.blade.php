@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('text.reset') }}</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'register']) !!}
                    <div class="form-group row">
                        {!! Form::label('name', __('text.email'), ['class' => ['col-md-4', 'col-form-label', 'text-md-right']]) !!}

                        <div class="col-md-6">
                            {!! Form::text('name', ['class' => ['form-control', $errors->has('name') ? ' is-invalid' : ''], 'autofocus']) !!}

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('name', __('text.password'), ['class' => ['col-md-4', 'col-form-label', 'text-md-right']]) !!}

                        <div class="col-md-6">
                            {!! Form::password('password', null, ['class' => ['form-control', $errors->has('password') ? ' is-invalid' : '']]) !!}

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('name', __('text.password_cf'), ['class' => ['col-md-4', 'col-form-label', 'text-md-right']]) !!}

                        <div class="col-md-6">
                            {!! Form::password('password-confirm', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                           {!! Form::submit(__('text.reset'), ['class' => 'btn btn-primary']) !!}
                       </div>
                   </div>
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
