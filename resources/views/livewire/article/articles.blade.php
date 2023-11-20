<div>
    <div class="flex my-3 ">
        <input wire:model='search' class="form-control rounded-lg mr-sm-2 w-5/6 m-auto " type="search"
            placeholder="Búsqueda" aria-label="Search">
        <div class="">
            <select class="rounded-lg mx-2" wire:model='estation' name="" id="">
                <option selected value="">Todos</option>
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
            <thead class="">
                <tr class="bg-gray-50 border-b rounded-lg">
                    <th class="py-2 border-r cursor-pointer text-sm font-bold text-gray-500">
                        <div class="flex items-center justify-center">
                            Denominacion
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-bold text-gray-500">
                        <div class="flex items-center justify-center">
                            Categoria
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-bold text-gray-500">
                        <div class="flex items-center justify-center">
                            Modelo
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-bold text-gray-500">
                        <div class="flex items-center justify-center">
                            Serie
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-bold text-gray-500">
                        <div class="flex items-center justify-center">
                            Ubicacion
                        </div>
                    </th>
                    <th class="py-2 border-r cursor-pointer text-sm font-bold text-gray-500 text-center">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                                </path>
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                        <td class="py-2 border-r uppercase text-left pl-3">
                            <a href="{{ route('article.show', [$article]) }}">
                                {{ $article->denominacion }}
                            </a>

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
                        <td class="flex justify-center items-center">
                            @if ($article->estation->id === '1')
                                <button wire:click="edit({{ $article->id }})"
                                    class="text-blue-500 hover:text-blue-900 cursor-pointer mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 m-auto" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                            @endif

                            <a href="{{ route('article.show', [$article]) }}"
                                class="text-blue-500 hover:text-gray-900 cursor-pointer items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-6 h-6 m-auto">
                                    <path fill="currentColor"
                                        d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 128c17.67 0 32 14.33 32 32c0 17.67-14.33 32-32 32S224 177.7 224 160C224 142.3 238.3 128 256 128zM296 384h-80C202.8 384 192 373.3 192 360s10.75-24 24-24h16v-64H224c-13.25 0-24-10.75-24-24S210.8 224 224 224h32c13.25 0 24 10.75 24 24v88h16c13.25 0 24 10.75 24 24S309.3 384 296 384z" />
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
            <h1 class="font-bold">Ingreso de Equipo a Almacen</h1>
        </x-slot>

        <x-slot name="content">
            <div class="flex items-center col-span-6 sm:col-span-4">
                <x-jet-label class="text-base mr-2 font-bold border-gray-200" for="codPatrimonial"
                    value="{{ __('Cod. Patrimonial') }}" />
                <x-jet-input id="name" type="number" class="text-sm block w-auto font-semibold text-right" 
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
