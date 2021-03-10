@extends('layouts.app')




@section('content')
<div class="container">
    <h2 class="my-3">Create match</h2>
    <div class="row">
        <div class="col-md-8 my-2">

            <form action="{{ route('storeMatch')}}" method="POST">
                @csrf
    @if(session('message'))
    <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif
                <div class=" border-top p-2">
                    <h3>Home team</h3>
                    <select name="home_team" id="">
                    <option selected disabled> - Choose team -</option>
                        @foreach($teams as $team)
                        <option value="{{$team->id}}">
                            {{$team->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('home_team')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
                <div class="p-2 border-top  border-bottom">
                    <h3>Away team</h3>
                    <select name="away_team" id="">
                    <option selected disabled> - Choose team -</option>
                        @foreach($teams as $team)
                        <option value="{{$team->id}}">
                            {{$team->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('away_team')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
                <div class="p-2 border-bottom">
                    <h3>Date</h3>
                    <input type="date" name="date">
                </div>
                @error('date')
        <span >
            <strong class="form-text bg-danger  text-white p-2 rounded ">{{ $message }}</strong>
        </span>
        @enderror
                <div class="p-2 ">
                    <button type="submit" class="btn btn-primary">Create match</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection