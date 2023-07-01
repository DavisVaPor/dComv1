<div>
    <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
        <thead>
            <tr class="text-center border-b-2 border-gray-300">
                <th class="px-2 py-2 w-4/12 ml-2" colspan="2">Tema de Actividad</th>
                <th class="px-2 py-2 ml-2">Ubicacion</th>
                <th class="px-2 py-2 w-2/12 ml-2">Fecha</th>
                <th class="px-2 py-2 w-1/12 ml-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($promotions as $promotion)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-2 font-bold text-sm text-center w-4">{{ $loop->iteration }}</td>
                    <td class="px-2 font-bold text-sm text-left w-4/12">
                        <h1 class="text-center">
                            {{ $promotion->tema }}
                        </h1>
                        <span class="text-left  text-xs">
                            {{ $promotion->descripcion }}
                        </span>
                    </td>
                    <td class="px-2 font-bold text-sm text-center">
                        {{ $promotion->ubigee->provincia }}-{{ $promotion->ubigee->distrito }}</td>
                    <td class="px-2 font-bold text-sm text-center">{{ $promotion->fecha }}</td>
                    <td class="px-4 py-1 w-1/12">
                        <div class="flex justify-between">
                            <button wire:click='addModalMercha({{ $promotion->id }})'
                                class="text-yellow-500 hover:text-gray-900 cursor-pointer" wire:click=""
                                wire:loading.attr="disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <button wire:click='openModalImage({{$promotion->id}})' class="text-green-500 hover:text-gray-900 cursor-pointer"
                                wire:click="" wire:loading.attr="disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                                    <path fill="currentColor"
                                        d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td colspan="5" class="text-center my-2">.... Sin Registro Añadido....</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Modal de Ver Evidencia --}}
    @isset($openimagen)
        <x-jet-dialog-modal wire:model="modalImagen">
            <x-slot name="title">
                <h1 class="uppercase">Fotografia de la actividade de promocion</h1>
            </x-slot>

            <x-slot name="content">
                <h1 class="uppercase font-bold text-lg">Actividade de Promocion en {{$openimagen->ubigee->provincia}}-{{$openimagen->ubigee->distrito}}</h1>
                <div class=" ">
                    <div class=" shadow-md border  rounded-lg">
                        <div>
                            <img class="rounded-t-lg m-auto w-96 h-auto" src="{{ Storage::url($openimagen->imagen) }}"
                                alt="">
                        </div>
                        <div class="mx-4 my-2 text-base uppercase">
                            <label class="text-center text-lg underline my-2" for="">Detalles del Registro </label>
                            <p class="border-b border-gray-200">Tema <span class="font-bold">{{$openimagen->tema}}</span></p>
                            <p class="border-b border-gray-200">Descripcion : <span class="font-bold">{{$openimagen->descripcion}}</span></p>
                            <p class="border-b border-gray-200">Fecha : <span class="font-bold">{{$openimagen->fecha}}</span></p>
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

    {{-- Modal de Mercha --}}
    <x-jet-dialog-modal wire:model="modalMercha">
        <x-slot name="title">
            <h1 class="font-bold uppercase">{{ __('Agregar Material de Promoción') }}</h1>
        </x-slot>

        <x-slot name="content">
            @if ($livraisons)
                <x-jet-label class="text-base w-full mr-5 font-bold border-gray-200" for="name"
                    value="{{ __('Registro de Merchandising Utilizada') }}" />

                <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800"> 
                    <thead>
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="font-bold px-2 py-1">Denominacion</th>
                            <th class="font-bold px-2 py-1 text-center">Cantidad</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($livraisons as $item)
                            <tr class="border-b border-gray-200" >
                                <td class="px-2 py-1">{{ $item->merchandising->name }}{{ $item->merchandising->descripcion }}</td>
                                <td class="px-2 py-1 text-center">{{ $item->cantidad }}</td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            @endif

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
