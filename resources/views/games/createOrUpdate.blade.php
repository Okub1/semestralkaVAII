@extends('layouts.app')

@section('content')

    <h1>Create game</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{action('GamesController@store', $id)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH"/>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{$game->name}}}" placeholder="Enter name of game"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
