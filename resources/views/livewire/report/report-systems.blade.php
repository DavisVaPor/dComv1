<div>
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
                            <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24"
                                width="24" xmlns="http://www.w3.org/2000/svg">
                                <polyline points="6 9 12 15 18 9">
                                </polyline>
                            </svg>
                        </div>
                    </header>
                    <div class="tab-content mb-2">
                        <div class="pl-8 pr-8 pb-5 text-gray-500">
                            <div class="bg-white rounded-lg w-full mb-2 p-4 shadow">
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
                                    </div>
                                    <div class="flex mb-2 border-b border-gray-600">
                                        <div class="w-3/12">
                                            <span class="text-base text-gray-900 block">ESTADO</span>
                                        </div>
                                        <div class="w-1/12">
                                            <span class="text-base text-gray-900 block">:</span>
                                        </div>
                                        <div class="w-9/12">
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
                                        <div class="w-3/12">
                                            <span class="text-base text-gray-900 block">TIPO</span>
                                        </div>
                                        <div class="w-1/12">
                                            <span class="text-base text-gray-900 block">:</span>
                                        </div>
                                        <div class="w-9/12">
                                            <span
                                                class="text-base text-gray-900 block font-extrabold">{{ $estation->tipo }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <p class="text-center text-gray-700 text-lg">
                                        SISTEMAS DE LA ESTACION
                                    </p>
                                </div>
                               @livewire('report.report-articles', ['estation' => $estation], key($estation->id)) 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


 

    {{-- Modal de Agregar --}}
    <x-jet-dialog-modal wire:model="modaladdEquipo">
        <x-slot name="title">
            <h1 class="font-bold">Agregar Equipo</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 bg-gray-50 p-2 border rounded-xl">

                <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="article.estado"
                    value="{{ __('Articulo') }}" />
                    {{$selectedArticle}}
                <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="font-bold px-4 py-3"></th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Modelo</th>
                        <th class="px-4 py-3">Serie</th>
                        <th class="px-4 py-3">Estado</th>
                    </tr>
                    @foreach ($informe->commission->articles as $article)
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">
                                <input class="rounded-2xl" wire:model='selectedArticle' value="{{ $article->id }}"
                                    type="radio">
                            </td>
                            <td class="px-4 py-3">{{ $article->denominacion }}</td>
                            <td class="px-4 py-3">{{ $article->modelo }}</td>
                            <td class="px-4 py-3">{{ $article->nserie }}</td>
                            <td class="px-4 py-3">{{ $article->estado }}</td>
                        </tr>
                    @endforeach
                </table>
                <x-jet-input-error for="selectedArticle" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modaladdEquipo',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="ArticleSystem()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
