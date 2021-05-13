<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body{
                background-color: rgb(65, 125, 255);
            }
            td{
                background-color: rgb(39, 216, 172);
                /* border: 1px solid rgb(39, 216, 172); */
                text-align: center;
                color:dark blue;
            }
            td:nth-child(1){
                width: 15%;
            }
            td:nth-child(2){
                width: 5%;
            }
            td:nth-child(3){
                width: 15%;
            }
            td:nth-child(4){
                width: 10%;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                {{-- <ul>
                    @foreach ($movies as $movie)
                        <li>
                            <h2>{{$movie->title}}</h2>
                            <h4>{{$movie->duration}}</h4>
                            <h4>{{$movie->director}}</h4>
                            <h6>{{$movie->genre}}</h6>
                            <p>{{$movie->plot}}</p>
                        </li>
                    @endforeach
                </ul> --}}

                <table>
                    
                    @foreach ($movies as $movie)
                        <tr>
                            <td><h2>{{$movie->title}}</h2></td>
                            <td><h4>{{$movie->duration}}</h4></td>
                            <td><h4>{{$movie->director}}</h4></td>
                            <td><h5>{{$movie->genre}}</h5></td>
                            <td><p>{{$movie->plot}}</p></td>
                        </tr>
                    @endforeach

                </table>

            </div>
        </div>
    </body>
</html>
