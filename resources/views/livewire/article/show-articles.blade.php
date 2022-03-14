<div>

    <div class=" mt-2 w-full font-extrabold text-gray-600">
        <a href="{{ route('inventory.index') }}"
            class="my-auto inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
            Regresar
        </a>
        <div class="">
            <h2 class="text-center -mt-8 mb-4 text-2xl text-green-600 uppercase"> {{ $item->denominacion }}</h2>
        </div>
        <div class="tab-content mb-2 ">
            <div class="pl-8 pr-8 pb-5 text-gray-500 ">
                <div class="bg-white rounded-lg w-full mb-2 p-4 shadow">
                    <h2 class="mb-6 text-xl text-blue-500 uppercase"> Detalles del Bien</h2>
                    <div class="grid grid-cols-1 gap-2">
                        <div class=" col-span-2">
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block">NOMBRE</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span
                                        class="text-base text-gray-900 block font-bold uppercase">{{ $item->denominacion }}</span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600 items-center">
                                <div class="w-3/12">
                                    <span class="text-sm text-gray-900 block">COD. PATRIMONIAL</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    @if ($item->codPatrimonial)
                                        <span class="text-base text-gray-900 block font-bold uppercase">
                                            {{ $item->codPatrimonial }}
                                        </span>
                                    @else
                                        <span class="text-base text-red-600 block font-bold uppercase">
                                            Sin Codigo Patrimonial
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @if ($item->cantidad > 1)
                                <div class="flex mb-2 border-b border-gray-600">
                                    <div class="w-3/12">
                                        <span class="text-base text-gray-900 block">CANTIDAD</span>
                                    </div>
                                    <div class="w-1/12">
                                        <span class="text-base text-gray-900 block">:</span>
                                    </div>
                                    <div class="w-9/12">
                                        <span
                                            class="text-base text-gray-900 block font-bold uppercase">{{ $item->cantidad }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block">MODELO</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span
                                        class="text-base text-gray-900 block font-bold uppercase">{{ $item->modelo }}</span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block">SERIE</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class="text-base text-gray-900 block font-bold uppercase">
                                        @if ($item->nserie)
                                            {{ $item->nserie }}
                                        @else
                                            <p>Sin Numero de Serie</p>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600 items-center">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block">CATEGORIA</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span
                                        class="text-base text-gray-900 block font-bold uppercase">{{ $item->category->name }}</span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block">COLOR</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    @if ($item->color)
                                        <span
                                            class="text-base text-gray-900 block font-bold">{{ $item->color }}</span>
                                    @else
                                        <span class="text-base text-gray-500 block font-bold">ESTANDAR</span>
                                    @endif

                                </div>
                            </div>
                            <div class="flex my-2 border-b border-gray-600 items-center">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block">ESTADO</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class="text-base text-gray-500 block font-bold">
                                        {{ $item->estado }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-600">
                                <div class="w-3/12">
                                    <span class="text-sm text-gray-900 block">FECHA DE REGISTRO</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span
                                        class="text-base text-gray-900 block font-extrabold">{{ $item->created_at }}</span>
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
            <div class="pl-8 pr-8 pb-5 text-gray-500">
                <div class="bg-white rounded-lg w-full mb-2 p-4 shadow">
                    <h2 class="mb-6 text-xl text-blue-500 uppercase"> Ubicacion del Equipo</h2>
                    <div>
                        @if ($item->estation_id == 0)
                            <div class="flex mb-2 border-b border-gray-300">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block uppercase">Almacen de</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class="text-base text-gray-900 block font-bold uppercase">
                                        DIRECCION REGIONAL DE TRANSPORTES Y COMUNICACIONES AMAZONES
                                    </span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-300">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block uppercase">Provincia</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class="text-base text-gray-900 block font-bold uppercase">
                                        {{ $item->estation->ubigeo->provincia }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex mb-2 border-b border-gray-300">
                                <div class="w-3/12">
                                    <span class="text-base text-gray-900 block uppercase">Distrito</span>
                                </div>
                                <div class="w-1/12">
                                    <span class="text-base text-gray-900 block">:</span>
                                </div>
                                <div class="w-9/12">
                                    <span class="text-base text-gray-900 block font-bold uppercase">
                                        {{ $item->estation->ubigeo->distrito }}
                                    </span>
                                </div>
                            </div>
                        @else
                            <div>
                                <div class="flex mb-2 border-b border-gray-600">
                                    <div class="w-3/12">
                                        <span class="text-base text-gray-900 block uppercase">Alamcen de</span>
                                    </div>
                                    <div class="w-1/12">
                                        <span class="text-base text-gray-900 block">:</span>
                                    </div>
                                    <div class="w-9/12">
                                        <span class="text-base text-gray-900 block font-bold uppercase">
                                            {{ $item->estation->name }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex mb-2 border-b border-gray-600">
                                    <div class="w-3/12">
                                        <span class="text-base text-gray-900 block uppercase">Provincia</span>
                                    </div>
                                    <div class="w-1/12">
                                        <span class="text-base text-gray-900 block">:</span>
                                    </div>
                                    <div class="w-9/12">
                                        <span class="text-base text-gray-900 block font-bold uppercase">
                                            {{ $item->estation->ubigeo->provincia }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex mb-2 border-b border-gray-600">
                                    <div class="w-3/12">
                                        <span class="text-base text-gray-900 block uppercase">Distrito</span>
                                    </div>
                                    <div class="w-1/12">
                                        <span class="text-base text-gray-900 block">:</span>
                                    </div>
                                    <div class="w-9/12">
                                        <span class="text-base text-gray-900 block font-bold uppercase">
                                            {{ $item->estation->ubigeo->distrito }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                    @if ($item->manintenance->isNotEmpty())
                        <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
                            <tr class="text-left border-b-2 border-gray-300">
                                <th class="px-4 py-3 w-1/12 text-center">#</th>
                                <th class="px-4 py-3 text-center">Descripcion</th>
                                <th class="px-4 py-3 text-center">Cambios</th>
                                <th class="px-4 py-3 text-center">Creado</th>

                            </tr>
                            @foreach ($item->manintenance as $item)
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <td class="px-4 mb-auto font-bold text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3">{{ $item->descripcion }}</td>
                                    <td class="px-4 py-3">{{ $item->cambios }}</td>
                                    <td class="px-4 py-3">{{ $item->created_at }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <div class="text-center border border-gray-100">
                            <p class="text-gray-400">.:: Aun no existe registro ::.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
