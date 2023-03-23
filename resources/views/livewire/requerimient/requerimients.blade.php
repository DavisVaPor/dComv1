<div>
    <div class="flex my-3">
        <input wire:model='#' class="form-control rounded-lg mr-sm-2 w-full m-auto mr-6" type="search"
        placeholder="Búsqueda" aria-label="Search">

        <select class="rounded-lg text-sm mr-2" wire:model='#' name="" id="">
            <option selected value="">Estado</option>
            <option class="" value="Pendiente">Pendiente</option>
            <option class="" value="Atendido">Atendido</option>
        </select>
    </div>
    

    <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="text-center">#</th>
            <th class="w-1/2 px-4 py-3">Equipo</th>
            <th class="px-4 py-3 text-center">Cantidad</th>
            <th class="px-4 py-3 text-center">Estacion</th>
            <th class="px-4 py-3 text-center">Estado</th>
        </tr>

        
        @forelse ($requirements as $item)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="text-center text-xs">{{ $loop->iteration }}</td>
                <td class="px-4 py-1 text-sm font-extrabold">{{ $item->equipment->name }}</td>
                <td class="px-4 py-1 text-sm text-center">{{ $item->cantidad }}</td>
                <td class="px-4 py-1 text-sm text-center uppercase">
                    <a class="hover:font-semibold hover:text-blue-600" href="{{ route('estacion.show',[$item->estation->id]) }}">
                        {{ $item->estation->name }} - {{ $item->estation->ubigeo->distrito }}
                    </a>
                </td>
                <td class="px-4 py-1 text-sm text-center">{{ $item->estado }}</td>
            </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="7" class="text-center text-gray-400">No se encuentran registros </td>
            </tr>
        @endforelse
    </table>
    {{ $requirements->links() }}
    <p class="text-right">Numero de Registros : {{ $requirements->count() }}
    </p>
</div>
