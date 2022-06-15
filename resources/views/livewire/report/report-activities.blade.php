<div>
    <h1 class="mr-5 text-lg font-bold text-blue-800 text-center">REGISTRO DE ACTIVIDADES REALIZADAS</h1>
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

    

    @if ($estation->activities->isNotEmpty())
        <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-2 text-center">#</th>
                <th class="px-4 py-3">Descripcion</th>
                <th class="px-4 py-3 text-center">Tipo de Servicio</th>
                <th class="py-3 text-center w-24">Fecha</th>
                @if ($informe->estado == 'BORRADOR')
                    <th class="px-4 py-3 w-1/12">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 m-auto" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                            </path>
                        </svg>
                    </th>
                @endif
            </tr>
            
            @foreach ($estation->activities as $activity)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-2 font-bold text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-3 text-sm">{{ $activity->descripcion }}</td>
                    <td class="px-4 py-3 text-sm text-center">{{ $activity->tipoActivity }}</td>
                    <td class="text-sm text-center w-24">{{ $activity->fechaInicio }}</td>
                    @if ($informe->estado == 'BORRADOR')
                        <td class="px-4 py-3 w-1/12">
                            <div class="flex justify-between">
                                @livewire('report.activities.images', ['activity' => $activity, 'informe' => $informe], key($activity->id))

                                <button wire:click="editActivity({{ $activity->id }})"
                                    class="text-blue-500 hover:text-gray-900 cursor-pointer mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                               
                                <button class="text-red-500 hover:text-gray-900 cursor-pointer"
                                    wire:click="mostrarDel({{ $activity->id }})" wire:loading.attr="disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
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
            <p class="text-gray-400">.:: Sin registro de actividades ::.</p>
        </div>
    @endif



    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Registrar una Actividad</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-8 sm:col-span-4">
                <div class="flex justify-between">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 " for="tipo"
                            value="{{ __('Tipo de la actividad') }}" />
                        <select class="rounded-xl text-sm" name="tipo" id="tipo"
                            wire:model.defer='activity.tipoActivity'>
                            <option>Seleccione</option>
                            <option value="DIAGNOSTICO">DIAGNOSTICO</option>
                            <option value="MANT. PREVENTIVO">MANTENIMIENTO PREVENTIVO</option>
                            <option value="MANT. CORRECTIVO">MANTENIMIENTO CORRECTIVO</option>
                        </select>
                        <x-jet-input-error for="activity.tipoActivity" class="mt-2" />
                    </div>

                    <div class="flex justify-between">
                        <div class="block">
                            <x-jet-label class="text-base font-bold border-gray-200" for="name"
                                value="{{ __('Fechas de la Actividad') }}" />
                            <input class="rounded-xl text-sm" type="date" name="" id=""
                                wire:model.defer='activity.fechaInicio'>
                            <x-jet-input-error for="activity.finicio" class="mt-2" />
                            AL
                            <input class="rounded-xl text-sm" type="date" name="" id=""
                                wire:model.defer='activity.fechaFin'>
                            <x-jet-input-error for="activity.ffin" class="mt-2" />
                        </div>
                    </div>
                </div>
                <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="descripcion"
                    value="{{ __('Descripcion de la actividad') }}" />
                <textarea id="name" wire:model.defer='activity.descripcion'
                    class="resize-none w-full h-1/4 border rounded-md"></textarea>
                <x-jet-input-error for="activity.descripcion" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveActivity()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold uppercase">{{ __('Eliminar actividad') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Seguro que desea eliminar?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="deleteActivity({{ $modalDel }})"
                wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
