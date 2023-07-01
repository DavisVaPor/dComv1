<div>
    <x-jet-button wire:click="Modal" class="bg-yellow-500 justify-end ml-2 items-center">
        Reubicacion
        <span class="w-6 h-6 ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="h-5 w-5 mr-2">
                <path fill="currentColor"
                    d="M449.9 39.96l-48.5 48.53C362.5 53.19 311.4 32 256 32C161.5 32 78.59 92.34 49.58 182.2c-5.438 16.81 3.797 34.88 20.61 40.28c16.97 5.5 34.86-3.812 40.3-20.59C130.9 138.5 189.4 96 256 96c37.96 0 73 14.18 100.2 37.8L311.1 178C295.1 194.8 306.8 223.4 330.4 224h146.9C487.7 223.7 496 215.3 496 204.9V59.04C496 34.99 466.9 22.95 449.9 39.96zM441.8 289.6c-16.94-5.438-34.88 3.812-40.3 20.59C381.1 373.5 322.6 416 256 416c-37.96 0-73-14.18-100.2-37.8L200 334C216.9 317.2 205.2 288.6 181.6 288H34.66C24.32 288.3 16 296.7 16 307.1v145.9c0 24.04 29.07 36.08 46.07 19.07l48.5-48.53C149.5 458.8 200.6 480 255.1 480c94.45 0 177.4-60.34 206.4-150.2C467.9 313 458.6 294.1 441.8 289.6z" />
            </svg>
        </span>
    </x-jet-button>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold uppercase">{{ __('Confirmar la Reubicacion') }}</h1>
        </x-slot>


        <x-slot name="content">
            {{ __('Los Equipos de esta Estaci[on seran Retirados') }}
            <x-jet-label class="text-base uppercase mr-2 font-bold border-gray-200" for="fecha"
                value="{{ __('Fecha de Retiro') }}" />
            <input class="rounded-xl text-sm" type="date" name="fecha" id="fecha" max="{{ $fechaActual }}"
                wire:model='fecha'>
            <x-jet-input-error for="fecha" class="mt-2" />
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="Reubicacion()" wire:loading.attr="disabled">
                {{ __('Confirmar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
