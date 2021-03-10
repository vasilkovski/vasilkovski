<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index(){
        $title = "Home";
        $backgroundPhoto ="img/home-bg.jpg";
        $small ="A blog theme to start Boostrap";
        return view('index', [ 'title' => $title, 'backgroundPhoto' => $backgroundPhoto, 'small' => $small ]);
    }

    public function post(){
        $title = "Man must explore, and this is exploration at it's greatest";
        $backgroundPhoto ="img/post-bg.jpg";
        $small ="Posted by Boostrap";
        $subtitle = "Problem look mighty slow from 150 miles up";
        return view('sample', [ 'title' => $title, 'backgroundPhoto' => $backgroundPhoto, 'small' => $small, 'subtitle' => $subtitle]);
    }

    public function contact(){
        $title = "Contact";
        $backgroundPhoto ="img/contact-bg.jpg";
        $small = 'Have a questions? I have answers!';
        return view('contact', [ 'title' => $title, 'backgroundPhoto' => $backgroundPhoto, 'small' => $small ]);
    }

    public function about(){
        $title = "About";
        $backgroundPhoto ="img/about-bg.jpg";
        $small = 'This is what i do';
        return view('aboutme', [ 'title' => $title, 'backgroundPhoto' => $backgroundPhoto, 'small' => $small ]);
    }
    
}

