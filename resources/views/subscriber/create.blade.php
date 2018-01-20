@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Subscriber</b></div>
        </div>
    </div>
    <div class="panel-body">
                {!! Form::open(['method'=>'POST', 'route' => ['bunch::subscriber.store', $id]]) !!}
                {!! Form::label('Name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! Form::label('Surname', 'Surname') !!}
                {!! Form::text('surname', null, ['class' => 'form-control']) !!}
                {!! Form::label('Email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
        <div class="form-group">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>
                {!! Form::close() !!}
    </div>

@endsection
