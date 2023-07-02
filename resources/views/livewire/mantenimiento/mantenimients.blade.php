<div>
    <div class="flex my-3">
        <input wire:model='search' class="form-control rounded-xl mr-sm-2 mr-2 w-full" type="search"
            placeholder="Búsqueda de registros" aria-label="Search">

        <select class="rounded-xl text-sm " name="tipo" id="tipo" wire:model='tipo'>
            <option seleted value="">Tipo de Servicio</option>
            <option value="DIAGNOSTICO">Diagnostico</option>
            <option value="MANT. PREVENTIVO">Mante Preventivo</option>
            <option value="MANT. CORRECTIVO">Mante Correctivo</option>
        </select>

        <input class="rounded-xl text-sm ml-3 px-1" type="date" name="" id="">
    </div>

    @if ($mantenimients->isNotEmpty())
        <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-1">Estación</th>
                <th class="px-4 py-1 text-center">Tipo de Servicio</th>
                <th class="px-4 py-1 text-center">Informe Presentado</th>
                <th class="py-1 text-center w-24">Fecha del Servicio</th>
                <th class="px-4 py-1 w-1/12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                        </path>
                    </svg>
                </th>

            </tr>

            @foreach ($mantenimients as $mantenimient)
                <tr class="bg-gray-100 border-b border-gray-200 text-sm">
                    <td class="px-4 py-1">
                        <a target="_blank" href="{{ route('estacion.show', [$mantenimient->estation]) }}">
                            {{ $mantenimient->estation->name }}
                            SIS: {{ $mantenimient->estation->sistema }}
                            TIPO: {{ $mantenimient->estation->tipo }}
                        </a>
                    </td>
                    <td class="px-4 py-1 text-center">{{ $mantenimient->tipo }}</td>
                    <td class="px-4 py-1 text-center">
                        <a target="_blank" href="{{ route('informe.show', [$mantenimient->report]) }}">
                            INFORME: {{ $mantenimient->report->id }} {{ $mantenimient->report->user->name }}-{{ $mantenimient->report->user->cargo }}                           
                        </a>
                    </td>
                    <td class="text-center w-24">{{ $mantenimient->fechaMantenimiento }}</td>
                    <td class="text-center w-24">
                        <div class="flex justify-center">
                            <button wire:click="detalle({{ $mantenimient->id }})"
                                class="text-blue-500 hover:text-gray-900 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 " viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $mantenimients->links() }}
    @else
        <div class="text-center border border-gray-100">
            <p class="text-gray-400">.:: Sin registro de actividades ::.</p>
        </div>
    @endif


    {{-- Modal de Ver Evidencia --}}
    <x-jet-dialog-modal wire:model="detalle">
        <x-slot name="title">
            <h1 class="uppercase font-bold">Detalle del Servicio Realizado en {{ $mantenimient->estation->name }}</h1>
        </x-slot>

        <x-slot name="content">
            <div class="shadow-md border  rounded-lg">
                <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="px-4 py-1 text-center">Descripcion</th>
                        <th class="px-4 py-1 w-1/12">

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                                </path>
                            </svg>
                        </th>

                    </tr>

                    @foreach ($mantenimient->activities as $activity)
                        <tr class="bg-gray-100 border-b border-gray-200 text-sm">
                            <td class="px-4 py-1 text-left">{{ $activity->descripcion }}</td>
                            <td class="text-center w-24">
                                <div class="flex justify-center">
                                    <button wire:click='openModalImage({{ $activity->id }})'
                                        class="text-green-500 hover:text-gray-900 cursor-pointer mr-2">
                                        <abbr title="VER IMAGEN">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="w-6 h-6 m-auto">
                                                <path fill="currentColor"
                                                    d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                                            </svg>
                                        </abbr>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('detalle',false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Imagen --}}
    <x-jet-dialog-modal wire:model="modalImagen">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Imagenes de la Actividad Realizada</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mx-auto px-2 md:px-6 2xl:px-0 flex justify-center items-center bg-gray-50">
                <div class="flex flex-col jusitfy-start items-start">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-10 lg:gap-y-0 items-center">
                        @foreach ($activity->images as $item)
                            <div class="flex flex-col m-2">
                                <div class="group relative">
                                    <img class="hover:bg-opacity-50 shadow-xl rounded-md sm:block lg:"
                                        src="{{ Storage::url($item->url) }}" alt="bag" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalImagen',false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Visualizar Acta Cargada --}}
    {{-- @isset($visualizarActa)
        <x-jet-dialog-modal wire:model="modalInfo">
            <x-slot name="title">
                <h1 class="uppercase">Acta de Manteniemiento</h1>
            </x-slot>

            <x-slot name="content">
                <h1 class="text-lg text-center font-extrabold">
                    ESTACIÓN DE {{ $visualizarActa->estation->name }}
                </h1>
                <h3 class="text-sm text-right font-extrabold">
                    FECHA DE CREACION {{ $visualizarActa->created_at }}
                </h3>
                <iframe src="{{ Storage::url($visualizarActa->file_url) }}" width="100%" height="400px">
                </iframe>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalInfo',false)" wire:loading.attr="disabled">
                    {{ __('Cerrar') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
    @endisset --}}
</div>
