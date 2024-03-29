<!DOCTYPE html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Direccion de Comunicaciones | Amazonas</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/antena-parabolica.svg" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="css/slick.css">

    <!--====== Line Icons css ======-->
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--====== tailwind css ======-->
    <link rel="stylesheet" href="css/tailwind.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>

<body style="overflow: visible">

    <!--====== HEADER PART START ======-->

    <header class="">
        <div class="navigation bg-white">
            <div class="container">
                <div class="row">
                    <div class="w-full">
                        <nav class="flex items-center justify-between navbar">
                            <a class="mr-4 navbar-brand" href="{{ route('home') }}">
                                <img class="m-auto" src="images/antena-parabolica.svg" alt="Logo">
                                <h1 class="font-bold text-blue-600 text-center">Direccion de</h1>
                                <h1 class="font-bold text-blue-600 text-center">Comunicaciones</h1>
                            </a>

                            <button class="block navbar-toggler focus:outline-none md:hidden" type="button"
                                data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <!-- justify-center hidden md:flex collapse navbar-collapse sub-menu-bar -->
                            <div class="absolute left-0 hidden z-30 w-full px-5 py-3 bg-white shadow md:opacity-100 md:w-auto collapse navbar-collapse md:block top-100 mt-full md:static md:bg-transparent md:shadow-none"
                                id="navbarOne">
                                <ul
                                    class="items-center content-start mr-auto  lg:justify-center md:justify-end navbar-nav md:flex">
                                    <!-- flex flex-row mx-auto my-0 navbar-nav -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('home', ['#service']) }}">SERVICIOS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('home', ['#notice']) }}">NOTICIAS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll"
                                            href="{{ route('home', ['#institucion']) }}">INSTITUCIONAL</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="{{ route('home', ['#contact']) }}">CONTACTO</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="items-center justify-end navbar-social lg:flex">
                                @auth
                                    <div class="text-center">
                                        <a href="{{ route('dashboard') }}">
                                            <img class="ml-24 hidden h-16 w-16 rounded-full sm:block object-cover border-2 border-green-300 hover:border-yellow-500"
                                                src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                        </a>
                                    </div>
                                @else
                                    <a class="mx-2 main-btn flex" href="{{ route('login') }}">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="network-wired"
                                            class="svg-inline--fa fa-network-wired fa-w-20 w-6 h-6 mr-2" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M640 264v-16c0-8.84-7.16-16-16-16H344v-40h72c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H224c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h72v40H16c-8.84 0-16 7.16-16 16v16c0 8.84 7.16 16 16 16h104v40H64c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h304v40h-56c-17.67 0-32 14.33-32 32v128c0 17.67 14.33 32 32 32h160c17.67 0 32-14.33 32-32V352c0-17.67-14.33-32-32-32h-56v-40h104c8.84 0 16-7.16 16-16zM256 128V64h128v64H256zm-64 320H96v-64h96v64zm352 0h-96v-64h96v64z">
                                            </path>
                                        </svg>
                                        INTRANET
                                    </a>
                                @endauth
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->


    </header>

    <!--====== HEADER PART ENDS ======-->

    <!--====== SERVICES PART START ======-->
    <div>

        @yield('content')

    </div>
    <!--====== CLIENT LOGO PART START ======-->

    <section class="py-8 bg-gray-800 client-logo-area">
        <div class="container px-16">
            <div class="flex justify-between row">
                <a href="https://www.gob.pe/regionamazonas" target='_blank' class="w-48 m-2">
                    <div class="flex justify-center single-client mx-auto">
                        <img src="images/amazonass.png" alt="Logo">
                    </div> <!-- single client -->
                </a>
                <div class="w-48 m-2">
                    <div class="flex justify-center single-client">
                        <img src="images/DRTC.png" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <div class="w-48 m-2">
                    <div class="single-client">
                        <img src="images/LOGO_DIRCOM.png" alt="Logo">
                    </div> <!-- single client -->
                </div>
                <a href="https://www.gob.pe/mtc" target='_blank' class="w-48 m-2">
                    <div class="single-client">
                        <img src="images/mtc.png" alt="Logo">
                    </div> <!-- single client -->
                </a>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CLIENT LOGO PART ENDS ======-->
    <footer id="footer" class="bg-gray-800 footer-area">
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="w-full">
                        <div class="py-6 text-center">
                             <p class="text-white">
                                Area de Informatica &copy; {{ date('Y') }}
                            </p>
                            <p class="text-white font-bold">
                                Direccion Regional de Transportes y Comunicaciones-Amazonas
                            </p>
                           
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->


    <!--====== jquery js ======-->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="js/ajax-contact.js"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

    <!--====== Validator js ======-->
    <script src="js/validator.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="js/jquery.magnific-popup.min.js"></script>

    <!--====== Slick js ======-->
    <script src="js/slick.min.js"></script>

    <!--====== Main js ======-->
    <script src="js/main.js"></script>

    @stack('modals')

    @livewireScripts

</body>

</html>
