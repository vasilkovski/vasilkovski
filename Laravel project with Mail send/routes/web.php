<?php

use App\Http\Requests\MailRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', 'FirstController@dashboard')->name('dashboard');
Route::get('/logout', 'FirstController@logout')->name('logout');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/register', 'HomeController@add')->name('home.add');
    Route::post('/register', 'HomeController@store')->name('home.store');
    Route::get('/edit', 'HomeController@edit')->name('edit');
    Route::get('/update/{project}', 'HomeController@updateProject')->name('edit.project');
    Route::put('/update/{project}/a', 'HomeController@update')->name('update');
    Route::delete('/delete/{projectId}', 'HomeController@delete')->name('delete');

});
Route::post('/send', function(MailRequest $request){
   
        $data = [
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'company' => $request->input('company'),
        ];
        
        
       Mail::send('sendMail', $data, function($mess){
            $mess->to('vasilkovskinikola@gmail.com', 'Nikola')->subject('Hello');
       });
       
       $data = Project::all();
       return redirect()->route('dashboard', compact('data'));
});