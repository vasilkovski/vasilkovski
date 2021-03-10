<?php

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

//    ------ Ruti za polnenje baza -------
//Route::get('/countries', 'HomeController@countries');
//Route::get('/database', 'HomeController@fillDb');

Route::get('/', 'TrackerController@index')->name('total');
Route::get('/sync', 'HomeController@sync')->name('sync');

Route::get('/day', 'TrackerController@index')->name('lastDay');
Route::get('/month', 'TrackerController@index')->name('lastMonth');
Route::get('/three-months', 'TrackerController@index')->name('lastThreeMonths');

Route::post('/countries', 'TrackerController@totalCountry')->name('country');
Route::get('/countries', 'TrackerController@total')->name('totalForCountry');


Route::get('/countries/day', 'TrackerController@lastDay')->name('lastDayCountry');
Route::get('/countries/month', 'TrackerController@lastmonth')->name('lastMonthCountry');
Route::get('/countries/three-months', 'TrackerController@lastThreeMonth')->name('lastThreeMonthsCountry');


