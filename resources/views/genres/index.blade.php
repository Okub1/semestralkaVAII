@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="/genres/create">Add genre</a>
                <table class="table table-striped mt-4">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Meno</th>
                        <th scope="col">Pridané</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($genres as $genre)
                        <tr>
                            <td>{{$genre->id}}</td>
                            <td><b>{{$genre->name}}</b></td>
                            <td>{{$genre->created_at}}</td>
                            <td>
                                <a href="#" id="{{$genre->id}}" data-toggle="modal" data-target="#infoModal" class="btn btn-secondary genre-info">Info</a>
                                <a href="/genres/edit/{{$genre->id}}" class="btn btn-primary">Edit</a>
                                <a href="/genres/delete/{{$genre->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel">Loading...</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary clear-modal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
