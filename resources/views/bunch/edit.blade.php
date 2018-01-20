@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('bunch.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Edit bunch: <b>{{$bunch->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['bunch.destroy', $bunch->id], 'method' => 'DELETE'])}}
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

    <div class="panel-body">
        {!! Form::model($bunch, ['route' => ['bunch.update', $bunch->id], 'method' => 'PUT']) !!}
        {!! Form::label('Name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! Form::label('about', 'About') !!}
        {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
        <div class="form-group">
            {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-primary btn-form']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection