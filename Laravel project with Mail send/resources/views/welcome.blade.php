@extends('layouts.app')
@section('title', 'Home')

@section('main-image')
<div class="main_picture ">
    <div class="cover-dark">
        <div class="text-cover text-center">
    <p > Brainster.xyz Labs</p>
    <p class="small-cover-text"> Проекти од академиите на Brainster</p>
    </div>
    </div>
    </div>

@endsection


@section ('content')
<div class="container">
    <div class="home">
    <div class="row h-50">     
        @foreach($data as $content)  
             <div class='col-lg-4 col-md-6 col-sm-12 my-3'>              
                <div class="card h-100 zoom text-center" style="width: 18rem;">
                    <img src="{{ $content->image }}" class="card-img-top w-50 m-auto h-25"  alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $content->title }}</h5>
                        <small class="card-title">{{ $content->subtitle }}</small>
                        <p class="card-text"> {{ $content->description }}</p>
                        <a href="{{ $content->link }}"  target="_blank" class="btn btn-warning mt-auto">Дознај повеќе</a>
                    </div>
                    </div>
                    </div>           
        @endforeach
        </div>
    </div>
</div>
@endsection