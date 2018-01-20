@extends('layouts.panel')
@section('panel')

    <div class="panel-body">
                {!! Form::model($subscriber, ['route' => ['bunch::subscriber.update', $bunch_id, $subscriber->id], 'method' => 'PUT']) !!}
                {!! Form::label('Name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                {!! Form::label('Surname', 'Surname') !!}
                {!! Form::text('surname', null, ['class' => 'form-control']) !!}
                {!! Form::label('Email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
        <div class="form-group">
                {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-primary btn-form']) !!}
        </div>
                {!! Form::close() !!}

@endsection