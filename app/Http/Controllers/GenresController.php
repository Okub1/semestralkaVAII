<?php

namespace App\Http\Controllers;

use App\Genres;
use Illuminate\Http\Response;

class GenresController extends Controller
{
    public function index() {
        $genres = Genres::all();

        return view('genres/index', [
            'genres' => $genres,
        ]);
    }

    public function createOrUpdate() {
        if ($this->request->get('id')) {
            $genre = $this->genres->find($this->request->get('id'));
            if (!$genre) {
                abort(Response::HTTP_NOT_FOUND, 'Genre not found.');
            }

        }
    }
}
