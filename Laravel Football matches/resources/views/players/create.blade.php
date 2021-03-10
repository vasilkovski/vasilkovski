@extends('layouts.app')



@section('content')


<div class="row">
    <div class="col-md-6 offset-3">
    
    <form action="{{ route('storePlayer')}}" method="POST">
    @csrf
        <h3 >Name:</h3>
        <input type="text" name="fullname" class="my-2">
        @error('fullname')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
        <h3>Date:</h3>
        <input type="date" name="date" class="my-2">
        <br>
        @error('date')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
        <h3>Choose team:</h3>
        <select name="team_id" id="" class="my-2 w-25" >
        <option value="" selected>-- Choose a team -- </option>
        @foreach($teams as $team)
        <option value="{{$team->id}}">{{$team->name}}</option>
        @endforeach
        </select>
        @error('team_id')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
<br>
        <button type="submit" class="btn btn-primary my-2 w-25"> Add</button>
    </form>

    </div>
</div>


@endsection