<div class="container">
    <div class="flex my-3 ml-10">
        <input wire:model='search' class="form-control rounded-xl mr-sm-2 w-5/6" type="search" placeholder="Búsqueda por descripicion o por nombre de la estacion" aria-label="Search">
        
        <select class="rounded-xl ml-3" name="tipo" id="tipo" wire:model='tipo'>
            <option seleted value="">Todos los Tipo</option>
            <option value="DIAGNOSTICO">Diagnostico</option>
            <option value="MANT. PREVENTIVO">Mant. Preventivo</option>
            <option value="MANT. CORRECTIVO">Mant. Correctivo</option>
            <option value="CAMBIO DE EQUIPO">Cambio de Equipo</option>
            <option value="PROMOCION">Promocion</option>
        </select>
    
    </div>
    
    <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
        <thead>
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3">Descripcion</th>
            <th class="px-4 py-3 text-center">Tipo</th>
            <th class="px-4 py-3">Informe</th>
            <th class="px-4 py-3">Estacion</th>
            <th class="py-3 text-center">Fecha</th>
        </tr>
        </thead>
        <tbody>
        @if ($activities->isNotEmpty())
            @foreach ($activities as $activity)
                @if ($activity->report->estado == 'REVISADO')
                <tr class="bg-gray-100 border-b border-gray-200">
                    <td class="px-4 py-3 text-sm uppercase">{{ Str::limit($activity->descripcion, 200, '...')}}</td>
                    <td class="px-4 py-3 text-center">{{ $activity->tipoActivity }}</td>
                    <td class="px-4 py-3 hover:text-green-600">
                        <a href="{{ route('informe.show', [$activity->report->id]) }}">
                            <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="file"
                            class="m-auto h-4 w-4 svg-inline--fa fa-file fa-w-12" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor"
                                    d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zM332.1 128H256V51.9l76.1 76.1zM48 464V48h160v104c0 13.3 10.7 24 24 24h104v288H48z">
                                </path>
                            </svg>
                            INFORME
                        </a>    
                    </td>
                    <td class="text-sm w-24 text-center">{{ $activity->estation->name }}</td>
                    <td class="text-sm w-24 text-center">{{ $activity->fechaInicio }}</td>
                </tr>
                @endif
            @endforeach
        @else
            <p class="text-gray-300 text-right">No se encontraron datos</p>
        @endif
        </tbody>
    </table>
</div>
