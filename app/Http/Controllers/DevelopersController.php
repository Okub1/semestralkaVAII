<?php

namespace App\Http\Controllers;

use App\Developer;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

class DevelopersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $developers = Developer::all();

        return view('developers/index', [
            'developers' => $developers,
        ]);
    }

    public function createOrUpdate() {
        if (request()->get('id')) {
            $developer = Developer::find(request()->get('id'));
            if (!$developer) {
                abort(Response::HTTP_NOT_FOUND, 'Developer not found.');
            }
        }

        return view('developers/createOrUpdate');
    }

    public function store(Request $request, $id = null) {
        if ($id) {
            $validatedData = $request->validate([
                'name' => ['required', 'max:255'],
                'description' => ['required'],
                'address' => ['required'],
            ]);
        } else {
            $validatedData = $request->validate([
                'name' => ['required', 'unique:developers', 'max:255'],
                'description' => ['required'],
                'address' => ['required'],
            ]);
        }

        //DEBUG
        //dd($this->validatedData);

        if (!$id) {
            $developer = new Developer($validatedData);
        } else {
            $developer = Developer::find($id);
            $developer->update($validatedData);
        }
        $developer->save();
        return Redirect::route('developers');
    }

    public function delete($id = null) {
        $this->validation($id);

        if (Game::where('developer_id', $id)->count() > 0) {
            return abort(Response::HTTP_BAD_REQUEST, 'Cannot delete with existing games');
        }
        Developer::where('id', $id)->delete();
        return Redirect::route('developers');
    }

    public function edit($id = null) {

        $this->validation($id);

        $developer = Developer::find($id);

        return view('developers/createOrUpdate', [
            'developer' => $developer,
        ]);
    }

    public function validation($id = null){
        if (!$id) {
            return abort(Response::HTTP_NOT_FOUND, 'No developer ID provided');
        }

        $developer = Developer::find($id);
        if (!$developer) {
            return abort(Response::HTTP_NOT_FOUND, 'Developer not found.');
        }
    }

    public function apiCreateDeveloper(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:developers', 'max:255'],
            'description' => ['required'],
            'address' => ['required'],
        ]);


        $developer = new Developer($validatedData);

        $developer->save();

        return response()->json($developer);
    }
}
