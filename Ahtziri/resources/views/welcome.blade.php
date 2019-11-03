<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/estiloWelcome/estiloWelcome.css')}}">

    </head>
    <body>
      <header>
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">
                      <button type="button" class="btn btn-danger">Inicio</button>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                      <button type="button" class="btn btn-success">LogIn</button>
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                          <button type="button" class="btn btn-info">Registro</button>
                        </a>
                    @endif
                @endauth
            </div>
        @endif
        <br>
        <br>
        <br>
      </header>

      <div class="p-5 border align-self-center">
        <div class="content">
            <div class="title m-b-md">
                Ahtziri
            </div>
            <div class="links">
                <a href="https://google.com">Ingresar</a>
                <a href="https://google.com">Respoder Cuestionario</a>
            </div>
        </div>
    </div>

    </body>
</html>
