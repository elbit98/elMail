@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Campaigns</div>

                    <div class="panel-body">
                        <a href="{{ URL('campaigns/create') }}" class="btn btn-info btn-xs">Create</a>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Template</th>
                        <th>Bunch</th>
                        <th>Action</th>
                            </tr>
                            <tr>
                                <td colspan="3" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>

                    @foreach($campaigns as $c)
                        <tr onclick="window.location='{{ route('campaigns.show', ['id' => $c->id]) }}'" class="table-row">
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->description }}</td>
                            <td>{{ $c->template->name }}</td>
                            <td>{{ $c->bunch->name }}</td>
                            <td>
                                <form action="{{ URL('campaigns/'. $c->id) }}" method="POST">
                                    <a href="{{ URL('campaigns/'. $c->id . '/preview') }}" class="btn btn-xs btn-warning">Preview</a>
                                    <a href="{{ URL('campaigns/'. $c->id) }}" class="btn btn-info btn-xs">Info</a>
                                    <a href="{{ URL('campaigns/'. $c->id .'/edit') }}" class="btn btn-success btn-xs">Edit</a>
                                    <form action="{{ URL('campaigns/'. $c->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                    </form>
                            </td>
                        </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection