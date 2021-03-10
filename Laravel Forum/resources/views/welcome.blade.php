<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Forum</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }



        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref ">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}" class="text-primary">DASHBOARD</a>
            @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="container">
            <h2 class="my-5 text-center">Welcome to the forum</h2>
            <a href="{{ route('post.create') }}">
                <button class="btn btn-primary mb-4">Create Post </button></a>
            <div>
                @if(count($data) === 0 )

                <h1 class="text-center">No posts yet</h1>
                @else
                @foreach($data as $info)
                @if($info->aproved)
                <div class="card mb-3 w-100">
                    <div class="row no-gutters">
                        <div class="col-md-3 h-25">
                            <img src="{{ asset('uploads/posts/' . $info->image ) }}" alt="..." class="w-100 h-25">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title ">Title: <a href="{{ route('post.show', $info) }}" class="text-capitalize"> {{ $info->title }}</a></h5>
                                <p class="card-text text-capitalize">Description: {{ $info->description }}</p>
                            </div>
                            <div>
                                @if(count($info->comments))
                                <div class="border p-4 mt-2">
                                    <p class="font-weight-bold border-bottom">Comments: </p>

                                    @foreach($info->comments as $comment)
                                    <div>
                                        <span class="font-italic text-capitalize font-weight-bold text-capitalize"><small>Comment by: </small> {{ $comment->users->username }} : </span>
                                        <span class="text-capitalize"> {{ $comment->comment}}</span><br>
                                        <small>Added on: {{ $comment->time}}</small>
                                    </div>
                                    @endforeach

                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-3 p-3">
                            <span class="card-text border-dark border-right pr-3 ">{{ $info->categories->category }}</span>
                            <span class="card-text pl-3 text-capitalize">
                                {{ $info->users->username}}
                            </span>

                        </div>

                    </div>
                </div>
                @endif
                @endforeach
            </div>

            @endif
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</html>