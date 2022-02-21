<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-2xl font-bold text-blue-500">OBJETIVOS</h1>
        @if ($commission->estado == 'CREADA')
            <div class="justify-end mr-4 my-2">
                <x-jet-button wire:click="addObjective" class="bg-green-500">
                    Añadir
                    <span class="w-6 h-6 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </x-jet-button>
            </div>
        @endif
    </div>
    @if ($commission->objetives->isNotEmpty())
        <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class=""></th>
                <th class="px-4 py-3">Descripcion</th>
                @if ($commission->estado == 'CREADA')
                    <th class="px-4 py-3 text-right"></th>
                @endif
            </tr>
            @foreach ($commission->objetives as $objetive)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="font-bold">{{$loop->iteration}}</td>
                    <td class="w-11/12 px-4 py-3"> 
                        <a class="cursor-pointer hover:text-blue-600" wire:click="editObjetive({{ $objetive->id }})">
                            {{ $objetive->name }}
                        </a>
                    </td>
                    @if ($commission->estado == 'CREADA')
                        <td class="px-4 py-3 w-1/12">
                            <div class="text-center">
                                <button class="text-red-500 hover:text-gray-600 cursor-pointer"
                                    wire:click="mostrarDel({{ $objetive->id }})" wire:loading.attr="disabled">
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
            <h1 class="font-bold uppercase">Añadir Objetivo</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Descripcion del objetivo') }}" />
                    <textarea id="name"  wire:model.defer='objetive.name' class="resize-none w-full h-1/5 border rounded-md">

                    </textarea>
                <x-jet-input-error for="objetive.name" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveObjetivo()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold">{{ __('Eliminar Objetivo') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Seguro que desea eliminar?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="deleteObjetive({{ $modalDel }})" wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
