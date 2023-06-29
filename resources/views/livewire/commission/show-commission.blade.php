<div class="flex justify-between items-center">
    <x-jet-button wire:click="regresar" class="bg-gray-300">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-circle-left"
            class="svg-inline--fa fa-chevron-circle-left fa-w-16 w-4 h-3" role="img"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M256 504C119 504 8 393 8 256S119 8 256 8s248 111 248 248-111 248-248 248zM142.1 273l135.5 135.5c9.4 9.4 24.6 9.4 33.9 0l17-17c9.4-9.4 9.4-24.6 0-33.9L226.9 256l101.6-101.6c9.4-9.4 9.4-24.6 0-33.9l-17-17c-9.4-9.4-24.6-9.4-33.9 0L142.1 239c-9.4 9.4-9.4 24.6 0 34z">
            </path>
        </svg>
        <p class="text-xs ml-2 my-auto">Regresar</p>
    </x-jet-button>
    <div>
    @if ($commission->estado == 'ANULADA')
        <x-jet-button onclick="location.reload()" class="bg-blue-500">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="redo" 
            class="svg-inline--fa fa-redo fa-w-16 h-4 w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path fill="currentColor" d="M500.33 0h-47.41a12 12 0 0 0-12 12.57l4 82.76A247.42 247.42 0 0 0 256 8C119.34 8 7.9 119.53 8 256.19 8.1 393.07 119.1 504 256 504a247.1 247.1 0 0 0 166.18-63.91 12 12 0 0 0 .48-17.43l-34-34a12 12 0 0 0-16.38-.55A176 176 0 1 1 402.1 157.8l-101.53-4.87a12 12 0 0 0-12.57 12v47.41a12 12 0 0 0 12 12h200.33a12 12 0 0 0 12-12V12a12 12 0 0 0-12-12z">
                </path>
            </svg>
        </x-jet-button>
    @else   
        @if ($commission->estado == 'CREADA')   
            <x-jet-button wire:click="mostarConf({{ $commission->id }})" class="bg-green-800">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check"
                    class="svg-inline--fa fa-check fa-w-16 h-4 w-4 mr-1" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
                    </path>
                </svg>
                <p class="text-xs">Confirmar</p>
            </x-jet-button>
        @else
            @if ($commission->reports->isNotEmpty())
                
            @else
                @if ($commission->estado == 'CONFIRMADA')
                <x-jet-button wire:click="mostrarPen({{ $commission->id }})" class="bg-yellow-700">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pause" class="h-4 w-4 mr-1 svg-inline--fa fa-pause fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z">
                        </path>
                    </svg>
                    <p class="font-bold text-xs">Pendiente</p>
                </x-jet-button>
                @endif
            @endif
        @endif
        @if ($commission->reports->isNotEmpty())
                
        @else
            <x-jet-button wire:click="mostrarAnu({{ $commission->id }})" class="bg-red-500">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" 
                data-icon="times" class="svg-inline--fa fa-times fa-w-11 h-4 w-4 mr-1" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512">
                    <path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z">
                    </path>
                </svg>
                <p class="text-xs">Anular</p>
            </x-jet-button>
            <x-jet-button onclick="location.reload()" class="bg-blue-500">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="redo" 
                class="svg-inline--fa fa-redo fa-w-16 h-4 w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M500.33 0h-47.41a12 12 0 0 0-12 12.57l4 82.76A247.42 247.42 0 0 0 256 8C119.34 8 7.9 119.53 8 256.19 8.1 393.07 119.1 504 256 504a247.1 247.1 0 0 0 166.18-63.91 12 12 0 0 0 .48-17.43l-34-34a12 12 0 0 0-16.38-.55A176 176 0 1 1 402.1 157.8l-101.53-4.87a12 12 0 0 0-12.57 12v47.41a12 12 0 0 0 12 12h200.33a12 12 0 0 0 12-12V12a12 12 0 0 0-12-12z">
                    </path>
                </svg>
            </x-jet-button>
        @endif
        
    @endif
    </div>       
        {{-- Modal de Confirmar --}}
    <x-jet-dialog-modal wire:model="modalConf">
        <x-slot name="title">
            <h1 class="font-bold ">{{ __('AVISO') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Desea confirmar la comision de servicio?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalConf',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="Confirmar()"
                wire:loading.attr="disabled">
                {{ __('Confirmar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Pendiente --}}
    <x-jet-dialog-modal wire:model="modalPen">
        <x-slot name="title">
            <h1 class="font-bold ">{{ __('Aviso') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Dejar en pendiente la comision de servicio?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalPen',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="Pendiente()" wire:loading.attr="disabled">
                {{ __('Si') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Anulacion --}}
    <x-jet-dialog-modal wire:model="modalAnu">
        <x-slot name="title">
            <h1 class="font-bold ">{{ __('Aviso') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Desar Anular la comision de servicio?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAnu',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="Anular()" wire:loading.attr="disabled">
                {{ __('Anular') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

