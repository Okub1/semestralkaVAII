<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Game;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class GamesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $games = Game::with('genre')->get()->all();

        return view('games/index', [
            'games' => $games,
        ]);
    }

    public function createOrUpdate() {
        if (request()->get('id')) {
            $game = Game::find(request()->get('id'));
            if (!$game) {
                abort(Response::HTTP_NOT_FOUND, 'Game not found.');
            }
        }

        $genres = Genre::all();
        $developers = Developer::all();
        return view('games/createOrUpdate', [
            'genres' => $genres,
            'developers' => $developers
        ]);
    }

    public function store(Request $request, $id = null) {
        if ($id) {
            $validatedData = $request->validate([
                'name' => ['required', 'max:255'],
                'description' => ['required'],
                'genre_id' => ['required', 'numeric'],
                'developer_id' => ['required', 'numeric'],
                'price' => ['required', 'numeric',  'min:0']
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => ['required', 'unique:games', 'max:255'],
                'description' => ['required'],
                'genre_id' => ['required', 'numeric'],
                'developer_id' => ['required', 'numeric'],
                'price' => ['required', 'numeric',  'min:0']
            ]);
        }

        //DEBUG
        //dd($this->validatedData);

        if (!$id) {
            $game = new Game($validatedData);
        } else {
            $game = Game::find($id);
            $game->update($validatedData);
        }
        $game->save();
        return Redirect::route('games');
    }

    public function delete($id = null) {

        $this->validation($id);

        Game::where('id', $id)->delete();
        return Redirect::route('games');
    }

    public function edit($id = null) {

        $this->validation($id);

        $game = Game::find($id);

        $genres = Genre::all();
        $developers = Developer::all();

        return view('games/createOrUpdate', [
            'game' => $game,
            'genres' => $genres,
            'developers' => $developers,
        ]);
    }

    public function validation($id = null){
        if (!$id) {
            return abort(Response::HTTP_NOT_FOUND, 'No game ID provided');
        }

        $game = Game::find($id);
        if (!$game) {
            return abort(Response::HTTP_NOT_FOUND, 'Game not found.');
        }
    }

    public function apiGetGame(Request $request, $id = null) {

        $this->validation($id);

        $game = Game::find($id);

        return response()->json($game);
    }


}
