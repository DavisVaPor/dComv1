<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-lg font-bold text-gray-800">ESTACIONES</h1>
    </div>
    <div class="tabs">
        @foreach ($informe->commission->estations as $estation)
            <div class="border-b tab">
                <div class="border-l-2 border-transparent relative">
                    <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox" id="chck1">
                    <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label"
                        for="chck1">
                        <span class="text-grey-darkest text-xl font-bold">
                            Estacion : E-{{ $estation->id }} {{ $estation->name }}
                        </span>
                        <div class="rounded-full border border-grey w-7 h-7 flex items-center justify-center test">
                            <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24"
                                stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="6 9 12 15 18 9">
                                </polyline>
                            </svg>
                        </div>
                    </header>
                    <div class="tab-content mb-2">
                        <div class=" pb-2 text-gray-500">
                            <div class=" rounded-lg w-full mt-4 p-2 shadow">
                                <div>
                                    <div class="flex justify-between mb-2 border-b border-gray-600 items-center">
                                        <div class="flex items-center">
                                            <span class="text-base text-gray-900 block">DEPARTAMENTO :</span>
                                            <span class="text-sm text-blue-700 block font-bold uppercase ml-2 ">
                                                {{ $estation->ubigeo->departamento }}
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-base text-gray-900 block">PROVINCIA :</span>
                                            <span class="text-sm text-blue-700 block font-bold uppercase ml-2">
                                                {{ $estation->ubigeo->provincia }}
                                            </span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-base text-gray-900 block">DISTRITO :</span>
                                            <span class="text-sm text-blue-700 block font-bold uppercase ml-2">
                                                {{ $estation->ubigeo->distrito }}
                                            </span>
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
                                            <span
                                                class="text-base text-gray-900 block font-bold uppercase">{{ $estation->latitud }}</span>
                                        </div>
                                        <div class="w-3/12">
                                            <span class="text-base text-gray-900 block">LONGITUD</span>
                                        </div>
                                        <div class="w-1/12">
                                            <span class="text-base text-gray-900 block">:</span>
                                        </div>
                                        <div class="w-9/12">
                                            <span
                                                class="text-base text-gray-900 block font-bold uppercase">{{ $estation->longitud }}</span>
                                        </div>

                                        <div class="w-9/12">
                                            <span class="text-base text-gray-900 block">TIPO DE ESTACION:</span>
                                        </div>
                                        <div class="w-9/12">
                                            <span
                                                class="text-base text-gray-900 block font-extrabold">{{ $estation->tipo }}</span>
                                        </div>

                                    </div>
                                    <div class="flex mb-2 border-b border-gray-600">
                                        <div class="w-3/12">
                                            <span class="text-base text-gray-900 block">ENERGIA</span>
                                        </div>
                                        <div class="w-1/12">
                                            <span class="text-base text-gray-900 block">:</span>
                                        </div>
                                        <div class="w-9/12">
                                            <span
                                                class="text-base text-gray-900 block font-bold uppercase">{{ $estation->energia }}</span>
                                        </div>


                                        <div class="w-3/12">
                                            <span class="text-base text-gray-900 block">SINIESTRADO</span>
                                        </div>
                                        <div class="w-1/12">
                                            <span class="text-base text-gray-900 block">:</span>
                                        </div>
                                        <div class="w-9/12">
                                            <span
                                                class="text-base text-gray-900 block font-extrabold">{{ $estation->siniestrado }}</span>
                                        </div>

                                        <div class="w-3/12">
                                            <span class="text-base text-gray-900 block">ESTADO:</span>
                                        </div>
                                        <div class="w-9/12 ml-2">
                                            @if ($estation->operativo == 1)
                                                <span class="text-base text-green-500 block font-extrabold">
                                                    OPERATIVO
                                                </span>
                                            @else
                                                <span class="text-base text-red-500 block font-extrabold">
                                                    INOOPERATIVO
                                                </span>
                                            @endif
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
                                                class="bg-white py-2 px-2 flex items-center ">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="boxes"
                                                    class="h-6 w-6 svg-inline--fa fa-boxes fa-w-18 mr-2" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M560 288h-80v96l-32-21.3-32 21.3v-96h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16zm-384-64h224c8.8 0 16-7.2 16-16V16c0-8.8-7.2-16-16-16h-80v96l-32-21.3L256 96V0h-80c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16zm64 64h-80v96l-32-21.3L96 384v-96H16c-8.8 0-16 7.2-16 16v192c0 8.8 7.2 16 16 16h224c8.8 0 16-7.2 16-16V304c0-8.8-7.2-16-16-16z">
                                                    </path>
                                                </svg>
                                                <span class="text-sm">Inventario</span>
                                            </a>
                                        </li>

                                        <li @click="openTab = 3" class="mr-1 cursor-pointer">
                                            <a :class="openTab === 3 ? activeClass : inactive"
                                                class="bg-white py-2 px-2 flex items-center">
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="tools" class="h-4 w-4 svg-inline--fa fa-eye fa-w-18 mr-2"
                                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path fill="currentColor"
                                                        d="M501.1 395.7L384 278.6c-23.1-23.1-57.6-27.6-85.4-13.9L192 158.1V96L64 0 0 64l96 128h62.1l106.6 106.6c-13.6 27.8-9.2 62.3 13.9 85.4l117.1 117.1c14.6 14.6 38.2 14.6 52.7 0l52.7-52.7c14.5-14.6 14.5-38.2 0-52.7zM331.7 225c28.3 0 54.9 11 74.9 31l19.4 19.4c15.8-6.9 30.8-16.5 43.8-29.5 37.1-37.1 49.7-89.3 37.9-136.7-2.2-9-13.5-12.1-20.1-5.5l-74.4 74.4-67.9-11.3L334 98.9l74.4-74.4c6.6-6.6 3.4-17.9-5.7-20.2-47.4-11.7-99.6.9-136.6 37.9-28.5 28.5-41.9 66.1-41.2 103.6l82.1 82.1c8.1-1.9 16.5-2.9 24.7-2.9zm-103.9 82l-56.7-56.7L18.7 402.8c-25 25-25 65.5 0 90.5s65.5 25 90.5 0l123.6-123.6c-7.6-19.9-9.9-41.6-5-62.7zM64 472c-13.2 0-24-10.8-24-24 0-13.3 10.7-24 24-24s24 10.7 24 24c0 13.2-10.7 24-24 24z">
                                                    </path>
                                                </svg>
                                                <span class="text-sm">Actvidades</span>
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
                                                <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="eye" class="h-4 w-4 svg-inline--fa fa-eye fa-w-18 mr-2"
                                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <path fill="currentColor"
                                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                    </path>
                                                </svg>
                                                <span class="text-sm">Observaciones</span>
                                            </a>
                                        </li>

                                        <li @click="openTab = 6" class="mr-1 cursor-pointer">
                                            <a :class="openTab === 6 ? activeClass : inactive"
                                                class="bg-white py-2 px-2 flex items-center ">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-4 w-4 mr-2">
                                                    <path fill="currentColor"
                                                        d="M449.9 39.96l-48.5 48.53C362.5 53.19 311.4 32 256 32C161.5 32 78.59 92.34 49.58 182.2c-5.438 16.81 3.797 34.88 20.61 40.28c16.97 5.5 34.86-3.812 40.3-20.59C130.9 138.5 189.4 96 256 96c37.96 0 73 14.18 100.2 37.8L311.1 178C295.1 194.8 306.8 223.4 330.4 224h146.9C487.7 223.7 496 215.3 496 204.9V59.04C496 34.99 466.9 22.95 449.9 39.96zM441.8 289.6c-16.94-5.438-34.88 3.812-40.3 20.59C381.1 373.5 322.6 416 256 416c-37.96 0-73-14.18-100.2-37.8L200 334C216.9 317.2 205.2 288.6 181.6 288H34.66C24.32 288.3 16 296.7 16 307.1v145.9c0 24.04 29.07 36.08 46.07 19.07l48.5-48.53C149.5 458.8 200.6 480 255.1 480c94.45 0 177.4-60.34 206.4-150.2C467.9 313 458.6 294.1 441.8 289.6z" />
                                                </svg>
                                                
                                                <span class="text-sm">Movimientos</span>
                                            </a>
                                        </li>

                                        {{-- <li @click="openTab = 7" class="mr-1 cursor-pointer">
                                            <a :class="openTab === 7 ? activeClass : inactive"
                                                class="bg-white py-2 px-2 flex items-center">
                                                <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 512 512">
                                                    <path fill="currentColor"
                                                        d="M502.6 182.6l-45.25-45.25C451.4 131.4 443.3 128 434.8 128H384V80C384 53.5 362.5 32 336 32h-160C149.5 32 128 53.5 128 80V128H77.25c-8.5 0-16.62 3.375-22.62 9.375L9.375 182.6C3.375 188.6 0 196.8 0 205.3V304h128v-32C128 263.1 135.1 256 144 256h32C184.9 256 192 263.1 192 272v32h128v-32C320 263.1 327.1 256 336 256h32C376.9 256 384 263.1 384 272v32h128V205.3C512 196.8 508.6 188.6 502.6 182.6zM336 128h-160V80h160V128zM384 368c0 8.875-7.125 16-16 16h-32c-8.875 0-16-7.125-16-16v-32H192v32C192 376.9 184.9 384 176 384h-32C135.1 384 128 376.9 128 368v-32H0V448c0 17.62 14.38 32 32 32h448c17.62 0 32-14.38 32-32v-112h-128V368z" />
                                                </svg>
                                                <span class="text-sm">Reparaciones</span>
                                            </a>
                                        </li> --}}

                                        <li @click="openTab = 7" class="mr-1 cursor-pointer">
                                            <a :class="openTab === 7 ? activeClass : inactive"
                                                class="bg-white py-2 px-2 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 mr-2">
                                                    <path fill="currentColor"
                                                        d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                                                </svg>
                                                <span class="text-xs">Galeria</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div x-show="openTab === 1">
                                        @livewire('report.report-articles', ['estation' => $estation,'informe' =>
                                        $informe],key($estation->id))
                                    </div>

                                    <div x-show="openTab === 3">
                                        @livewire('report.report-activities', ['estation' => $estation,'informe' =>
                                        $informe], key($estation->id))
                                    </div>
                                    <div x-show="openTab === 4">
                                        @livewire('report.estation.requirements', ['estation' => $estation,'informe' =>
                                        $informe], key($estation->id))
                                    </div>
                                    <div x-show="openTab === 5">
                                        @livewire('report.report-observations', ['estation' => $estation,'informe' =>
                                        $informe], key($estation->id))
                                    </div>
                                    <div x-show="openTab === 6">
                                        @livewire('report.estation.moviments', ['estation' => $estation,'informe' =>
                                        $informe], key($estation->id))
                                    </div>
                                    {{-- <div x-show="openTab === 7">
                                        @livewire('report.article.reparations', ['estation' => $estation,'informe' =>
                                        $informe], key($estation->id))
                                    </div> --}}

                                    <div x-show="openTab === 7">
                                        @livewire('report.estation.images', ['estation' => $estation,'informe' =>
                                        $informe], key($estation->id))
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modal de Agregar --}}
    @isset($estacion)
        <x-jet-dialog-modal wire:model="modaladdEquipo">
            <x-slot name="title">
                <h1 class="font-bold uppercase">Instalación de Equipo</h1>
            </x-slot>
            <x-slot name="content">
                <h1 class="font-bold text-xl text-center underline">Estacion : E-{{ $estacion->id }}
                    {{ $estacion->name }}
                </h1>
                <h1 class="font-semibold text-sm text-center">
                    ({{ $estacion->ubigeo->distrito }}-{{ $estacion->ubigeo->provincia }})</h1>
                <div class="tems-center">
                    <div class="col-span-6 sm:col-span-4 mb-2">
                        <div class="">
                            <x-jet-label class="text-base font-bold border-gray-200 mr-2" for="fecha"
                                value="{{ __('Fecha de la instalacion') }}" />
                            <x-jet-input id="fechainstall" type="date" class="mt-1 block w-44 font-semibold"
                                wire:model='fechainstall' />
                        </div>
                        <x-jet-input-error for="fechainstall" class="mt-2" />
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-4 bg-gray-50 p-2 border rounded-xl">
                    <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="article.estado"
                        value="{{ __('Equipos asignandos a la Comision') }}" />
                    <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class=""></th>
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Serie</th>
                            <th class="px-4 py-3 text-center">Sistema</th>
                            <th class="px-4 py-3">Estado</th>
                        </tr>
                        @foreach ($informe->commission->articles as $article)
                            @if ($article->estation_id === 1)
                                <tr class="bg-gray-100 border-b border-gray-200 hover:bg-gray-500">
                                    <td class="">
                                        <input class="rounded-2xl" wire:model='selectedArticle'
                                            value="{{ $article->id }}" type="radio">
                                    </td>
                                    <td class="px-4 py-3">{{ $article->denominacion }}</td>
                                    <td class="px-4 py-3">{{ $article->nserie }}</td>
                                    <td class="px-4 py-3 text-center text-xs">
                                        <select class="rounded-xl mx-2 text-xs" name="sistemaadd" id="sistemaadd"
                                            wire:model='sistemaadd'>
                                            <option value="" selected>No Asignado</option>
                                            @foreach ($systems as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="px-4 py-3">{{ $article->estado }}</td>
                                </tr>
                            @else
                                <tr class="bg-gray-100 border-b border-gray-200 hover:bg-gray-500">
                                    <td colspan="5" class="text-center">
                                        No se encuentraron registros
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                    <x-jet-input-error for="selectedArticle" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modaladdEquipo',false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="ArticleAdd()" wire:loading.attr="disabled">
                    {{ __('AGREGAR') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endisset
</div>
