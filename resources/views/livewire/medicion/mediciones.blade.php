<div>
    <table class="rounded-t-lg my-2 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-2 py-3 text-center">Ubigeo</th>
            <th class="px-2 py-3 text-center">Distrito</th>
            <th class="px-2 py-3 text-center">Ubicación</th>
            <th class="px-2 py-3 text-center">Latitud</th>
            <th class="px-2 py-3 text-center">Longitud</th>
            <th class="px-2 py-3 text-center">Radiación</th>
            <th class="px-2 py-3 text-center">Fecha</th>
            <th class="px-4 py-1 w-1/12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                    </path>
                </svg>
            </th>
        </tr>
        @forelse ($mediciones as $measurement)
            <tr class="bg-gray-100 border-b border-gray-200 text-sm">
                <td class="px-2">{{ $measurement->ubigee->id }}</td>
                <td class="px-2">{{ $measurement->ubigee->distrito }}</td>
                <td class="px-2 hover:text-blue-700 hover:font-bold">
                    <a target="_blank" href="{{ $measurement->maps }}">
                        {{ $measurement->ubicacion }}
                    </a>
                </td>
                <td class="px-2 text-center text-sm w-28">{{ $measurement->latitud }}</td>
                <td class="px-2 text-center text-sm w-28">{{ $measurement->longitud }}</td>
                <td class="px-2 text-green-600  font-extrabold">{{ $measurement->rni }}%</td>
                <td class="text-sm px-2 w-24">{{ $measurement->fecha }}</td>
                <td class="text-sm px-2 w-1/12 text-center">
                    <button wire:click='openModalImage({{ $measurement->id }})' class="text-green-500 m-auto hover:text-gray-900 cursor-pointer mr-2">
                        <abbr title="VER IMAGEN">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                                <path fill="currentColor"
                                    d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                            </svg>
                        </abbr>
                    </button>
                </td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200 text-center">
                <td colspan="7" class="py-2"> No hay registro</td>
            </tr>
        @endforelse
    </table>

    {{-- Modal de Ver Evidencia --}}
    @isset($openimagen)
        <x-jet-dialog-modal wire:model="modalImagen">
            <x-slot name="title">
                <h1 class="uppercase">Evidencia de La Medicion de RNI</h1>
            </x-slot>

            <x-slot name="content">
                <h1 class="uppercase font-bold text-lg">Medicion de {{$openimagen->ubicacion}}</h1>
                <div class=" ">
                    <div class=" shadow-md border  rounded-lg">
                        <div>
                            <img class="rounded-t-lg m-auto w-96 h-auto" src="{{ Storage::url($openimagen->imagen) }}"
                                alt="">
                        </div>
                        <div class="mx-4 my-2 text-base uppercase">
                            <label class="text-center text-lg underline my-2" for="">Detalles del Registro </label>
                            <p class="border-b border-gray-200">Fecha de Medicion : <span class="font-bold">{{$openimagen->fecha}}</span></p>
                            <p class="border-b border-gray-200">Provincia : <span class="font-bold">{{$openimagen->ubigee->provincia}}</span></p>
                            <p class="border-b border-gray-200">Distrito : <span class="font-bold">{{$openimagen->ubigee->distrito}}</span></p>
                            <p class="border-b border-gray-200">Latitud : <span class="font-bold">{{$openimagen->latitud}}</span></p>
                            <p class="border-b border-gray-200">Longitud : <span class="font-bold">{{$openimagen->longitud}}</span></p>
                            <p class="border-b border-gray-200">Valor de RNI : <span class="font-bold">{{$openimagen->rni . ' '}} %</span></p>
                            <p class="border-b border-gray-200">Maps : <a target="_blank" href="{{ $measurement->maps }}" class="font-bold hover:text-blue-900">Ubicacion Geografica en Google Maps</a></p>
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
    @endisset
</div>
