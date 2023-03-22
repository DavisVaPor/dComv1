<div>
    <div class="flex my-3">
        <input wire:model='search' class="form-control rounded-xl mr-sm-2 mr-2 w-full" type="search"
            placeholder="Búsqueda de registros" aria-label="Search">

        <select class="rounded-xl text-sm " name="tipo" id="tipo" wire:model='tipo'>
            <option seleted value="">Servicio</option>
            <option value="DIAGNOSTICO">Diagnostico</option>
            <option value="MANT. PREVENTIVO">Mante Preventivo</option>
            <option value="MANT. CORRECTIVO">Mante Correctivo</option>
        </select>
        
        <input class="rounded-xl text-sm ml-3 px-1" type="date" name="" id="">
    </div>

    @if ($activities->isNotEmpty())
        <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-2 text-center">#</th>
                <th class="px-4 py-1">Descripcion</th>
                <th class="px-4 py-1 text-center">Tipo de Servicio</th>
                <th class="px-4 py-1">Estacion</th>
                <th class="py-1 text-center w-24">Fecha</th>
                <th class="px-4 py-1 w-1/12">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 m-auto" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                        </path>
                    </svg>
                </th>

            </tr>

            @foreach ($activities as $activity)
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="text-xs px-2 font-bold text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-1 text-sm">{{ $activity->descripcion }}</td>

                    <td class="px-4 py-1 text-xs text-center">{{ $activity->tipoActivity }}</td>
                    <td class="px-4 py-1 text-xs">
                        <a target="_blank" href="{{ route('estacion.show', [$activity->estation]) }}">
                            {{ $activity->estation->name }}
                        </a>
                    </td>
                    <td class="text-xs text-center w-24">{{ $activity->fechaInicio }}</td>
                    <td class="px-4 py-1 w-1/12">

                        @livewire('mantenimiento.imagen', ['activity' => $activity], key($activity->id))
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $activities->links() }}
    @else
        <div class="text-center border border-gray-100">
            <p class="text-gray-400">.:: Sin registro de actividades ::.</p>
        </div>
    @endif
</div>
