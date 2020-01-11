@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($games as $game)
                    <p>ID hry: {{ $game->id }}</p>
                    <p>Meno hry: {{ $game->name }}</p>
                    <p>Popis hry: {{ $game->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
