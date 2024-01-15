<div>
    <x-jet-button wire:click="modalOpen({{$estation->id}})" class="bg-blue-500 ml-2">
        Actualizar Inventario
        <span class="w-6 h-6 ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                    clip-rule="evenodd" />
            </svg>
        </span>
    </x-jet-button>


    <x-jet-dialog-modal wire:model="modalOpen">
        <x-slot name="title">
            <h1 class="text-sm font-bold uppercase">Agregar Equipo a la Estación de {{$estation->name}} {{$estation->sistema}}:{{$estation->tipo}}</h1>
        </x-slot>
        <x-slot name="content">
            <div class="flex items-center col-span-6 sm:col-span-4">
                <x-jet-label class="text-base mr-2 font-bold border-gray-200" for="codPatrimonial"
                    value="{{ __('Cod. Patrimonial') }}" />
                <x-jet-input id="name" type="text" class="text-sm block w-auto font-semibold text-right"
                    wire:model.defer='article.codPatrimonial' />
            </div>
            <x-jet-input-error for="article.codPatrimonial" class="mt-1" />

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="denominacion"
                    value="{{ __('Denominación') }}" />
                <x-jet-input id="name" type="text" class="text-sm block w-full font-semibold"
                    wire:model.defer='article.denominacion' />
                <x-jet-input-error for="article.denominacion" class="mt-1" />
            </div>

            <div class="flex mt-2 justify-between">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="text-base font-bold border-gray-200" for="marca"
                        value="{{ __('Marca') }}" />
                    <x-jet-input id="name" type="text" class="text-sm block w-full font-semibold"
                        wire:model.defer='article.marca' />
                    <x-jet-input-error for="article.marca" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="text-base font-bold border-gray-200" for="modelo"
                        value="{{ __('Modelo') }}" />
                    <x-jet-input id="name" type="text" class="text-sm block w-full font-semibold"
                        wire:model.defer='article.modelo' />
                    <x-jet-input-error for="article.modelo" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="text-base font-bold border-gray-200" for="color"
                        value="{{ __('Color') }}" />
                    <x-jet-input id="name" type="text" class="text-sm block w-full font-semibold"
                        wire:model.defer='article.color' />
                    <x-jet-input-error for="article.color" class="mt-2" />
                </div>

            </div>
            <div class="flex mt-2">
                <div class="w-2/3">
                    <x-jet-label class="text-base font-bold border-gray-200" for="nserie"
                        value="{{ __('Numero de Serie') }}" />
                    <x-jet-input id="name" type="text" class="text-sm  block w-full font-semibold"
                        wire:model.defer='article.nserie' />
                    <x-jet-input-error for="article.nserie" class="mt-2" />
                </div>

                <div class="ml-8 w-1/3">
                    <x-jet-label class="text-base font-bold border-gray-200" for="estado"
                        value="{{ __('Estado') }}" />
                    <select class="rounded-lg text-sm font-semibold" wire:model.defer='article.estado'>
                        <option value="" selected></option>
                        <option value="BUENO">BUENO</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                    </select>
                    <x-jet-input-error for="article.estado" class="mt-2" />
                </div>
            </div>

            <div class="mt-2 col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="category_id"
                    value="{{ __('Categoria') }}" />
                <select class="rounded-lg text-xs" wire:model='article.category_id'>
                    <option value="">Catergorias de Bienes</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="article.category_id" class="mt-2" />
            </div>

            <div class="mt-2 col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="category_id"
                    value="{{ __('Sistema') }}" />
                <select class="rounded-lg text-xs" wire:model='article.system_id'>
                    <option value="">Sistema</option>
                    @foreach ($systems as $system)
                        <option value="{{ $system->id }}">{{ $system->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="article.system_id" class="mt-2" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="saveArticle()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
