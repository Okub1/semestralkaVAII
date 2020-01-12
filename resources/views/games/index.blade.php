@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-primary" href="/games/create">Create game</a>
                <table class="table table-striped mt-4 table-responsive">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Meno</th>
                        <th scope="col">Vyvojar</th>
                        <th scope="col">Zaner</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Pridané</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <td>{{$game->id}}</td>
                            <td><b>{{$game->name}}</b></td>
                            <td>{{$game->developer->name}}</td>
                            <td>{{$game->genre->name}}</td>
                            <td>
                                @if ($game->price === '0')
                                    Free to play
                                @else
                                    {{$game->price}}€
                                @endif
                            </td>
                            <td>{{$game->created_at}}</td>
                            <td>
                                <a href="#" id="{{$game->id}}" data-toggle="modal" data-target="#infoModal" class="btn btn-secondary game-info">Info</a>
                                <a href="/games/edit/{{$game->id}}" class="btn btn-primary">Edit</a>
                                <a href="/games/delete/{{$game->id}}" class="btn btn-danger">Delete</a>
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
                    <h5 class="modal-title" id="infoModalLabel"></h5>
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
