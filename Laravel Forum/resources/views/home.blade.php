@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-5 text-center">Welcome to the forum</h2>


    @if(session('addedPost'))
        <p class="alert alert-success m-3 w-100"> {{ session('addedPost')}}</p>
        @endif
     @if(session('aproved'))
        <p class="alert alert-success m-3 w-100"> {{ session('aproved')}}</p>
        @endif

    <a href="{{ route('post.create') }}">
        <button class="btn btn-primary mb-4">Create Post </button></a>
    <div>
   
       
        @if(Auth::check() && $user->role === 'admin')
            @foreach($data as $aprove)
                @if($aprove->aproved === 0)
                <form action="{{ route('post.aprove') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-primary">Aprove</button>
                </form>   
             @endif
            @endforeach

        @endif
                       
        @if(count($data) === 0 ) 
        <h1 class="text-center">No posts yet</h1>
        @else
        @foreach($data as $info)
            @if($info->aproved)
            <div class="card mb-3 w-100">
                <div class="row no-gutters">
                    <div class="col-md-3 h-25">
                        <img src="{{ asset('uploads/posts/' . $info->image ) }} " alt="..." class="w-100 h-25">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <a href="{{ route('post.show', $info) }}">
                                <h5 class="card-title text-capitalize">{{ $info->title }}</h5>
                            </a>
                            <p class="card-text text-capitalize">{{ $info->description }}</p>
                        </div>
                        <form action="{{ route('post.comment', $info) }}" method="POST">
                            @csrf
                            <input type="text" name="comment" placeholder="Comment..." class="mb-1">
                            <button class="btn btn-primary" >Add comment</button>
                         </form>
                         @if(count($info->comments))
                         <div class="border p-2 mt-2">
                         <p class="font-weight-bold border-bottom">Comments:</p>
                         @foreach($info->comments as $comment)
                         <div>
                          <span class="text-capitalize font-weight-bold font-italic text-capitalize"> <small>Comment by: </small>{{ $comment->users->username}} :</span>
                            <span class="text-capitalize"> {{ $comment->comment}}</span>
                            <small >Added on:  {{ $comment->time}}</small>
                         </div>
                        
                         @endforeach
                         </div>
                        @endif
                    </div>

                    <div class="col-3 p-3">
                        <span class="card-text border-dark border-right pr-3 text-capitalize">{{ $info->categories->category }}</span>
                        <span class="card-text pl-3 text-capitalize">
                            {{ $info->users->username }}
                        </span>
                      
                        @if(Auth::check() && Auth::user()->id === $info->user_id || Auth::check() && $user->role === 'admin')
                        <div class="d-flex justify-content-around mt-2">
                            <a href="{{ route('post.edit', $info)}}" class="text-dark"><button class="btn-warning"><i class="fa fa-edit fa-2x"></button></i></a>
                            <form action=" {{ route('post.destroy', $info) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger"><i class="fa fa-trash fa-2x"></i></button>
                            </form>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
            @endif
        @endforeach
        @endif
    </div>
    

</div>
@endsection