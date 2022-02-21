@extends('backend.admin')
@section('main')
    <div class="text-center text-3xl mt-2 font-extrabold text-green-600">
        <h1>INTRANET DE LA DIRECCION DE COMUNICACIONES AMAZONAS</h1>
    </div>
    <div class="grid grid-cols-12 gap-6">
        <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
            <div class="col-span-12 mt-6">
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </div>
                           
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">00{{$commissions->count()}}</div>

                                    <div class="mt-1 text-base text-gray-600">Comisiones - {{date('Y')}}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wifi" class="h-6 w-6 text-yellow-600 svg-inline--fa fa-wifi fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M634.91 154.88C457.74-8.99 182.19-8.93 5.09 154.88c-6.66 6.16-6.79 16.59-.35 22.98l34.24 33.97c6.14 6.1 16.02 6.23 22.4.38 145.92-133.68 371.3-133.71 517.25 0 6.38 5.85 16.26 5.71 22.4-.38l34.24-33.97c6.43-6.39 6.3-16.82-.36-22.98zM320 352c-35.35 0-64 28.65-64 64s28.65 64 64 64 64-28.65 64-64-28.65-64-64-64zm202.67-83.59c-115.26-101.93-290.21-101.82-405.34 0-6.9 6.1-7.12 16.69-.57 23.15l34.44 33.99c6 5.92 15.66 6.32 22.05.8 83.95-72.57 209.74-72.41 293.49 0 6.39 5.52 16.05 5.13 22.05-.8l34.44-33.99c6.56-6.46 6.33-17.06-.56-23.15z">
                                    </path>
                                </svg>                                
                                <div
                                    class="bg-red-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                    <span class="flex items-center">{{$estationDef}}%</span>
                                </div>
                            </div>
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{$estations->count()}}</div>

                                    <div class="mt-1 text-base text-gray-600">Estaciones CPACC</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="radiation" class="svg-inline--fa fa-radiation fa-w-16 h-7 w-7 text-pink-600" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                    <path fill="currentColor" d="M328.2 255.8h151.6c9.1 0 16.8-7.7 16.2-16.8-5.1-75.8-44.4-142.2-102.5-184.2-7.4-5.3-17.9-2.9-22.7 4.8L290.4 188c22.6 14.3 37.8 39.2 37.8 67.8zm-37.8 67.7c-12.3 7.7-26.8 12.4-42.4 12.4-15.6 0-30-4.7-42.4-12.4L125.2 452c-4.8 7.7-2.4 18.1 5.6 22.4C165.7 493.2 205.6 504 248 504s82.3-10.8 117.2-29.6c8-4.3 10.4-14.8 5.6-22.4l-80.4-128.5zM248 303.8c26.5 0 48-21.5 48-48s-21.5-48-48-48-48 21.5-48 48 21.5 48 48 48zm-231.8-48h151.6c0-28.6 15.2-53.5 37.8-67.7L125.2 59.7c-4.8-7.7-15.3-10.2-22.7-4.8C44.4 96.9 5.1 163.3 0 239.1c-.6 9 7.1 16.7 16.2 16.7z"></path>
                                </svg>
                            </div>
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">450</div>

                                    <div class="mt-1 text-base text-gray-600">Radiacion</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="#">
                        <div class="p-5">
                            <div class="flex justify-between">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="file"
                                    class="h-7 w-7 svg-inline--fa fa-file fa-w-12 text-green-400" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                    <path fill="currentColor"
                                        d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zM332.1 128H256V51.9l76.1 76.1zM48 464V48h160v104c0 13.3 10.7 24 24 24h104v288H48z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">510</div>

                                    <div class="mt-1 text-base text-gray-600">Informes</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-span-12 mt-5">
                <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                    <div class="bg-white shadow-lg p-4" id="chartline"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
