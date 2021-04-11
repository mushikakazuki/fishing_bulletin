<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>fishing_XXX</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100vh; */
                margin: 0;
            }

            .full-height {
                height: 10vh;
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

            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .links > a.top_headr {
                font-size: 24px;
            }
        </style>
    </head>
    <body>
    <!-- <div class="width: 100%">
        <figure>
            <img src="{{ URL::to('/') }}/storage/fishing_top_s.jpg" alt="fishing_top">
        </figure>
    </div> -->

        <!-- <div class="container">
            <div class="col-sm"> -->
                <div class="position-ref full-height">
                    <div class="flex-center">
                        <!-- ヘッダー -->
                        <div class="top-left links  full-height">
                            <!-- <a href="{{ url('/') }}">Fising</a> -->
                            <a href="{{ url('/') }}">
                                <img src="/img/ルアーアイコン2.svg" style="
                                width: 100px; height: 80px;">
                            </a>

                            <a href="{{url('/fishing/index')}}" class="text-dark top_headr">釣り初心者</a>
                            <a href="{{url('/fishing/index')}}" class="text-dark top_headr">掲示板</a>
                            <a href="{{url('/fishing/index')}}" class="text-dark top_headr">みんなの釣果</a>
                            <a href="{{url('/fishing/index')}}" class="text-dark top_headr">イベント</a>
                        </div>

                        @if (Route::has('login'))
                            <div class="top-right links full-height">
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
                    </div>
                <!-- </div>
            </div> -->
            <div class="container">
                <div class="col-sm">
                    <div class="row" style="margin-top: 150px; font-family: serif;">
                        @yield('main')
                    </div>
                </div>
            </div>
        </body>
    </div>
</html>
