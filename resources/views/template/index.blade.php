@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Template</div>

                    <div class="panel-body">
                        <a href="{{ URL('templates/create') }}" class="btn btn-info btn-xs">Create</a>
                        <table class="table table-bordered table-responsive table-striped">
                            <tr>
                             <th>Name</th>
                             <th>Content</th>
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
                            @foreach ($templates as $t)
                                <tr onclick="window.location='{{ route('templates.show', ['id' => $t->id]) }}'" class="table-row">
                                    <td>{{ $t->name }}</td>
                                    <td>{!! $t->content !!}</td>
                                    <td>
                                        <form action="{{ URL('templates/'. $t->id) }}" method="POST">
                                            <a href="{{ URL('templates/'. $t->id) }}" class="btn btn-info btn-xs">Info</a>
                                            <a href="{{ URL('templates/'. $t->id .'/edit') }}" class="btn btn-success btn-xs">Edit</a>

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

@endsection