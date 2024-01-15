@extends('backend.admin')
@section('main')
    <div class=" mt-2 w-full font-extrabold text-gray-600">
        <div class="flex justify-between">
            <a href="{{ route('estacion.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                <p class="text-xs my-auto">Regresar</p>
            </a>
            <a href="#"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                <p class="text-xs my-auto">Imprimir</p>
            </a>
        </div>
        <div class="flex justify-center items-center -mt-8 mb-2">
            <i>
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="broadcast-tower"
                    class="mr-2 svg-inline--fa fa-broadcast-tower fa-w-20 w-8 h-8" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                    <path fill="currentColor"
                        d="M150.94 192h33.73c11.01 0 18.61-10.83 14.86-21.18-4.93-13.58-7.55-27.98-7.55-42.82s2.62-29.24 7.55-42.82C203.29 74.83 195.68 64 184.67 64h-33.73c-7.01 0-13.46 4.49-15.41 11.23C130.64 92.21 128 109.88 128 128c0 18.12 2.64 35.79 7.54 52.76 1.94 6.74 8.39 11.24 15.4 11.24zM89.92 23.34C95.56 12.72 87.97 0 75.96 0H40.63c-6.27 0-12.14 3.59-14.74 9.31C9.4 45.54 0 85.65 0 128c0 24.75 3.12 68.33 26.69 118.86 2.62 5.63 8.42 9.14 14.61 9.14h34.84c12.02 0 19.61-12.74 13.95-23.37-49.78-93.32-16.71-178.15-.17-209.29zM614.06 9.29C611.46 3.58 605.6 0 599.33 0h-35.42c-11.98 0-19.66 12.66-14.02 23.25 18.27 34.29 48.42 119.42.28 209.23-5.72 10.68 1.8 23.52 13.91 23.52h35.23c6.27 0 12.13-3.58 14.73-9.29C630.57 210.48 640 170.36 640 128s-9.42-82.48-25.94-118.71zM489.06 64h-33.73c-11.01 0-18.61 10.83-14.86 21.18 4.93 13.58 7.55 27.98 7.55 42.82s-2.62 29.24-7.55 42.82c-3.76 10.35 3.85 21.18 14.86 21.18h33.73c7.02 0 13.46-4.49 15.41-11.24 4.9-16.97 7.53-34.64 7.53-52.76 0-18.12-2.64-35.79-7.54-52.76-1.94-6.75-8.39-11.24-15.4-11.24zm-116.3 100.12c7.05-10.29 11.2-22.71 11.2-36.12 0-35.35-28.63-64-63.96-64-35.32 0-63.96 28.65-63.96 64 0 13.41 4.15 25.83 11.2 36.12l-130.5 313.41c-3.4 8.15.46 17.52 8.61 20.92l29.51 12.31c8.15 3.4 17.52-.46 20.91-8.61L244.96 384h150.07l49.2 118.15c3.4 8.16 12.76 12.01 20.91 8.61l29.51-12.31c8.15-3.4 12-12.77 8.61-20.92l-130.5-313.41zM271.62 320L320 203.81 368.38 320h-96.76z">
                    </path>
                </svg>
            </i>
            <h2 class="text-center  text-xl">{{ $estation->name }}</h2>
        </div>
        <div class="tab-content mb-2">
            <div class="pb-2 ">
                <div class="bg-white rounded-lg w-full mb-2 p-4 shadow">
                    <div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">PROVINCIA</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span
                                    class="text-base block font-bold uppercase">{{ $estation->ubigeo->provincia }}</span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">DISTRITO</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span
                                    class="text-base block font-bold uppercase">{{ $estation->ubigeo->distrito }}</span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">LATITUD</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-bold uppercase">{{ $estation->latitud }}
                                    SUR</span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">LONGITUD</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-bold uppercase">{{ $estation->longitud }}
                                    OESTE</span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">ALTITUD</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-bold uppercase">
                                    @if ($estation->altitud)
                                        {{ $estation->altitud }} m.s.n.m.
                                    @else
                                        Sin registro
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">ESTADO</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-extrabold">
                                    @livewire('estation.estado-update', ['estation' => $estation], key($estation->id))
                                </span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">SISTEMA</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-extrabold">{{ $estation->sistema }}</span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">TIPO</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-extrabold">{{ $estation->tipo }}</span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">Responsable</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-extrabold">
                                    @if ($estation->responsable)
                                        {{ $estation->responsable }}
                                    @else
                                        Sin registro
                                    @endif
                                </span>
                            </div>

                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">Telefono</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class="text-base  block font-extrabold">
                                    @if ($estation->resptelefono)
                                        {{ $estation->resptelefono }}
                                    @else
                                        Sin registro
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600 items-center">
                            <div class="w-3/12">
                                <span class="text-base text-gray-900 block">Google Maps</span>
                            </div>
                            <div class="w-1/12">
                                <span class="text-base block">:</span>
                            </div>
                            <div class="w-9/12 ">
                                <a href="{{ $estation->urlgooglearth }}"
                                    class="text-green-500 hover:text-green-700 cursor-pointer mx-2 " target="_blank">
                                    <svg class="svg-inline--fa fa-globe fa-w-16 w-8 h-8" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                        <path fill="currentColor"
                                            d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div x-data="{
                        openTab: 1,
                        activeClass: 'text-blue-700 border bg-gray-100 rounded-lg font-bold',
                        inactive: 'bg-white inline-block py-2 px-4 font-semibold'
                    }">
                        <ul class="list-reset flex mt-4">
                            <li @click="openTab = 1" class="mr-1 cursor-pointer">
                                <a :class="openTab === 1 ? activeClass : inactive"
                                    class="bg-white py-2 px-4 flex items-center ">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="boxes"
                                        class="h-6 w-6 svg-inline--fa fa-boxes fa-w-18 mr-2" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M560 288h-80v96l-32-21.3-32 21.3v-96h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16zm-384-64h224c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16h-80v96l-32-21.3L256 96V0h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16zm64 64h-80v96l-32-21.3L96 384v-96H16c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16z">
                                        </path>
                                    </svg>
                                    <span>Inventario</span>
                                </a>
                            </li>
                            <li @click="openTab = 2" class="mr-1 cursor-pointer">
                                <a :class="openTab === 2 ? activeClass : inactive"
                                    class="bg-white py-2 px-4 flex items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase"
                                        class="h-4 w-4 svg-inline--fa fa-briefcase fa-w-16 mr-2" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M320 336c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-48H0v144c0 25.6 22.4 48 48 48h416c25.6 0 48-22.4 48-48V288H320v48zm144-208h-80V80c0-25.6-22.4-48-48-48H176c-25.6 0-48 22.4-48 48v48H48c-25.6 0-48 22.4-48 48v80h512v-80c0-25.6-22.4-48-48-48zm-144 0H192V96h128v32z">
                                        </path>
                                    </svg>
                                    <span>Comisiones</span>
                                </a>
                            </li>
                            <li @click="openTab = 3" class="mr-1 cursor-pointer">
                                <a :class="openTab === 3 ? activeClass : inactive"
                                    class="bg-white py-2 px-4 flex items-center">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye"
                                        class="h-4 w-4 svg-inline--fa fa-eye fa-w-18 mr-2" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>
                                    <span>Observaciones</span>
                                </a>
                            </li>
                            <li @click="openTab = 4" class="mr-1 cursor-pointer">
                                <a :class="openTab === 4 ? activeClass : inactive"
                                    class="bg-white py-2 px-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="h-4 w-4 svg-inline--fa fa-eye fa-w-18 mr-2">
                                        <path fill="currentColor"
                                            d="M96 0C107.5 0 117.4 8.19 119.6 19.51L121.1 32H541.8C562.1 32 578.3 52.25 572.6 72.66L518.6 264.7C514.7 278.5 502.1 288 487.8 288H170.7L179.9 336H488C501.3 336 512 346.7 512 360C512 373.3 501.3 384 488 384H159.1C148.5 384 138.6 375.8 136.4 364.5L76.14 48H24C10.75 48 0 37.25 0 24C0 10.75 10.75 0 24 0H96zM128 464C128 437.5 149.5 416 176 416C202.5 416 224 437.5 224 464C224 490.5 202.5 512 176 512C149.5 512 128 490.5 128 464zM512 464C512 490.5 490.5 512 464 512C437.5 512 416 490.5 416 464C416 437.5 437.5 416 464 416C490.5 416 512 437.5 512 464z" />
                                    </svg>
                                    <span class="text-sm">Requerimientos</span>
                                </a>
                            </li>

                            <li @click="openTab = 5" class="mr-1 cursor-pointer">
                                <a :class="openTab === 5 ? activeClass : inactive"
                                    class="bg-white py-2 px-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 mr-2">
                                        <path fill="currentColor"
                                            d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                                    </svg>
                                    <span class="text-xs">Galeria</span>
                                </a>
                            </li>

                            <li @click="openTab = 6" class="mr-1 cursor-pointer">
                                <a :class="openTab === 6 ? activeClass : inactive"
                                    class="bg-white py-2 px-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
                                        <path
                                            d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z">
                                        </path>
                                    </svg>
                                    <span class="text-sm">Actas</span>
                                </a>
                            </li>
                        </ul>


                        <div x-show="openTab === 1">
                            <div class="w-full mt-2">
                                <h2 class="text-center text-blue-700 text-lg underline">
                                    INVENTARIO DE LA ESTACION
                                </h2>
                            </div>
                            @livewire('estation.estation-inventary', ['estation' => $estation], key($estation->id))
                        </div>
                        <div x-show="openTab === 2">
                            @if ($estation->id === 0)
                            @else
                                <div class="w-full mt-2">
                                    <h2 class="text-center text-blue-700 text-lg underline">
                                        COMISIONES REALIZADAS A LA ESTACION
                                    </h2>
                                </div>
                                @livewire('estation.estation-report', ['estation' => $estation], key($estation->id))
                            @endif

                        </div>
                        <div x-show="openTab === 3">
                            <div class="w-full mt-2">
                                <h2 class="text-center text-blue-700 text-lg underline">
                                    OBSERVACIONES DE LA ESTACION
                                </h2>
                            </div>
                            @livewire('estation.estation-observations', ['estation' => $estation], key($estation->id))
                        </div>

                        <div x-show="openTab === 4">
                            <div class="w-full mt-2">
                                <h2 class="text-center text-blue-700 text-lg underline">
                                    REQUERIMIENTOS DE LA ESTACION
                                </h2>
                                @livewire('estation.estation-requerimient', ['estation' => $estation], key($estation->id))
                            </div>
                        </div>

                        <div x-show="openTab === 5">
                            <div class="w-full mt-2">
                                <h2 class="text-center text-blue-700 text-lg underline">
                                    GALERIA DE FOTOGRÁFICA DE LA ESTACION
                                </h2>
                                @livewire('estation.estation-galeria', ['estation' => $estation], key($estation->id))
                            </div>
                        </div>

                        <div x-show="openTab === 6">
                            <div class="w-full mt-2">
                                <h2 class="text-center text-blue-700 text-lg underline">
                                    ACTAS DE LA ESTACION
                                </h2>
                                @livewire('estation.estatio-actas', ['estation' => $estation], key($estation->id))

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
