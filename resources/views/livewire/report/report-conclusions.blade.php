<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-lg font-bold text-gray-800">CONCLUSIONES</h1>
        @if ($report->estado == 'BORRADOR')
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

    @if ($report->conclusions->isNotEmpty())
        <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="py-3 w-1/12 text-center">#</th>
                <th class="px-4 py-3">Descripcion</th>
                @if ($report->estado == 'BORRADOR')
                    <th class="px-4 py-3 w-1/12">Acciones</th>
                @endif
            </tr>
            @foreach ($report->conclusions as $conclusion)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="font-bold text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3">{{ $conclusion->description }}</td>
                    @if ($report->estado == 'BORRADOR')
                        <td class="px-4 py-3 w-1/12">
                            <div class="flex justify-between">
                                <button wire:click="editConclusion({{ $conclusion->id }})"
                                    class="text-blue-500 hover:text-gray-900 cursor-pointer mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 m-auto" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="text-red-500 hover:text-gray-900 cursor-pointer"
                                    wire:click="mostrarDel({{ $conclusion->id }})" wire:loading.attr="disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 m-auto" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
    @else
        <div class="text-center border border-gray-100">
            <p class="text-gray-400">.:: Aun no se ha añadido alguna conclusion a este informe ::.</p>
        </div>
    @endif

    {{-- Modal de Añadir --}}
<x-jet-dialog-modal wire:model="modalAdd">
    <x-slot name="title">
        <h1 class="font-bold">Añadir una conclusion al Informe</h1>
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="text-base font-bold border-gray-200" for="name"
                value="{{ __('Descripcion de la conclusion') }}" />
                <textarea id="name"  wire:model.defer='conclusion.description' class="resize-none w-full h-1/4 border rounded-md">

                </textarea>
            <x-jet-input-error for="conclusion.description" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="saveConclusion()" wire:loading.attr="disabled">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>

{{-- Modal de Eliminar --}}
<x-jet-dialog-modal wire:model="modalDel">
    <x-slot name="title">
        <h1 class="font-bold">{{ __('Eliminar la conclusion seleccionada') }}</h1>
    </x-slot>

    <x-slot name="content">
        {{ __('¿Seguro que desea eliminar?') }}

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="deleteConclusion({{ $modalDel }})" onclick="location.reload()" wire:loading.attr="disabled">
            {{ __('Eliminar') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
</div>
