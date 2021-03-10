<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function loginForm(Request $request)
    {
        if(session('name')){
            return redirect()->route('home');
        }
        return view('login');
    }
    public function loged(Request $request)
    {
        $request->validate([
            'name' => ['required', 'alpha', 'max:15'],
            'lastname' => ['required', 'alpha', 'max:25'],
            'email' => ['email' => null],
        ]);
        
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');


        $request->session()->put(['name' => $name, 'lastname' => $lastname, 'email' => $email]);
        return view('loged');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('home');
    }
}
