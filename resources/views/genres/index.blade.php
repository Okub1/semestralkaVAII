@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($genres as $genre)
                    <p>ID zanru: {{ $genre->id }}</p>
                    <p>Meno zanru: {{ $genre->name }}</p>
                    <p>Popis zanru: {{ $genre->description }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
