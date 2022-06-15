<div>
    <div class="flex justify-end my-2 items-center">
        @if ($informe->estado == 'BORRADOR')
            <x-jet-button wire:click="addModal" class="bg-green-500 justify-end">
                Instalar Equipo
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

    {{-- Modal de Agregar --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Instalar equipo</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">

                <x-jet-label class="text-base font-bold border-gray-200 uppercase" for="ArticleSelect"
                    value="{{ __('Equipos Trasladados') }}" />
                <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class=""></th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Serie</th>
                        <th class="px-4 py-3">Sistema</th>
                        <th class="px-4 py-3">Estado</th>
                    </tr>
                    @foreach ($articles as $article)
                        @if ($article->estation->id === 1)
                            <tr class="bg-gray-100 border-b border-gray-200 text-sm">
                                <td class="">
                                    <input class="rounded-2xl ml-2" wire:model='ArticleSelect'
                                        value="{{ $article->id }}" type="radio">
                                </td>
                                <td class="py-3">{{ $article->denominacion }}</td>
                                <td class="py-3 text-xs">{{ $article->nserie }}</td>
                                <td class="py-3">
                                    <select class="rounded-xl text-xs" name="SystemSelect" id="SystemSelect"
                                        wire:model='SystemSelect' name="" id="">
                                        <option value=""></option>
                                        @foreach ($systems as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="py-3">{{ $article->estado }}</td>
                            </tr>
                        @else
                            <tr class="bg-gray-100 border-b border-gray-200 text-sm">
                                <td colspan="5" class="py-3 text-center">No se encuentran registros</td>
                            </tr>
                        @endif
                    @endforeach
                </table>
                <x-jet-input-error for="ArticleSelect" />
                <x-jet-input-error for="SystemSelect" />

                <x-jet-label class="text-base font-bold uppercase" for="url"
                    value="{{ __('Acta de Instalacion') }}" />
                <div class="col-span-6 sm:col-span-4 border rounded-lg ">
                    <div class="m-2">
                        <x-jet-label class="text-base uppercase font-bold border-gray-200" for="fecha"
                            value="{{ __('Fecha de instalacion') }}" />
                        <input class="rounded-xl text-sm" type="date" name="fecha" id="fecha"
                            wire:model='fecha'>
                        <x-jet-input-error for="fecha" class="mt-2" />
                    </div>
                    <div class="m-2">
                        <x-jet-label class="text-base uppercase font-bold border-gray-200" for="file_url"
                            value="{{ __('Archivo') }}" />
                        <input type='file' class="" wire:model='file_url' accept="application/pdf">
                        <x-jet-input-error for="file_url" class="mt-2" />
                    </div>
                    
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="moviment()" wire:loading.attr="disabled">
                {{ __('Instalar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
