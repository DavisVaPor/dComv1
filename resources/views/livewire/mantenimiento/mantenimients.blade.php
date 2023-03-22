<div>
    @if ($activities->isNotEmpty())
        <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-2 text-center">#</th>
                <th class="px-4 py-1">Descripcion</th>
                <th class="px-4 py-1 text-center">Tipo de Servicio</th>
                <th class="px-4 py-1">Estacion</th>
                <th class="py-1 text-center w-24">Fecha</th>
                <th class="px-4 py-1 w-1/12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                        </path>
                    </svg>
                </th>

            </tr>

            @foreach ($activities as $activity)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="text-xs px-2 font-bold text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-1 text-sm">{{ $activity->descripcion }}</td>

                    <td class="px-4 py-1 text-xs text-center">{{ $activity->tipoActivity }}</td>
                    <td class="px-4 py-1 text-xs">
                        <a target="_blank" href="{{ route('estacion.show', [$activity->estation]) }}">
                            {{ $activity->estation->name }}
                        </a>
                    </td>
                    <td class="text-xs text-center w-24">{{ $activity->fechaInicio }}</td>
                    <td class="px-4 py-1 w-1/12">
                        <button wire:click='modalview({{$activity}})' class="text-green-500 hover:text-gray-900 cursor-pointer mr-2">
                            <abbr title="AGREGAR IMAGEN">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                                    <path fill="currentColor"
                                        d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                                </svg>
                            </abbr>
                        </button>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $activities->links() }}
    @else
        <div class="text-center border border-gray-100">
            <p class="text-gray-400">.:: Sin registro de actividades ::.</p>
        </div>
    @endif


    <x-jet-dialog-modal wire:model="modalopen">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Imagenes de la Actividad Realizada</h1>
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between items-center my-2">
                <x-jet-label class="text-base font-bold border-gray-200 uppercase" for="tipo"
                    value="{{ __('Evidencia Fotográfica') }}" />
            </div>
            <div class="mx-auto px-2 md:px-6 2xl:px-0 flex justify-center items-center bg-gray-50">
                <div class="flex flex-col jusitfy-start items-start">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-10 lg:gap-y-0 items-center">
                        @forelse ($activity->images as $item)
                        <div class="flex flex-col m-2">
                            <div class="group relative">
                                <img class="hover:bg-opacity-50 shadow-xl rounded-md sm:block lg:"
                                    src="{{ Storage::url($item->url) }}" alt="bag" />
                            </div>
                        </div>
                        @empty
                            No hay datos
                        @endforelse
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalopen',false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
