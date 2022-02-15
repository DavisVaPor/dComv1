<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-2xl font-bold text-blue-500">LUGARES</h1>
        <div class="mr-4 my-2">
            @if ($commission->estado == 'CREADA')
                <x-jet-button wire:click="addUbigeeCommission" class="bg-green-500">
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
        @isset($commission->ubigee)
        <table class="table-auto rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3 text-center">Departamento</th>
                <th class="px-4 py-3 text-center">Provincia</th>
                <th class="px-4 py-3 text-center">Distrito</th>
                <th class="px-4 py-3"></th>
            </tr>
            @forelse ($ubigee as $item)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3 text-center">{{ $item->departamento }}</td>
                    <td class="px-4 py-3 text-center">{{ $item->provincia }}</td>
                    <td class="px-4 py-3 text-center">{{ $item->distrito }}</td>
                    <td class="px-4 py-3 text-center">
                        @if ($commission->estado === 'CREADA')
                        <div class="text-center">
                            <button wire:click="mostrarDel({{ $item->id }})"
                                class="text-red-500 hover:text-gray-600 cursor-pointer">
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
            @empty
            @endforelse
        </table>
        {{ $ubigee->links() }}
        @endisset

        @empty($commission->ubigee)
            <div class="text-center">
                <p class="font-bold text-gray-600">.:: SIN REGISTRO ::.</p>
            </div>
        @endempty
    </div>

    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Agregar Lugar</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Busqueda') }}" />
                <div class="flex my-2 ml-10">
                    <br>
                    <input wire:model='search' class="form-control m-auto rounded-xl w-5/6" type="search"
                        placeholder="Búsqueda" aria-label="Search">
                    <select wire:model='ubigeo' class="rounded-xl ml-2" name="" id="">
                        <option value="">Provincias</option>
                        <option selected value="101">Chachapoyas</option>
                        <option value="102">Bagua</option>
                        <option value="103">Bongara</option>
                        <option value="104">Condorcanqui</option>
                        <option value="105">Luya</option>
                        <option value="106">Rodriguez de Mendoza</option>
                        <option value="107">Utcubamba</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <div class="flex-grow overflow-auto">
                        <table class="rounded-t-lg my-2 w-full mx-auto bg-gray-200 text-gray-800">
                            <tr class="text-left border-b-2 border-gray-300">
                                <th class="font-bold px-4 py-3"></th>
                                <th class="font-bold px-4 py-3 text-center">Distrito</th>
                                <th class="font-bold px-4 py-3 text-center">Provincia</th>
                            </tr>
                            @foreach ($ubigees as $item)
                                @if (!$commission->ubigee->contains($item->id))
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <td class="px-4 py-3">
                                                <input class="rounded-2xl" wire:model='selected'
                                                    value="{{ $item->id }}" type="radio">
                                            </td>
                                            <td class="px-4 py-3">{{ $item->distrito }}</td>
                                            <td class="px-4 py-3">{{ $item->provincia }}</td>
                                        </tr>                              
                                @endif
                            @endforeach
                        </table>
                        {{ $ubigees->links() }}
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addUbigee({{ $selected }})"
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
            {{ __('¿Seguro que desea quitar el lugar de la comision?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="delUbigeo({{ $modalDel }})"
                wire:loading.attr="disabled">
                {{ __('Si') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
