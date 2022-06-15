<div>
    <h1 class="mr-5 text-lg font-bold text-blue-800 text-center">REGISTRO DE REQUERIMIENTOS DE EQUIPOS </h1>
    <div class="flex justify-end my-2 items-center">
        @if ($informe->estado == 'BORRADOR')
            <x-jet-button wire:click="addModal" class="bg-blue-500 justify-end">
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
    <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="text-center">#</th>
            <th class="w-1/2 px-4 py-3">Equipo</th>
            <th class="px-4 py-3 text-center">Cantidad</th>
            <th class="px-4 py-3 text-center">Estado</th>
            @if ($informe->estado == 'BORRADOR')
                <th class="m-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-auto" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                        </path>
                    </svg>
                </th>
            @endif
        </tr>
        @forelse ($requirements as $item)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-sm font-extrabold">{{ $item->equipment->name }}</td>
                <td class="px-4 py-3 text-sm text-center">{{ $item->cantidad }}</td>
                <td class="px-4 py-3 text-sm text-center">{{ $item->estado }}</td>
                <td class="">
                    <div class="flex justify-center">
                        <button wire:click="edit({{ $item->id }})"
                            class="text-blue-500 hover:text-blue-900 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                        <button class="text-red-500 hover:text-red-900 cursor-pointer"
                            wire:click="mostrarDel({{ $item->id }})" wire:loading.attr="disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                        <button class="text-gray-500 hover:text-yellow-900 cursor-pointer"
                            wire:click="info({{ $item->id }})" wire:loading.attr="disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 m-auto" viewBox="0 0 192 512">
                                <path fill="currentColor"
                                    d="M256 0v128h128L256 0zM224 128L224 0H48C21.49 0 0 21.49 0 48v416C0 490.5 21.49 512 48 512h288c26.51 0 48-21.49 48-48V160h-127.1C238.3 160 224 145.7 224 128zM272 416h-160C103.2 416 96 408.8 96 400C96 391.2 103.2 384 112 384h160c8.836 0 16 7.162 16 16C288 408.8 280.8 416 272 416zM272 352h-160C103.2 352 96 344.8 96 336C96 327.2 103.2 320 112 320h160c8.836 0 16 7.162 16 16C288 344.8 280.8 352 272 352zM288 272C288 280.8 280.8 288 272 288h-160C103.2 288 96 280.8 96 272C96 263.2 103.2 256 112 256h160C280.8 256 288 263.2 288 272z" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="7" class="text-center text-gray-400">No se encuentran registros </td>
            </tr>
        @endforelse
    </table>
    {{ $requirements->links() }}

    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Registro de una requerimiento</h1>
        </x-slot>

        <x-slot name="content">
            <x-jet-label class="text-base font-bold border-gray-200" for="equiponame"
                value="{{ __('Equipo de Telecomunicacion') }}" />
            <div class="flex items-center">
                @isset($equiponame)
                    <input value='{{ $equiponame->identificador }} - {{ $equiponame->name }}' type="text"
                        class="rounded-xl w-full block font-semibold text-sm" disabled>
                @else
                    <input value='Buscar en el Catalogo de Equipos de Telecomunicación' type="text"
                        class="text-right rounded-xl w-full block font-semibold text-sm" disabled>
                @endisset
                <div class="ml-2">
                    <x-jet-button wire:click="addsubModal" class="bg-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M9 9a2 2 0 114 0 2 2 0 01-4 0z"></path>
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a4 4 0 00-3.446 6.032l-2.261 2.26a1 1 0 101.414 1.415l2.261-2.261A4 4 0 1011 5z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </x-jet-button>
                </div>
            </div>
            <x-jet-input-error for="equiponame" class="mt-1" />

            <x-jet-label class="text-base font-bold border-gray-200" for="requirement.cantidad"
                value="{{ __('Cantidad') }}" />
            <input wire:model='requirement.cantidad' value='' type="number"
                class="mt-1 rounded-xl block w-3/12 font-semibold">
            <x-jet-input-error for="requirement.cantidad" class="mt-2" />

            <x-jet-label class="text-base font-bold border-gray-200" for="requirement.descripcion"
                value="{{ __('Descripcion') }}" />
            <textarea id="descripcion" wire:model.defer='requirement.descripcion'
                class="resize-none w-full h-1/4 border rounded-md"></textarea>
            <x-jet-input-error for="requirement.descripcion" class="mt-2" />

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="registrarRq()" wire:loading.attr="disabled">
                {{ __('Registrar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>



    {{-- Modal de Catalogo --}}

    <x-jet-dialog-modal wire:model="submodalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Busqueda en el Catálogo</h1>
        </x-slot>

        <x-slot name="content">
            <x-jet-label class="text-base font-bold border-gray-200" for="searchEquipo"
                value="{{ __('Busqueda del equipo') }}" />
            <input wire:model='searchEquipo' type="text" class="mt-1 rounded-xl w-full block font-semibold">

            <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="tipo"
                value="{{ __('Catálogo de Equipos') }}" />
            <x-jet-input-error for="equipoSelect" class="mt-2" />
            <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th colspan="2" class="font-bold text-center py-3">Identificador</th>
                    <th class="font-bold px-2 py-3">Equipo</th>
                </tr>
                @forelse ($equipos as $equipo)
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <td class="px-2">
                            <input class="rounded-2xl" wire:model='equipoSelect' value="{{ $equipo->id }}"
                                type="radio">
                        </td>
                        <td class="text-xs">{{ $equipo->identificador }}</td>
                        <td class="px-2 text-sm">{{ $equipo->name }}</td>
                    </tr>
                @empty
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <td colspan="3" class="px-2 py-2 ">No se encuentran registros</td>
                    </tr>
                @endforelse
            </table>
            {{ $equipos->links() }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('submodalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addEquipo()" wire:loading.attr="disabled">
                {{ __('Añadir') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold">{{ __('Eliminar Registro') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Seguro que desea eliminar?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="delete({{ $modalDel }})" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Info --}}
    <x-jet-dialog-modal wire:model="modalInfo">
        <x-slot name="title">
            <h1 class="font-bold">{{ __('Detalle del Equipo ') }}</h1>
        </x-slot>

        <x-slot name="content">
            @if ($requirement)
                {{ $requirement->equipment->name }}
            @endif

            <x-jet-label class="text-base font-bold border-gray-200" for="requirement.descripcion"
                value="{{ __('Descripcion') }}" />
            <textarea id="descripcion" wire:model.defer='requirement.descripcion' class="resize-none w-full h-1/4 border rounded-md"
                disabled></textarea>
            <x-jet-input-error for="requirement.descripcion" class="mt-2" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalInfo',false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
