<?php

namespace App\Http\Controllers;

use App\Developers;
use Illuminate\Http\Response;

class DevelopersController extends Controller
{
    public function index() {
        $developers = Developers::all();

        return view('developers/index', [
            'developers' => $developers,
        ]);
    }

    public function createOrUpdate() {
        if ($this->request->get('id')) {
            $developer = $this->developers->find($this->request->get('id'));
            if (!$developer) {
                abort(Response::HTTP_NOT_FOUND, 'Developer not found.');
            }

        }
    }
}
