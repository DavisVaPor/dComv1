<div>
    <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3"></th>
            <th class="w-2/5 px-4 py-3 text-center">Descripcion</th>
            <th class="px-4 py-3 text-center">Prioridad</th>
            <th class="px-4 py-3 text-center">Atencion</th>
            <th class="px-4 py-3 text-center">Reportado por</th>
            <th class="px-4 py-3 text-center">Creado</th>
        </tr>
        @forelse ($estation->observation as $observation)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 mb-auto font-bold">{{ $loop->iteration }}</td>
                <td class="px-4 py-3">{{ $observation->detalle }}</td>
                <td class="px-4 py-3">
                    {{ $observation->observationable->asunto }}
                    {{ $observation->observationable->denominacion }}
                </td>
                <td class="px-4 py-3">
                    @if ($observation->atencion == 'ALTA')
                        <div
                            class="text-gray-100  text-sm text-center bg-red-500 bg-clip-content font-bold w-auto rounded-xl">
                            {{ $observation->atencion }}
                        </div>
                    @else @if ($observation->atencion == 'MODERADO')
                            <div
                                class="text-gray-700  text-sm text-center bg-yellow-500 bg-clip-content font-bold w-auto rounded-xl">
                                <p class="m-2"> {{ $observation->atencion }}</p>

                            </div>
                        @else @if ($observation->atencion == 'BAJA')
                                <div
                                    class="text-gray-100  text-sm text-center bg-green-500 bg-clip-content font-bold w-auto rounded-xl">
                                    {{ $observation->atencion }}
                                </div>
                            @else
                                <div
                                    class="text-gray-100  text-sm text-center bg-gray-500 bg-clip-content font-bold w-auto rounded-xl">
                                    {{ $observation->atencion }}
                                </div>
                            @endif
                        @endif
                    @endif
                </td>
                <td class="px-4 py-3">{{ $observation->atendida }}</td>
                <td class="px-4 py-3">{{ $observation->user->name }}</td>
                <td class="px-4 py-3">{{ $observation->created_at }}</td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="6" class="text-center px-4 py-3 font-bold text-gray-600">No hay registros</td>
            </tr>
        @endforelse
        @foreach ($estation->observation as $observation)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 mb-auto font-bold">{{ $loop->iteration }}</td>
                <td class="px-4 py-3">{{ $observation->detalle }}</td>
                <td class="px-4 py-3">
                    {{ $observation->observationable->asunto }}
                    {{ $observation->observationable->denominacion }}
                </td>
                <td class="px-4 py-3">
                    @if ($observation->nivel == 'ALTA')
                        <div
                            class="text-gray-100  text-sm text-center bg-red-500 bg-clip-content font-bold w-auto rounded-xl">
                            {{ $observation->nivel }}
                        </div>
                    @else @if ($observation->nivel == 'MODERADO')
                            <div
                                class="text-gray-700  text-sm text-center bg-yellow-500 bg-clip-content font-bold w-auto rounded-xl">
                                <p class="m-2"> {{ $observation->nivel }}</p>

                            </div>
                        @else @if ($observation->nivel == 'BAJA')
                                <div
                                    class="text-gray-100  text-sm text-center bg-green-500 bg-clip-content font-bold w-auto rounded-xl">
                                    {{ $observation->nivel }}
                                </div>
                            @else
                                <div
                                    class="text-gray-100  text-sm text-center bg-gray-500 bg-clip-content font-bold w-auto rounded-xl">
                                    {{ $observation->nivel }}
                                </div>
                            @endif
                        @endif
                    @endif
                </td>
                <td class="px-4 py-3">
                    {{ $observation->user->name }}</td>
            </tr>
        @endforeach
    </table>
    <h1 class="text-right text-blue-700">Total: {{$estation->observation->count()}}</h1>

</div>
