@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-6 border-bottom border-dark">

            <h2 class="p-2">Name : {{$team->name}}</h2>
            <h5 class="p-2">Year: {{$team->year}} </h5>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <div class="row p-3">
                <div class="col-md-6 text-right border-right border-dark">
                <h2>Players: </h2>
                    @foreach($team->players as $player)
                    <p > <a href="{{ route('showPlayer', $player->id)}}">{{$player->fullname}}</a>
                    </p>
                    @endforeach
                </div>
                <div class="col-md-6">
                <h2>Games played :</h2>

                   <div>
                    <table class="w-100"> 
                    <thead class="border border-dark  bg-dark text-light">
                    <th class="p-2">Home</th>
                    <th>Away</th>
                    <th>Result</th>
                    <th>Date</th>
                    </thead>
                    <tbody class="border border-dark">
                     @foreach($games as $game)
                   
                    <tr class="p-2 border-bottom border-dark">
                    <td class="p-2">{{$game->team1->name}}</td>
                    <td >{{$game->team2->name}}</td>
                    @if($game->result)
                    <td >{{$game->result}}</td>
                    @else
                    <td class="text-center"> /</td>
                    @endif
                    <td >   {{$game->date}}</td>
                    
                    
                    </tr>
                    
                    @endforeach
                    </tbody>
                    </table>    
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
</div>
@endsection