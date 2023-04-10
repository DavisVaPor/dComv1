<div class="mt-2">
    <div class="flex items-center">
        <p>TIPO DE SERVICIO :</p>

        <span class="font-semibold text-base ml-2 text-blue-400">
            @isset($informe->mantenimient)
                {{ $informe->mantenimient->tipo }}
            @else
                SIN DEFINIR
            @endisset
        </span>
        @if ($informe->estado == 'BORRADOR')
            <div class="ml-2">
                @isset ($informe->mantenimient->tipo)
                    <button wire:click="editModalServicio({{ $informe->mantenimient->id }})"
                        class="text-blue-500 hover:text-gray-900 cursor-pointer items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 m-auto items-center">
                            <path fill="currentColor"
                                d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                        </svg>
                    </button>
                @else
                    <button wire:click="addModalServicio()"
                        class="text-blue-500 hover:text-gray-900 cursor-pointer items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                            class="w-4 h-4 m-auto items-center">
                            <path fill="currentColor"
                                d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                        </svg>
                    </button>
                @endisset
            </div>
        @endif

    </div>

    {{-- Modal de Tipo de Servicio --}}
    <x-jet-dialog-modal wire:model="modalServicio">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Servicio a Realizar</h1>
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between mb-2">
                <h1 class="font-bold uppercase">Estacion:{{ $estation->name }}</h1>
                <h1 class="font-bold uppercase">Estado:{{ $estation->estado }}</h1>
            </div>

            <div class="col-span-8 sm:col-span-4">
                <div class="flex justify-between">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 " for="tipo"
                            value="{{ __('Tipo de Servicio') }}" />
                        <select class="rounded-xl text-sm" name="tipo" id="tipo" wire:model='tipoMantenimiento'>
                            <option>Seleccione</option>
                            <option value="DIAGNOSTICO">DIAGNOSTICO</option>
                            <option value="PREVENTIVO">MANTENIMIENTO PREVENTIVO</option>
                            <option value="CORRECTIVO">MANTENIMIENTO CORRECTIVO</option>
                        </select>
                        <x-jet-input-error for="tipoMantenimiento" class="mt-2" />
                    </div>

                    <div class="flex justify-between">
                        <div class="block">
                            <x-jet-label class="text-base font-bold border-gray-200" for="name"
                                value="{{ __('Fecha de Servicio') }}" />
                            <input class="rounded-xl text-sm" type="date" name="" id=""
                                wire:model='fechaMantenimiento'>
                            <x-jet-input-error for="fechaMantenimiento" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalServicio',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveMantenimiento()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
