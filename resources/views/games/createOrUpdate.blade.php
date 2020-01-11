@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (empty($game))
                    <h1>Create game</h1>
                @else
                    <h1>Editing: {{$game->name}}</h1>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (empty($game))
                <form method="post" action="{{action('GamesController@store')}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>name:</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>description:</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>zaner:</label>
                        <select name="genre_id" class="form-control">
                            @foreach($genres as $genre)
                            <option value={{$genre->id}}>{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>developer:</label>
                        <select name="developer_id" class="form-control">
                            @foreach($developers as $developer)
                                <option value={{$developer->id}}>{{$developer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <lavel>price:</lavel>
                        <input type="number" min="0" name="price" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                </form>
                @else
                    <form method="post" action="{{action('GamesController@store', $game->id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>meno:</label>
                            <input type="text" name="name" class="form-control" value="{{$game->name}}"/>
                        </div>
                        <div class="form-group">
                            <label>popis:</label>
                            <textarea name="description" class="form-control">{{$game->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>zaner:</label>
                            <select name="genre_id" class="form-control">
                                @foreach($genres as $genre)
                                    <option value={{$genre->id}}>{{$genre->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>developer:</label>
                            <select name="developer_id" class="form-control">
                                @foreach($developers as $developer)
                                    <option value={{$developer->id}}>{{$developer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <lavel>price:</lavel>
                            <input type="number" min="0" name="price" class="form-control" value="{{$game->price}}"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
