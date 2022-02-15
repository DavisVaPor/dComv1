<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-2xl font-bold text-blue-500">PERSONAL</h1>
        <div class="mr-4 my-2">
            @if ($commission->estado == 'CREADA')
            <x-jet-button wire:click="addUserCommission" class="bg-green-500">
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
    @if ($commission->users->isNotEmpty())
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3 text-center">Nombre</th>
                <th class="px-4 py-3 text-center">Apellido</th>
                <th class="px-4 py-3 text-center">Cargo</th>
                @if ($commission->estado == 'CREADA')
                <th class="px-4 py-3"></th>
                @endif
            </tr>
            @foreach ($commission->users as $user)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->apellido }}</td>
                    <td class="px-4 py-3 text-center">{{ $user->cargo }}</td>
                    @if ($commission->estado == 'CREADA')
                    <td class="px-4 py-3">
                        <div class="flex justify-center">
                            <button wire:click="mostrarDel({{ $user->id }})"
                                class="text-red-500 hover:text-gray-600 cursor-pointer">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus-circle" 
                                class="svg-inline--fa fa-minus-circle fa-w-16 w-6 h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </td>
                    @endif
                </tr>
            @endforeach
        </table>
    @else
        <div class="text-center">
            <p class="font-bold text-gray-600">.:: SIN REGISTRO ::.</p>
        </div>
    @endif


    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Añadir Personal</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('RELACION DEL PERSONAL') }}" />
                <div class="flex flex-col">
                    <div class="flex-grow overflow-auto">
                        <table class="text-sm rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                            <tr class="text-left border-b-2 border-gray-300">
                                <th class="px-4 py-3"></th>
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Cargo</th>
                            </tr>
                            @foreach ($users as $user)
                                @if (!$commission->users->contains($user->id))
                                    <tr class="bg-gray-100 border-b border-gray-200">
                                        <td class="px-4 py-2">
                                            <input wire:model='selectedUser' value="{{ $user->id }}" type="radio">
                                        </td>
                                        <td class="text-sm px-4 py-2 uppercase">{{ $user->name }}, {{ $user->apellido }}</td>
                                        <td class="text-sm px-4 py-2">{{ $user->cargo }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addUser({{ $selectedUser }})"
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
            {{ __('¿Seguro que desea quitar al personal de la comision?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="delEstacion({{ $modalDel }})"
                wire:loading.attr="disabled">
                {{ __('Si') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
