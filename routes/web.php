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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/games', 'GamesController@index')->name('games');
//Route::get('/games/update', 'GamesController@CreateOrUpdate')->name('games');
Route::get('/developers', 'DevelopersController@index')->name('developers');
Route::get('/genres', 'GenresController@index')->name('genres');
