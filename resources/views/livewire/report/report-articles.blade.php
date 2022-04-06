<div>
    @php
    @endphp
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
    @empty($articles)
        <div class="text-center border border-gray-100">
            <p class="text-gray-400">.:: Aun no se ha añadido alguna conclusion a este informe ::.</p>
        </div>
    @endempty
    @empty(!$articles)
        <table class="text-sm rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
            <tr class="border-b-2 border-gray-300">
                <th class="px-4 py-3">Cod.</th>
                <th class="px-4 py-3">Nombre del Bien</th>
                <th class="px-4 py-3 text-center">Sistema</th>
                <th class="px-4 py-3 text-center">Estado</th>
                <th class="px-4 py-3 text-center ml-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
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
                    <td class="px-4 py-3">
                        <div class="flex justify-center">
                            <button class="text-yellow-700 hover:text-yellow-900 cursor-pointer mr-2">
                                <svg class="w-6 h-6 m-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                                    </path>
                                </svg>
                            </button>
                            <button wire:click='addModal({{ $article->id }})'
                                class="text-blue-500 hover:text-blue-700 cursor-pointer">
                                <abbr title="Registro de Reparacion">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                                        <path fill="currentColor"
                                            d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                                    </svg>
                                </abbr>
                            </button>

                        </div>
                    </td>
                </tr>

            @empty
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td colspan="5" class="px-4 py-3 text-center">
                        No se encontraron registros
                    </td>
                </tr>
            @endforelse
        </table>
        {{ $articles->links() }}
    @endempty

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
                    <h1 class="font-bold">Registro de Reparacion de Equipo</h1>
                </div>
            </x-slot>

            <x-slot name="content">
                <p class="text-right">Equipo: {{ $articulo->denominacion }}</p>
                <p class="text-right">Cod: {{ $articulo->codPatrimonial }}- S/N :{{ $articulo->nserie }}</p>
                <div class="col-span-6 sm:col-span-4 bg-gray-50 p-2 border rounded-xl">
                    <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="article.estado"
                        value="{{ __('Estado Articulo') }}" />
                    <select class="rounded-xl" name="tipo" id="tipo" wire:model.defer='articulo.estado'>
                        <option value="BUENO">BUENO</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                    </select>
                    <x-jet-input-error for="articulo.estado" class="mt-2" />

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
