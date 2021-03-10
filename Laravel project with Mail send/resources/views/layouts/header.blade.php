<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>
<style>
  .main_picture {
    background-image: url("{{ asset('img/synthesio-0301.gif') }}");
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    height: 60vh;
    position: relative;
  }
</style>

<body>
  <nav class="navbar navbar-expand-lg  py-3">
    <div class="nav-logo">
      <a class=" navbar-brand  d-flex flex-column align-items-center" href=" {{ route('dashboard') }}">
        <img src="{{ asset('img/logo_footer_black.png') }}" class="w-25 " /><small>Brainster</small>
      </a>
    </div>
    <button class="navbar-toggler text-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon "><i class="fas fa-bars fa-2x"></i></span>
    </button>

    <div class="collapse navbar-collapse small" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ">
        <li class="nav-item p-2 position-relative">
          <a class="nav-link font-weight-bold a-nav" href="https://marketpreneurs.brainster.co/" target="_blank">
            Академија за маркетинг</a>
        </li>
        <li class="nav-item p-2 position-relative">
          <a class="nav-link font-weight-bold a-nav" href="http://codepreneurs.co/" target="_blank">Академија за програмирање
          </a>
        </li>
        <li class="nav-item p-2 position-relative">
          <a class="nav-link font-weight-bold a-nav" href="#">Академија за дизајн
          </a>
        </li>
        <li class="nav-item p-2 position-relative">
          <a class="nav-link font-weight-bold a-nav" href="https://blog.brainster.co/" target="_blank">Блог
          </a>
        </li>
        @if(Auth::check())
        <li class="nav-item p-2 position-relative">
          <a class="nav-link font-weight-bold a-nav text-danger " href="{{ route('edit') }}">Project
          </a>
        </li>
        @endif
        @if(Auth::check())
        <li class="nav-item p-2 position-relative">
          <a class="nav-link font-weight-bold a-nav text-danger" href="{{ route('logout')}}">Logout
          </a>
          @else
        <li class="nav-item p-2 position-relative">
          <a class="nav-link font-weight-bold a-nav text-success" href="{{ route('login')}}">Login
          </a>
        </li>
        @endif


      </ul>

      <button class="btn btn-danger ml-3 btn-nav-hover font-weight-bold " data-toggle="modal" data-target="#modal_id">
        Вработи наш студент
      </button>

    </div>
  </nav>

  <!-- MODAL -->
  <div class="modal fade" id="modal_id" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Вработи наш студент</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/send" method="POST">
              <p class="text-secondary">Внесете Ваши информации за да стапиме во контакт:</p>
              <form action="" method="POST">
                @csrf
                <p class="m-0 text-secondary">Е-мејл </p>
                <input type="mail" name="email" class="w-100  mb-3">
                <p class="m-0 text-secondary">Телефон</p>
                <input type="text" name="phone" class="w-100  mb-3">
                <p class="m-0 text-secondary">Компанија</p>
                <input type="text" name="company" class="w-100  mb-3">
                <br>
                <button type="submit" class="btn btn-warning w-100">Испрати</button>
              </form>


          </form>
        </div>
      </div>
    </div>
  </div>