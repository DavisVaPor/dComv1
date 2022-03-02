<div class="mb-10">
    <div class="flex justify-between my-2 items-center">
        <input wire:model='search' class="form-control rounded-lg mr-sm-2 w-full m-auto mx-2" type="search"
        placeholder="Búsqueda del Articulo" aria-label="Search">
    
        <select class="rounded-lg mx-2" wire:model="system" name="" id="">
            <option selected value="">Sistemas</option>
            <option value="1">SISTEMA DE TORRE</option>
            <option value="2">SISTEMA DE RECPECION</option>
            <option value="3">SISTEMA DE TRANSMISION TV</option>
            <option value="4">SISTEMA DE TRANSMISION FM</option>
            <option value="5">SISTEMA DE PROTECCION</option>
            <option value="6">SISTEMA DE FOTOVOLTAICO</option>
        </select>
    </div>
    @isset($articles)
    <table class="table-auto rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
        <tr class="text-center border-b-2 border-gray-300">
            <th class="px-4 py-3">Nombre</th>
            <th class="px-4 py-3">Marca</th>
            <th class="px-4 py-3">Serie</th>
            <th class="px-4 py-3">Modelo</th>
            <th class="px-4 py-3">Estado</th>
            <th class="px-4 py-3">Sistema</th>
        </tr>
        @forelse ($articles as $article)
        <tr class="bg-gray-100 border-b border-gray-200 hover:bg-blue-200">
            <td class="px-4 py-3">
                <a href="{{ route('article.show', $article->id) }}" class="text-sm text-gray-900 block uppercase hover:text-blue-500">
                    {{ $article->denominacion }}
                </a>
            </td>
            <td class="px-4 py-3">
                {{ $article->marca }}
            </td>
            <td class="px-4 py-3">
                {{ $article->nserie }}
            </td>
            <td class="px-4 py-3">
                {{ $article->modelo }}
            </td>
            <td class="px-4 py-3">
                @if ($article->estado === 'BUENO')
                    <span class="text-green-600 font-bold">{{ $article->estado }}</span>
                @else   
                    @if ($article->estado === 'REGULAR')
                        <span class="text-yellow-600 font-bold">{{ $article->estado }}</span>
                    @else
                        <span class="text-red-600 font-bold">{{ $article->estado }}</span>
                    @endif
                @endif
            </td>
            <td class="px-4 py-3">
                {{ $article->system->name }}
            </td>
        </tr>
        @empty
            <tr class="bg-gray-100 border-b border-gray-200">
                <td colspan="6" class="text-center px-4 py-3 font-bold text-gray-600">No hay registros</td>
            </tr>
        @endforelse    
    </table>
    @endisset
    @if (isset($articles))

    @endif
</div>
