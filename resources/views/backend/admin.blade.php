<html x-data="data()" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>..Intra-Net DirComunicaciones..</title>

     <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/antena-parabolica.svg" type="image/png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="css/tailwind2.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="flex h-screen bg-gray-800 " :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-gray-800 md:block">
            <div>
                <div class="text-white">
                    <div class="flex p-2 bg-gray-800">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>
                        <a href="{{ route('dashboard') }}" class="py-3 px-2 items-center">
                            <div class="flex">
                                <p class="text-xl text-green-600 font-semibold">Dir</p>
                                <p class="text-xl font-semibold">Comunicaciones</p> <br>
                            </div>
                            <div>
                                <p class="text-xl text-green-600 font-semibold text-center -mt-2">Amazonas</p>
                            </div>
                        </a>
                    </div>
                    <div class="">
                        <div class="">
                            <div class="text-center">
                                <a href="{{ route('profile.show') }}">
                                    <img class="ml-24 hidden h-16 w-16 rounded-full sm:block object-cover border-2 border-green-300 hover:border-yellow-500"
                                    src="{{Auth::user()->profile_photo_url}}" alt="{{Auth::user()->name}}">
                                </a>
                            </div>

                            <p class="font-bold text-base  text-gray-300 pt-1 text-center uppercase ">
                                {{ Auth::user()->apellido }}
                            </p>
                            <p class="font-bold text-base text-gray-500 text-center ">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div>
                        <ul class="leading-10 ml-2">
                            <p class="ml-2 border-green-500 border-b-2 mb-1 text-sm text-gray-50 opacity-80">Operaciones</p>
                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href="{{ route('comision.index')}}">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase"
                                        class="h-6 w-6 svg-inline--fa fa-briefcase fa-w-16" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-sm">COMISIONES</span>
                                </a>
                            </li>
                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href="{{ route('informe.index')}}">
                                    <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="file"
                                        class="h-6 w-6 svg-inline--fa fa-file fa-w-12" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                        <path fill="currentColor"
                                            d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zM332.1 128H256V51.9l76.1 76.1zM48 464V48h160v104c0 13.3 10.7 24 24 24h104v288H48z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-sm">INFORMES</span>
                                </a>
                            </li>
                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href="#">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tools" class="svg-inline--fa fa-tools fa-w-16 h-7 w-7" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M501.1 395.7L384 278.6c-23.1-23.1-57.6-27.6-85.4-13.9L192 158.1V96L64 0 0 64l96 128h62.1l106.6 106.6c-13.6 27.8-9.2 62.3 13.9 85.4l117.1 117.1c14.6 14.6 38.2 14.6 52.7 0l52.7-52.7c14.5-14.6 14.5-38.2 0-52.7zM331.7 225c28.3 0 54.9 11 74.9 31l19.4 19.4c15.8-6.9 30.8-16.5 43.8-29.5 37.1-37.1 49.7-89.3 37.9-136.7-2.2-9-13.5-12.1-20.1-5.5l-74.4 74.4-67.9-11.3L334 98.9l74.4-74.4c6.6-6.6 3.4-17.9-5.7-20.2-47.4-11.7-99.6.9-136.6 37.9-28.5 28.5-41.9 66.1-41.2 103.6l82.1 82.1c8.1-1.9 16.5-2.9 24.7-2.9zm-103.9 82l-56.7-56.7L18.7 402.8c-25 25-25 65.5 0 90.5s65.5 25 90.5 0l123.6-123.6c-7.6-19.9-9.9-41.6-5-62.7zM64 472c-13.2 0-24-10.8-24-24 0-13.3 10.7-24 24-24s24 10.7 24 24c0 13.2-10.7 24-24 24z"></path>
                                    </svg>
                                    <span class="ml-4 text-sm">ACTIVIDADES</span>
                                </a>
                            </li>
                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href="#">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="radiation" class="svg-inline--fa fa-radiation fa-w-16 h-7 w-7 " role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                        <path fill="currentColor" d="M328.2 255.8h151.6c9.1 0 16.8-7.7 16.2-16.8-5.1-75.8-44.4-142.2-102.5-184.2-7.4-5.3-17.9-2.9-22.7 4.8L290.4 188c22.6 14.3 37.8 39.2 37.8 67.8zm-37.8 67.7c-12.3 7.7-26.8 12.4-42.4 12.4-15.6 0-30-4.7-42.4-12.4L125.2 452c-4.8 7.7-2.4 18.1 5.6 22.4C165.7 493.2 205.6 504 248 504s82.3-10.8 117.2-29.6c8-4.3 10.4-14.8 5.6-22.4l-80.4-128.5zM248 303.8c26.5 0 48-21.5 48-48s-21.5-48-48-48-48 21.5-48 48 21.5 48 48 48zm-231.8-48h151.6c0-28.6 15.2-53.5 37.8-67.7L125.2 59.7c-4.8-7.7-15.3-10.2-22.7-4.8C44.4 96.9 5.1 163.3 0 239.1c-.6 9 7.1 16.7 16.2 16.7z"></path>
                                    </svg>
                                    <span class="ml-4 text-sm">MEDICIONES RNI</span>
                                </a>
                            </li>
                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href="#">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                        class="h-6 w-6 svg-inline--fa fa-eye fa-w-18" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-sm">OBSERVACIONES</span>
                                </a>
                            </li>
                            @if (Auth::user()->rol->name == 'Director(a)')
                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href="#">
                                    <svg aria-hidden="true" class="h-6 w-6" focusable="false" data-prefix="fas" data-icon="tasks" class="svg-inline--fa fa-tasks fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M139.61 35.5a12 12 0 0 0-17 0L58.93 98.81l-22.7-22.12a12 12 0 0 0-17 0L3.53 92.41a12 12 0 0 0 0 17l47.59 47.4a12.78 12.78 0 0 0 17.61 0l15.59-15.62L156.52 69a12.09 12.09 0 0 0 .09-17zm0 159.19a12 12 0 0 0-17 0l-63.68 63.72-22.7-22.1a12 12 0 0 0-17 0L3.53 252a12 12 0 0 0 0 17L51 316.5a12.77 12.77 0 0 0 17.6 0l15.7-15.69 72.2-72.22a12 12 0 0 0 .09-16.9zM64 368c-26.49 0-48.59 21.5-48.59 48S37.53 464 64 464a48 48 0 0 0 0-96zm432 16H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z"></path>
                                    </svg>
                                    <span class="ml-4 text-sm">BANDEJA INFORMES</span>
                                </a>
                            </li>
                            @endif
                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href=" {{ route('estacion.index') }}">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wifi"
                                        class="h-6 w-6 svg-inline--fa fa-wifi fa-w-20" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                        <path fill="currentColor"
                                            d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-sm">ESTACIONES</span>
                                </a>
                            </li>

                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href=" #">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="exclamation-triangle" class="h-6 w-6 svg-inline--fa fa-exclamation-triangle fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor" d="M569.517 440.013C587.975 472.007 564.806 512 527.94 512H48.054c-36.937 0-59.999-40.055-41.577-71.987L246.423 23.985c18.467-32.009 64.72-31.951 83.154 0l239.94 416.028zM288 354c-25.405 0-46 20.595-46 46s20.595 46 46 46 46-20.595 46-46-20.595-46-46-46zm-43.673-165.346l7.418 136c.347 6.364 5.609 11.346 11.982 11.346h48.546c6.373 0 11.635-4.982 11.982-11.346l7.418-136c.375-6.874-5.098-12.654-11.982-12.654h-63.383c-6.884 0-12.356 5.78-11.981 12.654z"></path>
                                    </svg>
                                    <span class="ml-4 text-sm">ALERTAS</span>
                                </a>
                            </li>

                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href=" #">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="boxes"
                                        class="h-6 w-6 svg-inline--fa fa-boxes fa-w-18" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M560 288h-80v96l-32-21.3-32 21.3v-96h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16zm-384-64h224c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16h-80v96l-32-21.3L256 96V0h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16zm64 64h-80v96l-32-21.3L96 384v-96H16c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-sm">INVENTARIO</span>
                                </a>
                            </li>

                            <li class="relative px-1 ">
                                <a class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-green-500"
                                    href="#">

                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book" 
                                    class="h-6 w-6 svg-inline--fa fa-book fa-w-14" role="img" 
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z">
                                        </path>
                                    </svg>
                                    <span class="ml-4 text-sm">REPOSITORIO</span>
                                </a>
                            </li>

                            <li class="relative px-1">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button onclick="event.preventDefault(); this.closest('form').submit();" 
                                    class="inline-flex items-center w-full text-sm font-semibold text-white transition-colors duration-150 cursor-pointer hover:text-red-500">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" 
                                        class="w-6 h-6" role="img" 
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
                                        <span class="ml-4 text-sm">
                                            {{ __('SALIR') }}
                                        </span>
                                    </button>
                                    
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        
        <div class="flex flex-col flex-1 w-full overflow-y-auto">
            <header class="z-40 py-2  bg-gray-800  ">
                <div class="flex items-center justify-between h-2 px-6 mx-auto">
                    <!-- Mobile hamburger -->
                    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="toggleSideMenu" aria-label="Menu">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                </div>
            </header>

            <main class="">
                
                <div class="grid mb-4 pb-10 px-8 mx-4 h-full rounded-3xl bg-gray-100 border-4 border-green-400">
                    
                    @yield('main')
                    
                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        function data() {

            return {

                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
                isNotificationsMenuOpen: false,
                toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                },
                closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                },
                isProfileMenuOpen: false,
                toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                },
                closeProfileMenu() {
                    this.isProfileMenuOpen = false
                },
                isPagesMenuOpen: false,
                togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                },

            }
        }

    </script>
    <script>
        var chart = document.querySelector('#chartline')
        var options = {
            series: [{
                name: '2020',
                type: 'area',
                data: [15, 7, 31, 47, 31, 43, 26, 41, 31, 47, 33, 12,]
            }, {
                name: '2021',
                type: 'line',
                data: [10, 20, 45, 61, 43, 54, 37, 52, 44, 61, 43, 45,]
            }],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            stroke: {
                curve: 'smooth'
            },
            fill: {
                type: 'solid',
                opacity: [0.35, 1],
            },
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep ',
                'Oct', 'Nov','Dic',''
            ],
            markers: {
                size: 0
            },
            yaxis: [{
                    title: {
                        text: 'Comisiones Realizadas',
                    },
                },
            ],
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function(y) {
                        if (typeof y !== "undefined") {
                            return y.toFixed(0) + " trabajos";
                        }
                        return y;
                    }
                }
            }
        };
        var chart = new ApexCharts(chart, options);
        chart.render();

    </script>
</body>

</html>
