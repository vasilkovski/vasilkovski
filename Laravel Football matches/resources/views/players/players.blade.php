@extends('layouts.app')



@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">


      <table class="table">
        <thead class="bg-dark text-light">
          <tr>
            <th scope="col">FullName</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Team</th>

          </tr>
        </thead>
        <tbody>
          <button class="btn btn-primary mb-2"><a href="{{route('createPlayer')}}" class="text-white">Add player</a></button>
          @foreach($players as $player)

          <tr>
            <td><a href="{{ route('showPlayer', $player->id)}}">{{ $player->fullname}}</a></td>
            <td>{{$player->date}}</td>
            <td><a href="{{route('showTeam', $player->teams->id)}}">{{$player->teams->name}}</a></td>
            <td><button class="btn btn-warning">
                <a href="{{ route('editPlayer', $player->id)}}" class="text-dark">Edit</a></button></td>
            <td>
              <form action="{{route('deletePlayer', $player->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>

    </div>
  </div>
</div>




@endsection