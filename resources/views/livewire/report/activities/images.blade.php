<div>
    <button wire:click='addModalImage' class="text-green-500 hover:text-gray-900 cursor-pointer mr-2">
        <abbr title="AGREGAR IMAGEN">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                <path fill="currentColor"
                    d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z" />
            </svg>
        </abbr>
    </button>

    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Imagenes de la Actividad Realizada</h1>
        </x-slot>

        <x-slot name="content">
            <div class="flex justify-between items-center my-2">
                <x-jet-label class="text-base font-bold border-gray-200 uppercase" for="tipo"
                    value="{{ __('Evidencia Fotográfica') }}" />
                @if ($informe->estado == 'BORRADOR')
                    <x-jet-button wire:click="addSubModalImage" class="bg-green-500">
                        Agregar
                        <span class="w-4 h-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    </x-jet-button>
                @endif
            </div>
            <div class="mx-auto px-2 md:px-6 2xl:px-0 flex justify-center items-center bg-gray-50">
                <div class="flex flex-col jusitfy-start items-start">
                    <div class="grid grid-cols-2 gap-x-8 gap-y-10 lg:gap-y-0 items-center">
                        @foreach ($activity->images as $item)
                            <div class="flex flex-col m-2">
                                <div class="group relative">
                                    <img class="hover:bg-opacity-50 shadow-xl rounded-md sm:block lg:"
                                        src="{{ Storage::url($item->url) }}" alt="bag" />
                                    <div
                                        class=" absolute rounded bg-opacity-0 w-full  top-0 flex items-center duration-700 transition justify-end">
                                        <button class="text-red-500 bg-white hover:text-gray-900 cursor-pointer"
                                            wire:click="mostrarDel({{ $item->id }})" wire:loading.attr="disabled">
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
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cerrar') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="subModalAdd">
        <x-slot name="title">
            <h1 class="font-bold">Agregar Imagen</h1>
        </x-slot>

        <x-slot name="content">

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" type="text" class="mt-1 border-gray-600 block w-full font-semibold"
                    wire:model.defer='image.name' />
                <x-jet-input-error for="image.name" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4 mt-2">
                <x-jet-label class="text-base font-bold border-gray-200" for="url" value="{{ __('Imagen') }}" />
                <label
                    class="inline-flex items-center py-2 px-2 bg-gray-300 text-white rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:text-white">
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
            <x-jet-secondary-button wire:click="$set('subModalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveImage()" wire:loading.attr="disabled">
                {{ __('Agregar') }}
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
