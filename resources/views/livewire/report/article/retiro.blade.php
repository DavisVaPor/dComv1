<div>
    <button wire:click='openModal()' class="text-red-500 hover:text-red-900 cursor-pointer">
        <abbr title="Registrar Retiro de Equipo">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M15.707 4.293a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0zm0 6a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 111.414-1.414L10 14.586l4.293-4.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </abbr>
    </button>

    {{-- Modal de Retrio de Bien --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Registro de Retiro de Equipo</h1>
        </x-slot>

        <x-slot name="content">
            <x-jet-label class="text-base font-bold border-gray-200 uppercase" for="ArticleSelect"
                value="{{ __('Equipos Retirados') }}" />
            {{ $article->codPatrimonial }}
            {{ $article->denominacion }}
            <x-jet-label class="text-base font-bold uppercase" for="url" value="{{ __('Acta de Retiro') }}" />
            <div class="col-span-6 sm:col-span-4 border rounded-lg ">
                <div class="m-2">
                    <x-jet-label class="text-base uppercase font-bold border-gray-200" for="fecha"
                        value="{{ __('Fecha de Retiro') }}" />
                    <input class="rounded-xl text-sm" type="date" name="fecha" id="fecha" wire:model='fecha'>
                    <x-jet-input-error for="fecha" class="mt-2" />
                </div>
                <div class="m-2">
                    <x-jet-label class="text-base uppercase font-bold border-gray-200" for="file_url"
                        value="{{ __('Archivo') }}" />
                    <input type='file' wire:model='file_url' accept="application/pdf">
                    {{$file_url}}
                    <x-jet-input-error for="file_url" class="mt-2" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="retiro()" wire:loading.attr="disabled">
                {{ __('Retirar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
