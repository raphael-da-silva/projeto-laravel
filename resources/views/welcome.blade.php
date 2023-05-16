<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Teste prático - Restaurante</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            .main{
                max-width: 500px;
            }
        </style>
    </head>
    <body class="main mt-5 m-auto">
        <div class=" bg-dark text-white p-4 text-center">
            <div class="">
                <h3 class="bg-light p-2 text-dark">
                    Teste prático de PHP.
                </h3>

                <div class="alert alert-warning p-2">
                    <h5>
                        Ferramentas usadas/stack:
                    </h5>

                    <div>
                        - PHP <br>
                        - Laravel <br>
                        - Bootstrap <br>
                        - MySql
                    </div>

                    <hr>
                    
                    Autor: Raphael da Silva
                    [<a href="https://github.com/raphael-da-silva" target="_blank">Perfil no Github</a>]

                    <hr>
                </div>
            </div>

            @if (Route::has('login'))
                <div class="bg-grey p-1">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-success">
                            Dashboard/Area restrita [vc já está logado]
                        </a>
                    @else
                        <div class="badge d-block text-info fw-bold mb-3 m-0">
                            Utilize o botão abaixo para começar
                        </div>

                        <a href="{{ route('login') }}" class="btn btn-info">efetuar Log in</a>

                        @if (Route::has('register'))
                            <!-- <a href="{{ route('register') }}" class="btn btn-info">Registrar</a> -->
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
