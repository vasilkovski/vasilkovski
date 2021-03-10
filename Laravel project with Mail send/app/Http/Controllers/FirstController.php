<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    public function dashboard(){

        $data = Project::all();
        return view('welcome' , compact('data'));
    }
    public function logout(){
        Auth::logout();
        $data = Project::all();
        return redirect()->route('dashboard', compact('data'));
    }

}
