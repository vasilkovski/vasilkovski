@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 offset-4">
        <div class="p-2">
            <form action=" {{route ('updatePlayer', $player->id) }}" method="POST">
                @csrf
                @method('PUT')
                <h3>Name:</h3>
                <input type="text" name="name" class="w-50 my-2" value="{{ $player->fullname}}">
                @error('name')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
                <h3>Date:</h3>
                <input type="date" name="date" class="w-50" value="{{ $player->date}}">
                @error('date')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
                <br>
                <select name="teams" id="" class="my-2 w-25">
                    <option value="" selected>-- Choose a team -- </option>
                    @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                </select><br>
                @error('teams')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection