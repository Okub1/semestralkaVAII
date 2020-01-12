<?php

namespace App\Http\Controllers;

use App\Game;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class GenresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $genres = Genre::all();

        return view('genres/index', [
            'genres' => $genres,
        ]);
    }

    public function createOrUpdate() {
        if (request()->get('id')) {
            $genre = Genre::find(request()->get('id'));
            if (!$genre) {
                abort(Response::HTTP_NOT_FOUND, 'Genre not found.');
            }
        }

        return view('genres/createOrUpdate');
    }

    public function store(Request $request, $id = null) {
        if ($id) {
            $validatedData = $request->validate([
                'name' => ['required', 'max:255'],
                'description' => ['required'],
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => ['required', 'unique:developers', 'max:255'],
                'description' => ['required'],
            ]);
        }

        //DEBUG
        //dd($this->validatedData);

        if (!$id) {
            $genre = new Genre($validatedData);
        } else {
            $genre = Genre::find($id);
            $genre->update($validatedData);
        }
        $genre->save();
        return Redirect::route('genres');
    }

    public function delete($id = null) {
        $this->validation($id);

        if (Game::where('genre_id', $id)->count() > 0) {
            return abort(Response::HTTP_BAD_REQUEST, 'Cannot delete with existing games');
        }

        Genre::where('id', $id)->delete();
        return Redirect::route('genres');
    }

    public function edit($id = null) {

        $this->validation($id);

        $genre = Genre::find($id);

        return view('genres/createOrUpdate', [
            'genre' => $genre,
        ]);
    }

    public function validation($id = null){
        if (!$id) {
            return abort(Response::HTTP_NOT_FOUND, 'No genre ID provided');
        }

        $genre = Genre::find($id);
        if (!$genre) {
            return abort(Response::HTTP_NOT_FOUND, 'Genre not found.');
        }
    }

    public function apiGetGenre(Request $request, $id = null) {

        $this->validation($id);

        $genre = Genre::find($id);

        return response()->json($genre);
    }

    public function apiGetGames(Request $request, $id = null) {

        $this->validation($id);

        $games = Game::where('genre_id', $id)->get()->all();

        return response()->json($games);
    }
}
