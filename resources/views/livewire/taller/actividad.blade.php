<div>
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
                                <abbr title="Reparacion de Equipo">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 m-auto items-center mt-2">
                                        <path fill="currentColor"
                                            d="M507.6 122.8c-2.904-12.09-18.25-16.13-27.04-7.338l-76.55 76.56l-83.1-.0002l0-83.1l76.55-76.56c8.791-8.789 4.75-24.14-7.336-27.04c-23.69-5.693-49.34-6.111-75.92 .2484c-61.45 14.7-109.4 66.9-119.2 129.3C189.8 160.8 192.3 186.7 200.1 210.1l-178.1 178.1c-28.12 28.12-28.12 73.69 0 101.8C35.16 504.1 53.56 512 71.1 512s36.84-7.031 50.91-21.09l178.1-178.1c23.46 7.736 49.31 10.24 76.17 6.004c62.41-9.84 114.6-57.8 129.3-119.2C513.7 172.1 513.3 146.5 507.6 122.8zM80 456c-13.25 0-24-10.75-24-24c0-13.26 10.75-24 24-24s24 10.74 24 24C104 445.3 93.25 456 80 456z" />
                                    </svg>
                                </abbr>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $articles->links() }}
    </div>
</div>
