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
                background-color: #ffffd2;
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

            h4.card-title{
                color: #a0522d;
            }

            /* tagスタイル */
            p.tag {
                position: relative;
                display: inline-block;
                margin: 0 .6em .6em .6em;
                padding: .6em .6em .6em 1.2em;
                line-height: 1;
                color: #000;
                text-decoration: none;
                background-color: #dcdcdc;
            }
            p.tag:before {
                position: absolute;
                top: 0;
                left: -1em;
                content: '';
                border-width: 1.1em 1em 1.1em 0;
                border-style: solid;
                border-color: transparent #dcdcdc transparent transparent;
            }
            p.tag:after {
                position: absolute;
                top: center;
                left: 0;
                content: '●';
                color: #000;
            }

            /* メインの中のスタイル */
            div.maincontent{
                margin-top: 40px;
                font-family: serif;
            }

            /* top画面のカードの幅指定 */
            .card-style{
                width: 16rem;
            }

            /* カード説明開始位置指定 */
            .card-description{
                /* margin: 200px 0px */
            }

            header {
                position: relative;
                height: 50vh;
                background: url(/img/top_image_2.jpg) center / cover;
                background-position: 50% 60%;
            }

            header::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-color: rgba(0,0,0,0.5);
            }

            .header-content {
                position: absolute;
                top: 10%;
                left: 5%;
                /* transform: translate(-50%, -50%); */
                font-family:sans-serif;
                font-size:30px;
                font-weight:bold;
                letter-spacing:5px;
                color:#fff;
                font-family:"MS Pゴシック",sans-serif;
            }

            .error_message{
                font-family:"MS Pゴシック",sans-serif;
                font-size: 20px;
                color: #dc3545;
            }

            #formBox{
                background-color: #faf0e6;
                height: 78vh;
                border-radius: 30px;
            }

            .form_position{
                padding-top: 30px;
                padding-left: 120px;
            }

            .textarea{
                height: 150px !important;
                resize: none;
            }

            .form-title{
                margin-bottom: 0px !important;
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
                            <a href="{{url('/fishing/index')}}" class="text-dark top_headr">交流所</a>
                            <!-- <a href="{{url('/fishing/index')}}" class="text-dark top_headr">みんなの釣果</a> -->
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
                </div>
        @yield('main')
        </body>
    </div>
</html>
