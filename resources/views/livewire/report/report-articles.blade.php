<div>
    <p class="text-center text-green-600 text-lg font-bold">
        EQUIPOS DE TELECOMUNICACION DE LA ESTACION
    </p>

    <div>
        @livewire('report.article.install-equipament', ['estation' => $estation,'informe' => $informe],key($estation->id))
    </div>

    <div class="flex justify-between ml-2">
        <input wire:model='search' class="form-control w-full rounded-xl" type="search" placeholder="Búsqueda de Bienes"
            aria-label="Search">
        <select class="rounded-xl mx-2 text-sm" name="sistema" id="sistema" wire:model='sistema'>
            <option value="">Todos</option>
            @foreach ($systems as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    
    @empty(!$articles)
        <table class="text-sm rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
            <tr class="border-b-2 border-gray-300">
                <th class="px-4 py-3">Cod.</th>
                <th class="px-4 py-3">Nombre del Bien</th>
                <th class="px-4 py-3">Serie</th>
                <th class="px-4 py-3 text-center">Sistema</th>
                <th class="px-4 py-3 text-center">Estado</th>
                <th class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                        </path>
                    </svg>
                </th>
            </tr>
            @forelse ($articles as $article)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 font-bold">{{ $article->codPatrimonial }}</td>
                    <td class="px-4 py-3">{{ $article->denominacion }}</td>
                    <td class="px-4 py-3">{{ $article->nserie }}</td>
                    <td class="px-4 py-3 text-center">{{ $article->system->name }}</td>
                    <td class="px-4 py-3 text-center font-bold">
                        @if ($article->estado == 'BUENO')
                            <p class="text-green-500">
                                {{ $article->estado }}
                            </p>
                        @else
                            @if ($article->estado == 'REGULAR')
                                <p class="text-yellow-500">
                                    {{ $article->estado }}
                                </p>
                            @else
                                <p class="text-red-500">
                                    {{ $article->estado }}
                                </p>
                            @endif
                        @endif
                    </td>
                    <td class="">
                        <div class="flex justify-center">
                            <button wire:click='addModal({{ $article->id }})'
                                class="text-blue-500 hover:text-blue-700 cursor-pointer">
                                <abbr title="Registro de Reparacion">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 m-auto">
                                        <path fill="currentColor"
                                            d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                                    </svg>
                                </abbr>
                            </button>
                            @livewire('report.article.retiro', ['article' => $article, 'estation' => $estation, 'informe' => $informe], key($article->id))
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td colspan="6" class="px-4 py-3 text-center">
                        No se encontraron registros
                    </td>
                </tr>
            @endforelse
        </table>
        {{ $articles->links() }}
    @endempty


    {{-- //Se debe de pasar a otro archivo --}}
    @isset($informe->maintenances)
        <h2 class="mb-2 font-bold text-lg text-blue-500 uppercase"> Reparaciones a Equipos Realizadas</h2>
        <div class=" text-gray-500">

            <table class="text-sm text-center rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-base border-b-2 border-gray-300">
                    <th class="">#</th>
                    <th class="px-2 py-3">Descripción de la reparación</th>
                    <th class="px-2 py-3">Tipo</th>
                    <th class="px-2 py-3">Cambios de Estado</th>
                    <th class="px-2 py-3 w-24">Fecha</th>
                    <th>
                        <svg xmlns="http://www.w3.org/2000/svg" class="m-auto h-6 w-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
                            <path
                                d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z">
                            </path>
                        </svg>
                    </th>
                </tr> 
                @forelse($informe->maintenances as $item)
                <tr class="bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-2 mb-auto font-bold text-center">{{ $loop->iteration }}</td>
                        <td class="py-2 w-6/12 text-left">{{ $item->descripcion }}</td>
                        <td class="py-2 text-center">{{ $item->tipo }}</td>
                        <td class="py-2">{{ $item->cambios }}</td>
                        <td class="py-2">{{ Str::limit($item->created_at, 9, '') }}</td>
                        <td class="py-2">
                            <button wire:click='addModal({{ $article->id }})'
                            class="text-blue-500 hover:text-blue-700 cursor-pointer">
                                <abbr title="Registro de Reparacion">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                                        <path fill="currentColor"
                                            d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                                    </svg>
                                </abbr>
                            </button>
                        </td>
                </tr>
                @empty
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <td colspan="5" class="px-4 mb-auto font-bold text-center mt-2"> No registro de cambios</td>
                    </tr>
                @endforelse
            </table>
        </div>
    @endisset

    {{-- Modal de Reparacion --}}
    @if ($articulo)
        <x-jet-dialog-modal wire:model="modalEdit">
            <x-slot name="title">
                <div class="flex justify-start items-center">
                    <div class="mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                            <path fill="currentColor"
                                d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                        </svg>
                    </div>
                    <h1 class="font-bold uppercase">Registro de Reparacion</h1>
                </div>
            </x-slot>

            <x-slot name="content">
                <h1 class="font-bold text-center underline">SERVICIO TÉCNICO</h1>
                <h2 class="font-bold underline">DATOS DEL EQUIPO</h2>
                <p class="">Cod: <span class="font-bold">{{ $articulo->codPatrimonial }}</span></p>
                <p class="">Equipo: <span class="font-bold">{{ $articulo->denominacion }}</span></p>
                <p class="">Serie: <span class="font-bold">{{ $articulo->nserie }}</span></p>
                <p class="">Modelo: <span class="font-bold">{{ $articulo->modelo }}</span> </p>

                <div class="col-span-6 sm:col-span-4 bg-gray-50 mt-1 p-1 border rounded-xl">
                    <div class="flex justify-between items-center">
                        <div>
                            <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="tipo"
                                value="{{ __('Tipo') }}" />
                            <select class="rounded-xl" name="tipo" id="tipo" wire:model.defer='tipo'>
                                <option value="">Servicio</option>
                                <option value="PREVENTIVO">PREVENTIVO</option>
                                <option value="CORRECTIVO">CORRECTIVO</option>
                            </select>
                            <x-jet-input-error for="tipo" class="mt-2" />
                        </div>
                        <div>
                            <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="estado"
                                value="{{ __('Estado') }}" />
                            <select class="rounded-xl" name="estado" id="estado" wire:model.defer='estado'>
                                <option value="BUENO">BUENO</option>
                                <option value="REGULAR">REGULAR</option>
                                <option value="MALO">MALO</option>
                            </select>
                            <x-jet-input-error for="estado" class="mt-2" />
                        </div>
                        <div>
                            <x-jet-label class="text-base font-bold border-gray-200" for="article.estado"
                                value="{{ __('Sistema') }}" />
                            <p class="mt-3">{{ $articulo->system->name }}</p>
                        </div>
                    </div>
                    <x-jet-label class="text-base font-bold border-gray-200" for="name"
                        value="{{ __('Descripcion del Mantenieminto') }}" />
                    <textarea id="name" wire:model.defer='obbArticle' class="resize-none w-full h-1/5 border rounded-md"></textarea>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalEdit',false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="updateArticle()" wire:loading.attr="disabled">
                    {{ __('Guardar') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endif
</div>
