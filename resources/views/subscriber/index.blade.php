@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @foreach($bunches as $b)
                    <div class="panel-heading">Bunch  "{{ $b->name }}"  (subscribers list)</div>
                    @endforeach
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    <div class="panel-body">
                        <a href="{{ URL('bunch/'.$bunch_id.'/subscriber/create') }}" class="btn btn-info btn-xs">Create</a>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Email</th>
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


                            @foreach ($subscribers as $s)
                                <tr onclick="window.location='{{ route('bunch::subscriber.show', ['bunch_id' => $bunch_id, 'id' => $s->id]) }}'" class="table-row">

                                    <td>{{ $s->name }}</td>
                                    <td>{{ $s->surname }}</td>
                                    <td>{{ $s->email }}</td>
                                    <td>
                                        <form action="{{ URL('bunch/'.$bunch_id.'/subscriber/'. $s->id) }}" method="POST" class="confirm-delete">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <a href="{{ URL('bunch/'.$bunch_id.'/subscriber/'. $s->id .'/edit') }}" class="btn btn-success btn-xs">Edit</a>
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