@extends('layouts.app')



@section('admin.panel')
<div class="container my-2">
    <div class="border-bottom border-dark p-1">
        <a class="mx-2 " href="{{ route('home.add') }}">Додај</a>
        <a class=" border-dark border-left border-top border-right p-2" href="{{ route('edit') }}">Измени</a>
    </div>
</div>
@endsection

@section('content')

<div class="container">
    <div class="home">
        <div class="row h-50">
            @foreach($data as $project)
            
            <div class='col-lg-4 col-md-6 col-sm-12 my-3'>
                <div class="card h-100 zoom text-center" style="width: 18rem;">
                    <img src="{{ $project->image }}" class="card-img-top w-50 m-auto h-25" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <small class="card-title">{{ $project->subtitle }}</small>
                        <p class="card-text"> {{ $project->description }}</p>
                        <div class="mt-auto zoom-show d-flex flex-row justify-content-around ">
                            <a href="{{ route('edit.project', $project) }}"><i class=" fas fa-edit fa-2x"></i></a>
                            <form action="{{ route('delete', $project->id) }}" method="POST" class="zoom-show">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit"><i class="fas fa-trash-alt fa-2x"></i></button>
                            </form>
                        
                        </div>

                    </div>
                </div>
            </div>
           
            @endforeach
        </div>
    </div>
</div>
@endsection