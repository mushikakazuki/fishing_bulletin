<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>釣りの遊び場</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- css -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/button_effects.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tag.css') }}">
        <link rel="stylesheet" href="{{ asset('css/chat_style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/hamburger-hader.css') }}">

        <!-- js -->
        <script src="{{ asset('js/app.js')}}"></script>

        <!-- favicon -->
        <link rel="shortcut icon" href="{{ asset('img/釣りアイコン.png') }}">

        <script>
            // スクロール禁止
            function no_scroll() {
                // PCでのスクロール禁止
                document.addEventListener("mousewheel", scroll_control, { passive: false });
                // スマホでのタッチ操作でのスクロール禁止
                document.addEventListener("touchmove", scroll_control, { passive: false });
            }
            // スクロール禁止解除
            function return_scroll() {
                // PCでのスクロール禁止解除
                document.removeEventListener("mousewheel", scroll_control, { passive: false });
                // スマホでのタッチ操作でのスクロール禁止解除
                document.removeEventListener('touchmove', scroll_control, { passive: false });
            }

            // スクロール関連メソッド
            function scroll_control(event) {
                event.preventDefault();
            }

            scroll_flg = true
            $(function() {
                $('.btn-gNav').on("click", function(){
                    $(this).toggleClass('open');
                    $('#gNav').toggleClass('open');
                    if(scroll_flg) {
                        scroll_flg = false;
                        no_scroll();
                    }
                    else {
                        scroll_flg = true;
                        return_scroll();
                    }
                });
            });
        </script>

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
            .links > div > a {
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

            /* メインの中のスタイル */
            div.maincontent{
                margin-top: 40px;
                font-family: serif;
            }

            /* top画面のカードの幅指定 */
            .card-style{
                width: 16rem;
            }

            .sub-header {
                position: relative;
                height: 50vh;
                background: url(/img/top_image_2.jpg) center / cover;
                background-position: 50% 60%;
            }

            .sub-header::before {
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

            .card-title {
                vertical-align: top;
                width: 200px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            .initcontent{
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                max-height: 48px;
                height: 48px;
            }

            .res-style{
                cursor: pointer;
                cursor: hand;
                background: #aaaaaa;
                color:white;
                padding: 0px 10px;
                border-radius: 10px;
            }

            .chat_rescontent{
                border-bottom: solid #AAA;
            }

            .button_grop{
                display: flex;
                justify-content: flex-end;
            }

            .img-height {
                max-height: 123.188px;
                height: 100%;
                width: 100%;
            }

            .checkbox-style{
                padding: 50px;
                gap: 80px;
                flex-wrap: wrap;
            }


            .top-card-css {
                gap: 50px;
                justify-content: center;
            }

            /* スマホ版時のCSS */
            @media screen and (max-width: 640px) {
                .checkbox-style{
                    padding: 50px;
                    gap: 50px;
                    flex-wrap:wrap;
                }

                .form_position {
                    padding-top: 20px;
                    padding-left: 0px;
                }

                .top-card-style {
                    justify-content: center;
                }

                .top-card-css {
                    flex-direction: column;
                    align-items: center;
                }
            }
        </style>
    </head>
    <body>

        <div class="position-ref">
            <!-- ヘッダー -->
            <header class="links full-height d-flex align-items-center" style="background-color: snow;">
                <a href="{{ url('/') }}" style="margin-right: auto">
                    <img src="/img/ルアーアイコン2.svg" style="
                    width: 100px; height: 80px;">
                </a>

                <a href="{{url('/fishing/index')}}" class="text-dark top_headr d-none d-sm-block">釣り初心者</a>
                <a href="{{url('/fishing/index')}}" class="text-dark top_headr d-none d-sm-block">交流所</a>
                <a href="{{url('/fishing/index')}}" class="text-dark top_headr d-none d-sm-block">イベント</a>

                @if (Route::has('login'))
                    <div class="links d-none d-sm-block">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register')  }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <!-- スマホ時のCSS -->
                <div id="hamburger" class="d-block d-sm-none">
                    <p class="btn-gNav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </p>
                    <nav id="gNav" class="d-flex flex-column align-items-center justify-content-center links" style="gap: 50px">
                        <a href="{{url('/fishing/index')}}" class="text-dark top_headr">釣り初心者</a>
                        <a href="{{url('/fishing/index')}}" class="text-dark top_headr">交流所</a>
                        <a href="{{url('/fishing/index')}}" class="text-dark top_headr">イベント</a>
                        @if (Route::has('login'))
                            @auth
                                <div>
                                    <a href="{{ url('/home') }}" class="text-dark">Home</a>
                                </div>
                            @else
                            <div>
                                <a href="{{ route('login') }}" class="text-dark">Login</a>
                            </div>
                                @if (Route::has('register'))
                                    <div>
                                        <a href="{{ route('register') }}" class="text-dark">Register</a>
                                    </div>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </nav>

                </div>




            </header>
        </div>
        @yield('main')

        </body>
    </div>
</html>
