<div>
    <div class="flex my-3 justify-between border-b border-gray-300 border-3">
        <h1 class="mr-5 text-lg font-bold text-gray-800">DATOS DE MEDICION DE RNI</h1>
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

    @if ($report->measurements->isNotEmpty())
        <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-2 py-3"></th>
                <th class="px-2 py-3">Distrito</th>
                <th class="px-2 py-3 text-center">Ubicación</th>
                <th class="px-2 py-3">Latitud</th>
                <th class="px-2 py-3">Longitud</th>
                <th class="px-2 py-3">Radiacion</th>
                <th class="px-2 py-3 text-center">Fecha</th>
                @if ($report->estado == 'BORRADOR')
                    <th class="px-2 py-3">Acciones</th>
                @endif
            </tr>
            @foreach ($report->measurements as $measurement)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-2 mb-auto font-bold">{{ $loop->iteration }}</td>
                    <td class="px-2 py-3">{{ $measurement->ubigee->distrito}}</td>
                    <td class="px-2 py-3">{{ $measurement->ubicacion }}</td>
                    <td class="px-2 py-3 text-center">{{ $measurement->latitud }}</td>
                    <td class="px-2 py-3 text-center">{{ $measurement->longitud }}</td>
                    <td class="px-2 py-3 text-center">{{ $measurement->rni }} %</td>
                    <td class="text-sm px-2 py-3 w-24">{{ $measurement->fecha }}</td>
                    @if ($report->estado == 'BORRADOR')
                        <td class="px-2 py-3">
                            <div class="flex justify-between">
                                <button wire:click="edit({{ $measurement->id }})"
                                    class="text-blue-500 hover:text-gray-900 cursor-pointer mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 m-auto" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="text-red-500 hover:text-gray-900 cursor-pointer"
                                    wire:click="mostrarDel({{ $measurement->id }})" wire:loading.attr="disabled">
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
            <p class="text-gray-400">.:: Aun no se ha agregado alguna actividad a este informe de actividades de servicio ::.</p>
        </div>
    @endif

    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold">Añadir un Punto de Medicion al Informe</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 bg-gray-50 p-2 border rounded-xl">

                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Ubicacion') }}" />
                <textarea id="name" wire:model.defer='measurement.ubicacion'
                    class="resize-none w-full h-20 border rounded-md"></textarea>
                <x-jet-input-error for="measurement.ubicacion" class="mt-2" />
                
                <h1 class="text-base font-bold border-gray-200 text-gray-800 mt-2">Coordenadas</h1>
                <div class="flex justify-between">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200" for="name"
                        value="{{ __('Latitud') }}" />
                        <x-jet-input id="Latitud" type="text" class="mt-1 rounded-xl block font-semibold"
                            wire:model.defer='measurement.latitud'/>
                        <x-jet-input-error for="measurement.latitud" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200" for="name"
                        value="{{ __('Longitud') }}" />
                        <x-jet-input id="longitud" type="text" class="mt-1 rounded-xl block font-semibold"
                            wire:model.defer='measurement.longitud'/>
                        <x-jet-input-error for="measurement.longitud" class="mt-2" />
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="name"
                        value="{{ __('Fecha Inicio del registro') }}" />
                        <input class="rounded-xl" type="date" name="" id="" wire:model.defer='measurement.fecha'>
                        <x-jet-input-error for="measurement.fecha" class="mt-2" />
                    </div>
                    <div class="ml-8">
                        <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="name"
                        value="{{ __('Valor de RNI') }}" />
                        <input class="rounded-xl" type="text" name="" id="" wire:model.defer='measurement.rni'>
                        <x-jet-input-error for="measurement.rni" class="mt-2" />
                    </div>
                </div>
                <div>
                    <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="name"
                        value="{{ __('Ubigeo') }}" />
                    <div class="flex">
                        <select wire:model='provincia' class="rounded-xl ml-2" name="" id="">
                            <option selected value="">Provincia</option>
                            <option value="Chachapoyas">Chachapoyas</option>
                            <option value="Bagua">Bagua</option>
                            <option value="Bongara">Bongara</option>
                            <option value="Luya">Luya</option>
                            <option value="Rodriguez de Mendoza">Rodriguez de Mendoza</option>
                            <option value="Condorcanqui">Condorcanqui</option>
                            <option value="Utcubamba">Utcubamba</option>
                        </select>
                        <select wire:model='distrito' class="rounded-xl ml-8" name="" id="">
                            <option selected value="">Distrito</option>
                            @foreach ($ubigees as $distrito)
                                <option value="{{$distrito->id}}">{{$distrito->distrito}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>   
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="save()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold">{{ __('Eliminar Registro') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Seguro que desea eliminar el registro?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="delete({{ $modalDel }})" onclick="location.reload()"
                wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>