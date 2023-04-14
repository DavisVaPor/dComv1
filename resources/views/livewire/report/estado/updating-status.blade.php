<div>
    <button wire:click="editStatus()"
        class="text-blue-500 hover:text-gray-900 cursor-pointer mr-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2"
                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
    </button>

     {{-- Modal de Tipo de Servicio --}}
     <x-jet-dialog-modal wire:model="modalStatus">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Actualizar Estado de la Estacion</h1>
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between mb-2">
                <h1 class="font-bold uppercase">Estacion:{{ $estation->name }}</h1>
                <h1 class="font-bold uppercase">Estado:{{ $estation->estado }}</h1>
            </div>

            <div class="col-span-8 sm:col-span-4">
                <div class="flex items-center">
                    <x-jet-label class="text-base font-bold border-gray-200 mr-2 uppercase" for="estado"
                        value="{{ __('Estado Actual de la Estacion :') }}" />
                    <select class="rounded-xl text-sm" name="estado" id="estado" wire:model='estado'>
                        <option value="OPERATIVO">OPERATIVO</option>
                        <option value="INOPERATIVO">INOPERATIVO</option>
                        <option value="MANTENIMIENTO">MANTENIMIENTO</option>
                        <option value="INEXISTENTE">INEXISTENTE</option>
                        <option value="NO_VERIFICADO">NO VERIFICADO</option>
                    </select>
                    <x-jet-input-error for="estado" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalStatus',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="updateStatus()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
