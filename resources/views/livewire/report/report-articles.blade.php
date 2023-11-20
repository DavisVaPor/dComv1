<div>
    <p class="text-center text-green-600 text-lg font-bold">
        INVENTARIO DE LOS EQUIPOS DE TELECOMUNICACION DE LA ESTACION
    </p>

    <div class="flex justify-end">
        @livewire('report.article.install-equipament', ['estation' => $estation, 'informe' => $informe], key($estation->id))
        <x-jet-button wire:click="modalOpen" class="bg-blue-500 ml-2">
            Actualizar Inventario
            <span class="w-6 h-6 ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </x-jet-button>
        {{-- @livewire('report.article.retirototal', ['estation' => $estation,'informe' => $informe],key($estation->id)) --}}
    </div>

    <div class="flex justify-between ml-2 mt-2">
        <input wire:model='search' class="form-control w-full rounded-xl" type="search"
            placeholder="Búsqueda de Bienes" aria-label="Search">
        <select class="rounded-xl mx-2 text-sm" name="sistema" id="sistema" wire:model='sistema'>
            <option value="">Todos</option>
            @foreach ($systems as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <table class="text-sm rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="border-b-2 border-gray-300">
            <th class="px-4 py-3">Cod. Pat. DRTC</th>
            <th class="px-4 py-3">Nombre del Equipo</th>
            <th class="px-4 py-3">Serie</th>
            <th class="px-4 py-3 text-center">Sistema</th>
            <th class="px-4 py-3 text-center">Estado</th>
            <th class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                    </path>
                </svg>
            </th>
        </tr>
        @forelse ($articles as $article)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 font-bold ">{{ $article->codPatrimonial }}</td>
                <td class="px-4 py-1">{{ $article->denominacion }}</td>
                <td class="px-4 py-1">{{ $article->nserie }}</td>
                <td class="px-4 py-1 text-center">{{ $article->system->name }}</td>
                <td class="px-4 py-1 text-center font-bold">
                    @if ($article->estado == 'BUENO')
                        <p class="text-green-500">
                            {{ $article->estado }}
                        </p>
                    @else
                        @if ($article->estado == 'REGULAR')
                            <p class="text-yellow-500">
                                {{ $article->estado }}
                            </p>
                        @else
                            <p class="text-red-500">
                                {{ $article->estado }}
                            </p>
                        @endif
                    @endif
                </td>
                <td class="">
                    <div class="flex justify-center">
                        @livewire('report.article.reparations', ['article' => $article, 'estation' => $estation, 'informe' => $informe], key($article->id))

                        @livewire('report.article.retiro', ['article' => $article, 'estation' => $estation, 'informe' => $informe], key($article->id))
                    </div>
                </td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="6" class="px-4 py-3 text-center">
                    No se encontraron registros
                </td>
            </tr>
        @endforelse
    </table>
    {{ $articles->links() }}

    <x-jet-dialog-modal wire:model="modalOpen">
        <x-slot name="title">
            <h1 class="font-bold">Agregar Equipo a la Estacion</h1>
        </x-slot>

        <x-slot name="content">
            <div class="flex items-center col-span-6 sm:col-span-4">
                <x-jet-label class="text-base mr-2 font-bold border-gray-200" for="codPatrimonial"
                    value="{{ __('Cod. Patrimonial') }}" />
                <x-jet-input id="name" type="text" class="text-sm block w-auto font-semibold text-right"
                    wire:model.defer='article.codPatrimonial' maxlength="12" size='12' />
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
