@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="/developers/create">Add developer</a>
                @foreach ($developers as $developer)
                    <div class="card my-4">
                        <div class="card-body">
                            <h5 class="card-title">{{$developer->name}}</h5>
                            <p class="card-text">{{$developer->description}}</p>
                            <p class="card-text"><b>Adresa: </b>{{$developer->address}}</p>
                            <a href="/developers/edit/{{$developer->id}}" class="btn btn-primary">Edit</a>
                            <a href="/developers/delete/{{$developer->id}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
