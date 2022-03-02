<div>
    <div class="flex justify-between ml-5">
    <input wire:model='search' class="form-control rounded-xl w-full" type="search" placeholder="Búsqueda de Bienes" aria-label="Search">
    {{-- <select class="rounded-xl ml-2" name="tipo" id="tipo" wire:model='sistemas'>
        <option value="">Todos</option>
        @foreach ($systems as $item)
            <option value="{{ $item->id }}">{{ $v->name }}</option>
        @endforeach
    </select> --}}
    </div> 
    @if ($articles->isNotEmpty())
    <table class="text-sm rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
        <tr class="text-left border-b-2 border-gray-300">
            <th class="px-4 py-3">Cod.</th>
            <th class="px-4 py-3">Nombre del Bien</th>
            <th class="px-4 py-3 text-center">Sistema</th>
            <th class="px-4 py-3 text-center">Estado</th>
            <th class="px-4 py-3">Acciones</th>
        </tr>
        @foreach ($articles as $article)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 font-bold">{{ $article->codPatrimonial }}</td>
                <td class="px-4 py-3">{{$article->denominacion}}</td>
                <td class="px-4 py-3 text-center">{{$article->system->name}}</td>
                <td class="px-4 py-3 text-center font-bold">
                    @if ($article->estado == 'BUENO')
                        <p class="text-green-500">
                            {{$article->estado}}
                        </p>
                    @else
                        @if ($article->estado == 'REGULAR')
                        <p class="text-yellow-500">
                            {{$article->estado}}
                        </p>
                        @else
                        <p class="text-red-500">
                            {{$article->estado}}
                        </p>
                        @endif
                    @endif
                </td>
                <td class="px-4 py-3">
                    <div class="flex">
                        <button wire:click='addModal({{ $article->id }})'
                            class="text-blue-500 hover:text-blue-700 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 m-auto" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    @else
    <div class="text-center border border-gray-100">
        <p class="text-gray-400">.:: Aun no se ha añadido alguna conclusion a este informe ::.</p>
    </div>
    @endif
    
    
       {{-- Modal de Editar --}}
       @if ($article)
        <x-jet-dialog-modal wire:model="modalEdit">
            <x-slot name="title">
                <h1 class="font-bold">Equipo: {{$article->denominacion}}</h1>
            </x-slot>

            <x-slot name="content">
                <p class="text-right">Cod: {{$article->codPatrimonial}}- S/N :{{$article->nserie}}</p>
                <div class="col-span-6 sm:col-span-4 bg-gray-50 p-2 border rounded-xl">
                    <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="article.estado"
                        value="{{ __('Estado Articulo') }}" />
                    <select class="rounded-xl" name="tipo" id="tipo" wire:model.defer='article.estado'>
                        <option value="BUENO">BUENO</option>
                        <option value="REGULAR">REGULAR</option>
                        <option value="MALO">MALO</option>
                    </select>
                    <x-jet-input-error for="article.estado" class="mt-2" />


                    <x-jet-label class="text-base font-bold border-gray-200" for="name"
                        value="{{ __('Descripcion del Mantenieminto') }}" />
                    <textarea id="name" wire:model.defer='obbArticle'
                        class="resize-none w-full h-1/5 border rounded-md"></textarea>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalEdit',false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="updateArticle()" wire:loading.attr="disabled">
                    {{ __('Guardar') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
       @endif
       
</div> 