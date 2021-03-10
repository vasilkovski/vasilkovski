<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bussines Casual</title>


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />


</head>

<body>
    <div class="main">
        <div class="dark">
            <div class="title">
                <h2 class="text-white p-5 text-center">Bussines Casual</h2>
            </div>
            <div class="nav d-flex justify-content-center">
                <a href="{{ route('home') }}" class="text-white p-2 mr-3">HOME</a>
                @if (session('name'))
                <a href="{{ route('user.logout') }}" class="text-white p-2">LOG OUT</a>
                @else
                <a href="/login" class="text-white p-2">LOG IN</a>
                @endif
            </div>
            <div class="show p-5">
                <div class="center m-auto ">
                    <h3>Your name is: {{ session('name') }}</h3>
                    <h3>Your last name is: {{ session('lastname') }}</h3>

                    @if(session('email'))
                    <h3>Your email is: {{ session('email') }}</h3>
                    @endif
                </div>
            </div>


        </div>

        <footer class="text-center text-light   p-3">
            <span>Copyright @ Your website 2021</span>
        </footer>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>