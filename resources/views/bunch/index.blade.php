@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Bunches</div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        <a href="{{ URL('bunch/create') }}" class="btn btn-info btn-xs">Create</a>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                                <th>Name</th>
                                <th>About</th>
                                <th>Time</th>
                                <th>action</th>
                            </tr>
                            <tr>
                                <td colspan="3" class="light-green-background no-padding" title="Create new template">
                                    <div class="row centered-child">
                                        <div class="col-md-12">

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @foreach ($bunch as $b)
                                <tr onclick="window.location='{{ route('bunch::subscriber.index', ['bunch_id' => $b->id]) }}'" class="table-row">
                                    <td>{{$b->name}}</td>
                                    <td>{{$b->about}}</td>
                                    <td>{{$b->created_at}}</td>
                                    <td>
                                        {{Form::open(['class' => 'confirm-delete', 'route' => ['bunch.destroy', $b->id], 'method' => 'DELETE'])}}
                                        <a href="{{ URL('bunch/'. $b->id .'/subscriber') }}" class="btn btn-info btn-xs">Subscribers</a>
                                        {{ link_to_route('bunch.edit', 'edit', [$b->id], ['class' => 'btn btn-success btn-xs']) }}
                                        {{Form::button('Delete', ['class' => 'btn btn-danger btn-xs', 'type' => 'submit'])}}
                                        {{Form::close()}}
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