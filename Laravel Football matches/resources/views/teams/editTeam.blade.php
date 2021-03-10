@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-4">
        <div class="p-2">
            <form action=" {{route ('updateTeam', $team) }}" method="POST">
                @csrf
                @method('PUT')
                <h3>Name:</h3>
                <input type="text" name="name" class="w-50 my-2" value="{{ $team->name}}">
                @error('name')
                <span>
                    <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
                </span>
                @enderror
                <h3>Year:</h3>
                <input type="numeric" name="year" class="w-50" value="{{ $team->year}}">
                <br>
                @error('year')
                <span>
                    <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
                </span>
                @enderror
                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection