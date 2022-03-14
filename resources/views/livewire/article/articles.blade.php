<div>
    <div class="flex my-3 ">
        <input wire:model='search' class="form-control rounded-lg mr-sm-2 w-5/6 m-auto " type="search"
            placeholder="Búsqueda" aria-label="Search">
        <div class="">
            <select class="rounded-lg mx-2" wire:model='estation' name="" id="">
                <option value="">Todos</option>
                @foreach ($estations as $estacion)
                    <option value="{{ $estacion->id }}">{{ $estacion->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="justify-end mr-auto">
            <x-jet-button wire:click="add" class="bg-green-500">
                Añadir
                <span class="w-6 h-6 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </x-jet-button>
        </div>
    </div>

    <div class="table w-full p-1">
        <table class="w-full border ">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="py-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Denominacion
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Categoria
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Modelo
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Serie
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Ubicacion
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">

                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="py-2 border-r uppercase text-left pl-3">
                            {{ $article->denominacion }}
                        </td>
                        <td class="py-2 border-r">{{ Str::limit($article->category->name, 20, '...') }}</td>
                        <td class="py-2 border-r uppercase">{{ $article->modelo }}</td>
                        <td class="py-2 border-r">
                            @if ($article->nserie)
                                {{ $article->nserie }}
                            @else
                                SIN SERIE
                            @endif

                        </td>
                        <td class="py-2 border-r">
                            <a href="{{ route('estacion.show', $article->estation->id) }}">
                                @if ($article->estation)
                                {{ $article->estation->name }}
                                @else
                                    @if ($article->estation_id == '0')
                                        DRTC-A
                                    @endif
                                @endif
                            </a>
                        </td>
                        <td class="flex">
                            <button wire:click="edit({{ $article->id }})"
                                class="text-blue-500 hover:text-blue-900 cursor-pointer mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <a href="{{ route('article.show', [$article]) }}"
                                class="text-yellow-500 hover:text-yellow-900 cursor-pointer">
                                <svg class="w-6 h-6 m-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                                    </path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $articles->links() }}
    </div>

    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold">Añadir un Equipo</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="codPatrimonial"
                    value="{{ __('Codigo Patrimonial') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full font-semibold"
                    wire:model.defer='article.codPatrimonial' />
                <x-jet-input-error for="article.codPatrimonial" class="mt-2" />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="denominacion"
                    value="{{ __('Denominacion') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full font-semibold"
                    wire:model.defer='article.denominacion' />
                <x-jet-input-error for="article.denominacion" class="mt-2" />
            </div>

            <div class="flex mt-2 justify-star">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="text-base font-bold border-gray-200" for="cantidad"
                        value="{{ __('Cantidad') }}" />
                    <x-jet-input id="name" type="number" class="mt-1 block w-full font-semibold"
                        wire:model.defer='article.cantidad' />
                    <x-jet-input-error for="article.cantidad" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 ml-16">
                    <x-jet-label class="text-base font-bold border-gray-200" for="marca" value="{{ __('Marca') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full font-semibold"
                        wire:model.defer='article.marca' />
                    <x-jet-input-error for="article.marca" class="mt-2" />
                </div>
            </div>

            <div class="flex justify-star mt-2">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="text-base font-bold border-gray-200" for="modelo"
                        value="{{ __('Modelo') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full font-semibold"
                        wire:model.defer='article.modelo' />
                    <x-jet-input-error for="article.modelo" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 ml-16">
                    <x-jet-label class="text-base font-bold border-gray-200" for="color" value="{{ __('Color') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full font-semibold"
                        wire:model.defer='article.color' />
                    <x-jet-input-error for="article.color" class="mt-2" />
                </div>
            </div>

            <div class="flex mt-2">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label class="text-base font-bold border-gray-200" for="nserie"
                        value="{{ __('Numero de Serie') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full font-semibold"
                        wire:model.defer='article.nserie' />
                    <x-jet-input-error for="article.nserie" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 ml-16">
                    <x-jet-label class="text-base font-bold border-gray-200" for="estado"
                        value="{{ __('Estado del Equipo') }}" />
                    <select class="rounded-lg mt-1 font-semibold" wire:model.defer='article.estado'>
                        <option value="">OPCIONES</option>
                        <option value="BUENO" selected>BUENO</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                    </select>
                    <x-jet-input-error for="article.estado" class="mt-2" />
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="category_id"
                    value="{{ __('Categoria del Equipo') }}" />
                <select class="rounded-lg text-sm" wire:model='article.category_id' >
                    <option value="" >Catergorias de Bienes</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="article.category_id" class="mt-2" />
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
