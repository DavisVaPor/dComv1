<div>
    <div class=" mt-1 w-full font-extrabold text-gray-600">
        <a href="{{ route('inventory.index') }}"
            class="my-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Regresar
        </a>
        <div class="">
            <h2 class="text-center -mt-8 mb-4 text-2xl text-green-600 uppercase"> {{ $article->denominacion }}</h2>
        </div>
        <div class="tab-content mb-2 text-sm">
            <div class="pl-6 pr-6 pb-2 text-gray-500 ">
                <div class="bg-white rounded-lg w-full mb-2 p-4 shadow">
                    <h2 class="mb-6 text-lg text-blue-500 uppercase"> Detalles del Bien</h2>
                    <div class="grid grid-cols-1 gap-2">
                        <div class=" col-span-2">
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class=" text-gray-900 block">NOMBRE</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span
                                        class=" text-gray-900 block font-bold uppercase">{{ $article->denominacion }}</span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600 items-center">
                                <div class="w-3/12">
                                    <span class="text-sm text-gray-900 block">COD. PATRIMONIAL</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    @if ($article->codPatrimonial)
                                        <span class=" text-gray-900 block font-bold uppercase">
                                            {{ $article->codPatrimonial }}
                                        </span>
                                    @else
                                        <span class=" text-red-600 block font-bold uppercase">
                                            Sin Codigo Patrimonial
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @if ($article->cantidad > 1)
                                <div class="flex mb-2 border-b border-gray-600">
                                    <div class="w-3/12">
                                        <span class=" text-gray-900 block">CANTIDAD</span>
                                    </div>
                                    <div class="w-1/12">
                                        <span class=" text-gray-900 block">:</span>
                                    </div>
                                    <div class="w-9/12">
                                        <span
                                            class=" text-gray-900 block font-bold uppercase">{{ $article->cantidad }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class=" text-gray-900 block">MODELO</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class=" text-gray-900 block font-bold uppercase">{{ $article->modelo }}</span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class=" text-gray-900 block">SERIE</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class=" text-gray-900 block font-bold uppercase">
                                        @if ($article->nserie)
                                            {{ $article->nserie }}
                                        @else
                                            <p>Sin Numero de Serie</p>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600 items-center">
                                <div class="w-3/12">
                                    <span class=" text-gray-900 block">CATEGORIA</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span
                                        class=" text-gray-900 block font-bold uppercase">{{ $article->category->name }}</span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class=" text-gray-900 block">COLOR</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    @if ($article->color)
                                        <span class=" text-gray-900 block font-bold">{{ $article->color }}</span>
                                    @else
                                        <span class=" text-gray-500 block font-bold">ESTANDAR</span>
                                    @endif

                                </div>
                            </div>
                            <div class="flex my-2 border-b border-gray-600 items-center">
                                <div class="w-3/12">
                                    <span class=" text-gray-900 block">ESTADO</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class=" text-gray-500 block font-bold">
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
                                    </span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class="text-sm text-gray-900 block">FECHA DE REGISTRO</span>
                                </div>
                                <div class="w-1/12">
                                    <span class=" text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class=" text-gray-900 block font-extrabold">{{ $article->created_at }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full font-extrabold text-gray-600">
        <div class="tab-content mb-2">
            <div class="pl-6 pr-6 pb-2 text-gray-500">
                <div class="bg-white rounded-lg w-full mb-2 p-4 shadow">
                    <h2 class="mb-4 text-lg text-blue-500 uppercase"> UbicaciÓn del Equipo</h2>
                    <div class="text-sm">
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class=" text-gray-900 block uppercase">UBICACCION</span>
                            </div>
                            <div class="w-1/12">
                                <span class=" text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class=" text-gray-900 block font-bold uppercase">
                                    @if ($article->estation->id == 1)
                                        DRTC AMAZONAS SEDE CENTRAL
                                    @else
                                        E:{{ $article->estation->id }}{{ $article->estation->name }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class=" text-gray-900 block uppercase">Provincia</span>
                            </div>
                            <div class="w-1/12">
                                <span class=" text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class=" text-gray-900 block font-bold uppercase">
                                    {{ $article->estation->ubigeo->provincia }}
                                </span>
                            </div>
                        </div>
                        <div class="flex mb-2 border-b border-gray-600">
                            <div class="w-3/12">
                                <span class=" text-gray-900 block uppercase">Distrito</span>
                            </div>
                            <div class="w-1/12">
                                <span class=" text-gray-900 block">:</span>
                            </div>
                            <div class="w-9/12">
                                <span class=" text-gray-900 block font-bold uppercase">
                                    {{ $article->estation->ubigeo->distrito }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full font-extrabold text-gray-600">
        <div class="tab-content mb-2">
            <div class="pl-8 pr-8 pb-5 text-gray-500">
                <div class="bg-white rounded-lg w-full mb-2 p-4 shadow">
                    <h2 class="mb-6 text-xl text-blue-500 uppercase"> Reparaciones del Equipo</h2>
                    @if ($article->estation->id == 1)
                        <div class="flex justify-end">
                            <x-jet-button wire:click="addModal" class="bg-blue-500 ">
                                Reparar Equipo
                                <span class="w-4 h-4 ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-4 h-4 m-auto">
                                        <path fill="currentColor"
                                            d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                                    </svg>
                                </span>
                            </x-jet-button>
                        </div>
                    @endif
                    @isset($article->manintenance)
                        <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-sm text-gray-800">
                            <tr class="text-left border-b-2 border-gray-300">
                                <th class="px-4 py-3 w-1/12 text-center">#</th>
                                <th class="px-4 py-3 text-center w-8/12">Descripcion</th>
                                <th class="px-4 py-3 text-center">Tipo</th>
                                <th class="px-4 py-3 text-center">Cambios</th>
                                <th class="px-4 py-3 text-center">Usuario</th>
                                <th class="px-4 py-3 text-center w-48">Creado</th>
                            </tr>
                            @forelse($article->manintenance as $reparation)
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <td class="px-4 mb-auto font-bold text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $reparation->descripcion }}</td>
                                    <td class="px-4 py-3 text-center">{{ $reparation->tipo }}</td>
                                    <td class="px-4 py-3 text-center">{{ $reparation->cambios }}</td>
                                    <td class="px-4 py-3 text-center">{{ $reparation->user->name }}</td>
                                    <td class="px-4 py-3 text-center text-sm w-48">
                                        {{ Str::limit($reparation->created_at, 9, '') }}</td>
                                </tr>
                            @empty
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <td colspan="5" class="px-4 mb-auto font-bold text-center mt-2"> No registro de
                                        cambios</td>
                                </tr>
                            @endforelse
                        </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>


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
            <p class="">Cod: <span class="font-bold">{{ $article->codPatrimonial }}</span></p>
            <p class="">Equipo: <span class="font-bold">{{ $article->denominacion }}</span></p>
            <p class="">Serie: <span class="font-bold">{{ $article->nserie }}</span></p>
            <p class="">Modelo: <span class="font-bold">{{ $article->modelo }}</span> </p>

            <div class="col-span-6 sm:col-span-4 bg-gray-50 mt-1 p-1 border rounded-xl">
                <div class="flex justify-between items-center">
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="tipo"
                            value="{{ __('Tipo') }}" />
                        <select class="rounded-xl" name="tipo" id="tipo" wire:model='tipo'>
                            <option value="">Servicio</option>
                            <option value="PREVENTIVO">PREVENTIVO</option>
                            <option value="CORRECTIVO">CORRECTIVO</option>
                        </select>
                        <x-jet-input-error for="tipo" class="mt-2" />
                    </div>
                    <div>
                        <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="estado"
                            value="{{ __('Estado') }}" />
                        <select class="rounded-xl" name="estado" id="estado" wire:model='estado'>
                            <option value="BUENO">BUENO</option>
                            <option value="REGULAR">REGULAR</option>
                            <option value="MALO">MALO</option>
                        </select>
                        <x-jet-input-error for="estado" class="mt-2" />
                    </div>
                </div>
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Descripcion del Mantenieminto') }}" />
                <textarea id="name" wire:model='descripcion' class="resize-none w-full h-1/5 border rounded-md"></textarea>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalEdit',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="reparation()" wire:loading.attr="disabled">
                {{ __('Guardar') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
