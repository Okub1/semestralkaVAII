@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="/genres/create">Add genre</a>
                @foreach ($genres as $genre)
                    <div class="card my-4">
                        <div class="card-body">
                            <h5 class="card-title">{{$genre->name}}</h5>
                            <p class="card-text">{{$genre->description}}</p>
                            <a href="/genres/edit/{{$genre->id}}" class="btn btn-primary">Edit</a>
                            <a href="/genres/delete/{{$genre->id}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
