<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
</head>
<body>
    
<div class="main ">
        <div class="dark">
            <div class="title">
                <h2 class="text-white p-4 text-center">Bussines Casual</h2>
            </div>
            <div class="nav d-flex justify-content-center">
                <a href="{{  route('home') }}" class="text-white p-2 mr-3">HOME</a>
                <a href="{{ route('login') }}" class="text-white p-2">LOG IN</a>
            </div>
           
            <div class="row login_form p-5 m-0">
                <div class="col-6 offset-3 p-5">
                    <form action="{{ route('user.loged') }}" method="POST" class="text-light p-5">
                    @csrf
                       <p class="my-0"> Name: </p>
                       <input type="text" name="name" class="w-100 rounded mb-2" value="{{ old('name') }}">
                       @error('name')
                       <span style="color: red;"> {{ $errors->first('name')}} </span>
                       @enderror
                       <p class="my-0"> Last name: </p>
                       <input type="text" name="lastname" class="w-100 rounded mb-2" value="{{ old('lastname') }}">
                       @error('lastname')
                       <span style="color: red;"> {{ $errors->first('lastname')}} </span>
                       @enderror
                       <p class="my-0"> Email: </p>
                       <input type="email" name="email" class="w-100 rounded mb-3" value="{{ old('email') }}">
                       @error('email')
                       <span style="color: red;"> {{ $errors->first('email')}} </span>
                       @enderror
                       <button class=" btn btn-primary w-100  mt-3" type="submit">Submit</button>
                    </form>
                </div>
            </div>


        </div>
       
        <footer class="text-center text-light p-4">
            <span>Copyright @ Your website 2021</span>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>