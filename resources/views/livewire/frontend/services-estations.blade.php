<div>
    <div class="flex my-3 ">
        <input wire:model='search' class="form-control rounded-lg mr-sm-2 w-4/6 m-auto mr-6" type="search"
            placeholder="Búsqueda" aria-label="Search">

        <select class="rounded-lg mr-4" wire:model="tipo" name="" id="">
            <option selected value="">Tipos</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select>

        <select class="rounded-lg mr-4" wire:model="sistema" name="" id="">
            <option selected value="">Sistema</option>
            <option value="VHF">VHF</option>
            <option value="HF">HF</option>
        </select>

        <select class="rounded-lg mr-4" wire:model="provinciaSearch" name="" id="">
            <option selected value="">Provincia</option>
            <option value="101">Chachapoyas</option>
            <option value="102">Bagua</option>
            <option value="103">Bongara</option>
            <option value="105">Luya</option>
            <option value="106">Rodriguez de Mendoza</option>
            <option value="104">Condorcanqui</option>
            <option value="107">Utcubamba</option>
        </select>

        <select class="rounded-lg mr-4" wire:model="estado" name="" id="">
            <option selected value="">Estados</option>
            <option value="OPERATIVO">OPERATIVO</option>
            <option value="INOPERATIVO">INOPERATIVO</option>
            <option value="MANTENIMIENTO">MANTENIMIENTO</option>
            <option value="INEXISTENTE">INEXISTENTE</option>
            <option value="NO VERIFICADO">NO VERIFICADO</option>
        </select>

    </div>
    <div class="container mx-auto rounded-md bg-gray-100 py-8 justify-center md:grid-cols-3 grid grid-cols-1 gap-2 ">
        @foreach ($estations as $estation)
            @if ($estation->id != '1')
                <div class="bg-white w-90 shadow-2xl rounded-xl">
                    <div class="p-2">
                        <div class="flex justify-center">
                            <div class="flex justify-center">
                                <div class="text-center">
                                    <a
                                        class="text-lg text-blue-500 font-bold text-center uppercase flex items-center justify-center">
                                        <i>
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                data-icon="broadcast-tower"
                                                class="mr-2 svg-inline--fa fa-broadcast-tower fa-w-20 w-8 h-8"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                <path fill="currentColor"
                                                    d="M150.94 192h33.73c11.01 0 18.61-10.83 14.86-21.18-4.93-13.58-7.55-27.98-7.55-42.82s2.62-29.24 7.55-42.82C203.29 74.83 195.68 64 184.67 64h-33.73c-7.01 0-13.46 4.49-15.41 11.23C130.64 92.21 128 109.88 128 128c0 18.12 2.64 35.79 7.54 52.76 1.94 6.74 8.39 11.24 15.4 11.24zM89.92 23.34C95.56 12.72 87.97 0 75.96 0H40.63c-6.27 0-12.14 3.59-14.74 9.31C9.4 45.54 0 85.65 0 128c0 24.75 3.12 68.33 26.69 118.86 2.62 5.63 8.42 9.14 14.61 9.14h34.84c12.02 0 19.61-12.74 13.95-23.37-49.78-93.32-16.71-178.15-.17-209.29zM614.06 9.29C611.46 3.58 605.6 0 599.33 0h-35.42c-11.98 0-19.66 12.66-14.02 23.25 18.27 34.29 48.42 119.42.28 209.23-5.72 10.68 1.8 23.52 13.91 23.52h35.23c6.27 0 12.13-3.58 14.73-9.29C630.57 210.48 640 170.36 640 128s-9.42-82.48-25.94-118.71zM489.06 64h-33.73c-11.01 0-18.61 10.83-14.86 21.18 4.93 13.58 7.55 27.98 7.55 42.82s-2.62 29.24-7.55 42.82c-3.76 10.35 3.85 21.18 14.86 21.18h33.73c7.02 0 13.46-4.49 15.41-11.24 4.9-16.97 7.53-34.64 7.53-52.76 0-18.12-2.64-35.79-7.54-52.76-1.94-6.75-8.39-11.24-15.4-11.24zm-116.3 100.12c7.05-10.29 11.2-22.71 11.2-36.12 0-35.35-28.63-64-63.96-64-35.32 0-63.96 28.65-63.96 64 0 13.41 4.15 25.83 11.2 36.12l-130.5 313.41c-3.4 8.15.46 17.52 8.61 20.92l29.51 12.31c8.15 3.4 17.52-.46 20.91-8.61L244.96 384h150.07l49.2 118.15c3.4 8.16 12.76 12.01 20.91 8.61l29.51-12.31c8.15-3.4 12-12.77 8.61-20.92l-130.5-313.41zM271.62 320L320 203.81 368.38 320h-96.76z">
                                                </path>
                                            </svg>
                                        </i>
                                        {{ $estation->name }}
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="flex ml-3 my-2">
                            <h3 class="text-base font-semibold">Latitud :</h3>
                            <p class="font-light  text-gray-500 text-base ml-2">{{ $estation->latitud }} SUR</p>
                        </div>
                        <div class="flex ml-3 my-2 ">
                            <h3 class="text-base font-semibold">Longitud :</h3>
                            <p class="font-light text-gray-500 text-base ml-2">{{ $estation->longitud }} OESTE</p>
                        </div>

                        <div class="flex ml-3 my-2">
                            <h3 class="text-base font-semibold">Altitud :</h3>
                            @if ($estation->altitud)
                                <p class="font-light text-gray-600 text-base ml-2">{{ $estation->altitud }} m.s.n.m</p>
                            @else
                                <p class="font-light text-gray-600 text-base ml-2">Sin registro</p>
                            @endif
                        </div>

                        <div class="flex ml-3 my-2">
                            <h3 class="text-base font-semibold">Tipo :</h3>
                            <p class="font-normal text-blue-700 text-base ml-2">{{ $estation->tipo }}</p>
                        </div>
                        
                        <div class="flex ml-3 my-2">
                            <h3 class="text-base font-semibold">Sistema :</h3>
                            <p class="font-normal text-blue-700 text-base ml-2">{{ $estation->sistema }}</p>
                        </div>

                        <div class="flex ml-3 my-2">
                            <h3 class="text-base font-semibold">Provincia :</h3>
                            <p class="font-normal uppercase text-blue-700 text-base ml-2">
                                {{ $estation->ubigeo->provincia }}</p>
                        </div>
                        <div class="flex ml-3 my-2">
                            <h3 class="text-base font-semibold">Distrito :</h3>
                            <p class="font-normal uppercase text-blue-700 text-base ml-2">
                                {{ $estation->ubigeo->distrito }}</p>
                        </div>
                        <div class="flex ml-3 my-2 items-center">
                            <h3 class="text-base font-semibold">Ubicación Google Maps :</h3>
                            <a href="{{ $estation->urlgooglearth }}"
                                class="text-blue-500 hover:text-gray-500 cursor-pointer ml-4" target="_blank">
                                <svg class="svg-inline--fa fa-globe fa-w-16 w-8 h-8 m-auto" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                                    <path fill="currentColor"
                                        d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <div class="flex justify-center mt-1 text-base  text-center items-center">
                            @if ($estation->estado == 'OPERATIVO')
                                <p
                                    class="font-bold w-full px-2 py-1 rounded-lg text-white ml-3 bg-green-800 my-2">
                                    OPERATIVO
                                </p>
                            @endif
                            @if ($estation->estado == 'INOPERATIVO')
                                <p
                                    class="font-bold  w-full px-2 py-1 rounded-lg text-white ml-3 bg-red-800 my-2">
                                    INOPERATIVO
                                </p>
                            @endif

                            @if ($estation->estado == 'MANTENIMIENTO')
                                <p
                                    class="font-bold  w-full px-2 py-1 rounded-lg text-white ml-3 bg-yellow-500 my-2">
                                    MANTENIMIENTO
                                </p>
                            @endif

                            @if ($estation->estado == 'INEXISTENTE')
                                <p
                                    class="font-bold  w-full px-2 py-1 rounded-lg text-white ml-3 bg-gray-800 my-2">
                                    INEXISTENTE
                                </p>
                            @endif

                            @if ($estation->estado == 'NO VERIFICADO')
                                <p
                                    class="font-bold  w-full px-2 py-1 rounded-lg ml-3 text-white bg-blue-500 my-2">
                                    NO VERIFICADO
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="mt-4">
        {{ $estations->links() }}
    </div>
</div>
