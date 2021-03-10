@extends('layouts.app')



@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

    <button class="btn btn-primary my-1">
    <a href="{{ route('createTeam')}}" class="text-white">Add team</a></button>

      @if(count($teams) > 0 )
      @foreach($teams as $team)
      <div class="border border-dark p-3">
        <h2>Names: <a href="{{route('showTeam', $team->id)}}">{{$team->name}} </a></h2>
        <p>Year: {{$team->year}}</p>
        <div class="d-flex">
          <button class="btn btn-warning mx-2"><a href="{{route('editTeam', $team->id) }}" class="text-dark text-decoration-none"> Edit </a></button></td>
          </form>
          <form action="{{route('deleteTeam', $team->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <td><button type="submit" class="btn btn-danger"> Delete </button></td>
          </form>
        </div>
      </div>

      @endforeach
      @else
      <h2>No teams found</h2>
      @endif

    </div>
  </div>
</div>
@endsection