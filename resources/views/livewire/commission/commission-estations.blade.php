<div>
    <div class="flex my-3 justify-between items-center border-b border-gray-300 border-3">
        <h1 class="mr-5 text-2xl font-bold text-blue-500">ESTACIONES</h1>
        <div class="mr-4 my-2">
            @if ($commission->estado == 'CREADA')
                <x-jet-button wire:click="addEstacioCommission" class="bg-green-500">
                    Añadir
                    <span class="w-6 h-6 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </x-jet-button>
            @endif
        </div>
    </div>
    <div class="justify-content-between">
        @if ($commission->estations->isNotEmpty())
            <table class="rounded-t-lg m-2 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3 text-center">Localidad</th>
                    <th class="px-4 py-3 text-center">Provincia</th>
                    <th class="px-4 py-3 text-center">Distrito</th>
                    <th class="px-4 py-3 text-center">Estado</th>
                    <th class="px-4 py-3"></th>
                </tr>
                @foreach ($commission->estations as $estation)
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <td class="px-4 py-3 text-center">{{ $estation->name }}</td>
                        <td class="px-4 py-3 text-center">{{ $estation->ubigeo->provincia }}</td>
                        <td class="px-4 py-3 text-center">{{ $estation->ubigeo->distrito }}</td>
                        <td class="px-4 py-3">
                            @if ($estation->estado == 'OPERATIVO')
                                <div
                                    class="text-gray-100 text-sm text-center bg-green-600 bg-clip-content font-semibold w-auto rounded-xl">
                                    OPERATIVO
                                </div>
                            @else
                                <div
                                    class="text-gray-100 text-sm text-center bg-red-600 bg-clip-content font-semibold w-auto rounded-xl">
                                    INOPERATIVO
                                </div>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if ($commission->estado == 'CREADA')
                            <div class="text-center">
                                <button wire:click="mostrarDel({{ $estation->id }})"
                                    class="text-red-500 hover:text-gray-600 cursor-pointer">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="minus-circle" 
                                class="svg-inline--fa fa-minus-circle fa-w-16 w-6 h-6" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zM124 296c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h264c6.6 0 12 5.4 12 12v56c0 6.6-5.4 12-12 12H124z">
                                    </path>
                                    </svg>
                                </button>
                            </div>
                            @endif
                        </td>
                        
                    </tr>
                @endforeach
            </table>
        @else
            <div class="text-center">
                <p class="font-bold text-gray-600">.:: SIN REGISTRO ::.</p>
            </div>
        @endif
    </div>

    {{-- Modal de Añadir --}}
    <x-jet-dialog-modal wire:model="modalAdd">
        <x-slot name="title">
            <h1 class="font-bold uppercase">Añadir Estacion</h1>
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label class="text-base font-bold border-gray-200" for="name"
                    value="{{ __('Busqueda de Estacion') }}" />
                <div class="flex my-2">
                    <input wire:model='searchEstation' class="form-control m-auto rounded-xl w-full" type="search"
                        placeholder="Búsqueda" aria-label="Search">
                    <select wire:model='ubigeo' class="rounded-xl ml-2" name="" id="">
                        <option value="">Todas las Provincia</option>
                        <option value="101">Chachapoyas</option>
                        <option value="102">Bagua</option>
                        <option value="103">Bongara</option>
                        <option value="104">Condorcanqui</option>
                        <option value="105">Luya</option>
                        <option value="106">Rodriguez de Mendoza</option>
                        <option value="107">Utcubamba</option>
                    </select>
                </div>

                <div class="flex flex-col">
                    <div class="flex-grow overflow-auto">
                        <table class="rounded-t-lg my-2 w-full mx-auto bg-gray-200 text-gray-800">
                            <tr class="text-left border-b-2 border-gray-300">
                                <th class="font-bold px-2 py-1"></th>
                                <th class="font-bold px-2 py-1 ">Estacion</th>
                                <th class="font-bold px-2 py-1 text-center">Provincia</th>
                                <th class="font-bold px-2 py-1 text-center">Distrito</th>
                            </tr>
                            @foreach ($estations as $estation)
                                @if (!$commission->estations->contains($estation->id))
                                    @if ($estation->id != '1')
                                        <tr class="bg-gray-100 border-b border-gray-200 text-sm hover:bg-blue-900">
                                            <td class="px-1">
                                                <input class="rounded-2xl" wire:model='selectedEstation'
                                                    value="{{ $estation->id }}" type="radio">    
                                            </td>
                                            <td class="px-2 py-1">{{ $estation->name }}</td>
                                            <td class="px-2 py-1">{{ $estation->ubigeo->provincia }}</td>
                                            <td class="px-2 py-1">{{ $estation->ubigeo->distrito }}</td>
                                        </tr>                        
                                    @endif
                                @endif
                            @endforeach
                        </table>
                        {{ $estations->links() }}
                        <p class="text-right text-xs">Numero de Registros {{ $estations->count() }}</p>
                    </div>
                </div>
{{-- 
                <div class="flex flex-col">
                    <label for="">Grouped Estations</label>
                    @foreach ($estations as $estation)
                        @if (!$commission->estations->contains($estation->id))
                        <div class="flex items-center">
                            <input wire:model="estationes" value="{{$estation->id}}" type="checkbox"> - {{$estation->name}}
                        </div>
                        @endif
                    @endforeach
                </div>
                Seleccionaste: {{var_export($estationes)}} --}}
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="addEstacion({{ $selectedEstation }})"
                wire:loading.attr="disabled">
                {{ __('Añadir') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal de Eliminar --}}
    <x-jet-dialog-modal wire:model="modalDel">
        <x-slot name="title">
            <h1 class="font-bold">{{ __('') }}</h1>
        </x-slot>

        <x-slot name="content">
            {{ __('¿Seguro que desea quitar Estacion?') }}

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('modalDel',false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="delEstacion({{ $modalDel }})"
                wire:loading.attr="disabled">
                {{ __('Si') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
