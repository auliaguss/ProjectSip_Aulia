<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #f8f1f1;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            #home{
                width: 100%;
                height: 100%;
                background:url('/images/police.jpg');
                background-size: cover;
                -webkit-background-size:cover;
                -moz-background-size:cover;
                -o-background-size:cover;
                background-position:center center;
                filter: brightness(50%);
            }
            #home .isi{
                display:flex;
                flex-direction:column;
                padding: 2% 4%;
                background: rgba(248,241,241, 0.5);
                color:#fff;
                text-align: center;
            }
            .full-height {
                height: 100vh;
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

            .links > a {
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
            .top-right a{
                color:white;
            }
        </style>
    </head>
    <body>
        <div id="home" class="kotak">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="isi">
                <div class="title m-b-md">
                    Data Management
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
