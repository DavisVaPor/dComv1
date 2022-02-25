<div>
    <div class="flex justify-between">
        <h1 class="ml-5 text-lg font-bold text-gray-600 uppercase">- Fotos</h1>
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

    @if ($report->images->isNotEmpty())
        <div class="container">
            <div class="flex flex-flex-wrap ">
                @foreach ($report->images as $image)
                    <div class="group relative">

                        <img alt="Placeholder" class="block h-48 w-full rounded hover:opacity-50"
                            src="{{ Storage::url($image->url) }}">
                        <div class="absolute rounded bg-opacity-0 w-full h-full top-0 flex items-center duration-700 transition justify-end">
                            <button class="text-red-500 hover:text-gray-900 cursor-pointer"
                                wire:click="mostrarDel({{ $image->id }})" wire:loading.attr="disabled">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 xl:w-1/3 px-4 bg-gray-100 my-2 shadow-xl rounded-lg ">
                        <div class="bg-white rounded-lg overflow-hidden">
                            <img src="{{ Storage::url($image->url) }}" alt="image"
                                class="w-full object-cover rounded-lg rounded-b-none hover:opacity-50" />
                            <div class="p-6 sm:p-9 md:p-7 xl:p-9 text-right">
                                <button class="text-red-500 hover:text-gray-900 cursor-pointer"
                                    wire:click="mostrarDel({{ $image->id }})" wire:loading.attr="disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="text-center border border-gray-100 mt-2">
            <p class="text-gray-400">.:: Aun no se ha ingresado algun archivo a este informe ::.</p>
        </div>
    @endif
{{-- Modal de Añadir --}} <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold">Añadir foto de evidencia</h1>
        </x-slot>

        <x-slot name="content">

            @empty(!$report->commission->estations)
                <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="estacion.name"
                    value="{{ __('Estacion donde se realizo la actividad') }}" />
                <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="font-bold px-4 py-3"></th>
                        <th class="px-4 py-3">Nombre</th>
                        <th class="px-4 py-3">Provincia</th>
                        <th class="px-4 py-3">Distrito</th>
                    </tr>
                    @foreach ($report->commission->estations as $estation)
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">
                                <input class="rounded-2xl" wire:model='selectedE' value="{{ $estation->id }}"
                                    type="radio">
                            </td>
                            <td class="px-4 py-3">{{ $estation->name }}</td>
                            <td class="px-4 py-3">{{ $estation->ubigeo->provincia }}</td>
                            <td class="px-4 py-3">{{ $estation->ubigeo->distrito }}</td>
                        </tr>
                    @endforeach
                </table>
                <x-jet-input-error for="selectedE" class="mt-2" />
            @else
                <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="ubigeo.name"
                    value="{{ __('Estacion donde se realizo la actividad') }}" />
                <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                    <tr class="text-left border-b-2 border-gray-300">
                        <th class="font-bold px-4 py-3"></th>
                        <th class="px-4 py-3">Provincia</th>
                        <th class="px-4 py-3">Distrito</th>
                    </tr>
                    @foreach ($report->commission->ubigee as $ubigeo)
                        <tr class="bg-gray-100 border-b border-gray-200">
                            <td class="px-4 py-3">
                                <input class="rounded-2xl" wire:model='selectedU' value="{{ $ubigeo->id }}"
                                    type="radio">
                            </td>
                            <td class="px-4 py-3">{{ $ubigeo->provincia }}</td>
                            <td class="px-4 py-3">{{ $ubigeo->distrito }}</td>
                        </tr>
                    @endforeach
                </table>
                <x-jet-input-error for="selectedU" class="mt-2" />
            @endempty

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" type="text" class="mt-1 border-gray-600 block w-full font-semibold"
                    wire:model.defer='image.name' />
                <x-jet-input-error for="image.name" class="mt-2" />
            </div>

            <div>
            </div>
            <div class="col-span-6 sm:col-span-4 mt-2">
                <x-jet-label class="text-base font-bold border-gray-200" for="url" value="{{ __('Imagen') }}" />
                <label
                    class="inline-flex items-center py-2 px-2 bg-blue-300 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-400 hover:text-white">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <input type='file' class="" wire:model='imagen' accept="image/*">
                </label>
                <x-jet-input-error for="imagen" class="mt-2" />
            </div>
            <div wire:loading wire:target="imagen" class="bg-yellow-300 border-l-4 border-red-300 p-4 m-auto"
                role="alert">
                <p class="font-bold text-center">Previsualizacion</p>
                <p>Cargando la imagen ...</p>
            </div>
            @if ($imagen)
                <img class="border-gray-200 border-2 mx-auto mt-2" src="{{ $imagen->temporaryUrl() }}">
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveImage()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
        </x-jet-dialog-modal>

        {{-- Modal de Eliminar --}}
        <x-jet-dialog-modal wire:model="modalDel">
            <x-slot name="title">
                <h1 class="font-bold">{{ __('Eliminar archivo') }}</h1>
            </x-slot>

            <x-slot name="content">
                {{ __('¿Seguro que desea eliminar?') }}

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="deleteImage({{ $modalDel }})"
                    wire:loading.attr="disabled">
                    {{ __('Eliminar') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>
