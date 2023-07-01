<div class="mt-2">
    <div class="flex my-2 justify-between border-b border-gray-300 border-3">
        <h1 class="mr-5 text-lg font-bold text-gray-800">ACTIVIDADES DE PROMOCION DE LAS TELECOMUNICACIONES</h1>

    </div>

    <div class="flex justify-end">
        @if ($report->estado == 'BORRADOR')
            <x-jet-button wire:click="addModalPromotion" class="bg-green-500">
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
            @forelse ($report->promotions as $promotion)
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
                    @if ($report->estado == 'BORRADOR')
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
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-6 h-6 m-auto">
                                        <path fill="currentColor"
                                            d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
                                    </svg>
                                </button>
                                {{-- @livewire('report.promotion.images', ['report' => $report], key($report->id)) --}}
                                <button wire:click='editPromotion({{ $promotion->id }})'
                                    class="text-blue-500 hover:text-gray-900 cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button wire:click='mostrarDelPromotion({{ $promotion->id }})'
                                    class="text-red-500 hover:text-gray-900 cursor-pointer" wire:click=""
                                    wire:loading.attr="disabled">
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
            @empty
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td colspan="5" class="text-center my-2">.... Sin Registro Añadido....</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- @livewire('report.promotion.merchandising', ['report' => $report], key($report->id)) --}}

    {{-- Modal de Registro de Actividad de Promocion --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Registrar una Actividad</h1>
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between items-center mb-1">
                <div>
                    <x-jet-label class="text-base mr-5 font-bold border-gray-200" for="name"
                        value="{{ __('Ubicación') }}" />
                    <select class="rounded-xl w-full text-sm" name="ubigeo" id="ubigeo" wire:model='ubigeo'>
                        <option value="" selected></option>
                        @foreach ($report->commission->ubigee as $item)
                            <option value="{{ $item->id }}">{{ $item->provincia }}-{{ $item->distrito }}
                            </option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="ubigeo" class="mt-2" />
                </div>

                <div>
                    <x-jet-label class="text-base font-bold border-gray-200" for="name"
                        value="{{ __('Fecha') }}" />
                    <input class="rounded-xl" type="date" max="{{ $fechaActual }}" name="" id=""
                        wire:model.defer='promotion.fecha'>
                    <x-jet-input-error for="promotion.fecha" class="mt-2" />
                </div>
            </div>
            <div class="flex items-center mt-1">
                <x-jet-label class="text-base font-bold border-gray-200" for="tema"
                    value="{{ __('Tema') }}" />
                <x-jet-input type="text" class="ml-2 w-full block font-semibold" wire:model='promotion.tema' />
            </div>
            <x-jet-input-error for="promotion.tema" class="mt-2" />

            <div class="col-span-8 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="descripcion"
                    value="{{ __('Descripcion de la actividad') }}" />
                <textarea id="name" wire:model.defer='promotion.descripcion' class="resize-none w-full h-1/4 border rounded-md"></textarea>
                <x-jet-input-error for="promotion.descripcion" class="mt-2" />
            </div>
            <div class="mt-2">
                <div>
                    <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="descripcion"
                        value="{{ __('Imagen de la Actividad (opcional)') }}" />
                    <label
                        class="inline-flex items-center py-1 px-2 bg-blue-300 text-blue-800 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">

                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <input type='file' class="" wire:model='imagen' accept="image/*">
                    </label>
                    <x-jet-input-error for="imagen" class="mt-2" />
                </div>
                
                {{--Acta de evidencia 
                    <div class="mt-2">
                    <x-jet-label class="text-base font-bold border-gray-200" for="descripcion"
                        value="{{ __('Acta de Entrega (opcional)') }}" />
                    <label
                        class="inline-flex items-center py-1 px-2 bg-blue-300 text-blue-800 rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-black">

                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <input type='file' class="" wire:model='file' accept="application/pdf">
                    </label>
                    <x-jet-input-error for="file" class="mt-2" />
                </div> --}}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="savePromotion" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold uppercase">{{ __('Eliminar actividad realizada de Promocion') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Seguro que desea eliminar el registro?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="deletePromotion({{ $modalDel }})"
                wire:loading.attr="disabled">
                {{ __('Eliminar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

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
                            <th class="font-bold px-2 py-1 text-center">Acciones</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($livraisons as $item)
                            @if ($item->promotion_id === $promotion->id)
                            <tr class="border-b border-gray-200" >
                                <td class="px-2 py-1">{{ $item->merchandising->name }}</td>
                                <td class="px-2 py-1 text-center">{{ $item->cantidad }}</td>
                                <td class="px-2 py-1 text-center">
                                    <button wire:click='eliminarEntrega({{ $item->id }})'
                                        class="text-red-500 hover:text-gray-900 cursor-pointer" wire:click=""
                                        wire:loading.attr="disabled">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            @endif


            <div>
                <x-jet-label class="text-base mr-5 font-bold border-gray-200" for="name"
                    value="{{ __('Merchandising Utilizada') }}" />
                <select class="rounded-xl w-full text-sm" name="merca" id="merca" wire:model='merchadensy'>
                    <option value="" selected>Selecciona un material</option>
                    @foreach ($merca as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}
                        </option>
                    @endforeach
                </select>
                <x-jet-input-error for="merchadensy" class="mt-2" />

                <div class="flex justify-between mt-2">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200" for="cantidad"
                            value="{{ __('Cantidad ') }}" />
                        <x-jet-input type="number" class="ml-2 w-32 block font-semibold" wire:model='cantidad' />
                        <x-jet-input-error for="cantidad" class="mt-2" />
                        @if ($merchadensy)
                            <span class="ml-2 font-bold">Stock {{ $cantStock->stock }}</span>
                        @endif
                    </div>
                    <div>

                    </div>
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addMercha()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

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
</div>
