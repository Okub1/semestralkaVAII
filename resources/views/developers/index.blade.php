@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($developers as $developer)
                    <p>ID developera: {{ $developer->id }}</p>
                    <p>Meno developera: {{ $developer->name }}</p>
                    <p>Popis developera: {{ $developer->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
