<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = Project::all();
        return view('home', compact('data'));
    }

    public function add(){

        return view('auth.register');
    }

    public function store(StoreRequest $request){

         Project::create([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
            'link' => $request->input('link'),
        ]); 

              
        $data = Project::all();
        return redirect()->route('dashboard', compact('data'));
    }

    public function edit(){
        $data = Project::all();
        return redirect()->route('home', compact('data'));
    }


    public function updateProject($project){
       
        $content = Project::where('id', $project)->first();
        return view('layouts.update', compact('content', 'project'));
    }

    public function update(StoreRequest $request,  Project $project){

        $project->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
            'link' => $request->input('link'),
        ]); 
           
        $data = Project::all();
        return redirect()->route('home', compact('data'));
    }

    public function delete(Request $request, Project $projectId){
        
        $projectId->delete();

        $data = Project::all();
        return redirect()->route('home', compact('data'));
    }


    
}
