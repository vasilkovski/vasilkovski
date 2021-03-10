@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if(Auth::user()->role === 'admin')
      <button class="btn btn-primary"><a href="{{ route('createMatch')}}" class="text-white">Add match</a></button>
      @endif
      <table class="table">
        <thead class="bg-dark text-light">
          <tr>

            <th scope="col">Home</th>
            <th scope="col">Away</th>
            <th scope="col">Result</th>
            <th scope="col">Date</th>

          </tr>
        </thead>
        <tbody>
          @if(count($games) > 0)
          @foreach($games as $game)
          <tr>
            <td>{{$game->team1->name}}</td>
            <td>{{$game->team2->name}}</td>
            @if($game->result)
            <td>{{$game->result}}</td>
            @else
            <td>/</td>
            @endif
            <td>{{$game->date}}</td>

            @if(Auth::user()->role === 'admin')
            <td>
              <form action="{{route ('deleteMatch', $game->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"> Delete</button>
              </form>
            </td>
            @endif
          </tr>
          @endforeach
          @else
          <h2 class="bg-info my-3 p-2 rounded">No matches found</h2>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection