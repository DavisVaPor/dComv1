<div>

    <h2 class="mb-2 font-bold text-lg text-blue-500 uppercase"> Reparaciones Realizadas del Equipo</h2>
    <div class=" text-gray-500">

        <table class="text-sm text-center rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
            <tr class="text-base border-b-2 border-gray-300">
                <th class="">#</th>
                <th class="px-2 py-3">Descripcion de la reparacion</th>
                <th class="px-2 py-3">Cambios de Estado</th>
                <th class="px-2 py-3 w-24">Fecha</th>
                <th class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="m-auto h-6 w-6" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M8 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"></path>
                        <path
                            d="M6 3a2 2 0 00-2 2v11a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2 3 3 0 01-3 3H9a3 3 0 01-3-3z">
                        </path>
                    </svg>
                </th>
            </tr>
            <tr class="bg-gray-100 border-b border-gray-200">
                @foreach ($estation->articles as $article)
                    @forelse($article->manintenance as $item)
                        <td class="px-4 py-2 mb-auto font-bold text-center">{{ $loop->iteration }}</td>
                        <td class="py-2 w-6/12 text-left">{{ $item->descripcion }}</td>
                        <td class="py-2">{{ $item->cambios }}</td>
                        <td class="py-2">{{ Str::limit($item->created_at, 9, '') }}</td>
                        <td class="py-2"></td>
                    @empty
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <td colspan="5" class="px-4 mb-auto font-bold text-center mt-2"> No registro de
                            cambios</td>
                    </tr>
                    @endforelse
                @endforeach
            </tr>
        </table>
    </div>
</div>
