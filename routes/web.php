<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ~~~~~~~~~~~~~~~~~~  home
Route::get('/home', 'HomeController@index')->name('home');

// ~~~~~~~~~~~~~~~~~~  games
Route::get('/games', 'GamesController@index')->name('games');
Route::get('/games/create', 'GamesController@createOrUpdate');
Route::post('/games/store/{id?}', 'GamesController@store')->where('id', '[0-9]+');
Route::get('/games/delete/{id}', 'GamesController@delete')->where('id', '[0-9]+');
Route::get('/games/edit/{id}', 'GamesController@edit')->where('id', '[0-9]+');
Route::get('/api/games/{id}', 'GamesController@apiGetGame')->where('id', '[0-9]+');


// ~~~~~~~~~~~~~~~~~~ developers
Route::get('/developers', 'DevelopersController@index')->name('developers');
Route::get('/developers/create', 'DevelopersController@createOrUpdate');
Route::post('/developers/store/{id?}', 'DevelopersController@store')->where('id', '[0-9]+');
Route::get('/developers/delete/{id}', 'DevelopersController@delete')->where('id', '[0-9]+');
Route::get('/developers/edit/{id}', 'DevelopersController@edit')->where('id', '[0-9]+');
Route::post('/api/developers/create', 'DevelopersController@apiCreateDeveloper');

// ~~~~~~~~~~~~~~~~~~  genres
Route::get('/genres', 'GenresController@index')->name('genres');
Route::get('/genres/create', 'GenresController@createOrUpdate');
Route::post('/genres/store/{id?}', 'GenresController@store')->where('id', '[0-9]+');
Route::get('/genres/delete/{id}', 'GenresController@delete')->where('id', '[0-9]+');
Route::get('/genres/edit/{id}', 'GenresController@edit')->where('id', '[0-9]+');
Route::get('/api/genres/{id}', 'GenresController@apiGetGenre')->where('id', '[0-9]+');
Route::get('/api/genres/games/{id}', 'GenresController@apiGetGames')->where('id', '[0-9]+');
