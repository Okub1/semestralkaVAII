<?php

namespace App\Http\Controllers;

use App\Games;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GamesController extends Controller
{
    private $validatedData;

    public function index() {
        $games = Games::all();

        return view('games/index', [
            'games' => $games,
        ]);
    }

    public function createOrUpdate() {
        if ($this->request->get('id')) {
            $game = $this->games->find($this->request->get('id'));
            if (!$game) {
                abort(Response::HTTP_NOT_FOUND, 'Game not found.');
            }

        }
    }

    public function store(Request $request, $id) {
        $this->validatedData = $request->validate([
            'name' => ['required', 'unique:games', 'max:255'],
            'description' => ['required'],
        ]);


    }
}
