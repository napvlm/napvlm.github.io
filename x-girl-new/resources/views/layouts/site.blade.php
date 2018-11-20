<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'X Girl') }}</title>

    <!-- Scripts -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.maskedinput.min.js') }}" defer></script>
    <script src="https://use.fontawesome.com/8c00668183.js" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>
<body>

    <section class="content">
        <header>
            <div class="logo">
                <a href="/">
                    <img src="./img/logo.png" alt="logo">
                </a>
            </div>

            <div class="menu">
                @include('menu')
            </div>

            <div class="burger_btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </header>

        <div class="mobile_menu">
            <div class="top_line">
                <div class="logo">
                    <a href="/">
                        <img src="./img/logo.png" alt="logo">
                    </a>
                </div>

                <div class="close">
                    <span></span>
                    <span></span>
                </div>
            </div>

            @include('menu')
        </div>
        
        <!-- LOADER -->
        <div id="loader-wrapper">
            <div class="loader" id="loader">
            <div></div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1">
            <defs>
                <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="15" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 26 -7" result="goo"></fecolormatrix>
                <feblend in="SourceGraphic" in2="goo"></feblend>
                </filter>
            </defs>
            </svg>
        </div> 
        <!-- END LOADER -->

        <div class="wrapper">

            @yield('content')

        </div>
    </section>


    @if(Route::current()->getName() == 'getProducts')
    <div class="find_more">
        <p>More Products</p>
        <img src="./img/arrow_down.png" alt="">
    </div>
    @endif


    @include('form_buy_one_click')
    @include('form_callback')

    <footer>
        <div class="footer_content">
            <div class="logo_block">
                <div class="logo">
                    <a href="/">
                        <img src="./img/footer_logo.png" alt="">
                    </a>
                </div>

                <div class="short_description">
                    <p>
                        {!! $footerTextBlock !!}
                    </p>
                </div>
            </div>
            <div class="follow_us">
                <div class="follow_arrow">
                    Follow us

                    <img src="./img/follow_arrow.png" alt="">
                </div>

                <a href="https://www.instagram.com/di_rozhkova/" target="_blank" class="insta_logo">
                    <img src="./img/instagram_logo.png" alt="">
                </a>
            </div>
        </div>
    </footer>

    @stack('script')

</body>
</html>
