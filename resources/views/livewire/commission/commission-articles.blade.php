<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-2xl font-bold text-blue-500">EQUIPOS A TRASLADAR</h1>
        <div class="mr-4 my-2">
            @if ($commission->estado == 'CREADA')
                <x-jet-button wire:click="addModal" class="bg-green-500">
                    Añadir
                    <span class="w-6 h-6 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </x-jet-button>
            @endif
        </div>
    </div>
    <div class="justify-content-between">
        @if ($commission->articles->isNotEmpty())
            <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left">
                    <th class="px-4 py-3">Nombre</th>
                    <th class="px-4 py-3">Modelo</th>
                    <th class="px-4 py-3">Serie</th>
                    <th class="px-4 py-3">Estado</th>
                    <th class="px-4 py-3"></th>
                </tr>
                @foreach ($commission->articles as $article)
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">{{ $article->denominacion }}</td>
                            <td class="px-4 py-3">{{ $article->modelo }}</td>
                            <td class="px-4 py-3">{{ $article->nserie }}</td>
                            <td class="px-4 py-3">{{ $article->estado }}</td>
                            <td class="px-4 py-3">
                                @if ($commission->estado == 'CREADA')
                                <div class="text-center">
                                    <button wire:click="mostrarDel({{ $article->id }})"
                                        class="text-red-500 hover:text-gray-900 cursor-pointer">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus-circle" 
                                        class="svg-inline--fa fa-minus-circle fa-w-16 w-6 h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                @endif
                            </td>
                        </tr>
                @endforeach
            </table>
        @else
            <div class="text-center">
                <p class="font-bold text-gray-600">.:: SIN REGISTRO ::.</p>
            </div>
        @endif
    </div>

        {{-- Modal de Añadir --}}
        <x-jet-dialog-modal wire:model="modalAdd">
            <x-slot name="title">
                <h1 class="font-bold">Añadir Bien a la Comision de Servicio</h1>
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="text-base font-bold border-gray-200" for="name"
                        value="{{ __('Busqueda de Estacion') }}" />
                    <div class="flex "> 
                        <input wire:model='search' class="form-control m-auto rounded-xl w-1/2 mx-2" type="search"
                        placeholder="Búsqueda por Nombre" aria-label="Search">
                        <input wire:model='searchserie' class="form-control m-auto rounded-xl w-1/2 mx-2" type="search"
                        placeholder="Búsqueda por Serie" aria-label="Search">  
                    </div>

                    <div class="flex flex-col">
                        <div class="flex-grow overflow-auto">
                            <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                                <tr class="text-left border-b-2 border-gray-300">
                                    <th class="font-bold px-4 py-3"></th>
                                    <th class="px-4 py-3">Nombre</th>
                                    <th class="px-4 py-3">Modelo</th>
                                    <th class="px-4 py-3">Serie</th>
                                    <th class="px-4 py-3">Estado</th>
                                </tr>
                                @foreach ($articles as $article)
                                    @if (!$commission->articles->contains($article->id))
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <td class="px-4 py-3">
                                                <input class="rounded-2xl" wire:model='selectedArticle'
                                                    value="{{ $article->id }}" type="radio">
                                            </td>
                                            <td class="px-4 py-3">{{ $article->denominacion }}</td>
                                            <td class="px-4 py-3">{{ $article->modelo }}</td>
                                            <td class="px-4 py-3">{{ $article->nserie }}</td>
                                            <td class="px-4 py-3">{{ $article->estado }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="addArticle({{ $selectedArticle }})"
                   wire:loading.attr="disabled">
                    {{ __('Añadir') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

        {{-- Modal de Eliminar --}}
        <x-jet-dialog-modal wire:model="modalDel">
            <x-slot name="title">
                <h1 class="font-bold">{{ __('') }}</h1>
            </x-slot>

            <x-slot name="content">
                {{ __('¿Seguro que desea quitar el Equipo?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="delArticle({{ $modalDel }})"
                    wire:loading.attr="disabled">
                    {{ __('Si') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
