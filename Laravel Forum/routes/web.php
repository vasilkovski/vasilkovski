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

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware('auth', 'isAdmin')->group(function(){
    Route::put('/aprove', 'PostController@aprove')->name('post.aprove');
});
Route::middleware('auth')->group(function(){ 
    Route::resource('/post', 'PostController')->except(['index', 'show']);
    Route::post('/post/{post}/comment', 'CommentControler@comment')->name('post.comment');
});
Route::get('/post/{post}', 'PostController@show')->name('post.show');
Route::get('/aprove', function() {
    return abort(404);
});