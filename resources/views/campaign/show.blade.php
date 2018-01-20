@extends('layouts.panel')
@section('panel')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <a class="btn btn-info btn-xs col-md-1 col-sm-2 col-xs-2" href="{{route('campaigns.index')}}">
                <i class="fa fa-backward" aria-hidden="true"></i> back
            </a>
            <div class="centered-child col-md-9 col-sm-7 col-xs-6">Campaign: <b>{{$campaign->name}}</b></div>
            <div class="col-md-2 col-sm-3 col-xs-4">
                <div class="pull-right">
                    {{Form::open(['class' => 'confirm-delete', 'route' => ['campaigns.destroy', $campaign->id], 'method' => 'DELETE'])}}
                    {{link_to_route('campaigns.edit', 'Edit', [$campaign->id], ['class' => 'btn btn-primary btn-xs']) }}
                    {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-responsive">
            <tr>
                <th width="25%">Attribute</th>
                <th width="75%">Value</th>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $campaign->name }}</td>
            </tr>
            <tr>
                <td>Template</td>
                <td><a href="{{ route('templates.show', [$campaign->template->id]) }}">{{ $campaign->template->name }}</a></td>
            </tr>
            <tr>
                <td>Bunch</td>
                <td>
                    <a href="{{ route('bunch.show', [$campaign->bunch->id]) }}">{{ $campaign->bunch->name }}</a>
                    @foreach($campaign->bunch->subscribers as $key => $subscriber)
                        <br>{{ $subscriber->name }} {{ $subscriber->surname }} - {{ $subscriber->email }}
                    @endforeach
                </td>
            </tr>
        </table>
        <a href="{{ URL('campaigns/'. $campaign->id . '/preview') }}" class="btn btn-primary btn-xs">PREVIEW AND SEND</a>
    </div>
@endsection