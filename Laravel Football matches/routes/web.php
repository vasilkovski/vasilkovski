<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth', 'isAdmin')->group(function(){

    Route::get('/teams', 'TeamController@teams')->name('teams');
    Route::get('/teams/create', 'TeamController@createTeam')->name('createTeam');
    Route::post('/teams/create/store', 'TeamController@storeTeam')->name('storeTeam');
    Route::get('/teams/{id}', 'TeamController@showTeam')->name('showTeam');
    Route::get('/team/{id}', 'TeamController@editTeam')->name('editTeam');
    Route::put('/team/{id}/update', 'TeamController@updateTeam')->name('updateTeam');
    Route::delete('/delete/{id}', 'TeamController@deleteTeam')->name('deleteTeam');
    
    
    Route::get('/players', 'PlayerController@players')->name('players');
    Route::get('player/create', 'PlayerController@createPlayer')->name('createPlayer');
    Route::post('player/create', 'PlayerController@storePlayer')->name('storePlayer');
    Route::get('/players/{id}', 'PlayerController@showPlayer')->name('showPlayer');
    Route::get('/player/{id}', 'PlayerController@editPlayer')->name('editPlayer');
    Route::put('/player/{id}/update', 'PlayerController@updatePlayer')->name('updatePlayer');
    Route::delete('/delete/player/{id}', 'PlayerController@deletePlayer')->name('deletePlayer');
    
    
    Route::get('/matches', 'GameController@index')->name('createMatch');
    Route::post('/store', 'GameController@storeMatch')->name('storeMatch');
    Route::delete('/delete/match/{id}', 'GameController@deleteMatch')->name('deleteMatch');
});
