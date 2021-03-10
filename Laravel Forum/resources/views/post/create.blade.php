@extends('layouts.app')


@section('content')
<div class="container">
<div class="row ">
<div class="col-md-4 offset-5 ">


    <form action="{{ route('post.store') }}" method="POST" enctype= multipart/form-data  >
        @csrf
        <label for="title">Title:</label>
        <p><input type="text" id="title" name="title" value="{{ old('title') }}" ></p>
        @error('title')
        <span class="" >
            <strong class="form-text bg-danger  p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror

        <label for="image">Image:</label>
        <p><input id="image" type="file" name="image" ></p>
        @error('image')
        <span >
            <strong class="form-text bg-danger  p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
        
        <label for="desc"> Description:</label>
        <p><input type="text" id="desc" name="description" value="{{ old('description') }}" class="@error('description') is-invalid @enderror"></p>
        @error('description')
        <span >
            <strong class="form-text bg-danger  p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror

        <label for="category">Category:</label>
        <p> <select name="category" id="category">
                <option selected disabled>-- Select category --</option>
                @foreach($category as $cate)
                <option value="{{ $cate->id }}"> {{ $cate->category}}</option>

                @endforeach
            </select></p>
            @error('category')
        <span >
            <strong class="form-text bg-danger  p-2 rounded ">{{ $message }}</strong>
        </span><br>
        @enderror
        <button type="submit" class="btn btn-primary">Add post</button>
    </form>
</div>
</div>
</div>
@endsection