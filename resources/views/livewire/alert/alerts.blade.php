<div>
    <div class="flex my-3 ml-10">
        <input wire:model='search' class="form-control rounded-lg mr-sm-2 w-4/6 m-auto mr-6" type="search"
        placeholder="Búsqueda" aria-label="Search">
    
        <select wire:model='estado' class="rounded-lg mr-6" name="" id="">
            <option selected value="">Todos Estado</option>
            <option value="PENDIENTE">Pendiente</option>
            <option value="ATENDIDO">Atendido</option>
        </select>
    
        <select wire:model='nivel' class="rounded-lg mr-6" name="" id="">
            <option selected value="">Todos los Niveles</option>
            <option value="ALTO">Alto</option>
            <option value="MEDIA">Medio</option>
            <option value="BAJA">Bajo</option>
        </select>

        <x-jet-button wire:click="addModal" class="bg-green-500">
            Añadir
            <span class="w-6 h-6 ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </x-jet-button>
    </div>

    <table class="rounded-t-lg m-5 w-11/12 mx-auto bg-gray-200 text-gray-800">
        <thead>
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3 text-center">Descripcion</th>
                <th class="px-4 py-3 text-center">Estacion</th>
                <th class="px-4 py-3 text-center">Ubicacion</th>
                <th class="px-4 py-3 text-center">Estado</th>
                <th class="px-4 py-3 text-center">Prioridad</th>
            </tr> 
        </thead>
        <tbody>
            @foreach ($alerts as $alert)
            <tr class="bg-gray-100 border-b border-gray-200">
                <td class="px-4 mb-auto font-bold">{{ $alert->description }}</td>
                <td class="px-4 py-3">
                    <a class="text-green-500 font-bold hover:text-gray-700" href="{{$alert->estation->urlgooglearth}}" target="_blanck">
                        {{ $alert->estation->name }}
                    </a>
                </td>
                <td class="px-4 py-3 text-center">
                    {{ $alert->estation->ubigeo->provincia }} <br>
                    <p class="font-bold"> {{ $alert->estation->ubigeo->distrito }} </p>
                </td>
                <td class="px-4 py-3">
                    @if ($alert->estado == 'PENDIENTE')
                        <div
                            class="text-gray-100 w-28 text-sm text-center bg-yellow-500 bg-clip-content font-bold rounded-xl">
                            {{ $alert->estado }}
                        </div>
                    @else @if ($alert->estado == 'ATENDIDO')
                            <div
                                class="text-gray-700 w-28 text-sm text-center bg-green-500 bg-clip-content font-bold rounded-xl">
                                <p class="m-2"> {{ $alert->estado }}</p>
                            </div>
                        @endif
                    @endif
                </td>
                <td class="px-4 py-3">
                    @if ($alert->nivel == 'ALTA')
                        <div
                            class="text-gray-100  text-sm text-center bg-red-500 bg-clip-content font-bold w-auto rounded-xl">
                            {{ $alert->nivel }}
                        </div>
                    @else @if ($alert->nivel == 'MEDIA')
                            <div
                                class="text-gray-700  text-sm text-center bg-yellow-500 bg-clip-content font-bold w-auto rounded-xl">
                                <p class="m-2"> {{ $alert->nivel }}</p>

                            </div>
                        @else @if ($alert->nivel == 'BAJA')
                                <div
                                    class="text-gray-100  text-sm text-center bg-green-500 bg-clip-content font-bold w-auto rounded-xl">
                                    {{ $alert->nivel}}
                                </div>
                            @endif
                        @endif
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

        {{-- Modal de Añadir --}}
<x-jet-dialog-modal wire:model="modalAdd">
    <x-slot name="title">
        <h1 class="font-bold uppercase">Añadir una nueva alerta</h1>
    </x-slot>

    <x-slot name="content">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label class="text-base font-bold border-gray-200" for="name"
                value="{{ __('Descripcion') }}" />
                <textarea id="name"  wire:model.defer='alert.description' class="resize-none w-full h-1/5 border rounded-md">

                </textarea>
            <x-jet-input-error for="alert.description" class="mt-2" />

            <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="nivel"
                value="{{ __('Nivel') }}" />
            <select wire:model='alert.nivel' class="rounded-xl" name="" id="">
                <option value="ALTA">Alta</option>
                <option value="MEDIA">Media</option>
                <option value="BAJA">Baja</option>
            </select>
            <x-jet-input-error for="alert.nivel" class="mt-2" />
            
            <x-jet-label class="text-base font-bold border-gray-200 mt-2" for="name"
                    value="{{ __('Busqueda de Estacion') }}" />
                <div class="flex">
                    <br>
                    <input wire:model='searchestation' class="form-control m-auto rounded-xl w-full" type="search"
                        placeholder="Búsqueda" aria-label="Search">
                    <select wire:model='ubigeo' class="rounded-xl ml-2" name="" id="">
                        <option value="">Todas las Provincia</option>
                        <option value="101">Chachapoyas</option>
                        <option value="102">Bagua</option>
                        <option value="103">Bongara</option>
                        <option value="104">Luya</option>
                        <option value="105">Rodriguez de Mendoza</option>
                        <option value="106">Condorcanqui</option>
                        <option value="107">Utcubamba</option>
                    </select>
                </div>

            <div class="flex flex-col">
                <div class="flex-grow overflow-auto">

                    <table class="rounded-t-lg m-5 w-5/6 mx-auto bg-gray-200 text-gray-800">
                        <tr class="text-left border-b-2 border-gray-300">
                            <th class="font-bold px-4 py-3"></th>
                            <th class="font-bold px-4 py-3">Nombre</th>
                            <th class="font-bold px-4 py-3">Provincia</th>
                            <th class="font-bold px-4 py-3">Distrito</th>
                        </tr>
                        @foreach ($estations as $estation)
                            @if ($estation->id != '7')
                                <tr class="bg-gray-100 border-b border-gray-200">
                                    <td class="px-4 py-3">
                                        <input class="rounded-2xl" wire:model='selectedEstation'
                                            value="{{ $estation->id }}" type="radio">
                                    </td>
                                    <td class="px-4 py-3">{{ $estation->name }}</td>
                                    <td class="px-4 py-3">{{ $estation->ubigeo->provincia }}</td>
                                    <td class="px-4 py-3">{{ $estation->ubigeo->distrito }}</td>
                                </tr>                              
                            @endif
                        @endforeach
                    </table>
                    {{ $estations->links() }}
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('modalAdd',false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2" wire:click="savealert()" wire:loading.attr="disabled">
            {{ __('Guardar') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
</div>
