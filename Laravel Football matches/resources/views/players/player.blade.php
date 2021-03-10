@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">

            <h2 class="my-3"> Name: <span class="font-weight-bolder">{{$players->fullname}}</span></h2>
            <h3 class="my-3">Team: <a href="{{route('showTeam', $players->teams->id)}}">{{$players->teams->name}}</a></h3>
            <h5 class="my-3">Date of birth: <span class="font-weight-bold">{{$players->date}}</span></h5>


            <div>
                <h1>Games played:</h1>
                <table class="w-100">
                    <thead class="border border-dark  bg-dark text-light">
                        <th class="p-2">Home</th>
                        <th>Away</th>
                        <th>Result</th>
                        <th>Date</th>
                    </thead>
                    <tbody class="border border-dark">
                        @foreach($games as $game)


                        @if($players->created_at < $game->created_at)
                            <tr class="p-2 border-bottom border-dark">
                                <td class="p-2">{{$game->team1->name}}</td>
                                <td>{{$game->team2->name}}</td>
                                @if($game->result)
                                <td>{{$game->result}}</td>
                                @else
                                <td class="text-center"> /</td>
                                @endif
                                <td> {{$game->date}}</td>
                            </tr>
                            @endif
                            @endforeach








            </div>
        </div>
    </div>




    @endsection