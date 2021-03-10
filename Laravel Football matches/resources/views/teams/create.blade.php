@extends('layouts.app')


@section('content')

<div class="row">
    <div class="col-md-6 offset-3">

    <form action="{{ route('storeTeam')}}" method="POST">
    @csrf
        <h2>Name:</h2>
        <input type="text" name="name">
        @error('name')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
        <h2>Year:</h2>
        <input type="text" name="year">
        <br>
        @error('year')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
        <button type="submit" class="btn btn-primary"> Add</button>
    </form>

    </div>
</div>


@endsection