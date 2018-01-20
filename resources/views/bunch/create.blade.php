@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>New Bunch</b></div>
        </div>
    </div>

    <div class="panel-body">
        {!! Form::open(['method'=>'POST', 'route' => 'bunch.store']) !!}
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! Form::label('about', 'About') !!}
        {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
        <div class="form-group">
            {!! Form::button('Create', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection

