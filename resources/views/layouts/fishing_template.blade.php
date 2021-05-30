<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>釣りの遊び場</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- css -->
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
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
    </head>
    <body>

        <div class="position-ref">
            <!-- ヘッダー -->
            <header class="links full-height d-flex align-items-center">
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
