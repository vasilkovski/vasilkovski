@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-5 text-center">{{ $post->categories->category }}</h2>


    <div class="card w-50 m-auto" >
        <img src="{{ asset('uploads/posts/' . $post->image ) }}" class="card-img-top w-100 h-25" alt="...">
        <div class="card-body">
            <small>
            <span class="card-text border-dark border-right pr-3">{{ $post->categories->category }}</span>
            <span class="card-text pl-3 text-capitalize"> {{ $post->users->username }}</span></small>
            <h2 class="card-title p-3 text-capitalize">{{ $post->title }}</h2>
            <p class="card-text text-capitalize">{{ $post->description }}</p>

        </div>
        <div class="p-3">
        
        <form action="{{ route('post.comment', $post) }}" method="POST">
        @csrf
        <input type="text" name="comment" placeholder="Comment...">
        <button class="btn btn-primary">Add comment</button>
        </form>
        <h3 class="my-2">Coments:</h3>
            @foreach($post->comments as $comment)
            <div class="border-secondary border-bottom pb-2 w-100 mt-2">
            <span class="font-italic font-weight-bolde text-capitalize"> <small>Comment by: </small> {{ $comment->users->username}} :</span>
            <span class="text-muted text-capitalize" >  {{ $comment->comment}}</span><br>
             <small>Added on: {{ $comment->time}}</small>
            @endforeach
        </div>
    </div>


</div>
@endsection