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
    <table class="rounded-t-lg my-2 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-2 py-3 text-center">Ubigeo</th>
            <th class="px-2 py-3 text-center">Distrito</th>
            <th class="px-2 py-3 text-center">Ubicación</th>
            <th class="px-2 py-3 text-center">Latitud</th>
            <th class="px-2 py-3 text-center">Longitud</th>
            <th class="px-2 py-3 text-center">Radiación</th>
            <th class="px-2 py-3 text-center">Fecha</th>
            @if ($report->estado == 'BORRADOR')
                <th class="px-2 py-3">Acciones</th>
            @endif
        </tr>
        @forelse ($report->measurements as $measurement)
            <tr class="bg-gray-100 border-b border-gray-200 text-sm">
                <td class="px-2">{{ $measurement->ubigee->id }}</td>
                <td class="px-2">{{ $measurement->ubigee->distrito }}</td>
                <td class="px-2 hover:text-blue-700 hover:font-extrabold">
                    <a target="_blank" href="{{ $measurement->maps }}">
                        {{ $measurement->ubicacion }}
                    </a>
                </td>
                <td class="px-2 text-center text-sm w-28">{{ $measurement->latitud }}</td>
                <td class="px-2 text-center text-sm w-28">{{ $measurement->longitud }}</td>
                <td class="px-2 text-center text-green-600  font-bold">{{ $measurement->rni }} %</td>
                <td class="text-sm px-2 w-24">{{ $measurement->fecha }}</td>
                @if ($report->estado == 'BORRADOR')
                    <td class="px-2">

                        <div class="flex justify-between">
                            <button wire:click='openModalImage'
                                class="text-green-500 hover:text-gray-900 cursor-pointer mr-2">
                                <abbr title="AGREGAR IMAGEN">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-6 h-6 m-auto">
                                        <path fill="currentColor"
                                            d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                                    </svg>
                                </abbr>
                            </button>
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
        @empty
            <tr class="bg-gray-100 border-b border-gray-200 text-center">
                <td colspan="7" class="py-2"> No hay registro</td>
            </tr>
        @endforelse
    </table>

    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Registro de Medicion RNI</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4 bg-gray-50 p-2 border rounded-xl">
                <div class="flex items-center">
                    <x-jet-label class="text-base mr-5 font-bold border-gray-200" for="name"
                        value="{{ __('UBICACIÓN') }}" />
                    <select class="rounded-xl text-sm" name="tipo" id="tipo" wire:model='ubigeo'>
                        <option value="" selected></option>
                        @foreach ($report->commission->ubigee as $item)
                            <option value="{{ $item->id }}">{{ $item->provincia }}-{{ $item->distrito }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <x-jet-input-error for="ubigeo" class="mt-2" />

                <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="name"
                    value="{{ __('REFERENCIA DE LA TOMA DE MEDIDA') }}" />
                <textarea id="name" wire:model.defer='measurement.ubicacion'
                    class="resize-none w-full h-20 border rounded-md"></textarea>
                <x-jet-input-error for="measurement.ubicacion" class="mt-2" />

                <h1 class="text-base font-bold border-gray-200 text-gray-800 mt-2">COORDENADAS</h1>
                <div class="flex justify-between text-sm">
                    <div>
                        <x-jet-label class="text-base border-gray-200 font-semibold" for="name"
                            value="{{ __('LATITUD') }}" />
                            <p></p>
                        <div class="flex items-center text-xs">
                            <x-jet-input id="Latitud" type="number" class="w-16 mt-1 rounded-xl block"
                                wire:model='latgra' />
                            <p class="font-bold text-lg">°</p>
                            <x-jet-input id="Latitud" type="number" class="w-16 mt-1 ml-1 rounded-xl block"
                                wire:model='latmin' />
                            <p class="font-bold text-lg">'</p>
                            <x-jet-input id="Latitud" type="number" class="w-24 mt-1 ml-1 rounded-xl block"
                                wire:model='latseg' />
                            <p class="font-bold text-lg">" S</p>
                        </div>
                        <x-jet-input-error for="latgra" class="" />
                        <x-jet-input-error for="latmin" class="" />
                        <x-jet-input-error for="latseg" class="" />
                    </div>
                    <div>
                        <x-jet-label class="text-base border-gray-200 font-semibold" for="name"
                            value="{{ __('LONGITUD ') }}" />
                        <div class="flex items-center text-xs">
                            <x-jet-input id="longra" type="number" class="w-16 mt-1 rounded-xl block font-semibold"
                                wire:model='longra' />
                            <p class="font-bold text-lg">°</p>
                            <x-jet-input id="lonmin" type="number" class="w-16 mt-1 ml-1 rounded-xl block font-semibold"
                                wire:model='lonmin' />
                            <p class="font-bold text-lg">' </p>
                            <x-jet-input id="lonseg" type="number" class="w-20 mt-1 ml-1 rounded-xl block font-semibold"
                                wire:model='lonseg' />
                            <p class="font-bold text-lg">" W</p>
                        </div>
                        <x-jet-input-error for="longra" class="" />
                        <x-jet-input-error for="lonmin" class="" />
                        <x-jet-input-error for="lonseg" class="" />
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="name"
                            value="{{ __('Fecha Registro') }}" />
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

                <div class="mt-2">
                    <label
                        class="inline-flex items-center py-2 px-2 bg-gray-300 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-white">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <input type='file' class="" wire:model='measurement.imagen' accept="image/*">
                    </label>
                    <x-jet-input-error for="measurement.imagen" class="mt-2" />
                </div>
      
                

                <div wire:loading wire:target="imagen" class="bg-green-300 border-l-4 border-red-300 p-4 m-auto"
                    role="alert">
                    <p class="font-bold text-center">Previsualizacion</p>
                    <p>Cargando la imagen ...</p>
                </div>
                @if ($imagen)
                    <img class="border-gray-200 border-2 mx-auto mt-2" src="{{ $imagen->temporaryUrl() }}">
                @endif
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

    {{-- Modal de Ver Evidencia --}}
    <x-jet-dialog-modal wire:model="modalImagen">
        <x-slot name="title">
            <h1 class="uppercase">Evidencia Medicion de RNI</h1>
        </x-slot>

        <x-slot name="content">
            <div class="w-100 ">
    
                <div class=" m-auto shadow-md border  rounded-lg max-w-sm bg-gray-800">
                    <div class="flex justify-end">
                       
                    </div>
                    
                    <div href="#">
                        <img class="rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
                    </div>
                    <div class="p-5">
                        <p href="#">
                            <h5 class="text-gray-900 font-bold text-lg tracking-tight mb-2 dark:text-white">Medicion de RNI Colegio San Nicolas</h5>
                        </p>
                        <li class="">Medicion</li>
                        <li class=""></li>
                        <li class=""></li>
                        <li class=""></li>
                        <li class=""></li>
                        <li class=""></li>
                        <p class="font-normal text-gray-700 mb-3 dark:text-gray-400"></p>
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
</div>
