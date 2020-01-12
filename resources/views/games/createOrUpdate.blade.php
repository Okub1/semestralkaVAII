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
                        <label><b>meno</b></label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label><b>popis</b></label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label><b>zaner</b></label>
                        <select name="genre_id" class="form-control">
                            @foreach($genres as $genre)
                            <option value={{$genre->id}}>{{$genre->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        <label><b>developer</b></label>
                    <div class="form-row">
                        <div class="col">
                            <select name="developer_id" id="developer_id" class="form-control">
                                @foreach($developers as $developer)
                                    <option value={{$developer->id}}>{{$developer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <a href="#" data-toggle="modal" data-target="#developerModal" class="btn btn-secondary">Create</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><b>cena</b></label>
                        <input type="number" min="0" name="price" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="/games" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
                @else
                    <form method="post" action="{{action('GamesController@store', $game->id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label><b>meno</b></label>
                            <input type="text" name="name" class="form-control" value="{{$game->name}}"/>
                        </div>
                        <div class="form-group">
                            <label><b>popis</b></label>
                            <textarea name="description" class="form-control">{{$game->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label><b>zaner</b></label>
                            <select name="genre_id" class="form-control">
                                @foreach($genres as $genre)
                                    <option value={{$genre->id}}>{{$genre->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b>developer</b></label>
                            <select name="developer_id" id="developer_id" class="form-control">
                                @foreach($developers as $developer)
                                    <option value={{$developer->id}}>{{$developer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label><b>cena</b></label>
                            <input type="number" min="0" name="price" class="form-control" value="{{$game->price}}"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="/games" class="btn btn-danger">Cancel</a>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="developerModal" tabindex="-1" role="dialog" aria-labelledby="developerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="developerModalLabel">Create developer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{action('DevelopersController@store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label><b>meno</b></label>
                            <input type="text" name="name" id="name" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label><b>popis</b></label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>adresa</b></label>
                            <input type="text" name="address" id="address" class="form-control"/>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary create-developer" value="Submit">
                    <button type="button" class="btn btn-secondary clear-modal" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
