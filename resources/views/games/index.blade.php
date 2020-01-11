@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="/games/create">Create game</a>
                @foreach ($games as $game)
                    <div class="card my-4">
                        <div class="card-body">
                            <h5 class="card-title"><b>{{$game->name}}</b></h5>
                            <p class="card-text">{{$game->description}}</p>
                            <p class="card-text"><b>Vyvojar: </b>{{$game->developer->name}}</p>
                            <p class="card-text"><b>Zaner: </b>{{$game->genre->name}}</p>
                            <p class="card-text"><b>Cena: </b>
                                @if ($game->price === '0')
                                    Free to play
                                @else
                                    {{$game->price}}€
                                @endif
                            </p>
                            <a href="/games/edit/{{$game->id}}" class="btn btn-primary">Edit</a>
                            <a href="/games/delete/{{$game->id}}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
