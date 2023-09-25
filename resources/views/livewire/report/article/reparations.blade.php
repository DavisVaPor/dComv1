<div>
    <button wire:click='addModal()'
        class="text-blue-500 hover:text-blue-700 cursor-pointer">
        <abbr title="Registro de Reparacion">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 m-auto">
                <path fill="currentColor"
                    d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
            </svg>
        </abbr>
    </button>

    @if ($articulo)
    <x-jet-dialog-modal wire:model="modalEdit">
        <x-slot name="title">
            <div class="flex justify-start items-center">
                <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                        <path fill="currentColor"
                            d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                    </svg>
                </div>
                <h1 class="font-bold uppercase">Registro de Reparacion</h1>
            </div>
        </x-slot>

        <x-slot name="content">
            <h1 class="font-bold text-center underline">SERVICIO TÉCNICO</h1>
            <h2 class="font-bold underline">DATOS DEL EQUIPO</h2>
            <p class="">Cod: <span class="font-bold">{{ $articulo->codPatrimonial }}</span></p>
            <p class="">Equipo: <span class="font-bold">{{ $articulo->denominacion }}</span></p>
            <p class="">Serie: <span class="font-bold">{{ $articulo->nserie }}</span></p>
            <p class="">Modelo: <span class="font-bold">{{ $articulo->modelo }}</span> </p>

            <div class="col-span-6 sm:col-span-4 bg-gray-50 mt-1 p-1 border rounded-xl">
                <div class="flex justify-between items-center">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="tipo"
                            value="{{ __('Tipo') }}" />
                        <select class="rounded-xl" name="tipo" id="tipo" wire:model.defer='tipo'>
                            <option value="">Servicio</option>
                            <option value="PREVENTIVO">PREVENTIVO</option>
                            <option value="CORRECTIVO">CORRECTIVO</option>
                        </select>
                        <x-jet-input-error for="tipo" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="estado"
                            value="{{ __('Estado') }}" />
                        <select class="rounded-xl" name="estado" id="estado" wire:model.defer='estado'>
                            <option value="BUENO">BUENO</option>
                            <option value="REGULAR">REGULAR</option>
                            <option value="MALO">MALO</option>
                        </select>
                        <x-jet-input-error for="estado" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200" for="article.estado"
                            value="{{ __('Sistema') }}" />
                        <p class="mt-3">{{ $articulo->system->name }}</p>
                    </div>
                </div>
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Descripcion del Mantenieminto') }}" />
                <textarea id="name" wire:model.defer='obbArticle' class="resize-none w-full h-1/5 border rounded-md"></textarea>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalEdit',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="updateArticle()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
@endif
</div>
